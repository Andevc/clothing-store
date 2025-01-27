<?php

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

$items_table = DB::table('admins')->get();


?>

<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Users

            </li>

        </ol>


    </div>

</div>


<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Users
                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Country</th>
                                <th>Job</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($items_table as $item): ?>
                                <tr>
                            <td><?= htmlspecialchars($item->admin_name); ?></td>
                                    <td><?= htmlspecialchars($item->admin_email); ?></td>
                                    <td><?= htmlspecialchars($item->admin_image); ?></td>
                                    <td><?= htmlspecialchars($item->admin_country); ?></td>
                                    <td><?= htmlspecialchars($item->admin_job); ?></td>
                                    <td>
                                        <a href="index.php?delete_user=<?= $item->admin_id; ?>">
                                            <i class="fa fa-trash-o"> </i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>