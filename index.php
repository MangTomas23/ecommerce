<?php
require 'classes/Customer.php';

$customer = new Customer();
$customer->create('firstname', 'lastname', 'address', 'password');
?>
