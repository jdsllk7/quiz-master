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
		background: linear-gradient(rgba(26,26,26,0.2), rgba(26,26,26,0.2)),  url("images/52.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center; 
		background-attachment: fixed;
	}
</style>	


<body style="width:100%;height:100%;min-height:450px;">
	
	<header class="w3-container w3-card-4 w3-theme w3-top" style="padding:15px; text-align:center;">
		<a href="home.php" class="fa fa-arrow-left" style="text-decoration:none;position:fixed;top:0;left:0;margin:16px;font-size:2em;"></a>
		<h3 style="display:inline;">Results</h3>
	</header>

	<form class="w3-container w3-center" id="myForm" style="margin-top:120px" method="GET" action="db/results_db.php">
		
		<p>  
			<h4 style="color:#ffffff;">Enter SIN</h4>
			<input placeholder="Student Number" class="w3-input" value="" id="stud_id" name="stud_name" min="1" type="number" id="title" required/>
		</p>
		<br>
		<div class="w3-row">
			<button class="w3-btn w3-ripple w3-teal" type="submit" style="width:9em;height:5em;">Check Results</button>
		</div> 
		
	</form>
	
	
	<?php
	
		if(isset($_SESSION["no_results"]) && $_SESSION["no_results"]!=""){
			$_SESSION["no_results"]="";
			echo '<div id="done" class="w3-container w3-red" style="z-index: 2; margin-top:10px;">
					<h4 class="w3-text-shadow">Sorry! No results posted yet.</h4>
					<button style="margin-bottom:20px;" class="w3-btn w3-white w3-medium" onclick="hide()">Okay</button>
				</div>';
		}
		
	?>
	
	

	<footer class="w3-container w3-theme" id="footer_id" style="position:fixed;bottom:0px;height:120px;width:100%;z-index:-1;">
		<div class="w3-blockquote w3-section">
			<p id="quote"></p>
		</div>
	</footer>
	
	
	<script>
	
	
	
		var x = document.getElementById("myForm");
		x.addEventListener("focus", myFocusFunction, true);
		x.addEventListener("blur", myBlurFunction, true);

		function myFocusFunction() {
			document.getElementById("footer_id").style.display = "none";  
		}

		function myBlurFunction() {
			document.getElementById("footer_id").style.display = "inline";  
		}
		
		
		
	
	
	
	
	
		function hide() {
			document.getElementById("done").style.display = "none";
		}
		
		
		
		
		
		var i = 0;
		var txt = 'Hardwork is hard, and also fruitful. -Your conscience'; /* The text */
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
		var txt2 = "Hope for excellence without an ounce effort is null. -Dynamite"; /* The text */
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
		var txt3 = "The reward for sleep is rest nothing more. - Unknown"; /* The text */
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
		var txt4 = "Be aware of what you've got, a greatful mind is a powerful mind. -Nico & Vinz";
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

<html>
