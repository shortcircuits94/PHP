<!DOCTYPE html>
<html> 
<head>
	<title>ABC Website</title>
</head>
<body>
	<h1> Welcome to the ABC Website!</h1>
	
	<h3>-Programmed by Rebecca Scott-</h3>
	
	<form method="post" action="reply.php">
	Enter your name:
	<input type="text" name="name" /><br>
	You live in:
	<input type="text" name="location" /><br>
	<input type="submit" value="Submit"> <input type="reset" value="Clear">
	</form><br>
	
	<?php

	date_default_timezone_set("America/Toronto");
	echo "Date: " . date('F dS, Y');
	
	?>
</body>
</html>	