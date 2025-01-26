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
                        // Agrega aquí las demás rutas
                    ];

                    foreach ($routes as $key => $file) {
                        if (isset($_GET[$key])) {
                            include($file);
                            break;
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

