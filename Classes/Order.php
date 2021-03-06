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
        $stmt = $this->dbh->prepare("SELECT * FROM products WHERE id=:id");
        foreach($items as $i => $item) {
          $stmt->bindParam(':id', $item['product_id']);
          $stmt->execute();
          $items[$i]['product'] = $stmt->fetch(PDO::FETCH_OBJ);
        }

        return $items;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function getAll() {
      try {
        $stmt = $this->dbh->prepare("SELECT * FROM orders ORDER BY id DESC");
        $stmt->execute();

        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($orders as $i => $order) {
          $stmt = $this->dbh->prepare("SELECT firstname,lastname FROM customers
                                       WHERE id=:customer_id");
          $stmt->bindParam(':customer_id', $order['customer_id']);
          $stmt->execute();
          $orders[$i]['customer'] = $stmt->fetch(PDO::FETCH_OBJ);
        }

        return $orders;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function get($id) {
      try {
        $stmt = $this->dbh->prepare("SELECT * FROM orders WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        $order['items'] = $this->getItems($order['id']);

        $stmt = $this->dbh->prepare("SELECT * FROM customers WHERE id=:customer_id");
        $stmt->bindParam(':customer_id', $order['customer_id']);
        $stmt->execute();

        $order['customer'] = $stmt->fetch(PDO::FETCH_OBJ);

        return $order;
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function changeStatus($id, $status) {
      try {
        $stmt = $this->dbh->prepare("UPDATE orders SET status=:status WHERE
                                     id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }
  }

?>
