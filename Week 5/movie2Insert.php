<DOCTYPE! html> 
<html> 
<head> 
	<title>Movie Form 2</title> 
</head> 
<body style="background-color: rgb(229,242,247);"> 

<?php


$Title = trim($_POST['Title']);
$Image_Name = trim($_POST['Image_Name']);
$ProductionCompany = trim($_POST['ProductionCompany']);
$YearReleased = trim($_POST['YearReleased']);
$Director = trim($_POST['Director']);

require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "INSERT into Movies2 values('0', '$Title', '$Image_Name', '$ProductionCompany', '$YearReleased', '$Director')";


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