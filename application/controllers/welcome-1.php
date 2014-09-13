<?php 
session_start();



if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require "http://localhost/medicare/esotalk/ET.class.php"; 

class welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
	
	}
	
	public function index(){
		
		
   	    $this->load->helper('url');
 		
		
		
		$this->load->view('test/header.php');
		
		$this->load->view('footer.php');
	
		
		
		}
	
	
}
