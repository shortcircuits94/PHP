<?php
require("header.php");
require("config.php");

// section 1 code goes here!
$error = 0;
if(isset($_GET['id']) == TRUE) {
	if(is_numeric($_GET['id']) == FALSE) {
	$error = 1;
}
	if($error == 1) {
		header("Location: " . $config_basedir);
}
	else {
		$validentry = $_GET['id'];
}
}
else {
	$validentry = 0;
}

// Section 4b code goes here!
if (isset($_POST['submit'])){
	$_POST['name']=addslashes($_POST['name']);
	$_POST['comment']=addslashes($_POST['comment']);
	$sql="INSERT INTO comments (blog_id,dateposted,name,comment) VALUES(".$validentry.",NOW(),'".$_POST['name']."','".$_POST['comment']."');";		
		mysqli_query($dbc,$sql);
	
		header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?id=".$validentry);
}
	else{

// Section 2a code goes here!	
	if($validentry == 0) {
		$sql = "SELECT entries.*, categories.cat FROM entries, categories
			WHERE entries.cat_id = categories.id
			ORDER BY dateposted DESC
			LIMIT 1;";
	}
	else {
		$sql = "SELECT entries.*, categories.cat FROM entries, categories WHERE entries.cat_id = categories.id AND entries.id = ". $validentry . " ORDER BY dateposted DESC LIMIT 1;";
	}






// Section 2b code is provided for you here!	
	$result = mysqli_query($db, $sql);

// Section 2c code is provided for you here!		
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	echo "<h2 id='title'>" . $row['subject'] . "</h2><br />";
	echo "<p id='byline'>In <a href='viewcat.php?id=" . $row['cat_id'] ."'>" . $row	['cat'] ."</a> - Posted on <span class='datetime'>" . date("D jS F Y g.iA", strtotime($row	['dateposted'])) ."</span>";

	if(isset($_SESSION['USERNAME']) == TRUE) {
		echo "<span id='edit'><a href='updateentry.php?id=" . $row['id'] . "'>edit</a></span>";
	}
	
	echo "</p>";

	echo "<p id='entrybody'>";
	echo nl2br($row['body']);
	echo "</p>";
	
// Section 3a code is provided for you here!		
	echo "<div id='comments'>";
	$commsql = "SELECT * FROM comments WHERE blog_id = " . $validentry . " ORDER BY dateposted DESC;";
	$commresult = mysqli_query($db, $commsql);
	$numrows_comm = mysqli_num_rows($commresult);
	
// Section 3b code is provided for you here!		
	if($numrows_comm == 0) {
		echo "<p>No comments.</p>";
	}
	else {
		$i = 1;

		while($commrow = mysqli_fetch_array($commresult, MYSQLI_ASSOC)) {
			echo "<a name='comment" . $i . "'></a>\n";
			echo "<p class='commenthead'>Comment by " . $commrow['name'] . " on " . date("D jS F Y g.iA", strtotime($commrow['dateposted'])) . "</p>\n";
			echo "<p class='commentbody'>".$commrow['comment']."</p>\n";
			$i++;		
		}
	}
	echo "</div>\n";
	
// Section 4a code goes here!		
?>
<div id='addcomment'>
<h3>Leave a comment</h3>

<form action="<?php echo $_SERVER['SCRIPT_NAME']."?id=".$validentry; ?>" method="post">
<table>
	<tr>
		<td>Your Name</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>Comments</td>
		<td><textarea name="comment" rows="10" cols="50"></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Add comment"></td>
	</tr>
	</table>
	</form>
	</div>

<?php
}
require("footer.php");
?>
