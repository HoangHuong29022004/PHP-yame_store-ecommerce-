<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YAME Store</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="layout/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="layout/img/logo3.png" alt="YAME Store">
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Search Form -->
                <form class="search-form mx-auto">
                    <input type="text" placeholder="Tìm kiếm sản phẩm...">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

                <!-- Navigation Links -->
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pg=shop">Cửa Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pg=about">Giới Thiệu</a>
                    </li>

                    <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
                        <!-- User Profile -->
                        <li class="nav-item dropdown user-profile">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <img src="layout/img/people/<?= $_SESSION['hinh'] ?? 'default.jpg' ?>" alt="Profile">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="index.php?pg=profile_user">
                                        <i class="fas fa-user"></i>
                                        <?= $_SESSION['hoten'] ?? 'User' ?>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?pg=profile_user&act=user_updates">
                                        <i class="fas fa-cog"></i>
                                        Cài Đặt
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="index.php?pg=dangxuat">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Đăng Xuất
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Cart -->
                        <li class="nav-item">
                            <a class="nav-link cart-icon" href="index.php?pg=cart">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="cart-count"><?= isset($count_cart['soluong_cart']) ? $count_cart['soluong_cart'] : 0 ?></span>
                            </a>
                        </li>
                    <?php else: ?>
                        <!-- Login/Register -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="index.php?pg=dangky">
                                        <i class="fas fa-user-plus"></i>
                                        Đăng Ký
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?pg=dangnhap">
                                        <i class="fas fa-sign-in-alt"></i>
                                        Đăng Nhập
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cart-icon" href="index.php?pg=cart">
                                <i class="fas fa-shopping-bag"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Add scroll behavior -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>