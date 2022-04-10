<?php
require_once('header.php');
require_once('config.php');

if (!isset($_SESSION['USERNAME'])) {
	header("Location:"."index1.php");
}

$error=0;
if (isset($_GET['id'])) {
	if (!is_numeric($_GET['id'])) {
		$error=1;
	}
	if ($error==1) {
		header("Location: " . "index1.php");
	} else {
		$validentry = $_GET['id'];
		}
	} else {
		$validentry = 0;
}

if (isset($_POST['submit'])) {
	$sql = "UPDATE entries SET cat_id=" . $_POST['cat'] . ", subject='" . $_POST['subject'] . "', body='" . $_POST['body'] . "' WHERE id=" . $validentry . ";";
	mysqli_query($db, $sql);
	header("Location: " . "viewentry.php?id=" . $validentry);
} else {
	$fillsql = "SELECT * FROM entries WHERE id=" . $validentry . ";";
	$fillres = mysqli_query($db, $fillsql);
	$fillrow = mysqli_fetch_array($fillres, MYSQLI_ASSOC);
?>

<h1>Update entry</h1>
<form action="<?php echo $SCRIPT_NAME . "?id=". $validentry;?>" method="post">
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
	<td><input type="text" name="subject" value="<?php echo$fillrow['subject']; ?>">
	</td>
</tr>
<tr>
	<td>Body</td>
	<td><textarea name="body" rows="10" cols="50"><?php echo$fillrow['body']; ?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Update Entry!"></td>
</tr>
</table>
</form>

<?php
}
require("footer.php");
?>