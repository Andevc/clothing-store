<?php


    use Illuminate\Database\Capsule\Manager as DB;
    
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';
    
    require_once __DIR__ . '/functions.php';

    if (!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
        exit;
    }
?>
<!-- Titulo de la parte del dashboard main -->
<div class="row">
    <div class="col-lg-12">
        <!-- <h1 class="page-header">Dashboard</h1> -->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>


<div class="row"><!-- 2 row Starts -->

    <!-- Count Products -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"> </i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">

                            <?= getCount('products');?> 
                        </div>

                        <div>Products</div>
                    </div>
                </div>
            </div>

            <a href="index.php?view_products">
                <div class="panel-footer"><!-- panel-footer Starts -->
                    <span class="pull-left"> View Details </span>
                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                    <div class="clearfix"></div>
                </div>
            </a>

        </div>
    </div>

    <!-- Count Customers -->

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-green">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-comments fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> <?= getCount('customers');?>  </div>

                        <div>Customers</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_customers">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <!-- Products Categories -->
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-yellow"><!-- panel panel-yellow Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-shopping-cart fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> <?= getCount('product_categories');?> </div>

                        <div>Products Categories</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_p_cats">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <!-- Orders -->
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-red"><!-- panel panel-red Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-support fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> <?= getCount('customer_orders');?></div>

                        <div>Orders</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_orders">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

</div>

<div class="row">
    <!-- Total Earnings -->
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-success"><!-- panel panel-red Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-dollar fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> 
                            <?= $countTotalEarnings = DB::table('customer_orders')
                                ->sum('due_amount');
                            ?>
                        </div>

                        <div>Earnings</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_orders">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>


    <!-- Pending Orders -->
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-warning"><!-- panel panel-red Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-spinner fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge">
                            <?= $countPendingOrders = DB::table('customer_orders')
                                ->where('order_status', 'pending')
                                ->count();?>
                        
                        </div>

                        <div>Pending Orders</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_orders">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <!-- Completed Orders -->
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-info"><!-- panel panel-red Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-check fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> 
                            <?= $countCompletedOrders = DB::table('customer_orders')
                                ->where('order_status', 'Complete')
                                ->count();;?>
                        
                        </div>

                        <div>Completed Orders</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_orders">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 Starts -->

        <div class="panel panel-danger"><!-- panel panel-red Starts -->

            <div class="panel-heading"><!-- panel-heading Starts -->

                <div class="row"><!-- panel-heading row Starts -->

                    <div class="col-xs-3"><!-- col-xs-3 Starts -->

                        <i class="fa fa-percent fa-5x"> </i>

                    </div>

                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right Starts -->

                        <div class="huge"> <?= getCount('coupons');?></div>

                        <div>Total Coupons</div>

                    </div>

                </div>

            </div>

            <a href="index.php?view_orders">

                <div class="panel-footer"><!-- panel-footer Starts -->

                    <span class="pull-left"> View Details </span>

                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>
</div>


<?php

$orders = DB::table('pending_orders')
    ->join('customers', 'pending_orders.customer_id', '=', 'customers.customer_id')
    ->orderBy('pending_orders.order_id', 'desc')
    ->limit(5)
    ->get();

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> New Orders
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Invoice No</th>
                                <th>Product ID</th>
                                <th>Qty</th>
                                <th>Size</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $index => $order): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td><?= htmlspecialchars($order->customer_email); ?></td>
                                    <td><?= htmlspecialchars($order->invoice_no); ?></td>
                                    <td><?= htmlspecialchars($order->product_id); ?></td>
                                    <td><?= htmlspecialchars($order->qty); ?></td>
                                    <td><?= htmlspecialchars($order->size); ?></td>
                                    <td><?= $order->order_status === 'pending' ? 'Pending' : 'Complete'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_orders">
                        View All Orders <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


   