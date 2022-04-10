<!DOCTYPE html> 
<html>
<head> 
	<title>Inserting Data into my Movies Table</title>
</head>
<body style="background-color: rgb(229,243,247);">


<?php


$Title = trim($_POST['Title']);
$ProductionCompany = trim($_POST['ProductionCompany']);
$YearReleased = trim($_POST['YearReleased']);
$Director = trim($_POST['Director']);


require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "INSERT into Movies values('0', '$Title', '$ProductionCompany', '$YearReleased', '$Director')";


print ("The query is:<br />$query<br /><br />");

if (mysqli_query($dbc, $query)) {
	print("The query was successfully executed!<br />");
} else {
	print("The query could not be executed!<br />") . mysqli_error($dbc);
}

mysqli_close ($dbc);
?>
</body>
</html>