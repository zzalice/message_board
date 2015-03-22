<?php
session_start();
session_unset($_SESSION['name']);
header('Location: login.php');
?>
