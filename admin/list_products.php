<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include_once('views/html_head.php'); ?>
  <body>
    <?php include_once('views/sidebar.php'); ?>
    <div id="content" class="active">
      <?php
        include_once('views/header.php');
        include_once('views/products/list_products.php');
      ?>
    </div>
    <?php include_once('views/scripts.php'); ?>
    <?php include_once('views/script.php'); ?>
    <script type="text/javascript" src="controllers/products/list_products.js"></script>
  </body>
</html>
