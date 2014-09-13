<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends CI_Controller {
	
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
		$this->load->model('appointment_model');
		$this->load->model('patient_model');
		$this->load->helper('url');
     	$this->load->helper('form');
	}
	
	 
	public function index()
	{
	    

	}
	
	


public function doctor_profile()
	{
		
		if($this->input->get_post('doc', TRUE))
			{
				$doc = $this->input->get_post('doc', TRUE) ;	
			}
	  	$data = $this->doctor_model->get_profile($doc);
		$data['one']="true";
		$temp = $this->doctor_model->get_profile_other($doc);
		
		$data['experience'] = $temp['experience'] ;
		$data['awards'] = $temp['awards'] ;
		$data['certifications'] = $temp['certifications'];
		
		
		$temp = $this->doctor_model->get_doctor_slots_second($doc);
		if($temp==false){
			$data['secSlots'] = false ; 
			$data['secLocation'] = false ;
		}
		else{
			
			$data['secSlots'] = $temp ;
			$data['secLocation'] = $this->doctor_model->get_second_address($doc);
			
		}
		
		
		
		
		
		
		$result =  $this->doctor_model->get_doctor_slots($doc); 
		$data['doc_id'] = $doc ;
		$data['result'] = $result ;
		
		$this->load->view('appointment/appointment-doctor-header.php' , $data);
		$this->load->view('appointment/appointment-doctor.php',$data);
		$this->load->view('footer.php');

	
	}
	
public function confirm_booking()
	{
			
		
		if($data['doc_id']=$this->input->get_post('doc_id', TRUE))
		{
			$data = $this->doctor_model->get_profile($data['doc_id']);
				}
		if($this->input->get_post('date', TRUE))
				{
						$data['date']  =$this->input->get_post('date', TRUE) ;	
				}
		if($this->input->get_post('time', TRUE))
				{
						$data['time']  =$this->input->get_post('time', TRUE) ;	
				}
		if($this->input->get_post('doc_id', TRUE))
				{
						$data['doc_id']  =$this->input->get_post('doc_id', TRUE) ;	
				}	
		
	
		$data['one']="true";
		
		$this->load->view('header.php' , $data);
		$this->load->view('appointment/appointment-confirm.php',$data);
		$this->load->view('footer.php');

	
	}
	
public function booking()
	{

	  	$this->load->model('appointment_model');
		
		$data['one']="true";
		
		if($query['patient_id'] = $this->session->userdata('userId')){
			
			$query['doctor_id'] = $_POST['doctor_id'];
			$query['appointment_time'] = $_POST['appointment_time'];
			$query['problem'] = $_POST['problem'];
			
			$this->appointment_model->book_appointment($query) ;
			$data = $this->doctor_model->get_profile($query['doctor_id']);
			
			$this->load->view('header.php' , $data);
			$this->load->view('appointment/appointment-book.php',$data);
			$this->load->view('footer.php');
		
		}
		else {
			
			// Redirect to Login url 
			
			
			
		}
	
	}

public function eAppointmentBooking($tid)

	{

		if($query['patient_id'] = $this->session->userdata('userId')){

		$query['doctor_id'] = $_POST['doctor_id'];
		$query['problem'] = $_POST['problem'];
		$query['tid'] = $tid;

		$data = $this->doctor_model->get_profile($query['doctor_id']);

		$data['followUpId'] = $this->appointment_model->book_eAppointment($query) ;

		$this->load->view('header.php' , $data);

		$this->load->view('appointment/e-appointment-book.php',$data);

		$this->load->view('footer.php');

		

		}

		else {	
			die('u need to be logged in to book appointment');
		}
	}
	

	public function eAppointmentConfirm($tid)

	{

		$doctor_id = $this->appointment_model->getDoctorId($tid);


		$uid = false;

		$uid = $this->session->userdata('userId');		

		if(!$uid){

			die('Ded, no login');

		}

		$data = $this->doctor_model->get_profile($doctor_id);

		$data['doctor_id'] = $doctor_id;

		$data['tid'] = $tid ;
		$data['one']="true";

		$this->load->view('header.php' , $data);
		$this->load->view('appointment/e-appointment-confirm.php',$data);
		$this->load->view('footer.php');
	

	}

	
	
	
	
}
