function toggle_sidebar(){
  var sidebar=document.getElementById('sidebar');
  var content=document.getElementById('content');
  var sidebar_status=sidebar.className;
  if (sidebar_status=='active') {
    sidebar.className='';
    content.className='';
  }else {
    sidebar.className='active';
    content.className='active';
  }
}

var header=document.getElementById('header');

if (header!==null) {
  var scrollPos = 0;
  // adding scroll event
  window.addEventListener('scroll', function(){
    // detects new state and compares it with the new one
    if ((document.body.getBoundingClientRect()).top > scrollPos)
  		document.getElementById('header').setAttribute('fixed', '');
  	else
  		document.getElementById('header').removeAttribute('fixed');
  	// saves the new position for iteration.
  	scrollPos = (document.body.getBoundingClientRect()).top;
  });
}

var main_loading=document.getElementById('main_loading');
function do_logout(){
  ajax_req(
            'logout=true',
            'controllers/login/logout.php',
            function callback(e){
              if (e.responseText==='logged_out') {
                window.location='login.php?msg=logged_out';
              }
            },
            main_loading
          );
}
