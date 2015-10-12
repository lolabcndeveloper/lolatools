<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	
	}
	
		
	function login($username, $password) {
		$this -> db -> select('id, username, password');
		$this -> db -> from('tools_user');
		$this -> db -> where('username', $username);
		//$this -> db -> where('password', MD5($password));
		$this -> db -> where('password', rawurldecode($password));
		$this -> db -> limit(1);
		
		
	
		$query = $this -> db -> get();
		
		echo $this->db->last_query();
	
	
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




	//Project
	function get_project($id) {
		$query = "SELECT * FROM tools_project WHERE id = '".$id."'";
		//$result = $this->db->query($query)->row(0);
		$result = $this->db->query($query)->row_array();
		return $result;
	}

	function get_all_project() {
		$query = "SELECT * FROM tools_project";
		$result = $this->db->query($query)->result();
		return $result;
	}

	function save_project($data) {

		//$query = $this->db->insert_string('tools_project', $data);
		//$result_query = $this->db->query($query);

		$result_query = $this->db->insert('tools_project', $data);

		if ($result_query) {
			$id = $this->db->insert_id();
			$result = array('status' => 'ok', 'data' => $id);
		}
		else {
			$result = array('status' => 'error', 'type' => 'bbdd', 'data' => 'Insert project data');
		}

		return $result;

	}

	function update_project($data) {

		$id = $data['id'];
		$this->db->where('id', $id);
		$result_query = $this->db->update('tools_project', $data);

		if ($result_query) {
			//$id = $this->db->insert_id();
			$result = array('status' => 'ok', 'data' => $id);
		}
		else {
			$result = array('status' => 'error', 'type' => 'bbdd', 'data' => 'Update project data');
		}

		return $result;

	}



	//Rights
	function get_right_countries($id) {
		$query = "SELECT id, countries FROM tools_right WHERE project_id=".$id;
		//$result = $this->db->query($query)->result_array();
		$result = $this->db->query($query)->result();
		return $result;
	}

	function get_right($id) {
		$query = "SELECT * FROM tools_right WHERE id=".$id;
		$result = $this->db->query($query)->row(0);
		/*
		$result_query = $this->db->query($query);
		if ($result_query) {
			$result = array('status' => 'ok', 'data' => $result_query);
		}
		else {
			$result = array('status' => 'error', 'type' => 'bbdd', 'data' => 'Select right');
		}
		*/

		return $result;

	}

	function save_right($data) {

		//$query = $this->db->insert_string('tools_project', $data);
		//$result_query = $this->db->query($query);

		$result_query = $this->db->insert('tools_right', $data);

		if ($result_query) {
			$id = $this->db->insert_id();
			$result = array('status' => 'ok', 'data' => $id);
		}
		else {
			$result = array('status' => 'error', 'type' => 'bbdd', 'data' => 'Save right data');
		}

		return $result;

	}

	function update_right($data) {

		$id = $data['id'];
		$this->db->where('id', $id);
		$result_query = $this->db->update('tools_right', $data);

		if ($result_query) {
			//$id = $this->db->insert_id();
			$result = array('status' => 'ok', 'data' => $id);
		}
		else {
			$result = array('status' => 'error', 'type' => 'bbdd', 'data' => 'Update right data');
		}

		return $result;

	}

	function remove_file_right($id, $file) {
		$this->load->helper('file');

		$query = "SELECT ".$file." FROM tools_right WHERE id=".$id;
		$result = $this->db->query($query)->row(0);

		$file = $result->$file;
		delete_files(UPLOADS_SLUG.'/'.$file);
	}


	//Client
	/*
	function get_client($id) {
		$query = "SELECT * FROM tools_client WHERE id = '".$id."'";
		$result = $this->db->query($query)->row(0);
		return $result;
	}
	*/

	function get_all_client() {
		//$query = "SELECT * FROM tools_client";
		$query = "SELECT client FROM tools_project GROUP BY client";
		$result = $this->db->query($query)->result();
		return $result;
	}
	/*
	function save_client($name) {

		$date = date('Y-m-d H:i:s');
		$data = array('name' => $name, 'created' => $date);
		$query = $this->db->insert_string('tools_client', $data);

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
	*/


	//Media
	/*
	function get_media($id) {
		$query = "SELECT * FROM tools_media WHERE id = '".$id."'";
		$result = $this->db->query($query)->row(0);
		return $result;
	}
	*/

	function get_all_media() {
		//$query = "SELECT * FROM tools_media";
		$query = "SELECT media FROM tools_project GROUP BY media";
		$result = $this->db->query($query)->result();
		return $result;
	}
	/*
	function save_media($name) {

		$date = date('Y-m-d H:i:s');
		$data = array('name' => $name, 'created' => $date);
		$query = $this->db->insert_string('tools_media', $data);

		$result_query = $this->db->query($query);

		if ($result_query) {
			$result = array('result' => 'ok');
		}
		else {
			$result = array('result' => 'error');
		}

		return $result;

	}
	*/
	
}
?>