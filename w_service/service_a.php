<?php 

	include('service_class.php');

	error_reporting(E_ALL);
  	ini_set('display_errors', '1');

	$action = $_GET['accion'];
	$serviceClass = new ServiceClass();

	switch ($action) {
		case '1': //iniciar sesion
			$result = $serviceClass->iniciarSesion($_GET['usuario'], $_GET['contrasena']);
			$jresponse["response"][0] = array('result' => $result[0]['PK_USUARIO']);
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
			$result =  $serviceClass->insertarUsuario($usuario, $contrasena, $nombre, $correo, $direccion, $puesto, $telefono, $recordar);
			if($result == 1) {
				$jresponse["response"][0] = array('result' => '');	
			} else {
				$jresponse["response"][0] = array('result' => 'Error al insertar usuario');
			}
			
			echo json_encode($jresponse);
			break;
		case '3': //obtener actividades
			$pkUsuario = $_GET['pkusuario'];
			$result['actividades'] = $serviceClass->obtenerActividades($pkUsuario);
			echo json_encode($result);
			break;
		case '4': //insertar actividad 
			$jActividad = json_decode(file_get_contents('php://input'), true);
			$nombreCliente = $jActividad['nombreCliente'];
			$tituloActividad = $jActividad['tituloActividad'];
			$comentario = $jActividad['comentario']; 
			$latitud = $jActividad['latitud'];
			$longitud = $jActividad['longitud'];
			$nombreFoto = $jActividad['nombreFoto'];
			$foto = $jActividad['foto'];
			$pkUsuario = $jActividad['pkUsuario'];
			$dir = '../img_curso/';
			if(file_exists($dir) || @mkdir($dir)) {
				file_put_contents($dir.$nombreFoto.'.jpeg', base64_decode($foto));
			}
			$result =  $serviceClass->insertarActividad($nombreCliente, $tituloActividad, $comentario, $latitud, $longitud, $nombreFoto, $pkUsuario);
			if($result == 1) {
				$jresponse["response"][0] = array('result' => '');	
			} else {
				$jresponse["response"][0] = array('result' => 'Error al insertar actividad');
			}
			
			echo json_encode($jresponse);
			break;
		default:
			echo 'No existe valor para el parametro';
			break;
	}
?>