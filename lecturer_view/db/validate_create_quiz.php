<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$quiz_title = $_SESSION["quiz_title"] = $_GET["quiz_title"];
		$minutes = $_SESSION["minutes"] = $_GET["minutes"];
		$number_q = $_SESSION["number_q"] = $_GET["number_q"];
		$_SESSION["question_number"] = 1;
		
		
		$data = mysqli_query($conn, "SELECT * from quizzes WHERE quiz_title='$quiz_title'");
		if(mysqli_num_rows($data)!=0){
			$_SESSION["quiz_title_exists"] = "quiz_title_exists";
			header("Location: ../create_quiz.php");
		}else{
			$sql = "INSERT INTO quizzes (quiz_title, minutes, number_q) VALUES ('$quiz_title', '$minutes', '$number_q')";
			mysqli_query($conn, $sql);
			header("Location: ../question_setup.php");
		}
		
		
		
	}//end if()
	

?>