<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Message extends CI_Controller {

	 public function __construct(){

		parent::__construct();
	
		$this->load->model('message_model');

		$this->load->model('search_model');

	}
	 

	public function index( $userId = false ){
		
		$data['uid'] = $this->session->userdata('userId');
		$data['type'] = $this->session->userdata('user_type');
		
		
		$uid = $data['uid'];
		$user_type = $data['type'];
				
		//echo $uid." ".$user_type;
		
		$result =  $this->search_model->getName($uid, $user_type);
		$row = $result->row();
		$data['name'] = $row->fname.' '.$row->lname;
			  

		if($data['type']=='Doctor'){
			
			$data['user_1'] = 1;
			}
		else 	$data['user_1'] = 2;
			 
		if($data['uid']){
			
			$data['loggedIn'] = true;
			
			}
		
		
		//current sender will be reciver in DB and vice versa
		 
		$data['messages'] =  $this->message_model->getMessages($data['uid'],	$data['user_1']);
		
		
		if($data['type']=='Doctor'){
			
			$this->load->view('header/doctor_header.php',$data);
			$this->load->view('doctor/message.php',$data);
		}
		else 	{
			
			$this->load->view('header/patient_header.php',$data);
			$this->load->view('patient/message.php',$data);
		
		}
		
		$this->load->view('footer.php');
		
		
		}
	
	
	
	
	
	
	
	
	public function thread($from, $to, $user_1 = 1, $user_2 = 1){
		
		
		//user_1 sender user_2 reciever value 1=doc 2=patient
		
		
		//echo $from." ".$to." ".$user_1." ".$user_2;
		
		$data['uid'] = $this->session->userdata('userId');
		$data['type'] = $this->session->userdata('user_type');
		
		
		$uid = $data['uid'];
		$user_type = $data['type'];
		
		
		$result =  $this->search_model->getName($uid, $user_type);
	 	$row = $result->row();
  		$data['name'] = $row->fname.' '.$row->lname;
			  

		
		if($data['uid']){
			
			$data['loggedIn'] = true;
		  
			}
			
		$data['messages'] =  $this->message_model->getThread($from, $to, $user_1, $user_2);
		
		$data['from'] = $from;
		$data['to'] = $to;
		$data['user_1'] = $user_1;
		$data['user_2'] = $user_2;
		
		
		
		if($data['type']=='Doctor'){
			
			$this->load->view('header/doctor_header.php',$data);
			$this->load->view('doctor/thread.php',$data);
		}
		else 	{
			
			$this->load->view('header/patient_header.php',$data);
			$this->load->view('patient/thread.php',$data);
		}
	
		$this->load->view('footer.php');
		
		}








	public function sendMessage($from, $to, $message, $user_1 = 1, $user_2 = 1){
		
		$data['uid'] = $this->session->userdata('userId');
		$data['type'] = $this->session->userdata('user_type');
		
		$uid = $data['uid'];
		$user_type = $data['type'];
		
		
		$result =  $this->search_model->getName($uid, $user_type);
		$row = $result->row();
		$data['name'] = $row->fname.' '.$row->lname;
			  

		
		if($data['uid']){
			
			$data['loggedIn'] = true;
			}
		
		$message = preg_replace('/%([0-9a-f]{2})/ie', 'chr(hexdec($1))', (string)$message);
		
		//echo "chitiyapa";
		
		//echo "<div style='display:none' >".$message."</div>";
		
		$data['sent'] =  $this->message_model->sendMessage($from, $to, $message, $user_1, $user_2);
		
		
		redirect(base_url()."index.php/message/thread/".$from."/".$to."/".$user_1."/".$user_2);
		
				
		}
		
		
	public function poll($uid){
		
		
		$data['uid'] = $this->session->userdata('userId');
		
		if($uid != $data['uid']){
			
			die('invalid login');			}
		
		$data['messages'] =  $this->message_model->getNewMessages($uid);
	
		 if(count($data['messages'])>0){
			 
			 echo count($data['messages']);
			 die();
			 
			 }
		 else echo 0;
		 
		 die();
		 
		}

		

		

}






