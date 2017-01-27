<?php
$page_title = "Register";
include 'header.php';
require 'Classes/Customer.php';

$customer = new Customer();
if($customer->isLoggedIn()) {
  $customer->redirect('index.php');
}

if(isset($_POST['btn_register'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $contact_no = $_POST['contact_no'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $customer->create($firstname, $lastname, $address, $password, $email, $contact_no);
}

?>

<div class="login-page">
  <div class="login-container">
    <div class="login-logo">
      register
    </div>
    <form class="login-form" method="post">
      <div class="form-group">
        <input class="form-control login-input" type="text" name="firstname" value=""
               placeholder="first name" required>
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="lastname" value=""
               placeholder="last name" required>
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="address" value=""
               placeholder="address" required>
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="contact_no" value=""
               placeholder="contact no" required>
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="email" name="email" value=""
               placeholder="email" required>
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="password" name="password" value=""
               placeholder="password" required>
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="password" name="cpassword" value=""
               placeholder="confirm password" required>
      </div>
      <button class="login-button" type="submit" name="btn_register" title="Submit">
        <i class="fa fa-chevron-right"></i>
      </button>
    </form>
    <div class="login-form-footer">
      <p>
        already have an account? <a href="login.php">login here</a>
      </p>
    </div>
  </div>
</div>

<script src="assets/js/registration.js"></script>
<?php include 'footer.php'; ?>
