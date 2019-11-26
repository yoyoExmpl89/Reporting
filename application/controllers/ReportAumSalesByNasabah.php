<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportAumSalesByNasabah extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ReportModel','ReportModel');	
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
		$this->load->model('Login_model');
	}
	public function index()
	{
		$menuid = $this->session->userdata('menudata');
		$menudata = $this->Login_model->menu_reload($menuid);
		$maxnil = $menudata->result();
		//print_r($maxnil);die();
		$data['data'] = $maxnil;	
		$this->load->view('ReportAumSalesByNasabah_v',$data);
	}
	
	function get_data_sales(){
		$email = $this->session->userdata('email');
		//echo $email;die();
		$level = $this->session->userdata('level');
		//echo $level;die();
		if($level == 'sales'){
			$data = $this->ReportModel->get_seller_cd_byEmail($email);	
			$accessbranch = "";
			foreach($data as $row){
				//echo $row['accessbranch'];die();
				$accessbranch = $row['accessbranch'];
			}
			$datasl['salesid'] = $this->ReportModel->get_seller_id_name($accessbranch);

			//-- admin = kacab
		}else if($level == 'admin'){
			$data = $this->ReportModel->get_seller_cd_byEmail($email);	
			$accessbranch = "";
			foreach($data as $row){
				//echo $row['accessbranch'];die();
				$accessbranch = $row['accessbranch'];
			}
			$datasl['salesid'] = $this->ReportModel->get_seller_id_name($accessbranch);

		}
		
		echo json_encode($datasl);
	}
	function get_data_branch(){
		$data['branch'] = $this->ReportModel->get_branch()->result();
		echo json_encode($data);
	}
}