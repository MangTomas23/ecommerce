<?php
  require 'Database.php';

  class Customer {
    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function createCustomer($firstname, $lastname, $address) {
      $stmt = $this->dbh->prepare("INSERT INTO customers (firstname, lastname,
                                   address) VALUES (:firstname, :lastname,
                                   :address)");
      $stmt->bindParam(':firstname', $firstname);
      $stmt->bindParam(':lastname', $lastname);
      $stmt->bindParam(':address', $address);

      $stmt->execute();
    }
  }

?>
