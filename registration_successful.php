<?php
$page_title = 'Registration Successful';
include 'header.php';

if(!isset($_SESSION['registration_successful'])) {
  header("Location: register.php");
}

unset($_SESSION['registration_successful']);
?>

<div class="login-page">
  <div class="login-container"  style="width: 400px">
    <div class="login-logo">
      congratulations!
    </div>
    <div class="login-form">
      <p>
        Congratulations! Your account has been created successfully.
        <a href="index.php">Click here to continue</a>
      </p>
    </div>
  </div>
</div>

<?php include 'footer.php' ?>
