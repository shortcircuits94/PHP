<!DOCTYPE html>
<html>
<head> 
	<title>Guitarwars Table</title>
	<link href="tablestyle.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<h1>Guitarwars Table</h1>
<?php
require_once('connectvars.php');
require_once('appvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$TableName = "guitarwars";
$query = "SELECT * FROM $TableName ORDER BY score DESC, date ASC";

$data = mysqli_query($dbc,$query);
echo '<table>';

		echo "<h3>Guitarwars Table</h3>";
		echo "<table>";
		echo "<tr>";
		echo "<th>ID*</th>";
		echo "<th>DATE</th>";
		echo "<th>NAME</th>";
		echo "<th>SCORE</th>";
		echo "<th>SCREENSHOT</th>";
		echo "<th>APPRvd</th>";
		echo "</tr>";		
		
		while($ROW = mysqli_fetch_array($data)){
		echo "<tr>";
		echo "<th>$ROW[id]</th>";
		echo "<th>$ROW[date]</th>";
		echo "<th>$ROW[name]</th>";
		echo "<th>$ROW[score]</th>";
		echo "<th>$ROW[screenshot]</th>";
		echo "<th>N/A</th>";
		echo "</tr>";
	}
  echo '</table>';
  mysqli_close($dbc);
?>
</body>
</html>