<?php

  include_once('../../../core/config.php');
  include_once('../../../core/classes/users.php');

  $tosend=[];

  $username=$_POST['username'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
    $user_id=add_user($username,$password,$email,$contact);
    print_r(json_encode($user_id));
?>
