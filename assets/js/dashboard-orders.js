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

  $(document.body).on('click', '.order-table tbody tr', function() {
    $('#orderModal').modal('show');
    $.ajax({
      url: '../Controllers/Order.php',
      data: {
        action: 'get',
        id: $(this).data('id')
      }
    }).done( function(data) {
      data = $.parseJSON(data);
      $('.order-info.modal-body').empty();
      var template = Handlebars.compile($('#customerInfoTemplate').html());
      $('.order-info.modal-body').append(template(data));

      $.each(data.items, function(i, item) {
        template = Handlebars.compile($('#orderItemsTemplate').html());
        item.product.total = item.quantity * item.product.price;
        $('.order-items-list').append(template(item));
      });
      console.log(data);
    });
  });

  $(document.body).on('click', '#btnUpdateStatus', function() {
    
    console.log($(this).data('id'));
  });

  window.Handlebars.registerHelper('select', function( value, options ){
        var $el = $('<select />').html( options.fn(this) );
        $el.find('[value="' + value + '"]').attr({'selected':'selected'});
        return $el.html();
    });
  loadOrders();
});
