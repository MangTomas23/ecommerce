<?php
  class Database {
    private static $_instance;
    private $_connection;
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '123456';
    private $_dbname = 'ecommerce';

    public static function getInstance() {
      if(!self::$_instance) {
        self::$_instance = new self();
      }

      return self::$_instance;
    }

    private function __construct() {
      try {
        $this->_connection = new PDO("mysql:host=$this->_host;dbname=$this->_dbname",
                                      $this->_username, $this->_password);
      }catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function getConnection() {
      return $this->_connection;
    }
  }

?>
