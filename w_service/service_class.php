<?php 
include('mysql_connect.php');

Class ServiceClass {

	var $connect;

	function __construct() {
		$this->connect = new MySQLConnect("localhost:3306","ticverac","ticverac_android");
	}

	function __destruct() {
		unset($this->connect);
	}

	function iniciarSesion($usuario, $contrasena) {
		$mySQL = "SELECT PK_USUARIO FROM USUARIO 
        WHERE USUARIO = '".$usuario."' AND CONTRASENA = '".$contrasena."'";
		$result = $this->connect->query($mySQL);
		return $result;
	}

	function insertarUsuario($usuario, $contrasena, $nombre, $correo, $direccion, $puesto, $telefono, $recordar) {
		$mySQL = "INSERT INTO USUARIO (USUARIO, CONTRASENA, NOMBRE_USUARIO, CORREO, DIRECCION, PUESTO, TELEFONO, BANDERA_RECORDAR) VALUES ('".$usuario."','".$contrasena."','".$nombre."','".$correo."','".$direccion."','".$puesto."','".$telefono."', ".$recordar.")";
		$result = $this->connect->insert($mySQL);
		return $result;
	}

	function obtenerActividades($pkUsuario) {
		$mySQL = "SELECT * FROM ACTIVIDAD WHERE FK_USUARIO = ".$pkUsuario;
		$result = $this->connect->query($mySQL);
		return $result;
	}

	function insertarActividad($nombreCliente, $tituloActividad, $comentario, $latitud, $longitud, $nombreFoto, $pkUsuario) {
		$mySQL = "INSERT INTO ACTIVIDAD (FK_USUARIO, NOMBRE_CLIENTE, NOMBRE_ACTIVIDAD, COMENTARIO, FOTO, LATITUD, LONGITUD) VALUES (".$pkUsuario.",'".$nombreCliente."','".$tituloActividad."','".$comentario."','".$nombreFoto."',".$latitud.", ".$longitud.")";
		$result = $this->connect->insert($mySQL);
		return $result;
	}
}
?>