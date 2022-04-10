<?php
    require_once ('includes/initalize.php');
	require_once('header.php');

		
	
	if (isset($_POST['submit'])) {  
		$userObj = User::authenticateUser($_POST['username'], $_POST['password']);
		if($userObj) {
		    $session->loginUser($userObj);
		    header("Location: index1.php");
        }
        else {
		    header("Location: login.php?error=1");
        }
				
	}
	else{
		if (isset($_GET['error'])){
			echo "Incorrect login, please try  again!";	
			
		}
	}
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
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
