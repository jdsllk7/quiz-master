<?php
session_start();
include 'db/connect.php';
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/w3-theme-teal.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	
<style>
	html{
		background: linear-gradient(rgba(26,26,26,0.1), rgba(26,26,26,0.1)),  url("images/52.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		background-attachment: fixed;
	}
</style>
	
<body style="width:100%;">

	<header class="w3-container w3-card-4 w3-theme w3-top" style="padding:15px; text-align:center;">
		<a href="home.php" class="fa fa-arrow-left" style="text-decoration:none;position:fixed;top:0;left:0;margin:16px;font-size:2em;"></a>
		<h3 style="display:inline;">Create Quiz</h3>
	</header>

	<form class="w3-container w3-left w3-card-2 w3-white" style="margin:5%; margin-top:80px; padding-bottom:70px;padding-top:30px; width:90%;" method="GET" action="db/validate_create_quiz.php">
		
		<div class="w3-row" >
		
			<p>  
				<h4>Quiz Title</h4>
				<input class="w3-input" value="" name="quiz_title" type="text" id="title" required autofocus>
			</p>
			
			<br>
			
			<p>  
				<h4>Minutes allocated</h4>
				<input class="w3-input" value="" name="minutes" type="number" id="minutes" min="1" required>
			</p>
			
			<br>
			
			<p>     
				<h4>Number of Questions</h4>
				<input class="w3-input" value="" name="number_q" type="number" id="number_q" min="1" max="200" required>
			</p>
			
			<div class="w3-row">
				<button class="w3-btn w3-ripple w3-teal" type="submit" style="width:6em;height:3em;">Create</button>
			</div>
		
		</div> 
		
		<?php
			if(isset($_SESSION["quiz_title_exists"]) && $_SESSION["quiz_title_exists"]!=""){
				$_SESSION["quiz_title_exists"]="";
				echo '<div id="quiz_title_exists" class="w3-container w3-red" style="z-index:5;margin-top:10px;">
						<h3 class="w3-text-shadow">This Quiz Title already exists. Please enter a different name!</h3>
						<button style="margin-bottom:20px;" class="w3-btn w3-white w3-medium" onclick="hide()">Okay</button>
					</div>';
			}//end if()
		?>
		
	</form>
	

</body>


	<script>
		function hide() {
			document.getElementById("quiz_title_exists").style.display = "none";
		}
	</script>

<html>
