<?php
  if(!isset($_COOKIE['admin'])){
    header("Location: index.php?err=4");
    exit();
  }
?>
