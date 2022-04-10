<?php

  include_once('connectionvars.php');

  $dbc = new PDO('mysql:host='.$hostname.';dbname='.$database, 
     $username, $password);
  

  
  $sql = 'delete from planets where name = :planet';

  $stmt = $dbc->prepare($sql);

  $stmt->bindValue(':planet','Vulcan');

  $result = $stmt->execute();
  

 
  if($result==TRUE){
    echo 'this was successful';
  }
  else {
    var_dump($dbc->errorInfo());
  }
  
?>
