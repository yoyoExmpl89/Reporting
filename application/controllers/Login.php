<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
	{
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model('Login_model');
    }


	public function index()
	{
        $this->load->view('Login_v');
    }

    function ldapAuth(){
        $email = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        // config
        $ldapserver = '172.16.3.20';
        $ldapuser   = $email;  
        $ldappass   = $password;
        // connect 
        $ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");
        
			
        $cekuser = $this->Login_model->checkUser($email);
        //PRINT_R($cekuser);die();

        if($cekuser->num_rows() > 0){
            $data=$cekuser->row_array();
            // binding to ldap server

			//die();
            $ldapbind = @ldap_bind($ldapconn, $ldapuser, $ldappass);// or die ("Error trying to bind: ".ldap_error($ldapconn));
            // verify binding
            if ($ldapbind) {
                $sesdata = array(
                    'email'     => $ldapuser,
                    'divisi'    => $data['division'],
					'menudata'  => $data['menu_id'],
					'level'		=> $data['nm_lvl'],
                    'logged_in' => TRUE
                );
				print_r($sesdata);
                $this->session->set_userdata($sesdata);    
                redirect('Dashboard1');
                //echo "konek lo dul";
                //return true;
            } else { 
                echo $this->session->set_flashdata('msg','Username or Password is Wrong');
                redirect('Login');
            }
        }else{
            redirect('Login');
        }


    

    

    }
    public function logout()
    {    
        $this->session->sess_destroy();
        redirect('Login'); 
    }

}