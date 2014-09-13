<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Patient extends CI_Controller {

	

	 public function __construct()

	{

		parent::__construct();

		
		$this->load->model('esotalk_model');

		$this->load->model('search_model');

		$this->load->model('patient_model');

		$this->load->model('group_model');

		$this->load->model('appointment_model');

	

	

		 $this->load->helper('form');

	 	 $this->load->library('upload');



	}

	

	 

	 

	public function index($userId=false)

	{

		


	   $owner=true;



		$uid = $this->session->userdata('userId');

		//$cid = $this->esotalk_model->get_cid($uid);

		$user_type = $this->session->userdata('user_type');

	 	
		
		//die($uid." ".$cid." ".$user_type);
		

		if($userId){

			

			if($uid!=$userId){

				

				$owner=false;

				}

			}

			
			
		$apps =  $this->patient_model->appointments($uid);

		//die($apps[1]['doctor_id']);
		
		for($i=0;$i<sizeof($apps);$i++)
			{

			//echo $apps[$i]['doctor_id']." ".$apps[$i]['transaction_id']."<br />";

		/*	$transaction =  $this->patient_model->getTransaction($apps[$i]['transaction_id']);

			$apps[$i]['transaction'] = $transaction[0];

			*/

			$doctor =  $this->patient_model->getDoctor($apps[$i]['doctor_id']);
			
			//$query = $doctor->row_array(); 
			
			
			if(isset($doctor[0]))
				$apps[$i]['doctor'] = $doctor[0];


		//	echo $transaction[0]['problem']." ".$doctor[0]['fname']." ".$doctor[0]['lname'];

			}

			$data['apps']=$apps;

			
			
			
			
			
			

		if($owner){

		

	  

		 $day_name[0]="Monday";

		 $day_name[1]="Tuesday";

		 $day_name[2]="Wednesday";

		 $day_name[3]="Thursday";

		 $day_name[4]="Friday";

		 $day_name[5]="Sauturday";

		 $day_name[6]="Sunday";

		 

		}

		else {

			

			$cid = $this->esotalk_model->get_cid($userId);

		

			}

		

			

		/*

		$uid = $this->session->userdata('userId');

		$name = $this->session->userdata('name');

	

		

		$data['uid'] = $uid;

		$data['name'] = $name;*/

		

		//echo $cid.$uid;

		//die();

		

		$subs =  $this->patient_model->getSubs($uid);

		

	

if(sizeof($subs)>1)

	for($i=0;$i<sizeof($subs['uid']);$i++){

				

	$doctorDetails = $this->patient_model->getDoctor($subs['uid'][$i]);
	$subs['doctorDetails'][$i]=$doctorDetails;


	$doctorAttribbs = $this->patient_model->getDetails($subs['uid'][$i]);
	$subs['doctorAttribs'][$i]=$doctorAttribbs;

		

	$cid = $this->esotalk_model->get_cid($subs['uid'][$i]);

	

	$subs['cid'][$i]=$cid;

		

	  }

else 	

{

	$doctorDetails =  "";
	$subs['uid'] = array();
	$subs['doctorDetails'][0]=$doctorDetails;

	//echo 'no array uid '.$subs;

	

	}

			


		$reports = $this->patient_model->getReports($uid) ;

		$result = $this->group_model->getPosts('doctor') ;

		$decoded = json_decode($result)  ;

		

		$list = $decoded->results ;


		//die();

		

		if(!$uid){

						

			die('no access, ded X_X');

			$data['loggedIn']=false;

			$result =  $this->search_model->getName($userId);

			$email =  $this->patient_model->getSubs($userId);

			

			foreach($result->result() as $row2){
	
				$data['name'] = $row2->fname.' '.$row2->lname;

			}

		
			}

		else {

			$data['loggedIn']=true;

			}

		
	  $result =  $this->search_model->getName($uid, $user_type);
	
	  $row = $result->row();

	  $data['name'] = $row->fname.' '.$row->lname;
			  	

	 

					
				
		$data['reports'] = $reports ;

		$data['owner'] = $owner;

//		$data['cid'] = $cid;
	
		$data['uid'] = $uid;

		$data['subs'] = $subs;

		

		



        $cities =  $this->patient_model->getCities();
		$speciality =  $this->patient_model->getSpecialities();
		
		$data['cities'] = $cities;
		$data['speciality'] = $speciality;
		

		$this->load->view('header/patient_header.php',$data);

		$this->load->view('patient/patient-landing.php',$data);

		$this->load->view('footer.php');



	}











public function subscribe($id,$eid){

	

	$uid = $this->session->userdata('userId');

	$cid = $this->esotalk_model->get_cid($id);

	$success =  $this->patient_model->ajaxSubscribe($eid,$cid);

	redirect(base_url()."index.php/patient#Subscriptions");

		

}





public function unSubscribe($id,$eid){

	

	$uid = $this->session->userdata('userId');

	$cid = $this->esotalk_model->get_cid($id);

	$success =  $this->patient_model->ajaxUnSubscribe($eid,$cid);

	redirect(base_url()."index.php/patient#Subscriptions");


}











public function appointment($tid=false){

	if($tid==false)
		{
			die('incorrect parameter recieved, dying x_x');
			
			}

		$transaction =  $this->patient_model->getTransaction($tid);

	    $uid = $this->session->userdata('userId');


		if(!$uid){

			die('ded no login x_x');

			}

		else {

			$data['loggedIn']=true;

			}

			

		$data['transaction'] = $transaction[0];

		$data['tid'] = $tid;
		$data['uid'] = $uid;

		

		$this->load->view('header/patient_header.php',$data);

		$this->load->view('patient/patient-appointment.php',$data);

		$this->load->view('footer.php');

		

	

	}





public function appointments($uid=false){

	

    $uid = $this->session->userdata('userId');

	

	if(!$uid){
			die('ded no login x_x');
			}
	else {
			$data['loggedIn']=true;
			}
	
    $apps =  $this->patient_model->appointments($uid);

	for($i=0;$i<sizeof($apps);$i++)
		{

			//echo $apps[$i]['doctor_id']." ".$apps[$i]['transaction_id']."<br />";

		/*	$transaction =  $this->patient_model->getTransaction($apps[$i]['transaction_id']);

			$apps[$i]['transaction'] = $transaction[0];

			*/

			$doctor =  $this->patient_model->getDoctor($apps[$i]['doctor_id']);

			$apps[$i]['doctor'] = $doctor[0];


		//	echo $transaction[0]['problem']." ".$doctor[0]['fname']." ".$doctor[0]['lname'];

			}

			$data['apps']=$apps;

		$this->load->view('header/patient_header.php',$data);

		$this->load->view('patient/patient-appointments.php',$data);

		$this->load->view('footer.php');

	}





public function edit_profile()

	{

		

		

		$this->load->helper('form');

		$this->load->library('form_validation');

		

		$uid =$this->session->userdata('userId');

		$user_type = $this->session->userdata('user_type');

				
		$result =  $this->search_model->getName($uid, $user_type);
	  
		$row = $result->row();
  
		$name = $row->fname.' '.$row->lname;
			  

		$loggedIn = true;

		if(!$uid){

			$loggedIn = false;
		}

		if(isset($_REQUEST['oldpass']))

		{

			

		//echo "Hello World" ;

		$this->form_validation->set_rules('oldpass', 'Old Password','trim|required|md5');

		$this->form_validation->set_rules('newpass', 'New Password', 'trim|required|matches[confpass]|min_length[6]|max_length[20]|md5');

		$this->form_validation->set_rules('confpass', 'Confirm Password','required');

		$data['view'] = "" ;

		

		if($this->form_validation->run())

		{

			$result  = $this->patient_model->change_passoword() ;

			

		}

		$data = $this->patient_model->get_profile($uid); 	

	
			

		}

		else if(isset($_REQUEST['doc_state']))

		{

			

		//echo "Hello World" ;

		$this->form_validation->set_rules('doc_state', 'State','required|alpha_numeric');

		$this->form_validation->set_rules('doc_city', 'City', 'required|alpha_numeric');

		$this->form_validation->set_rules('doc_add', 'Address','required');

		$this->form_validation->set_rules('doc_land', 'Landmark','required');

		$data['view'] = "" ;

		

		if($this->form_validation->run())

		{

			$result  = $this->patient_model->edit_profile_address() ;

			

		}

		$data = $this->patient_model->get_profile($uid); 	

			

		}

		else if(isset($_REQUEST['fname']))

		{

			

		//echo "Hello World" ;

		$this->form_validation->set_rules('fname', 'First Name','required|alpha_numeric');

		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha_numeric');

		

		

		if($this->form_validation->run())

		{

			$result  = $this->patient_model->edit_profile_name() ;

			

		}

		$data = $this->patient_model->get_profile($uid); 	

	
			

		}

		else if(isset($_REQUEST['special_condition']))

		{

			

		//echo "Hello World" ;

		$this->form_validation->set_rules('age', 'Age','required|numeric');

		/*

		$this->form_validation->set_rules('special_condition', 'Special Condition', 'alpha_numeric');

		$this->form_validation->set_rules('chronic_illness', 'Chronic Illness', 'alpha_numeric');

		$this->form_validation->set_rules('martial_status', 'Martial Status', 'alpha_numeric');

		$this->form_validation->set_rules('blood_type', 'Blood Type', 'alpha_numeric');

		$this->form_validation->set_rules('other_condition', 'Other Condition', 'alpha_numeric');

		$this->form_validation->set_rules('other_condition1', 'Other Condition', 'alpha_numeric');

		*/

		

		

		

		if($this->form_validation->run())

		{

			$result  = $this->patient_model->edit_profile_details() ;

			

		}

		$data = $this->patient_model->get_profile($uid); 	

	
			

		}

		

		else {

		$data['view'] = "" ;

		$data = $this->patient_model->get_profile($uid); 	

		//echo "Hello " ;

		

		

		}

		


	$data['loggedIn'] = $loggedIn;
	$data['name'] = $name;
	$data['uid'] = $uid;
			
	$this->load->view('header/edit-profile-header.php',$data);

	$this->load->view('patient/edit-Profile.php',$data);

	$this->load->view('footer.php');

	
		

	}

	
}

