<?php
	$db=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabase) or die('Could not connect to database');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $config_blogname; ?></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
<div id="header">
	<h1><?php echo $config_blogname; ?></h1>
	<ul class="menu">
		<li><a href="index1.php">home</a></li>
		<li><a href="viewcat.php">categories</a></li>
		<li>
		<?php
		if (!isset($_SESSION['USERNAME'])) {
			header("Location:"."index1.php");
			}
		?>
		</li>
		<?php

        if (!isset($_SESSION['USERNAME'])) {
			header("Location:"."index1.php");
		}
		?>
</div>

<div id="main">		