<?php
require 'Classes/Customer.php';

$customer = new Customer();

if(!$customer->isLoggedIn()) {
  $customer->redirect('login.php');
}

?>
