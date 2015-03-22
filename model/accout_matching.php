<?php
include_once('lib/database.php');

class Message_Model extends DB {

	function __construct(){
		parent::__construct();
	}

	function check_login($n, $pw){
		$query = "SELECT name FROM members WHERE name='".$n."' and password = '".$pw."'";
		$result = mysql_query($query);
		return mysql_fetch_array($result);
	}

}

