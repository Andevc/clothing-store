<?php

    use Illuminate\Database\Capsule\Manager as DB;
        
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";
        exit;
    }


    if(isset($_GET['delete_bundle'])){

        $delete_id = $_GET['delete_bundle'];
        $delete_pro = DB::table('products')->where('product_id', $delete_id)->delete();
        $delete_rel = DB::table('bundle_product_relation')->where('bundle_id', $delete_id)->delete();
    

        if($run_rel){       

            echo "<script>alert('One Bundle Has been deleted')</script>";

            echo "<script>window.open('index.php?view_bundles','_self')</script>";

        }

    }

?>

