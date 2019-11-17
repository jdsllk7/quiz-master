<?php
	$error_msg = 'Sorry could not connect to server...';
	$servername = 'localhost';
	$username = 'root';
	$password = '';

	// CREATE CONNECTION
	$conn = mysqli_connect($servername, $username, $password);
	
	// CHECK CONNECTION
	if (!$conn) {
		die($error_msg);
	}

	// CREATE THE DATABASE
	// $sql = "drop database if exists quiz_server";
	$sql = "CREATE DATABASE IF NOT EXISTS quiz_server";
	if (mysqli_query($conn, $sql)) {
		$dbname = "quiz_server";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
	} else {
		die($error_msg);
	}

	
	
	// $sql = "DROP TABLE IF EXISTS students";
	$sql = "CREATE TABLE IF NOT EXISTS students (
			id VARCHAR(20)  NOT NULL,
			quiz_title VARCHAR(20),
			question VARCHAR(500),
			answer VARCHAR(500),
			total_marks_per_question int(10)
			)";
			mysqli_query($conn, $sql);
			
			
	
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
