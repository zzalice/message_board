<?php
include_once('lib/database.php');
class Message {
	var $name;
	var $time;
	var $content;

	function __construct($n, $t, $c){
		$this->name = $n;
		$this->time = $t;
		$this->content = $c;
	}
}

class Message_Model extends DB {

	function __construct(){
		parent::__construct();
	}

	function saveData($u, $t, $c){
		$query = "INSERT INTO `all_messages`(`name`, `time`, `content`) VALUE('".$u."', '".$t."', '".$c."');";
		mysql_query($query);
	}

	function loadData(){
		$messages = array();
		$result = mysql_query("SELECT * FROM `all_messages`;");
		
		while($row = mysql_fetch_array($result)) {
			$temp = new Message($row['name'], $row['time'], $row['content']);
			array_push($messages, $temp);
		}
		return $messages;
		
	}
}

