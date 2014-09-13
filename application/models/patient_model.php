<?php

class Patient_model extends CI_Model {





    function __construct()
    {

		//please configure curn URL

        // Call the Model constructor

        parent::__construct();

        $this->load->database();
		$this->db_notif = $this->load->database("noti" , TRUE);

  

		

    }

	
	
	///////////////////// activity functions /////////////////////
		
	
	function getDoctorEIDfromCID($cid){
		
		
		
		$table = 'conversation' ;

 		$query = $this->db->query('SELECT uid FROM '.$table.' WHERE convid ="'.$cid.'"');
		$row = $query->row();
		$uid = $row->uid;

		$email = $this->patient_model->getDoctorEmailFromUID($uid);
		$eid = $this->patient_model->getEidFromEmail($email);
	
		
		return $eid;
		
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
	

	

		
				///////////// auto-complete/ drop-down listings /////////

	function getCities(){
		
		$this->db->select('name');
		$query = $this->db->get('cities');

		$city;
		foreach($query->result() as $row ){
			
			$city[] = $row->name;
			
			} 

		return $city;
		
		}	

	function getSpecialities(){
		
		$this->db->select('name');
		$query = $this->db->get('specialities');

		$city;
		foreach($query->result() as $row ){
			
			$speciality[] = $row->name;
			
			} 

		return $speciality;
		
		}	




						//////////////////////////////


	function get_profile($uid=false){		

		//$uid =$this->session->userdata('userId');

		
		$query = $this->db->get_where('patient_login', array('patient_id' => $uid ));

		$query = $query->row_array(); 

		$result['fname'] = $query['fname']  ;

		$result['lname'] = $query['lname'] ;

		$result['email'] = $query['email'] ;

		$result['mobile'] = $query['mobile'] ;

		

	

		$this->db->where(array('patient_id' => $uid ));

		if($this->db->count_all_results('patient_address')==1){

			

			$query = $this->db->get_where('patient_address', array('patient_id' => $uid ));

			$query = $query->row_array(); 

			$result['address'] = $query['address'] ;

			$result['state'] = $query['state'] ;

			$result['city'] = $query['city'] ;

			$result['landmark'] = $query['landmark'] ;

			$result['latitude'] = $query['latitude'] ;

			$result['longitude'] = $query['longitude'] ;

		}

		else

		{

			$result['address'] = "" ;

			$result['state'] = "" ;

			$result['city'] = "" ;

			$result['landmark'] = "" ;

			$result['latitude'] = "37.2" ;

			$result['longitude'] = "150.3" ;

		}

		

		

		$query = $this->db->get_where('patient_profile', array('patient_id' => $uid ));

		$query = $query->row_array(); 

		

		$result['special_condition'] = $query['special_condition'] ;

		$result['chronic_illness'] = $query['chronic_illness'] ;

		$result['age'] = $query['age'] ;

		$result['martial_status'] = $query['martial_status'] ;

		$result['blood_type'] = $query['blood_type'] ;

		$result['other_condition'] = $query['other_condition'] ;

		$result['other_condition1'] = $query['other_condition1'] ;

		

		return $result ;

		

	}

	

	

	function edit_profile_name(){

		$doc_id = $this->session->userdata('userId');

		

		$data['fname'] = $_POST['fname'];

		$data['lname'] = $_POST['lname'];

		$this->db->where('patient_id', $doc_id) ;

		$this->db->update('patient_login', $data );

		return "Appointment Details Sucessfully Updated" ;

		

	}

	

	function edit_profile_details(){

	

    	$uid = $this->session->userdata('userId');

		

        $data['special_condition'] = $_POST['special_condition'];

		$data['chronic_illness'] = $_POST['chronic_illness']; 

        $data['age'] = $_POST['age'];

		$data['martial_status'] = $_POST['martial_status'];

		$data['blood_type'] = $_POST['blood_type']; 

		$data['other_condition'] = $_POST['other_condition']; 

		$data['other_condition1'] = $_POST['other_condition1'];

		

		$this->db->where('patient_id', $uid );

		$this->db->update('patient_profile', $data );

		

		return "Profile Details Sucessfully Updated" ;

		

	}

	

	function edit_profile_address(){

	

    	$uid = $this->session->userdata('userId');

		

        $data['city'] = $_POST['doc_city'];

		$data['state'] = $_POST['doc_state']; 

        $data['address'] = $_POST['doc_add'];

		$data['landmark'] = $_POST['doc_land'];

		$data['latitude'] = $_POST['latitude']; 

		$data['longitude'] = $_POST['longitude']; 

		$data['latitude'] = $_POST['latitude']; 

		$data['longitude'] = $_POST['longitude'];

		

		$this->db->where(array('patient_id' => $uid ));

		if($this->db->count_all_results('patient_address')==1){

			$this->db->where('patient_id', $uid);

			$this->db->update('patient_address', $data );

		}else{

			$data['patient_id'] = $uid;

			$this->db->insert('patient_address', $data );	

		}

		

		

		return "Location Details Sucessfully Updated" ;

		

	}

   

	
	function getEidFromEmail($email){
		
		$table = 'et_member' ;

		

 		$query = $this->db_notif->query('SELECT memberId FROM '.$table.' WHERE email="'.$email.'"');

		$row = $query->row();

		$eid = $row->memberId;

		
		return $eid;
		
		}
	

	function getSubs($uid=false){

		

		if(!$uid)return false;

		

		$table = 'patient_login' ;

 		$query = $this->db->query('SELECT email FROM '.$table.' WHERE patient_id='.$uid);

		$row = $query->row();

		$email = $row->email;

		
		


		$eid = $this->patient_model->getEidFromEmail($email);
		
		$id['eid'] =$eid;
		




		$table = 'et_member_conversation' ;

		$query = $this->db_notif->query('SELECT conversationId FROM '.$table.' WHERE id='.$eid.' AND starred = 1');



		foreach ($query->result_array() as $row){



			$convId = $row['conversationId'];


			$table1 = 'conversation' ;

			$query2 = $this->db->query('SELECT uid FROM '.$table1.' WHERE convid ='.$convId);

			$row2 = $query2->row();

			

			foreach($row2 as $r){

				//echo "<br /> row data ".$r."<br />";

				$id['uid'][] = $r;

				}
			
		}


		return $id;

	}

	

	

	function getReports($uid=false){

		

		if(!$uid){

			die('Reports : brb, dying x_x');

			}

		

		$table = 'reports' ;

		$query = $this->db->query('SELECT name, lab_name, slug from '.$table.' WHERE patient_id= "'.$uid.'"' );

	

		$query = $query->result_array();

		

		

		return $query;

		

		

	}

	

	

	

	



	function setReportName($name=false,$labName=false){

	

	

	$uid = $this->session->userdata('userId');

		

	if(!$name||!$labName){

			

			die('ded X_X, no data recieved');

			}

	

	$table = 'reports' ;

	$query = $this->db->query('SELECT * from '.$table.' WHERE name= "'.$name.'" AND lab_name = "'.$labName.'"' );

		

	$query =  sizeof($query->result_array());

	

	

	

	$name2 = preg_replace('/\s+/', '-',$name);

	$labName2 = preg_replace('/\s+/', '-',$labName);

		

		

	$slug = $name2."-".$labName2."-".$query;

	

	$table = 'reports' ;

	$query = $this->db->query('INSERT INTO '.$table.' VALUES ("'.$uid.'","0","'.$name.'","'.$labName.'","'.$slug.'")');

		

	return $slug;

	

	}



	

	function ajaxUnSubscribe($eid=false,$cid=false){

	

	

		if(!$eid||!$cid){

			

			die('ded X_X, no data recieved');

			}

			

		$table = 'et_member_conversation' ;

		$query = $this->db_notif->query('UPDATE '.$table.' SET starred = "0" WHERE id= "'.$eid.'" AND conversationId = "'.$cid.'"' );

		

		

		return $query;

	

	}

	

	function ajaxSubscribe($eid=false,$cid=false){

		if(!$eid||!$cid){

			die('ded X_X, no data recieved');

			}


		$table = 'et_member_conversation' ;

		$query = $this->db_notif->query('SELECT * from '.$table.' WHERE id= "'.$eid.'" AND conversationId = "'.$cid.'"' );


		$exist = sizeof($query->result_array());

		if(!$exist){


			$query = $this->db_notif->query('INSERT INTO '.$table.' VALUES ("'.$cid.'","member","'.$eid.'","0","1","0","NULL","0")');


			$fromMemberId = $eid;
			$MemberId = $this->patient_model->getDoctorEIDfromCID($cid);
			
			
			$eso_data['fromMemberId'] = $fromMemberId;
			$eso_data['memberId'] = $MemberId;
			$eso_data['type'] = "subscribe"; 
			$eso_data['time'] = time();

			$this->db_notif->insert('et_activity', $eso_data );	

		


			return $query;
			
			}

	
		$query = $this->db_notif->query('UPDATE '.$table.' SET starred = "1" WHERE id= "'.$eid.'" AND conversationId = "'.$cid.'"' );

		$fromMemberId = $eid;
		$MemberId = $this->patient_model->getDoctorEIDfromCID($cid);
		
		
		$eso_data['fromMemberId'] = $fromMemberId;
		$eso_data['memberId'] = $MemberId;
		$eso_data['type'] = "subscribe"; 
		$eso_data['time'] = time();

		$this->db_notif->insert('et_activity', $eso_data );	

	



		return $query;

	

	}

	

	

	function appointments($uid=false){

	if($uid==false){

		die('wong parameters -_-');

		}

		$table = 'appointment' ;

		$query = $this->db->query('SELECT * from '.$table.' WHERE patient_id= "'.$uid.'"' );

	

		$query = $query->result_array();

		return $query;

	

	}

	

	function getTransaction($tid=false){



	

	if($tid==false){

		die('wong parameters -_-');

		}

		
		$table = 'diagnosis' ;

		$query = $this->db->query('SELECT * from '.$table.' WHERE diagnosis_id= "'.$tid.'"' );

	

		$query = $query->result_array();

		return $query;

	

	}

	

	function getDoctor($uid=false){



	if($uis=false){

		die('wong parameters -_-');

		}

		

		$table = 'doctors_login' ;

		$query = $this->db->query('SELECT fname, lname from '.$table.' WHERE doctor_id= "'.$uid.'"' );

	

		$query = $query->result_array();

		return $query;

	

	}

	

	function getDetails($uid=false){

	
		if(!$uid){

			die('brb, dying x_x');

			}

		

		$table = 'doctors' ;

		$query = $this->db->query('SELECT speciality, city, state from '.$table.' WHERE doctor_id= "'.$uid.'"' );

		

		$query = $query->result_array();

		
		return $query;

	
	}

	

	

}