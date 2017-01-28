<?php
$page_title = 'Checkout';
include 'header.php';
include 'navbar.php';
?>

<div class="container">
  <h1 class="header-title">Checkout</h1>
  <div class="checkout-container">
    <div class="col-md-8">
      <div class="item-list">

      </div>
    </div>
    <div class="col-md-4">
      <div class="customer-info">
        <p>Full Name: </p>
        <p>Address: </p>
        <p>Contact No: </p>
        <p class="total">Total: <span id="txtTotal"></span></p>
      </div>
      <a class="btn btn-default continue" href="#">CONTINUE</a>
    </div>
  </div>
</div>

<script id="checkoutItemTemplate" type="text/x-handlebars-template">
  <div class="checkout-item">
    <img src="uploads/14.jpg" alt="" />
    <table>
      <tr>
        <td>Product ID:</td>
        <td>{{ id }}</td>
      </tr>
      <tr>
        <td>Product Name:</td>
        <td>{{ name }}</td>
      </tr>
      <tr>
        <td>Price:</td>
        <td>₱ {{ price }}</td>
      </tr>
      <tr>
        <td>Description:</td>
        <td>{{ description }}</td>
      </tr>
    </table>
    <div class="quantity">
      x {{ quantity }}
    </div>
    <div class="total">₱ <span class="ind-total">{{ total }}</span></div>
  </div>
</script>

<script src="assets/js/checkout.js"></script>
<?php include 'footer.php' ?>
