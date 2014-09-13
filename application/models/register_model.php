<?php
class Register_model extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->db_notif = $this->load->database("noti" , TRUE);
    }
    
	
	
					///////////// auto-complete/ drop-down listings /////////


	function getCities(){
		
		$this->db->select('name');
		$query = $this->db->get('cities');

		$city;
		foreach($query->result() as $row ){
			
			$city[] = $row->name;
			
			} 

		return $city;
		
		}	

	function getSpecialities(){
		
		$this->db->select('name');
		$query = $this->db->get('specialities');

		$city;
		foreach($query->result() as $row ){
			
			$speciality[] = $row->name;
			
			} 

		return $speciality;
		
		}	




						//////////////////////////////






	
    function send_auth_code()
    {
    	$this->load->library('email');
        $this->email->from('admin@medicare.com', 'Registration');
        $this->email->to($_POST['email']); 
        $this->email->subject('User Verification');
        $this->email->message('Your Auth Code is 5678');	   
        $this->email->send();
        echo $this->email->print_debugger();
    }
	
	
	function patient_start_reg()

    {
		
		$docChannelID = 5 ;
		$hasher = new PasswordHash(8, FALSE);
		
		$data['email']   = $_POST['email']; 
        $data['password'] = $_POST['pass'];
        $data['mobile'] = $_POST['mobile'];
	 	$data['fname'] = $_POST['fname'];
		$data['lname'] = $_POST['lname'];
		$time = time() ;
		$dataf['username'] = $data['fname']." ".$data['lname'] ;
		$dataf['email'] = $data['email'] ;
		$dataf['confirmedEmail'] = 1 ;
		$dataf['password'] = $hasher->HashPassword($data['password']) ;
		$dataf['joinTime'] = $time ;
		$this->db_notif->insert('et_member', $dataf);
        $this->db->insert('patient_login', $data);
		$query = $this->db->get_where('patient_login', array('email' => $_POST['email']));
		$query = $query->row_array();
		$patientId = $query['patient_id'] ;
		$query = $this->db_notif->get_where('et_member', array('email' => $_POST['email']));
		$query = $query->row_array();
		$eso_pat_id = $query['memberId'] ;
		$dataf1['title'] = $data['fname']." ".$data['lname'] ;
		$dataf1['channelId'] = $docChannelID ;
		$dataf1['startTime'] = $time ;
		$dataf1['startMemberId'] = $eso_pat_id ;
		$dataf1['lastPostTime'] = $time ;
		$dataf1['lastPostMemberId'] = $eso_pat_id ;
		$dataf1['countPosts'] = 1  ;
		$this->db_notif->insert('et_conversation', $dataf1);
        $query = $this->db_notif->get_where('et_conversation', $dataf1 );
		$query = $query->row_array();
		$converId = $query['conversationId'] ;
		$dataf2['conversationId'] = $converId ;
		$dataf2['memberId'] = $eso_pat_id ;
		$dataf2['content'] = "Welcome to medicare " ;
		$dataf2['time'] = $time ;
		$this->db_notif->insert('et_post', $dataf2);
		
		//$this->db->insert('conversation', array('uid' => $patientId , 
		//										'convid' => $converId ));
		
		//die($dataf['password']);
		
		$ret['password'] = $data['password'] ;
		$ret['uid'] = $patientId;
		
		return $ret;
		
    }
	
	
	function patient_profile_reg($pat_id)
    {
		
		$data['patient_id'] = $pat_id ;
        $data['martial_status']   = $_POST['martial_status']; 
        $data['age'] = $_POST['age'];
		$data['chronic_illness'] = $_POST['chronic_illness'];
		$data['blood_type'] = $_POST['blood_type'];
		if(isset($data['special_condition']))
        $data['special_condition'] = $_POST['special_condition'];
		else
		$data['special_condition'] = "None";
	 	
		if(isset($data['other_condition']))
        $data['other_condition'] = $_POST['other_condition'];
		else
		$data['other_condition'] = "None";
		if(isset($data['other_condition1']))
        $data['other_condition1'] = $_POST['other_condition1'];
		else
		$data['other_condition1'] = "None";
		
        $this->db->insert('patient_profile', $data);
		
		
    }

    function insert_start_reg()
    {
		$docChannelID = 10 ;
		$hasher = new PasswordHash(8, FALSE);
      
	    $data['email']   = $_POST['email']; 
        $data['password'] = $_POST['pass'];
        $data['mobile'] = $_POST['mobile'];
	 	$data['fname'] = $_POST['fname'];
		$data['lname'] = $_POST['lname'];
		
	 	//die($data['password']);
		
		$time = time() ;
		$dataf['username'] = $data['fname']." ".$data['lname'] ;
		$dataf['email'] = $data['email'] ;
		$dataf['confirmedEmail'] = 1 ;
		$dataf['password'] = $hasher->HashPassword($data['password']) ;
		$dataf['joinTime'] = $time ;
		$this->db_notif->insert('et_member', $dataf);
        $this->db->insert('doctors_login', $data);
		$query = $this->db->get_where('doctors_login', array('email' => $_POST['email']));
		$query = $query->row_array();
		$doctorId = $query['doctor_id'] ;
		$query = $this->db_notif->get_where('et_member', array('email' => $_POST['email']));
		$query = $query->row_array();
		$eso_doc_id = $query['memberId'];
		$dataf1['title'] = $data['fname']." ".$data['lname'] ;
		$dataf1['channelId'] = $docChannelID ;
		$dataf1['startTime'] = $time;
		$dataf1['startMemberId'] = $eso_doc_id ;
		$dataf1['lastPostTime'] = $time ;
		$dataf1['lastPostMemberId'] = $eso_doc_id ;
		$dataf1['countPosts'] = 1 ;
		$this->db_notif->insert('et_conversation', $dataf1);
        $query = $this->db_notif->get_where('et_conversation', $dataf1 );
		$query = $query->row_array();
		$converId = $query['conversationId'] ;
		$dataf2['conversationId'] = $converId ;
		$dataf2['memberId'] = $eso_doc_id ;
		$dataf2['content'] = "Welcome to medicare " ;
		$dataf2['time'] = $time ;
		$this->db_notif->insert('et_post', $dataf2);
		$this->db->insert('conversation', array('uid' => $doctorId , 
												'convid' => $converId ));
	
	
	
		$this->session->set_userdata('name',$data['fname'].' '.$data['lname']);
			
		
		$ret['password'] = $data['password'] ;
		$ret['uid'] = $doctorId;
		
		return $ret;
    }
    
    function insert_profile_reg($doc_id)
    {
		$data['doctor_id'] = $doc_id ;
    	$data['doctor_year'] = $_POST['doctor_year']; 
        $data['doctor_grad_year'] = $_POST['doctor_grad_year'];
		$data['doctor_grad_degree'] = $_POST['doctor_grad_degree']; 
        $data['doctor_grad_college'] = $_POST['doctor_grad_college'];
		$data['doctor_postgrad_year'] = $_POST['doctor_postgrad_year'];
		$data['doctor_postgrad_degree'] = $_POST['doctor_postgrad_degree']; 
        $data['doctor_postgrad_college'] = $_POST['doctor_postgrad_college'];
        $data['doctor_supergrad_year'] = $_POST['doctor_supergrad_year'];
		$data['doctor_supergrad_degree'] = $_POST['doctor_supergrad_degree']; 
        $data['doctor_supergrad_college'] = $_POST['doctor_supergrad_college'];
		$this->db->insert('doctors_profile', $data);
    }

    function insert_complete_reg($doc_id)
    {
		$data['doctor_id'] = $doc_id ;
    	$data['fee'] = $_POST['doc_fee']; 
        $data['city'] = $_POST['doc_city'];
		$data['state'] = $_POST['doc_state']; 
        $data['address'] = $_POST['doc_add'];
		$data['landmark'] = $_POST['doc_land'];
		$data['latitude'] = $_POST['latitude']; 
		$data['longitude'] = $_POST['longitude']; 
        $data['appointment_duration'] = $_POST['doc_duration'];
        $data['speciality'] = $_POST['doc_speciality'];
		$data['subspeciality'] = "" ;// $_POST['doc_subspeciality'];
		$this->db->insert('doctors', $data);
    }

function insert_doctor_schedule($doc_id){
	
		$data['doctor_id'] = $doc_id ;
    	$data['session_1_start'] = $_POST['session_1_start']; 
        $data['session_2_start'] = $_POST['session_2_start'];
		$data['session_3_start'] = $_POST['session_3_start']; 
        $data['session_1_end'] = $_POST['session_1_end'];
		$data['session_2_end'] = $_POST['session_2_end'];
		$data['session_3_end'] = $_POST['session_3_end']; 
        $data['no_of_sessions'] = $_POST['no_of_sessions'];
		
		$this->db->insert('doctor_schedule', $data);
		
		
	}	

}

#
# Portable PHP password hashing framework.
#
# Version 0.3 / genuine.
#
# Written by Solar Designer <solar at openwall.com> in 2004-2006 and placed in
# the public domain.  Revised in subsequent years, still public domain.
#
# There's absolutely no warranty.
#
# The homepage URL for this framework is:
#
#	http://www.openwall.com/phpass/
#
# Please be sure to update the Version line if you edit this file in any way.
# It is suggested that you leave the main version number intact, but indicate
# your project name (after the slash) and add your own revision information.
#
# Please do not change the "private" password hashing method implemented in
# here, thereby making your hashes incompatible.  However, if you must, please
# change the hash type identifier (the "$P$") to something different.
#
# Obviously, since this code is in the public domain, the above are not
# requirements (there can be none), but merely suggestions.
#
class PasswordHash {
	var $itoa64;
	var $iteration_count_log2;
	var $portable_hashes;
	var $random_state;

	function PasswordHash($iteration_count_log2 = 8, $portable_hashes )
	{
		$this->itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

		if ($iteration_count_log2 < 4 || $iteration_count_log2 > 31)
			$iteration_count_log2 = 8;
		$this->iteration_count_log2 = $iteration_count_log2;

		$this->portable_hashes = $portable_hashes;

		$this->random_state = microtime();
		if (function_exists('getmypid'))
			$this->random_state .= getmypid();
	}

	function get_random_bytes($count)
	{
		$output = '';
		if (is_readable('/dev/urandom') &&
		    ($fh = @fopen('/dev/urandom', 'rb'))) {
			$output = fread($fh, $count);
			fclose($fh);
		}

		if (strlen($output) < $count) {
			$output = '';
			for ($i = 0; $i < $count; $i += 16) {
				$this->random_state =
				    md5(microtime() . $this->random_state);
				$output .=
				    pack('H*', md5($this->random_state));
			}
			$output = substr($output, 0, $count);
		}

		return $output;
	}

	function encode64($input, $count)
	{
		$output = '';
		$i = 0;
		do {
			$value = ord($input[$i++]);
			$output .= $this->itoa64[$value & 0x3f];
			if ($i < $count)
				$value |= ord($input[$i]) << 8;
			$output .= $this->itoa64[($value >> 6) & 0x3f];
			if ($i++ >= $count)
				break;
			if ($i < $count)
				$value |= ord($input[$i]) << 16;
			$output .= $this->itoa64[($value >> 12) & 0x3f];
			if ($i++ >= $count)
				break;
			$output .= $this->itoa64[($value >> 18) & 0x3f];
		} while ($i < $count);

		return $output;
	}

	function gensalt_private($input)
	{
		$output = '$P$';
		$output .= $this->itoa64[min($this->iteration_count_log2 +
			((PHP_VERSION >= '5') ? 5 : 3), 30)];
		$output .= $this->encode64($input, 6);

		return $output;
	}

	function crypt_private($password, $setting)
	{
		$output = '*0';
		if (substr($setting, 0, 2) == $output)
			$output = '*1';

		$id = substr($setting, 0, 3);
		# We use "$P$", phpBB3 uses "$H$" for the same thing
		if ($id != '$P$' && $id != '$H$')
			return $output;

		$count_log2 = strpos($this->itoa64, $setting[3]);
		if ($count_log2 < 7 || $count_log2 > 30)
			return $output;

		$count = 1 << $count_log2;

		$salt = substr($setting, 4, 8);
		if (strlen($salt) != 8)
			return $output;

		# We're kind of forced to use MD5 here since it's the only
		# cryptographic primitive available in all versions of PHP
		# currently in use.  To implement our own low-level crypto
		# in PHP would result in much worse performance and
		# consequently in lower iteration counts and hashes that are
		# quicker to crack (by non-PHP code).
		if (PHP_VERSION >= '5') {
			$hash = md5($salt . $password, TRUE);
			do {
				$hash = md5($hash . $password, TRUE);
			} while (--$count);
		} else {
			$hash = pack('H*', md5($salt . $password));
			do {
				$hash = pack('H*', md5($hash . $password));
			} while (--$count);
		}

		$output = substr($setting, 0, 12);
		$output .= $this->encode64($hash, 16);

		return $output;
	}

	function gensalt_extended($input)
	{
		$count_log2 = min($this->iteration_count_log2 + 8, 24);
		# This should be odd to not reveal weak DES keys, and the
		# maximum valid value is (2**24 - 1) which is odd anyway.
		$count = (1 << $count_log2) - 1;

		$output = '_';
		$output .= $this->itoa64[$count & 0x3f];
		$output .= $this->itoa64[($count >> 6) & 0x3f];
		$output .= $this->itoa64[($count >> 12) & 0x3f];
		$output .= $this->itoa64[($count >> 18) & 0x3f];

		$output .= $this->encode64($input, 3);

		return $output;
	}

	function gensalt_blowfish($input)
	{
		# This one needs to use a different order of characters and a
		# different encoding scheme from the one in encode64() above.
		# We care because the last character in our encoded string will
		# only represent 2 bits.  While two known implementations of
		# bcrypt will happily accept and correct a salt string which
		# has the 4 unused bits set to non-zero, we do not want to take
		# chances and we also do not want to waste an additional byte
		# of entropy.
		$itoa64 = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

		$output = '$2a$';
		$output .= chr(ord('0') + $this->iteration_count_log2 / 10);
		$output .= chr(ord('0') + $this->iteration_count_log2 % 10);
		$output .= '$';

		$i = 0;
		do {
			$c1 = ord($input[$i++]);
			$output .= $itoa64[$c1 >> 2];
			$c1 = ($c1 & 0x03) << 4;
			if ($i >= 16) {
				$output .= $itoa64[$c1];
				break;
			}

			$c2 = ord($input[$i++]);
			$c1 |= $c2 >> 4;
			$output .= $itoa64[$c1];
			$c1 = ($c2 & 0x0f) << 2;

			$c2 = ord($input[$i++]);
			$c1 |= $c2 >> 6;
			$output .= $itoa64[$c1];
			$output .= $itoa64[$c2 & 0x3f];
		} while (1);

		return $output;
	}

	function HashPassword($password)
	{
		$random = '';

		if (CRYPT_BLOWFISH == 1 && !$this->portable_hashes) {
			$random = $this->get_random_bytes(16);
			$hash =
			    crypt($password, $this->gensalt_blowfish($random));
			if (strlen($hash) == 60)
				return $hash;
		}

		if (CRYPT_EXT_DES == 1 && !$this->portable_hashes) {
			if (strlen($random) < 3)
				$random = $this->get_random_bytes(3);
			$hash =
			    crypt($password, $this->gensalt_extended($random));
			if (strlen($hash) == 20)
				return $hash;
		}

		if (strlen($random) < 6)
			$random = $this->get_random_bytes(6);
		$hash =
		    $this->crypt_private($password,
		    $this->gensalt_private($random));
		if (strlen($hash) == 34)
			return $hash;

		# Returning '*' on error is safe here, but would _not_ be safe
		# in a crypt(3)-like function used _both_ for generating new
		# hashes and for validating passwords against existing hashes.
		return '*';
	}

	function CheckPassword($password, $stored_hash)
	{
		$hash = $this->crypt_private($password, $stored_hash);
		if ($hash[0] == '*')
			$hash = crypt($password, $stored_hash);

		return $hash == $stored_hash;
	}
}