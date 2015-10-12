<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controlador de Dashboard, la portada del administrador. 
* 
* Puede ser útil para mostrar notificaciones, estadísticas 
* y accesos directos a ciertas secciones.
*
*/
class Home extends MY_Controller {

  	// La sección activa es recetas
  	public $data = array("activa" => "home"); 

  	function __construct() {
    	parent::__construct();
  	}

  	/**
  	* Página de dashboard, si se quieren pasar datos a la vista habría que 
  	* hacerlo aquí al cargarlas.
  	*/
  	function index() {

		$this->load->view('front/common/header', $this->data);
		$this->load->view('front/common/menu');
		$this->load->view('front/dashboard_view');
		$this->load->view('front/common/footer');
  	}
}

?>