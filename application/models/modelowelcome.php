<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelowelcome extends CI_Model {
	public function __construct() {
		parent::__construct();
		//Do your magic here
		$this->load->database();
	}

	public function guardarMensaje($mensajeRecibido){
		echo "OK Modelo ".$mensajeRecibido;
		$ci =& get_instance();
		$ci->load->database();
		$sql = "SELECT * FROM usuario";
		$q = $ci->db->query($sql);
		if($q->num_rows() > 0)
		{
		   //Process your query here...
		}
		// $customQuery = "SELECT * FROM usuario";

		// $resultado = $this->db->query($customQuery);
		// if ($resultado) {
		//         echo "Exito!";
		// } else {
		//         echo "Ay pa la otra SQL!";
		// }
	}
}

/* End of file modelowelcome.php */
/* Location: ./application/models/modelowelcome.php */