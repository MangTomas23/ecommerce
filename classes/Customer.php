<?php
  require 'Database.php';

  class Customer {

    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function create($firstname, $lastname, $address) {
      try {
        $stmt = $this->dbh->prepare("INSERT INTO customers (firstname, lastname,
                                     address) VALUES (:firstname, :lastname,
                                     :address)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':address', $address);

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

  }

?>
