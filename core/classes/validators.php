<?php
  require_once('msg_library.php');
  //function to find valid regex_instruct
  function regex_instruct($key){
    $toreturn=[];
    switch ($key[0]) {
      case "email":
        $regex='/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        $instruct=invalid_email;
        break;

      case "required";
        $regex= '/.*\S.*/';
        $instruct=required;
        break;

      case "max";
        $regex= '/^.{0,'.$key[1].'}$/u';
        $instruct=max_limit.' '.$key[1];
        break;

      case "alphabets_only":
        $regex= '/^[a-zA-Z]+$/';
        $instruct=alphabets_only;
        break;

      case "numbers_only":
        $regex= '/^[0-9]+$/';
        $instruct=numbers_only;
        break;

      case "min":
        $regex= '/^.{'.$key[1].',}$/u';
        $instruct=min_limit.' '.$key[1];
        break;

      case "password":
        $regex= '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,25}$/';
        $instruct=password_invalid;
        break;

      default:
        $regex='/_not_defined/';
        $instruct=went_wrong;
    }

    array_push($toreturn,$regex,$instruct);
    return $toreturn;
  }

  //function validate string
  function validate_input($string,$key){
    $key_arr=explode(',',$key);
    $err_arr=[];

    for ($i=0; $i < count($key_arr); $i++) {
      $key_val_arr=explode(':',$key_arr[$i]);
      $reg_to_match=regex_instruct($key_val_arr)[0];

      if (preg_match("$reg_to_match",$string)) {
        $is_valid=1;
      }else {
        $is_valid=0;
        array_push($err_arr,regex_instruct($key_val_arr)[1]);
      }

    }

    return $err_arr;
  }

  function validate_input_arr($input_arr){
    $toreturn=[];

    foreach ($input_arr as $key => $value) {

      $this_input=validate_input($value[0],$value[1]);

      if (count($this_input) > 0) {
        $toreturn+=[$key=>$this_input];
      }
    }

    return $toreturn;
  }
?>
