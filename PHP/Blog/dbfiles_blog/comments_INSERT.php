<!DOCTYPE html>
<html>
<head>
  <title>INSERT comments TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Trim the incoming data.
$blogID = trim($_POST['blogID']);
$name = trim($_POST['name']);
$comment = trim($_POST['comment']);

$query = "INSERT into comments values ('0', '$blogID', NOW(), '$name', '$comment')";

if (mysqli_query($dbc, $query)) {
 	echo "The query was successfully executed. Record was inserted!<br />";
	echo "<b>Data: $query </b><br /><br />";
} else {
 	echo "The query could not be executed!" . mysqli_error($dbc);
} 

mysqli_close($dbc);
?>
</body>
</html>