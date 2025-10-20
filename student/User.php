<?php
include "db.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->createAdminIfNotExist();
    }

    public function createUser($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->conn->prepare(
            "INSERT INTO users (username, password) VALUES (:username, :password)"
        );
        return $stmt->execute([':username' => $username, ':password' => $hash]);
    }

    public function login($username, $password) {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

    private function createAdminIfNotExist() {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => 'admin']);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $this->createUser('admin', '1234');
        }
    }
}
?>