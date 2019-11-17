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
	
<body style="width:100%">

	<header class="w3-container w3-card-4 w3-theme w3-top" style="z-index:2;">
		<h2><?php echo $_SESSION["quiz_title"];?></h2>
	</header>

	<form id="frm1" class="w3-container w3-center" style="margin-top:130px;" method="GET" action="db/done_db.php">
		
		<div class="w3-row" style="position:fixed; top:75px;left:30%;">
			<h3 style=" background:#ffffff;z-index:2;" id="time_cover">Timer: <span id="time"></span></h3>
			<h3 style=" background:#ffffff;z-index:2;display:none;width:100%;" id="time_up"><span>Time up!<br>Please submit<br>your work.</span></h3>
		</div> 
		
		<audio id="myAudio">
		  <source src="audio/tone.mp3" type="audio/mpeg">
		</audio>
		
		
		<?php
		
			$quiz_title = $_SESSION["quiz_title"];
			
			$sql = "SELECT * FROM question_tb WHERE quiz_title='$quiz_title'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				
				$id=1;
				
				// output data from database
				while($row = mysqli_fetch_assoc($result)) {
				
					if($row["question_number"]=='typed_answer' || (empty($row["option_a"]) && empty($row["option_b"]) && empty($row["option_c"]) && empty($row["option_d"]))){
						echo'<div class="w3-row w3-left" style="width:100%;text-align:left;margin-bottom:80px;">';
							echo'<input style="border:none;background:none; font-weight:bold; width:95%;display:inline;" value="'.$row["question_number"].'. '.$row["question"].'" name="question'.$id.'" type="text" readonly>...';
							echo'<br>Marks:<input style="border:none;background:none;width:8%;display:inline;" value="'.$row["total_marks"].'" name="marks'.$id.'" type="text" readonly>';
							if(!empty($row['image'])){
								echo'<div style="border:1px solid #ccc; height:300px;max-width:350px;width:100%;"><img style="height:100%;width:100%;" src="../lecturer_view/db/'.$row["image"].'"></div>';
							}
							echo'<textarea style="color:#4d4d4d; height: 150px; width: 100%; padding:1%;display:block;" maxlength="500" autocomplete="on" placeholder="Type answer here..." name="answer'.$id.'"></textarea>';
						echo'</div>';
					}else{
						echo'<div class="w3-row w3-left" style="width:100%;text-align:left;margin-bottom:80px;display:block;">';
							echo'<input style="border:none;background:none; font-weight:bold; width:90%;display:inline;" value="'.$row["question_number"].'. '.$row["question"].'" name="question'.$id.'" type="text" readonly> ...';
							echo'<br>Marks:<input style="border:none;background:none;width:5%;display:inline;" value="'.$row["total_marks"].'" name="marks'.$id.'" type="text" readonly>';
							if(!empty($row['image'])){
								echo'<div style="border:1px solid #ccc; height:300px;max-width:350px;width:100%;"><img style="height:100%;width:100%;" src="../lecturer_view/db/'.$row["image"].'"></div>';
							}
							echo'<p><input id="for5'.$id.'" class="w3-radio radio" type="radio" name="answer'.$id.'" value="'.$row["option_a"].'">';
							echo'<label for="for5'.$id.'" class="w3-validate"> '.$row["option_a"].'</label></p>';
							
							echo'<p><input id="for6'.$id.'" class="w3-radio radio" type="radio" name="answer'.$id.'" value="'.$row["option_b"].'">';
							echo'<label for="for6'.$id.'" class="w3-validate"> '.$row["option_b"].'</label></p>';
							
							echo'<p><input id="for7'.$id.'" class="w3-radio radio" type="radio" name="answer'.$id.'" value="'.$row["option_c"].'">';
							echo'<label for="for7'.$id.'" class="w3-validate"> '.$row["option_c"].'</label></p>';
							
							echo'<p><input id="for8'.$id.'" class="w3-radio radio" type="radio" name="answer'.$id.'" value="'.$row["option_d"].'">';
							echo'<label for="for8'.$id.'" class="w3-validate"> '.$row["option_d"].'</label></p>';
							
						echo'</div>';
						echo'<br>';
					}
					
					
					$id++;
				}//end while()
				$_SESSION["id"] = $id;
			}else{
				$_SESSION["blank_quiz"] = "blank_quiz";
				header("Location: home.php");
			}
	
			
			
		?>
		
		
		<div class="w3-row w3-left">
			<button id="submit_me" class="w3-btn w3-ripple w3-teal" type="submit" style="position:fixed; bottom:0;right:0;margin:5px;border-radius:5px;width:5em;height:3em;">Submit</button>
		</div>
		<br>
		
	</form>
	
	

</body>


	<script>
		
		function hide() {
			document.getElementById("quiz_title_exists").style.display = "none";
		}
		
		
		function enableAutoplay() { 
			var x = document.getElementById("myAudio");
			// x.autoplay = true;
			// x.load();
		}
		
		
		//TIMER
		function startTimer(duration, display) {
			var start = Date.now(),
				diff,
				minutes,
				seconds;
			function timer() {
				// get the number of seconds that have elapsed since 
				// startTimer() was called
				diff = duration - (((Date.now() - start) / 1000) | 0);

				// does the same job as parseInt truncates the float
				minutes = (diff / 60) | 0;
				seconds = (diff % 60) | 0;

				minutes = minutes < 10 ? "0" + minutes : minutes;
				seconds = seconds < 10 ? "0" + seconds : seconds;

				display.textContent = minutes + ":" + seconds; 
				
				if(minutes<=0){
					document.getElementById("time").style.color = "red";
				}
				if(minutes==0 && seconds==59){
					// enableAutoplay();
				}
				if(minutes==0 && seconds==0){
					document.getElementById("time_up").style.display = "block";
					document.getElementById("time_cover").style.display = "none";
					// enableAutoplay();
					
					
					var x = document.forms["frm1"];
					var i;
					for (i = 0; i < x.length ;i++) {
						x.elements[i].readOnly = true;
					}
					
					var y = document.querySelectorAll("input.radio,label");
					var ii;
					for (ii = 0; ii < x.length ;ii++) {
						y[ii].style.visibility = "hidden";
					}
					
					document.getElementById("submit_me").readOnly = false;
					
				}

				if (diff <= 0) {
					// add one second so that the count down starts at the full duration
					// example 05:00 not 04:59
					start = Date.now() + 1000;
				}
			};
			// we don't want to wait a full second before the timer starts
			timer();
			setInterval(timer, 1000);
		}

		var minutes = <?php echo $_SESSION["minutes"]?>;
		
		window.onload = function () {
						   //60 *
			var fiveMinutes = 60 * minutes,display = document.querySelector('#time');
			startTimer(fiveMinutes, display);
		};
		
	</script>

<html>
