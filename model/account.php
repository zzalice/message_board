<?php
include_once('lib/database.php');

class member_information extends DB {

	function __construct(){
		parent::__construct();
	}

	function saveData($n, $pw, $e){
		$query = "INSERT INTO `members`(`name`, `password`, `email`) VALUE('".$n."', '".$pw."', '".$e."');";
		mysql_query($query);
	}

}

?>
