<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		
		$stud_name = $_SESSION["stud_name"] = $_GET["stud_name"];
		
		$sql = "SELECT * FROM quizzes WHERE distribute=1";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			$quiz_title = "";
			
			while($row = mysqli_fetch_assoc($result)) {
				$quiz_title = $_SESSION["quiz_title"] = $row["quiz_title"];
				$_SESSION["minutes"] = $row["minutes"];
				$_SESSION["number_q"] = $row["number_q"];
			}
			
			
			$sqls = "SELECT * FROM students WHERE id='$stud_name' and quiz_title='$quiz_title'";
			$results = mysqli_query($conn, $sqls);
			if (mysqli_num_rows($results) > 0) {
				$_SESSION["already_submitted"]="already_submitted";
				header("Location: ../home.php");
			}else{
				header("Location: ../start_quiz.php");
			}
			
			
			
		}else{
			$_SESSION["no_quiz"] = "no_quiz";
			header("Location: ../home.php");
		}
			
	}//end if()
	

?>