<?php
$page_title = 'Home';
include 'header.php';
include 'navbar.php';
require 'Classes/Product.php';

$product = new Product();

?>



<div class="container">
  <h1 class="header-title">PRODUCTS</h1>
  <div class="product-list">

    <?php
      $products = $product->getAll();
      foreach($products as $p) {
    ?>
      <div class="col-md-3 col-sm-6 no-pads">
        <a class="product-container" href="product.php?id=<?php echo $p->id ?>">
          <div class="product-image">
            <img src="uploads/<?php echo $p->image ?>" alt="" />
          </div>
          <div class="product-info">
            <p class="product-name"><?php echo $p->name ?></p>
            <p class="product-price">
              ₱ <?php echo number_format($p->price,2,'.',',') ?>
            </p>
          </div>
        </a>
      </div>
    <?php
      }
    ?>
  </div>
</div>

<?php include 'footer.php'; ?>
