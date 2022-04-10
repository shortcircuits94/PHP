<?php

  include_once('connectionvars.php');

  $dbc = new PDO('mysql:host='.$hostname.';dbname='.$database, 
     $username, $password);
  

  
  $sql = 'select * from planets where name = :planet';

  $stmt = $dbc->prepare($sql);

  $array = array (
    'planet'=>'Pluto'
  );

  $result = $stmt->execute($array);
  

 
  if($result==TRUE){
    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
  }
  else {
    var_dump($dbc->errorInfo());
  }
  
?>
