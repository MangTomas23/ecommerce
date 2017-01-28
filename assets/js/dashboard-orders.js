$(document).ready( function() {
  function loadOrders () {
    $.ajax({
      url: '../Controllers/Order.php',
      data: {
        action: 'getall'
      }
    }).done( function(data) {
      $.each($.parseJSON(data), function(i, order) {
        var source = $('#rowTemplate').html();
        var template = Handlebars.compile(source);

        order.total_price = order.total_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('table tbody').append(template(order));
      })
    });
  }

  $(document.body).on('click', 'tbody tr', function() {
    $('#orderModal').modal('show');
  });

  loadOrders();
});
