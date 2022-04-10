<!DOCTYPE html>
<html>
<head> 	
	<title> Car options by Rebecca Scott</title>
</head>
<body> 

	<h1>Success!</h1> 

	<?php 
	
	
	$name = $_POST['fname'];
	$selected = $_POST['selType'];
	
	$colour = $_POST['txtColour'];
	
	echo "$name, your $selected in $colour is ready.<br />";
	echo "Pick it up anytime!<br />";
	echo "Safe driving!<br />";
	
	echo "Programmed by \"Rebecca Scott\"";
	?>
</body>
</html>

	