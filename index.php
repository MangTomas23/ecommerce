<?php
$page_title = 'Home';
include 'header.php';
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
      </ul>
    </div>
  </div>
</nav>

<?php include 'footer.php'; ?>
