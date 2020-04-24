<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include_once('views/html_head.php'); ?>
  <body>
    <?php include_once('views/sidebar.php'); ?>
    <div id="content" class="active">
      <?php
        include_once('views/header.php');
        include_once('views/filters/add_filters.php');
      ?>
    </div>
    <?php include_once('views/scripts.php'); ?>
    <script type="text/javascript" src="../core/plugins/tabs.js"></script>
  </body>
</html>
