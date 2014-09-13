<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Register extends CI_Controller {


	public function __construct()
	{

		parent::__construct();

		

		$this->load->model('register_model');
		$this->load->model('login_model');

		$this->load->helper('form');

	    $this->load->helper('url');

     	$this->load->library('form_validation');

	}

	

	

	

	public function patient_register()

	{


		$data['user_type'] = 'Patient'; 

		$this->load->view('header.php');

		$this->load->view('register/common-register.php', $data);

		$this->load->view('footer.php');

		

	}

	

	public function patient_register_2()

	{

		

     	$this->form_validation->set_rules('fname', 'First name','required|alpha');

		$this->form_validation->set_rules('lname', 'Last name','required|alpha');

		$this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[pass2]|min_length[6]|max_length[20]|md5');

		$this->form_validation->set_rules('pass2', 'Confirm Password','required');

		$this->form_validation->set_rules('mobile', 'Mobile', 'required|exact_length[10]');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[patient_login.email]');

		


		if($this->form_validation->run()){

			

			
		$data['user_type'] = 'Patient';
		$data['Username'] = $this->input->get_post('email', TRUE);
		
	 	

		$register_return =  $this->register_model->patient_start_reg();
		
		
		$data['id'] = $register_return['uid'];
		$data['Password'] = $register_return['password'];
		
		
			$newdata = array(

                   'userId'  => $data['id'],

                   'email'     => $_POST['email'] ,

                   'logged_in' => FALSE,
				   
				   'user_type' => $data['user_type']  

				   
               );
			
			
			$success = $this->login_model->patient_login($data) ;
			
			
			$medicare = base_url()."index.php-register-patient_welcome";
			$medicare=preg_replace("/\//","-",$medicare);

			$medicare=preg_replace("/\?.*/","",$medicare);
			
			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
			
			

			redirect(base_url().'esotalk/user/curl_login?Username='.$data['Username'].'&Password='.$data['Password']."&medicare=".$medicare);



			//$this->session->set_userdata($newdata);

			

			$this->load->view('header.php');

			$this->load->view('register/patient-register-2.php');

			$this->load->view('footer.php');

		}

		else{

		 

			$data['user_type'] = 'Patient'; 

			$this->load->view('header.php');

			$this->load->view('register/common-register.php', $data);

			$this->load->view('footer.php');

			

		}

		

	}

	

	

	public function patient_welcome()

	{

		

     	

     	$this->form_validation->set_rules('martial_status', 'Martial Status','required|alpha');

		$this->form_validation->set_rules('age', 'Age','required|numeric');

		$this->form_validation->set_rules('chronic_illness', 'Chronic Illness','alpha_numeric');

		$this->form_validation->set_rules('blood_type', 'Blood Type', 'required');

		

		$data['user_type'] = 'Patient'; 

	 	

		if($this->form_validation->run()){

			$uid = $this->session->userdata('userId');

			$this->register_model->patient_profile_reg($uid);

			redirect(base_url()."index.php/patient/edit_profile");
		}

		else{

		 

			$this->load->view('header.php');

			$this->load->view('register/patient-register-2.php', $data);

			$this->load->view('footer.php');

			

		}

		

	}

	

	

	public function doctor_register()

	{

		

	

		$data['user_type'] = 'Doctor'; 

		$this->load->view('header.php');

		$this->load->view('register/common-register.php', $data);

		$this->load->view('footer.php');

		

	}

	

	

	

	public function doctor_form_2()

	{

		

		
		$cities =  $this->register_model->getCities();
		$speciality =  $this->register_model->getSpecialities();
		
		
		$data['cities'] = $cities;
		$data['speciality'] = $speciality;
		
	 	
		 $day_name[0]="Monday";

		 $day_name[1]="Tuesday";

		 $day_name[2]="Wednesday";

		 $day_name[3]="Thursday";

		 $day_name[4]="Friday";

		 $day_name[5]="Saturday";

		 $day_name[6]="Sunday";

		 

		

		$data['day_name']=$day_name;

		

		$this->form_validation->set_rules('fname', 'First name','required|alpha');

		$this->form_validation->set_rules('lname', 'Last name','required|alpha');

		$this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[pass2]|min_length[6]|max_length[20]|md5');

		$this->form_validation->set_rules('pass2', 'Confirm Password','required');

		$this->form_validation->set_rules('mobile', 'Mobile', 'required|exact_length[10]');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[patient_login.email]');

	



		if(isset($_POST['email'])&&$this->form_validation->run())

		{


			$data['user_type'] = 'Doctor'; 
			$data['Username'] = $this->input->get_post('email', TRUE);
		
	 	
			
			

			$register_return =  $this->register_model->insert_start_reg();
	
			$data['id'] = $register_return['uid'];
			$data['Password'] = $register_return['password'];
		
		
		
			
			$newdata = array(

                   'userId'  => $data['id'],

				   'email'     => $_POST['email'] ,

                   'logged_in' => FALSE,
				   'user_type' => 'doctor'

               );



			$success = $this->login_model->doctor_login($data) ;
			
			
			$medicare = base_url()."index.php-register-doctor_form_3";
			$medicare=preg_replace("/\//","-",$medicare);

			$medicare=preg_replace("/\?.*/","",$medicare);
			
			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
			
			

			redirect(base_url().'esotalk/user/curl_login?Username='.$data['Username'].'&Password='.$data['Password']."&medicare=".$medicare);


			$sess_array = $this->session->all_userdata();

			//echo $sess =  json_encode($sess_array);

			

			

		//	die('control');

			

			$this->load->view('header/header-location.php', $data);

			$this->load->view('register/doctor-register-2.php',$data);

			$this->load->view('footer.php');

		

		

		}

		else{

	 		

			

			$this->load->view('header.php');

			$this->load->view('register/common-register.php', $data);

			$this->load->view('footer.php');

		

		}

	}

	

	public function doctor_form_3()

	{

		

		 $day_name[0]="Monday";

		 $day_name[1]="Tuesday";

		 $day_name[2]="Wednesday";

		 $day_name[3]="Thursday";

		 $day_name[4]="Friday";

		 $day_name[5]="Saturday";

		 $day_name[6]="Sunday";

		 

		$cities =  $this->register_model->getCities();
		$speciality =  $this->register_model->getSpecialities();
		
		
		$data['cities'] = $cities;
		$data['speciality'] = $speciality;
		

		$data['day_name']=$day_name;

		

	

		$this->form_validation->set_rules('doc_fee', 'Doctor Fee','required|numeric');

		$this->form_validation->set_rules('doc_duration', 'Apointment Duration','required|numeric');

		$this->form_validation->set_rules('doc_city', 'City', 'required|max_length[20]');

		$this->form_validation->set_rules('doc_state', 'State', 'required');

		$this->form_validation->set_rules('doc_add', 'Address', 'required');

		$this->form_validation->set_rules('doc_land', 'Landmark', 'required');

		$this->form_validation->set_rules('doc_speciality', 'Speciality', 'required');

		//$this->form_validation->set_rules('doc_lati', 'Email', 'required|valid_email|is_unique[patient_login.email]');

		

		//echo $_POST['doc_fee'];

		

	if(isset($_POST['doc_fee'])&&$this->form_validation->run())

	{

		$uid = $this->session->userdata('userId');

		$this->register_model->insert_complete_reg($uid);

		$this->register_model->insert_doctor_schedule($uid);

	

		$this->load->helper('form');

	    $this->load->helper('url');

	 

		$this->load->view('header.php');

		$this->load->view('register/doctor-register-3.php');

		$this->load->view('footer.php');

		

	}

	else{

		$sess_array = $this->session->all_userdata();

		//echo $sess =  json_encode($sess_array);

		$this->load->view('header/header-location.php',$data);

		$this->load->view('register/doctor-register-2.php');

		$this->load->view('footer.php');

		

	}

	

	}

	

	public function doctor_welcome()

		{

		$this->form_validation->set_rules('doctor_grad_degree', 'Graduation','required');

		$this->form_validation->set_rules('doctor_grad_year', 'Graduation','required');

		$this->form_validation->set_rules('doctor_grad_college', 'Graduation','required');

	

		$data['user_type'] = 'Doctor'; 

	 	

	    if($this->form_validation->run()){

			$uid = $this->session->userdata('userId');

			$this->register_model->insert_profile_reg($uid);

			redirect(base_url()."index.php/doctor/edit_profile");
	
		}

		else{

			

		$this->load->view('header.php');

		$this->load->view('register/doctor-register-3.php');

		$this->load->view('footer.php');

			

		}

		

	}

	

}

