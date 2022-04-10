<!DOCTYPE html>
<html>
<head>
	<title>Display Inventory</title>
</head>
<body>
<?php
require_once('includes/initialize.php');

echo "<h2 style='text-align:center'>Display MOVIES Records</h2>";
echo "<table border='1' width='75%' cellspacing='2' cellpadding='2' align='center'>";
echo "<tr align='center' valign='top'>";
echo "<td align='center' valign='top'><b>TITLE</b></td>";
echo "<td align='center' valign='top'><b>DIRECTOR</b></td>";
echo "<td align='center' valign='top'><b>PRODUCTION COMPANY</b></td>";
echo "<td align='center' valign='top'><b>YEAR RELEASED</b></td>";
echo "</tr>";

$results = Movie::retrieveAllRecords($dbc); 
if ($results) {
	foreach($results as $Row) {
		echo "<tr align='center' valign='top'>";
		echo "<td align='center' valign='top'><b>$Row[Title]</b></td>";
		echo "<td align='center' valign='top'><b>$Row[Director]</b></td>";
		echo "<td align='center' valign='top'><b>$Row[ProductionCompany]</b></td>";
		echo "<td align='center' valign='top'><b>$Row[YearReleased]</b></td>";
		echo "</tr>";
		} 
	}	else {
		echo "<tr align='center'>";
		echo "<td colspan='4'>No Results</td>";
		echo "</tr>";
	}
	echo "</table>";


?>
</body>
</html>