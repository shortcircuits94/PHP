<DOCTYPE! html> 
<html> 
<head> 
	<meta charset="UTF-8" />
	<title>Send Email</title> 
	<link href="style.css" rel="stylesheet"/>
</head> 
<body>
<header>
<img src="elvislogo.gif"  width="229"
 height="32" alt="Elvis Logo" title="Elvis Logo" />
</header>

<img src="blankface.jpg"  width="161" height="350" alt="Blank Face" title="Blank Face" />

<p><strong>Private:</strong>For Elvis lovers only!
Write and send an email to mailing list members.</p>

<?php
require_once('connectvars.php');

if(isset($_POST['Submit'])){
$from = 'ElvisFanClub@elvis.com';
$subject = $_POST['subject'];
$text = $_POST['elvismail'];
$output_form = false;


	if(empty($subject) && empty($text)){
		echo "You forgot the email subject and message. <br />";
		$output_form = true;
	}
	if(empty($subject) && !empty($text)){
		echo "You forgot the email subject. <br />";
		$output_form = true;
	}
	if(!empty($subject) && empty($text)) {
		echo "You forgot to enter a message. <br />";
		$output_form = true;
	}
}
	else {
		$output_form = true;
		$subject = "";
		$text = "";
	}
	if (!empty($subject) && !empty($text)){
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT * FROM email_list";
		$result = mysqli_query($dbc,$query) or die('Error querying database.');
		
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$to = $row['email'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$msg = "Dear $first_name $last_name,\n$text";
		//mail($to,$subject,$msg, 'From:' . $from);
		echo '<h2>Email sent to: ' . $to . '</h2><br />';
	}
	mysqli_close($dbc);
	}
if ($output_form) {
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<label for="subject">Subject of email:</label><br />
<input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>"/><br />
<label for="elvismail">Body of email:</label><br />
<textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br />
<input type="submit" name="Submit" value="Submit" />
<?php
}
?>
</form>
<b>Created by: Rebecca Scott</b>
</body>
</html>