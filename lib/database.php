<?php
class DB {
	var $database = null;

	function __construct(){
		// database configs
		$dbhost = "localhost";	//127.0.0.1
		$accout = "alice";	//mysql user
		$password = "123";

		// connect
		$this->database = mysql_connect($dbhost, $accout, $password);
		if(!$this->database){
			die('DB connect fail'.mysql_error());
		}

		//select
		$result = mysql_select_db("message_board", $this->database);
		if(!$result){
			die('DB select fail'.mysql_error());
		}
	}
	function __destruct(){
		//disconnect
		mysql_close($this->database);
	}
}
