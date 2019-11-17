<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		
		$_SESSION["quiz_to_mark"] = $_GET["quiz_to_mark"];
		header("Location: ../student_list.php");
		
	}//end if()
	

?>