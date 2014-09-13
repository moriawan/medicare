<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller {
	 
	 public function __construct()
	{
		parent::__construct();
	
		$this->load->model('group_model');
		$this->load->helper('form');
	  	$this->load->library('form_validation');
		$this->load->helper('url');
	
	}
	
	function index() {
		
		
		$uid = $this->session->userdata('userId');
		
		if(!$uid){
			
			$data['loggedIn']=false;
		}
		else $data['loggedIn']=true;
		
		$result = $this->group_model->getAllGroups() ;
		$data['uid'] = $uid ;
		$decoded = json_decode($result)  ;
		
		$data['result'] = $decoded ;
		
		$this->load->view('header/allgroup-header.php',$data);	
		$this->load->view('groups/allgroups.php',$data);
		$this->load->view('footer.php');

		
		}
		
		
	function subscribe(){
		
				$doc['user_id'] = $this->input->get_post('doc', TRUE) ;
				$doc['group_id'] = $this->input->get_post('ch', TRUE) ;
				$doc['slug'] = $this->input->get_post('slug', TRUE) ;
				$doc['description'] = $this->input->get_post('desc', TRUE) ;
				$doc['title'] = $this->input->get_post('title', TRUE) ;	
				
				$this->group_model->subscribeDoc($doc);
				//echo "Success" ;
		
	}
	
	function channel($slug = false) {
		
		$uid = $this->session->userdata('userId');
		
		if(!$uid){
			
			$data['loggedIn']=false;
			}
		else $data['loggedIn']=true;
		
		$result = $this->group_model->getPosts($slug) ;
		
		$decoded = json_decode($result)  ;
		
		$finalr = $decoded->results ;
		
		$data['result'] = $finalr ;
		
		//$res = json_encode($finalr) ;
		
	 	$this->load->view('header/groupfeeds-header.php',$data);	
		$this->load->view('groups/groupfeeds.php',$data);
		$this->load->view('footer.php');
	
	}
	
	
	function feeds($cid=false,$page=1){
		
		
		$uid=false;
		$uid = $this->session->userdata('userId');
	
		if(!$uid){
			die('You need to login to view this');
			}
			
		$post = $this->input->get_post('quote', TRUE);
		
		$medicare=current_url();
			
			$medicare=preg_replace("/\//","-",$medicare);
			$medicare=preg_replace("/\?.*/","",$medicare);
			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
			$medicare=preg_replace("/\-last/","",$medicare);
		
		
		$data['token']= $this->session->userdata('eso_token');
		$data['cid']= $cid;
		$data['uid']= $uid;
		
		$result['cid'] = $cid;
		$result['page'] = $page ; 
		$result['medicare'] = $medicare ;
		
		$content = $this->group_model->getFeeds($result) ;
		
		
		$data['feeds']=$content;
		
		$this->load->view('headerfeeds.php', $data);
		$this->load->view('groups/viewfeeds.php',$data);
		$this->load->view('footer.php');
		
	}
	
	function create(){
		
		
		$uid=false;
		$uid = $this->session->userdata('userId');
	
		if(!$uid){
			die('You need to login to view this');
			}
		
		$medicare=current_url();
			
			$medicare=preg_replace("/\//","-",$medicare);
			$medicare=preg_replace("/\?.*/","",$medicare);
			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
			$medicare=preg_replace("/\-last/","",$medicare);
		
		
		$data['token']= $this->session->userdata('eso_token');
		$data['uid']= $uid;
		
		$result['medicare'] = $medicare ;
		
		$content = $this->group_model->createGroup($result) ;
		
		
		$data['feeds']=$content;
		
		$this->load->view('header/createGroup-header.php', $data);
		$this->load->view('groups/viewfeeds.php',$data);
		$this->load->view('footer.php');
		
	}
	
	
	function startfeed($cid=false,$page=1){
		
		
		$uid=false;
		$uid = $this->session->userdata('userId');
	
		if(!$uid){
			die('You need to login to view this');
			}
			
		$post = $this->input->get_post('quote', TRUE);
		
		$medicare=current_url();
			
			$medicare=preg_replace("/\//","-",$medicare);
			$medicare=preg_replace("/\?.*/","",$medicare);
			$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
			$medicare=preg_replace("/\-last/","",$medicare);
		
		
		$data['token']= $this->session->userdata('eso_token');
		$data['cid']= $cid;
		$data['uid']= $uid;
		
		$result['cid'] = $cid;
		$result['page'] = $page ; 
		$result['medicare'] = $medicare ;
		
		$content = $this->group_model->startFeeds($result) ;
		
		
		$data['feeds']=$content;
		
		$this->load->view('headerfeeds.php', $data);
		$this->load->view('groups/startfeed.php',$data);
		$this->load->view('footer.php');
		
	}
	
	function my_groups($page=1){
		
		$uid = $this->session->userdata('userId');
		
		if(!$uid){
			
			$data['loggedIn']=false;
		}
		
		else $data['loggedIn']=true;
		
		$temp['user_id'] = $uid ;
		
		$result = $this->group_model->getMyGroups($temp) ;
		$data['uid'] = $uid ;
		
		$data['result'] = $result ;
		
		$this->load->view('header/mygroup-header.php',$data);	
		$this->load->view('groups/mygroup.php',$data);
		$this->load->view('footer.php');

		
		
	}
	
	
	function unsubscribe(){
		
				$doc['user_id'] = $this->input->get_post('doc', TRUE) ;
				$doc['group_id'] = $this->input->get_post('ch', TRUE) ;	
				
				$this->group_model->unsubscribeDoc($doc);
				
				echo "Success" ;
		
	}
	
	
}
	
	 