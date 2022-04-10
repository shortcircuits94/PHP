<DOCTYPE! html> 
<html> 
<head> 
	<title>Movie Form 2</title> 
</head> 
<body style="background-color: rgb(229,242,247);"> 


<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE Movies2 (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
Title TEXT, 
Image_Name VARCHAR(100),
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