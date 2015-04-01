<?php
session_start();//session:storing user information to be used across multiple pages
include_once('model/accout_matching.php');

//user setting
if(isset($_POST['name']) and isset($_POST['password']))
{
	$db = new Message_Model();
	$result = $db->check_login($_POST['name'], $_POST['password']);
	if($result)
	{
		$_SESSION['name']=$_POST['name'];
		header('Location: message_board.php');	
	}else 
	{
		echo 'Login failed!';
	}
}
?>

<html>
<head>
<!--設定網頁編碼為UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<!--log in form-->
<form action="" method="POST">
<h1>Log in</h1>
<lable for="name">Name:</lable><input type="text" name="name"><br>
password:<input type="password" name="password" > <br>
<input type="submit" name="button" >
<a href="assign.php">申請帳號</a>
<a href="message_board.php">訪客</a>
</form>
</body>
</html>

