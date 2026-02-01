<?php
require_once __DIR__ . "/../config/Database.php";

class Product {
    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll(){
        return $this->conn->query("SELECT * FROM products");
    }

    public function add($title,$image){
        $stmt = $this->conn->prepare("INSERT INTO products(title,image) VALUES(?,?)");
        $stmt->bind_param("ss",$title,$image);
        return $stmt->execute();
    }
}