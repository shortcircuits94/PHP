<?php
  require_once('authorize.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Guitar Wars - High Scores Administration</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head> 

<body>
<a href="guitarindex.php">To Index</a>
	<h2>Guitar Wars - High Score Administration</h2>
	<p>Below is a list of all Guitar Wars high scores. Use this page to remove scores as needed. </p>
	<hr />
<?php

require_once('connectvars.php');
require_once('appvars.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$TableName = "guitarwars2";
$query = "SELECT * FROM $TableName ORDER BY score DESC, date ASC";
$data = mysqli_query($dbc,$query);
echo '<table>';
	  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
    echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
      '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] .
      '&amp;screenshot=' . $row['screenshot'] . '">Remove</a>';
    if ($row['approved'] == '0') {
      echo ' / <a href="approvescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] .
        '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . '&amp;screenshot=' .
        $row['screenshot'] . '">Approve</a>';
    }
    echo '</td></tr>';
  }
  echo '</table>';
	mysqli_close($dbc);
	?>
</body>
</html>