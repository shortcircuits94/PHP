<DOCTYPE! html> 
<html> 
<head> 
	<meta charset="UTF-8" />
	<title>Remove Email</title> 
	<link href="style.css" rel="stylesheet"/>
</head> 
<body>

<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$TableName = 'email_list';
$EmailIn = $_POST['EmailIn'];
$query = "DELETE FROM $TableName WHERE email='$EmailIn'";

echo "The query is: <b>$query</b><br /> <br />";
	
	if (mysqli_query ($dbc, $query)) {
		echo 'Customer removed: ' . $EmailIn;
	}
	else {
		echo "The DELETE query failed!" . mysqli_error($dbc);
	}
	mysqli_close($dbc);
?>
</body>
</html>