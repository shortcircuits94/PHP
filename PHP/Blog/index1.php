<?php
	require_once('header.php');
	
	
	$sql="SELECT entries.*, categories.cat FROM entries,categories WHERE entries.cat_id=categories.id ORDER BY dateposted DESC LIMIT 1;";
	$result=mysqli_query ($db, $sql);
	$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
	echo "<h2 id='title'><a href='viewentry.php?id=".$row['id']."'>".$row['subject']."</a></h2><br />";
	echo "<p id='byline'>In <a href='viewcat.php?id=".$row['cat_id']."'>".$row['cat']."</a> - Posted on <span class='datetime'>". date("D jS F Y g:iA" , strtotime($row['dateposted']))."</span>";
	
	if(isset($_SESSION['USERNAME'])==TRUE){
		echo "<span id='edit'><a href='updateentry.php?id=".$row['id']."'>edit</a></span>";
	}
	echo "</p>";
	
	echo "<p id='entrybody'>";
	echo nl2br($row['body']);
	echo "</p>";
	
	
	
	echo "<p id='comments'>";
	$commsql="SELECT name FROM comments WHERE blog_id=".$row['id']." ORDER BY dateposted;";
	$commresult=mysqli_query($db,$commsql);
	$numrows_comm=mysqli_num_rows($commresult);	
	if($numrows_comm==0){
		echo "No comments.";
	}
	else{
		echo "(<strong>".$numrows_comm."</strong>)comments: ";
		$i=1;
		while($commrow=mysqli_fetch_array ($commresult, MYSQLI_ASSOC)){
			echo "<a href='viewentry.php?id=".$row['id']."#comment".$i."'>".$commrow['name']." </a>";
			$i++;
		}
	}
	echo "</p>";
	
	$prevsql="SELECT entries.*, categories.cat FROM entries, categories WHERE entries.cat_id=categories.id ORDER BY dateposted DESC LIMIT 1,5;";
	$prevresult=mysqli_query($db,$prevsql);
	$numrows_prev=mysqli_num_rows($prevresult);
	echo "<div id='prev'>";
	if($numrows_prev==0){
		echo "<p>No previous entries.</p>";
	}
	else{
		echo "<ul>";
		while($prevrow=mysqli_fetch_array($prevresult, MYSQLI_ASSOC)){
			echo "<li><a href='viewentry.php?id=".$prevrow['id']."'>".$prevrow['subject']."</a></li>";
		}
		echo "</ul>";
	}
	echo "</div>";
	
	
	
	
	
	
	
	require_once('footer.php');
?>