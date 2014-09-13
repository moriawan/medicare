<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class welcome extends CI_Controller {



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

		//$this->load->library('session');

		$this->load->model('patient_model');


		

}

	

	 

	 

	public function index()

	{

	 	

		

	 	$this->load->helper('form');

     	

		$uid=false;

		$uid = $this->session->userdata('userId');

		$user_type = $this->session->userdata('user_type');

		

		$cities =  $this->patient_model->getCities();
		$speciality =  $this->patient_model->getSpecialities();
		
		$data['cities'] = $cities;
		$data['speciality'] = $speciality;
		

		

		if($this->input->get_post('ret', TRUE))

		{

				list($eid,$token) = explode(":",$this->input->get_post('ret', TRUE));

				

				$this->session->set_userdata('eso_token',$token);

				$this->session->set_userdata('eso_id',$eid);

			

				

				

		}

	 	

		if($uid&&$user_type=='Doctor'){

			

					

		redirect(base_url().'index.php/doctor');

	

			

			}

		else if($uid&&$user_type=='Patient'){

				

		redirect(base_url().'index.php/patient');

	

				

			}

		else $uid =0;

			

		$data['uid']=$uid;

		

		if(!$uid){

			

			$data['loggedIn']=false;

			}

		else $data['loggedIn']=true;

		

		

		$this->load->view('header/search-header.php',$data);

		$this->load->view('home.php',$data);

		$this->load->view('footer.php');



	}





}







/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */