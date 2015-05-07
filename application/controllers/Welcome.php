<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		//Do your magic here
		
		$this->load->model('modelowelcome');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function procesarMensaje(){
		$mensajeRecibido = $this->input->post('miValor');
		$resultado = $this->modelowelcome->guardarMensaje($mensajeRecibido);
		if ($resultado) {
			$arregloJSON = array(
			    'code'  => 200,
			    'message' => 'OK',
			    'data' => $resultado,
			);
		} else {
			$arregloJSON = array(
			    'code'  => 599,
			    'message' => 'NOK',
			    'data' => $resultado,
			);
		}
		echo json_encode($arregloJSON);
	}
}
