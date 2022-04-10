<?php

	require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$TableName = "guitarwars";
	$query = "DROP TABLE $TableName";
	
	if (mysqli_query($dbc, $query)) {
		echo "The query was successfully executed!<br />";
	}
	else {
		echo "The query could not be executed!" / mysqli_error($dbc);
	}
	mysqli_close($dbc);
?>