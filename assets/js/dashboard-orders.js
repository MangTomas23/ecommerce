$(document).ready( function() {
  function loadOrders () {
    $.ajax({
      url: '../Controllers/Order.php',
      data: {
        action: 'getall'
      }
    }).done( function(data) {
      $('.order-table tbody').empty();
      $.each($.parseJSON(data), function(i, order) {
        var source = $('#rowTemplate').html();
        var template = Handlebars.compile(source);

        order.total_price = formatNumber(order.total_price);
        $('.order-table tbody').append(template(order));
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
      data.total_price = formatNumber(data.total_price);
      $('.order-info.modal-body').append(template(data));

      $.each(data.items, function(i, item) {
        if(item.product_id != null) {
          template = Handlebars.compile($('#orderItemsTemplate').html());
        }else {
          template = Handlebars.compile($('#noProductTemplate').html());
        }
        item.product.total = formatNumber(item.quantity * item.product.price);
        $('.order-items-list').append(template(item));
      });
    });
  });

  $(document.body).on('click', '#btnUpdateStatus', function() {
    var id = $(this).data('id');
    var status = $(this).closest('p').find('select').val();

    $.ajax({
      url: '../Controllers/Order.php',
      data: {
        action: 'changestatus',
        id, status
      }
    }).done( function(data) {
      loadOrders();
      $('#orderModal').modal('hide');
    });
  });

  window.Handlebars.registerHelper('select', function( value, options ){
        var $el = $('<select />').html( options.fn(this) );
        $el.find('[value="' + value + '"]').attr({'selected':'selected'});
        return $el.html();
    });
  loadOrders();
});
