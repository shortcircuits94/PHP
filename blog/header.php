<?php
require("config.php");
$db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase) or die ('Could not connect to database.');
?>
<!DOCTYPE html>
<html>
<head>
    <title>
            <?php echo $config_blogname;?>
    </title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
</head>
<body>
    <div id="header">
    <h1>
        <?php echo $config_blogname; ?>
    </h1>
        <ul class="menu">
            <li>
                <a href="index1.php">Home</a>
            </li>
    <?php
        echo "</ul>";
    ?>
    </div>
<div id="main">