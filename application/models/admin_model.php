<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	
	}
	
	function login($email, $password) {
		
		$this->db->select('id, email, password');
		$this->db->from('admins');
		$this->db->where('email = ' . "'" . $email . "'"); 
		$this->db->where('password = ' . "'" . MD5($password) . "'"); 
		$this->db->limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1) {
			return $query->result();
		}
		else {
			return false;
		}

	}
	

	// Configuration methods
	
	public function get_config($param = '') {
		
		//echo 'get_facebook_config';
		
		if ($param == '') {
			//$query = "SELECT * FROM configs WHERE param='facebook_app_id' OR param='facebook_app_secret'";
			$query = "SELECT * FROM configs";
			$result = $this->db->query($query);
			
			$config = array();
			foreach($result->result() as $row) {
				$config[$row->param] = $row->value;
			}
		}
		else {
			$query = "SELECT param, value FROM configs WHERE param='".$param."'";
			$result = $this->db->query($query)->row(0);
			
			$config = $result->value;
		}	
		
		//print_r($config);
		return $config;
	}
	
	
	public function set_config($param, $value) {
		$query = "UPDATE configs SET value='".$value."' WHERE param='".$param."'";
		$result = $this->db->query($query);
	}
	
	
}
?>