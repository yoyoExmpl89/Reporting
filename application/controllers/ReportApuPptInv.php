<?php
ini_set('max_execution_time', 30000); 
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportApuPptInv extends CI_Controller {
	function __construct()
	{
		parent::__construct();
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
		$this->load->view('ReportApuPptInv_v',$data);
	}
	
	public function getCsv(){
		$link           = "http://localhost:8080/testla/rest-points/s21Service/QueryApuPptInv";
        $json           = file_get_contents($link);
		
		echo "<pre>";
		//print_r($json);
		echo "</pre>";
		
		// $abc = preg_replace('/[^A-Za-z0-9-]/', '', $json);
		// $abc = preg_replace('/\s+/', '', $json);
		// $abc = preg_replace('/\s+/', '', $journalName);
		$abc = str_replace('\"', '"', $json);
		$abc = str_replace('\"', '"', $abc);
		$abc = str_replace(' ', '', $abc);
		$abc = str_replace('"[', '[', $abc); 
		$abc = str_replace(']"', ']', $abc); 
		// $abc = str_replace(" ","",$abc);
        // $obj = json_decode($abc,TRUE);
		
		echo "<pre>";
		//print_r($abc);
		echo "</pre>";
		
		$character = json_decode($abc,TRUE);
		echo "<pre>";
		//print_r($character);
		echo "</pre>";
		echo "<br/>";
		//echo is_array($character) ? 'Array' : 'not an Array';
		//echo count($character);die();
		

		$fp = fopen('file.csv', 'w');

		foreach ($character as $fields) {
			fputs($fp, $fields);
		}

		fclose($fp);
		
		/*$data = '[{"KSEISubAccountNo" : "LG001908700111"},{"KSEISubAccountNo" : "LG001895600158"}]';
			echo "<pre>";
		print_r($data);
		echo "</pre>";
		$character = json_decode($data,TRUE);
		echo "<pre>";
		
		print_r($character);
		echo "</pre>";
		
		*/

	}
	
	public function getCurlCsv(){
		$url = "http://localhost:8080/testla/rest-points/s21Service/QueryApuPptInv";
		//  Initiate curl
		$ch = curl_init();
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 40000); //timeout in seconds
		// Execute
		$result=curl_exec($ch);
		// Closing
		$result = str_replace('\"', '"', $result);
		$result = str_replace('\"', '"', $result);
		$result = str_replace(' ', '', $result);
		$result = str_replace('"[', '[', $result); 
		$result = str_replace(']"', ']', $result); 
		
		$result = json_decode($result,true);
		curl_close($ch);
		
		$fp = fopen('file.csv', 'w');

		foreach ($result as $fields) {
			fputs($fp, $fields);
		}

		fclose($fp);
			
		print_r("<pre>");
		print_r($result);
		print_r("</pre>");
	}
}