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
li{
	margin: 10px;
}
.view{
	float:right;
}
html{
		background: linear-gradient(rgba(26,26,26,0.1), rgba(26,26,26,0.1)),  url("images/52.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center center;
		background-attachment: fixed;
	}
</style>
	
<body style="width:100%;min-height:500px;height:100%;">
	
	<header class="w3-container w3-card-4 w3-theme w3-top" style="padding:15px; text-align:center;">
		<a href="home.php" class="fa fa-arrow-left" style="text-decoration:none;position:fixed;top:0;left:0;margin:16px;font-size:2em;"></a>
		<h3 style="display:inline;">Distribute Quiz</h3>
	</header>

	<form class="w3-container w3-center w3-large" style="margin-top:80px" method="GET" action="db/view_quiz_db.php">
		
		
		<?php
			
			$sql = "SELECT * FROM quizzes";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				
				echo'<ul class="w3-ul w3-card-4" style="text-align:left;background:#ffffff;">';
				
				// output data from database
				while($row = mysqli_fetch_assoc($result)) {
				
					echo'<tr>
							<li>'.$row["quiz_title"].'<button type="submit" name="quiz_to_distribute" value="'.$row["quiz_title"].'" class="w3-btn view w3-tiny w3-green">Distribute</button></li>
						</tr>';
					  
				}//end while()
				echo'</ul>';	
				
			} else {
				echo '<div id="done" class="w3-container w3-red" style="z-index:5; margin-top:10px;">
						<h3 class="w3-text-shadow">No Quizzes!</h3>
						<div style="margin-bottom:20px;" class="w3-btn w3-white w3-medium" onclick="hide()">Okay</div>
					</div>';
			}
		?>
		
	</form>
	
	<script>
		function hide() {
			document.getElementById("done").style.display = "none";
			window.location.assign("home.php");
		}
	</script>
	

</body>

<html>
