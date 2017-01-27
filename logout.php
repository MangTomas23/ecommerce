<?php
session_start();
require 'Classes/Customer.php';

$customer = new Customer();
$customer->logout();
$customer->redirect('login.php');
?>
