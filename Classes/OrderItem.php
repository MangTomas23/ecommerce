<?php
  require_once 'Database.php';

  class OrderItem {
    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function create($order_id, $product_id, $quantity) {
      try {
        $stmt = $this->dbh->prepare("INSERT INTO order_items (order_id, product_id,
                                     quantity) VALUES (:order_id,:product_id,
                                     :quantity)");
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->execute();
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>
