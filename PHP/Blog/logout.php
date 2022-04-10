<?php

session_start();
session_destroy(); 

require_once("config.php");

header("Location:" . "index1.php");

?>