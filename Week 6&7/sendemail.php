<DOCTYPE! html> 
<html> 
<head> 
	<meta charset="UTF-8" />
	<title>Send Email</title> 
	<link href="style.css" rel="stylesheet"/>
</head> 
<body>



<?php
require_once('connectvars.php');
$from = 'ElvisFanClub@elvis.com';
$subject = $_POST['subject'];
$text = $_POST['elvismail'];
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "SELECT * FROM email_list";

$result = mysqli_query($dbc,$query) or die('Error querying database.');

while ($row = mysqli_fetch_array($result)){
	$to = $row['email'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$msg = "Dear $first_name $last_name,\n$text";
	
	mail($to,$subject,$msg, 'From:' . $from);
	echo '<h2>Email sent to: ' . $to . '</h2><br />';
}

mysqli_close($dbc);
?>
</body>
</html>