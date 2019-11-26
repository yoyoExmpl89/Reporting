<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('login');
		}
	}
	public function index()
	{
		$this->load->view('report_v');
	}
}