<?php
$page_title = 'Login';
include 'header.php';
?>

<div class="login-page">
  <div class="login-container">
    <div class="login-logo">login</div>
    <form class="login-form" action="index.html" method="post">
      <div class="form-group">
        <input type="text" class="login-input form-control" name="name" value=""
               placeholder="email">
      </div>
      <div class="form-group">
        <input type="text" class="login-input form-control" name="name" value=""
               placeholder="password">
      </div>
      <button type="button" class="login-button" name="button">
        <i class="fa fa-chevron-right"></i>
      </button>
    </form>
    <div class="login-form-footer">
      <p>
        new user? <a href="register.php">create new account</a>
      </p>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
