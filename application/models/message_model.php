<?php

class Message_model extends CI_Model {

	
  function __construct()

    {

        parent::__construct();

        $this->load->database();

	//	$this->db_notif = $this->load->database("noti" , TRUE);

    }
	
	

	function getMessages($uid, $user_1 ){
		
		
		$table = 'message';

		$query = $this->db->query('SELECT * from '.$table.' WHERE (to_doctor = "'.$uid.'" AND user_2 ="'.$user_1.'")  OR (from_doctor ="'.$uid.'" AND  user_1 ="'.$user_1.'" )' );
	
		$query = $query->result_array();

		return $query;
		
		}



	function getDoctorName($uid){
		
		$table = 'doctors_login';
		
		$query = $this->db->query('SELECT fname, lname from '.$table.' WHERE doctor_id = "'.$uid.'"' );
		
		$query = $query->result_array();

		return $query;

		
		}
	function getPatientName($uid){
		
		$table = 'patient_login';
		
		$query = $this->db->query('SELECT fname, lname from '.$table.' WHERE patient_id = "'.$uid.'"' );
		
		$query = $query->result_array();

		return $query;

		
		}



	function getThread($from,$to,$user_1 = 1,$user_2 = 1){
		
		$table = 'message';

		$query_1 = $this->db->query('UPDATE '.$table.' SET checked = 1 WHERE to_doctor = "'.$to.'" AND from_doctor = "'.$from.'" AND checked = 0 ' );
		
		$query = $this->db->query('SELECT from_doctor, to_doctor, checked, message, UNIX_TIMESTAMP(time) As timestamp from '.$table.' WHERE (to_doctor = "'.$to.'" AND from_doctor = "'.$from.'" AND user_1 = "'.$user_1.'" AND user_2 = "'.$user_2.'" ) OR (to_doctor = "'.$from.'" AND from_doctor = "'.$to.'") ORDER BY timestamp');
	
	
	
		$query = $query->result_array();

		return $query;

		
		
		}
	
	
	function getNewMessages($uid){
		
		$table = 'message';

		$query = $this->db->query('SELECT from_doctor, message from '.$table.' WHERE to_doctor = "'.$uid.'" AND checked = 0' );
	
		$query = $query->result_array();

		return $query;

		
		
		}
	
	
	
		function sendMessage($from, $to, $message_text, $user_1 = 1, $user_2 = 1){
		
		$table = 'message';

		if($message_text == 'favicon.ico'){
	
			die($from." ". $to);

	
			}
		
		$result['from_doctor'] = $from;
		$result['to_doctor'] = $to;
		$result['message'] = $message_text;
		$result['checked'] = 0;
		$result['user_1'] = $user_1;
		$result['user_2'] = $user_2;
		
		$query = $this->db->insert('message' , $result );
		
		return 1;
		//return $query;
		
		
		
		}
	
	
	}