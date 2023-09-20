$(document).ready(function() {
  $('#date').on('change', function() {
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
    console.log(miCookieValor);
    var selectedDate = $(this).val();
    var resultDiv = $('#results');
    $.ajax({
      type: 'POST',
      url: "/api/events/dateFilter",
      data: {date: selectedDate, events: JSON.parse(document.getElementById('events').textContent.slice(1,-1)), 
            _token: miCookieValor},
      dataType: 'json',
      success: function(data) {
        if (data.length != 0) {
          resultDiv.empty();
          for (var key in data) {
            resultDiv.append('<div class="col-md-4 col-lg-3 mb-2"><div class="card">\
                              <div class="card-body text-center">' +
                              '<img src=\"'+ data[key]['image'] +'\" class=\"img-fluid img-thumbnail\" alt=\"event_image\">' +
                              '<h2>' + data[key]['title'] + '</h2>' +
                              '<p>' + data[key]['description'] + '</p>' +
                              '<p>' + data[key]['date'] + '</p>' +
                              '</div></div>');
          }
        } else {
          resultDiv.text('There are no events at this date');
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});