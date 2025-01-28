<?php
session_start(); // Iniciar sesión para verificar si el usuario está autenticado

// Verificar si el usuario está logueado
$isLoggedIn = isset($_SESSION['user_id']);
$customerName = $isLoggedIn ? $_SESSION['user_name'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>
<body>
<header class="page-header">
    <!-- Topline -->
    <div class="page-header__topline">
        <div class="container clearfix">
            <div class="basket">
                <a href="cart.php" class="btn btn--basket">
                    <i class="icon-basket"></i>
                    <?php
                    // Mostrar cantidad de ítems en el carrito
                    echo isset($_SESSION['cart_items']) ? count($_SESSION['cart_items']) : 0; 
                    ?> items
                </a>
            </div>
            <ul class="login">
                <li class="login__item">
                    <?php if (!$isLoggedIn): ?>
                        <a href="customer_register.php" class="login__link">Register</a>
                    <?php else: ?>
                        <span class="login__link">Welcome, <?= htmlspecialchars($customerName) ?>!</span>
                    <?php endif; ?>
                </li>
                <li class="login__item">
                    <?php if (!$isLoggedIn): ?>
                        <a href="login.php" class="login__link">Sign In</a>
                    <?php else: ?>
                        <a href="logout.php" class="login__link">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- Bottomline -->
    <div class="page-header__bottomline">
        <div class="container clearfix">
            <div class="logo">
                <a class="logo__link" href="index.php">
                    <img class="logo__img" src="images/logo.png" alt="Your Logo" width="237" height="19">
                </a>
            </div>
            <nav class="main-nav">
                <ul class="categories">
                    <!-- Shop -->
                    <li class="categories__item">
                        <a class="categories__link" href="shop.php">Shop</a>
                    </li>
                    <!-- Wishlist -->
                    <li class="categories__item">
                        <a class="categories__link" href="wishlist.php">Wishlist</a>
                    </li>
                    <!-- Cart -->
                    <li class="categories__item">
                        <a class="categories__link" href="cart.php">Cart</a>
                    </li>
                    <!-- My Account (Solo para usuarios logueados) -->
                    <?php if ($isLoggedIn): ?>
                        <li class="categories__item">
                            <a class="categories__link" href="customer/my_account.php?my_orders">
                                My Account
                                <i class="icon-down-open-1"></i>
                            </a>
                            <div class="dropdown dropdown--lookbook">
                                <div class="clearfix">
                                    <div class="dropdown__half">
                                        <div class="dropdown__heading">Account Settings</div>
                                        <ul class="dropdown__items">
                                            <li class="dropdown__item">
                                                <a href="wishlist.php" class="dropdown__link">My Wishlist</a>
                                            </li>
                                            <li class="dropdown__item">
                                                <a href="customer/my_account.php?my_orders" class="dropdown__link">My Orders</a>
                                            </li>
                                            <li class="dropdown__item">
                                                <a href="cart.php" class="dropdown__link">View Shopping Cart</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dropdown__half">
                                        <div class="dropdown__heading"></div>
                                        <ul class="dropdown__items">
                                            <li class="dropdown__item">
                                                <a href="customer/my_account.php?edit_account" class="dropdown__link">Edit Your Account</a>
                                            </li>
                                            <li class="dropdown__item">
                                                <a href="customer/my_account.php?change_password" class="dropdown__link">Change Password</a>
                                            </li>
                                            <li class="dropdown__item">
                                                <a href="customer/my_account.php?delete_account" class="dropdown__link">Delete Account</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
</body>
</html>
