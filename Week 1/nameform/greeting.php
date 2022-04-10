<html>
<head>
<title>Greetings, Rebecca!</title>

	<meta charset="UTF-8" />
	<title>Customized Greeting  – by Rebecca Scott</title>
	<link href="nameform.css" rel="stylesheet" type="text/css" />
</head>



<form action="nameform.htm">
<h2>This page receives and handles the data from nameform.htm</h2>

<?php 
	$name = $_POST['firstname'];
   
   echo "<h2>Greetings $name! </h2> 
   $name,we are truly delighted that you've decided to learn PHP!";
    
?>



<footer>
<br>
&copy; 2014 <a href="www.php.net">The PHP Web Site</a>
</footer>
</form>

<?php 
	echo "Programmed by: \"Rebecca Scott\"";
?>