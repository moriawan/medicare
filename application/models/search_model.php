<?php

class Search_model extends CI_Model {





    function __construct()

    {

		//please configure curn URL

        // Call the Model constructor

        parent::__construct();

        $this->load->database();
		$this->db_notif = $this->load->database("noti" , TRUE);

  
		

    }

	

	function getCity(){

		

		//$city = $this->input->get_post('name', TRUE);

	

		 

		$table = 'cities' ;

		

 		$query = $this->db->query('SELECT name FROM '.$table);

		

	

		if($query)

			return $query[0];

		else return false;

		

		}

	

	function searchByCity(){

		

	

		$city = $this->input->get_post('city', TRUE);

	

		 

		$table = 'doctors' ;

		

 		$query = $this->db->query('SELECT doctor_id, speciality, fee, city, address FROM '.$table.' WHERE city ="'.$city.'"');

		

		

	

		if($query)

			return $query;

		else return false;

		

		

	//	echo 'Total Results: ' . $query->num_rows();

		

		

		

	}

	

	

	

	function searchBySpeciality(){

		
		$speciality = $this->input->get_post('speciality', TRUE);

		$table = 'doctors' ;

 		$query = $this->db->query('SELECT doctor_id, speciality, fee, city, address FROM '.$table.' WHERE speciality ="'.$speciality.'"');


		if($query)

			return $query;

		else return false;

		
	}



	function getDetailsbyID($docID){

		
		
		$table = 'doctors' ;

	$query = $this->db->query('SELECT doctor_id, speciality, fee, city, address FROM '.$table.' WHERE doctor_id ="'.$docID.'"');


		if($query)

			return $query;

		else return false;

		
	}

	

	

		function searchByName(){

		
		$name = $this->input->get_post('name', TRUE);

		

		 $fname = preg_replace("/\s.*/","",$name);

		 $lname = preg_replace("/[^\s]*\s/","",$name);

		// echo $fname."** &*".$lname;

		$table = 'doctors_login' ;

		if(sizeof($lname)>1)
			$query = $this->db->query('SELECT doctor_id FROM '.$table.' WHERE fname ="'.$fname.'" AND lname = "'.$lname.'"');
		else if(sizeof($lname)==1)
			$query = $this->db->query('SELECT doctor_id FROM '.$table.' WHERE fname ="'.$fname.'"');
	

		
		if($query)

			return $query;

		else return false;


		//echo 'Total Results: ' . $query->num_rows();


	}

	

	
	
	function getEidFromEmail($email){
		
		$table = 'et_member' ;

		

 		$query = $this->db_notif->query('SELECT memberId FROM '.$table.' WHERE email="'.$email.'"');

		$row = $query->row();

		$eid = $row->memberId;

		
		return $eid;
		
		}
		
	function getEidFromUID($uid){
		
		
		$table = 'patient_login';

		$query = $this->db->query('SELECT email FROM '.$table.' WHERE patient_id ="'.$uid.'"');

		$row = $query->row();

		$email = $row->email;
		
		$eid = $this->search_model->getEidFromEmail($email);
		
		return $eid;
		
		}
	
	

	function getName($uid, $user_type){

	

	//	echo $uid." model mein";

	//echo $user_type;
	
	if($user_type ==1){
		
	//	die($uid);
	
		$table = 'doctors_login';
		$query = $this->db->query('SELECT fname, lname, email FROM '.$table.' WHERE doctor_id ="'.$uid.'"');
		
		//echo 'bb';
		
	}
	else {
	
		$table = 'patient_login';
		$query = $this->db->query('SELECT fname, lname, email FROM '.$table.' WHERE patient_id ="'.$uid.'"');
		
		//echo "aaa ".$uid;
		
	}

		

		if($query)

			return $query;

		else return false;

		

		

		}

	

	

	

}