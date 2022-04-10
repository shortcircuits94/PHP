<!DOCTYPE html>
<html>
<head>
  <title>Create riskyjobs TABLE</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "CREATE TABLE riskyjobs (
  job_id INT AUTO_INCREMENT,
  title VARCHAR(200),
  description MEDIUMTEXT,
  city VARCHAR(100),
  state VARCHAR(100),
  zip VARCHAR(5),
  company VARCHAR(30),
  date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (job_id)
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