<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportNab extends CI_Controller {


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
		$this->load->view('ReportNab_v',$data);
	}

	function get_data_sales(){
		$data['sellercd'] = $this->ReportModel->get_sellercd()->result();
		echo json_encode($data);
	}
}