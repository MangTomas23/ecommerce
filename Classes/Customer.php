<?php
  require_once 'Database.php';

  class Customer {

    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function create($firstname, $lastname, $address, $password, $email, $contact_no) {
      try {
        $stmt = $this->dbh->prepare("INSERT INTO customers (firstname, lastname,
                                     address, password, email, contact_no) VALUES (:firstname, :lastname,
                                     :address, :password, :email, :contact_no)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':address', $address);
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $encrypted_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact_no', $contact_no);
        $stmt->execute();
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function get($id) {
      $stmt = $this->dbh->prepare("SELECT * FROM customers WHERE id=$id");
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_OBJ);
      return $result;
    }

    public function update($id, $firstname, $lastname, $address) {
      try {
        $stmt = $this->dbh->prepare("UPDATE customers SET firstname=:firstname,
                                     lastname=:lastname, address=:address
                                     WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':address', $address);
        $stmt->execute();
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function delete($id) {
      return $this->dbh->exec("DELETE FROM customers WHERE id=$id");
    }

    public function login($email, $password) {
      $stmt = $this->dbh->prepare('SELECT * FROM customers WHERE email=:email');
      $stmt->bindParam(':email', $email);
      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_OBJ);
      if($result) {
        if(password_verify($password, $result->password)) {
          $_SESSION['user_session'] = $result->id;
          return true;
        }
      }
      return false;
    }

    public function isLoggedIn() {
      if(isset($_SESSION['user_session'])) {
        return true;
      }
      return false;
    }

    public function logout() {
        session_destroy();
    }

    public function redirect($url) {
      header("Location: $url");
    }

    public function getOrders($id) {
      try {
        $stmt = $this->dbh->prepare("SELECT * FROM orders WHERE customer_id=:id
                                     ORDER BY id DESC");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }catch(PDOException $e) {
        $e.getMessage();
      }
    }
  }

?>
