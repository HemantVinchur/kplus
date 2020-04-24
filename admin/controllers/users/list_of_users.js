var count = 0;

function user_list_template(e) {
    count++;

    return `<tr>
	            <td>${count}</td>
	            <td>${e.nice_name}</td>
	            <td>${e.email}</td>
	            <td>${e.number}</td>
	          </tr>`;
}

function list_of_users() {
    var login_token = localStorage.getItem('login_token');
    ajax_req(
        'POST',
        'methods/users/list_of_users.php',
        'login_token=' + login_token,
        function(e) {

            var result = JSON.parse(e.responseText);
            console.log(result);

            var template_to_insert = result.list_of_users.map(user_list_template).join('');

            users_list_holder.innerHTML = template_to_insert;
        }
    );
}
list_of_users();