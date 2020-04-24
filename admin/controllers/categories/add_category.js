function add_category_form(ele) {
    var form = form_inputs('add_category');
    ajax_req(
        'POST',
        'methods/categories/add_category.php',
        form,
        function(e) {
            console.log(e);

            var result = JSON.parse(e.responseText);
            console.log(result);

            switch (result.msg) {
                case 'there is some problem':
                    show_notification({ 'msg': 'There is some problem' });
                    break;
                default:

            }

            change_button_state(ele, 'done', true);
        },
        ele
    );
}