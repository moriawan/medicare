<?php

class Esotalk_model extends CI_Model {





    function __construct()

    {

		//please configure curn URL

        // Call the Model constructor

        parent::__construct();

        $this->load->database();

	
    }

	

	

	function get_cid($uid=false){

	
		if(!$uid)return false;
		
		$user = 'conversation' ;
 		$query = $this->db->query('SELECT convid FROM '.$user.' WHERE uid = '.$uid);
		$row = $query->row();

		return $row->convid;


	}

}