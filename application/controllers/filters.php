<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filters extends CI_Controller {
	
	 public function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
		$this->load->model('filter_model');
	}
	
	 
	public function index()
	{
		
		$uid = $this->session->userdata('userId');
		$this->load->helper('form');
		
		if(!$uid){
			
			$data['loggedIn']=false;
			}
		else $data['loggedIn']=true;
		
		
	    if($this->input->get_post('fee', TRUE))
			{
				$data['fee'] = $this->input->get_post('fee', TRUE) ;	
			}
		if($this->input->get_post('availability', TRUE)&&$this->input->get_post('availability', TRUE)!='0000000')
			{
				$data['availability'] = $this->input->get_post('availability', TRUE) ;	
			}
		if($this->input->get_post('time', TRUE))
			{
				$data['time'] = $this->input->get_post('time', TRUE) ;	
			}
			
		if($this->input->get_post('city', TRUE))
			{
				$data['city'] = $this->input->get_post('city', TRUE) ;	
			}
			
		if($this->input->get_post('state', TRUE))
			{
				$data['state'] = $this->input->get_post('state', TRUE) ;	
			}

		if($this->input->get_post('speciality', TRUE))
			{
				$data['speciality'] = $this->input->get_post('speciality', TRUE) ;	
			}		
		
		
		$ids = $this->filter_model->getDocIds($data);
		
		$profile = array(); 
		$lati = array() ;
		$long = array() ;
		for($i=0 ; $i < sizeof($ids) ; $i ++ ){
		
			$profile[$i] = $this->doctor_model->get_profile($ids[$i]);
			$profile[$i]['doctor_id'] = $ids[$i] ;
			$lati[$i] = $profile[$i]['latitude'] ;
			$long[$i] = $profile[$i]['longitude'] ;
			
		}
		
		//echo json_encode($profile) ;
		
		$data['profile'] = $profile ;
		$data['lati'] = $lati ;
		$data['long' ] = $long ;
				
		$this->load->view('header/filter-header.php',$data);
		
		$this->load->view('filters/filter_header.php');

		$this->load->view('filters/filtersearch.php',$data);
		
		$this->load->view('filters/filter_footer.php');
		
		$this->load->view('footer.php');

	}
	
	
}
