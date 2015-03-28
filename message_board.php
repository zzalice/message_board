<?php
include_once('model/message.php');
$messageModel = new Message_Model();

session_start();
$user = 'guest';
if(isset($_SESSION['name'])) {
$user = $_SESSION['name'];
}

//print
$messages = $messageModel->loadData();
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!--login/logout href-->
<?php
if($user == 'guest') {
	echo '<a href="login.php">login</a>';
}else
{ 
	echo '<a href="logout.php">logout</a>'; 
}
?><br>

<!--form-->
<form id="newForm" action="creat_message.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Name:</label>
         <?php
		if($user == 'guest') {
			echo '<input type="text" class="form-control" name="name" placeholder="name">';
		}else{ 
			echo $user; 
		}
	?>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content: </label>
    <input type="text" class="form-control" name="content" placeholder="content">
  </div>
  <button  class="btn btn-default" id="submit">Submit</button>
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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/message.js"></script>
