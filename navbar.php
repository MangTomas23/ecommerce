<?php
  require_once 'Classes/Customer.php';
  $customer = new Customer();
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
      <a class="navbar-brand" href="index.php">Site Title</a>
    </div>
    <div class="collapse navbar-collapse" id="top-navbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li class="shopping-cart-li">
          <a href="cart.php" class="shopping-cart-icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="cart-no"></span>
          </a>
          <div class="info-box ">
            <div class="info-content">
              1 item added to cart
            </div>
          </div>
        </li>
        <li class="dropdown">
          <?php
            if(!$customer->isLoggedIn()) {
          ?>
            <a href="login.php">My Account</a>
          <?php
            }else {
              $c = $customer->get($_SESSION['user_session']);
          ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo "$c->firstname $c->lastname" ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="orders.php">Orders</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>

          <?php
            }
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
