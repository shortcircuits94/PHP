<?php
require_once('header.php');
require_once('config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sql = "SELECT * FROM logins WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "';";

$result=mysqli_query($db,$sql);
$numrows=mysqli_num_rows($result);

if ($numrows==1){
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$_SESSION['USERNAME']=$row['username'];
	$_SESSION['USERID']=$row['id'];
	header("Location:"."index1.php");
}
else{
	header("Location:"."login.php?error=1");
	}
}
else{
	if (isset($_GET['error'])){
		echo "Incorrect login, please try  again!";
		}
	}
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="post">
	<table id='login'>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Login!"></td>
		</tr>
	</table>
</form>
<?php
require_once("footer.php");
?>