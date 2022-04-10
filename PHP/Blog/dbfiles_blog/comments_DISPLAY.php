<!DOCTYPE html>
<html>
<head>
  <title>DISPLAY comments from table</title>
</head>
<body>
<?php
// Set the variables for the database access:
  require_once('connectvars.php');
  
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query = "SELECT * from comments";
$result = mysqli_query ($dbc, $query);

// Create a table.
print ("<h2 style=\"text-align: center\">Blog comments Data</h2>");
print ("<table border=\"1\" width=\"75%\" cellspacing=\"2\" cellpadding=\"2\" align=\"center\">");
print ("<tr>");
print ("<th>ID (auto_increment)</th>");
print ("<th>Blog ID</th>");
print ("<th>Date Posted</th>");
print ("<th>Name</th>");
print ("<th>Comment</th>");
print ("</tr>");

// Fetch the results from the database.
while ($Row = mysqli_fetch_array($result)) {
 	print ("<tr align=\"center\" valign=\"top\">");
 	print ("<td align=\"center\" valign=\"top\">$Row[id]</td>");
	print ("<td align=\"center\" valign=\"top\">$Row[blog_id]</td>");
	print ("<td align=\"center\" valign=\"top\">$Row[dateposted]</td>");
	print ("<td align=\"center\" valign=\"top\">$Row[name]</td>");
	print ("<td align=\"center\" valign=\"top\">$Row[comment]</td>");
	print ("</tr>");
}

mysqli_close($dbc);

print ("</table>");
$currentDate = date("l F j,Y");
print ("<br /><p style=\"text-align: center\"><em>{your full name goes here} &nbsp;&nbsp;Date: $currentDate </em></p>");
?>
</body>
</html>
