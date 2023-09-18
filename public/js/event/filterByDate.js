$(document).ready(function() {
  $('#date').on('change', function() {
      var selectedDate = $(this).val();
      var token = $('#csrf-token').data('token');
      var resultDiv = $('#results');
      $.ajax({
          type: 'POST',
          url: "/events/dateFilter",
          data: {date: selectedDate, _token: token},
          dataType: 'json',
          success: function(data) {
              if (data.length > 0) {
                resultDiv.empty();
                console.log(data)
                for (let i = 0; i < data.length; i++) {
                  resultDiv.append('<div class="col-md-4 col-lg-3 mb-2"><div class="card">\
                                    <div class="card-body text-center">' +
                                    '<h2>' + data[i]['title'] + '</h2>' +
                                    '<p>' + data[i]['description'] + '</p>' +
                                    '<p>' + data[i]['date'] + '</p>' +
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