<?php

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../database/db_connector.php';

if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
  exit;
}

if (isset($_GET['edit_product'])) {
  $product_id = $_GET['edit_product'];

  $product = DB::table('products')
    ->where('product_id', $product_id)
    ->first();

  if (!$product) {
    die('The prodcut does not exist');
  }

  $p_id = $product->product_id;
  $p_cat = $product->p_cat_id;
  $m_id = $product->manufacturer_id;

  $p_title = $product->product_title;
  $p_url = $product->product_url;
  $p_image1 = $product->product_img1;
  $p_stock = $product->product_stock;
  $p_price = $product->product_price;
  $psp_price = $product->product_psp_price;
  $p_desc = $product->product_desc;
  $p_features = $product->product_features;
  $p_keywords = $product->product_keywords;
  $p_label = $product->product_label;
  $p_status = $product->status;
  $p_user_type = $product->product_user_type;

  $new_p_image1 = $product->product_img1;

  // Obtener el fabricante
  $manufacturer = DB::table('manufacturers')->where('manufacturer_id', $m_id)->first();
  if ($manufacturer) {
    $manufacturer_id = $manufacturer->manufacturer_id;
    $manufacturer_title = $manufacturer->manufacturer_title;
  }

  // Obtener la categoría del producto
  $product_category = DB::table('product_categories')->where('p_cat_id', $p_cat)->first();

  if ($product_category) {
    $p_cat_title = $product_category->p_cat_title;
  }
}
?>


<div class="row">

  <div class="col-lg-12">

    <ol class="breadcrumb">

      <li class="active">

        <i class="fa fa-dashboard"> </i> Dashboard / Edit Products

      </li>

    </ol>

  </div>

</div>


<div class="row">

  <div class="col-lg-12">

    <div class="panel panel-default">

      <div class="panel-heading">

        <h3 class="panel-title">

          <i class="fa fa-money fa-fw"></i> Edit Products

        </h3>

      </div>

      <div class="panel-body">

        <form class="form-horizontal" method="post" enctype="multipart/form-data">

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Title </label>

            <div class="col-md-6">

              <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

            </div>

          </div>


          <div class="form-group">

            <label class="col-md-3 control-label"> Product Url </label>

            <div class="col-md-6">

              <input type="text" name="product_url" class="form-control" required value="<?php echo $p_url; ?>">

              <br>

              <p style="font-size:15px; font-weight:bold;">

                Product Url Example : navy-blue-t-shirt

              </p>

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Select A Manufacturer </label>

            <div class="col-md-6">

              <select name="manufacturer" class="form-control">

                <option value="<?php echo $manufacturer_id; ?>">
                  <?php echo $manufacturer_title; ?>
                </option>

                <?php

                $get_manufacturer = "select * from manufacturers";

                $run_manufacturer = mysqli_query($con, $get_manufacturer);

                while ($row_manfacturer = mysqli_fetch_array($run_manufacturer)) {

                  $manufacturer_id = $row_manfacturer['manufacturer_id'];

                  $manufacturer_title = $row_manfacturer['manufacturer_title'];

                  echo "<option value='$manufacturer_id'>$manufacturer_title</option>";
                }

                ?>

              </select>

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Category </label>

            <div class="col-md-6">

              <select name="product_cat" class="form-control">

                <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>


                <?php

                $get_p_cats = "select * from product_categories";

                $run_p_cats = mysqli_query($con, $get_p_cats);

                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                  $p_cat_id = $row_p_cats['p_cat_id'];

                  $p_cat_title = $row_p_cats['p_cat_title'];

                  echo "<option value='$p_cat_id' >$p_cat_title</option>";
                }


                ?>


              </select>

            </div>

          </div>


          <div class="form-group">

            <label class="col-md-3 control-label"> Product Image 1 </label>

            <div class="col-md-6">

              <input type="file" name="product_img1" class="form-control">
              <br><img src="product_images/<?php echo $p_image1; ?>" width="70" height="70">

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Image 2 </label>

            <div class="col-md-6">

              <input type="file" name="product_img2" class="form-control">
              <br><img src="product_images/<?php echo $p_image2; ?>" width="70" height="70">

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Image 3 </label>

            <div class="col-md-6">

              <input type="file" name="product_img3" class="form-control">
              <br><img src="product_images/<?php echo $p_image3; ?>" width="70" height="70">

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Price </label>

            <div class="col-md-6">

              <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Sale Price </label>

            <div class="col-md-6">

              <input type="text" name="psp_price" class="form-control" required value="<?php echo $psp_price; ?>">

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Keywords </label>

            <div class="col-md-6">

              <input type="text" name="product_keywords" class="form-control" required
                value="<?php echo $p_keywords; ?>">

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

                <li>

                  <a data-toggle="tab" href="#video"> Sounds And Videos </a>

                </li>

              </ul>

              <div class="tab-content">

                <div id="description" class="tab-pane fade in active">

                  <br>

                  <textarea name="product_desc" class="form-control" rows="15" id="product_desc">
                  <?php echo $p_desc; ?>
                </textarea>

                </div>


                <div id="features" class="tab-pane fade in">

                  <br>

                  <textarea name="product_features" class="form-control" rows="15" id="product_features">
                  <?php echo $p_features; ?>
                </textarea>

                </div>


                <div id="video" class="tab-pane fade in">

                  <br>

                  <textarea name="product_video" class="form-control" rows="15">
                  <?php echo $p_video; ?>
                </textarea>

                </div>


              </div>

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"> Product Label </label>

            <div class="col-md-6">

              <input type="text" name="product_label" class="form-control" required value="<?php echo $p_label; ?>">

            </div>

          </div>

          <div class="form-group">

            <label class="col-md-3 control-label"></label>

            <div class="col-md-6">

              <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>