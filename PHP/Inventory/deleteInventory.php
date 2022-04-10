<<!DOCTYPE html>
<html>
<head>
	<title>Delete Inventory</title>
</head>
<body style="background-color: rbg(229,243,247);">
	<h3> Deleting records using PHP</h3>
	<h4> Programmed by Rebecca</h4>
<?php
require_once('includes/initialize.php');

$TitleIN = trim($_POST['TitleIN']);
$result = Movie::deleteRecord($dbc, $TitleIN);
if ($result) {
	echo "The DELETE query was successfully executed!<br />";
} else {
	echo " The DELETE query could not be executed";
}
?>

</body>
</html>