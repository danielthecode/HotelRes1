<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
else {
  $now = time();

  if($now > $_SESSION['expire']){
    session_destroy();
    header("Location: login.php");
    exit();
  }
}

?>
