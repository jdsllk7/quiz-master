<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$quiz_to_distribute = $_SESSION["quiz_to_distribute"] = $_GET["quiz_to_distribute"];
		
			$sql = "UPDATE quizzes SET distribute=0";
			mysqli_query($conn, $sql);
			
			$sql = "UPDATE quizzes SET distribute=1 WHERE quiz_title='$quiz_to_distribute'";
			mysqli_query($conn, $sql);
			
			$_SESSION["distribute"] = "distribute";
			header("Location: ../home.php");
	
		
	}//end if()
	

?>