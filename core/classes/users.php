<?php
        function add_post($title,$description,$meta_title,$meta_desc,$category){
            global $link;
            $tosend=[];
            $sql="INSERT INTO posts (title, description, category_id) VALUES ('$title','$description','$category')";
            $result=mysqli_query($link,$sql);
            $post_id=mysqli_insert_id($link);
            $sql_meta="INSERT INTO meta_data (meta_title, meta_description,post_id) VALUES ('$meta_title','$meta_desc','$post_id')";
            $result_meta=mysqli_query($link,$sql_meta);      
            if ($result) {
                $tosend=['msg'=>'data inserted'];
  
              }
              else{
                $tosend=['msg'=>'data not inserted'];
              }
         
      return $tosend;
          }
  
          function add_product($title,$model_name,$description,$stock,$meta_title,$meta_desc,$category){
            global $link;
            $tosend=[];
            if (!empty($title)&&!empty($model_name)){
              $sql="INSERT INTO products (product_name, model_name, description, in_stock,category_id) VALUES ('$title','$model_name','$description','$stock','$category')";
              $result=mysqli_query($link,$sql);
              $product_id=mysqli_insert_id($link);
              $sql_meta="INSERT INTO meta_data (meta_title, meta_description,product_id) VALUES ('$meta_title','$meta_desc','$product_id')";
              $result_meta=mysqli_query($link,$sql_meta);
          }else{
            $tosend=['msg'=>'empty'];
        }
      return $tosend;
          }
          function list_posts(){
            global $link;
    
            $sql="SELECT * from posts";
            $result=mysqli_query($link,$sql);
    
            $row_arr=[];
            while ($row=mysqli_fetch_assoc($result)) {
              array_push($row_arr,$row);
            }
            return $row_arr;
          }
          function list_products(){
            global $link;
    
            $sql="SELECT * from products";
            $result=mysqli_query($link,$sql);
    
            $row_arr=[];
            while ($row=mysqli_fetch_assoc($result)) {
              array_push($row_arr,$row);
            }
            return $row_arr;
          }
    
    

          function add_user($username,$password,$email,$contact){
            global $link;
            $tosend=[];
            if (!empty($username)&&!empty($password)&&!empty($email)&&!empty($contact)){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
            $sql="INSERT INTO users (nice_name, password, number, email) VALUES ('$username','$hashed_password','$contact','$email')";
        
            $result=mysqli_query($link,$sql);
            if ($result) {
        
              return mysqli_insert_id($link);
            }else {
              return false;
            }
          }else{
            $tosend=['msg'=>'empty'];
            return $tosend;
          }
          }

          function list_of_users(){
            global $link;
    
            $sql="SELECT * from users";
            $result=mysqli_query($link,$sql);
    
            $row_arr=[];
            while ($row=mysqli_fetch_assoc($result)) {
              array_push($row_arr,$row);
            }
            return $row_arr;
          }
    
?>