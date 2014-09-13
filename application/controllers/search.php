<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Search extends CI_Controller {

	 

	 public function __construct()

	{

		parent::__construct();

	

		$this->load->model('search_model');

		$this->load->helper('form');

	  	$this->load->library('form_validation');



	

	}

	

	function index() {

		

	

	
		$Dlist = false;
	

		$uid = $this->session->userdata('userId');
		
		
		$eid = $this->search_model->getEidFromUID($uid);
		
		

		if(!$uid){

			

			$data['loggedIn']=false;

			}

		else $data['loggedIn']=true;

		

	

		if($city = $this->input->get_post('city', TRUE))

		{

			

			$result=$this->search_model->searchByCity();

			

			}

			

		else if($speciality = $this->input->get_post('speciality', TRUE)){

			

			$result=$this->search_model->searchBySpeciality();

			

			}

		else if($name = $this->input->get_post('name', TRUE)){

			

			$result=$this->search_model->searchByName();

			

			//redirect(base_url());

			

			//$result=$this->search_model->searchByCity();

				

			}

	

		$i=0;



		

		

		foreach ($result->result() as $row)
		{


			$result2[]=$this->search_model->getName($row->doctor_id,1);
			$result3[]=$this->search_model->getDetailsbyID($row->doctor_id);
			
		//	echo $row->doctor_id." <br />";
			
			foreach($result2[$i]->result() as $row2){

					
					//echo $row2->fname.$i;
					
					$Dlist[$i]['fname'] = $row2->fname;
					$Dlist[$i]['lname'] = $row2->lname;
					$Dlist[$i]['email'] = $row2->email;
					

					}
					
					
			foreach($result3[$i]->result() as $row3){
				
					$Dlist[$i]['speciality'] = $row3->speciality;
					$Dlist[$i]['fee'] = $row3->fee;
					$Dlist[$i]['city'] = $row3->city;
					$Dlist[$i]['address'] = $row3->address;
					$Dlist[$i]['docotr_id'] = $row3->doctor_id;
					
									
				}
				/**/

					

				$i++;	

			//echo $row->doctor_id.'<br />';

			//echo $row->fee.'<br />';

			//echo $row->address.'<br />';

			

			

			 

			

		}

		

	$data['eid']=$eid;

	$data['Dlist'] = $Dlist;
		

	$this->load->view('header/search-header.php',$data);

		

	$this->load->view('search.php',$data);

	

	$this->load->view('footer.php');

	

	//die(sizeof($result2)."here ");

		

	//	redirect(base_url());

		

		}

	

}

	

	 