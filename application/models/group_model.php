<?php
class Group_model extends CI_Model {


    function __construct()
    {
		//please configure curn URL
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->helper('url');
		
    }

	
	function returncurl($url){
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'mymedicare.txt');
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		
		return $result ;
		
	}
	
	
	function getAllGroups(){
		
		$url = base_url()."esotalk/channels/Json_view" ;
		$groups = $this->returncurl($url);
		return $groups ;
		
	}
	
	
	
	function getDocSubscribed($docId){
		
		
		$uid = $docId;
		$query = $this->db->get_where('subscription', array('doc_id' => $uid ));
		$result = $query->result(); 
		foreach( $row as $result ){
			
		}
		
	
	}
	
	
	function getPosts($channel){
		
		$url =  base_url()."esotalk/conversations/index.json/".$channel;
		$groups  = $this->returncurl($url) ;
		return $groups ;
		
	}
	
	
	function subscribeDoc($data){
		
		$this->db->where(array('user_id' => $data['user_id'],'group_id' => $data['group_id']));
		if($this->db->count_all_results('subscription')==1){
			}
		else
		{
			$this->db->insert('subscription', $data);
			//echo "Inserted";
		}
	}
	
	function unsubscribeDoc($data){
		
		$query = $this->db->where( array('user_id' => $data['user_id'],'group_id' => $data['group_id']));
		
		$this->db->delete('subscription');
			
	
	}
	
		
	function getFeeds($data){

	
		$url= base_url()."esotalk/conversation/index.view/".$data['cid']."/".$data['page']."?medicare=".$data['medicare'] ;
		$conversation  = $this->returncurl($url) ;
		return $conversation ;
		
	}
	
	function createGroup($data){

	
		$url= base_url()."esotalk/channels/create.view/"."?medicare=".$data['medicare'] ;
		$conversation  = $this->returncurl($url) ;
		return $conversation ;
		
	}
	
	function postFeeds($data){

	
		$url=base_url()."esotalk/conversation/index.view/".$data['cid']."/".$data['page']."?medicare=".$data['medicare'] ;
		$conversation  = $this->returncurl($url) ;
		return $conversation ;
		
	}
	
	function startFeeds($data){

	
		$url=base_url()."esotalk/conversation/start.view/"."?medicare=".$data['medicare'] ;
		$conversation  = $this->returncurl($url) ;
		return $conversation ;
		
	}
	
	function getMyGroups($data){
	
		$query = $this->db->get_where('subscription', array('user_id' => $data['user_id'] ));
		$result = array() ;
		$result = $query->result();	
		//echo sizeof($result) ;
		if(sizeof($result)==0)
			return false ;
		else 
			return $result ;
		
	}
	
	
	
}