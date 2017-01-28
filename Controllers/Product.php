<?php
require '../Classes/Product.php';

$product = new Product();

if(isset($_POST['action'])) {
  switch($_POST['action']) {
    case 'add':
      if(!isset($_POST['name'], $_FILES['image'], $_POST['description'],$_POST['price'])) {
        errorResponse();
        break;
      }
      $name = $_POST['name'];
      $image = $_FILES['image'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $target_dir = '../uploads/';
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      $id = $product->create($name, $description, $price);
      $target_file = $target_dir . $id . ".$imageFileType";

      move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
      $product->updateImageColumn($id, "$id.$imageFileType");
      break;
  }
}

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
  case 'delete':
    if(!isset($_GET['id'])) {
      errorResponse();
      break;
    }
    $product->delete($_GET['id']);
    break;
  case 'getByIds':
    if(!isset($_GET['ids'])) {
      errorResponse();
      break;
    }

    echo json_encode($product->getByIds($_GET['ids']));
    break;
  default:
    errorResponse();
}

function errorResponse() {
  $response = ['error' => 'Invalid request'];
  echo json_encode($response);
}

?>
