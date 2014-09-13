<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Permissions extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -  

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in 

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see http://codeigniter.com/user_guide/general/urls.html

	 */

	 

	 

public function __construct(){

	

		parent::__construct();

		$this->load->helper('url');

		$this->load->model('permissions_model');

		$this->load->model('doctor_model');
		
		$this->load->model('search_model');

		

}

	

	 

	 

	public function index()

	{

	 	

		$uid=false;

		$uid = $this->session->userdata('userId');

		$user_type = $this->session->userdata('user_type');

				
		$result =  $this->search_model->getName($uid, $user_type);
	  
		$row = $result->row();
  
		$data['name'] = $row->fname.' '.$row->lname;
			  

		

		if($uid&&$user_type=='Doctor'){

			

			$data['uid']=$uid;

			if(!$uid)$data['loggedIn']=false;

			else $data['loggedIn']=true;

			$dataRequest = array() ;

			$temp = $this->permissions_model->doctorActiveRequests($uid);

			$cnt=0 ;

			foreach($temp as $row){

				

				$pid = $row->patient_id ;

				$dataRequest[$cnt++]  = $this->doctor_model->getPatientProfile($pid) ;



			}

			

			$temp = $this->permissions_model->doctorActivePermissions($uid);

			$dataAllowed = array() ;

			foreach($temp as $row){

				

				$pid = $row->patient_id ;

				$dataAllowed[$cnt++]  = $this->doctor_model->getPatientProfile($pid) ;



			}

			

			

			$data['Allowed']= $dataAllowed ;

			$data['Requests'] = $dataRequest ;

			

		

			$this->load->view('header.php',$data);

			$this->load->view('permissions/doctor.php',$data);

			$this->load->view('footer.php');

			

			

			

			}

		else if($uid&&$user_type=='Patient') {

				

			$data['uid']=$uid;

			if(!$uid)$data['loggedIn']=false;

			else $data['loggedIn']=true;

			

			$dataRequest = array() ;

			$temp = $this->permissions_model->patientRequest($uid);

			$cnt=0 ;

			foreach($temp as $row){

				

				$pid = $row->doctor_id ;

				$dataRequest[$cnt++]  = $this->doctor_model->getDoctorProfile($pid) ;



			}

			

			$temp = $this->permissions_model->patientAllowed($uid);

			

			$dataAllowed = array() ;

			$cnt = 0 ;

			foreach($temp as $row){

				

				$pid = $row->doctor_id ;

				$dataAllowed[$cnt++]  = $this->doctor_model->getDoctorProfile($pid) ;



			}

			

			  
			
			

			$data['Allowed']= $dataAllowed ;

			$data['Requests'] = $dataRequest ;

			
						

		

			$this->load->view('header/patient_header.php',$data);

			$this->load->view('permissions/patient.php',$data);

			$this->load->view('footer.php');

			

				

				

			}

			

		

		

		



	}

	

	

	public function request($patient)

	{

	 	

		$uid=false;

		$uid = $this->session->userdata('userId');

		$user_type = $this->session->userdata('user_type');

		

		if($uid&&$user_type=='Doctor'){

			

			$data['doctor']=$uid;

			$data['patient']= $patient ;

			

			$this->permissions_model->requestPermission($data);

		

			redirect(base_url().'index.php/permissions');

	

			

			}

		else {

				echo('Access Denied') ;

			}



	}

	

	

	public function grant($doctor,$time)

	{

	 	

		$uid=false;

		$uid = $this->session->userdata('userId');

		$user_type = $this->session->userdata('user_type');

		

		if($uid&&$user_type=='Patient'){

			

			$this->permissions_model->allow($uid,$doctor,$time);

		

				echo('Success');

			

			}

		else {

				echo('Access Denied') ;

			}



	}

	

	

	public function revoke($doctor)

	{

	 	

		$uid=false;

		$uid = $this->session->userdata('userId');

		$user_type = $this->session->userdata('user_type');

		

		if($uid&&$user_type=='Patient'){

			

			$this->permissions_model->removePermission($uid,$doctor);

		

				echo('Success');

			

			}

		else {

				echo('Access Denied') ;

			}



	}





}







/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */