<?php
class DB {
	var $database = null;
	var $conn;
	function __construct(){
		// database configs
		$dbhost = "localhost";	//127.0.0.1
		$accout = "alice";	//mysql user
		$password = "123";
		$dbname = "message_board";

		// Create connection
		$this->conn = new mysqli($dbhost, $accout, $password, $dbname);

		// Check connection
		if ($this->conn->connect_error) {
		    die("Connection failed: " . $this->conn->connect_error);
		}
	}
	
	function __destruct(){
		//disconnect
		$this->conn -> close();
	}
}
