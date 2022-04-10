<!DOCTYPE html>
<html>
<head>
	<title>Create Movies Table</title>
</head>
<body>
<?php
require_once('includes/initialize.php');
$dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);

$query = "CREATE TABLE Movie (
id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
Title TEXT, 
ProductionCompany TEXT, 
YearReleased TEXT, 
Director TEXT
)";

$result = $dbc->query($query);

if ($result) {
 	echo "The query was successfully executed!<br />";
} else {
 	echo "The query could not be executed! " . $dbc->errorInfo()[2];
} 

$dbc = null;
?>
</body>
</html>
