<?php

    session_start();

    use Illuminate\Database\Capsule\Manager as DB;
    
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
        exit;
    }

    // Obtener datos del Administrador

    $adminSession = $_SESSION['admin_email'];
    $admin = DB::table('admins')->where('admin_email', $adminSession)->first();

    if(!$admin){
        echo "<script>window.open('login.php','_self')</script>";
        exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/logo-icon.png" type="image/png">
</head>
<body>
    <div id="wrapper">
        <?php include("includes/sidebar.php"); ?>
 
        <div id="page-wrapper">
            <div class="container-fluid">
            <?php
                $routes = [
                    'dashboard' => 'dashboard.php',
                    'insert_product' => 'insert_product.php',
                    'view_products' => 'view_products.php',
                    'delete_product' => 'delete_product.php',
                    'edit_product' => 'edit_product.php',
                    'insert_p_cat' => 'insert_p_cat.php',
                    'view_p_cats' => 'view_p_cats.php',
                    'delete_p_cat' => 'delete_p_cat.php',
                    'edit_p_cat' => 'edit_p_cat.php',
                    'insert_cat' => 'insert_cat.php',
                    'view_cats' => 'view_cats.php',
                    'delete_cat' => 'delete_cat.php',
                    'edit_cat' => 'edit_cat.php',
                    'insert_slide' => 'insert_slide.php',
                    'view_slides' => 'view_slides.php',
                    'delete_slide' => 'delete_slide.php',
                    'edit_slide' => 'edit_slide.php',
                    'view_customers' => 'view_customers.php',
                    'customer_delete' => 'customer_delete.php',
                    'view_orders' => 'view_orders.php',
                    'order_delete' => 'order_delete.php',
                    'view_payments' => 'view_payments.php',
                    'payment_delete' => 'payment_delete.php',
                    'insert_user' => 'insert_user.php',
                    'view_users' => 'view_users.php',
                    'user_delete' => 'user_delete.php',
                    'user_profile' => 'user_profile.php',
                    'insert_box' => 'insert_box.php',
                    'view_boxes' => 'view_boxes.php',
                    'delete_box' => 'delete_box.php',
                    'edit_box' => 'edit_box.php',
                    'insert_term' => 'insert_term.php',
                    'view_terms' => 'view_terms.php',
                    'delete_term' => 'delete_term.php',
                    'edit_term' => 'edit_term.php',
                    'edit_css' => 'edit_css.php',
                    'insert_manufacturer' => 'insert_manufacturer.php',
                    'view_manufacturers' => 'view_manufacturers.php',
                    'delete_manufacturer' => 'delete_manufacturer.php',
                    'edit_manufacturer' => 'edit_manufacturer.php',
                    'insert_coupon' => 'insert_coupon.php',
                    'view_coupons' => 'view_coupons.php',
                    'delete_coupon' => 'delete_coupon.php',
                    'edit_coupon' => 'edit_coupon.php',
                    'insert_icon' => 'insert_icon.php',
                    'view_icons' => 'view_icons.php',
                    'delete_icon' => 'delete_icon.php',
                    'edit_icon' => 'edit_icon.php',
                    'insert_bundle' => 'insert_bundle.php',
                    'view_bundles' => 'view_bundles.php',
                    'delete_bundle' => 'delete_bundle.php',
                    'edit_bundle' => 'edit_bundle.php',
                    'insert_rel' => 'insert_rel.php',
                    'view_rel' => 'view_rel.php',
                    'delete_rel' => 'delete_rel.php',
                    'edit_rel' => 'edit_rel.php',
                    'edit_contact_us' => 'edit_contact_us.php',
                    'insert_enquiry' => 'insert_enquiry.php',
                    'view_enquiry' => 'view_enquiry.php',
                    'delete_enquiry' => 'delete_enquiry.php',
                    'edit_enquiry' => 'edit_enquiry.php',
                    'edit_about_us' => 'edit_about_us.php',
                    'insert_store' => 'insert_store.php',
                    'view_store' => 'view_store.php',
                    'delete_store' => 'delete_store.php',
                    'edit_store' => 'edit_store.php'
                ];

                foreach ($routes as $key => $file) {
                    if (isset($_GET[$key])) {
                        include($file);
                        break; // Detiene el bucle una vez que se ha encontrado la ruta
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

