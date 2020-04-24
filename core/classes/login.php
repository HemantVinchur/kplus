<?php
    // check login
    // check user exist or not
    // create user token
    // login
    // logout
    // generate
    // send otp
    // validate otp

  function check_login($token){
    global $link;

    $sql="SELECT user_id FROM users_token where token='$token'";
    $result=mysqli_query($link,$sql);

    if ($result->num_rows) {
      $row=mysqli_fetch_assoc($result);
      $user_id=$row['user_id'];

      return $user_id;
    }else {
      return false;
    }
  }

  function check_phone($phone_number){
    global $link;
    $tosend=[];

    if (strlen((string)$phone_number) == 10) {

      $sql="SELECT id,nice_name FROM users where number='$phone_number'";
      $result=mysqli_query($link,$sql);

      if ($result->num_rows !== 0) {

        $row=mysqli_fetch_assoc($result);
        $tosend=['msg'=>'user_exist','phone'=>$phone_number];

      }else {
        $tosend=['msg'=>'user_not_exist'];
      }
    }else {
      $tosend=['msg'=>'not_valid'];
    }

    return $tosend;
  }

  //user tokens
  function crypto_rand_secure($min, $max){
      $range = $max - $min;
      if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
      do {
          $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
          $rnd = $rnd & $filter; // discard irrelevant bits
      } while ($rnd > $range);

    return $min + $rnd;
  }

  function getToken($length,$onlyDigit=false){
      $token = "";
      $codeAlphabet = "0123456789";
      if ($onlyDigit==false) {
        $codeAlphabet.= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
      }

      $max = strlen($codeAlphabet); // edited

      for ($i=0; $i < $length; $i++) {
          $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
      }

    return $token;
  }

  function create_user_token($user_id){
      global $link;

      $token=getToken(50);


      $sql="SELECT id from users_token where token='$token'";
      $result=mysqli_query($link,$sql);

      if ($result->num_rows !==0 ) {
        create_user_token($user_id);
      }else {
        $sql="INSERT into users_token (token,user_id) values ('$token','$user_id')";
        mysqli_query($link,$sql);

        return $token;
      }
    }
  // user tokens end

  //logging in
  function login($username,$password){
    global $link;
    $tosend=[];
    if (!empty($username)){

      $sql="SELECT * from users where number='$username'";
      $result=mysqli_query($link,$sql);

        if (!empty($row=mysqli_fetch_assoc($result))){

            if (password_verify($password, $row['password'])){


              $token=create_user_token($row['id']);
              $tosend=['msg'=>'logged_in','token'=>$token];

            }
            else{
              $tosend=['msg'=>'pnm'];
            }
        }
        else{
          $tosend=['msg'=>'unm'];
        }
    }else{
      $tosend=['msg'=>'number_empty'];
    }

    return $tosend;
  }

  function send_otp($phone_number){
      $tosend=[];

      if ($phone_number!=='') {
        $generated_otp=getToken(5,true);

        if (!isset($_SESSION)) {
          session_start();
        }else {
          session_destroy();
          session_start();
        }
        $_SESSION['OTP']=$generated_otp;
        $_SESSION['phone_number']=$phone_number;

        $tosend=['phone'=>$phone_number,'otp'=>$generated_otp];

      }else {
        $tosend=['error'=>'number_empty'];
      }

    return $tosend;
  }

  function validate_otp($entered_otp,$entered_phone){
    global $link;
    $tosend=[];

    if ($entered_otp!=='' and strlen((string)$entered_otp) == 5) {

      if (!isset($_SESSION)) {
        session_start();
      }

      if ($_SESSION['OTP']==$entered_otp) {

        if ($_SESSION['phone_number'] == $entered_phone) {

          $sql="SELECT id from users where number='$entered_phone'";
          $result=mysqli_query($link,$sql);

          if (!empty($row=mysqli_fetch_assoc($result))) {

            //create token
            $token=create_user_token($row['id']);
            $tosend=['msg'=>'logged_in','token'=>$token];
          }else {

            //register
            $sql="INSERT INTO users (nice_name, number, permission) VALUES ('$entered_phone', '$entered_phone', 'user')";
            mysqli_query($link,$sql);

            $registered_user_id=mysqli_insert_id($link);

            $token=create_user_token($registered_user_id);
            $tosend=['msg'=>'logged_in','token'=>$token];

          }
        }else {
          $tosend=['error'=>'not_valid'];
        }

      }else {
        $tosend=['error'=>'not_valid'];
      }
    }else {
      $tosend=['error'=>'not_valid'];
    }

    return $tosend;
  }

  function logout($token){
    global $link;

    $sql="DELETE from users_token where token='$token'";
    mysqli_query($link,$sql);

    return false;
  }

?>
