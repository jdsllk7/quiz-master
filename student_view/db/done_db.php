<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		
		$stud_name = $_SESSION["stud_name"];
		$quiz_title = $_SESSION["quiz_title"];
		$id = $_SESSION["id"];
		
		for($x=1;$x<$id;$x++){
			$answer = $_GET["answer".$x.""];
			$question = $_GET["question".$x.""];
			$marks = $_GET["marks".$x.""];
			$sql = "INSERT INTO students (id, quiz_title, question, answer, total_marks_per_question) VALUES ('$stud_name', '$quiz_title', '$question', '$answer', '$marks')";
			mysqli_query($conn, $sql);
		}
		
		$_SESSION["done"] = "done";
		header("Location: ../home.php");
		
	
	}//end if()
	

?>