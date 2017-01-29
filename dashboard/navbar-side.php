<div class="col-md-3 left-col">
    <a href="index.php" class="site_title">
      <i class="fa fa-shopping-cart"></i>
      <span>Site Title</span>
    </a>
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="../assets/img/profile.jpg" alt="" />
      </div>
      <div class="profile_info">
        <span>Welcome, </span>
        <h2><?php echo "$merchant->firstname $merchant->lastname" ?></h2>
      </div>
    </div>
    <div class="sidebar_menu">
      <ul>
        <li>
          <a href="products.php">
            <i class="fa fa-tag"></i>
            <span>Products</span>
          </a>
        </li>
        <li>
          <a href="orders.php">
            <i class="fa fa-bar-chart"></i>
            <span>Orders</span>
          </a>
        </li>
      </ul>
    </div>
</div>
