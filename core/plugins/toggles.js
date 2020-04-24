//getting all elements with variable toggle
var toggle = document.getElementsByClassName("toggle");

function getAllElementsWithAttribute(attribute, attribute_value) {
  var matchingElements = [];
  var allElements = document.getElementsByTagName('*');
  for (var i = 0, n = allElements.length; i < n; i++) {
    if (i > 20) {
      break;
    }
    if (allElements[i].getAttribute(attribute) === attribute_value) {
      matchingElements.push(allElements[i]);
    }
  }
  return matchingElements;
}

function body_freeze(toggle) {
  var body = document.getElementsByTagName('body')[0];
  var body_hide_col = getAllElementsWithAttribute('body-hide', '');
  var matchingElements = [];
  for (var i = 0; i < body_hide_col.length; i++) {
    if (body_hide_col[i].getAttribute('checked') !== null) {
      matchingElements.push(body_hide_col[i]);
    }
  }
  if (matchingElements.length > 0) {
    body.setAttribute("checked", "");
  } else {
    body.removeAttribute("checked");
  }
}

function toggleit(ele){
  if (ele.target===undefined) {
    var this_ele=ele;
  }else {
    var this_ele=this;
    event.preventDefault();
  }

  var checked = this_ele.getAttribute("checked"); //check if item is active
  var data_group = this_ele.getAttribute("data-group"); //get group of item
  var data_target = this_ele.getAttribute("data-target"); //get id of relative element to be mark active
  var body_hide = this_ele.getAttribute("body-hide"); //check if it's needed to freeze body
  var data_group_class = this_ele.getAttribute("data-group-class");
  var dropdwnNoTarget = this_ele.getAttribute("data-dropdwn");

  //toggling
  function toggle_alone(toggle_element) {
    var checked = toggle_element.getAttribute("checked"); //check if item is active
    if (checked !== null) {
      toggle_element.removeAttribute("checked"); //mark deactivate if it's already active
    } else if (checked === null) {
      toggle_element.setAttribute("checked", ""); //mark active if it's deactivate
    }
  }
  //activating target
  function activate_target(toggle_element) {
    var data_target_e = document.getElementById(data_target); //getting element that needs to be manipulate
    checked = toggle_element.getAttribute("checked"); ////update item active status
    var data_target_state = data_target_e.getAttribute("active"); //check if target element is active

    if (data_target_state !== null) { //if targeted element is active
      data_target_e.removeAttribute("active");
    } else { //if targeted element is not active
      data_target_e.setAttribute("active", "");
    }
  }

  //deactivating others
  function deactivate_group(toggle_element) {
    var data_group_arr = data_group.split(',');

    var all_controllsInGrp = document.getElementById(data_group_arr[0]).getElementsByClassName('toggle');
    var all_windowsInGrp = document.getElementById(data_group_arr[1]).getElementsByClassName('toggle_window');

    for (var i = 0; i < all_controllsInGrp.length; i++) {
      all_controllsInGrp[i].removeAttribute('checked');
      all_windowsInGrp[i].removeAttribute('active');
    }
  }

  //deactivating others grouped by classname
  function deactivate_groupByClass(toggle_element) {
    var groupByClass=document.getElementsByClassName(data_group_class);
    for (var i = 0; i < groupByClass.length; i++) {
      groupByClass[i].removeAttribute('active');
    }
  }

  //dropdwn without data-target
  function toggle_dropdown(e){
    var dropdown=e.parentElement;
    var target_drpdwn=dropdown.getElementsByClassName('drop_menu')[0];
    var target_status=target_drpdwn.className;
    if (target_status === 'drop_menu') {
      dropdown.setAttribute('dropdown_active','');
      target_drpdwn.className='drop_menu active'
    }else {
      dropdown.removeAttribute('dropdown_active');
      target_drpdwn.className='drop_menu'
    }
  }

  if (data_group !== null) {
    deactivate_group(this_ele);
  }
  if (data_group_class !== null) {
    deactivate_groupByClass(this_ele);
  }
  if (dropdwnNoTarget !== null) {
    toggle_dropdown(this_ele);
  }
  if (data_target !== null) {
    activate_target(this_ele);
  }

  toggle_alone(this_ele);
  body_freeze(toggle);
};

//deactivation
var deactivate = document.getElementsByClassName("deactivate");
var deactivate_it = function() {
  var deactivate_target = this_ele.getAttribute("deactivate");
  var group_disable = this_ele.getAttribute("group-disable");
  document.getElementById(deactivate_target).removeAttribute("active");
  //disabling the whole firing group
  if (group_disable !== null) {
    var data_group_col = getAllElementsWithAttribute('data-group', group_disable);
    for (var i = 0; i < data_group_col.length; i++) {
      disable_target_state = data_group_col[i].getAttribute("disable-target");
      if (disable_target_state !== null) {
        var disable_target = data_group_col[i].getAttribute("data-target");
        document.getElementById(disable_target).removeAttribute("active");
      }
      data_group_col[i].removeAttribute("checked");
    }
  }
  body_freeze(toggle);
}

for (var i = 0; i < deactivate.length; i++) {
  deactivate[i].addEventListener('click', deactivate_it, false);
}
for (var i = 0; i < toggle.length; i++) {
  toggle[i].addEventListener('click', toggleit, false);
}
