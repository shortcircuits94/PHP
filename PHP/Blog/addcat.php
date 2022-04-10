<?php

require("header.php");
require("config.php");


if (!isset($_SESSION['USERNAME'])) {
	header("Location: " . $config_basedir);
}

if($_POST['submit']) {
$sql = "INSERT INTO categories (cat) VALUES('" . $_POST['cat'] . "');";
mysqli_query($db,$sql);
mysqli_close($db);

header("Location: " . $config_basedir . "viewcat.php");
}

else {

?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post" >
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
require_once("footer.php");
?>