<?php
session_start();
require("config.php");
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die ("Could not connect to database.");
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $config_blogname; ?></title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
</head>
<body>
<div id="header">
    <h1><?php echo $config_blogname; ?></h1>
    <ul class="menu">
        <li><a href="index1.php">home</a></li>
		<li><a href="viewcat.php">categories</a></li>
		<li>
    <?php
	if(isset($_SESSION['USERNAME']) == TRUE) {
		echo "<a href='logout.php'>logout</a>";
	}
	else {
		echo "<a href='login.php'>login</a>";
	}
	?>
	</li>
	<li>
	<?php
	if(isset($_SESSION['USERNAME']) == TRUE) {
		echo "[<a href='addentry.php'>add entry</a>]";
		echo "[<a href='addcat.php'>add category</a>]";
	}
    ?>
	</li>
	</ul>
	</div>
<div id="main">

