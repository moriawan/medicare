<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notifications extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	
	}
	
	
	
	public function get()
	{
		
		$this->load->view('header.php');
		$this->load->view('test/get.php');
		$this->load->view('footer.php');
		

	}}
	



?>