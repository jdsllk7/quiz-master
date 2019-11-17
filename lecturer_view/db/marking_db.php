<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		
		$stud_name = $_SESSION["student_id"];
		$quiz_title = $_SESSION["quiz_to_mark"];
		$id = $_SESSION["id"];
		
		for($x=1;$x<$id;$x++){
			$answer += $_GET["number_q".$x.""];
			$total_marks_per_question += $_GET["total_marks_per_question".$x.""];
		}
		
		$sql = "SELECT * FROM marking WHERE id='$stud_name' and quiz_title='$quiz_title'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			
			$sql = "UPDATE marking set marks = '$answer' WHERE  id='$stud_name' and quiz_title='$quiz_title'";
			mysqli_query($conn, $sql);
			
		}else{
			
			$sql = "INSERT INTO marking (id, quiz_title, marks, total_marks) VALUES ('$stud_name', '$quiz_title', '$answer', '$total_marks_per_question')";
			mysqli_query($conn, $sql);
			
		}
		
		
		$_SESSION["marking_complete"] = "marking_complete";
		header("Location: ../student_list.php");
		
	
	}//end if()
	

?>