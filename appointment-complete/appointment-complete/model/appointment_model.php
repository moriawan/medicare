<?php

class Appointment_model extends CI_Model {


    function __construct()
    {
		
		//please configure curn URL
        // Call the Model constructor
        parent::__construct();
        
		$this->load->database();
		
    }
	
	
	function doctor_get_today(){
		
		
		$userId = 1 ; //$this->session->userdata('userId');
		$result['doctor_id'] = $userId ; 
		$this->db->where($result);
		$this->db->where('appointment_time >', date('Y-m-d 00:00:00')); 
		$this->db->where('appointment_time <', date('Y-m-d 23:59:59')); 
		$query = $this->db->get('appointment_slots'); 
		$i = 0  ;
		
		foreach ($query->result() as $row)
		{
			$i++ ;
			$data['row'.$i] =  $this->get_appointment($row->transaction_id);
		}
		
		return $data ; 
		
	}
	
	
	function get_appointment($trans){
		
		$result['transaction_id'] = $trans ;
		$query = $this->db->where($result);
		$query = $this->db->get('appointment'); 
		$result = $query->row_array();
	
		$data['patient_id'] = $result['patient_id'] ;
		$data['appointment_time'] = $result['appointment_time' ] ;
		$data['problem'] = $result['problem'];
		$temp['patient_id'] =  $result['patient_id'] ; 
		$query = $this->db->where($temp);
		$query = $this->db->get('patient_login'); 
		$result = $query->row_array();
		
		$data['patient_name'] = $result['fname']." ".$result['lname'] ;
		
		return $data ;
		
	}
	
	
	
	
	function get_appointment_diagnosis($trans){
		
		$result['diagnosis_id'] = $trans ;
		
		$query = $this->db->where($result);
		$query = $this->db->get('diagnosis'); 
		$result = $query->row_array();
		
		$data['problem'] = $result['problem']; 
        $data['symptoms'] = $result['symptoms'];
		$data['diagnosis'] = $result['diagnosis']; 
        $data['medication'] = $result['medication'];
		$data['medication_time'] = $result['medication_time'];
		$data['medication_special'] = $result['medication_special'];
		$data['recommendation'] = $result['recommendation'];
		$data['blood_presure'] = $result['blood_presure'];
		$data['heart_beat'] = $result['heart_beat']; 
        $data['temperature'] = $result['temperature'];
        $data['other'] = $result['other'];
					
		return $data ;
	
	}
	
	function book_appointment($data){
	
		$result['patient_id'] = $data['patient_id'] ;
		$result['doctor_id'] = $data['doctor_id'] ;
		$result['lab_transaction_id'] = "" ;
		$result['transaction_status'] = "1" ;
		$result['problem'] = $data['problem'] ;
		$result['appointment_time'] = $data['appointment_time'] ;
		$this->db->insert('appointment' , $result );
		$this->db->where($result) ;
		$query = $this->db->get('appointment');
		$query = $query->row_array();
		$trans = $query['transaction_id'] ;
		
		$result1['transaction_id'] = $trans ;
		$result1['doctor_id'] = $data['doctor_id'] ;
		$result1['appointment_time'] = $data['appointment_time'] ;
		$this->db->insert('appointment_slots' , $result1 );
		
		
	}
	
	
	
	
}