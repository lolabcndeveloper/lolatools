<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin_model','',TRUE);
	}

  	function index() {
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_login_database');
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login_view');  // La validacion ha fallado, vamos al login de nuevo
		} 
		else {
			
			$session_data = $this->session->userdata('logged_in');
			
			$installation = $this->admin_model->get_config('installation');
			
			if ($installation) {
				redirect('admin/dashboard', 'refresh');
			}
			else {
				redirect('admin/installation', 'refresh');
			}
		} 
  	}
  
  	function login_database($password) {
		// La validación de campos está ok, ahora validamos con la base de datos
		$email = $this->input->post('email');
		
		$result = $this->admin_model->login($email, $password);
		
		if ($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'id' => $row->id,
					'email' => $row->email
				);
			
				$this->session->set_userdata('logged_in', $sess_array);
		  }
		  return TRUE;
		} 
		else {
			$this->form_validation->set_message('login_database', 'El usuario o la contraseña es incorrecto.');
			return false;
		}
  	}
}
?>