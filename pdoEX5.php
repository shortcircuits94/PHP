<?php

  include_once('connectionvars.php');
  
  $dbc = new PDO('mysql:host='.$hostname.
    ';dbname='.$database,$username,$password);

	
  $sql = 'select * from planets where distanceuom=:duom';
  
  $stmt = $dbc->prepare($sql);
  
  $arr = array( 
    'duom'=>'KM'
  );
  
  $result = $stmt->execute($arr);
  
  if($result){
	var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
  }
	
?>