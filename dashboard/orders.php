<?php
$page_title = 'Orders';
include 'header.php';
require '../Classes/Order.php';
?>

<h1 class="header-title">ORDERS</h1>

<?php
$order = new Order();
$order->getAll();
include 'footer.php';
?>
