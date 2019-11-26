<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DjpTinOrganisation extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('ReportModel','ReportModel');
		$this->load->library('session');
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
		$this->load->view('DjpTinOrganisation_v',$data);
	}
	function get_prod(){
		$data['prod'] = $this->ReportModel->get_prod()->result();
		echo json_encode($data);
	}
}