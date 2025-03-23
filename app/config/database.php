<?php 
class Database { 
    private $host = "localhost"; 
    private $db_name = "my_store"; 
    private $username = "root"; 
    private $password = ""; 
    private $conn = null; 
 
    public function getConnection() { 
        try { 
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            ); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $this->conn; 
        } catch(PDOException $e) { 
            error_log("Database Connection Error: " . $e->getMessage()); 
            return null; 
        } 
    } 
}