<?php
	require_once ('includes/initalize.php');
	$session->logoutUser();
	header("Location:"."index1.php");
?>
