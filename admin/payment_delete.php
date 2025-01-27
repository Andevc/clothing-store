<?php

    use Illuminate\Database\Capsule\Manager as DB;
        
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

    if(!isset($_SESSION['admin_email'])){

        echo "<script>window.open('login.php','_self')</script>";
        exit;
    }


    if(isset($_GET['payment_delete'])){

        $delete_id = $_GET['payment_delete'];
        $run_delete = DB::table('payments')->where('payment_id', $delete_id)->delete();
        
    

        if($run_delete){       

            echo "<script>alert('One Bundle Has been deleted')</script>";

            echo "<script>window.open('index.php?view_bundles','_self')</script>";

        }

    }  