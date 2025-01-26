<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 400px;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 8px;
}

input, textarea, select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

input[type="file"] {
    padding: 5px;
}

textarea {
    resize: vertical;
}

button.submit-btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    width: 100%;
    font-size: 16px;
    cursor: pointer;
}

button.submit-btn:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="container">
        <h1>Editar Producto</h1>
        <form action="procesar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Nombre del Producto</label>
                <input type="text" id="productName" name="productName" placeholder="Ej. Camisa de Algodón" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Descripción</label>
                <textarea id="productDescription" name="productDescription" placeholder="Descripción del producto..." rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="productPrice">Precio</label>
                <input type="number" id="productPrice" name="productPrice" placeholder="Ej. 25.99" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Categoría</label>
                <select id="productCategory" name="productCategory" required>
                    <option value="ropa">Ropa</option>
                    <option value="accesorios">Accesorios</option>
                    <option value="zapatos">Zapatos</option>
                    <option value="electronics">Electrónica</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productImage">Imagen del Producto</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" onchange="previewImage()" required>
                <div id="imagePreviewContainer" style="display: none;">
                    <img id="imagePreview" src="" alt="Vista previa" style="width: 100%; margin-top: 10px; border-radius: 4px;">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Actualizar Producto</button>
            </div>
        </form>
    </div>
</body>
</html>

<script>

function previewImage() {
    const file = document.getElementById('productImage').files[0];
    const previewContainer = document.getElementById('imagePreviewContainer');
    const imagePreview = document.getElementById('imagePreview');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            previewContainer.style.display = 'block';
        };

        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = 'none';
    }
}

</script>
