<?php
  require_once 'Database.php';
  require_once 'OrderItem.php';

  class Order {

    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function create($customer_id, $total_price, $items) {
      try {
        $stmt = $this->dbh->prepare("INSERT INTO orders (customer_id, total_price)
                                     VALUES (:customer_id,:total_price)");
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->execute();
        $orderItem = new OrderItem();

        $items = json_decode($items);
        foreach($items as $k => $item) {
          $orderItem->create($this->dbh->lastInsertId(), $item->product_id, $item->quantity);
        }
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>
