<?php
include_once(__DIR__ . '/../../helpers/SessionHelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Thêm Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    :root {
        --primary-color: #006837;
        --secondary-color: #8dc63f;
        --text-color: #333;
    }

    body {
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
    }

    /* Logo styles */
    .navbar-logo {
        display: flex;
        justify-content: center;
        background: white;
        padding: 10px 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar-logo img {
        width: 70px;
        height: 62px;
        transition: transform 0.3s ease;
    }

    .navbar-logo img:hover {
        transform: scale(1.05);
    }

    /* Navbar styles */
    .navbar {
        background-color: var(--primary-color) !important;
        padding: 0.8rem 1rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar-nav {
        margin: 0 auto;
    }

    .nav-item {
        position: relative;
        margin: 0 5px;
    }

    .nav-link {
        color: white !important;
        font-weight: 500;
        padding: 0.8rem 1.2rem !important;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: var(--secondary-color) !important;
        border-radius: 4px;
    }

    /* Active link style */
    .nav-item.active .nav-link {
        color: var(--secondary-color) !important;
        position: relative;
    }

    .nav-item.active .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 2px;
        background-color: var(--secondary-color);
    }


    /* Product image */
    .product-image {
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.05);
    }

    /* Container spacing */
    .container.mt-4 {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .navbar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 5px 0;
        }

        .nav-link {
            text-align: center;
        }

        .nav-item:nth-last-child(-n+2) .nav-link {
            display: inline-block;
            margin: 5px auto;
        }
    }

    /* Thêm styles mới */
    .top-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 50px;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar-logo {
        display: flex;
        align-items: center;
        box-shadow: none;
        padding: 0;
    }

    .logo-link {
        text-decoration: none;
    }

    .logo-link img {
        width: 70px;
        height: 62px;
        transition: transform 0.3s ease;
    }

    .logo-link img:hover {
        transform: scale(1.05);
    }

    .user-section {
        display: flex;
        align-items: center;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .username {
        display: flex;
        align-items: center;
        gap: 5px;
        color: var(--primary-color);
        font-weight: 500;
    }

    .username i {
        font-size: 1.2rem;
        color: var(--primary-color);
    }

    .logout-btn, .login-btn {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 8px 15px;
        border-radius: 20px;
        text-decoration: none;
        color: white;
        background-color: var(--primary-color);
        transition: all 0.3s ease;
    }

    .logout-btn:hover, .login-btn:hover {
        background-color: #005229;
        text-decoration: none;
        color: white;
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .top-header {
            padding: 10px 20px;
        }

        .user-info {
            gap: 10px;
        }

        .username span {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="top-header">
        <div class="navbar-logo">
            <a href="/DA_MaNguonMo/home" class="logo-link">
                <img src="/DA_MaNguonMo/public/images/LogoPhucLong1.png" alt="Logo">
            </a>
        </div>
        <div class="user-section">
            <?php if(SessionHelper::isLoggedIn()): ?>
                <div class="user-info">
                    <span class="username">
                        <i class="fas fa-user-circle"></i>
                        <?php echo $_SESSION['username']; ?>
                    </span>
                    <a href="/DA_MaNguonMo/account/logout" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                    </a>
                </div>
            <?php else: ?>
                <a href="/DA_MaNguonMo/account/login" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Đăng nhập
                </a>
            <?php endif; ?>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/home">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/Product/">Sản Phẩm</a>
                </li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/DA_MaNguonMo/Product/add">Thêm sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/DA_MaNguonMo/Category/">Danh Mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/DA_MaNguonMo/Category/add">Thêm danh mục</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/home/contact">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/home/about">Về chúng tôi</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">