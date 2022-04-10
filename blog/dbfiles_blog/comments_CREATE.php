<!DOCTYPE html>
<html>
<head>
  <title>CREATE comments TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "CREATE TABLE comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  blog_id INT,
  dateposted DATETIME,
  name VARCHAR(50),
  comment TEXT
  )";

if (mysqli_query ($dbc, $query)) {
 	echo "The query was successfully executed!<br />";
} else {
 	echo "The query could not be executed!" . mysqli_error($dbc);
} 
mysqli_close($dbc);
?>
</body>
</html>