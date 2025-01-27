<?php

    use Illuminate\Database\Capsule\Manager as DB;
    
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../database/db_connector.php';

 
    if (!isset($_SESSION['admin_email'])) {

        echo "<script>window.open('login.php','_self')</script>";
        exit;
    } 

    $products = DB::table('products')->get();

    function getSoldCount($product_id){
        return DB::table('pending_orders')->where('product_id',$product_id)->count();
    }
?>

 
<!-- Icon Dashboard -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Products
            </li>
        </ol>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Products
                    </h3>
                </div>

                <!-- Panel -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Sold</th>
                                    <th>Keywords</th>
                                    <th>Stock</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($products as $index => $product): ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= htmlspecialchars($product->product_title); ?></td>
                                        <td>
                                            <img src="<?= htmlspecialchars($product->product_img1); ?>" alt="product_image" width="100">
                                        </td>
                                        <td><?= htmlspecialchars($product->product_price); ?></td>

                                        <td><?= getSoldCount($product->product_id) ; ?></td>

                                        <td><?= htmlspecialchars($product->product_keywords); ?></td>
                                        <td><?= htmlspecialchars($product->product_stock); ?></td>
                                        <td><?= htmlspecialchars($product->date); ?></td>
                                        
                                        <td>
                                            <a href="index.php?product_edit=<?= $product->product_id; ?>">
                                                <i class="fa fa-pencil"> </i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?product_delete=<?= $product->product_id; ?>">
                                                <i class="fa fa-trash-o"> </i> Delete
                                            </a>
                                        </td>
                                        
                                    </tr>
                                <?php endforeach;?>
                            </tbody>

                        </table><!-- table table-bordered table-hover table-striped Ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
