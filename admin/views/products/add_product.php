<br><br><br>
<form class="" method="post" enctype="multipart/form-data">
<div id="add_product">
  <div class="container-fluid">
    <div class="row">
      <div class="heading">
        <h3>Add Product</h3>
        <p>add product details</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
          <div class="card layer1 padded" style="padding:10px;">
            <div class="small_head">
              <h3>product information</h3>
            </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="input_group">
                      <input class="input" type="text" name="name" value="" required>
                      <label for="">product name</label>
                      <span class="highlight"></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="input_group">
                      <input class="input" type="text" name="model_name" value="" required>
                      <label for="">model name</label>
                      <span class="highlight"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input_group">
                    <label class="static" for="">Full Description</label><br>
                    <textarea class="input" name="description" rows="8"></textarea>
                    <span class="highlight"></span>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="col-sm-4">
        <div class="gutter">
          <div class="card padded layer1">
            <div class="small_head">
              <h3>publish</h3>
            </div>
            <div class="buttons_pane" style="padding:10px">
              <button onclick="add_product(this)" class="button primary" type="submit">publish</button>
            </div>
          </div>
          <br>
          
          <div class="card padded layer1">
            <div class="small_head">
              <h3>general information</h3>
            </div>
            <div class="input_group">
              <select class="input" name="category">
              <?php echo get_categories(); ?>
              </select>
              <label for="">select category</label>
            </div>
            <div class="input_group">
              <label class="static">choose your image file</label><br>
              <input type="file" name="image" value=""><br>
            </div>

            <div class="input_group">
              <input class="input" type="numbers" name="stock" value="" required>
              <label for="">in stock</label>
              <span class="highlight"></span>
            </div>

            <div class="small_head">
              <h3>seo information</h3>
            </div>
            <hr class="light">
            <div class="input_group">
              <input class="input" type="text" name="meta_title" value="" required>
              <label for="">meta title</label>
              <span class="highlight"></span>
            </div>
            <div class="input_group">
              <input class="input" type="text" name="meta_desc" value="" required>
              <label for="">meta Description</label>
              <span class="highlight"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
<br><br>
