<?php
class OrderModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function createOrder($orderData, $orderDetails) {
        try {
            $this->db->beginTransaction();
            
            // Thêm đơn hàng mới
            $sql = "INSERT INTO orders (name, phone, email, address, note, total_amount, status) 
                   VALUES (:name, :phone, :email, :address, :note, :total_amount, :status)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':name' => $orderData['name'],
                ':phone' => $orderData['phone'],
                ':email' => $orderData['email'],
                ':address' => $orderData['address'],
                ':note' => $orderData['note'],
                ':total_amount' => $orderData['total_amount'],
                ':status' => 'pending'
            ]);
            
            $orderId = $this->db->lastInsertId();
            
            // Thêm chi tiết đơn hàng
            $sql = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                   VALUES (:order_id, :product_id, :quantity, :price)";
            
            $stmt = $this->db->prepare($sql);
            
            foreach ($orderDetails as $item) {
                $stmt->execute([
                    ':order_id' => $orderId,
                    ':product_id' => $item['id'],
                    ':quantity' => $item['quantity'],
                    ':price' => $item['price']
                ]);
            }
            
            $this->db->commit();
            return $orderId;
            
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
}
?> 