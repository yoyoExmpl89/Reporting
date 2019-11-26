<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportQueryDjpIvy extends CI_Controller {
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
		$this->load->view('ReportQueryDjpIvy_v',$data);
	}
	
	function getCsv(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_URL,"http://172.16.3.126:8080/testla/rest-points/s21Service/QueryDjpIvy");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
		$json_filename = curl_exec($ch);
		curl_close($ch);
		
		$csv_filename = 'data.csv';
		if (($json = file_get_contents($json_filename)) == false)
			die('Error reading json file...');
		$data = json_decode($json, true);
		$fp = fopen($csv_filename, 'w');
		$header = false;
		foreach ($data as $row)
		{
			if (empty($header))
			{
				$header = array_keys($row);
				fputcsv($fp, $header);
				$header = array_flip($header);
			}
			fputcsv($fp, array_merge($header, $row));
		}
		fclose($fp);
		
		//$someJSON = '[{"name":"Jonathan Suh","gender":"male"},{"name":"William Philbin","gender":"male"},{"name":"Allison McKinnery","gender":"female"}]';

	/*	$someArray = json_decode(file_get_contents($baseUrl),true); 
		print_r($someArray);        // Dump all data of the Array
		echo $someArray[0]["ClientID"]; // Access Array data

  // Convert JSON string to Object
		$someObject = json_decode($someArray);
		print_r($someObject);      // Dump all data of the Object
		echo $someObject[0]->ClientID; // Access Object data
	
		$jsondata = file_get_contents("http://172.16.3.126:8080/testla/rest-points/s21Service/QueryDjpIvy");
		
		$json = json_decode($jsondata, true);
		//echo $json["ClientID"];die();
		//echo count($json[0]);die();
		print_r($json);die();
		$csvHeader=array();
		$csvData=array();
		$csvFileName = 'file.csv';
		$fp = fopen($csvFileName, 'w');
		$counter=0;
		foreach($json as $key => $value)
		{
			jsontocsv($value);
			if($counter==0)
			{
				fputcsv($fp, $csvHeader);
				$counter++;
			}
			fputcsv($fp, $csvData);
			$csvData=array();
		}
		fclose($fp);
		*/
	}
	
	function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

	function get_Csv(){
		
		$profile = file_get_contents("https://api.github.com/users/petanikode");

		// ubah string JSON menjadi array
		$profile = json_decode($profile, TRUE);

		echo "<pre>";
		print_r($profile);
		echo "</pre>";
	}

	function jsonToCSV($jfilename, $cfilename)
	{
		if (($json = file_get_contents($jfilename)) == false)
			die('Error reading json file...');
		$data = json_decode($json, true);
		$fp = fopen($cfilename, 'w');
		$header = false;
		foreach ($data as $row)
		{
			if (empty($header))
			{
				$header = array_keys($row);
				fputcsv($fp, $header);
				$header = array_flip($header);
			}
			fputcsv($fp, array_merge($header, $row));
		}
		fclose($fp);
		return;
	}
}
