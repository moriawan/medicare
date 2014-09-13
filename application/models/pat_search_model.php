<?php
class Pat_search_model extends CI_Model {


    function __construct()
    {
		//please configure curn URL
        parent::__construct();
        $this->load->database();
		
    }
	
	
	
	function searchByFname($name){
		
		
		//echo $name ;
 		$query = $this->db->get_where('patient_login', array('fname' => $name ));
		if($query)
			return $query->result();
		else 
			return false;
	}
	
	
	
	function searchByLname($name){
	
 		$query = $this->db->get_where('patient_login', array('lname' => $name ));
		if($query)
			return $query->result();
		else 
			return false;
	}
	
	
	
	function searchById($name){
		
	
		$query = $this->db->get_where('patient_login', array('patient_id' => $name ));
		if($query)
			return $query->result();
		else 
			return false;

		
	}
	
	
	
	
	
}