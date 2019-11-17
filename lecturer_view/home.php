<?php
session_start();
include 'db/connect.php';
include '../student_view/db/connect.php';


	$sql = "DELETE FROM quizzes WHERE has_questions=0";
	mysqli_query($conn, $sql);

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
	
	
<body style="width:100%;min-height:450px;height:100%;">

	<header class="w3-container w3-card-4 w3-theme w3-top">
		<h2>Quiz Master</h2>
	</header>

	<div class="w3-container w3-center main_body" style="margin-top:120px">
		
		<div class="w3-row">
			<a href="create_quiz.php"><button class="w3-btn w3-ripple w3-teal" style="width:10em;height:5em;">Create Quiz</button></a>
		</div> 
		
		<hr>
		
		<div class="w3-row">
			<a href="view_quizzes.php"><button class="w3-btn w3-ripple w3-teal" style="width:10em;height:5em;">Distribute Quiz</button></a>
		</div>
		
		<hr>
		
		<div class="w3-row">
			<a href="mark_quizzes.php"><button class="w3-btn w3-ripple w3-teal" style="width:10em;height:5em;">Mark Quizzes</button></a>
		</div>
		
		
		
		<?php
			if(isset($_SESSION["done"]) && $_SESSION["done"]!=""){
				$_SESSION["done"]="";
				echo '<div id="done" class="w3-container w3-green" style="z-index:5; margin-top:10px;">
						<h3 class="w3-text-shadow">Quiz Saved!</h3>
						<button style="margin-bottom:20px;" class="w3-btn w3-white w3-medium" onclick="hide()">Okay</button>
					</div>';
			}elseif(isset($_SESSION["distribute"]) && $_SESSION["distribute"]!=""){
				$_SESSION["distribute"]="";
				echo '<div id="done" class="w3-container w3-green" style="z-index: 3; margin-top:10px;">
						<h4 class="w3-text-shadow">['.$_SESSION["quiz_to_distribute"].'] quiz has been distributed. Please instruct your students to click "Start Quiz" on their applications.</h4>
						<button style="margin-bottom:20px;" class="w3-btn w3-white w3-medium" onclick="hide()">Okay</button>
					</div>';
			}
		?>
		
		
	</div>
	
		
	
	
	<footer class="w3-container w3-theme" style="position:fixed;bottom:0px;width:100%;height:120px;z-index:-1;">
		<div class="w3-blockquote w3-section">
			<p id="quote"></p>
		</div>
	</footer>
	
	
	<script>
		function hide() {
			document.getElementById("done").style.display = "none";
		}
		
		
		
		
		var i = 0;
		var txt = 'You will never walk alone, unless you side with spurs. -Klopp'; /* The text */
		var speed = 50; /* The speed/duration of the effect in milliseconds */

		function typeWriter() {
		  if (i < txt.length) {
			document.getElementById("quote").innerHTML += txt.charAt(i);
			i++;
			setTimeout(typeWriter, speed);
		  }
		}
		setTimeout(typeWriter, 0);
	
		function none(){
			document.getElementById("quote").innerHTML = '';
		}
		setTimeout(none, 9999);
		
		
		
		
		
		
		var ii = 0;
		var txt2 = "Don't focus on the 'A'. Get the concept and you will get the 'A'. -Mr Mulubika"; /* The text */
		var speed2 = 50; /* The speed/duration of the effect in milliseconds */

		function typeWriter2() {
		  if (ii < txt2.length) {
			document.getElementById("quote").innerHTML += txt2.charAt(ii);
			ii++;
			setTimeout(typeWriter2, speed2);
		  }
		}
		setTimeout(typeWriter2, 10000);
		
		function none(){
			document.getElementById("quote").innerHTML = '';
		}
		setTimeout(none, 19999);
		
		
		
		
		
		
		var iii = 0;
		var txt3 = "Need is not weak, need is need. -Will Smith"; /* The text */
		var speed3 = 50; /* The speed/duration of the effect in milliseconds */

		function typeWriter3() {
		  if (iii < txt3.length) {
			document.getElementById("quote").innerHTML += txt3.charAt(iii);
			iii++;
			setTimeout(typeWriter3, speed3);
		  }
		}
		setTimeout(typeWriter3, 20000);
		
		function none3(){
			document.getElementById("quote").innerHTML = '';
		}
		setTimeout(none3, 29999);
		
		
		
		
		
		
		
		var iiii = 0;
		var txt4 = "In Engineering, prove every concept. -Mr Mugala";
		var speed4 = 50; /* The speed/duration of the effect in milliseconds */

		function typeWriter4() {
		  if (iiii < txt4.length) {
			document.getElementById("quote").innerHTML += txt4.charAt(iiii);
			iiii++;
			setTimeout(typeWriter4, speed4);
		  }
		}
		setTimeout(typeWriter4, 30000);
		
		
	
	
	
	
	</script>

</body>

</html>
