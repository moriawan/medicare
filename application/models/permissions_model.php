<?php

class Permissions_model extends CI_Model {





    function __construct()

    {

		//please configure curn URL

        // Call the Model constructor

        parent::__construct();

        $this->load->database();
		$this->db_notif = $this->load->database("noti" , TRUE);

		

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
	

	

	function getPermission($pid , $did){

		

	

		$data['doctor_id'] = $did ;

		$data['patient_id'] = $pid ;

		$date =  date('Y-m-d H:i:s');

		

		$query = $this->db->where(array('expiretime >' => $date, 'doctor_id' => $did,'patient_id =' => $pid));

		$query = $this->db->get('permissions');

		$result = $query->row_array();

		

		if(isset($result['access']))

		$access = $result['access'] ;

		else

		$access = 0 ;

		

		

		if($access==1) return true;

		else return false;

		

	}

	

	

	function requestPermission($data){

		

		$result['doctor_id'] = $data['doctor'];

		$result['patient_id'] = $data['patient'];

		

		date_default_timezone_set("Asia/Kolkata");	



		$date = date('Y-m-d H:i:s');	

		

		$query = $this->db->where(array('expiretime <' => $date, 'doctor_id' =>$result['doctor_id'],'patient_id' => $result['patient_id']));

		$query = $this->db->delete('permissions');

		

		$date = "0000-00-00 00:00:00" ;

		$result['expiretime'] = $date;

		$result['access'] = 0 ;

		$this->db->insert('permissions', $result) ;

		
		
		
		$PatientEmail = $this->permissions_model->getPatientEmailFromUID($data['patient']);
		$MemberId = $this->permissions_model->getEidFromEmail($PatientEmail);
		
		$DocEmail = $this->permissions_model->getDoctorEmailFromUID($data['doctor']);
		$fromMemberId = $this->permissions_model->getEidFromEmail($DocEmail);
		
		
		
		$eso_data['fromMemberId'] = $fromMemberId;
		$eso_data['memberId'] = $MemberId;
		$eso_data['type'] = "permissionRequest"; 
		$eso_data['time'] = time();

		$this->db_notif->insert('et_activity', $eso_data );	

		
		
		

	}

	

	

	function allow($pid,$did,$time){

		

		$date =  date('Y-m-d H:i:s');

		$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$time,date("Y"));

		$date = date('Y-m-d H:i:s',$tomorrow);

		$temp['expiretime'] = $date;

		$temp['access'] = 1 ;

		$query = $this->db->where(array('expiretime' => "0000-00-00 00:00:00" , 'doctor_id' => $did,'patient_id' => $pid));

		$query = $this->db->update('permissions',$temp);

		
		
		$PatientEmail = $this->permissions_model->getPatientEmailFromUID($pid);
		$fromMemberId = $this->permissions_model->getEidFromEmail($PatientEmail);
		
		$DocEmail = $this->permissions_model->getDoctorEmailFromUID($did);
		$MemberId = $this->permissions_model->getEidFromEmail($DocEmail);
		
		
		
		$eso_data['fromMemberId'] = $fromMemberId;
		$eso_data['memberId'] = $MemberId;
		$eso_data['type'] = "permissionGrant"; 
		$eso_data['time'] = time();

		$this->db_notif->insert('et_activity', $eso_data );	

		
		

		

	}



	

	function removePermission($pid,$did){

		

		

			$data['doctor_id'] = $did ;

			$data['patient_id'] = $pid ;

			$date =  date('Y-m-d H:i:s');

			$query = $this->db->where(array('expiretime >' => $date, 'doctor_id =' => $did,'patient_id =' => $pid));

			$query = $this->db->delete('permissions');	

	

		

		}

		

	function doctorActivePermissions($did){

		

			$date =  date('Y-m-d H:i:s');

			$this->db->select('patient_id');

			$query = $this->db->where(array('expiretime >' => $date, 'doctor_id ' => $did , 'access' => '1'  ));

			$query = $this->db->get('permissions');	

			$result = $query->result();

			

			return $result ;

			

		

	}

	

	function doctorActiveRequests($did){

		

			$date =  date('Y-m-d H:i:s');

			$query = $this->db->select('patient_id');

			$query = $this->db->where(array('expiretime' => "0000-00-00 00:00:00", 'doctor_id' => $did ,'access' => '0'  ));

			$query = $this->db->get('permissions');	

			$result = $query->result();

			

			return $result ;

			

	}

	

	

	function patientRequest($pid){

		

			$date =  date('Y-m-d H:i:s');

			$this->db->select('doctor_id');

			$query = $this->db->where(array('expiretime' => "0000-00-00 00:00:00", 'patient_id' => $pid ,'access' => '0'  ));

			$query = $this->db->get('permissions');	

			$result = $query->result();

			

			return $result ; 

		

		

	}

	

	function patientAllowed($pid){

		

			$date =  date('Y-m-d H:i:s');

			$this->db->select('doctor_id');

			$query = $this->db->where(array('expiretime >' => $date, 'patient_id' => $pid ,'access' => '1'  ));

			$query = $this->db->get('permissions');	

			$result = $query->result();

			

			return $result ; 

		

		

	}

	

	

	

}