<?php

  function get_categories($parent_id=0,$level=0){
    global $link;

    $menu='';
    $pre='';
    for ($x = 0; $x < $level; $x++) {
          $pre.="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    }

    $sql="SELECT * from terms where type='category' and parent='$parent_id'";
    $result=mysqli_query($link,$sql);

    while ($row=mysqli_fetch_assoc($result)) {
      $menu.='<option data-slug-name="'.$row['slug_name'].'" value="'.$row['id'].'">'.$pre.$row['name'];
      $menu.=get_categories($row['id'],$level + 1);
      $menu.='</option>';
    }

    return $menu;
  }

  function add_category($name,$parent,$icon='',$type='category'){
    $toreturn=[];
    global $link;
    $dtime=dtime_now();

    $sql="INSERT INTO terms
          (name, parent, type, icon, dtime)
          VALUES
          ('$name', '$parent', '$type', '$icon', '$dtime')";

    if (mysqli_query($link,$sql)) {
      $return_id=mysqli_insert_id($link);
      $toreturn['return_id']=$return_id;
    }else {
      $toreturn['msg']='there is some problem';
    }

    return $toreturn;
  }

  function get_categories_ids($parent_id=0){
    global $link;

    $menu='';

    $sql="SELECT * from terms where type='category' and parent='$parent_id'";
    $result=mysqli_query($link,$sql);

    while ($row=mysqli_fetch_assoc($result)) {
      $menu.=$row['id'];
      $menu.=',';
      $menu.=get_categories_ids($row['id']);
    }

    return $menu;
  }

  function update_category($id,$dataArray,$path=UPLOADS_PATH){
    global $link;
    $toreturn=[];

    $sql='UPDATE terms SET';
    $i=0;
    foreach ($dataArray as $key => $value) {

      //deleting old icon
      if ($key==='icon' AND $value!=='') {
        $sql_select="SELECT icon from terms where id='$id'";
        $result_select=mysqli_query($link,$sql_select);
        $row_select=mysqli_fetch_assoc($result_select);

        $already_icon=$row_select['icon'];
        if (file_exists($path.$already_icon)) {
          unlink($path.$already_icon);
        }
      }

      if ($i===0) {
        $sql.=" $key='$value'";
      }else {
        $sql.=", $key='$value'";
      }
      $i++;
    }

    $sql.=" WHERE id='$id'";

    if (mysqli_query($link,$sql)) {
      return true;
    }else {
      return false;
    }

  }

  function get_category_by_id($ids){
    global $link;
    $tosend=[];

    $sql="SELECT * from terms where ";

    if (is_array ($ids)) {
      for ($i=0; $i < count($ids); $i++) {
        $id=$ids[$i];

        if ($i===0) {
          $sql.="id='$id'";
        }else {
          $sql.=" or id='$id'";
        }
      }

      $result=mysqli_query($link,$sql);

      $rowArr=[];
      while ($row=mysqli_fetch_assoc($result)) {
        array_push($rowArr,$row);
      }

      return $rowArr;

    }else {
      $sql.="id='$ids'";
      $result=mysqli_query($link,$sql);
      return mysqli_fetch_assoc($result);
    }

  }

?>
