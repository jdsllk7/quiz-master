<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/w3-theme-teal.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	
<body style="max-width:100%">

	<header class="w3-container w3-card-4 w3-theme w3-top" style="text-align:center;">
		<a href="home.php" class="w3-opennav fa fa-home" style="position:fixed;top:0;left:0;margin:10px;font-size:2em;"></a>
		<h1 style="display:inline;">Creating quiz</h1>
	</header>
	
	

	<form class="w3-container w3-left" style="width: 100%;margin-top:80px" method="GET" action="validate_create_quiz.php">
		<div style="text-align:center;">
			<h3 style="display:inline;"><?php echo $_SESSION["quiz_title"]?></h3>
			<br>
			<h4 style="display:inline;">Questions: </h4><span style="font-size: 1.1em;" id="number_q"><?php echo $_SESSION["number_q"]?></span>
			<br>
			<h4 style="display:inline;">Time: </h4><span style="font-size: 1.1em;" id="minutes"><?php echo $_SESSION["minutes"]?></span>minutes
		</div>
		<br>
		<hr>
		
		<div class="w3-row w3-teal-d4 (w3-teal-dark)">
			
			<h3>Question 1</h3>
			<div class="w3-card-2 w3-white" style="width: 100%;height: auto;margin: 0px;padding: 20px;">
				<textarea style="color:#4d4d4d; height: 180px; width: 100%;" maxlength="200" autocomplete="on" placeholder="Type question..." name="question" required></textarea>
				<p>
					<input id='for3' class="w3-radio" type="radio" name="gender" value="typed_answer" onclick="if(this.checked){hide()}" checked>
					<label for='for3' class="w3-validate">Typed answer</label>
				</p>

				<p>
					<input id='for4' class="w3-radio" type="radio" name="gender" value="multiple_choice" onclick="if(this.checked){show()}">
					<label for='for4' class="w3-validate">Multiple choice</label>
				</p>
				<hr>
				
				<div id="multiple_choice_cover" style="display: none;">
					<p>  
						<label>A</label>
						<input placeholder="Type option (a)" class="w3-input" value="" name="option_a" type="text" required>
					</p>
					<p>  
						<label>B</label>
						<input placeholder="Type option (b)" class="w3-input" value="" name="option_b" type="text" required>
					</p>
					<p>  
						<label>C</label>
						<input placeholder="Type option (c)" class="w3-input" value="" name="option_c" type="text" required>
					</p>
					<p>  
						<label>D</label>
						<input placeholder="Type option (d)" class="w3-input" value="" name="option_d" type="text" required>
					</p>
				</div>
				
				<br>
				<div class="w3-row">
					<button class="w3-btn w3-ripple w3-teal" type="submit" style="width:6em;height:3em;">Next</button>
				</div>

			</div>
			
			
		</div>
		
		</div> 
		
		<br>
	</form>
	
	
	

	
	<script>
		function show() {
			document.getElementById("multiple_choice_cover").style.display = "block";
		}
		function hide() {
			document.getElementById("multiple_choice_cover").style.display = "none";
		}
	</script>


	

</body>

<html>
