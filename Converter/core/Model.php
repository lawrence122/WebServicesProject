<?php

class Model {
	public static $connection;

	public function __construct(){
		$host = "localhost";
		// THIS IS FOR TEST. TO BE DELETED LATER
		$DBName = "videoconversion";
		// THIS IS THE ACTUAL DATABASE
		// $DBName = "webservices";
		$username = "root";
		$password = "";

		date_default_timezone_set("America/Montreal");

		//connect to the database
		self::$connection = new \PDO("mysql:host=$host;dbname=$DBName;charset=utf8;", $username, $password);
		//set what happens when ther are errors
		self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
}
?>