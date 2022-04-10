<?php

  include_once('connectionvars.php');
  
  $dbc = new PDO('mysql:host='.$hostname.
    ';dbname='.$database,$username,$password);
	
  $name=$_GET['name'];
  $sql = "select * from planets where name='$name'";
  
  echo $sql;
  
  $result = $dbc->query($sql);
  
 
  var_dump($result->fetchAll(PDO::FETCH_ASSOC));
	
?>