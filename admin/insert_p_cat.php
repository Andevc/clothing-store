<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';

use Illuminate\Database\Capsule\Manager as DB;

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";

} else {
?>

    <div class="row">

        <div class="col-lg-12">

            <ol class="breadcrumb">

                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products Category
                </li>

            </ol>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Insert Product Category
                    </h3>

                </div>

                <div class="panel-body">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" name="p_cat_title" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Show as Top Product Category</label>
                            <div class="col-md-6">
                                <input type="radio" name="p_cat_top" value="yes" required>
                                <label> Yes </label>
                                <input type="radio" name="p_cat_top" value="no" required>
                                <label> No </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <?php

    if (isset($_POST['submit'])) {

        // Recoger datos del formulario
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_top = $_POST['p_cat_top'];
        $p_cat_image = ''; // En este caso no hay imagen en el formulario, pero se puede dejar el campo vacío.

        try {
            // Insertar los datos en la base de datos
            DB::table('product_categories')->insert([
                'p_cat_title' => $p_cat_title,
                'p_cat_top' => $p_cat_top,
                'p_cat_image' => $p_cat_image,
            ]);

            // Mensaje de éxito y redirección
            echo "<script>alert('New Product Category Has Been Inserted')</script>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";

        } catch (Exception $e) {
            // Manejo de errores
            echo "<script>alert('An error occurred: " . $e->getMessage() . "')</script>";
        }
    }
}
?>