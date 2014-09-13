<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_model');
	}
	
	public function start()
	{
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname', 'F name','required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('pass', 'Password', 'required|matches[mobile]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[patient_login.email]');
		
		
		if(isset($_POST['email'])&&$this->form_validation->run())
		$this->register_model->patient_start_reg();
		
		$this->load->view('register/registration_form.php');
	}
	
	
}
