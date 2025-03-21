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
    <style>
    .product-image {
        max-width: 100px;
        height: auto;
    }
    .navbar-logo {
        display: flex;
        justify-content: center;
        background: white;
    }
    </style>
</head>

<body>
    <div class="navbar-logo">
        <a href="/DA_MaNguonMo/home" style="text-decoration: none"><img src="/DA_MaNguonMo/public/images/LogoPhucLong1.png" alt=""
            style="width: 70px; height: 62px; margin: 8px" /></a>
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
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/Product/add">Thêm sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/Category/">Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/Category/add">Thêm danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/home/contact">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/DA_MaNguonMo/home/about">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <?php 
                        if(SessionHelper::isLoggedIn()){
                            echo "<a class='nav-link'>".$_SESSION['username']."</a>";
                        } else {
                            echo "<a class='nav-link' href='/DA_MaNguonMo/account/login'>Login</a>";
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php 
                        if(SessionHelper::isLoggedIn()){
                            echo "<a class='nav-link' href='/DA_MaNguonMo/account/logout'>Logout</a>";
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">