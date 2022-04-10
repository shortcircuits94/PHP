<!DOCTYPE html>
<html>
<head> 
	<title>Deleting Data from my Movies Database</title>
</head>

<body style="background-color: rgb(229,243,247);">
<h3>Deleting records Using PHP</h3> 
<h4>Programmed by Rebecca Scott</h4>
<?php

	require_once('connectvars.php');
	$TitleIN = trim($_POST['TitleIN']);
	$TableName = 'Movies';
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query = "DELETE FROM $TableName WHERE Title='$TitleIN'";
	
	echo "The query is: <b>$query</b><br /> <br />";
	
	if (mysqli_query ($dbc, $query)) {
		echo "The DELETE query was successful.";
	}
	else {
		echo "The DELETE query failed!" . mysqli_error($dbc);
	}
	mysqli_close($dbc);
?>
</body>
</html>