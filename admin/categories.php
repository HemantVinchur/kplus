<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include_once('views/html_head.php'); ?>
  <body>
    <?php include_once('views/sidebar.php'); ?>
    <div id="content" class="active">
      <?php
        include_once('views/header.php');
      ?>
      <br><br><br>
      <div class="container-fluid">
        <div class="row">
          <div class="heading">
            <h3>categories</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-5 col-lg-4">
            <?php include_once('views/categories/add_categories.php'); ?>
          </div>
        </div>
      </div>
    </div>
    <?php include_once('views/scripts.php'); ?>
    <?php include_once('views/script.php'); ?>
    <script src="../core/plugins/validators.js" type="text/javascript"></script>
    <script type="text/javascript" src="controllers/categories/add_category.js"></script>
  </body>
</html>
