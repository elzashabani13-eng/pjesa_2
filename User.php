<?php
require_once __DIR__ . "/../config/Database.php";

class User {
    private $conn;

    public function __construct(){
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register($name, $email, $password){
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
        $stmt->bind_param("sss",$name,$email,$hash);
        return $stmt->execute();
    }

    public function login($email,$password){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        if($res && password_verify($password,$res['password'])){
            return $res;
        }
        return false;
    }
}