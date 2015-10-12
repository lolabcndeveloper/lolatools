<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();

/**
 * Controlador base del que heredaran el resto en admin.
 * 
 * Comprueba el login en el constructor y da una serie de métodos a implementar 
 * con el estilo de Ruby on Rails.
 * 
 */
class MY_Controller extends CI_Controller {

  // La sección activa
  public $data = array("activa" => "home"); 
  
  /**
  * Comprobamos el login en el constructor de la clase, de tal forma que todos lo
  * métodos de la clase pasarán primero por aquí, y así no se podrá acceder a ninguna
  * sección si no se está logueado antes.
  */
  function __construct() {
    parent::__construct();
	
	//date_default_timezone_set('Europe/Madrid');
	
	if(!$this->session->userdata('logged_in')) {
	   	redirect('front/login', 'refresh');
    } 
  }
  
}

