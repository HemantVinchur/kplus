<br><br><br>
<div id="filters">
  <div class="container-fluid">
    <div class="row">
      <div class="heading">
        <h3>Create Filter</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="card layer1 tabs">
          <ul class="tabs_control progresstype">
            <span id="tool_tip" class="tool_tip"><b></b></span>
            <div class="pills_container">
              <li id="pr1" class="have_tooltip" active data-tool-tip data-target="tab1">
                <span class="progress"></span>
                define filter
              </li>
              <li id="pr2" class="have_tooltip" data-tool-tip data-target="tab2">
                <span class="progress"></span>
                fill values
              </li>
              <li id="pr3" class="have_tooltip" data-tool-tip data-target="tab3">
                <span class="progress"></span>
                assign category
              </li>
            </div>
          </ul>
          <div class="tabs_collection">
            <div id="tab1" active class="content_window">
              <div class="content_wrapper">
                <form class="card_wrapper" action="controllers/filter.php" method="post">
                  <div class="input_group">
                    <input class="input" type="text" name="label" value="" required>
                    <label for="">filter label</label>
                    <span class="highlight"></span>
                  </div>
                  <br>
                  <div class="input_group">
                    <select class="input" name="type" onchange="filter_type()">
                      <option value="">select a filter type</option>
                      <option value="single">single select</option>
                      <option value="multiple">multiple select</option>
                      <option value="range">range</option>
                    </select>
                    <label for="">filter type</label>
                    <span class="highlight"></span>
                  </div>
                  <br>
                  <div class="input_group">
                    <button class="button lazy" onclick="change_button_state(this,'loading',true)" type="submit" name="button">save</button>
                  </div>
                </form>
              </div>
            </div>
            <div id="tab2" class="content_window">
            </div>
            <div id="tab3" class="content_window">
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="gutter">
        </div>
      </div>
    </div>
  </div>
</div>
