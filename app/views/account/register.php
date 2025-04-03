<?php include 'app/views/shares/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">Đăng ký tài khoản</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($errors) && !empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="/DA_MaNguonMo/account/save" method="post">
                        <div class="form-group mb-3">
                            <label for="username">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirmpassword">Xác nhận mật khẩu:</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Đã có tài khoản? <a href="/DA_MaNguonMo/account/login">Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
