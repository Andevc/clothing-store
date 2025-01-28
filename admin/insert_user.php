<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';

use Illuminate\Database\Capsule\Manager as DB;

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    exit;
}
?>

<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert User
            </li>

        </ol>

    </div>

</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert User
                </h3>

            </div>

            <div class="panel-body">

                <form class="form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password: </label>
                        <div class="col-md-6">
                            <input type="password" name="admin_pass" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Country: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Job: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_job" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control" required>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-md-3 control-label">User Image: </label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control" required>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php

if (isset($_POST['submit'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_country = $_POST['admin_country'];
    $admin_job = $_POST['admin_job'];
    $admin_contact = $_POST['admin_contact'];
    $admin_image = '';

    DB::table('admins')->insert([
        'admin_name' => $admin_name,
        'admin_email' => $admin_email,
        'admin_pass' => $admin_pass,
        'admin_image' => $admin_image,
        'admin_contact' => $admin_contact,
        'admin_country' => $admin_country,
        'admin_job' => $admin_job,
    ]);

    echo "<script>alert('One User Has Been Inserted successfully')</script>";
    echo "<script>window.open('index.php?view_users','_self')</script>";
}

?>


