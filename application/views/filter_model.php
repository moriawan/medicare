<?php
class Filter_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
        $this->load->database();
		
    }
	
	function filterTime($ids , $data){
		
		$result = array() ;
		$i = 0 ;
			
		foreach($ids as $id){
			
			$this->db->where(array("doctor_id" => $id->doctor_id ));
			$query = $this->db->get('doctor_schedule') ;
			$resultData = $query->row_array();	
			$num = $resultData['no_of_sessions']; 
			
			for($j=0 ; $j < $num ; $j++ ){
				
				$flag = 0 ;
				$start = "session_".($j+1)."_start" ;
				$end = "session_".($j+1)."_end" ;
				
				$dayStart = explode(";" , $resultData[$start] );
				$dayEnd = explode(";" , $resultData[$end] );
				
				for($k=0 ; $k<7 ; $k++)
				{
					if($data['availability'][$k]=='1')
					{
						if($dayStart[$k]!='9999')
						if(isset($data['time'])){
						
							list($str ,$ed) = explode("-" , $data['time'] );
							if($dayStart[$k]<=$ed&&$dayEnd[$k]>$ed){
								$result[$i] = $id->doctor_id ;
								$i++;
								$flag = 1; 
								break ;
							}
							if($dayStart[$k]<=$str&&$dayEnd[$k]>$str){
								
								$result[$i] = $id->doctor_id ;
								$i++;
								$flag = 1; 
								break ;
							}
							if($dayStart[$k]>=$str&&$dayStart[$k]<$ed){
								$result[$i] = $id->doctor_id ;
								$i++;
								$flag = 1; 
								break ;
							}
							if($dayEnd[$k]>=$str&&$dayEnd[$k]<$ed){
								$result[$i] = $id->doctor_id ;
								$i++;
								$flag = 1; 
								break ;
							}
							
							
							
						}
						
						else if($dayStart[$k]!='9999'){
							
							$result[$i] = $id->doctor_id ;
							$i++;
							$flag = 1; 
							break ;
						}
						
					
						
					}
					
				}
				
			if($flag==1)
			break ;
					
			}
			
			
			
		}
		
		return $result ;
		
	}

	
	function getDocIds($data){

		$this->db->select('doctor_id');
		
		if(isset($data['fee']))
		{	
			list($low,$high) = explode('-', $data['fee']);
			$this->db->where(array("fee >=" => $low , "fee <=" => $high ));	
		}
		if(isset($data['state']))
		{
			$this->db->where(array("state" => $data['state'] ));
		}
		if(isset($data['speciality']))
		{
			$this->db->where(array("speciality" => $data['speciality'] ));		
		}
		if(isset($data['city']))
		{
			$this->db->where(array("city" => $data['city'] ));		
		}
		
		$query = $this->db->get('doctors');
		$result = $query->result() ;
		$ids = array();
		
		if(isset($data['availability']))
		$ids = $this->filterTime($result ,$data) ;
		else
		{
			$j=0 ;
			foreach($result as $id)
				$ids[$j++] = $id->doctor_id ;
			
		}
		
		return  $ids ;
		
	}
	
	
	
	
	
}