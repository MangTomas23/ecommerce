<?php
session_start();
require 'classes/Customer.php';

$customer = new Customer();
$customer->logout();
$customer->redirect('login.php');
?>
