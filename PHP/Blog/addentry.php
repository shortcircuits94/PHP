<?php
require_once('header.php');
require_once('config.php');

if (!isset($_SESSION['USERNAME'])) {
	header("Location:"."index1.php");
}

if (isset($_POST['submit'])) {
$sql = "INSERT INTO entries (cat_id,dateposted,subject,body)  VALUES(" .$_POST['cat'] . ", NOW(), '". $_POST['subject'] . "', '". $_POST['body'] . "');";
mysqli_query($db, $sql)  or  die('Database query failed.');
mysqli_close($db);
header("Location: " . "index1.php");
} else {
?>
<h1>Add New Entry</h1>
<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post" >
	<table>
		<tr>
			<td>Category</td>
			<td>
				<select name="cat">
				<?php
					$catsql = "SELECT * FROM categories;";
					$catres=mysqli_query($db,$catsql) or die ('Database query failed');
					while($catrow=mysqli_fetch_array($catres,MYSQLI_ASSOC)){
						echo "<option value='".$catrow['id']."'>".$catrow['cat']." </option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Subject</td>
			<td><input type="text" name="subject"></td>
		</tr>
		<tr>
			<td>Body</td>
			<td><textarea name="body" rows="10" cols="50"></textarea></td>
		</tr>
		<tr>
			<td><td>
			<td><input type="submit" name="submit" value="Post Entry"></td>
		</tr>
	</table>
</form>

<?php
}
require_once("footer.php");
?>