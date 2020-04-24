<?php

  include_once('../../../core/config.php');
  include_once('../../../core/classes/users.php');

  $tosend=[];

  $title=$_POST['name'];
  $model_name=$_POST['model_name'];
  $description=$_POST['data'];
  $stock=$_POST['stock'];
  $meta_title=$_POST['meta_title'];
  $meta_desc=$_POST['meta_desc'];
  $category=$_POST['category'];

  $user_id=add_product($title,$model_name,$description,$stock,$meta_title,$meta_desc,$category);

  print_r(json_encode($user_id));

?>
