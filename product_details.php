<?php
use Illuminate\Database\Capsule\Manager as DB;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';

// Obtener filtros
$manufacturers = DB::table('manufacturers')->get();
$productCategories = DB::table('product_categories')->get();

// Validar si se pasó un ID de producto
$product_id = $_GET['product_id'] ?? null;
if (!$product_id) {
    die('Product ID is required.');
}

// Obtener detalles del producto
$product = DB::table('products')->where('product_id', $product_id)->first();
if (!$product) {
    die('Product not found.');
}

// Manejo de acciones (Agregar a wishlist o carrito)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $customer_id = 1; // Simulación de ID de cliente. Cambiar por autenticación real.

    if ($action === 'add_to_wishlist') {
        // Agregar a la wishlist
        DB::table('wishlist')->insert([
            'customer_id' => $customer_id,
            'product_id' => $product_id,
        ]);
        echo '<p>Product added to wishlist!</p>';
    } elseif ($action === 'add_to_cart') {
        // Agregar al carrito
        $quantity = (int) $_POST['quantity'] ?? 1;
        $size = $_POST['size'] ?? 'N/A';
        $due_amount = $product->product_psp_price ?? $product->product_price;

        DB::table('customer_orders')->insert([
            'customer_id' => $customer_id,
            'product_id' => $product_id,
            'qty' => $quantity,
            'size' => $size,
            'due_amount' => $due_amount * $quantity,
            'invoice_no' => uniqid('INV'),
            'order_status' => 'Pending',
        ]);
        echo '<p>Product added to cart!</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="path_to_your_styles.css">
</head>
<body>

<div class="product-details-container">
    <div class="product-image">
        <img src="<?= $product->product_img1 ?>" alt="<?= $product->product_title ?>">
    </div>

    <div class="product-info">
        <h1><?= $product->product_title ?></h1>
        <p><?= $product->product_desc ?></p>
        <p>Price: $<?= $product->product_price ?></p>
        <?php if ($product->product_psp_price): ?>
            <p>Discount Price: $<?= $product->product_psp_price ?></p>
        <?php endif; ?>
        <p>Stock: <?= $product->product_stock ?></p>

        <form method="POST">
            <input type="hidden" name="action" value="add_to_cart">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?= $product->product_stock ?>">

            <label for="size">Size:</label>
            <select name="size" id="size">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>

            <button type="submit">Add to Cart</button>
        </form>

        <form method="POST">
            <input type="hidden" name="action" value="add_to_wishlist">
            <button type="submit">Add to Wishlist</button>
        </form>
    </div>
</div>

</body>
</html>
