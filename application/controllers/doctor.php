<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');







class Doctor extends CI_Controller {



	



	 public function __construct()



	{



		parent::__construct();



		



		$this->load->model('appointment_model');



		$this->load->model('doctor_model');



		$this->load->model('esotalk_model');



		$this->load->model('search_model');



		$this->load->model('patient_model');



		$this->load->model('pat_search_model');



		



	}



	



	 



	 



	public function index($userId=false)



	{



	  //  $this->load->helper('url');



	   $owner=true;



        $uid = $this->session->userdata('userId');

		$data['type'] = $this->session->userdata('user_type');

		

		//echo $data['type']." aka ";

		

		

		

		$cid = $this->esotalk_model->get_cid($uid);





		if($userId){



			if($uid!=$userId){

				

				if($data['type']=='Doctor'){

			

					  $data['user_2'] = 1;

					

					}

				else 	$data['user_2'] = 2;

				

				$owner=false;



				}



			}



			



		if($owner){



			

		  $duration= $this->doctor_model->getAppointmentDuration($uid);



		  $rate_appointment=60/$duration;



		  $data_schedule =  $this->doctor_model->get_doctor_schedule();



		  $eAppointments =  $this->doctor_model->get_eAppointments($uid);



			  



			



		//	die($eAppointments[0]['comment']);



			  



	/*	foreach ($data_schedule as $sch_item)



			foreach ($sch_item as $sch)



		 		{



					



				if(sizeof($sch)>1)



				{



						foreach ($sch as $s)



						echo $s." || ";



					}



				else echo $sch."<br />";



				



				}



		 die();*/



		 	  



	



		 $day_name[0]="Monday";



		 $day_name[1]="Tuesday";



		 $day_name[2]="Wednesday";



		 $day_name[3]="Thursday";



		 $day_name[4]="Friday";



		 $day_name[5]="Sauturday";



		 $day_name[6]="Sunday";



		 







		$data['day_name'] = $day_name;



		$data['rate_appointment'] = $rate_appointment;



		$data['eAppointments'] = $eAppointments;	



		$data['data'] = $data_schedule;



	 	



	



	

		$today = $this->appointment_model->doctor_get_today();



	

	 	$data['today'] = $today;



		

	



	



		}



		else {



			



			$cid = $this->esotalk_model->get_cid($userId);



			$result =  $this->search_model->getName($userId);



			



			foreach($result->result() as $row2){



					



					$data['name'] = $row2->fname.' '.$row2->lname;



			}





			}



		



			



		/*



		$uid = $this->session->userdata('userId');



		$name = $this->session->userdata('name');



	



		



		

		$data['name'] = $name;*/



		



		



		



		



		//echo $cid.$uid;



		//die();



		



		if(!$uid){



			



			$data['loggedIn']=false;



			



		

			



	//		die();



			}



		else {



			$data['loggedIn']=true;



		



		}



		



		$data['owner'] = $owner;



		$data['cid'] = $cid;

		$data['uid'] = $uid;

		$data['userId'] = $userId;



		



		



		













		//die();



		



		$this->load->view('header/doctor_header.php',$data);



		$this->load->view('doctor/doctor-landing.php',$data);



		$this->load->view('footer.php');







	}



























public function patients($pageno=0)



	{



	  //  $this->load->helper('url');



   



   		$this->load->helper('form') ;



		$uid=false;



		$uid = $this->session->userdata('userId');



		//user_type = $this->session->userdata('user_type');



		$data['uid']=$uid;



			if(!$uid) $data['loggedIn']=false;



			else $data['loggedIn']=true; 



				



		



		if($this->input->get_post('fname', TRUE))



			{



				$name = $this->input->get_post('fname', TRUE);



				$patients = $this->pat_search_model->searchByFname($name) ;	



			}



			



		else if($this->input->get_post('lname', TRUE))



			{



				$name = $this->input->get_post('lname', TRUE);



				$patients = $this->pat_search_model->searchByLname($name) ;	



			}



		else if($this->input->get_post('pat_id', TRUE))



			{



				$name = $this->input->get_post('pat_id', TRUE);



				$patients = $this->pat_search_model->searchById($name) ;	



			}



		else{



				$patients = array();



			



		}



		



		



		$data['patients']  = $patients  ;



		$data['nextPage'] = $pageno + 1 ;



	 	//$data['today'] = $today ;



		



		$this->load->view('header.php',$data);



		$this->load->view('doctor/patients.php',$data);



		$this->load->view('footer.php');







	}



















public function my_patients($pageno=0)



	{



	  //  $this->load->helper('url');



   



	   $owner=true;







        $uid = $this->session->userdata('userId');



		$cid = $this->esotalk_model->get_cid($uid);



	 



		



		if(!$uid){



			



			$data['loggedIn']=false;



			



	//		die();



			}



		else {



			$data['loggedIn']=true;



			$result =  $this->search_model->getName($uid);



			



			foreach($result->result() as $row2){



					



					$data['name'] = $row2->fname.' '.$row2->lname;



			}



		}



		



		$data['owner'] = $owner;



		$data['cid'] = $cid;



		$data['patients']  = $this->doctor_model->getAllPatients($uid,$pageno) ;



		$data['nextPage'] = $pageno + 1 ;



	 	//$data['today'] = $today ;



		



		$this->load->view('header/my-patients-header.php',$data);



		$this->load->view('doctor/my-patients.php',$data);



		$this->load->view('footer.php');







	}























/////////////////////////////////////// e - appointments //////////////////////////////////////////















public function e_appointments()



	{



		



        $uid = $this->session->userdata('userId');



	  	



		if(!$uid){die('brb, dying X_X');}



		else $data['loggedIn'] = true;



		



		



		$eAppointments =  $this->doctor_model->get_eAppointments($uid);



		$data['eAppointments'] = $eAppointments;



		



		$this->load->view('header/doctor_header.php',$data);



		$this->load->view('doctor/e-appointments.php',$data);



		$this->load->view('footer.php');







	



	}



	



	



	public function process_eAppointment($tid)



	{



		



		$this->load->helper('url');



     	$this->load->helper('form');



		



	    $uid = $this->session->userdata('userId');



	  	



		if(!$uid){die('brb, dying X_X');}



		else $data['loggedIn'] = true;



		



		



		$patient = $this->appointment_model->getTransPatientDetails($tid);



		$transaction =  $this->patient_model->getTransaction($tid);



		



		$data['patient'] = $patient ;



	  	$data['transaction'] = $transaction[0];



	  	$data['tid'] = $tid;



	  		



		$this->load->view('header/doctor_header.php', $data);



		$this->load->view('doctor/process-eAppointment.php',$data);



		$this->load->view('footer.php');







	



	}



	















public function complete_eAppointment($tid)



	{



		



				



		$trans_id = $tid;



        $data['medication'] = $_POST['medication'];



		$data['medication_time'] = $_POST['medication_time'];



		$data['medication_special'] = $_POST['medication_special'];



		$data['comments'] = $_POST['comments'];



		$data['diagnosis_id'] = $trans_id;



		



		



		



		//$this->doctor_model->process_appointment($trans_id) ;



		



		



		



		$this->load->view('header.php');



		$this->load->view('doctor/complete-appointment.php',$data);



		$this->load->view('footer.php');



	



	}



	











////////////////////////////////////////////////////////////////////////////////////////////////






public function process_appointment($trans=false)

	{
		
     	$this->load->helper('form');
		$data['trans']  = $trans ;
		
		$patient = $this->appointment_model->getTransPatientDetails($data['trans']);

		$data['patient'] = $patient ;

		$data['one']="true" ;

		$this->load->view('header/header-appointment.php');
		$this->load->view('doctor/process-appointment.php',$data);
		$this->load->view('footer.php');


	}




public function complete_appointment($trans=false)

	{
		$this->load->helper('url') ;

		$trans_id = $_POST['trans'] ;

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
		

		$this->doctor_model->process_appointment($trans_id) ;
		$data['one']="true";
		
		$patient = $this->appointment_model->getTransPatientDetails($trans_id);
		$data['patient'] = $patient ;

		$this->load->view('header.php');
		$this->load->view('doctor/complete-appointment.php',$data);
		$this->load->view('footer.php');

	}




public function edit_profile()



	{



		



		



		$this->load->helper('form');



		$this->load->library('form_validation');



		$doc_id = $this->session->userdata('userId');



		



		 $day_name[0]="Monday";



		 $day_name[1]="Tuesday";



		 $day_name[2]="Wednesday";



		 $day_name[3]="Thursday";



		 $day_name[4]="Friday";



		 $day_name[5]="Saturday";



		 $day_name[6]="Sunday";



	



		if(isset($_REQUEST['oldpass']))



		{



			



		//echo "Hello World" ;



		$this->form_validation->set_rules('oldpass', 'Old Password','trim|required|md5');



		$this->form_validation->set_rules('newpass', 'New Password', 'trim|required|matches[confpass]|min_length[6]|max_length[20]|md5');



		$this->form_validation->set_rules('confpass', 'Confirm Password','required');



		$data['view'] = "" ;



		



			if($this->form_validation->run())



			{



				$result  = $this->doctor_model->change_passoword() ;



				



			}



		



			



		}



		 if(isset($_REQUEST['doc_state']))



		{



			



		//echo "Hello World" ;



		$this->form_validation->set_rules('doc_state', 'State','required|alpha_numeric');



		$this->form_validation->set_rules('doc_city', 'City', 'required|alpha_numeric');



		$this->form_validation->set_rules('doc_add', 'Address','required');



		$this->form_validation->set_rules('doc_land', 'Landmark','required');



		$data['view'] = "" ;



		



			if($this->form_validation->run())



			{



				$result  = $this->doctor_model->edit_profile_address() ;



				



			}



	



			



		}



		 if(isset($_REQUEST['doctor_grad_college']))



		{



			



		//echo "Hello World" ;



		$this->form_validation->set_rules('doctor_grad_college', 'Graduation College','requiredalpha_numeric');



		$this->form_validation->set_rules('doctor_grad_year', 'Graduation Year', 'required|alpha_numeric');



		$this->form_validation->set_rules('doctor_grad_degree', 'Graduation Degree','required|alpha_numeric');



		



		$data['view'] = "" ;



			



			if($this->form_validation->run())



			{



				$result  = $this->doctor_model->edit_qualification() ;



				



			}



	



			



		}



		 if(isset($_REQUEST['fname']))



		{



			



		//echo "Hello World" ;



		$this->form_validation->set_rules('fname', 'First Name','required|alpha_numeric');



		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha_numeric');



		$this->form_validation->set_rules('doc_fee', 'Consultation Fee','required|numeric');



		$this->form_validation->set_rules('doc_duration', 'Consultation Duration','required|numeric');



		$data['view'] = "" ;



			



			if($this->form_validation->run())



			{



				$result  = $this->doctor_model->edit_profile_appointmnet() ;



				



			}



		



			



		}



		if(isset($_REQUEST['subspeciality']))



		{



			



		//echo "Hello World" ;



		$this->form_validation->set_rules('subspeciality', 'Speciality','');



		$data['view'] = "" ;



		



			if($this->form_validation->run())



			{



				$result  = $this->doctor_model->edit_profile_speciality() ;



				



			}



			



			



		}



		if(isset($_REQUEST['awards_publications']))



		{



			



				$result  = $this->doctor_model->edit_profile_publications() ;



			



		}



		if(isset($_REQUEST['professional_experience']))



		{



				$result  = $this->doctor_model->edit_profile_experience() ;



			



		}



		if(isset($_REQUEST['certifications']))



		{



				$result  = $this->doctor_model->edit_profile_certifications() ;



			



		}



		if(isset($_REQUEST['no_of_sessions']))



		{



				$result  = $this->doctor_model->edit_profile_schedule() ;



			



		}



		if(isset($_REQUEST['second_no_of_sessions']))



		{



				$result  = $this->doctor_model->edit_profile_sec_schedule() ;



			



		}



		if(isset($_REQUEST['address']))



		{



				$result  = $this->doctor_model->edit_profile_sec_schedule() ;



			



		}



		$data['view'] = "" ;



		$data = $this->doctor_model->get_profile($doc_id);



		$data['schedule'] = $this->doctor_model->getschedule();



		$temp = $this->doctor_model->getProfile_other();



		



		$data['experience'] = $temp['experience'] ;



		$data['awards'] = $temp['awards'] ;



		$data['certifications'] = $temp['certifications'] ;



		



		$temp = $this->doctor_model->getSecondschedule();



		



		if($temp==false){



			$data['secSchedule'] = false; 



		}



		else{



			$data['secSchedule'] = $temp ;



		}



		



		$data['uid'] = $doc_id;



		



		$this->load->view('doctor/edit-Profile-header.php',$data);



		$this->load->view('doctor/edit-Profile.php',$data);



		$this->load->view('footer.php');



		



		



		



		



	}



		



	



	



	



}



