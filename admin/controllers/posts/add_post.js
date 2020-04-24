function add_post(ele) {
    var form = form_inputs('add_post');
    var data = CKEDITOR.instances.description.getData();
    ajax_req(
        'POST',
        'methods/posts/add_post.php',
        form + '&data=' + data,
        function(e) {
            console.log(e);

            var result = JSON.parse(e.responseText);
            console.log(result);
            switch (result.msg) {
                case 'empty':
                    show_notification({ 'msg': 'Post name cannot be empty field' });
                    break;
                default:

            }

            change_button_state(ele, 'done', true);
        },
        ele
    );
}