<DOCTYPE! html> 
<html> 
<head> 
	<title>Create Elvis Table</title> 
</head> 
<body style="background-color: rgb(229,242,247);"> 


<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE email_list (
	id INT AUTO_INCREMENT,
	first_name VARCHAR(20),
	last_name VARCHAR(20),
	email VARCHAR(60),
	PRIMARY KEY (id) )";
	
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