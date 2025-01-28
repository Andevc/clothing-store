<?php
session_start();
?>

<nav class="navbar">
    <ul class="navbar__items">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Shop -->
            <li class="navbar__item">
                <a class="navbar__link" href="shop.php">Shop</a>
            </li>
            
            <!-- Wishlist -->
            <li class="navbar__item">
                <a class="navbar__link" href="wishlist.php">Wishlist</a>
            </li>
            
            <!-- Cart -->
            <li class="navbar__item">
                <a class="navbar__link" href="cart.php">Cart</a>
            </li>
            
            <!-- My Account -->
            <li class="navbar__item categories__item">
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
        <?php else: ?>
            <!-- Si el usuario no está logueado, mostrar solo un enlace de inicio de sesión -->
            <li class="navbar__item">
                <a class="navbar__link" href="login.php">Login</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<!-- Estilo básico para mejorar apariencia -->
<style>
    .navbar {
        background-color: #333;
        padding: 10px;
    }
    .navbar__items {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px;
    }
    .navbar__item {
        position: relative;
    }
    .navbar__link, .categories__link {
        color: white;
        text-decoration: none;
        font-size: 16px;
    }
    .dropdown {
        display: none;
        position: absolute;
        background-color: #444;
        padding: 10px;
        top: 100%;
        left: 0;
        z-index: 10;
        border-radius: 5px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }
    .dropdown__items {
        list-style: none;
        padding: 0;
    }
    .dropdown__item {
        margin: 5px 0;
    }
    .dropdown__link {
        color: white;
        text-decoration: none;
    }
    .categories__item:hover .dropdown {
        display: block;
    }
</style>
