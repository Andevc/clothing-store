<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';

use Illuminate\Database\Capsule\Manager as DB;

session_start();

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

if (isset($_GET['user_profile'])) {
    $edit_id = $_GET['user_profile'];

    $admin = DB::table('admins')->where('admin_id', $edit_id)->first();

    if ($admin) {
        $admin_id = $admin->admin_id;
        $admin_name = $admin->admin_name;
        $admin_email = $admin->admin_email;
        $admin_pass = $admin->admin_pass;
        $admin_image = $admin->admin_image;
        $new_admin_image = $admin->admin_image;
        $admin_country = $admin->admin_country;
        $admin_job = $admin->admin_job;
        $admin_contact = $admin->admin_contact;
        $admin_about = $admin->admin_about;
    } else {
        echo "<script>alert('Admin not found');</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit;
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Profile
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit Profile
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">User Name: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Email: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Password: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_pass" class="form-control" required value="<?php echo $admin_pass; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Country: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Job: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_job" class="form-control" required value="<?php echo $admin_job; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Contact: </label>
                        <div class="col-md-6">
                            <input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User About: </label>
                        <div class="col-md-6">
                            <textarea name="admin_about" class="form-control" rows="3"><?php echo $admin_about; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">User Image: </label>
                        <div class="col-md-6">
                            <input type="file" name="admin_image" class="form-control">
                            <br>
                            <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update User" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_country = $_POST['admin_country'];
    $admin_job = $_POST['admin_job'];
    $admin_contact = $_POST['admin_contact'];
    $admin_about = $_POST['admin_about'];

    $admin_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];

    if (!empty($admin_image)) {
        move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
    } else {
        $admin_image = $new_admin_image;
    }

    DB::table('admins')->where('admin_id', $admin_id)->update([
        'admin_name' => $admin_name,
        'admin_email' => $admin_email,
        'admin_pass' => $admin_pass,
        'admin_image' => $admin_image,
        'admin_country' => $admin_country,
        'admin_job' => $admin_job,
        'admin_contact' => $admin_contact,
        'admin_about' => $admin_about
    ]);

    echo "<script>alert('User Has Been Updated successfully and login again');</script>";
    echo "<script>window.open('login.php','_self');</script>";
    session_destroy();
}
?>
