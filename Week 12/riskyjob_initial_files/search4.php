<!DOCTYPE html>
<html>
<head>
	<title>Risky Jobs - Search</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<img src="riskyjobs_title.gif" alt="Risky Jobs"/>
	<img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right"/>
	<h3> Risky Jobs - Search Results</h3>

<?php
	echo '<table border="0" cellpadding="2">';
	echo '<tr class="heading">';
	echo '<td>Job Title</td><td>Description</td><td>State</td><td>Date Posted</td>';
	echo '</tr>';
	
	require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	$user_search = $_GET['usersearch'];
	$search_query = "SELECT * FROM riskyjobs";
	
	$clean_search = str_replace(',',' ',$user_search);
	$search_words = explode(' ',$clean_search);
	$final_search_words = array();
	
	if(count($search_words) > 0) {
		foreach ($search_words as $word) {
			if(!empty($word)) {
				$final_search_words[] = $word;
			}
		}
	}
	
	$where_list = array();
	if(count($final_search_words) > 0) {
		foreach($final_search_words as $word) {
			$where_list[] = "description LIKE '%word%'";
		}
	}
	
	if(!empty($where_clause)) {
		$search_query .= "WHERE $where_clause";
	}
	
	$result = mysqli_query($dbc,$search_query);
	
	while ($row = mysqli_fetch_array($result)) {
		echo '<tr class="results">';
		echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
		echo '<td valign="top" width="50%">' .substr($row['description'],0,100). '</td>';
		echo '<td valign="top" width="10%">' . $row['state'] . '</td>';
		echo '<td valign="top" width="20%">' . substr($row['date_posted'],0,10) . '</td>';
		echo '</tr>';
	}
	echo '</table>';
	mysqli_close($dbc);
?>
</body>
</html>
	