<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	 public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('permissions_model');
		$this->load->model('doctor_model');
		$this->load->model('patient_model');
		
   
	}
	
	public function index($userId=false)
	{
		
		if($userId==false)
		redirect(base_url().'index.php');
		
		$uid=false;
		$uid = $this->session->userdata('userId');
		$user_type = $this->session->userdata('user_type');
		
		if($uid&&$user_type=='Doctor'){
			
			$data['uid']=$uid;
			if(!$uid)$data['loggedIn']=false;
			else  $data['loggedIn']=true ;
			$access = $this->permissions_model->getPermission($userId,$uid);
			
			if($access){
				
				// Appointment View data 
				
				$apps =  $this->patient_model->appointments($userId);
	
	
				for($i=0;$i<sizeof($apps);$i++)
					{
						
						$doctor =  $this->patient_model->getDoctor($apps[$i]['doctor_id']);
						$apps[$i]['doctor'] = $doctor[0];
						
					}
				
				$data['apps']=$apps;
				

				$data['patient']= $this->patient_model->get_profile($userId);
				
				
				$this->load->view('header/patient_header.php',$data);
				$this->load->view('profile/doctor.php',$data);
				$this->load->view('footer.php');
			
				}
				else {
				
				die('Access Dennied ');
				
					
				}
			
			
			
			}
		else if($uid&&$user_type=='Patient') {
				
			$data['uid']=$uid;
			if(!$uid)$data['loggedIn']=false;
			else $data['loggedIn']=true;
			
			$dataRequest = array() ;
			$temp = $this->permissions_model->patientRequest($uid);
			$cnt=0 ;
			foreach($temp as $row){
				
				$pid = $row->doctor_id ;
				$dataRequest[$cnt++]  = $this->doctor_model->getDoctorProfile($pid) ;

			}
			
			$temp = $this->permissions_model->patientAllowed($uid);
			
			$dataAllowed = array() ;
			$cnt = 0 ;
			foreach($temp as $row){
				
				$pid = $row->doctor_id ;
				$dataAllowed[$cnt++]  = $this->doctor_model->getDoctorProfile($pid) ;

			}
			
			
			$data['Allowed']= $dataAllowed ;
			$data['Requests'] = $dataRequest ;
			
		
			$this->load->view('header.php',$data);
			$this->load->view('permissions/patient.php',$data);
			$this->load->view('footer.php');
			
				
				
			}
			

	}

	
	
}
