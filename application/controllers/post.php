<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Post extends CI_Controller {

	

	 public function __construct()

	{

		parent::__construct();

		

		

		$this->load->model('esotalk_model');

	
	}

	

	  public function index($post, $appointment = 0){
		
		
		//die($appointment);
		
		switch($appointment){
			
			case 0: $conversation = $this->esotalk_model->getConversationFromPost($post);		
					redirect(base_url()."index.php/feeds/myfeeds/".$conversation[0]->conversationId);
					break;
			
			case 1: redirect(base_url()."index.php/doctor/process_appointment?trans=".$post);
			
					break;
			case 2: //die("location:".base_url()."index.php/doctor/process_eAppointment/".$post);
					redirect(base_url()."index.php/doctor/process_eAppointment/".$post);
			
					break;
			case 3: redirect(base_url());
			
					break;
			case 4: redirect("index.php/patient/appointment/".$post);
			
					break;
			case 5: redirect(base_url()."index.php/permissions");
			
					break;
			case 6: redirect(base_url()."index.php/permissions");
			
					break;
			default : redirect(base_url());
			}
		
		
		if($appointment){
			
			header("location:".base_url()."index.php/doctor/process_appointment?trans=".$post);
			
			}
		else {
			
			//die($post);
			
			$conversation = $this->esotalk_model->getConversationFromPost($post);		
			header("location:".base_url()."index.php/feeds/myfeeds/".$conversation[0]->conversationId);
			
			}
		
		
		}	
	
}