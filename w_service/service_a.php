<?php 

	include('service_class.php');

	error_reporting(E_ALL);
  	ini_set('display_errors', '1');

	$action = $_GET['accion'];
	$serviceClass = new ServiceClass();

	switch ($action) {
		case '1': //iniciar sesion
			$result = $serviceClass->iniciarSesion($_GET['usuario'], $_GET['contrasena']);
			$jresponse["response"][0] = array('result' => $result[0]['CONTEO']);
			echo json_encode($jresponse);
			break;
		case '2': //insertar usuario
			$jUsuario = json_decode(file_get_contents('php://input'), true);
			$usuario = $jUsuario['usuario'];
			$contrasena = $jUsuario['contrasena'];
			$nombre = $jUsuario['nombre'];
			$correo = $jUsuario['correo'];
			$direccion = $jUsuario['direccion'];
			$puesto = $jUsuario['puesto'];
			$telefono = $jUsuario['telefono'];
			$recordar = $jUsuario['recordar'];
			echo $serviceClass->insertarUsuario($usuario, $contrasena, $nombre, $correo, $direccion, $puesto, $telefono, $recordar);
			break;
		case '3': //obtener actividades
		
			break;
		default:
			echo 'No existe valor para el parametro';
			break;
	}
?>