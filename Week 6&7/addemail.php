<!DOCTYPE html>
<html>
<head>
	<title>Make Me Elvis - Add Email</title>
</head>
<body>


	<h2>Elvis is King - Add my Email to the mailing list</h2>
	
<?php
	require_once('connectvars.php');
	
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$First_Name = trim($_POST['first_name']);
$Last_Name = trim($_POST['last_name']);
$Email = trim($_POST['email']);


$query = "INSERT into email_list values('0', '$First_Name', '$Last_Name', '$Email')";


print ("The query is:<br />$query<br /><br />");

if (mysqli_query($dbc, $query)) {
	print("The query was successfully executed!<br />");
} else {
	print("The query could not be executed!<br />") . mysqli_error($dbc);
}

mysqli_close ($dbc);
?>
</body>
</html>