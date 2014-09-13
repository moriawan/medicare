<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Upload extends CI_Controller {



	function __construct()

	{

		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->model('patient_model');

		

	}



	function index()

	{

		$this->load->view('upload_form', array('error' => ' ' ));

	

	}



	function do_upload($path = './uploads/', $type = 'pdf', $file_name = 'default', $ret = false)

	{

		
		

		//die($path." type  = ".$type." $filename ".$file_name);

		

		$name = $this -> input->get_post('name', TRUE);

		$labName = $this -> input->get_post('labName', TRUE);

		

		if($ret != false){
		
			$path=preg_replace("/\-/","/",$path);
			$ret=preg_replace("/\-/","/",$ret);
  		    $config['overwrite'] = TRUE; //overwrite user avatar
       
		
			}

		//die($path."<br />".$type."<br />".$file_name."<br />".$ret);
		
		$config['upload_path'] = $path;

		$config['allowed_types'] = $type;

		$config['max_size']	= '5000';



		if($file_name == 'default')
			  $config['file_name']  = $this->patient_model->setReportName($name,$labName) ;
		else $config['file_name']  = $file_name ;
	




		$this->load->library('upload', $config);



		if ( ! $this->upload->do_upload())

		{

			$error = array('error' => $this->upload->display_errors());

			

			

			if($ret)

				redirect($ret);

			else $this->load->view('patient/patient-landing', $error);

		

		}

		else

		{

			$data = array('upload_data' => $this->upload->data());

			

			if($ret)redirect($ret);

			else $this->load->view('upload_success', $data);

		}

	}

}