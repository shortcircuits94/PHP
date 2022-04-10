<!DOCTYPE html>
<html> 
<head>
	<title> UPDATE Movies Database</title> 
</head> 
<body style="background-color: rgb(229,243,247);">
<h3>UPDATING DIRECTOR NAME in the Movies database</h3> 
<h4>Programmed by Rebecca Scott</h4> <br />

<?php
	require_once('connectvars.php');
	
$TitleIN = trim($_POST['TitleIN']);
$DirectorIN = trim($_POST['DirectorIN']);

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "UPDATE Movies SET Director = '$DirectorIN' WHERE Title = '$TitleIN' ";

print ("The query is: <b>$query</b> <br /> <br />");

if (mysqli_query ($dbc, $query)) {
	echo "The UPDATE query was successful.";
}
else {
	echo "The UPDATE query FAILED!" . mysqli_error($dbc);
}
mysqli_close($dbc);
?>
</body>
</html>