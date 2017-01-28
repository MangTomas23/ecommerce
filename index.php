<?php
$page_title = 'Home';
include 'header.php';
require 'Classes/Product.php';

$product = new Product();
?>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Site Title</a>
    </div>
    <div class="collapse navbar-collapse" id="top-navbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#" class="shopping-cart-icon"><i class="fa fa-shopping-cart"></i></a></li>
        <li><a href="#">My Account</a></li>
      </ul>
    </div>
  </div>
</nav>

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
            <p class="product-price"><?php echo $p->price ?></p>
          </div>
        </a>
      </div>
    <?php
      }
    ?>
  </div>
</div>

<?php include 'footer.php'; ?>
