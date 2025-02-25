<?php

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';


if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

$items_table = DB::table('coupons as c')
    ->join('products as p','c.product_id', '=', 'p.product_id' )
    ->get();

    

?>

    <div class="row">

        <div class="col-lg-12">

            <ol class="breadcrumb">

                <li class="active">

                    <i class="fa fa-dashboard"></i> Dashboard / View Coupons

                </li>

            </ol>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">

                        <i class="fa fa-money fa-fw"></i> View Coupons

                    </h3>

                </div>

                <div class="panel-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped">

                            <thead>

                                <tr>

                                    <th>#</th>
                                    <th>Title </th>
                                    <th>Product </th>
                                    <th>Coupon Price </th>
                                    <th>Code </th>
                                    <th>Limit </th>
                                    <th>Used </th>
                                    <th>Delete </th>
                                    <th>Edit </th>

                                </tr>

                            </thead>

                            <tbody>
                            <?php foreach($items_table as $index => $item): ?>
                                <tr>

                                    <td><?= $index + 1;?></td>
                                    
                                    <td><?= htmlspecialchars($item->coupon_title); ?></td>
                                    <td><?= htmlspecialchars($item->product_title); ?></td>
                                    <td><?= htmlspecialchars($item->coupon_price); ?></td>
                                    <td><?= htmlspecialchars($item->coupon_code); ?></td>
                                    <td><?= htmlspecialchars($item->coupon_limit); ?></td>
                                    <td><?= htmlspecialchars($item->coupon_used); ?></td>
                                    
                                    <td>
                                        <a href="index.php?delete_coupon=<?= $item->coupon_id; ?>">
                                            <i class="fa fa-trash-o"> </i> Delete
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?edit_coupon=<?= $item->coupon_id; ?>">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                                <?php

                                $i = 0;

                                $get_coupons = "select * from coupons";

                                $run_coupons = mysqli_query($con, $get_coupons);

                                while ($row_coupons = mysqli_fetch_array($run_coupons)) {

                                    $coupon_id = $row_coupons['coupon_id'];

                                    $product_id = $row_coupons['product_id'];

                                    $coupon_title = $row_coupons['coupon_title'];

                                    $coupon_price = $row_coupons['coupon_price'];

                                    $coupon_code = $row_coupons['coupon_code'];

                                    $coupon_limit = $row_coupons['coupon_limit'];

                                    $coupon_used = $row_coupons['coupon_used'];


                                    $get_products = "select * from products where product_id='$product_id'";

                                    $run_products = mysqli_query($con, $get_products);

                                    $row_products = mysqli_fetch_array($run_products);

                                    $product_title = $row_products['product_title'];

                                    $i++;

                                ?>

                                    <tr>

                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $coupon_title; ?></td>

                                        <td><?php echo $product_title; ?></td>

                                        <td><?php echo "$$coupon_price"; ?></td>

                                        <td><?php echo $coupon_code; ?></td>

                                        <td><?php echo $coupon_limit; ?></td>

                                        <td><?php echo $coupon_used; ?></td>

                                        <td>

                                            <a href="index.php?delete_coupon=<?php echo $coupon_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>

                                        <td>

                                            <a href="index.php?edit_coupon=<?php echo $coupon_id; ?>">

                                                <i class="fa fa-pencil"></i> Edit

                                            </a>

                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

