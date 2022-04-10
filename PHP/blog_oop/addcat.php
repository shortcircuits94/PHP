<?php
	require_once ('includes/initalize.php');
	require_once('header.php');
	if(!$session->getLoggedInStatus()){
	    header("Location:"."index1.php");
    }
	if (isset($_POST['submit'])) {
	
		Category::addCategory($_POST['cat']);

		mysqli_query($db,$sql);
		mysqli_close ($db);
		
		header("Location: viewcat.php");
	}
	else{
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" >

<table>
<tr>
	<td>Category</td>
	<td><input type ="text" name="cat" /></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Add Category" /></td>
</tr>
</table>
</form>

<?php
}
require_once('footer.php');
?>