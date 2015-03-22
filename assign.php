<?php

include_once('model/account.php');
$messageModel = new member_information();

if(isset($_POST['name']) and isset($_POST['password']) and isset($_POST['email'])) {
	$messageModel->saveData($_POST['name'], $_POST['password'], $_POST['email']);
header('Location: login.php');
}

?>

<form action="" method="POST">
<h1>Assign</h1>
Name:<input type="text" name="name"><br>
password:<input type="password" name="password" > <br>
<!--   confirm password:<input name="repassword" type="password"><br>   -->
email:<input name="email" type="email"><br>
<input type="submit" name="button" >
</form>
