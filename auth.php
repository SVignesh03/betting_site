<?php
  if(!isset($_COOKIE['user'])){
    header("Location: index.php?err=4");
    exit();
  }
?>
