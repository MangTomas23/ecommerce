$(document).ready( function() {
  var ids = [];
  $.each(getCartItems(), function(i,x) {
    ids[x] = (ids[x] || 0)+1;
  });


  function loadProducts() {
    $.ajax({
      url: 'Controllers/Product.php',
      data: {
        action: 'getByIds',
        ids: $.unique(getCartItems())
      }
    }).done( function(data) {
      var source = $('#cartItemTemplate').html();
      var template = Handlebars.compile(source);
      $.each(JSON.parse(data), function(i, product) {
        product.price = product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        product.quantity = ids[product.id];
        $('.cart-container').append(template(product));
      });
      computeTotal();
    });
  }

  $(document.body).on('click', '.btn-inc', function() {
    quantity($(this), 'inc');
  });

  $(document.body).on('click', '.btn-dec', function() {
    quantity($(this), 'dec');
  });

  function quantity(btn, op) {
    var txtQuantity = $(btn).closest('.product-quantity').find('input');
    var quantity = parseInt(txtQuantity.val()) + (op === 'inc' ? 1:-1);
    txtQuantity.val(quantity);
    computeTotal();
  }

  function computeTotal() {
    var total = 0;

    $.each($('.txt-quantity'), function() {
      var quantity = parseInt($(this).val());
      var price = parseFloat($(this).data('price').replace(',', ''));
      total += quantity * price;
    });

    $('#txtTotal').text("₱ " + total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
  }

  loadProducts();
});
