<?php

class Login_model extends CI_Model {


    function __construct()
    {
		
		//please configure curn URL
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		
    }
	
	
	function doctor_login($data){
		
		$this->session->sess_destroy();
		
		$result['email'] = $data['Username'] ; 
		$result['password'] = $data['Password'] ;
		
		$query = $this->db->where($result);
		
		if($this->db->count_all_results('doctors_login')==1){
			
			$query = $this->db->where($result);
		
			$query = $this->db->get('doctors_login'); 
			$query = $query->row_array();
			
			$newdata = array(
                   'userId'  => $query['doctor_id'],
                   'email'     => $query['email'] ,
                   'logged_in' => TRUE ,
				   'user_type' => 'Doctor'
               );
			   
			$this->session->set_userdata($newdata);
			$ch = curl_init();

			//Set the URL to work with
			curl_setopt($ch, CURLOPT_URL, 'http://localhost/medicare/esotalk/user/curl_login');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$data['Username'].'&password='.$data['Password'] );
			curl_setopt($ch, CURLOPT_COOKIEJAR, 'mymedicare.txt');
			
			//Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
			//not to print out the results of its query.
			//Instead, it will return the results as a string return value
			//from curl_exec() instead of the usual true/false.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			//execute the request (the login)
			$store = curl_exec($ch);
			list($eso_uid,$eso_token) = explode(":" , $store );
			$eso_data = array('eso_token' => $eso_token , 
								'eso_uid' =>  $eso_uid
								);
								
			$this->session->set_userdata($eso_data);
			
			return true ;
		}
		
		return false ;
		
	}
	
	
	function patient_login($data){
		
		$this->session->sess_destroy();
		
		$result['email'] = $data['Username'] ; 
		$result['password'] = $data['Password'] ;
		
		$query = $this->db->where( $result);
		
		if($this->db->count_all_results('patient_login')==1){
		
			$query = $this->db->get('patient_login'); 
			$query = $query->row_array();
			
			$newdata = array(
                   'userId'  => $query['patient_id'],
                   'email'     => $query['email'] ,
                   'logged_in' => TRUE ,
				   'user_type' => 'Patient'
               );
			   
			$this->session->set_userdata($newdata);
			
			$ch = curl_init();

			//Set the URL to work with
			curl_setopt($ch, CURLOPT_URL, 'http://localhost/medicare/esotalk/user/curl_login');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$data['Username'].'&password='.$data['Password'] );
			curl_setopt($ch, CURLOPT_COOKIEJAR, 'mymedicare.txt');
			
			//Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
			//not to print out the results of its query.
			//Instead, it will return the results as a string return value
			//from curl_exec() instead of the usual true/false.
		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			//execute the request (the login)
			$store = curl_exec($ch);
			list($eso_uid,$eso_token) = explode(":" , $store );
			$eso_data = array('eso_token' => $eso_token , 
								'eso_uid' =>  $eso_uid ) ;
			$this->session->set_userdata($eso_data);
			
			
			return true ;
		}
	
	return false ; 	
	
	}
	
}