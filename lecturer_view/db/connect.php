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

	
	// $sql = "DROP TABLE IF EXISTS quizzes";
	$sql = "CREATE TABLE IF NOT EXISTS quizzes (
			quiz_title VARCHAR(20) PRIMARY KEY,
			minutes INT(10) NOT NULL,
			number_q INT(10) NOT NULL,
			distribute BOOL DEFAULT 0 NOT NULL,
			has_questions BOOL DEFAULT 0 NOT NULL
			)";
			mysqli_query($conn, $sql);
			
			
	// $sql = "DROP TABLE IF EXISTS question_tb";
	$sql = "CREATE TABLE IF NOT EXISTS question_tb (
			quiz_title VARCHAR(20),
			question_number INT(10) NOT NULL,
			question VARCHAR(500) NOT NULL,
			answer_type VARCHAR(20) NOT NULL,
			option_a VARCHAR(200),
			option_b VARCHAR(200),
			option_c VARCHAR(200),
			option_d VARCHAR(200),
			total_marks int(10),
			image VARCHAR(300),
			FOREIGN KEY (quiz_title) REFERENCES quizzes(quiz_title)
			)";
			mysqli_query($conn, $sql);
			
			
	// $sql = "DROP TABLE IF EXISTS marking";
	$sql = "CREATE TABLE IF NOT EXISTS marking (
			id VARCHAR(20) NOT NULL,
			quiz_title VARCHAR(20),
			marks int(10),
			total_marks int(10)
			)";
			mysqli_query($conn, $sql);
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
