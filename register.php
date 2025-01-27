<?php
    session_start();
    use Illuminate\Database\Capsule\Manager as DB;
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/database/db_connector.php';

// Procesar el registro cuando el formulario se envíe
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_country = $_POST['customer_country'];
    $customer_city = $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];
    $customer_address = $_POST['customer_address'];

    // Subir la imagen
    /* $customer_image = '';
    if (isset($_FILES['customer_image']) && $_FILES['customer_image']['error'] == 0) {
        $image_tmp = $_FILES['customer_image']['tmp_name'];
        $image_name = basename($_FILES['customer_image']['name']);
        $image_dir = 'uploads/';
        $customer_image = $image_dir . $image_name;
        move_uploaded_file($image_tmp, $customer_image);
    } */

    // Insertar el nuevo cliente usando Eloquent
    $customer = DB::table('customers')->insert([
        'customer_name' => $customer_name,
        'customer_email' => $customer_email,
        'customer_pass' => $customer_pass,
        'customer_country' => $customer_country,
        'customer_city' => $customer_city,
        'customer_contact' => $customer_contact,
        'customer_address' => $customer_address,
        'customer_image' => " "
    ]);

    // Verificar si la inserción fue exitosa
    if ($customer) {
        // Redirigir al login después de un registro exitoso
        header("Location: login.php");
        exit;
    } else {
        echo "Error al registrar el cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link rel="stylesheet" href="styles/auth.css">
    <link rel="stylesheet" href="styles/fonts.css">
</head>
<body>

<div class="container">
    <!-- Parte izquierda (Formulario de Login o Registro) -->
    
    <div class="image-container">
        <img src="assets/images/card-1.jpg" alt="Imagen de fondo" />
    </div>
    <!-- Parte derecha (Imagen de fondo) -->
    <div class="form-container">
        <!-- Formulario de Registro -->
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <h2>Registro</h2>
            <label for="name">Nombre:</label>
            <input type="text" name="customer_name" id="name" required><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="customer_email" id="email" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="customer_pass" id="password" required><br>
            <div class="form-data-s">
                <div>
                    <label for="country">País:</label>
                    <input type="text" name="customer_country" id="country" required>
                </div>
                <div>
                    <label for="city">Ciudad:</label>
                    <input type="text" name="customer_city" id="city" required>
                </div>
            </div>

            <label for="contact">Número de Contacto:</label>
            <input type="text" name="customer_contact" id="contact"><br>

            <label for="address">Dirección:</label>
            <input type="text" name="customer_address" id="address">
            
        

            <button type="submit" name="submit">Registrarse</button>
        </form>        
    </div>
    <div class="btn-back">
    <a href="index.php">&larr;</a>
    </div>
    
</div>



</body>
</html>
