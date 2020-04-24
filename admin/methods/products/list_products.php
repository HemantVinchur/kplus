<?php
  include_once('../../../core/config.php');
  include_once('../../../core/classes/login.php');
  include_once('../../../core/classes/users.php');

  $tosend=[];

  $login_token=$_POST['login_token'];
  $check_user=check_login($login_token);

  if ($check_user) {
    $tosend['logged_in']='true';
    $tosend['list_products']=list_products();
  }else {
    $tosend['logged_in']='false';
  }

  print_r(json_encode($tosend));
?>
