<?php 
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($username, $password) {
        $stmt = $this->db->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}


?>