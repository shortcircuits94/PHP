<!DOCTYPE html>
<html>
<head>
	<title>Guitar Wars - Add Your High Score</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body> 
	<h2>Guitar Wars - Add Your High Score</h2>
<?php

require_once('connectvars.php');
require_once('appvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$TableName = "guitarwars2";
if(isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($dbc,trim($_POST['name']));
	$score = mysqli_real_escape_string($dbc,trim($_POST['score']));
	$screenshot = mysqli_real_escape_string($dbc,trim($_FILES['screenshot']['name']));
	$screenshot_type = $_FILES['screenshot']['type'];
	$screenshot_size = $_FILES['screenshot']['size'];
	
	if(!empty($name) && is_numeric($score) && !empty($screenshot)){
		if ((($screenshot_type=='image/gif')||($screenshot_type=='image/jpeg')||($screenshot_type=='image/pjpeg')||($screenshot_type=='image/png')) && ($screenshot_size>0) && ($screenshot_size<=GW_MAXFILESIZE)) {
			if($_FILES['screenshot']['error'] == 0) {
		$target = GW_UPLOADPATH . $screenshot;
		if(move_uploaded_file($_FILES['screenshot']['tmp_name'],$target)) {
		
		$query = "INSERT INTO $TableName (date, name, score, screenshot) VALUES (NOW(), '$name', '$score', '$screenshot')";
		mysqli_query($dbc, $query);
		
	echo'<p>Thanks for adding your new high score!</p>';
	echo '<p><strong>Name:</strong>' . $name . '<br />';
	echo '<strong>Score</strong>' . $score . '<br />';
	echo '<img src"' . GW_UPLOADPATH . $screenshot . '"alt="Score Image" /></p>';
	echo '<p> <a href="guitarindex.php">&lt;&lt; Back to high scores</a></p>';
		$name = "";
		$score = "";
		$screenshot = "";
		mysqli_close($dbc);
		}
	else {
			echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
		}
			}
	}
	else {
		echo '<p class="error"> The Screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024). 'KB in size.</p>';
	}
	@unlink($_FILES['screenshot']['tmp_name']);
	}
	else {
		echo '<p class="error"> Please enter all of the information to add your high score.</p>';
	}
}
?>
<hr />
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE;?>" />
	<label for="name">Name:</label>
	<input type="text" id="name" name="name" value="<?php if(!empty($name)) echo$name; ?>" /><br /><br />
	<label for="score">Score:</label>
	<input type="text" id="score" name="score" value="<?php if(!empty($score)) echo$score; ?>" /><br /><br />
	<label for="screenshot">Screenshot:</label>
	<input type="file" id="screenshot" name="screenshot"/>
	<hr />
	<input type="submit" value="Add" name="submit" />
</form>
</body>
</html>
	