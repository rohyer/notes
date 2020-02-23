<?php

class Connection {
    private $dsn;
    private $user;
    private $pass;

    public function __construct() {
        $this->dsn = "mysql:host=localhost; dbname=notes; charset=utf8";
        $this->user = "root";
        $this->pass = "";
    }

    public function getConnection() {
        try {
            $pdo = new PDO($this->dsn, $this->user, $this->pass);
            return $pdo;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>