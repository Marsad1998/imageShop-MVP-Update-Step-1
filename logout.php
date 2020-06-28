Please Wait...
<?php 
	include_once 'connect/db.php';
	session_destroy();
	redirect("index.php",1500);
?>