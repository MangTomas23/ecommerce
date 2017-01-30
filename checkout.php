<?php
$page_title = 'Checkout';
include 'header.php';
include 'navbar.php';
include 'authenticated.php';
?>

<div id="userId" data-userid="<?php echo $_SESSION['user_session'] ?>"></div>
<div class="container">
  <h1 class="header-title">Checkout</h1>
  <div class="checkout-container">
    <div class="col-md-8">
      <div class="item-list">

      </div>
    </div>
    <div class="col-md-4">
      <div class="customer-info">
        <?php
          $c = $customer->get($_SESSION['user_session']);
        ?>
        <p>Full Name: <?php echo "$c->firstname $c->lastname" ?></p>
        <p>Address: <?php echo $c->address ?></p>
        <p>Contact No: <?php echo $c->contact_no ?></p>
        <p class="total">Total: <span id="txtTotal"></span></p>
      </div>
      <a id="btnContinue" class="btn btn-primary continue" href="#">CONTINUE</a>
    </div>
  </div>
</div>

<script id="checkoutItemTemplate" type="text/x-handlebars-template">
  <div class="checkout-item">
    <img src="uploads/{{ image }}" alt="" />
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
    <div class="total">₱  <span class="ind-total">{{ total }}</span></div>
  </div>
</script>

<script src="assets/js/checkout.js"></script>
<?php include 'footer.php' ?>
