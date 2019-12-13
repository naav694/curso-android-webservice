<?php 

	include('service_class.php');

	error_reporting(E_ALL);
  	ini_set('display_errors', '1');

	$action = $_GET['accion'];
	$serviceClass = new ServiceClass();

	switch ($action) {
		case '1': 
			
			break;
		case '2':   
			break;
		case '3': 
			break;
		default:
			echo 'No existe valor para el parametro';
			break;
	}
?>