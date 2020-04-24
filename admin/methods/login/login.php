<?php
  include_once('../../../core/config.php');
  include_once('../../../core/classes/login.php');

  $tosend=[];

  $username=$_POST['username'];
  $password=$_POST['password'];

  $user_id=login($username,$password,'token');

  print_r(json_encode($user_id));

?>
