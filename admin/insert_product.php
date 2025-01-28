<?php
use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';
require_once __DIR__ . '/functions.php';

session_start();  // Asegúrate de iniciar la sesión

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
                        <label class="col-md-3 control-label"> Product Description </label>
                        <div class="col-md-6">
                            <input type="text" name="product_desc" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Product Features </label>
                        <div class="col-md-6">
                            <input type="text" name="product_features" class="form-control" required>
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
require_once __DIR__ . '/service/cloudinary.php';  // Corregir la ruta

if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $product_title = filter_input(INPUT_POST, 'product_title', FILTER_SANITIZE_STRING);
    $product_cat = filter_input(INPUT_POST, 'product_cat', FILTER_SANITIZE_NUMBER_INT);
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_NUMBER_INT);
    $product_price = filter_input(INPUT_POST, 'product_price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $product_desc = filter_input(INPUT_POST, 'product_desc', FILTER_SANITIZE_STRING);
    $product_keywords = filter_input(INPUT_POST, 'product_keywords', FILTER_SANITIZE_STRING);
    $psp_price = filter_input(INPUT_POST, 'psp_price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $stock = filter_input(INPUT_POST, 'product_stock', FILTER_SANITIZE_NUMBER_INT);
    $product_label = filter_input(INPUT_POST, 'product_label', FILTER_SANITIZE_STRING);
    
    $product_url = generateUrlForProduct($product_title);
    $product_features = filter_input(INPUT_POST, 'product_features', FILTER_SANITIZE_STRING);
    $status = "product";
    
    // Subir imagen
    $product_file = $_FILES['product_img1'];
    $product_image_url = get_url_from_cloudinary($product_file, $product_title);

    // Preparar el array para la base de datos
    $insert_product = [
        'p_cat_id' => $product_cat,
        'manufacturer_id' => $manufacturer_id,
        'date' => date('Y-m-d H:i:s'),
        'product_title' => $product_title,
        'product_url' => $product_url,
        'product_img1' => $product_image_url,
        'product_stock' => $stock,
        'product_price' => $product_price,
        'product_psp_price' => $psp_price,
        'product_desc' => $product_desc,
        'product_features' => $product_features,
        'product_keywords' => $product_keywords,
        'product_label' => $product_label,
        'status' => $status
    ];

    try {
        // Insertar el producto
        $run_product = DB::table('products')->insert($insert_product);

        if ($run_product) {
            echo "<script>alert('Product has been inserted successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    } catch (Exception $e) {
        echo "Error al insertar el producto: " . $e->getMessage();
    }
}
?>

