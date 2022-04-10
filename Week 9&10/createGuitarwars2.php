<?php

require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$TableName = "guitarwars2";


$query = "CREATE TABLE $TableName (
id INT AUTO_INCREMENT,
date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
name VARCHAR(32),
score INT,
screenshot VARCHAR(64),
approved TINYINT(1) DEFAULT 0,
PRIMARY KEY (id),
KEY name(name)
)";

	if (mysqli_query ($dbc,$query)) {
	echo "The query was successfully executed!<br />";
}
else {
	echo "The query could not be executed!" . mysqli_error($dbc);
}
mysqli_close ($dbc);
	

?>