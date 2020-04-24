<?php

  include_once('../../../core/config.php');
  include_once('../../../core/classes/users.php');

  $tosend=[];

  $title=$_POST['name'];
  $description=$_POST['data'];
  $meta_title=$_POST['meta_title'];
  $meta_desc=$_POST['meta_desc'];
  $category=$_POST['category'];
    $user_id=add_post($title,$description,$meta_title,$meta_desc,$category);
    print_r(json_encode($user_id));
?>
