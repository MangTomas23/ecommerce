<?php
  require_once 'Database.php';

  class Product {

    public function __construct() {
      $db = Database::getInstance();
      $this->dbh = $db->getConnection();
    }

    public function create($name, $description, $price) {
      try {
        $stmt = $this->dbh->prepare("INSERT INTO products (name, description,
                                     price) VALUES (:name,:description,:price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        $stmt->execute();
        return $this->dbh->lastInsertId();
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

    public function getByIds($ids) {

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

    public function updateImageColumn($id, $img) {
      $stmt = $this->dbh->prepare("UPDATE products SET image=:image WHERE
                                   id=:id");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':image', $img);
      $stmt->execute();
    }
  }

?>
