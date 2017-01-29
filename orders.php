<?php
$page_title = 'My Orders';
include 'header.php';
include 'navbar.php';
include 'authenticated.php';
?>

<div class="container">
  <h1 class="header-title">My Orders</h1>
  <?php
    require 'Classes/Order.php';
    $order = new Order();
    $orders = $customer->getOrders($_SESSION['user_session']);
    if(!$orders) {
  ?>
    <p>
      You have no orders yet.
    </p>
  <?php
    }
    foreach($orders as $i => $o) {
  ?>
    <div class="order-item">
      <div class="header">
        <h2>ORDER # <?php echo $o->id ?></h2>
        <h3 class="status">STATUS: <span><?php echo $o->status ?></span></h3>
      </div>
      <div class="items-list">
        <?php
          foreach($order->getItems($o->id) as $i => $itm) {
        ?>
          <div class="item-container">
            <img src="uploads/<?php echo $itm['product']->image ?>" alt="" />
            <div class="product-details">
              <p><?php echo $itm['product']->name ?></p>
              <p>₱ <?php echo number_format($itm['product']->price,2,'.',',') ?></p>
              <p><?php echo $itm['product']->description ?></p>
            </div>
            <p class="quantity">
              x <?php echo $itm['quantity'] ?>
            </p>
            <p class="price">
              ₱ <?php echo number_format($itm['quantity'] * $itm['product']->price,2,'.',',') ?>
            </p>
          </div>
        <?php } ?>
      </div>
      <div class="total">
        Total: <span>₱ <?php echo number_format($o->total_price,2,'.',',') ?></span>
      </div>
    </div>
  <?php
    }
  ?>
</div>



<?php

include 'footer.php';
?>
