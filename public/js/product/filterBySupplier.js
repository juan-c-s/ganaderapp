$(document).ready(function() {
    $('#supplier').on('keydown', function(event) {
        if (event.which === 13) {
            event.preventDefault();
            var cookies = document.cookie;
            cookies = cookies.split(';');
            var miCookieValor = null;
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.startsWith("XSRF-TOKEN=")) {
                    miCookieValor = cookie.substring("XSRF-TOKEN=".length, cookie.length);
                    break;
                }
            }
            var selectedSupplier = $(this).val();
            var resultDiv = $('#results');
            $.ajax({
                type: 'POST',
                url: "/api/products/supplierFilter",
                data: {supplier: selectedSupplier, products: JSON.parse(document.getElementById('products').textContent.slice(1,-1)), 
                    _token: miCookieValor},
                dataType: 'json',
                success: function(data) {
                if (data.length != 0) {
                    resultDiv.empty();
                    for (var key in data) {
                    //<img src="{{$event->getImage()}}" class="img-fluid img-thumbnail" alt="event_image">
                    resultDiv.append('<div class="col-md-4 col-lg-3 mb-2"><div class="card">\
                                        <div class="card-body text-center">' +
                                        '<img src=\"'+ data[key]['image'] +'\" class=\"card-img-top img-card\" alt=\"event_image\">' +
                                        '<h2>' + data[key]['title'] + '</h2>' +
                                        '<p>' + data[key]['supplier'] + '</p>' +
                                        '</div></div>');
                    }
                } else {
                    resultDiv.text('There are no products by this supplier');
                }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});