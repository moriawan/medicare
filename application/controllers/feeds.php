<?php 

session_start();





if ( ! defined('BASEPATH')) exit('No direct script access allowed');



//require "http://localhost/medicare/esotalk/ET.class.php"; 



class feeds extends CI_Controller {

	

	public function __construct()

	{

		parent::__construct();

		$this->load->model('login_model');

		$this->load->library('session');

	

	}

	

	

	public function myfeeds($cid = false,$userId = false, $page=1)

	{

		$this->load->helper('url');

     

	 	//$_session['current_url']=current_url();

		

		$uid=false;
		$data['owner'] = true;

		$uid = $this->session->userdata('userId');
		$data['type'] = $this->session->userdata('user_type');

if($userId){

			if($uid!=$userId){
				
				if($data['type']=='Doctor'){
			
					  $data['user_2'] = 1;
					
					}
				else 	$data['user_2'] = 2;
				
				$data['owner'] = false;
				$data['userId'] = $userId;

				}

			}
	
	

		if(!$uid){

			

			die('You need to login to view this');

			}

		//die($uid);

	

		//die($quote);

		

		//$data['Username'] = "amannot4u@gmail.com" ; 

		//$data['Password'] = "d1f3f0e66076c0e08437ce245622ee6d" ;

		

		//$success=$this->login_model->doctor_login($data) ;

	

	

		

	 	$data['token']= $this->session->userdata('eso_token');

		$data['cid']= $cid;

		$data['uid']= $uid;

		$data['uid']= $uid;

		

		

		//echo " hell ".$data['token']." cid is $cid";

		//die();

		

		

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_COOKIEFILE, 'mymedicare.txt');

		

		$post = $this->input->get_post('quote', TRUE);

			

		

			

		if($post){

			

			$medicare=current_url();

			

			$medicare=preg_replace("/\//","-",$medicare);

			$medicare=preg_replace("/\?.*/","",$medicare);

			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);

			

			

			

		$url=base_url()."esotalk/conversation/index.view/".$cid."/".$page."?quote=".$post."&medicare=".$medicare;

				//die($url);

				

			}

			

		else

		{

			$medicare=current_url();

			

			$medicare=preg_replace("/\//","-",$medicare);

			$medicare=preg_replace("/\?.*/","",$medicare);

			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);

			$medicare=preg_replace("/\-last/","",$medicare);

			

			//die("<br />".$medicare);

			

			$url=base_url()."esotalk/conversation/index.view/".$cid."/".$page."?medicare=".$medicare;

			

			//die($url);

		}

		

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		

		$content = curl_exec($ch);

		//echo $content;

		

		

		

		

		

		$data['feeds']=$content;

		//echo $data['feeds'];

		

		$this->load->view('headerfeeds.php', $data);

		$this->load->view('feeds.php',$data);

		$this->load->view('footer.php');

		

		

	}

	

}

