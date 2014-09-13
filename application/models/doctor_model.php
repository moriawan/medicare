<?php

class Doctor_model extends CI_Model {





    function __construct()

    {

        // Call the Model constructor
        parent::__construct();
        $this->load->database();
				

    }

	

	function getPatientProfile($uid){

			

		$query = $this->db->get_where('patient_login', array('patient_id' => $uid ));

		$query = $query->row_array(); 	

		$result['fname'] = $query['fname']  ;

		$result['lname'] = $query['lname'] ;

		$result['email'] = $query['email'] ;

		$result['mobile'] = $query['mobile'] ;

		$result['patient_id'] = $query['patient_id'] ;

		

		return $result ;

		

	}

	

	function getDoctorProfile($uid){

		$query = $this->db->get_where('doctors_login', array('doctor_id' => $uid ));

		$query = $query->row_array(); 


		$result['fname'] = $query['fname']  ;

		$result['lname'] = $query['lname'] ;

		$result['email'] = $query['email'] ;

		$result['mobile'] = $query['mobile'] ;

		$result['doctor_id'] = $uid ;

		

		

		$query = $this->db->get_where('doctors', array('doctor_id' => $uid ));

		$query = $query->row_array(); 

		$result['fee'] = $query['fee'] ;

		$result['city'] = $query['city'] ;

		$result['speciality'] = $query['speciality'] ;

		$result['subspeciality'] = $query['subspeciality'] ;

		$result['state'] = $query['state'] ;
	

		return $result ;

		

	}

	

		function getAllPatients($docId,$page=0) {

		

		$no = 10 ;

		$cnt = 0 ;

		$query = $this->db->distinct();

		$query = $this->db->select('patient_id');

		$query = $this->db->where(array('doctor_id =' => $docId ));
		
		$query = $this->db->get('appointment' , ($page+1)*$no , $page*$no );

		$results = $query->result_array();

		$data[0] = array() ;

		foreach( $results as $row ){

				$data[$cnt] = $this->getPatientProfile($row['patient_id']) ;

				$data[$cnt]['patient_id'] = $row['patient_id']  ;

				$cnt++ ;

			}

		

		return $data ;

		

	}

	

	

	

	function get_doctor_schedule(){

		

		$id = $this->session->userdata('userId');

		$cnt = array(0,0,0,0,0,0,0)  ;

		$query = $this->db->get_where('doctor_schedule',array('doctor_id =' => $id) );

		$dataf = $query->row_array();


		//die($id.' '.$dataf." ".$dataf['session_1_start']);
		
		$dataf['slots_start'] = $dataf['session_1_start'];

		$dataf['slots_end'] = $dataf['session_1_end'];

		$data["Week_start"] = explode(";" , $dataf['slots_start'] );

		$data["Week_end"] = explode(";" , $dataf['slots_end'] );

		

		 $days[0]="Monday";
		 $days[1]="Tuesday";
		 $days[2]="Wednesday";
		 $days[3]="Thursday";
		 $days[4]="Friday";
		 $days[5]="Sauturday";
		 $days[6]="Sunday";

		

		for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){

	

			$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 

			for($j=0 ; $j<floor($totaltime/100) ; $j++){

				$data['schedule'][$days[$i]][$cnt[$i]] = $data["Week_start"][$i]." - ".((int)$data["Week_start"][$i]+100) ;

				$data["Week_start"][$i] = ((int)$data["Week_start"][$i]+100)+"" ;

				$cnt[$i]++ ;

			}

			if(($totaltime)%100 != 0 ){ 

				$data['schedule'][$days[$i]][$cnt[$i]] = $data["Week_start"][$i]." - ".$data["Week_end"][$i];

				$cnt[$i]++ ;

			}

				

			//echo $totaltime ;

		}

		

		$dataf['slots_start'] = $dataf['session_2_start'];

		$dataf['slots_end'] = $dataf['session_2_end'];

		$data["Week_start"] = explode(";" , $dataf['slots_start'] );

		$data["Week_end"] = explode(";" , $dataf['slots_end'] );

		

		for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){

	

			$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 

			for($j=0 ; $j<floor($totaltime/100) ; $j++){

				$data['schedule'][$days[$i]][$cnt[$i]] = $data["Week_start"][$i]." - ".((int)$data["Week_start"][$i]+100) ;

				$data["Week_start"][$i] = ((int)$data["Week_start"][$i]+100)+"" ;

				$cnt[$i]++ ;

			}

			if(($totaltime)%100 != 0 ){ 

				$data['schedule'][$days[$i]][$cnt[$i]] = $data["Week_start"][$i]." - ".$data["Week_end"][$i];

				$cnt[$i]++ ;

			}

				

			//echo $totaltime ;

		}

		

		$dataf['slots_start'] = $dataf['session_3_start'];

		$dataf['slots_end'] = $dataf['session_3_end'];

		$data["Week_start"] = explode(";" , $dataf['slots_start'] );

		$data["Week_end"] = explode(";" , $dataf['slots_end'] );

		for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){

			

			$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 

			//echo floor($totaltime/100);

			for($j=0 ; $j<floor($totaltime/100) ; $j++){

				$data['schedule'][$days[$i]][$cnt[$i]] = $data["Week_start"][$i]." - ".((int)$data["Week_start"][$i]+100) ;

				$data["Week_start"][$i] = ((int)$data["Week_start"][$i]+100)+"" ;

				$cnt[$i]++ ;

			}

			if(($totaltime)%100 != 0 ){ 

				$data['schedule'][$days[$i]][$cnt[$i]] = $data["Week_start"][$i]." - ".$data["Week_end"][$i];

				$cnt[$i]++ ;

			}			

		}


		$cnt = array(0,0,0,0,0,0,0);

		date_default_timezone_set("Asia/Kolkata");

		$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+7,date("Y"));

		$date = date('Y-m-d 00:00:00',$tomorrow);
		$today = date('Y-m-d 00:00:00');
		$query = $this->db->where(array('appointment_time <' => $date, 'doctor_id =' => $id,'appointment_time >=' => $today));

		$query = $this->db->get('appointment_slots');

		$dataf['results'] = $query->result_array();

		$i=0;

		foreach ($dataf['results'] as $row)

		{

			$day = date('N', strtotime($row['appointment_time']));

			$time_sch =  date('Hi', strtotime($row['appointment_time']));

			for($j=0 ; $j<sizeof($data['schedule'][$days[$day-1]]) ;$j++){

				$time = explode(" - ",$data['schedule'][$days[$day-1]][$j]) ; 


				if($time_sch>=$time[0]&&$time_sch<$time[1]){

					

					$data['transaction'][$days[$day-1]][$j][$cnt[$day-1]] = $row['transaction_id'];
					// echo $row['transaction_id']; 

					$data['app_time'][$days[$day-1]][$j][$cnt[$day-1]] = $time_sch;

					$cnt[$day-1]++ ;

				

				}

				

			}

			

			$i++;	

		}

		

		return $data ;

		

	}

	

	

	function change_passoword(){

		

		$id = $this->session->userdata('userId');

		

		$data['doctor_id'] = $id ;

		$data['password'] = $_POST['oldpass'];

		$result['password'] = $_POST['newpass'];

		$this->db->where($data);

		if($this->db->count_all_results('doctors_login')==1){

			$this->db->where( $data);

			$query = $this->db->get('doctors_login'); 

			$query = $query->row_array();

			$uid = $query['doctor_id'] ;

			$this->db->flush_cache();

			$this->db->where('doctor_id' , $uid );

			$this->db->update('doctors_login', $result);

			return "Password Changed Successfully" ;

		}

		

		return "Old Password Was Incorrect" ;

	}

		





//////////////////////////////////////////////////////////////////////////



 function getAppointmentDuration($uid)

    {


		$table = 'doctors' ;

		$query = $this->db->query('SELECT appointment_duration from '.$table.' WHERE doctor_id = "'.$uid.'"' );

	

		$query = $query->result_array();

		return $query[0]['appointment_duration'];

		

    }

	

	

function get_eAppointments($uid){


		

		$table = 'e_appointments' ;

		$query = $this->db->query('SELECT * from '.$table.' WHERE doctor_id = "'.$uid.'" AND status = "1"' );
	

		$query = $query->result_array();

		return $query;

	}

	





/////////////////////////////////////////////////////////////////////////



    function get_appointment_details($trans_id)

    {

		

    }
		

			

	function get_profile($uid){

		

		if(!$uid)

			$uid =$this->session->userdata('userId');

		

		$query = $this->db->get_where('doctors_login', array('doctor_id' => $uid ));

		$query = $query->row_array(); 

		

		$result['fname'] = $query['fname']  ;

		$result['lname'] = $query['lname'] ;

		$result['email'] = $query['email'] ;

		$result['mobile'] = $query['mobile'] ;

		

		$query = $this->db->get_where('doctors', array('doctor_id' => $uid ));

		$query = $query->row_array(); 

		

		$result['address'] = $query['address'] ;

		$result['fee'] = $query['fee'] ;

		$result['city'] = $query['city'] ;

		$result['landmark'] = $query['landmark'] ;

		$result['latitude'] = $query['latitude'] ;

		$result['longitude'] = $query['longitude'] ;

		$result['appointment_duration'] = $query['appointment_duration'] ;

		$result['speciality'] = $query['speciality'] ;

		$result['subspeciality'] = $query['subspeciality'] ;

		$result['state'] = $query['state'] ;

		

		$query = $this->db->get_where('doctors_profile', array('doctor_id' => $uid ));

		$query = $query->row_array(); 

		

		$result['doctor_grad_year'] = $query['doctor_grad_year'] ;

		$result['doctor_grad_college'] = $query['doctor_grad_college'] ;

		$result['doctor_grad_degree'] = $query['doctor_grad_degree'] ;

		$result['doctor_postgrad_year'] = $query['doctor_postgrad_year'] ;

		$result['doctor_postgrad_college'] = $query['doctor_postgrad_college'] ;

		$result['doctor_postgrad_degree'] = $query['doctor_postgrad_degree'] ;

		$result['doctor_supergrad_year'] = $query['doctor_supergrad_year'] ;

		$result['doctor_supergrad_college'] = $query['doctor_supergrad_college'] ;

		$result['doctor_supergrad_degree'] = $query['doctor_supergrad_college'] ;

		$result['doctor_year'] = $query['doctor_year'] ;

		
		return $result ;

		

	}

	

	function edit_schedule($doc_id){

		

    	$data['session_1_start'] = $_POST['doc_fee']; 

        $data['session_1_start'] = $_POST['doc_city'];

		$data['session_1_start'] = $_POST['doc_state']; 

        $data['session_2_end'] = $_POST['doc_add'];

		$data['session_2_end'] = $_POST['doc_land'];

		$data['session_2_end'] = $_POST['doc_latitude']; 

        $data['no_of_sessions'] = $_POST['doc_duration'];

        $data['speciality'] = $_POST['doc_speciality'];

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors', $data );

		

	}

	

///////////////////////////////





	function get_profile_other($doc_id=false){
		
		if($doc_id==false)
		$doc_id = $this->session->userdata('userId');
		$query = $this->db->get_where('doctors_profile',array('doctor_id =' => $doc_id) );
		$dataf = $query->row_array();
	
	
		if($dataf['professional_experience']!=NULL )
		$data["experience"] = explode(";" , $dataf['professional_experience'] );
		else
		$data["experience"] = array();
		if($dataf['awards_publications']!=NULL )
		$data["awards"] = explode(";" , $dataf['awards_publications'] );
		else
		$data["awards"] = array();
		
		if($dataf['certifications']!=NULL )
		$data["certifications"] = explode(";" , $dataf['certifications'] ) ;
		else
		$data["certifications"] = array();
		
		
		return $data ;
		
	
	}



	

	function set_profile_pic(){

		

		$doc_id = $this->session->userdata('userId');

		

		$table = 'doctors_profile';

		

		$data['pic_slug'] = $doc_id;

		$this->db->where('doctor_id', $doc_id);

		$this->db->update($table, $data );

		

		return $doc_id;

	}


	

/////////////////////////////////



	function get_doctor_slots_second($id = false){
		
		if(!$id)
			$id =$this->session->userdata('userId');
	
		$query = $this->db->where(array('doctor_id =' => $id) );
		if($this->db->count_all_results('doctor_schedule_secondary')==1)
		{
			$cnt = array(0,0,0,0,0,0,0)  ;
			$query = $this->db->get_where('doctor_schedule_secondary',array('doctor_id =' => $id) );
			$dataf = $query->row_array();
			
			$dataf['slots_start'] = $dataf['session_1_start'];
			$dataf['slots_end'] = $dataf['session_1_end'];
			$data["Week_start"] = explode(";" , $dataf['slots_start'] );
			$data["Week_end"] = explode(";" , $dataf['slots_end'] );
			
			$app_time = $dataf['appointment_duration'];
			
			 $days[0]="Monday";
			 $days[1]="Tuesday";
			 $days[2]="Wednesday";
			 $days[3]="Thrusday";
			 $days[4]="Friday";
			 $days[5]="Sauturday";
			 $days[6]="Sunday";
			 
			for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){
				
				//echo $app_time ;
				$temptime = (int)$data["Week_start"][$i] ;
				if((int)$data["Week_start"][$i]<=2400 && (int)$data["Week_end"][$i]<=2400){
				$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 
				for($j=0 ; $j<floor($totaltime/100) ; $j++){
					for($k=0 ; $k < 60/$app_time ; $k++ ){
						$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime   ;
						$cnt[$i]++ ;
						
						$temptime += $app_time ;  
				
						if($temptime%100 == 60)
						{
							$temptime -= 60 ;
							$temptime += 100 ;
						}
					}
					
				}
				if(($totaltime)%100 != 0 ){ 
					
					$lefttime = $totaltime%100  ;
					if($lefttime > 60 ){
						$lefttime -= 40 ;
					}
					for ( $k =0 ; $k < $lefttime/$app_time ; $k++) { 
						$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime;
						$temptime += $app_time ;  
				
						if($temptime%100 == 60)
						{
							$temptime -= 60 ;
							$temptime += 100 ;
						}
						$cnt[$i]++ ;
					}
				}
				}
				//echo $totaltime ;
			}
			
			$dataf['slots_start'] = $dataf['session_2_start'];
			$dataf['slots_end'] = $dataf['session_2_end'];
			$data["Week_start"] = explode(";" , $dataf['slots_start'] );
			$data["Week_end"] = explode(";" , $dataf['slots_end'] );
			
			for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){
				
				//echo $app_time ;
				$temptime = (int)$data["Week_start"][$i] ;
				if((int)$data["Week_start"][$i]<=2400 && (int)$data["Week_end"][$i]<=2400){
				$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 
				for($j=0 ; $j<floor($totaltime/100) ; $j++){
					for($k=0 ; $k < 60/$app_time ; $k++ ){
						$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime   ;
						$cnt[$i]++ ;
						
						$temptime += $app_time ;  
				
						if($temptime%100 == 60)
						{
							$temptime -= 60 ;
							$temptime += 100 ;
						}
					}
					
				}
				if(($totaltime)%100 != 0 ){ 
				
					$lefttime = $totaltime%100  ;
					if($lefttime > 60 ){
						$lefttime -= 40 ;
					}
					for ( $k =0 ; $k < $lefttime/$app_time ; $k++) { 
						$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime;
						$temptime += $app_time ;  
				
						if($temptime%100 == 60)
						{
							$temptime -= 60 ;
							$temptime += 100 ;
						}
						$cnt[$i]++ ;
					}
				}
				}
				//echo $totaltime ;
			}
			
			$dataf['slots_start'] = $dataf['session_3_start'];
			$dataf['slots_end'] = $dataf['session_3_end'];
			$data["Week_start"] = explode(";" , $dataf['slots_start'] );
			$data["Week_end"] = explode(";" , $dataf['slots_end'] );
			for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){
				
				//echo $app_time ;
				$temptime = (int)$data["Week_start"][$i] ;
				if((int)$data["Week_start"][$i]<=2400 && (int)$data["Week_end"][$i]<=2400){
				$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 
				for($j=0 ; $j<floor($totaltime/100) ; $j++){
					for($k=0 ; $k < 60/$app_time ; $k++ ){
						$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime   ;
						$cnt[$i]++ ;
						
						$temptime += $app_time ;  

				
						if($temptime%100 == 60)
						{
							$temptime -= 60 ;
							$temptime += 100 ;
						}
					}
					
				}
				if(($totaltime)%100 != 0 ){ 
				
					$lefttime = $totaltime%100  ;
					if($lefttime > 60 ){
						$lefttime -= 40 ;
					}
					for ( $k =0 ; $k < $lefttime/$app_time ; $k++) { 
						$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime;
						$temptime += $app_time ;  
				
						if($temptime%100 == 60)
						{
							$temptime -= 60 ;
							$temptime += 100 ;
						}
						$cnt[$i]++ ;
					}
				}
				}
			}
			
			$max = $cnt[0];
			
			for($j=0 ; $j<7 ;$j++ ){
				if($max<$cnt[$j])
					$max = $cnt[$j]; 
				
			}
			$data['max'] = $max ;
			
			
			return $data ;
			
			
		}
		else {

			return false ;
			
		}
	}

	

	function edit_profile_appointmnet(){

		$doc_id = $this->session->userdata('userId');

		

		

		$data['fname'] = $_POST['fname'];

		$data['lname'] = $_POST['lname'];

		$data1['appointment_duration'] = $_POST['doc_duration'];

		$data1['fee'] = $_POST['doc_fee'];

		$this->db->where('doctor_id', $doc_id) ;

		$this->db->update('doctors', $data1 );

		$this->db->where('doctor_id', $doc_id) ;

		$this->db->update('doctors_login', $data );

		return "Appointment Details Sucessfully Updated" ;

		

	}

	

	function getSecondschedule(){

		

		$doc_id = $this->session->userdata('userId');

		$this->db->where(array('doctor_id' => $doc_id ));

		if($this->db->count_all_results('doctor_schedule_secondary')>=1){

			

			$query = $this->db->get_where('doctor_schedule_secondary',array('doctor_id =' => $doc_id) );	

			$dataf = $query->row_array();

			$dataf['slots_start'] = $dataf['session_1_start'];

			$dataf['slots_end'] = $dataf['session_1_end'];

			$data["session_1_start"] = explode(";" , $dataf['slots_start'] );

			$data["session_1_end"] = explode(";" , $dataf['slots_end'] );

			

			$dataf['slots_start'] = $dataf['session_2_start'];

			$dataf['slots_end'] = $dataf['session_2_end'];

			$data["session_2_start"] = explode(";" , $dataf['slots_start'] );

			$data["session_2_end"] = explode(";" , $dataf['slots_end'] );

			

			

			$dataf['slots_start'] = $dataf['session_3_start'];

			$dataf['slots_end'] = $dataf['session_3_end'];

			$data["session_3_start"] = explode(";" , $dataf['slots_start'] );

			$data["session_3_end"] = explode(";" , $dataf['slots_end'] );

			$data['no_of_sessions'] = $dataf['no_of_sessions'] ;

			$data['appointment_duration'] = $dataf['appointment_duration'] ;

			

			$query = $this->db->get_where('doctor_address_secondary',array('doctor_id =' => $doc_id) );	

			$dataf = $query->row_array();

			

			$data['sec_doc_city'] = $dataf['city'];

			$data['sec_doc_state'] = $dataf['state']; 

			$data['sec_address'] = $dataf['address'];

			$data['sec_doc_landmark'] = $dataf['landmark'];

			$data['sec_latitude'] = $dataf['latitude']; 

			$data['sec_longitude'] = $dataf['longitude']; 


			return $data ;	

			

		}

		return false ;
		

	}

	function get_second_address($doc_id){
		
			$query = $this->db->get_where('doctor_address_secondary',array('doctor_id =' => $doc_id) );	

			$dataf = $query->row_array();
	
			return $dataf ;	
	}


	function getschedule(){

		

		$doc_id = $this->session->userdata('userId');

		$query = $this->db->get_where('doctor_schedule',array('doctor_id =' => $doc_id) );

		$dataf = $query->row_array();

		

		

		$dataf['slots_start'] = $dataf['session_1_start'];

		$dataf['slots_end'] = $dataf['session_1_end'];

		$data["session_1_start"] = explode(";" , $dataf['slots_start'] );

		$data["session_1_end"] = explode(";" , $dataf['slots_end'] );

		

		$dataf['slots_start'] = $dataf['session_2_start'];

		$dataf['slots_end'] = $dataf['session_2_end'];

		$data["session_2_start"] = explode(";" , $dataf['slots_start'] );

		$data["session_2_end"] = explode(";" , $dataf['slots_end'] );

		

		

		$dataf['slots_start'] = $dataf['session_3_start'];

		$dataf['slots_end'] = $dataf['session_3_end'];

		$data["session_3_start"] = explode(";" , $dataf['slots_start'] );

		$data["session_3_end"] = explode(";" , $dataf['slots_end'] );

		$data['no_of_sessions'] = $dataf['no_of_sessions'] ;

		

		

		return $data ;

		

	

	}

	function getProfile_other(){

		

		$doc_id = $this->session->userdata('userId');

		$query = $this->db->get_where('doctors_profile',array('doctor_id =' => $doc_id) );

		$dataf = $query->row_array();

	

	

		if($dataf['professional_experience']!=NULL )

		$data["experience"] = explode(";" , $dataf['professional_experience'] );

		else

		$data["experience"] = array();

		if($dataf['awards_publications']!=NULL )

		$data["awards"] = explode(";" , $dataf['awards_publications'] );

		else

		$data["awards"] = array();

		

		if($dataf['certifications']!=NULL )

		$data["certifications"] = explode(";" , $dataf['certifications'] ) ;

		else

		$data["certifications"] = array();

		

		

		return $data ;

		

	

	}

	

	

	

	function edit_profile_speciality(){

		

		$doc_id = $this->session->userdata('userId');

		

		$data['subspeciality'] = $_POST['subspeciality'];

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors', $data );

		

		return "Speciality Details Sucessfully Updated" ;

	}

	

	

	

	

	function edit_profile_schedule(){

		

		

		$doc_id = $this->session->userdata('userId');

		

		$data["session_1_start"] = $_POST["session_1_start"] ;

		$data["session_1_end"] =$_POST["session_1_end"] ;

	

		$data["session_2_start"] = $_POST["session_2_start"] ;

		$data["session_2_end"] = $_POST["session_2_end"] ;

		

		$data["session_3_start"] = $_POST["session_3_start"] ;

		$data["session_3_end"] = $_POST["session_3_end"] ;

		

		$data["no_of_sessions"] = $_POST["no_of_sessions"] ;

		

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctor_schedule', $data );

		

	

	}

	

	

	function edit_profile_sec_schedule(){

		

		

		$doc_id = $this->session->userdata('userId');

		

		$data["session_1_start"] = $_POST["sec_session_1_start"] ;

		$data["session_1_end"] =$_POST["sec_session_1_end"] ;

	

		$data["session_2_start"] = $_POST["sec_session_2_start"] ;

		$data["session_2_end"] = $_POST["sec_session_2_end"] ;

		

		$data["session_3_start"] = $_POST["sec_session_3_start"] ;

		$data["session_3_end"] = $_POST["sec_session_3_end"] ;

		

		$data["no_of_sessions"] = $_POST["second_no_of_sessions"] ;

		$data["appointment_duration"] = $_POST["sec_appointment_duration"] ;

		

		$dataf['city'] = $_POST['sec_doc_city']  ;

		$dataf['state'] = $_POST['sec_doc_state']  ; 

		$dataf['address'] = $_POST['sec_address'] ;

		$dataf['landmark'] = $_POST['sec_doc_landmark'] ;

		$dataf['latitude'] = $_POST['sec_latitude']  ; 

		$dataf['longitude'] = $_POST['sec_longitude']  ; 

		

		

		$this->db->where(array('doctor_id' => $doc_id ));

		if($this->db->count_all_results('doctor_schedule_secondary')==1){

			$this->db->where('doctor_id', $doc_id);

			$this->db->update('doctor_schedule_secondary', $data );

			$this->db->where('doctor_id', $doc_id);

			$this->db->update('doctor_address_secondary', $dataf );

		}else{

			$data['doctor_id'] = $doc_id;

			$this->db->insert('doctor_schedule_secondary', $data );

			$dataf['doctor_id'] = $doc_id;

			$this->db->insert('doctor_address_secondary', $dataf );	

		}

	

	}

	

	

	

	

	

	

	

	function edit_profile_certifications(){

		

		

		$doc_id = $this->session->userdata('userId');

		$data["certifications"] = $_POST["certifications"] ;

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors_profile', $data );

		

	

	}

	

	function edit_profile_experience(){

		

		

		$doc_id = $this->session->userdata('userId');

		$data["professional_experience"] = $_POST["professional_experience"] ;

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors_profile', $data );

		

	

	}

	function edit_profile_publications(){

		

		

		$doc_id = $this->session->userdata('userId');

		$data["awards_publications"] = $_POST["awards_publications"] ;

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors_profile', $data );

		

	

	}

	

	



	

	function edit_profile_address(){

	

    	$doc_id = $this->session->userdata('userId');

		

        $data['city'] = $_POST['doc_city'];

		$data['state'] = $_POST['doc_state']; 

        $data['address'] = $_POST['doc_add'];

		$data['landmark'] = $_POST['doc_land'];

		$data['latitude'] = $_POST['latitude']; 

		$data['longitude'] = $_POST['longitude']; 

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors', $data );

		

		return "Location Details Sucessfully Updated" ;

		

	}

    

	function edit_qualification(){

		 

		$doc_id = $this->session->userdata('userId');

		

        $data['doctor_grad_year'] = $_POST['doctor_grad_year'];

		$data['doctor_grad_degree'] = $_POST['doctor_grad_degree']; 

        $data['doctor_grad_college'] = $_POST['doctor_grad_college'];

		$data['doctor_postgrad_year'] = $_POST['doctor_postgrad_year'];

		$data['doctor_postgrad_degree'] = $_POST['doctor_postgrad_degree']; 

        $data['doctor_postgrad_college'] = $_POST['doctor_postgrad_college'];

        $data['doctor_supergrad_year'] = $_POST['doctor_supergrad_year'];

		$data['doctor_supergrad_degree'] = $_POST['doctor_supergrad_degree']; 

        $data['doctor_supergrad_college'] = $_POST['doctor_supergrad_college'];

		$this->db->where('doctor_id', $doc_id);

		$this->db->update('doctors_profile', $data );

		

		return "Qualification Details Sucessfully Updated" ;

		

	}

	

   function process_appointment($trans_id)

    {

		

    	$data['problem'] = $_POST['problem']; 

        $data['symptoms'] = $_POST['symptoms'];

		$data['diagnosis'] = $_POST['diagnosis']; 

        $data['medication'] = $_POST['medication'];

		$data['medication_time'] = $_POST['medication_time'];

		$data['medication_special'] = $_POST['medication_special'];

		$data['recommendation'] = $_POST['recommendation'];

		$data['blood_presure'] = $_POST['blood_presure'];

		$data['heart_beat'] = $_POST['heart_beat']; 

        $data['temperature'] = $_POST['temperature'];

        $data['other'] = $_POST['other'];

		$data['diagnosis_id'] = $trans_id; 

		$this->db->insert('diagnosis', $data);

		

		

		$datares['transaction_status'] = 2 ; 

		$this->db->where('transaction_id', $trans_id);

		$this->db->update('appointment',$datares);

			

		

    }



  function get_doctor_slots($id = false){

		

		

		if(!$id)

			$id =$this->session->userdata('userId');

	

		//$id=1;

	

		$app_time = 15 ;

		$cnt = array(0,0,0,0,0,0,0)  ;

		$query = $this->db->get_where('doctor_schedule',array('doctor_id =' => $id) );

		$dataf = $query->row_array();

		$dataf['slots_start'] = $dataf['session_1_start'];

		$dataf['slots_end'] = $dataf['session_1_end'];

		$data["Week_start"] = explode(";" , $dataf['slots_start'] );

		$data["Week_end"] = explode(";" , $dataf['slots_end'] );

		

		

		 $days[0]="Monday";

		 $days[1]="Tuesday";

		 $days[2]="Wednesday";

		 $days[3]="Thrusday";

		 $days[4]="Friday";

		 $days[5]="Sauturday";

		 $days[6]="Sunday";

		 

		for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){

			

			//echo $app_time ;

			$temptime = (int)$data["Week_start"][$i] ;

			if((int)$data["Week_start"][$i]<=2400 && (int)$data["Week_end"][$i]<=2400){

			$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 

			for($j=0 ; $j<floor($totaltime/100) ; $j++){

				for($k=0 ; $k < 60/$app_time ; $k++ ){

					$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime   ;

					$cnt[$i]++ ;

					

					$temptime += $app_time ;  

			

					if($temptime%100 == 60)

					{

						$temptime -= 60 ;

						$temptime += 100 ;

					}

				}

				

			}

			if(($totaltime)%100 != 0 ){ 

				

				$lefttime = $totaltime%100  ;

				if($lefttime > 60 ){

					$lefttime -= 40 ;

				}

				for ( $k =0 ; $k < $lefttime/$app_time ; $k++) { 

					$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime;

					$temptime += $app_time ;  

			

					if($temptime%100 == 60)

					{

						$temptime -= 60 ;

						$temptime += 100 ;

					}

					$cnt[$i]++ ;

				}

			}

			}

			//echo $totaltime ;

		}

		

		$dataf['slots_start'] = $dataf['session_2_start'];

		$dataf['slots_end'] = $dataf['session_2_end'];

		$data["Week_start"] = explode(";" , $dataf['slots_start'] );

		$data["Week_end"] = explode(";" , $dataf['slots_end'] );

		

		for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){

			

			//echo $app_time ;

			$temptime = (int)$data["Week_start"][$i] ;

			if((int)$data["Week_start"][$i]<=2400 && (int)$data["Week_end"][$i]<=2400){

			$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 

			for($j=0 ; $j<floor($totaltime/100) ; $j++){

				for($k=0 ; $k < 60/$app_time ; $k++ ){

					$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime   ;

					$cnt[$i]++ ;

					

					$temptime += $app_time ;  

			

					if($temptime%100 == 60)

					{

						$temptime -= 60 ;

						$temptime += 100 ;

					}

				}

				

			}

			if(($totaltime)%100 != 0 ){ 

			

				$lefttime = $totaltime%100  ;

				if($lefttime > 60 ){

					$lefttime -= 40 ;

				}

				for ( $k =0 ; $k < $lefttime/$app_time ; $k++) { 

					$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime;

					$temptime += $app_time ;  

			

					if($temptime%100 == 60)

					{

						$temptime -= 60 ;

						$temptime += 100 ;

					}

					$cnt[$i]++ ;

				}

			}

			}

			//echo $totaltime ;

		}

		

		$dataf['slots_start'] = $dataf['session_3_start'];

		$dataf['slots_end'] = $dataf['session_3_end'];

		$data["Week_start"] = explode(";" , $dataf['slots_start'] );

		$data["Week_end"] = explode(";" , $dataf['slots_end'] );

		for($i = 0 ; $i <sizeof($data["Week_start"]) ; $i++ ){

			

			//echo $app_time ;

			$temptime = (int)$data["Week_start"][$i] ;

			if((int)$data["Week_start"][$i]<=2400 && (int)$data["Week_end"][$i]<=2400){

			$totaltime = (int)$data["Week_end"][$i] - (int)$data["Week_start"][$i]; 

			for($j=0 ; $j<floor($totaltime/100) ; $j++){

				for($k=0 ; $k < 60/$app_time ; $k++ ){

					$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime   ;

					$cnt[$i]++ ;

					

					$temptime += $app_time ;  

			

					if($temptime%100 == 60)

					{

						$temptime -= 60 ;

						$temptime += 100 ;

					}

				}

				

			}

			if(($totaltime)%100 != 0 ){ 

			

				$lefttime = $totaltime%100  ;

				if($lefttime > 60 ){

					$lefttime -= 40 ;

				}

				for ( $k =0 ; $k < $lefttime/$app_time ; $k++) { 

					$data['slot'][$days[$i]][$cnt[$i]] = "".$temptime;

					$temptime += $app_time ;  

			

					if($temptime%100 == 60)

					{

						$temptime -= 60 ;

						$temptime += 100 ;

					}

					$cnt[$i]++ ;

				}

			}

			}

			//echo $totaltime ;

		}

		

		$max = $cnt[0];

		

		for($j=0 ; $j<7 ;$j++ ){

			

			//echo $cnt[$j] ; 

			if($max<$cnt[$j])

				$max = $cnt[$j]; 

			

		}

		$data['max'] = $max ;

		

		

		return $data ;

		

	}





	



}