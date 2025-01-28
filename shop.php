<?php
    session_start();
    use Illuminate\Database\Capsule\Manager as DB;
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/database/db_connector.php';

    // Obtener filtros
    $manufacturers = DB::table('manufacturers')->get();
    $productCategories = DB::table('product_categories')->get();

    // Manejo de filtros
    $filters = [
        'manufacturer_id' => $_GET['manufacturer_id'] ?? null,
        'p_cat_id' => $_GET['p_cat_id'] ?? null,
        'product_user_type' => $_GET['product_user_type'] ?? null
    ];

    // Consulta base para productos
    $query = DB::table('products');

    if ($filters['manufacturer_id']) {
        $query->where('manufacturer_id', $filters['manufacturer_id']);
    }
    if ($filters['p_cat_id']) {
        $query->where('p_cat_id', $filters['p_cat_id']);
    }
    if ($filters['product_user_type']) {
        $query->where('product_user_type', $filters['product_user_type']);
    }

    $products = $query->get();

    /* include_once 'includes/navbar.php'; */

?>


<div class="shop-container">
      <!-- Filtros -->
      <aside class="filters">
          <form method="GET" action="shop.php">
              <div class="filter-group">
                  <h4>Manufacturers</h4>
                  <select name="manufacturer_id">
                      <option value="">All</option>
                      <?php foreach ($manufacturers as $manufacturer): ?>
                          <option value="<?= $manufacturer->manufacturer_id ?>" <?= $filters['manufacturer_id'] == $manufacturer->manufacturer_id ? 'selected' : '' ?>>
                              <?= $manufacturer->manufacturer_title ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </div>
  
              <div class="filter-group">
                  <h4>Categories</h4>
                  <select name="p_cat_id">
                      <option value="">All</option>
                      <?php foreach ($productCategories as $category): ?>
                          <option value="<?= $category->p_cat_id ?>" <?= $filters['p_cat_id'] == $category->p_cat_id ? 'selected' : '' ?>>
                              <?= $category->p_cat_title ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </div>
  
              <div class="filter-group">
                  <h4>Gender</h4>
                  <select name="product_user_type">
                      <option value="">All</option>
                      <option value="Male" <?= $filters['product_user_type'] == 'M' ? 'selected' : '' ?>>Male</option>
                      <option value="Female" <?= $filters['product_user_type'] == 'F' ? 'selected' : '' ?>>Female</option>
                  </select>
              </div>
  
              <button type="submit">Filter</button>
          </form>
      </aside>
  
      <!-- Productos -->
      <section class="products">
          <?php if ($products->isEmpty()): ?>
              <p>No products found.</p>
          <?php else: ?>
              <div class="product-list">
                  <?php foreach ($products as $product): ?>
                      <div class="product-card">
                          <img src="<?= $product->product_img1 ?>" alt="<?= $product->product_title ?>">
                          <h3><?= $product->product_title ?></h3>
                          <p><?= $product->product_desc ?></p>
                          <p>Price: $<?= $product->product_price ?></p>
                          <?php if ($product->product_psp_price): ?>
                              <p>Discount Price: $<?= $product->product_psp_price ?></p>
                          <?php endif; ?>
                          <a href="product_details.php?product_id=<?= $product->product_id ?>">View Details</a>
                      </div>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>
      </section>
  </div>
<style>
    /* Estilos generales */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.shop-container {
    display: flex;
    padding: 20px;
    gap: 20px;
}

/* Estilos para los filtros */
.filters {
    flex: 1;
    max-width: 300px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.filters h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.filters .filter-group {
    margin-bottom: 20px;
}

.filters select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background-color: #f9f9f9;
}

.filters button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.filters button:hover {
    background-color: #0056b3;
}

/* Estilos para los productos */

.products {
    
    flex: 3;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-card h3 {
    font-size: 18px;
    margin: 10px;
    color: #333;
}

.product-card p {
    font-size: 14px;
    margin: 10px;
    color: #666;
}

.product-card a {
    display: block;
    text-align: center;
    padding: 10px;
    margin: 10px;
    background-color: #28a745;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}

.product-card a:hover {
    background-color: #218838;
}

</style>