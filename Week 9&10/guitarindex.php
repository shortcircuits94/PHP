<!DOCTYPE html>
<html>
<head>
	<title>Guitar Wars - High Scores</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h2>Guitar Wars - High Scores</h2>
	<p>
	Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just <a href="addscore.php"> add your own score</a>.</p>
	<hr />
	<?php 
	
	require_once("connectvars.php");
	require_once("appvars.php");
	
	
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$TableName = "guitarwars2";
	$query = "SELECT * FROM $TableName WHERE approved = 1 ORDER BY score DESC, date ASC";
	$data = mysqli_query($dbc,$query);
	
	echo '<table>';
		$i = 0;
		while ($row = mysqli_fetch_array($data)) {
			if($i == 0){
				echo '<tr><td colspan="2" class="topscoreheader">Top Score: '.$row['score'].'</td></tr>';
			}
			echo '<tr><td class="scoreinfo">';
			echo '<span class="score">' . $row['score'] . '</span><br />';
			echo '<strong>Name:</strong>' . $row['name'] . '<br />';
			echo '<strong>Date:</strong>' . $row['date'] . '</td>';
			if(is_file(GW_UPLOADPATH.$row['screenshot']) && filesize(GW_UPLOADPATH.$row['screenshot']) > 0) {
				echo'<td><img src="' . GW_DISPLAYPATH . $row['screenshot'] . '"alt="Score image" /></td></tr>';
			}
			else {
				echo '<td><img src="' . GW_DISPLAYPATH . 'unverified.gif' . '"alt="Unverified score" /></td></tr>';
				// <img src="images/unverified.gif" alt="Unverified score"/>
			}
			$i++;
		}
		echo '</table>';
	mysqli_close($dbc);
	?>
</body>
</html>