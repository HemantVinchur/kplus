<?php
  require_once('config.php');
  if (LANGUAGE==='english'){
    // register page
      //errors
      define("err_pass_shld_same","password and confirm password must be same");
      define("err_contact_in_use","contact number already in use");
      define("err_email_in_use","email ID already in use");
      define("fields_empty","field marked * cannot be empty");
      define("invalid_email","please enter a valid email ID");
      define("invalid_phone","please enter a valid mobile number");
      define("cant_process_req","sorry! we are unable to process your request right now, for help call customer care.");
      define("password_invalid","password criteria doesn't match, please retry.");
      define("went_wrong","something went wrong.");
      define("required","is required");
      define("max_limit","maximum size allowed is");
      define("min_limit","minimum size required is");
      define("alphabets_only","only alphabets are allowed");
      define("numbers_only","only numbers are allowed");

      //messages
      define("msg_waiting_approval", "your request is submitted, after approval from admin you will recieve a confirmation email.");
  }
?>
