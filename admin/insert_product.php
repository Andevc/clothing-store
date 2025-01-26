<?php

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/service/cloudinary.php';

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

$manufacturers = DB::table('manufacturers')->get();
$product_categories = DB::table('product_categories')->get();

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"> </i> Dashboard / Insert Products
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert Products
                </h3>
            </div>
            <div class="panel-body">

                <form class="form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Title </label>
                        <div class="col-md-6">
                            <input type="text" name="product_title" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Select A Manufacturer </label>
                        <div class="col-md-6">
                            <select class="form-control" name="manufacturer">
                                <option> Select A Manufacturer </option>
                                <?php generateOptions('manufacturers', 'manufacturer_id', 'manufacturer_title') ?>

                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Category </label>
                        <div class="col-md-6">
                            <select name="product_cat" class="form-control">
                                <option> Select a Product Category </option>
                                <?php generateOptions('product_categories', 'p_cat_id', 'p_cat_title') ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label"> Stock </label>
                        <div class="col-md-6">
                            <input type="text" name="product_stock" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Price </label>
                        <div class="col-md-6">
                            <input type="text" name="product_price" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Sale Price </label>
                        <div class="col-md-6">
                            <input type="text" name="psp_price" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Keywords </label>
                        <div class="col-md-6">

                            <input type="text" name="product_keywords" class="form-control" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label"> Product Tabs </label>

                        <div class="col-md-6">

                            <ul class="nav nav-tabs">

                                <li class="active">

                                    <a data-toggle="tab" href="#description"> Product Description </a>

                                </li>

                                <li>

                                    <a data-toggle="tab" href="#features"> Product Features </a>

                                </li>

                            </ul>

                            <div class="tab-content">
                                <div id="description" class="tab-pane fade in active">

                                    <br>
                                    <textarea name="product_desc" class="form-control" rows="15" id="product_desc">
</textarea>
                                </div>

                                <div id="features" class="tab-pane fade in">
                                    <br>
                                    <textarea name="product_features" class="form-control" rows="15" id="product_features">

            </textarea>
                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 1 </label>
                        <div class="col-md-6">
                            <input type="file" name="product_img1" class="form-control" required>
                        </div>
                    </div>




                    <div class="form-group">

                        <label class="col-md-3 control-label"> Product Label </label>

                        <div class="col-md-6">

                            <input type="text" name="product_label" class="form-control" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-6">

                            <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<?php

if (isset($_POST['submit'])) {

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];

    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];

    $psp_price = $_POST['psp_price'];
    $stock = $_POST['product_stock'];
    $product_label = $_POST['product_label'];

    $product_url = generateUrlForProduct($product_title);

    $product_features = $_POST['product_features'];

    $status = "product";

    $product_file = $_FILES['product_img1']['tmp_name'];
    $product_image_url = get_url_from_cloudinary($product_file, $product_title);


    $insert_product = [
        'p_cat_id' => $product_cat,
        'manufacturer_id' => $manufacturer_id,
        'date' => date('Y-m-d H:i:s'),
        'product_title' => $p_title,
        'product_url' => $p_url,
        'product_img1' => $product_image_url,
        'product_stock' => $p_stock,
        'product_price' => $p_price,
        'product_psp_price' => $psp_price,
        'product_desc' => $p_desc,
        'product_features' => $p_features,
        'product_keywords' => $p_keywords,
        'product_label' => $p_label,
        'status' => $p_status,
        'product_user_type' => $p_user_type

    ];

    $run_product = DB::table('products')->insert($insert_product);

    if ($run_product) {

        echo "<script>alert('Product has been inserted successfully')</script>";

        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}

?>