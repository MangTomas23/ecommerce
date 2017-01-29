<?php
require '../Classes/Database.php';
session_start();
if(isset($_POST['btn_login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $db = Database::getInstance();
  $dbh = $db->getConnection();

  $stmt = $dbh->prepare("SELECT * FROM merchants WHERE email=:email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_OBJ);
  if($result) {
    if(password_verify($password, $result->password)) {
      $_SESSION['merchant_session'] = $result->id;
      echo $_SESSION['merchant_session'];
      header('Location: index.php');
    }else{
      $error = 'Invalid email or password.';
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Merchant Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" media="screen" title="no title">
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <style media="screen">
      html,body, .container-table {
        height: 100%;
        background: #eeeeee;
      }
      .container-table {
        display: table;
      }
      .vertical-center-row {
        display: table-cell;
        vertical-align: middle;
      }
      .login-container {
        padding: 0;
      }

      .login-header {
        font-size: 26px;
        font-weight: 600;
        text-align: center;
        color: #717171;
        margin: 0;
      }

      .login-form {
        background: #fff;
        display: block;
        padding: 32px;
        margin-top: 24px;
        border-radius: 14px;
      }
    </style>
  </head>
  <body>
    <div class="container container-table">
      <div class="row vertical-center-row">
        <div class="col-md-4 col-md-offset-4 login-container">
          <h1 class="login-header">merchant login</h1>
          <form class="login-form" method="post">
            <div class="form-group">
              <input class="form-control" type="text" name="email" value="" placeholder="email">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" value="" placeholder="password">
            </div>
            <?php
              if(isset($error)) {
            ?>
              <p>
                <?php echo $error ?>
              </p>
            <?php } ?>
            <div class="text-right">
              <button type="submit" class="btn btn-default" name="btn_login">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
