<?php include(__DIR__ . '/../shares/header.php'); ?>

<div class="container my-5">
    <h2 class="mb-4">Giỏ hàng của bạn</h2>
    
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="/DA_MaNguonMo/<?php echo $item['image']; ?>" 
                                         alt="<?php echo $item['name']; ?>"
                                         class="cart-item-image me-3">
                                    <span><?php echo $item['name']; ?></span>
                                </div>
                            </td>
                            <td><?php echo number_format($item['price']); ?>₫</td>
                            <td>
                                <input type="number" 
                                       value="<?php echo $item['quantity']; ?>"
                                       min="1"
                                       class="form-control quantity-input"
                                       style="width: 80px"
                                       data-id="<?php echo $item['id']; ?>">
                            </td>
                            <td><?php echo number_format($subtotal); ?>₫</td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-item"
                                        data-id="<?php echo $item['id']; ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td colspan="2"><strong><?php echo number_format($total); ?>₫</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="d-flex justify-content-between mt-4">
            <a href="/DA_MaNguonMo/Product" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
            </a>
            <a href="/DA_MaNguonMo/Product/checkout" class="btn btn-primary">
                Thanh toán <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            Giỏ hàng của bạn đang trống. 
            <a href="/DA_MaNguonMo/Product" class="alert-link">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>

<style>
.cart-item-image {
    width: 80px;
    height: 80px;
    object-fit: contain;
    background: #f8f9fa;
    padding: 5px;
    border-radius: 5px;
}

.quantity-input {
    border-radius: 20px;
    text-align: center;
}

.table > :not(caption) > * > * {
    vertical-align: middle;
}

.btn {
    border-radius: 20px;
    padding: 8px 20px;
}

.remove-item {
    padding: 6px 10px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.remove-item:hover {
    background-color: #dc3545;
    color: white;
    transform: scale(1.1);
}

.remove-item i {
    font-size: 14px;
}

/* Animation khi xóa sản phẩm */
.cart-item-removing {
    animation: fadeOut 0.3s ease;
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}
</style>

<script>
// Xử lý xóa sản phẩm
document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.getAttribute('data-id');
        if(confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) {
            removeFromCart(productId);
        }
    });
});

function removeFromCart(productId) {
    fetch(`/DA_MaNguonMo/Product/removeFromCart`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            // Reload trang sau khi xóa thành công
            location.reload();
        } else {
            alert('Có lỗi xảy ra khi xóa sản phẩm');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi xóa sản phẩm');
    });
}
</script>

<?php include(__DIR__ . '/../shares/footer.php'); ?>
