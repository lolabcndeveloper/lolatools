<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('front_model','',TRUE);
 }

 function index()
 {
	 
	 
	 echo $this->input->post('password', FALSE);
	 
	 print_r($_REQUEST);
 	 print_r($_POST);
	 
	 echo $this->input->post('password', array(
			'xss' => false,
			'sanitize' => false
			));
	 
	
	 echo '<br/>';
	 
	 
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE) {
     //Field validation failed.  User redirected to login page
     $this->load->view('front/login_view');
   }
   else {
     //Go to private area
     redirect('front/home', 'refresh');
   }

 }

 function check_database($password)
 {
	print_r($_POST);
	 
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->front_model->login($username, $password);

   if($result) {
     $sess_array = array();
     foreach($result as $row) {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else {
   	 $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>