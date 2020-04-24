function add_product(ele) {
    var form = form_inputs('add_product');
    var data = CKEDITOR.instances.description.getData();
    ajax_req(
        'POST',
        'methods/products/add_product.php',
        form + '&data=' + data,
        function(e) {
            console.log(e);
            var result = JSON.parse(e.responseText);

            switch (result.msg) {
                case 'empty':
                    show_notification({ 'msg': 'Fields cannot be empty' });
                    break;
                default:

            }

            change_button_state(ele, 'done', true);
        },
        ele
    );
}