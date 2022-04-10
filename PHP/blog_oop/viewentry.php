<?php
require_once ('includes/initialize.php');
require_once('header.php');

$error = 0;
if(isset($_GET['id']) == TRUE) {
	if(is_numeric($_GET['id']) == FALSE) {
		$error = 1;
	}

	if($error == 1) {
		header("Location:"."index1.php");
	} else {
		$validentry = $_GET['id'];
	}
} else {
	$validentry = 0;
}

	if (isset($_POST['submit'])){
	
		$_POST['name']=addslashes($_POST['name']);
		$_POST['comment']=addslashes($_POST['comment']);
		
		Comment::addComment($validentry, $_POST['name'], $_POST['comment']);
	
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?id=".$validentry);
} else {
	if($validentry == 0) {
		$sql = "SELECT entries.*, categories.cat FROM entries, categories
		WHERE entries.cat_id = categories.id
		ORDER BY dateposted DESC
		LIMIT 1;";

	} else {
		$sql = "SELECT entries.*, categories.cat FROM entries, categories WHERE entries.cat_id = categories.id AND entries.id = " . $validentry . " ORDER BY dateposted DESC LIMIT 1;";
	}

	$result = mysqli_query($db, $sql);
	
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	echo "<h2 id='title'>" . $row['subject'] . "</h2><br />";
	echo "<p id='byline'>In <a href='viewcat.php?id=" . $row['cat_id'] ."'>" . $row	['cat'] ."</a> - Posted on <span class='datetime'>" . date("D jS F Y g.iA", strtotime($row	['dateposted'])) ."</span>";

        if(!$session->getLoggedInStatus()){
            header("Location: index1.php");
        }
	
	echo "</p>";

	echo "<p id='entrybody'>";
	echo nl2br($row['body']);
	echo "</p>";
	
	
	echo "<div id='comments'>";
	
	
	$commentObj = Comment::getComments("SELECT * FROM comments WHERE blog_id='$validentry' ORDER BY dateposted DESC");
		if($comment == false) {
			echo "<p>No Comments.</p>";
		} else {
			foreach($commentObj as $comment) {
				echo "<a name='comment" . $comment->getId() . "'></a>\n";
				echo "<p class='commenthead'>Comment by " . $comment->getName() . " on " . date("D jS F Y g.iA",strtotime($comment->getDatePosted())) . "</p>\n";
				echo "<p class='commentbody'>". $comment->getComment()."</p>\n";
	
		}
	}
	echo "</div>\n";
	
?>
<div id='addcomment'>
<h3>Leave a comment</h3>

<form action="<?php echo $_SERVER['SCRIPT_NAME']."?id=".$validentry; ?>" method="post" >
<table>
<tr>
	<td>Your name</td>
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

require_once("footer.php");

?>
