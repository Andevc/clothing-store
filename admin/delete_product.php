<?php

    use Illuminate\Database\Capsule\Manager as DB;
        
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

    if(!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";
        exit;

    };

    if(isset($_GET['delete_product'])){
        $delete_id = $_GET['delete_product'];
        $run_delete = DB::table('products')->where('product_id', $delete_id)->delete();

        if($run_delete){
            echo "<script>alert('One Product Has been deleted')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";

    }

    }


