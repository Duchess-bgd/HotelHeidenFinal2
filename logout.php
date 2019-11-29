<?php
 include_once "baza.php";
 include_once "check_log.php"; 


	session_destroy();
	unset($_SESSION['user']);
	header("location: zivote.php");
	


?>


