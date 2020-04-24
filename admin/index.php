<?php
  if (!isset($_SESSION)){
    session_start();
  }
  if (isset($_SESSION['userId'])){
    if ($_SESSION['userId']!==''){
      //continue
      header('location: dashboard.php');
    }
    else{
      header('location: login.php?msg=nli');
      exit;
    }
  }else{
    header('location: login.php?msg=nli');
    exit;
  }
?>
