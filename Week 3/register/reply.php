<html>
<head> 
	<title>ABC Website</title>
</head>
<body>

<?php

	$name = $_POST['name'];
	$location = $_POST['location'];
	
	if (empty($name)) {
		echo "You did not enter a user name<br>";
		echo "Please return to the form and re-enter your information";
	} else {
		echo "Thank you $name <br />";
		echo "From the lovely region of $location";
	}
