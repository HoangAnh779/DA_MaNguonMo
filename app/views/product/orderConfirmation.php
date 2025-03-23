<?php include(__DIR__ . '/../shares/header.php'); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card order-success">
                <div class="card-body text-center py-5">
                    <div class="success-icon mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    
                    <h2 class="mb-4">Đặt hàng thành công!</h2>
                    
                    <?php if (isset($_SESSION['last_order_id'])): ?>
                        <p class="order-id mb-4">
                            Mã đơn hàng của bạn: <strong>#<?php echo $_SESSION['last_order_id']; ?></strong>
                        </p>
                    <?php endif; ?>
                    
                    <div class="order-message mb-4">
                        <p>Cảm ơn bạn đã đặt hàng!</p>
                        <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận đơn hàng.</p>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="/DA_MaNguonMo/Product" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Tiếp tục mua sắm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.order-success {
    border: none;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 15px;
}

.success-icon {
    font-size: 5rem;
    color: #006837;
}

.success-icon i {
    animation: scaleUp 0.5s ease;
}

.order-id {
    font-size: 1.2rem;
    color: #006837;
    padding: 10px 20px;
    background: rgba(0,104,55,0.1);
    border-radius: 30px;
    display: inline-block;
}

.order-message {
    color: #666;
    line-height: 1.6;
}

.btn-primary {
    background-color: #006837;
    border-color: #006837;
    padding: 12px 30px;
    border-radius: 30px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #005229;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,104,55,0.2);
}

@keyframes scaleUp {
    0% {
        transform: scale(0);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>

<?php 
// Xóa session sau khi hiển thị
unset($_SESSION['last_order_id']);
include(__DIR__ . '/../shares/footer.php'); 
?>