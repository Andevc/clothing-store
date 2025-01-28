<?php

    use Illuminate\Database\Capsule\Manager as DB;
        
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

    if(!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";
        exit;

    };

    if(isset($_GET['user_delete'])){
        $delete_id = $_GET['user_delete'];
        $run_delete = DB::table('admins')->where('admin_id', $delete_id)->delete();

        if($run_delete){
            echo "<script>alert('One Product Has been deleted')</script>";
            echo "<script>window.open('index.php?view_users','_self')</script>";

        }

    }
