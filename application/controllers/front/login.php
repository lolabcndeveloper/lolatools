<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller 
{

    function __construct()
    {
        parent::__construct();
		$this->load->library('auth/ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        $this->data['selected_navigation'] = 0;
        $this->data['sidebar'] = FALSE;
		
		//$this->lang->load('ion_auth_lang.php', 'english');
        

        // Set the validation rules
        $this->validation_rules = array(
            array(
                'field' => 'email',
                'label'    => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'password',
                'label'    => 'Password',
                'rules' => 'required'
            )
        );

        // Call validation and set rules
        //$this->load->library('form_validation');
        $this->form_validation->set_rules($this->validation_rules);        
        
    }

    function index()
    {
		
        //$this->data['javascript']= array();
        //$this->data['stylesheet']= array('front/login.css');
        
		$this->data['idBody'] = 'login';
		
        $this->set_region('content', $this->load->view('../templates/default/views/login', $this->data, true));
        //$this->set_region('content', $this->load->view('../views/front/login_view', $this->data, true));
        $this->render();
		
		
		//echo 'caca';
		//$this->load->view('front/login_view', $this->data, true);
		
	
    }
    
    public function in()
    {   
        if ( $this->form_validation->run() )
        {
            $remember = FALSE;
            if ($this->input->post('remember') == 1)
            {
                $remember = TRUE;
            }
            
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
            {
                redirect(FRONT_SLUG.'/home');

            } else {
                $this->session->set_flashdata('state', 'Los datos de acceso no son válidos'); 
                redirect(FRONT_SLUG.'/login');
            }            
        } else {
            $this->session->set_flashdata('state', 'Los datos de acceso no son válidos'); 
            redirect(FRONT_SLUG.'/login');
        }
    }
    
    public function out()    
    {
        $this->ion_auth->logout();  
        redirect(FRONT_SLUG.'/login');        
    }
}

/* End of file */
