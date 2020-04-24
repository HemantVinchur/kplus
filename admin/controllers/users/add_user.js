function add_user(ele) {
    var form = form_inputs('add_user_form');
    ajax_req(
        'POST',
        'methods/users/add_user.php',
        form,
        function(e) {
            console.log(e);

            var result = JSON.parse(e.responseText);
            console.log(result);

            switch (result.msg) {
                case 'empty':
                    show_notification({ 'msg': 'Fields cannot be empty.' });
                    break;
                default:

            }

            change_button_state(ele, 'done', true);
        },
        ele
    );
}