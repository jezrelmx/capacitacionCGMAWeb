<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelowelcome extends CI_Model {
	public function __construct() {
		parent::__construct();
		//Do your magic here
	}

	public function guardarMensaje($mensajeRecibido){
		$customQuery = "SELECT * FROM usuario";
		// $resultado = $this->db->query($customQuery);
		$resultado = 1;
		if ($resultado) {
			return $mensajeRecibido;
		} else {
			return false;
		}
	}
}

/* End of file modelowelcome.php */
/* Location: ./application/models/modelowelcome.php */