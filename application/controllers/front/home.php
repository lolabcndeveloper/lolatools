<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller 
{

    function __construct() {
        parent::__construct();
        $this->load->library('auth/ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        //$this->data['selected_navigation'] = '';
        //$this->data['sidebar'] = TRUE;

        if (!$this->ion_auth->logged_in()) {
            redirect(FRONT_SLUG.'/login');
            return;
        }




    }

    function index() {

		//$this->load->
        $this->load->model("front_model");
        //$this->load->model("models/media_model");

        //Recuperamos los clientes
        $clients = $this->front_model->get_all_client();

        //Recuperamos los medios
        $medias = $this->front_model->get_all_media();

        //Recuperamos las piezas que van a caducar sus derechos
        //$toexpire_projects = $this->front_model->get_toexpire_projects();

		
        //$this->data['javascript']= array();
        //$this->data['stylesheet']= array('front/portada.css' );
		$this->data['idBody'] = "home";
        $this->data['clients'] = $clients;
        $this->data['medias'] = $medias;
        
        $this->set_region('content', $this->load->view('../templates/default/views/home', $this->data, true));           
        $this->render();

		
    }
}

/* End of file */
