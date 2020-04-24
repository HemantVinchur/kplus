<div id="login">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <form id="admin_login_form" class="" action="#" method="post">
          <div class="card padded layer1">
            <div class="card_wrapper">
              <div class="input_group">
                <div class="heading">
                  <h3>Sign in</h3>
                  <p>enter your credentials to enter</p>
                </div>
              </div>
              <br>
              <div class="input_group">
                <input class="input" type="text" name="username" value="" required="" validate_for="required,mobile">
                <label for="">username</label>
                <span class="highlight"></span>
              </div>
              <span class="small_marg"></span>
              <div class="input_group">
                <input class="input" type="password" name="password" value="" required="" validate_for="required,password">
                <label for="">password</label>
                <span class="highlight"></span>
              </div>
              <span class="small_marg"></span>
              <div class="input_group">
                <button class="button lazy" type="button" name="button" onclick="do_login(this)">sign in</button>
              </div>
            </div>
          </div>
          <br>
          <div id="notification_holder">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
