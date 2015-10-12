<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	
	function __construct() {
		parent::__construct();
	}
	
	function get_user_facebook($user_id) {
		
		//echo 'get_user_facebook<br/>';
		
		$query = "SELECT * FROM users WHERE facebook_id = '".$user_id."'";
		
		$user = $this->db->query($query)->row(0);
		
		return $user;
		
	}
	
	function save_user($facebook_id, $name, $surname, $surname2, $email, $postal_code, $phone) {
	
		$date = date('Y-m-d H:i:s');
		$data = array('facebook_id' => $facebook_id, 'name' => $name, 'surname' => $surname, 'surname2' => $surname2, 'email' => $email, 'postal_code' => $postal_code, 'phone' => $phone, 'date' => $date);
		$query = $this->db->insert_string('users', $data); 
		
		$result_query = $this->db->query($query);
		
		
		if ($result_query) {
			$result = array('result' => 'ok');
		}
		else {
			$result = array('result' => 'error');
		}
		
		
		//print_r($result);
		
		return $result;	
	
	}
	
}
?>