<?php
  require 'Database.php';

  class Product {

    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function create($name, $image, $description, $price) {
      try {
        $stmt = $this->dbh->prepare("INSERT INTO products (name, image, description,
                                     price) VALUES (:name, :image, :description,
                                     :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        $stmt->execute();
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function get($id) {
      $stmt = $this->dbh->prepare("SELECT * FROM products WHERE id=$id");
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_OBJ);
      return $result;
    }

    public function getAll() {
      $stmt = $this->dbh->prepare("SELECT * FROM products");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $result;
    }

    public function update($id, $name, $image, $description, $price) {
      $stmt = $this->dbh->prepare("UPDATE products SET name=:name, image=:image,
                                   description=:description, price=:price WHERE
                                   id=:id");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':image', $image);
      $stmt->bindParam(':description', $description);
      $stmt->bindParam(':price', $price);

      $stmt->execute();
    }

    public function delete($id) {
      return $this->dbh->exec("DELETE FROM products WHERE id=$id");
    }
  }

?>
