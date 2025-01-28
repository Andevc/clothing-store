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
                /* $routes = [
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
                } */
            

                if (isset($_GET['dashboard'])) {

                    include("dashboard.php");

                }

                if (isset($_GET['insert_product'])) {

                    include("insert_product.php");

                }

                if (isset($_GET['view_products'])) {

                    include("view_products.php");

                }

                if (isset($_GET['delete_product'])) {

                    include("delete_product.php");

                }

                if (isset($_GET['edit_product'])) {

                    include("edit_product.php");

                }

                if (isset($_GET['insert_p_cat'])) {

                    include("insert_p_cat.php");

                }

                if (isset($_GET['view_p_cats'])) {

                    include("view_p_cats.php");

                }

                if (isset($_GET['delete_p_cat'])) {

                    include("delete_p_cat.php");

                }

                if (isset($_GET['edit_p_cat'])) {

                    include("edit_p_cat.php");

                }

                if (isset($_GET['insert_cat'])) {

                    include("insert_cat.php");

                }

                if (isset($_GET['view_cats'])) {

                    include("view_cats.php");

                }

                if (isset($_GET['delete_cat'])) {

                    include("delete_cat.php");

                }

                if (isset($_GET['edit_cat'])) {

                    include("edit_cat.php");

                }

                if (isset($_GET['insert_slide'])) {

                    include("insert_slide.php");

                }


                if (isset($_GET['view_slides'])) {

                    include("view_slides.php");

                }

                if (isset($_GET['delete_slide'])) {

                    include("delete_slide.php");

                }


                if (isset($_GET['edit_slide'])) {

                    include("edit_slide.php");

                }


                if (isset($_GET['view_customers'])) {

                    include("view_customers.php");

                }

                if (isset($_GET['customer_delete'])) {

                    include("customer_delete.php");

                }


                if (isset($_GET['view_orders'])) {

                    include("view_orders.php");

                }

                if (isset($_GET['order_delete'])) {

                    include("order_delete.php");

                }


                if (isset($_GET['view_payments'])) {

                    include("view_payments.php");

                }

                if (isset($_GET['payment_delete'])) {

                    include("payment_delete.php");

                }

                if (isset($_GET['insert_user'])) {

                    include("insert_user.php");

                }

                if (isset($_GET['view_users'])) {

                    include("view_users.php");

                }


                if (isset($_GET['user_delete'])) {

                    include("user_delete.php");

                }



                if (isset($_GET['user_profile'])) {

                    include("user_profile.php");

                }

                if (isset($_GET['insert_box'])) {

                    include("insert_box.php");

                }

                if (isset($_GET['view_boxes'])) {

                    include("view_boxes.php");

                }

                if (isset($_GET['delete_box'])) {

                    include("delete_box.php");

                }

                if (isset($_GET['edit_box'])) {

                    include("edit_box.php");

                }

                if (isset($_GET['insert_term'])) {

                    include("insert_term.php");

                }

                if (isset($_GET['view_terms'])) {

                    include("view_terms.php");

                }

                if (isset($_GET['delete_term'])) {

                    include("delete_term.php");

                }

                if (isset($_GET['edit_term'])) {

                    include("edit_term.php");

                }

                if (isset($_GET['edit_css'])) {

                    include("edit_css.php");

                }

                if (isset($_GET['insert_manufacturer'])) {

                    include("insert_manufacturer.php");

                }

                if (isset($_GET['view_manufacturers'])) {

                    include("view_manufacturers.php");

                }

                if (isset($_GET['delete_manufacturer'])) {

                    include("delete_manufacturer.php");

                }

                if (isset($_GET['edit_manufacturer'])) {

                    include("edit_manufacturer.php");

                }


                if (isset($_GET['insert_coupon'])) {

                    include("insert_coupon.php");

                }

                if (isset($_GET['view_coupons'])) {

                    include("view_coupons.php");

                }

                if (isset($_GET['delete_coupon'])) {

                    include("delete_coupon.php");

                }


                if (isset($_GET['edit_coupon'])) {

                    include("edit_coupon.php");

                }


                if (isset($_GET['insert_icon'])) {

                    include("insert_icon.php");

                }


                if (isset($_GET['view_icons'])) {

                    include("view_icons.php");

                }

                if (isset($_GET['delete_icon'])) {

                    include("delete_icon.php");

                }

                if (isset($_GET['edit_icon'])) {

                    include("edit_icon.php");

                }

                if (isset($_GET['insert_bundle'])) {

                    include("insert_bundle.php");

                }

                if (isset($_GET['view_bundles'])) {

                    include("view_bundles.php");

                }

                if (isset($_GET['delete_bundle'])) {

                    include("delete_bundle.php");

                }


                if (isset($_GET['edit_bundle'])) {

                    include("edit_bundle.php");

                }


                if (isset($_GET['insert_rel'])) {

                    include("insert_rel.php");

                }

                if (isset($_GET['view_rel'])) {

                    include("view_rel.php");

                }

                if (isset($_GET['delete_rel'])) {

                    include("delete_rel.php");

                }


                if (isset($_GET['edit_rel'])) {

                    include("edit_rel.php");

                }


                if (isset($_GET['edit_contact_us'])) {

                    include("edit_contact_us.php");

                }

                if (isset($_GET['insert_enquiry'])) {

                    include("insert_enquiry.php");

                }


                if (isset($_GET['view_enquiry'])) {

                    include("view_enquiry.php");

                }

                if (isset($_GET['delete_enquiry'])) {

                    include("delete_enquiry.php");

                }

                if (isset($_GET['edit_enquiry'])) {

                    include("edit_enquiry.php");

                }


                if (isset($_GET['edit_about_us'])) {

                    include("edit_about_us.php");

                }


                if (isset($_GET['insert_store'])) {

                    include("insert_store.php");

                }

                if (isset($_GET['view_store'])) {

                    include("view_store.php");

                }

                if (isset($_GET['delete_store'])) {

                    include("delete_store.php");

                }

                if (isset($_GET['edit_store'])) {

                    include("edit_store.php");

                }

            
            
            
            ?>

            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

