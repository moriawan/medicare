<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment extends CI_Controller {
	
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
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
		$result =  $this->doctor_model->get_doctor_slots($doc); 
		
		$data['doc_id'] = $doc ;
		//json_encode($result) ;
		$data['result'] = $result ;
		$this->load->view('appointment/appointment-doctor-header.php' , $data);
		$this->load->view('appointment/appointment-doctor.php',$data);
		$this->load->view('footer.php');

	
	}
	
public function confirm_booking()
	{
			
		
		
		
	  	$data = $this->doctor_model->get_profile();
		$data['one']="true";
		//$result =  $this->doctor_model->get_doctor_slots(); 
		//json_encode($result) ;
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
		
		//$data['result'] = $result ;
		$this->load->view('header.php' , $data);
		$this->load->view('appointment/appointment-confirm.php',$data);
		$this->load->view('footer.php');

	
	}
	
public function booking()
	{

	  	$this->load->model('appointment_model');
		$data['one']="true";
		
		$query['patient_id'] = $this->session->userdata('userId');
		$query['doctor_id'] = $_POST['doctor_id'];
		$query['appointment_time'] = $_POST['appointment_time'];
		$query['problem'] = $_POST['problem'];
		
		$this->appointment_model->book_appointment($query) ;
		$data = $this->doctor_model->get_profile();
		
		$this->load->view('header.php' , $data);
		$this->load->view('appointment/appointment-book.php',$data);
		$this->load->view('footer.php');

	
	}

	
	
	
	
}
