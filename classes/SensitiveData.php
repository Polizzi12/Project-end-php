<?php

class SensitiveData {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        $stmt = $this->db->pdo->prepare('INSERT INTO sensitive_data (data) VALUES (?)');
        return $stmt->execute([$data]);
    }

    public function read() {
        $stmt = $this->db->pdo->query('SELECT * FROM sensitive_data');
        return $stmt->fetchAll();
    }

    public function update($id, $data) {
        $stmt = $this->db->pdo->prepare('UPDATE sensitive_data SET data = ? WHERE id = ?');
        return $stmt->execute([$data, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->pdo->prepare('DELETE FROM sensitive_data WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

?>