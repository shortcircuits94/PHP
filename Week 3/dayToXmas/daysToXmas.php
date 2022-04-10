<!DOCTYPE html>
<html>
<head>
	<title>Days to Christmas</title>
</head>
<body> 
<h2>Days to Christmas Form by: Rebecca Scott</h2>
<img src="CandyCane.gif">
<?php

$firstname = $_POST['firstname'];
	date_default_timezone_set("America/Toronto");
	
	if ($firstname) {
		echo "Good ";
		if (date("A") == "AM") {
			echo " morning ";
		}
		elseif ((date("H")>=12) && (date("H")<18)) {
			echo " afternoon ";
		}
		else {
			echo " evening ";
		} 
	}
	echo " $firstname<br />";
	
	$currentdate = date("l F j, Y");
	echo "The current date is $currentdate<br>";
	
	$start = strtotime($currentdate);
	$end = strtotime('2017-12-25');
	$timeleft = ceil(abs($end - $start) / 86400);
	echo "There are $timeleft days left until Christmas!";
	
?>