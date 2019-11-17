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
		<a href="results.php" class="fa fa-arrow-left" style="text-decoration:none;position:fixed;top:0;left:0;margin:16px;font-size:2em;"></a>
		<h3 style="display:inline;">Results: <?php echo $_SESSION["stud_name"];?></h3>
	</header>

	<div class="w3-container w3-left" style="margin-top:100px;">
		
		<?php
		
			$stud_name = $_SESSION["stud_name"];
			
			$sql = "SELECT * FROM marking WHERE id='$stud_name'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				
				
				// output data from database
				while($row = mysqli_fetch_assoc($result)) {
				
					echo "<p style='text-decoration:underline;'>Quiz: ".$row["quiz_title"]."</p>";
					echo "Marks: ".$row["marks"]." / ".$row["total_marks"]."<br>";
					$marks = $row["marks"];
					$total_marks = $row["total_marks"];
					$percent = round(($marks/$total_marks)*100);
					echo "Percent: ".$percent."%<br><br>";
					
				}//end while()
				
			}else{
				$_SESSION["no_results"] = "no_results";
				header("Location: results.php");
			}
			
	
			
		?>
		
		<br>
		
	</div>
	
	

</body>


	<script>
		
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
		
	</script>

<html>
