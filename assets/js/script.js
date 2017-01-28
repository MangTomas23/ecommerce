$(document).ready( function() {

  $('#btnAddToCart').on('click', function() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    cartItems.push(parseInt($('#productId').text()));
    localStorage.setItem('cart', JSON.stringify(cartItems));
    console.log(cartItems);

    $('.info-box').toggleClass('show');
    $('.cart-no').text(cartItems.length);
    setTimeout(function() {
      $('.info-box').toggleClass('show');
    }, 3000);

  });

});
