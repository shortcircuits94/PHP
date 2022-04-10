<DOCTYPE! html> 
<html> 
<head> 
	<title>Movie Form</title> 
</head> 
<body style="background-color: rgb(229,242,247);"> 


<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE Movies (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
Title TEXT, 
ProductionCompany TEXT, 
YearReleased TEXT, 
Director TEXT)";



if (mysqli_query ($dbc,$query)) {
	echo "The query was successfully executed!<br />";
}
else {
	echo "The query could not be executed!" . mysqli_error($dbc);
}
mysqli_close ($dbc);
?>

</body>
</html>
