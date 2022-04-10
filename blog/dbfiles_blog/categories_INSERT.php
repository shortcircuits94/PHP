<!DOCTYPE html>
<html>
<head>
  <title>INSERT categories TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$category = trim($_POST['category']);
$query = "INSERT into categories values ('0', '$category')";

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