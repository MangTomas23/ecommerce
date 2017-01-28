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
      var source = $('#checkoutItemTemplate').html();
      var template = Handlebars.compile(source);
      $.each(JSON.parse(data), function(i, product) {
        product.quantity = ids[product.id];
        product.total = product.price * product.quantity;
        product.price = product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        product.total = product.total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('.item-list').append(template(product));
      });
      computeTotal();
    });
  }

  function computeTotal() {
    var total = 0;

    $.each($('.ind-total'), function() {
      total += parseFloat($(this).text().replace(',', ''));
    });

    $('#txtTotal').text("₱ " + total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
  }

  loadProducts();
});
