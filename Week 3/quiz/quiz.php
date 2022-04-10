<!DOCTYPE html>
<html>
<head> 
	<title>PHP Quiz - By: Rebecca Scott</title> 
</head> 
<body>
<?php

	$name = $_POST['name'];
	$score = 0;
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];
	$q4 = $_POST['q4'];
	$q5 = $_POST['q5'];

	
	echo "Hello! $name, here are your quiz results.<br />"; 
	
	if ($q1 == "c") {
		++$score;
		echo "CORRECT ANSWER! PHP Developer's Group Web Site is www.php.net <br />";
	}
	else {
		echo "Incorrect. The PHP Developer's Group Web Site is www.php.net <br />";
	}
	
	if ($q2 == "d") {
		++$score;
		echo "CORRECT ANSWER! PHP documents use the .php extension. <br />";
	}
	else {
		echo "Incorrect. PHP documents use the .php extension. <br />";
	}
	if ($q3 == "a") {
		++$score;
		echo "CORRECT ANSWER! Stands for PHP: Hypertext Preprocessor. <br />";
	}
	else {
		echo "Incorrect! Stands for PHP: Hypertext Preprocessor. <br />";
	}
	if ($q4 == "b") {
		++$score;
		echo "CORRECT ANSWER! PHP statments should be closed with a semicolon <br />";
	}
	else {
		echo "Incorrect. PHP statments should be closed with a semicolon <br />";
	}
	if ($q5 == "a") {
		++$score;
		echo "CORRECT ANSWER! The default HTTP method is GET <br />";
	}
	else {
		echo "Incorrect. The default HTTP method is GET <br />";
	}
	
	echo "$name you got $score out of 5 <br />";
?>