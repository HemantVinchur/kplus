var count = 0;

function product_template(e) {
    count++;

    return `<tr>
	            <td>${count}</td>
	            <td>${e.product_name}</td>
	            <td>${e.in_stock}</td>
	            <td>${e.description}</td>
	          </tr>`;
}

function list_of_products() {
    var login_token = localStorage.getItem('login_token');
    ajax_req(
        'POST',
        'methods/products/list_products.php',
        'login_token=' + login_token,
        function(e) {

            var result = JSON.parse(e.responseText);
            console.log(result);

            var template_to_insert = result.list_products.map(product_template).join('');

            product_list_holder.innerHTML = template_to_insert;
        }
    );
}
list_of_products();