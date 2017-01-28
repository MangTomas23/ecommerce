<?php
require_once 'Classes/Customer.php';

$customer = new Customer();

if(!$customer->isLoggedIn()) {
  $customer->redirect('login.php');
}

?>
