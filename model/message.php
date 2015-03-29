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
		//sql injection
		//prepare and bind
		$stmt = $this->conn->prepare("INSERT INTO all_messages(name,time, content) VALUE(?,?,?)");
		$stmt -> bind_param("sss",$u,$t,$c);
		$stmt -> execute();
		$stmt->close();
	}

	function loadData(){
		$messages = array();
		$result = mysqli_query($this->conn, "SELECT * FROM all_messages");
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$temp = new Message($row['name'], $row['time'], $row['content']);
			array_push($messages, $temp);
		}
		return $messages;
		mysqli_free_result($result);
	}
}

