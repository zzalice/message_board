<?php
include_once('model/message.php');
session_start();
$user = 'guest';
if(isset($_SESSION['name'])) {
$user = $_SESSION['name'];
}

$messageModel = new Message_Model();

//check save data
if(isset($_POST['content'])) {
	$post_user = 'guest';	
	if($user == 'guest') {
		if(isset($_POST['name']))	{
			$post_user = $_POST['name'];
		}
	} else
	{
		$post_user = $user;
	}
	$date_time=date("Y-m-d h:i:s", time());

	//json
	$newMessage = array(
		"Name" => $post_user,
		"Time" => $date_time,
		"Content" => $_POST['content']);
	echo json_encode($newMessage , JSON_PRETTY_PRINT) ;

	$messageModel->saveData($post_user, $date_time, $_POST['content']);	
}