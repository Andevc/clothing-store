<?php

session_start();

require_once __DIR__ . '/../database/db_connector.php';

use Illuminate\Database\Capsule\Manager as DB;

?>

<!DOCTYPE HTML>
<html>

<head>

    <title>Admin Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="container"><!-- container Starts -->

        <form class="form-login" action="" method="post"><!-- form-login Starts -->

            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>
            <input type="password" class="form-control" name="admin_pass" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
                Log in
            </button>
        </form><!-- form-login Ends -->
    </div><!-- container Ends -->



</body>

</html>

<?php

if (isset($_POST['admin_login'])) {

    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    

    // Buscar el admin en la base de datos utilizando el Query Builder
    $admin = DB::table('admins')
        ->where('admin_email', '=', $admin_email)
        ->first(); // Obtiene el primer registro que coincide

    
    if($admin && $admin_pass === $admin->admin_pass)
    {
        $_SESSION['admin_email'] = $admin_email;

        // Mensaje y redirección
        echo "<script>alert('You are logged into the admin panel')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
    } else {
        // Si la contraseña es incorrecta o no existe el usuario
        echo "<script>alert('Email or Password is wrong')</script>";
    }
} 
?>