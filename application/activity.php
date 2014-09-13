<?php 
session_start();



if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require "http://localhost/medicare/esotalk/ET.class.php"; 

class activity extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
			$username="amannot4u"; 
			$password="theykilledkenny"; 
			//init curl
			$ch = curl_init();
			
			//Set the URL to work with
			curl_setopt($ch, CURLOPT_URL, 'http://localhost/medicare/esotalk/user/curl_login');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$username.'&password='.$password );
			curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
			
			
			//Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
			//not to print out the results of its query.
			//Instead, it will return the results as a string return value
			//from curl_exec() instead of the usual true/false.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			//execute the request (the login)
			echo $store = curl_exec($ch);
				
			curl_close($ch);
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
			$url="http://localhost/notification/settings/notifications.view/1";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			echo $content = curl_exec($ch);
	
	
	}
	
	
	
	
	public function get()
	{
		
		 $this->load->helper('url');
 
	 
		//$this->load->view('test/header.php');
		//$this->load->view('test/get.php');
		//$this->load->view('footer.php');
		
	}
	
}
