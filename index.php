<?php 
    use Illuminate\Database\Capsule\Manager as DB;
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/database/db_connector.php';
    
    
    
    $products = DB::table('products as p')
        ->join('manufacturers as m', 'p.manufacturer_id', '=', 'm.manufacturer_id')
        ->where('m.manufacturer_top', '=', 'yes')
        ->get();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neon Fashion - Bienvenido</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style/landing-style.css">
    <link rel="stylesheet" href="style/swiper-style.css">
    <link rel="stylesheet" href="style/fonts.css">

    
</head>
<body>

    <!-- Hero Section -->
    <div class="hero-main" data-aos="fade-up">
        <div class="hero-content" data-aos="fade-left">
            <h1>Compra Facil con Chirk Fashion</h1>
            <p>Accede a las últimas tendencias y gestiona tus compras de forma rápida y eficiente con nuestra plataforma.</p>
            <div class="hero-main-buttons">
                <a href="register.php" class="btn-nav btn-register">Regístrate Ahora</a>
                <a href="login.php" class="btn-nav btn-login">Iniciar Sesión</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features ">
        <h2 data-aos="fade-right">Por qué elegir Chirk Fashion</h2>
        <div class="features-cards">
            <div class="card p-4 text-center" data-aos="zoom-in">
                <img src="assets/images/card-1.jpg"  alt="Facilidad de Uso">
                <h5 class="card-title">Facilidad de Uso</h5>
                <p class="card-text">Nuestra plataforma es intuitiva y está diseñada para que compres sin complicaciones.</p>
            </div>
            <div class="card p-4 text-center" data-aos="zoom-in" data-aos-delay="100">
                <img src="assets/images/card-2.jpg"  alt="Variedad de Productos">
                <h5 class="card-title">Variedad de Productos</h5>
                <p class="card-text">Encuentra una amplia gama de productos que se adaptan a tus necesidades.</p>
            </div>
            <div class="card p-4 text-center" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/images/card-3.jpg"  alt="Soporte Confiable">
                <h5 class="card-title">Soporte Confiable</h5>
                <p class="card-text">Contamos con un equipo dedicado para ayudarte en cualquier momento.</p>
            </div>
        </div>
    </div>

    
    <!-- Products Section -->

    <div class="products">
        <h2 data-aos="fade-left">Productos Destacados</h2>
        <div class="products-top">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php foreach($products as $product): ?>
                    <div class="swiper-slide">
                        <div class="swiper-card">
                            <img src="<?= $product->product_img1; ?>" alt="<?= $product->product_title; ?>" class="swiper-card-img">
                            <div class="swiper-card-info">
                                <h3 class="swiper-card-title"><?= $product->product_title; ?></h3>
                                <div class="card-info card-info-cat">
                                    <p class="card-manufacturer"><?= $product->manufacturer_title; ?></p>
                                    <p class="card-manufacturer"><?= $product->product_user_type; ?></p>
                                </div>
                                <div>
                                    <p>Price: </p>
                                    <div class="card-info">
                                        
                                        <p class="swiper-card-price"><del>$<?= $product->product_price; ?></del></p>
                                        <p class="swiper-card-price-1">$<?= $product->product_psp_price; ?></p>    
                                    </div>
                                </div>
                                <div>
                                    <p class="swiper-card-desc"><?= $product->product_desc; ?></p>
                                    <p class="swiper-card-desc"><?= $product->product_features; ?></p>
                                </div>                               
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
            
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> 
        
        <script> 
            const swiper = new Swiper(".mySwiper", { 
                effect: "coverflow", 
                grabCursor: true, 
                centeredSlides: true,
                slidesPerView: 1.5,
                loop: true,
                autoplay:{
                    delay: 3000,
                },
                coverflowEffect: {
                    rotate: 20,
                    stretch: 50,
                    depth: 300,
                    modifier: 1,
                    slideShadows: true,
                        
                },
            }); 
        </script>

    </div>
    
    
    <!-- Benefits Section -->
     
    <div class="benefits">
        <h2 data-aos="fade-up">Beneficios Clave</h2>
        <div class="benefit-content ">
            <div class="benefit-card" data-aos="fade-right">
                <h5>Comodidad</h5>
                <p>Realiza tus compras desde cualquier lugar y en cualquier momento.</p>
            </div>
            <div class="benefit-card" data-aos="fade-up">
                <h5>Seguridad</h5>
                <p>Tus datos están protegidos con nosotros.</p>
            </div>
            <div class="benefit-card" data-aos="fade-left">
                <h5>Atención Personalizada</h5>
                <p>Ofrecemos soporte rápido y personalizado para todos nuestros clientes.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Neon Fashion Todos los derechos reservados. | Diseñado para compradores modernos.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
