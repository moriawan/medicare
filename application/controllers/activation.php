<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activation extends CI_Controller {
	 
	 
public function __construct(){
	
		parent::__construct();
		$this->load->model('activation_model');
		
}
	
	 
	 
	public function doctor($id=slase,$slug=false)
	{
     	
		if($slug==false)
		die('Error No Token Found') ;
		
		$result = $this->activation_model->activateProfile($id, $slug) ;
		if($result == "Activated")
		$data['result'] = "Your Account Has been Successfully activated." ;
		if($result == "Already Activated")
		$data['result'] = "Your Account is already activated." ;
		if($result == "Invalid Activation")
		$data['result'] = "Invalid Activation" ;
		
		$data['loggedIn'] = false ;

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/doctor.php',$data);
		$this->load->view('footer.php');

	}
	
	
	public function patient($id=slase,$slug=false)
	{
		if($slug==false)
		die('Error No Token Found') ;
		
		$result = $this->activation_model->activatePatientProfile($id, $slug) ;
		if($result == "Activated")
		$data['result'] = "Your Account Has been Successfully activated." ;
		if($result == "Already Activated")
		$data['result'] = "Your Account is already activated." ;
		if($result == "Invalid Activation")
		$data['result'] = "Invalid Activation" ;
		
		$data['loggedIn'] = false ;

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/patient.php',$data);
		$this->load->view('footer.php');

	}
	
	
	public function doctor_reset($id=slase,$slug=false)
	{
		$this->load->helper('form');
	    $this->load->helper('url');
		
		if($slug==false)
		die('Error No Token Found') ;
		
		$data['actcode']=$slug ;
		$data['doctor_id'] = $id ;
		
		$result = $this->activation_model->resetDoctorPassword($id, $slug) ;
		if($result == "Activated")
		$data['result'] = true ;
		if($result == "Invalid Activation")
		$data['result'] = false ;
		
		$data['loggedIn'] = false ;

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/doctor_reset_pass.php',$data);
		$this->load->view('footer.php');

	}
	
	
	public function doctor_change_pass()
	{	
		$this->load->helper('form');
	    $this->load->helper('url');
     	$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|matches[pass2]|min_length[6]|max_length[20]|md5');
		
		if($this->form_validation->run()){
			
			$actcode=$_POST['actcode'];
			$password = $_POST['pass'] ;
			$id = $_POST['doctor_id'] ;
			
			$result = $this->activation_model->changeDoctorPassword($id, $actcode, $password ) ;
			
			$data['result'] = true ;
 		}
		else{
			$data['result'] = false ;			
		}

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/doctor_success_pass.php',$data);
		$this->load->view('footer.php');

	}
	
	public function doctor_forgot_pass()
	{
		$this->load->helper('form');
		if(isset($_REQUEST['email']))
		{
			$email = $_REQUEST['email'] ;
			
			$result = $this->activation_model->requestChangeDoctorPassword($email) ;
			
			$data['result'] = false ;
			$data['response'] = $result ;
		}
		else
			$data['result'] = true ;
		
		$data['loggedIn'] = false ;

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/doctor_forgot_pass.php',$data);
		$this->load->view('footer.php');



	}
	
	
	public function patient_reset($id=slase,$slug=false)
	{
		if($slug==false)
		die('Error No Token Found') ;
		
		$result = $this->activation_model->resetPatientPassword($id, $slug) ;
		if($result == "Activated")
		$data['result'] = true ;
		if($result == "Already Activated")
		$data['result'] = false ;
		if($result == "Invalid Activation")
		$data['result'] = false ;
		
		$data['loggedIn'] = false ;

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/patient_forgot_pass.php',$data);
		$this->load->view('footer.php');

	}
	
	public function patient_change_pass($id=slase,$slug=false)
	{

		
		$result = $this->activation_model->resetDoctorPassword($id, $slug) ;
		if($result == "Activated")
		$data['result'] = true ;
		if($result == "Already Activated")
		$data['result'] = false ;
		if($result == "Invalid Activation")
		$data['result'] = false ;
		
		$data['loggedIn'] = false ;

				
		$this->load->view('header/base_header.php',$data);
		$this->load->view('activation/doctor_reset_pass.php',$data);
		$this->load->view('footer.php');

	}


}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */