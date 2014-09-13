<?php
class Appointment_model extends CI_Model {


    function __construct()
    {
		
		//please configure curn URL
        // Call the Model constructor
        parent::__construct();
        
		$this->load->database();
		$this->db_notif = $this->load->database("noti" , TRUE);

    }
	
	
	function doctor_get_today(){
		
		$userId = $this->session->userdata('userId');
		
		if(!$userId){
			
			die('not logged in, ded x_x');
			
			}
		
		
		$result['doctor_id'] = $userId; 
		$this->db->where($result);
		$this->db->where('appointment_time >', date('Y-m-d 00:00:00')); 
		$this->db->where('appointment_time <', date('Y-m-d 23:59:59')); 
		$query = $this->db->get('appointment_slots');
		$i = 0;
		$data = NULL;
		
		foreach ($query->result() as $row)
		{
			//echo $i."<br />";
			
			$i++;
			$data['row'.$i] =  $this->get_appointment($row->transaction_id);
		}
		
		
		
		if($data)
			return $data; 
		else return false;
	}
	
	
	function get_appointment($trans){
		
		$result['transaction_id'] = $trans ;
		$query = $this->db->where($result);
		$query = $this->db->get('appointment'); 
		$result = $query->row_array();
		$data['transaction_id' ] = $trans ;
		$data['patient_id'] = $result['patient_id'] ;
		$data['transaction_status'] = $result['transaction_status'] ;
		$data['doctor_id'] = $result['doctor_id'] ;
		$data['appointment_time'] = $result['appointment_time' ] ;
		$data['problem'] = $result['problem'];
		$temp['patient_id'] =  $result['patient_id'] ; 
		$query = $this->db->where($temp);
		$query = $this->db->get('patient_login'); 
		$result = $query->row_array();
		
		$data['patient_name'] = $result['fname']." ".$result['lname'] ;
		
		return $data ;
		
	}
	
	function getTransPatientDetails($trans) {
		
		$temp['transaction_id']  = $trans ;
		$query = $this->db->where($temp);
		$query = $this->db->get('appointment'); 
		$result = $query->row_array();
		$data['patient_id'] = $result['patient_id' ] ;
		
		$temp1['patient_id']  = $data['patient_id'] ;
		$query = $this->db->where($temp1);
		$query = $this->db->get('patient_login'); 
		$result = $query->row_array();
		
		$data['fname'] = $result['fname'] ;
		$data['lname'] = $result['lname'] ;
		$data['email'] = $result['email'] ;
		$data['mobile'] = $result['mobile'] ;
				
		$query = $this->db->where($temp1);
		$query = $this->db->get('patient_profile'); 
		$result = $query->row_array();
		
		$data['special_condition'] = $result['special_condition'] ;
		$data['age'] = $result['age'] ;
		$data['martial_status'] = $result['martial_status'] ;
		$data['blood_type'] = $result['blood_type'] ;
		$data['other_condition'] = $result['other_condition'] ;
		$data['other_condition1'] = $result['other_condition1'] ;
		$data['chronic_illness'] = $result['chronic_illness'] ;
		
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
	
	
	
	
	///////////////////// activity functions /////////////////////
		
	function getEidFromEmail($email){
		
		$table = 'et_member' ;

 		$query = $this->db_notif->query('SELECT memberId FROM '.$table.' WHERE email="'.$email.'"');
		$row = $query->row();
		$eid = $row->memberId;

		//die($eid);
		
		return $eid;
		
		}
	

	function getPatientEmailFromUID($uid){
		
		
		
		$table = 'patient_login' ;

 		$query = $this->db->query('SELECT email FROM '.$table.' WHERE patient_id ="'.$uid.'"');
		$row = $query->row();
		$email = $row->email;

		//die($query." ".$email);
		
		return $email;
		
		}
	

	function getDoctorEmailFromUID($uid){
		
		
		
		$table = 'doctors_login' ;

 		$query = $this->db->query('SELECT email FROM '.$table.' WHERE doctor_id ="'.$uid.'"');
		$row = $query->row();
		$email = $row->email;

		//die($query." ".$email);
		
		return $email;
		
		}
	

	////////////////////////////////////////////////////////////////////////
	
	
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
		
		
		
		$PatientEmail = $this->appointment_model->getPatientEmailFromUID($data['patient_id']);
		$fromMemberId = $this->appointment_model->getEidFromEmail($PatientEmail);
		
		$DocEmail = $this->appointment_model->getDoctorEmailFromUID($data['doctor_id']);
		$MemberId = $this->appointment_model->getEidFromEmail($DocEmail);
		
		
		
		$eso_data['fromMemberId'] = $fromMemberId;
		$eso_data['memberId'] = $MemberId;
		$eso_data['TId'] = $trans; 
		$eso_data['type'] = "appointment"; 
		$eso_data['time'] = time();

		$this->db_notif->insert('et_activity', $eso_data );	

		
		
	}
	
	function getDoctorId($tid){
		
		$table = 'appointment' ;
		$query = $this->db->query('SELECT doctor_id from '.$table.' WHERE transaction_id= "'.$tid.'"' );
	
		$query = $query->result_array();
		
		return $query[0]['doctor_id'];
		
		}
	
	
	
	
	////////////////////////////////////////////////
	
	
		function book_eAppointment($data){
	
		$result['patient_id'] = $data['patient_id'] ;
		$result['doctor_id'] = $data['doctor_id'] ;
		$result['transaction_id'] = $data['tid'] ;
		$result['comment'] = $data['problem'] ;
		
		$this->db->insert('e_appointments' , $result );
		$this->db->where($result) ;
		$query = $this->db->get('e_appointments');
		$query = $query->row_array();
		$trans = $query['follow_up_id'] ;
		
			
		$PatientEmail = $this->appointment_model->getPatientEmailFromUID($data['patient_id']);
		$fromMemberId = $this->appointment_model->getEidFromEmail($PatientEmail);
		
		$DocEmail = $this->appointment_model->getDoctorEmailFromUID($data['doctor_id']);
		$MemberId = $this->appointment_model->getEidFromEmail($DocEmail);
		
		
		
		$eso_data['fromMemberId'] = $fromMemberId;
		$eso_data['memberId'] = $MemberId;
		$eso_data['TId'] = $trans; 
		$eso_data['type'] = "eAppointment"; 
		$eso_data['time'] = time();

		$this->db_notif->insert('et_activity', $eso_data );	

		
		return $trans;
		
	}
	
	
	
	
}