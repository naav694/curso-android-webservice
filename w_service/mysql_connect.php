<?php
	class MySQLConnect {
		var $mysqli;
		var $host;
		var $user;
		var $pass;
		var $schema;

		public function __construct($host, $user, $schema, $pass = '32xQ7w0Jye') {
			$this->host = $host;
			$this->user = $user;
			$this->pass = $pass;
			$this->schema = $schema;
		}

		public function __destruct() {

		}

		function connect() {
			return new mysqli($this->host, $this->user, $this->pass, $this->schema);
		}

		function query($query) {
			$db = $this->connect();
			$result = $db->query($query);
			while ($row = $result->fetch_assoc()) {
				$results[] = $row;
			}
			return $results;	
		}

		function insert($query) {
			$db = $this->connect();
			$result = $db->query($query);
			return $result;
		}

		function delete($query) {
			$db = $this->connect();
			$result = $db->query($query);
			return $result;
		}		
	}
?>