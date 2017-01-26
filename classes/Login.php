<?php
  require 'Database.php';

  class Login {

    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function verify($email, $password) {
      $stmt = $this->dbh->prepare('SELECT * FROM customers WHERE email=:email');
      $stmt->bindParam(':email', $email);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_OBJ);
      if($result) {
        if(password_verify($password, $result->password)) {
          return true;
        }
      }

      return false;
    }
  }
?>
