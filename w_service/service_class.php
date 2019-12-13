<?php 
include('../classes/mysql_connect.php');

Class ServiceClass {

	var $connect;

	function __construct() {
		$this->connect = new MySQLConnect("localhost:3306","ticverac","ticverac_android");
	}

	function __destruct() {
		unset($this->connect);
	}

	

}
?>