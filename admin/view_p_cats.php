<?php

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

$items_table = DB::table('product_categories')->get();

?>
<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Products Categories

            </li>

        </ol>

    </div>

</div>


<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"> </i> View Products Categories

                </h3>

            </div>

            <div class="panel-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped">
                        

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>


                            </tr>

                        </thead>

                        <tbody>
                        <?php foreach($items_table as $index => $item): ?>
                            <tr>

                                <td><?= $index + 1;?></td>
                                
                                <td><?= htmlspecialchars($item->p_cat_title); ?></td>
                                
                                <td>
                                    <a href="index.php?delete_p_cat=<?= $item->p_cat_id; ?>">
                                        <i class="fa fa-trash-o"> </i> Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?edit_p_cat=<?= $item->p_cat_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
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