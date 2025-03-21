<?php
class AccountModel 
{
    private $conn;
    private $table_name = "account";

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function getAccountByUsername($username) 
    {
        try {
            $query = "SELECT id, username, password, role FROM " . $this->table_name . " WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }

    public function save($username, $password, $role = 'user') 
    {
        try {
            $query = "INSERT INTO " . $this->table_name . " (username, password, role) 
                     VALUES (:username, :password, :role)";
            
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}
?>
