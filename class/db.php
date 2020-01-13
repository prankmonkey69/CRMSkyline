<?php 

class Db {

	private $serverName;
	private $username;
	private $password;
	private $dbName;
	private $charset;

	protected function connect() {
		$this->servername = "DESKTOP-EO4M05L";
		$this->username = "admin";
		$this->password = "admin";
		$this->dbName = "crm";

		try {
			$dsn = "sqlsrv:Server=".$this->servername.";Database=".$this->dbName;
			$pdo = new PDO($dsn,$this->username,$this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			echo "Connection Failed: ".$e->getMessage();
		}
	}

}