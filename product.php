<?php
require 'Classes/Product.php';
require 'Classes/Customer.php';
$product = new Product();
$customer = new Customer();

if(!isset($_GET['id'])) {
  $customer->redirect('index.php');
}

$p = $product->get($_GET['id']);
if(!$p) {
  $customer->redirect('index.php');
}
$page_title = $p->name;
include 'header.php';
include 'navbar.php';

?>

<div class="container">
  <h1 class="header-title"><?php echo $p->name ?></h1>
  <div class="product-details">
    <div class="col-md-4">
      <img src="uploads/15.jpg" alt="" />
    </div>
    <div class="col-md-8">
      <h2>Product Details</h2>
      <table>
        <tr>
          <td>ID:</td>
          <td id="productId"><?php echo $p->id ?></td>
        </tr>
        <tr>
          <td>Product Name</td>
          <td><?php echo $p->name ?></td>
        </tr>
        <tr>
          <td>Price:</td>
          <td>₱
            <?php echo number_format($p->price,2,".",",") ?>
          </td>
        </tr>
        <tr>
          <td>Description:</td>
          <td><?php echo $p->description ?></td>
        </tr>
      </table>
      <div class="add-to-cart">
        <button id="btnAddToCart" type="button" class="btn btn-default" name="button">
          <i class="fa fa-shopping-cart"></i>
          <span>ADD TO CART</span>
        </button>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php' ?>
