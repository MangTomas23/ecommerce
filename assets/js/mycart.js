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
      $('.cart-container').empty();
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
    var cartItems = getCartItems();
    var txtQuantity = $(btn).closest('.product-quantity').find('input');
    var quantity = parseInt(txtQuantity.val());
    if(op==='inc') {
      quantity++;
      cartItems.push($(txtQuantity).data('id'));
    }else{
      if(quantity == 1) {
        return;
      }
      cartItems.splice(cartItems.indexOf($(txtQuantity).data('id')),1);
      quantity--;
    }
    localStorage.setItem('cart', JSON.stringify(cartItems));
    console.log(cartItems);
    console.log($(txtQuantity).data('id'));
    txtQuantity.val(quantity);
    computeTotal();
    setCartBadge();
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

  if(ids.length > 0) {
    loadProducts();
    $('.total-container').css({'visibility':'visible'});
  }
});
