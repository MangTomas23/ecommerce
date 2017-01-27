<?php
require '../Classes/Product.php';

$product = new Product();

if(!isset($_GET['action'])) {
  die();
}

switch($_GET['action']) {
  case 'listall':
    echo json_encode($product->getAll());
    break;
  case 'get':
    if(!isset($_GET['id'])) {
      errorResponse();
      break;
    }
    echo json_encode($product->get($_GET['id']));
    break;
  case 'add':
    if(!isset($_GET['name'], $_GET['image'], $_GET['description'],$_GET['price'])) {
      errorResponse();
      break;
    }

    $name = $_GET['name'];
    $image = $_GET['image'];
    $description = $_GET['description'];
    $price = $_GET['price'];

    $product->create($name, $image, $description, $price);
    break;
  case 'delete':
    if(!isset($_GET['id'])) {
      errorResponse();
      break;
    }

    $product->delete($_GET['id']);
    break;
  default:
    errorResponse();
}

function errorResponse() {
  $response = ['error' => 'Invalid request'];
  echo json_encode($response);
}

?>
