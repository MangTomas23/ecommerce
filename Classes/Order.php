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
        $stmt = $this->dbh->prepare("INSERT INTO orders (customer_id, total_price,
                                     status) VALUES (:customer_id,:total_price,
                                     'IN PROCESS')");
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->execute();
        $orderItem = new OrderItem();

        $items = json_decode($items);
        $order_id = $this->dbh->lastInsertId();
        foreach($items as $k => $item) {
          $orderItem->create($order_id, $item->product_id, $item->quantity);
        }
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function getItems($id) {
      try {
        $stmt = $this->dbh->prepare("SELECT * FROM order_items WHERE order_id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $i => $item) {
          $stmt = $this->dbh->prepare("SELECT * FROM products WHERE id=:id");
          $stmt->bindParam(':id', $item['product_id']);
          $stmt->execute();
          $items[$i]['product'] = $stmt->fetch(PDO::FETCH_OBJ);
        }

        return $items;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>
