<?php
$page_title = 'My Cart';
include 'header.php';
include 'navbar.php';
?>

<div class="container">
  <h1 class="header-title">
    My Cart
  </h1>

  <div class="cart-container">
    You have 0 item in your cart.
  </div>
  <hr>
  <div class="total-container">
    <p class="total">Total: <span id="txtTotal"></span></p>
    <a href="checkout.php" class="btn btn-default checkout" name="button">
      <i class="fa fa-credit-card"></i>
      <span>PROCEED TO CHECKOUT</span>
    </a>
  </div>
</div>

<script id="cartItemTemplate" type="text/x-handlebars-template">
  <div class="cart-item">
    <div class="product-image">
      <img src="uploads/{{ image }}" alt="" />
    </div>
    <div class="product-details">
      <p>{{ name }}</p>
      <p>₱ {{ price }}</p>
      <p class="description">{{ description }}</p>
    </div>
    <div class="product-quantity">
      <button class="btn btn-default btn-dec" type="button">-</button>
      <input class="txt-quantity" data-id="{{ id }}" data-price="{{ price }}" type="text" value="{{ quantity }}">
      <button class="btn btn-default btn-inc" type="button">+</button>
    </div>
  </div>
</script>


<script src="assets/js/mycart.js"></script>
<?php
include 'footer.php';
?>
