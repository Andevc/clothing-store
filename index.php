<?php
session_start();

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';



?>

<main>
      <section class="container-main" >
            <section class="main-content">
                  <h1>
                        Neon Fashions
                  </h1>
                  
                  <p>
                  Where bold style meets vibrant vibes discover the latest trends and refresh your wardrobe with pieces that make a statement
                  </p>
                  <a href="#shop" class="cta-button">Discover Your Style</a>
            </section>
      </section>
      <section class="container-cards">
            <section class="cont-card-info">
                  <img src="./assets/images/card-1.jpg" alt="">
                  <div class="cont-card-info-content">
                        <h2>Sustainable Fashion</h2>
                        <p>oin us in making a difference! Our eco-friendly collection blends style and sustainability, 
                              so you can look good while doing good for the planet.</p>
                  </div>
            </section>
            <section class="cont-card-info">
                  <img src="./assets/images/card-2.jpg" alt="">
                  <div class="cont-card-info-content">
                        <h2>Sustainable Fashion</h2>
                        <p>oin us in making a difference! Our eco-friendly collection blends style and sustainability, 
                              so you can look good while doing good for the planet.</p>
                  </div>
            </section>
            <section class="cont-card-info">
                  <img src="./assets/images/card-3.jpg" alt="">
                  <div class="cont-card-info-content">
                        <h2>Sustainable Fashion</h2>
                        <p>oin us in making a difference! Our eco-friendly collection blends style and sustainability, 
                              so you can look good while doing good for the planet.</p>
                  </div>
            </section>
      </section>
      <section class="container-swiper-slider">
            <!-- Swiper -->
            <div class="swiper mySwiper">

                  <?php
                        /* echo "<div class='swiper-wrapper'>";

                        $query = 'SELECT * FROM `products` p JOIN `manufacturers` m ON p.manufacturer_id = m.manufacturer_id WHERE m.manufacturer_top="yes"';
                        $res = $conn->query($query);
                        
                        if ($res->num_rows > 0){
                              // Recorrer los resultados y mostrar cada producto en una card
                              while ($row = $res->fetch_assoc()) {
                                    echo "<div class='swiper-slide'>";


                                    echo "<div class='card'>";
                                          echo "<div class='card-image'>";
                                          echo "<img src=" . $row['product_img1'] . " alt='Imagen del producto' class='card-img'>";  // Agregar una imagen para el producto
                                          echo "</div>";  // Fin de card-body
                                    echo "<div class='card-content'>";
                                          echo "<div class='card-info'>";
                                                echo '<p class="product-category">'.$row['product_user_type'].'</p>';
                                                echo '<h2 class="product-name">'.$row['product_title'].'</h2>';
                                                echo '<p class="product-description">'.$row['product_desc'].'</p>';
                                          echo "</div>";  // Fin de card-body
                                          echo "<div class='card-footer'>";
                                                echo '<span class="price">'.$row['product_price'].'</span>';
                                                echo '<div class="buttons">';
                                                echo '<a href="#" class="view-details">View Details</a>';
                                                echo '<button class="add-to-cart">Add to Cart</button>';
                                                echo '</div>';
                                          echo "</div>";  // Fin de card-body
                                    echo "</div>";  // Fin de card-body
                                    
                                    
                                    echo "</div>";  // Fin de card-body
                                    


                                    echo "</div>";  // Fin de card
                              }
                        } 
                        else { echo "No se encontraron productos en el top."; }
                        // Cerrar la conexión
                        $conn->close();

                        echo "</div>";  // Fin de card-container */
                  ?>

                  
            </div>

            <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <!-- Initialize Swiper -->
            <script>
                  var swiper = new Swiper(".mySwiper", {
                        effect: "coverflow",
                        grabCursor: true,
                        centeredSlides: true,
                        slidesPerView: "1.5",
                        loop: true,
                        autoplay: {
                              delay:5000,
                        },
                        
                        coverflowEffect: {
                              rotate: 45,
                              stretch: 0,
                              depth: 100,
                              modifier: 1,
                              slideShadows: true,
                              
                        },
                        
                  });
            </script>
      </section>
      <section>
            klamkdm
      </section>
</main>
<?php include 'includes/footer.php' ?>

</body>

</html>