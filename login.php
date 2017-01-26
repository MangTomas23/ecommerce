<?php
$page_title = 'Login';
include 'header.php';
session_start();
require 'classes/Customer.php';

$customer = new Customer();
if($customer->isLoggedIn()) {
  $customer->redirect('index.php');
}

if(isset($_POST['btn_login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if($customer->login($email, $password)) {

  }else {
    $error = 'Invalid email or password';
  }
}

?>

<div class="login-page">
  <div class="login-container">
    <div class="login-logo">login</div>
    <form class="login-form" method="post">
      <div class="form-group">
        <input type="text" class="login-input form-control" name="email"
               value="<?php echo isset($_POST['email'])?$_POST['email']:'' ?>"
               placeholder="email">
      </div>
      <div class="form-group">
        <input type="password" class="login-input form-control" name="password"
               value="<?php echo isset($_POST['password'])?$_POST['password']:'' ?>"
               placeholder="password">
      </div>
      <button type="submit" class="login-button" name="btn_login" title="Login">
        <i class="fa fa-chevron-right"></i>
      </button>

      <?php
        if(isset($error)) {
      ?>
      <p class="error-text"><?php echo $error ?></p>
      <?php } ?>
    </form>
    <div class="login-form-footer">
      <p>
        new user? <a href="register.php">create new account</a>
      </p>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
