<?php
$page_title = 'Products';
include 'header.php';
?>

<div class="product-list container"></div>


<script id="product-container-template" type="text/x-handlebars-template">
  <div class="col-md-3 col-sm-6">
    <div class="product-container">
      <div class="product-image">
        <img src="../assets/img/cp1.jpg" alt="" />
      </div>
      <div class="product-info">
        <p class="product-name">{{ name }}</p>
        <p class="product-price">₱ {{ price }}</p>
      </div>
    </div>
  </div>
</script>

<script src="../assets/js/dashboard-products.js"></script>
<?php include 'footer.php'; ?>
