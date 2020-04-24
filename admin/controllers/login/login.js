function do_login(ele) {
    var form = form_inputs('admin_login_form');
    ajax_req(
        'POST',
        'methods/login/login.php',
        form,
        function(e) {
            var result = JSON.parse(e.responseText);

            switch (result.msg) {
                case 'unm':
                    show_notification({ 'msg': 'user not matched' });
                    break;

                case 'pnm':
                    show_notification({ 'msg': 'password not matched' });

                case 'logged_in':
                    show_notification({ 'msg': 'successfully logged in' });
                    localStorage.setItem('login_token', result.token);
                    window.location = "dashboard.php";

                    break;

                default:

            }

            change_button_state(ele, 'done', true);
        },
        ele
    );
}