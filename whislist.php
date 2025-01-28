<?php

use Illuminate\Database\Capsule\Manager as DB;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';



// Verifica si el usuario está autenticado
if (!isset($_SESSION['customer_email'])) {
    echo "<p class='alert alert-danger'>Por favor, inicia sesión para ver tu lista de deseos.</p>";
    exit;
}

$customerEmail = $_SESSION['customer_email'];

// Obtén el ID del cliente usando el correo electrónico
$customer = DB::table('customers')->where('customer_email', $customerEmail)->first();

if (!$customer) {
    echo "<p class='alert alert-danger'>Cliente no encontrado.</p>";
    exit;
}

$customerId = $customer->customer_id;

// Obtén los productos en la wishlist del cliente
$wishlistItems = DB::table('wishlist')
    ->join('products', 'wishlist.product_id', '=', 'products.product_id')
    ->where('wishlist.customer_id', $customerId)
    ->select('wishlist.wishlist_id', 'products.product_title', 'products.product_url', 'products.product_img1')
    ->get();
?>

<center>
    <h1>My Wishlist</h1>
    <p class="lead">Your all Wishlist Products on one place.</p>
</center>
<hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Wishlist No:</th>
                <th>Wishlist Product</th>
                <th>Delete Wishlist</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            <?php foreach ($wishlistItems as $item): ?>
                <?php $i++; ?>
                <tr>
                    <td width="100"> <?php echo $i; ?> </td>
                    <td>
                        <img src="../admin_area/product_images/<?php echo $item->product_img1; ?>" width="60" height="60">
                        &nbsp;&nbsp;&nbsp;
                        <a href="../<?php echo $item->product_url; ?>">
                            <?php echo $item->product_title; ?>
                        </a>
                    </td>
                    <td>
                        <a href="my_account.php?delete_wishlist=<?php echo $item->wishlist_id; ?>" class="btn btn-primary">
                            <i class="fa fa-trash-o"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
