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

	<header class="w3-container w3-card-4 w3-theme w3-top" style="padding:15px; text-align:center;">
		<a href="student_list.php" class="fa fa-arrow-left" style="text-decoration:none;position:fixed;top:0;left:0;margin:16px;font-size:2em;"></a>
		<h3 style="display:inline;">Quiz: <?php echo $_SESSION["quiz_to_mark"];?></h3>
	</header>

	<form class="w3-container w3-center" style="margin-top:130px;" method="GET" action="db/marking_db.php">
	
		<div class="w3-row" style="position:fixed; top:70px;left:2%;">
			<h3 style=" background:#fff;z-index:2;">Student id: <?php echo $_SESSION["student_id"];?></h3>
		</div>
		
		<?php
		
			$student_id = $_SESSION["student_id"];
			$quiz_title = $_SESSION["quiz_to_mark"];
			
			$sql = "SELECT * FROM students WHERE id='$student_id' and quiz_title='$quiz_title'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				
				$id=1;
				
				// output data from database
				while($row = mysqli_fetch_assoc($result)) {
				
					echo'<div class="w3-row w3-left" style="text-align:left;margin-bottom:50px;clear:both;">';
						echo'<span>'.$row["question"].' </span>';
						echo'[<input style="border:none;background:none;width:7%;display:inline;" value="'.$row["total_marks_per_question"].'" name="total_marks_per_question'.$id.'" readonly>]';
						echo'<p>Answer: '.$row["answer"].'</p>';
						echo'<input placeholder="Mark allocation" style="width:80%; min-width:200px; font-size:0.8em;" class="w3-input" value="" name="number_q'.$id.'" type="number" min="0" max="'.$row["total_marks_per_question"].'" required>';
					echo'</div>';
					echo'<br>';
				
					$id++;
				}//end while()
				
			}//end if()
	
			$_SESSION["id"] = $id;
			
		?>
		
		
		<div class="w3-row w3-left">
			<button class="w3-btn w3-ripple w3-teal" type="submit" style="position:fixed; bottom:0;right:0;margin:5px;border-radius:5px;width:5em;height:3em;">Finish</button>
		</div>
		<br>
		
	</form>
	
	

</body>


	<!-- <script>
		
		function hide() {
			document.getElementById("quiz_title_exists").style.display = "none";
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
			var fiveMinutes = 60 * minutes,
				display = document.querySelector('#time');
			startTimer(fiveMinutes, display);
		};
		
	</script> -->

<html>
