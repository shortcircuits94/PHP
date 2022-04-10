<?php
require_once ("includes/initialize.php");
require_once('header.php');
$error=0;
		if(isset($_GET['id'])){
			if(is_numeric($_GET['id'])==FALSE){
				$error=1;
			}
			if($error==1){
				header("Location: viewcat.php");
			}
			else{
				$validcat=$_GET['id'];
			}
		}
		else {
				$validcat=0;
		}
				$sql= "SELECT * FROM categories";
				$result = mysqli_query($db,$sql);

					
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	if($validcat == $row['id']) {
		echo "<span style='font-weight: bold'>".$row['cat']."</span><br/>";
		$entriessql="SELECT * FROM entries WHERE cat_id=" . $validcat . " 
                     ORDER BY dateposted DESC;";
		$entriesres=mysqli_query($db, $entriessql);
		$numrows_entries = mysqli_num_rows($entriesres);
	
		echo "<ul>";
		if ($numrows_entries==0) {
			echo "<li>No entries found in this category.</li>";
			} else {
			     while ($entriesrow=mysqli_fetch_array($entriesres, MYSQLI_ASSOC)) {
				echo "<li>" . date("D jS F Y g.iA",strtotime($entriesrow['dateposted'])) . " - <a href='viewentry.php?id=" . $entriesrow['id'] . "'>" . $entriesrow['subject'] . "</a></li>";
			     }
		          }
			echo "</ul>";
	     } else {
		           echo "<a href='viewcat.php?id=" . $row['id'] . "'>" . $row['cat'] . "</a><br/>";
	    }
}

require_once("footer.php");
?>   