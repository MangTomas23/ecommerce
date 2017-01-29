<?php
session_start();
if(!isset($_SESSION['merchant_session'])) {
  header('Location: login.php');
}

require '../Classes/Database.php';
$db = Database::getInstance();
$dbh = $db->getConnection();

$stmt = $dbh->prepare("SELECT * FROM merchants WHERE id=:id");
$stmt->bindParam(':id', $_SESSION['merchant_session']);
$stmt->execute();

$merchant = $stmt->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/handlebars-v4.0.5.js"></script>
    <script src="../assets/js/script.js"></script>
  </head>
  <body>

    <div class="container">
        <?php include 'navbar-side.php' ?>
        <?php include 'navbar-top.php' ?>
        <div class="main-container">
