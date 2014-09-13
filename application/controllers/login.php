<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller {	 

	 public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('form');
	  	$this->load->library('form_validation');
	}

	

	function index($rediect = false ) {
		
		if($rediect==false)
		$rediect = base_url() ;
		
		$rediect=preg_replace("/\//","-",$rediect);
		$rediect=preg_replace("/\?.*/","",$rediect);
		$rediect=preg_replace("/\-p[0-9]+/","",$rediect);
		
		$medicare=base_url();

		$medicare=preg_replace("/\//","-",$medicare);
		
		$medicare=preg_replace("/\?.*/","",$medicare);
		
		$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
		
		$data['loggedIn'] = false ;

		$this->form_validation->set_rules('Username', 'User name','required');
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[6]|max_length[20]|md5');
		$this->form_validation->set_rules('user_type', 'Type', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			//LOAD THE LOGIN PAGE
			//echo "verification fail" ;
			
			if($this->input->get_post('user_type', TRUE)=='doctor')
			$data['docErrors'] = "Blank Username/Password" ;
			if($this->input->get_post('user_type', TRUE)=='patient')
			$data['patErrors'] = "Blank Username/Password" ;
			
			
			$this->load->view('header/base-header.php',$data);
			$this->load->view('login/common.php',$data);
			$this->load->view('footer.php');

		}

		else{
		

			$data['user_type'] = $this->input->get_post('user_type', TRUE);
			$data['Username'] = $this->input->get_post('Username', TRUE);
			$data['Password'] = $this->input->get_post('Password', TRUE);		


		if($data['user_type']=="patient"){
				
				//Perform Local login
				
				$LocalSuccess = $this->login_model->patient_login($data) ;
				// Perform Remote login
				
				if($LocalSuccess)
				{
				redirect(base_url().'esotalk/user/remote_login?Username='.$data['Username'].'&Password='.$data['Password']."&redirect=".$rediect."&medicare=".$medicare);
				}
				else{
					
					// Echo Incorrect Login 
					
					$data['patErrors'] = "Invalid Username/Password" ;
					
					// Load the Login page Again
					
					$this->load->view('header/base-header.php',$data);
					$this->load->view('login/common.php',$data);
					$this->load->view('footer.php');
					
				}
				
			}

		if($data['user_type']=="doctor"){
				
				//Perform Local login
				$LocalSuccess = $this->login_model->doctor_login($data) ;
				// Perform Remote login
				
				if($LocalSuccess)
				{
				redirect(base_url().'esotalk/user/remote_login?Username='.$data['Username'].'&Password='.$data['Password']."&redirect=".$rediect."&medicare=".$medicare);
				}
				else{
					
					// Echo Incorrect Login 
					$data['docErrors'] = "Invalid Username/Password" ;
					// Load the Login page Again
					
					$this->load->view('header/base-header.php',$data);
					$this->load->view('login/common.php',$data);
					$this->load->view('footer.php');
					
					
							
				}			
			}	
		}
	
	}
	

	function redirect(  $uid=false, $token=false , $redirectURL =false){
		if($uid == false){
			//("Login Fail");
			$this->session->sess_destroy();
			redirect(base_url()."index.php/login");
					
		}
		else if($redirectURL){
			
			//echo("Login Success");
			$this->session->set_userdata('eso_token',$token);
			$this->session->set_userdata('eso_id',$uid);
			$redirectURL=preg_replace("/\-/","/",$redirectURL);
			redirect($redirectURL);
			
		}
		else{
			//echo("Login Success ");
			$this->session->set_userdata('eso_token',$token);
			$this->session->set_userdata('eso_id',$uid);
			$redirect = base_url() ;
			redirect($redirectURL);
			
			
		}

	}
	
	function test(){
		
		$data['test'] = "Testing" ;
		$data['loggedIn'] = false ;
		$this->load->view('header/base-header.php',$data);
		$this->load->view('login/common.php',$data);
		$this->load->view('footer.php');
					
		
		
	}

}

	

	 