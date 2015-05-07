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
	/**
	 * curl -b cookies.txt -c cookies.txt -F "miValor=datosEnviados" http://localhost/servidores/index.php/Welcome/procesarMensaje;
	 * 
	 */
	public function procesarMensaje(){
		$mensajeRecibido = $this->input->post('miValor');
		$resultado = $this->modelowelcome->guardarMensaje($mensajeRecibido);
		if ($resultado) {
			if ("ME HABLARON DESDE OTRO SERVIDOR") {
				$arregloJSON = array(
				    'code'  => 200,
				    'message' => 'OK',
				    'data' => $resultado,
				);
			} else {
				$post_array = array('miValor' => $mensajeRecibido);
        	
		        /*** INIT CURL *******************************************/
		        $curlObj    = curl_init();
		        $c_opt      = array(CURLOPT_URL => 'http://<IP1>/servidores/index.php/Welcome/procesarMensaje',
		                            CURLOPT_RETURNTRANSFER => true, 
		                            CURLOPT_POST => 1,
		                            CURLOPT_POSTFIELDS  =>  "miValor=".$mensajeRecibido,
		                            CURLOPT_FOLLOWLOCATION  =>  1,
		                            CURLOPT_TIMEOUT => 60);
		 		
		        // SERVIDOR 1
		        curl_setopt_array($curlObj, $c_opt);
		        $resultaServidor1 = curl_exec($curlObj);
		        
		        // SERVIDOR 2
		        $c_opt['CURLOPT_URL']  = 'http://<IP2>/servidores/index.php/Welcome/procesarMensaje';
		 		curl_setopt_array($curlObj, $c_opt);
		 		$resultaServidor2 = curl_exec($curlObj);

		 		// SERVIDOR 3
		        $c_opt['CURLOPT_URL']  = 'http://<IP3>/servidores/index.php/Welcome/procesarMensaje';
		 		curl_setopt_array($curlObj, $c_opt);
		 		$resultaServidor3 = curl_exec($curlObj);

		 		// SERVIDOR 4
		        $c_opt['CURLOPT_URL']  = 'http://<IP4>/servidores/index.php/Welcome/procesarMensaje';
		 		curl_setopt_array($curlObj, $c_opt);
		 		$resultaServidor4 = curl_exec($curlObj);

		        /*** THE END ********************************************/
		        curl_close($curlObj);

		        if ($resultaServidor1 == 200 & $resultaServidor2 == 200 & $resultaServidor3 == 200 & $resultaServidor4 == 200) {
		        	$arregloJSON = array(
				    'code'  => 200,
				    'message' => 'OK',
				    'data' => $resultado,
				);
		        } else {
		        	$arregloJSON = array(
				    'code'  => 598,
				    'message' => 'FALLO UN SERVIDOR',
				    'data' => $resultado,
				);
		        }
		        


				
			}
			
		} else {
			$arregloJSON = array(
			    'code'  => 599,
			    'message' => 'NOK',
			    'data' => $resultado,
			);
		}
		if ("ME HABLARON DESDE OTRO SERVIDOR") {
			return json_encode($arregloJSON);
		} else {
			echo json_encode($arregloJSON);
		}
		
		
	}
}
