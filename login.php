<?php
session_start();
use Illuminate\Database\Capsule\Manager as DB;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/db_connector.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $customerEmail = $_POST['c_email'];
    $customerPass = $_POST['c_pass'];

    // Verifica si el correo existe
    $customer = DB::table('customers')->where('customer_email', $customerEmail)->first();

    if (!$customer) {
        echo "<script>alert('Email or password is incorrect');</script>";
        exit();
    }

    
    if ($customer->customer_pass !== $customerPass) {
        echo "<script>alert('Email or password is incorrect');</script>";
        exit();
    }

    $customerId = $customer->customer_id;
    // Inicia sesión del cliente
    $_SESSION['user_email'] = $customerEmail;

    echo "<script>alert('You are Logged In');</script>";
    echo "<script>window.open('shop.php','_self')</script>";
}
/* // Aquí debería ir tu lógica de autenticación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexión a la base de datos y verificación del usuario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Asegúrate de que los datos se validen correctamente
    $user = DB::table('customers')->where('customer_email', $email)->first();

    if ($user && $user->customer_pass === $password) {
        // Si el usuario existe y la contraseña es correcta, iniciar sesión
        $_SESSION['user_id'] = $user->customer_id;
        $_SESSION['user_name'] = $user->customer_name;
        $_SESSION['user_email'] = $user->customer_email;

        // Redirigir al Shop después de iniciar sesión
        header("Location: shop.php");
        exit(); // Es importante detener la ejecución después de redirigir
    } else {
        // Si el login falla, mostrar un mensaje de error
        echo "Error: Email o contraseña incorrectos.";
    }
} */
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles/auth.css">
    <link rel="stylesheet" href="styles/fonts.css">
</head>
<body>

<div class="container">
    <!-- Parte izquierda (Formulario de Login o Registro) -->
    <div class="form-container">
        <form action="login.php" method="POST">
            <h2>Iniciar Sesión</h2>
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="c_email"  required><br>

            <label for="password">Contraseña:</label>
            <input type="password" name="c_pass"  required><br>

            <button type="submit" name="submit">Iniciar Sesión</button>
        </form>
    </div>

    <!-- Parte derecha (Imagen de fondo) -->
    <div class="image-container">
        <img src="assets/images/card-2.jpg" alt="Imagen de fondo" />
    </div>
    <div class="btn-back">
    <a href="index.php">&larr;</a>
    </div>
    
</div>





</body>
</html>
