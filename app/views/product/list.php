<?php include(__DIR__ . '/../shares/header.php'); ?>

<h1>Danh sách sản phẩm</h1>
<a href="/DA_MaNguonMo/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>
<div class="row" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/DA_MaNguonMo/api/product')
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            data.forEach(product => {
                const productItem = document.createElement('div');
                productItem.className = 'col-md-3 mb-4';
                productItem.innerHTML = `
                    <div class="card">
                        <img src="/DA_MaNguonMo/${product.image}" class="card-img-top" alt="${product.name}">
                        <div class="card-body">
                            <h2 class="card-title"><a href="/DA_MaNguonMo/Product/show/${product.id}">${product.name}</a></h2>
                            <p class="card-text">${product.description}</p>
                            <p class="card-text">Giá: ${product.price} VND</p>
                            <p class="card-text">Danh mục: ${product.category_name}</p>
                            <a href="/DA_MaNguonMo/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                        </div>
                    </div>
                `;
                productList.appendChild(productItem);
            });
        });
});

function deleteProduct(id) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
        fetch(`/DA_MaNguonMo/api/product/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product deleted successfully') {
                location.reload();
            } else {
                alert('Xóa sản phẩm thất bại');
            }
        });
    }
}
</script>