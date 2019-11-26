<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountSetting extends CI_Controller {
	
	function __construct()
	{
        parent::__construct();
        
        $this->load->library('session');
        $this->load->model('Login_model');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
    }
	
	public function index()
	{
		$menuid = $this->session->userdata('menudata');
		$menudata = $this->Login_model->menu_reload($menuid);
		$maxnil = $menudata->result();
		//print_r($maxnil);die();
		$data['data'] = $maxnil;	
        $this->load->view('accouont_sett_v',$data);
    }
	function ajax_list()
	{
		$list = $this->Login_model->get_datatables();
		$data = array();
        $no = $_POST['start'];
       //print_r($list);die();
		foreach($list as $accountsetting)
		{
			$no++;
			$row = array();
			//$row[] = $rikk->id;
            //$row[] = $rikk->sk_id;


			$row[] = $accountsetting->eid;
			$row[] = $accountsetting->email;
			$row[] = $accountsetting->name;
            $row[] = $accountsetting->division;
            $row[] = $accountsetting->level;
            $row[] = $accountsetting->menu_id;

			$row[] ='<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="update_rikk('."'".$accountsetting->eid."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_rikk('."'".$accountsetting->eid."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Login_model->count_all(),
			"recordsFiltered" => $this->Login_model->count_filtered(),
			"data" => $data,
		);

		echo json_encode($output);
    }
	
    function ajax_add()
	{
		$menuid = $this->input->post('menuid');
		print_r($menuid);die();
	}		

	function getmenu(){
		$data = $this->Login_model->get_menu();
		$max = $data->result();
		echo json_encode($max);
	}
}
 