<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
      window.onload = function() {
        localStorage.clear();
        window.location.href = 'login.php';
      }
    </script>
  </body>
</html>

<?php
session_start();
require 'Classes/Customer.php';

$customer = new Customer();
$customer->logout();
?>
