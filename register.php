<?php
$page_title = "Register";
include 'header.php';
?>

<div class="login-page">
  <div class="login-container">
    <div class="login-logo">
      register
    </div>
    <form class="login-form" action="index.html" method="post">
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="first name">
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="last name">
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="address">
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="contact no">
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="email">
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="password">
      </div>
      <div class="form-group">
        <input class="form-control login-input" type="text" name="name" value=""
               placeholder="confirm password">
      </div>
      <button class="login-button" type="button" name="button">
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

<?php include 'footer.php'; ?>
