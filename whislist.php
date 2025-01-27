<?php

    use Illuminate\Database\Capsule\Manager as DB;
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/database/db_connector.php';

// Simulación del ID del cliente (en un sistema real, esto debería venir de la sesión de usuario autenticado)
$customer_id = 1;

// Obtener los productos de la wishlist
$wishlistItems = DB::table('wishlist')
    ->join('products', 'wishlist.product_id', '=', 'products.product_id')
    ->where('wishlist.customer_id', $customer_id)
    ->select('products.*', 'wishlist.wishlist_id')
    ->get();

// Manejo de eliminación de items
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_wishlist_id'])) {
    $wishlist_id = $_POST['remove_wishlist_id'];
    DB::table('wishlist')->where('wishlist_id', $wishlist_id)->delete();
    header('Location: wishlist.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="path_to_your_styles.css">
</head>
<body>

<div class="wishlist-container">
    <h1>Your Wishlist</h1>

    <?php if ($wishlistItems->isEmpty()): ?>
        <p>Your wishlist is empty.</p>
    <?php else: ?>
        <div class="wishlist-items">
            <?php foreach ($wishlistItems as $item): ?>
                <div class="wishlist-item">
                    <img src="<?= $item->product_img1 ?>" alt="<?= $item->product_title ?>">
                    <div class="wishlist-info">
                        <h3><?= $item->product_title ?></h3>
                        <p><?= $item->product_desc ?></p>
                        <p>Price: $<?= $item->product_price ?></p>
                        <?php if ($item->product_psp_price): ?>
                            <p>Discount Price: $<?= $item->product_psp_price ?></p>
                        <?php endif; ?>
                        <a href="product_details.php?product_id=<?= $item->product_id ?>">View Details</a>

                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="remove_wishlist_id" value="<?= $item->wishlist_id ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<style>
.wishlist-container {
    padding: 20px;
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.wishlist-container h1 {
    text-align: center;
    margin-bottom: 20px;
}

.wishlist-items {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.wishlist-item {
    display: flex;
    gap: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.wishlist-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
}

.wishlist-info {
    flex: 1;
}

.wishlist-info h3 {
    margin: 0;
    font-size: 18px;
}

.wishlist-info p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

.wishlist-info a {
    display: inline-block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
}

.wishlist-info a:hover {
    text-decoration: underline;
}

.wishlist-info button {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.wishlist-info button:hover {
    background-color: #c82333;
}
</style>

</body>
</html>
