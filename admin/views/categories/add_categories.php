<div class="card layer1 padded">
  <form class="instruct_right" method="post">
  <div id="add_category">
    <div class="input_group">
      <input class="input" type="text" name="title" value="" required validate_for="required">
      <label for="">name</label>
      <span class="highlight"></span>
    </div>
    <div class="input_group">
      <select class="input" name="parent_category">
      <?php
                  include_once('../core/config.php');
                  $sql="SELECT * from terms where parent=0";
                  $result=mysqli_query($link,$sql);
                  while ($row=mysqli_fetch_assoc($result)) {
                ?>
                <option value=""><?php echo $row['name']; ?></option>
                <?php } ?>
      </select>
      <label for="">parent category</label>
      <span class="highlight"></span>
    </div>
    <div class="input_group">
      <label class="static" for="">choose a file</label><br>
      <input class="input" type="file" name="category_icon" value="">
      <span class="highlight"></span>
    </div>
    <div class="input_group">
      <button class="button lazy" type="button" onclick="add_category_form(this)">save</button>
    </div>
  </div>
  </form>
</div>
