<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include_once('views/html_head.php'); ?>
  <body>
    <?php include_once('views/sidebar.php'); ?>
    <div id="content" class="active">
      <?php
        include_once('views/header.php');
        include_once('views/media/add_media.php');
      ?>
    </div>
    <?php include_once('views/scripts.php'); ?>
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'description' );
    </script>
  </body>
</html>
