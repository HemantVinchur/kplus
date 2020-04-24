<?php

  include_once('../../../core/config.php');
  include_once('../../../core/classes/categories.php');

  $tosend=[];

  echo $title=$_POST['title'];
  echo $parent_category=$_POST['parent_category'];
  echo $category_icon=$_POST['category_icon'];
    $user_id=add_category($title,$parent_category);
    print_r(json_encode($user_id));
?>
