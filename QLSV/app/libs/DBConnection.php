<?php
class DBConnection {
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;
    private $conn;

    public function __construct() {
        $this->host = DB_HOST;
        $this->port = DB_PORT;
        $this->dbname = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;

        try {
            $this->conn = new PDO("mysql:host={$this->host}; port={$this->port}; dbname={$this->dbname}", $this->user, $this->pass);
        } catch (PDOException $e) {
            $this->conn = null;
            // echo $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}
?>