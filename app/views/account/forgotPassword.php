<?php include(__DIR__ . '/../shares/header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">Khôi phục mật khẩu</h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <form action="/DA_MaNguonMo/account/processForgotPassword" method="post">
                        <div class="form-group">
                            <label for="username">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="/DA_MaNguonMo/account/login">Quay lại đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

.card-header {
    background-color: #006837;
    color: white;
    padding: 20px;
}

.btn-primary {
    background-color: #006837;
    border-color: #006837;
}

.btn-primary:hover {
    background-color: #005229;
    border-color: #005229;
}
</style>

<?php include(__DIR__ . '/../shares/footer.php'); ?>
