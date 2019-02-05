<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );

use Restserver\libraries\REST_Controller;

class Prueba extends REST_Controller {

	public function __construct(){

		header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
		header("Access-Control-Allow-Origin: *");

		parent::__construct();

		$this->load->database();

	}

	public function index()
	{
		echo "Hola Mundo";
	}

	public function obtener_arreglo_get( $index = 0){

		$arreglo = array( "Manzana", "Pera", "Piña" );

		if( $index > count($arreglo) ){
			$respuesta = array("error" => TRUE, "mensaje" => "No existe elemento");
			$this -> response( $respuesta, HTTP_BAD_REQUEST );
		} else {

			$respuesta = array("error" => FALSE, "fruta" => $arreglo[ $index ] );
			$this -> response( $respuesta );
		}


	}

	public function obtener_producto_get( $codigo ){


			$query = $this->db->query("SELECT * FROM `productos` WHERE codigo = '". $codigo ."'");

			$this->response($query->result());

	}

}
