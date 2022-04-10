<!DOCTYPE html>
<html>
<head>
	<title>Update Inventory</title>
</head>
<body style="background-color: rbg(229,243,247);">
<h3>UPDATING inventory in the database</h3>
<h4>Programmed by exhausted Rebecca</h4>
<?php
require_once('includes/initialize.php');
$TitleIN = trim($_POST['TitleIN']);
$DirectorIN = trim($_POST['DirectorIN']);

$movieObj = Movie::retrieveRecord($dbc, $TitleIN);
$movieObj->setDirector($DirectorIN);
$result = $movieObj->updateRecord($dbc);

if ($result) {
	echo "The Update query was successful.";
} else {
	echo "The Update query failed";
}

?>
</body>
</html>