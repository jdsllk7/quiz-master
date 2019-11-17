<?php
session_start();

	include 'connect.php';	
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$question = $_POST["question"];
		$answer_type = $_POST["answer_type"];
		$option_a = $_POST["option_a"];
		$option_b = $_POST["option_b"];
		$option_c = $_POST["option_c"];
		$option_d = $_POST["option_d"];
		$total_marks = $_POST["total_marks"];
		$quiz_title = $_SESSION["quiz_title"];
		$question_number = $_SESSION["question_number"];
		
		
		
		
		
		
		
	//Image Validation
	$img_exists = 0;
	if(!empty($_FILES["fileToUpload"]["name"])){
		$target_dir = "uploads/";
		$image = $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$img_exists = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				// echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				// echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			// echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			// echo "Sorry, your file is too large.";
			//$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			// echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$uploadOk = 1;
				// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				$uploadOk = 0;
				// echo "Sorry, there was an error uploading your file.";
			}
		}
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		if($_SESSION["question_number"]<=$_SESSION["number_q"] && $img_exists == 1 && $uploadOk == 1 && file_exists($image)==1){
			
			$_SESSION["question_number"]++;
			$sql = "INSERT INTO question_tb (quiz_title, question_number, question, answer_type, option_a, option_b, option_c, option_d, total_marks, image) VALUES ('$quiz_title','$question_number','$question', '$answer_type', '$option_a', '$option_b', '$option_c', '$option_d', '$total_marks', '$image')";
			mysqli_query($conn, $sql);
			header("Location: ../question_setup.php");	
			
		}elseif($_SESSION["question_number"]<=$_SESSION["number_q"] && $img_exists == 0){
			
			$_SESSION["question_number"]++;
			$sql = "INSERT INTO question_tb (quiz_title, question_number, question, answer_type, option_a, option_b, option_c, option_d, total_marks, image) VALUES ('$quiz_title','$question_number','$question', '$answer_type', '$option_a', '$option_b', '$option_c', '$option_d', '$total_marks', '$image')";
			mysqli_query($conn, $sql);
			header("Location: ../question_setup.php");	
			
		}elseif($uploadOk == 0 || file_exists($image)==0){
			$_SESSION["image_error"] = "image_error";
			header("Location: ../question_setup.php");
		}
		
		
	}//end if()
	

?>