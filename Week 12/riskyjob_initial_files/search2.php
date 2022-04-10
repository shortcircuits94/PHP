<!DOCTYPE html>
<html>
<head>
  <title>Risky Jobs - Search</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <img src="riskyjobs_title.gif" alt="Risky Jobs" />
  <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
  <h3>Risky Jobs - Search Results</h3>

<?php
  // Grab the sort setting and search keywords from the URL using GET
  $sort = isset($_GET['sort']) ? $_GET['sort'] : 1;
 // $user_search = $_GET['usersearch'];

  // Start generating the table of results
  echo '<table border="0" cellpadding="2">';

  // Generate the search result headings
  echo '<tr class="heading">';
  echo '<td>Job Title</td><td>Description</td><td>State</td><td>Date Posted</td>';
  echo '</tr>';

  // Connect to the database
  require_once('connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  // query to get the results 
  $search_query= "SELECT * FROM riskyjobs";
  $where_list= array();
  $user_search= $_GET['usersearch'];
  $search_words = explode(' ',$user_search);
  foreach ($search_words as $word) {
	  $where_list[] = "description LIKE '%$word%'";
  }
  $where_clause = implode(' OR ',$where_list);
  
  if(!empty($where_clause)) {
	  $search_query.= " WHERE $where_clause";
  }
  $result = mysqli_query($dbc,$search_query);

  while ($row = mysqli_fetch_array($result)) {
    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . $row['title'] . '</td>';
    echo '<td valign="top" width="50%">' . $row['description'] . '</td>';
    echo '<td valign="top" width="10%">' . $row['state'] . '</td>';
    echo '<td valign="top" width="20%">' . $row['date_posted'] . '</td>';
    echo '</tr>';
  } 
  echo '</table>';

  mysqli_close($dbc);
?>

</body>
</html>
