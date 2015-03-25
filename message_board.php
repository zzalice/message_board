<?php
//Declare
session_start();
include_once('model/message.php');

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
		"Name:" => $post_user,
		"Time:" => $date_time,
		"Content:" => $_POST['content']);

	$messageModel->saveData($post_user, $date_time, $_POST['content']);	
}

//print
$messages = $messageModel->loadData();
?>

<?php
//login/logout href
if($user == 'guest') {
	echo '<a href="login.php">login</a>';
}else
{ 
	echo '<a href="logout.php">logout</a>'; 
}
?><br>


<form action="" method="POST"><!--action空白，會使function回傳到原檔案-->
<!--user and content form.-->
Name:<br>
<?php
if($user == 'guest') {
	echo '<input type="text" name="name">';
}else
{ 
	echo $user; 
}
?><br>
Content: <br>
<input type="text" name="content"><br>
<input type="submit" value="submit" id="submit"><br>
</form>

<!--print the messages-->
<div id="messages">
<?php foreach($messages as $m){ ?>
	<div class="message">
		<h3>Name:<?= $m->name ?></h3>
		<h3>Time:<?= $m->time ?></h3>
		<h5>Content:<?= $m->content ?></h5>
		<hr>
	</div>
<?php } ?>
</div>

<script src="lib/jquery-2.1.3.min.js"></script>  <!--this file is jquery's  main program-->
<script src="js/message.js"></script>
