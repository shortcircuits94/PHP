<html>
<head>
	<title> DROP the - Movies - Tables </title> 
</head> 

<body style="background-color: rgb(195,235,215);">

<?php

require_once('connectvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_error()) {
	echo("<p class='error'> Failed to connect to database. </p>");
	exit();
}

$TableName = "Movies";

$Query = "DROP table $TableName";

if (mysqli_query ($dbc, $Query)) {
	echo "The query was successfully executed! Table dropped! <br />";
}
else {
	echo "The query could not be executed!<br />";
}

mysqli_close ($dbc); 
?>
</body> 
</html> 