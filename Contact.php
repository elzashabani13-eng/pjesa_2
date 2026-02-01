<?php
require_once __DIR__ . "/../config/Database.php";

class Contact {
    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function save($name,$email,$message){
        $stmt = $this->conn->prepare(
            "INSERT INTO contact_messages(name,email,message) VALUES(?,?,?)"
        );
        $stmt->bind_param("sss",$name,$email,$message);
        return $stmt->execute();
    }

    public function getAll(){
        return $this->conn->query("SELECT * FROM contact_messages");
    }
}