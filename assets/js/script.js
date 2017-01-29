$(document).ready( function() {

  $('#btnAddToCart').on('click', function() {
    var cartItems = getCartItems();
    cartItems.push(parseInt($('#productId').text()));
    localStorage.setItem('cart', JSON.stringify(cartItems));

    setCartBadge();
    $('.info-box').toggleClass('show');
    setTimeout(function() {
      $('.info-box').toggleClass('show');
    }, 3000);
  });

  function getCartCount() {
    var cartItems = getCartItems();
    return cartItems.length;
  }

  function getCartItems() {
    return JSON.parse(localStorage.getItem('cart')) || [];
  }

  function setCartBadge() {
    $('.cart-no').text(getCartCount() || '');
  }

  function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  }

  setCartBadge();
  window.getCartCount = getCartCount;
  window.getCartItems = getCartItems;
  window.setCartBadge = setCartBadge;
  window.formatNumber = formatNumber;

});
