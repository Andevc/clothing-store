<?php
session_start(); // Iniciar sesión para verificar el usuario logueado

use Illuminate\Database\Capsule\Manager as DB;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirigir si no está logueado
    exit;
}

// Obtener el ID del cliente desde la sesión
$customer_id = $_SESSION['user_id'];

// Manejo de agregar productos al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'], $_POST['size'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];

    // Generar número de factura único
    $invoice_no = 'INV-' . strtoupper(uniqid());

    // Calcular monto total del producto
    $product_price = DB::table('products')->where('product_id', $product_id)->value('product_price');
    $due_amount = $product_price * $quantity;

    DB::table('customer_orders')->insert([
        'customer_id' => $customer_id,
        'product_id' => $product_id,
        'qty' => $quantity,
        'size' => $size,
        'due_amount' => $due_amount,
        'invoice_no' => $invoice_no,
        'order_status' => 'Pending',
    ]);

    // Redirigir al carrito después de agregar
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
</head>
<body>
<?php include 'navbar.php'; // Incluir el navbar dinámico ?>
<h1>Your Shopping Cart</h1>
<?php if ($cartItems->isEmpty()): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cartItems as $item): ?>
            <li>
                <img src="<?= htmlspecialchars($item->product_img1) ?>" alt="<?= htmlspecialchars($item->product_title) ?>" width="50">
                <?= htmlspecialchars($item->product_title) ?> - $<?= htmlspecialchars($item->product_price) ?> 
                (Quantity: <?= htmlspecialchars($item->qty) ?>, Size: <?= htmlspecialchars($item->size) ?>)
                <form method="POST">
                    <input type="hidden" name="remove_order_id" value="<?= htmlspecialchars($item->order_id) ?>">
                    <button type="submit">Remove</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
</body>
</html>
