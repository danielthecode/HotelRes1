<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'hotel';
$con = mysqli_connect($server,$user,$password,$db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
