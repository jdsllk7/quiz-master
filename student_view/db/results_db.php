<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		
		$_SESSION["stud_name"] = $_GET["stud_name"];
		header("Location: ../results_diplay.php");
	
	}//end if()
	

?>