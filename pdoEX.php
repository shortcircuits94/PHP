<?php

  include_once('connectionvars.php');

  $dbc = new PDO('mysql:host='.$hostname.';dbname='.$database, 
     $username, $password);
  

  
  $sql = 'select * from planets';

  $result = $dbc->query($sql);

  //echo $result->rowCount(); 

  $numRows = $result->rowCount();

  /*for($i=0;$i<$numRows ;$i++){
    var_dump($result->fetch(PDO::FETCH_ASSOC));
  }*/ 
  
  //var_dump($result->fetch(PDO::FETCH_ASSOC));
  
  //var_dump($result->fetch(PDO::FETCH_ASSOC));

  var_dump($result->fetchAll(PDO::FETCH_ASSOC));
?>
