<?php
include "db.php";

class Student {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->conn->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($name, $email, $phone) {
        $stmt = $this->db->conn->prepare(
            "INSERT INTO students (name, email, phone) VALUES (:name, :email, :phone)"
        );
        return $stmt->execute([':name'=>$name, ':email'=>$email, ':phone'=>$phone]);
    }

    public function getById($id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $email, $phone) {
        $stmt = $this->db->conn->prepare(
            "UPDATE students SET name=:name, email=:email, phone=:phone WHERE id=:id"
        );
        return $stmt->execute([':name'=>$name, ':email'=>$email, ':phone'=>$phone, ':id'=>$id]);
    }

    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM students WHERE id=:id");
        return $stmt->execute([':id'=>$id]);
    }
}
?>