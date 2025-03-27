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
            
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if ($result) {
                // Ensure role is set
                if (!isset($result->role)) {
                    $result->role = 'user';
                }
            }
            return $result;
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

    public function updatePassword($username, $newPassword) 
    {
        try {
            $query = "UPDATE " . $this->table_name . " SET password = :password WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $newPassword);
            return $stmt->execute();
        } catch(PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}
?>
