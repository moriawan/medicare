<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class landing extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
	}
	
	 
	 
	public function index()
	{
		
	 
	 	$duration=15;
	 	$rate_appointment=60/$duration;;
		
	
		$data =  $this->doctor_model->get_doctor_schedule();
		
	
		 $day_name[0]="Monday";
		 $day_name[1]="Tuesday";
		 $day_name[2]="Wednesday";
		 $day_name[3]="Thrusday";
		 $day_name[4]="Friday";
		 $day_name[5]="Sauturday";
		 $day_name[6]="Sunday";
		 


		
		$uid = $this->session->userdata('userId');
		$name = $this->session->userdata('name');
	
	
		
		$data['day_name'] = $day_name;
	 	$data['data']=$data;
	 	$data['rate_appointment']=$rate_appointment;
		
		
		$data['name']=$name;
		
		
		$this->load->view('header/doctor_header.php',$data);
		$this->load->view('landing/doctor-landing.php',$data);
		$this->load->view('footer.php');

	}

public function process_appointment()
{
		$this->load->helper('url');
     	$this->load->helper('form');
	  
		
		$data['one']="true";
		
		$this->load->view('header.php');
		$this->load->view('process-appointment.php',$data);
		$this->load->view('footer.php');

	
	}


}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */