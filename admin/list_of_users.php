<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include_once('views/html_head.php'); ?>
  <body>
    <?php include_once('views/sidebar.php'); ?>
    <div id="content" class="active">
      <?php
        include_once('views/users/list_of_users.php');
      ?>
    </div>
    <?php include_once('views/scripts.php'); ?>
    <?php include_once('views/script.php'); ?>
    <script type="text/javascript" src="controllers/users/list_of_users.js"></script>
  </body>
</html>
