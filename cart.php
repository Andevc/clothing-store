<?php


use Illuminate\Database\Capsule\Manager as DB;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';
// Simulación del ID del cliente (en un sistema real, esto debería venir de la sesión de usuario autenticado)
$customer_id = 1;

// Manejo de agregar productos al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'], $_POST['size'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];

    // Generar número de factura único
    $invoice_no = 'INV-' . strtoupper(uniqid());

    DB::table('customer_orders')->insert([
        'customer_id' => $customer_id,
        'product_id' => $product_id,
        'qty' => $quantity,
        'size' => $size,
        'due_amount' => DB::table('products')->where('product_id', $product_id)->value('product_price') * $quantity,
        'invoice_no' => $invoice_no,
        /* 'order_date' => now(), */
        'order_status' => 'Pending',
    ]);

    header('Location: cart.php');
    exit;
}

// Obtener productos en el carrito
$cartItems = DB::table('customer_orders')
    ->join('products', 'customer_orders.product_id', '=', 'products.product_id')
    ->where('customer_orders.customer_id', $customer_id)
    ->where('customer_orders.order_status', 'Pending')
    ->select('customer_orders.*', 'products.product_title', 'products.product_img1', 'products.product_price')
    ->get();

// Manejo de eliminación de productos del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_order_id'])) {
    $order_id = $_POST['remove_order_id'];
    DB::table('customer_orders')->where('order_id', $order_id)->delete();
    header('Location: cart.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="path_to_your_styles.css">
</head>
<body>

<div class="cart-container">
    <h1>Your Shopping Cart</h1>

    <?php if ($cartItems->isEmpty()): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <div class="cart-items">
            <?php foreach ($cartItems as $item): ?>
                <div class="cart-item">
                    <img src="<?= $item->product_img1 ?>" alt="<?= $item->product_title ?>">
                    <div class="cart-info">
                        <h3><?= $item->product_title ?></h3>
                        <p>Quantity: <?= $item->qty ?></p>
                        <p>Size: <?= $item->size ?></p>
                        <p>Price per Unit: $<?= $item->product_price ?></p>
                        <p>Total: $<?= $item->due_amount ?></p>

                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="remove_order_id" value="<?= $item->order_id ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-summary">
            <h3>Summary</h3>
            <p>Total Items: <?= $cartItems->count() ?></p>
            <p>Total Price: $
                <?= $cartItems->sum(function ($item) {
                    return $item->due_amount;
                }) ?>
            </p>
            <button onclick="alert('Proceed to checkout feature coming soon!')">Checkout</button>
        </div>
    <?php endif; ?>
</div>

<style>
.cart-container {
    padding: 20px;
    max-width: 900px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.cart-container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.cart-items {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.cart-item {
    display: flex;
    gap: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.cart-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
}

.cart-info {
    flex: 1;
}

.cart-info h3 {
    margin: 0;
    font-size: 18px;
}

.cart-info p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

.cart-info button {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.cart-info button:hover {
    background-color: #c82333;
}

.cart-summary {
    margin-top: 20px;
    text-align: right;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

.cart-summary h3 {
    margin-bottom: 10px;
}

.cart-summary button {
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.cart-summary button:hover {
    background-color: #218838;
}
</style>

</body>
</html>
