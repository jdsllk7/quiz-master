<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		
		$_SESSION["student_id"] = $_GET["student_id"];
		header("Location: ../marking.php");
		
	}//end if()
	

?>