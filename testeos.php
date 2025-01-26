<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHIRK S.R.L. - Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/landing-style.css">
</head>
<body>

    <!-- Hero Section -->
    <div class="hero" data-aos="fade-up">

        <h1>Compra Fácil con CHIRK S.R.L.</h1>
        <p>Accede a las últimas tendencias y gestiona tus compras de forma rápida y eficiente con nuestra plataforma.</p>
        <a href="register.php" class="btn btn-light btn-lg">Regístrate Ahora</a>
        <a href="login.php" class="btn btn-outline-light btn-lg">Iniciar Sesión</a>
    </div>

    <!-- Features Section -->
    <div class="features container">
        <h2 data-aos="fade-right">¿Por Qué Elegir CHIRK?</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card p-4 text-center" data-aos="zoom-in">
                    <img src="assets/images/card-1.jpg" alt="">
                    <h5 class="card-title">Facilidad de Uso</h5>
                    <p class="card-text">Nuestra plataforma es intuitiva y está diseñada para que compres sin complicaciones.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4 text-center" data-aos="zoom-in" data-aos-delay="100">
                    <img src="assets/images/card-2.jpg" alt="">
                    <h5 class="card-title">Variedad de Productos</h5>
                    <p class="card-text">Encuentra una amplia gama de productos que se adaptan a tus necesidades.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <img src="assets/images/card-3.jpg" alt="">
                    <h5 class="card-title">Soporte Confiable</h5>
                    <p class="card-text">Contamos con un equipo dedicado para ayudarte en cualquier momento.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="products container">
        <h2 data-aos="fade-left">Productos Destacados</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" data-aos="flip-left">
                    <img src="product1.jpg" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción breve del producto.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" data-aos="flip-left" data-aos-delay="100">
                    <img src="product2.jpg" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Descripción breve del producto.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card" data-aos="flip-left" data-aos-delay="200">
                    <img src="product3.jpg" class="card-img-top" alt="Producto 3">
                    <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="card-text">Descripción breve del producto.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits container">
        <h2 data-aos="fade-up">Beneficios Clave</h2>
        <div class="row">
            <div class="col-md-6 benefit" data-aos="fade-right">
                <h5>Comodidad</h5>
                <p>Realiza tus compras desde cualquier lugar y en cualquier momento.</p>
            </div>
            <div class="col-md-6 benefit" data-aos="fade-left">
                <h5>Seguridad</h5>
                <p>Tus datos están protegidos con nosotros.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 CHIRK S.R.L. Todos los derechos reservados. | Diseñado para compradores modernos.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
