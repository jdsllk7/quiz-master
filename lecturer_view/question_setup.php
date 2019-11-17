<?php
session_start();
include 'db/connect.php';	

if($_SESSION["question_number"]>$_SESSION["number_q"]){
	$_SESSION["done"] = "done";
	$sql = "UPDATE quizzes SET has_questions=1";
	mysqli_query($conn, $sql);
	header("Location: home.php");
}

if(!isset($_SESSION["quiz_title"]) || !isset($_SESSION["minutes"]) || !isset($_SESSION["number_q"]) || !isset($_SESSION["question_number"])){
	header("Location: home.php");
}
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/w3-theme-teal.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	
<body style="max-width:100%">
	
	<header class="w3-container w3-card-4 w3-theme w3-top">
		<h2>Creating quiz</h2>
	</header>
	
	

	<form class="w3-container w3-left" style="width: 100%;margin-top:80px" method="POST" action="db/validate_question_setup.php" enctype="multipart/form-data">
		<div style="text-align:center;">
			<h3 style="display:inline;"><?php echo $_SESSION["quiz_title"]?></h3>
			<br>
			<h4 style="display:inline;">Questions: </h4><span style="font-size: 1.1em;" id="number_q"><?php echo $_SESSION["number_q"]?></span>
			<br>
			<h4 style="display:inline;">Time: </h4><span style="font-size: 1.1em;" id="minutes"><?php echo $_SESSION["minutes"]?></span>minutes
		</div>
		<br>
		
		<div class="w3-row w3-teal-d4 (w3-teal-dark)">
			
			
			<div class="w3-card-2 w3-white" style="width: 100%;height: auto;margin: 0px;padding: 20px;padding-top: 10px;">
				<h3>Question <?php echo $_SESSION["question_number"];?>/<?php echo $_SESSION["number_q"];?></h3>
				
				<textarea style="color:#4d4d4d; height: 180px; width: 100%; padding:1%;" maxlength="200" autocomplete="on" placeholder="Type question..." name="question" required autofocus></textarea>
				<br>
				
				<p>Attach image?<br>
					<input type="file" name="fileToUpload" id="fileToUpload" style="border:1px solid #ccc;width:90%;" accept="image/*"/>
				</p>
				
				<br>
				<hr>
				
				<p>
					<input id='for2' class="w3-radio" type="radio" name="answer_type" value="typed_answer" onclick="if(this.checked){hide()}" checked>
					<label for='for2' class="w3-validate">Typed answer</label>
				</p>

				<p>
					<input id='for1' class="w3-radio" type="radio" name="answer_type" value="multiple_choice" onclick="if(this.checked){show()}">
					<label for='for1' class="w3-validate">Multiple choice</label>
				</p>
				
				<div id="multiple_choice_cover" style="display: none;">
					<p>  
						<label>A</label>
						<input placeholder="Type option (a)" class="w3-input" value="" name="option_a" type="text">
					</p>
					<p>  
						<label>B</label>
						<input placeholder="Type option (b)" class="w3-input" value="" name="option_b" type="text">
					</p>
					<p>  
						<label>C</label>
						<input placeholder="Type option (c)" class="w3-input" value="" name="option_c" type="text">
					</p>
					<p>  
						<label>D</label>
						<input placeholder="Type option (d)" class="w3-input" value="" name="option_d" type="text">
					</p>
				</div>
				
				

			</div>
			
				<br>
				<br>
				<input placeholder="Marks per question" style="width:80%; min-width:200px; font-size:0.8em;" class="w3-input" value="" name="total_marks" type="number" min="1" max="100" required/>
				
				<br>
				<div class="w3-row">
					<button class="w3-btn w3-ripple w3-teal" type="submit" style="width:6em;height:3em;"><?php if($_SESSION["question_number"]==$_SESSION["number_q"]){echo 'Done';}else{echo 'Next';} ?></button>
				</div>
			
			
		</div>
		
		</div> 
		
		<br>
	</form>
	
	
	
	
	<?php
		if(isset($_SESSION["image_error"]) && $_SESSION["image_error"]!=""){
			$_SESSION["image_error"]="";
			echo '<div id="done" class="w3-container w3-red" style="z-index:5; margin-top:10px;">
					<h3 class="w3-text-shadow">Image is either corrupt or too large. Try another!</h3>
					<button style="margin-bottom:20px;" class="w3-btn w3-white w3-medium" onclick="hides()">Okay</button>
				</div>';
		}
	?>
	
	
	

	
	<script>
		function hides() {
			document.getElementById("done").style.display = "none";
		}
	
		function show() {
			document.getElementById("multiple_choice_cover").style.display = "block";
		}
		function hide() {
			document.getElementById("multiple_choice_cover").style.display = "none";
		}
	</script>


	

</body>

<html>
