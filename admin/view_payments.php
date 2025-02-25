<?php

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

$items_table = DB::table('payments')->get();


?>


<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Payments

            </li>

        </ol>

    </div>

</div>


<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"> </i> View Payments

                </h3>

            </div>

            <div class="panel-body">

                <div class="table-responsive">

                    <table class="table table-hover table-bordered table-striped">

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Invoice No</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Reference #</th>
                                <th>Payment Code</th>
                                <th>Payment Date</th>
                                <th>Action</th>

                            </tr>

                        </thead>
                            
                        <tbody>

                            <?php foreach($items_table as $index => $item): ?>
                                    <tr>
                                        <td><?= $index + 1;?></td>
                                        <td><?= htmlspecialchars($item->invoice_no); ?></td>
                                        <td><?= htmlspecialchars($item->amount); ?></td>
                                        <td><?= htmlspecialchars($item->payment_mode); ?></td>
                                        <td><?= htmlspecialchars($item->ref_no); ?></td>
                                        <td><?= htmlspecialchars($item->code); ?></td>
                                        <td><?= htmlspecialchars($item->payment_date); ?></td>
                                        <td>
                                            <a href="index.php?payment_delete=<?= $item->admin_id; ?>">
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