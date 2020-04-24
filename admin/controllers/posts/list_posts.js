var count = 0;

function post_template(e) {
    count++;

    return `<tr>
	            <td>${count}</td>
	            <td>${e.title}</td>
	            <td>${e.description}</td>
	            <td>${e.post_type}</td>
	          </tr>`;
}

function list_of_posts() {
    var login_token = localStorage.getItem('login_token');
    ajax_req(
        'POST',
        'methods/posts/list_posts.php',
        'login_token=' + login_token,
        function(e) {

            var result = JSON.parse(e.responseText);


            var template_to_insert = result.list_posts.map(post_template).join('');

            post_list_holder.innerHTML = template_to_insert;
        }
    );
}
list_of_posts();