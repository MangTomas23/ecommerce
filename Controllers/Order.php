<?php
require '../Classes/Order.php';

$order = new Order();

if(!isset($_GET['action'])) {
  die();
}

switch($_GET['action']) {
  case 'add':
    $order->create($_GET['user_id'], $_GET['total_price'], $_GET['items']);
    break;
  case 'getall':
    echo json_encode($order->getAll());
    break;
  case 'get':
    echo json_encode($order->get(12));
    break;
  default:
    echo json_encode(['error' => 'invalid request']);
    break;
}

?>
