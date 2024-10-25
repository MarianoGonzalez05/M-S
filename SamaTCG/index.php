<?php

require 'SamaDB/database.php';
$db = new Database();
$con = $db->conectar();

session_start();
// Consulta de productos
$sql = $con->prepare("SELECT id_singles, nombre, precio FROM singles WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


try {
    $sql1 = $con->prepare("SELECT nombre_usuario FROM usuarios WHERE activo=1");
    $sql1->execute();
    $resultado_usuarios = $sql1->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($resultado_usuarios)) {
        $_SESSION['nombre_usuario'] = $resultado_usuarios[0]['nombre_usuario'];
    } else {
        echo "No hay usuarios activos.";
    }

   

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SamaTCG</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <?php include 'menu.php'; ?>

<!-- Contenido aquí -->

    
		<section class="banner">
			<div class="content-banner">
				<p>PARA JIJEARTE CON YU-GI-OH</p>
				<h2>Los Decks <br />Mas Competitivos</h2>
				<a href="#">Comprar ahora</a>
			</div>
		</section>

		<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-plane-up"></i>
					<div class="feature-content">
						<span>Envío Seguro</span>
						<p>Envio seguro a todo el pais</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Precios Accesibles</span>
						<p>Los mejores precios para armar tu deck a medida</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-gift"></i>
					<div class="feature-content">
						<span>Envio gratis</span>
						<p>Si compras ciertas promociones hay envio gratis</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente </span>
						<p>LLámenos al 123-456-7890</p>
					</div>
				</div>
			</section>

			<section class="container top-categories">
				<h1 class="heading-1">Arquetipos mas vendidos</h1>
				<div class="container-categories">
					<div class="card-category category-dino">
						<p>Dinosaurios</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-zombie">
						<p>Zombies</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-fireking">
						<p>Fire Kings</p>
						<span>Ver más</span>
					</div>
				</div>
			</section>

			<section class="container top-products">
				<h1 class="heading-1">Mas vendidos</h1>

				<div class="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/bebesaurio.jpg" alt="Bbaycerasaurus" />
							<span class="discount">-13%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Babycerasaurus</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$3.60 <span>$3.30</span></p>
						</div>
					</div>
					<!-- Producto 2 -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="img/fireking-sd.jpg"
								alt="fireking-sd"
							/>
							<span class="discount">-22%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Structure deck Fire Kings</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.70 <span>$7.30</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="img/cyroid.jpg"
								alt="cyroid"
							/>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3>Pair Cicroid</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$3.20</p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/trio-ojama.jpg" alt="Ojama trio" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Trio Ojama</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.60</p>
						</div>
					</div>
				</div>
			</section>

			<section class="gallery">
				<img
					src="img/gallery1.jpg"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="img/gallery2.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="img/gallery3.jpg"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="img/gallery4.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="img/gallery5.jpg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>

			<section class="container specials">
				<h1 class="heading-1">Ofertas!</h1>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="cuerpo">
    <div class="yugioh-container" id="yugioh-card-container">
        <?php foreach ($resultado as $row) { ?>
        <!-- Ejemplo de carta -->
        <div class="card-product">
            <?php 
            $id = $row['id_singles'];
            $imagen = "img/productos/singles/" . $id . "/monstruo.jpg";
            if (!file_exists($imagen)) {
                $imagen = "img/productos/singles/no-photo.jpg";
            }
            ?>
            <div class="container-img">
                <img src="<?php echo $imagen; ?>" alt="<?php echo $row['nombre']; ?>" />
                <div class="button-group">
                    <span>
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span>
                        <i class="fa-regular fa-heart"></i>
                    </span>
                    <span>
                        <i class="fa-solid fa-code-compare"></i>
                    </span>
                </div>
            </div>
            <div class="content-card-product">

                <h3><?php echo $row['nombre']; ?></h3>
                <span class="add-cart">
                    <i class="fa-solid fa-basket-shopping"></i>
                </span>
                <p class="price">$<?php echo number_format($row['precio'], 2); ?></p> <!-- Aquí se muestra el precio -->
            </div>
        </div>
        <?php } ?>
    </div>
</div>


					
<!-- Producto 2 -->
<div class="cuerpo">
    <div class="yugioh-container" id="yugioh-card-container">
        <?php foreach ($resultado as $row) { ?>
        <!-- Ejemplo de carta -->
        <div class="card-product">
            <?php 
            $id = $row['id_singles'];
            $imagen = "img/productos/singles/" . $id . "/monstruo.jpg";
            if (!file_exists($imagen)) {
                $imagen = "img/productos/singles/no-photo.jpg";
            }
            ?>
            <div class="container-img">
                <img src="<?php echo $imagen; ?>" alt="<?php echo $row['nombre']; ?>" />
                <div class="button-group">
                    <span>
                        <i class="fa-regular fa-eye"></i>
                    </span>
                    <span>
                        <i class="fa-regular fa-heart"></i>
                    </span>
                    <span>
                        <i class="fa-solid fa-code-compare"></i>
                    </span>
                </div>
            </div>
            <div class="content-card-product">

                <h3><?php echo $row['nombre']; ?></h3>
                <span class="add-cart">
                    <i class="fa-solid fa-basket-shopping"></i>
                </span>
                <p class="price">$<?php echo number_format($row['precio'], 2); ?></p> <!-- Aquí se muestra el precio -->
            </div>
        </div>
        <?php } ?>
    </div>
</div>

					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/mundo-zombie.jpg" alt="Mundo Zombie" />
							<span class="discount">-30%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3>Mundo Zombie</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$3.85 <span>$5.50</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="img/deck-box.jpg" alt="deck box" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Deck Box Magicians</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5.60</p>
						</div>
					</div>
				</div>
			</section>

			

		<footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">CONTACTANOS</p>
						<ul>
							<li>Teléfono: 01524092526</li>
							<li>Tw: samauuhh</li>
							<li>Email: samaTCG@nerfeenalminero.com</li>
						</ul>
						<div class="social-icons">
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>
		
					<div class="information">
						<p class="title-footer">NAVEGACIÓN</p>
						<ul>
							<li><a href="#">Inicio</a></li>
							<li><a href="#">Productos</a></li>
							<li><a href="#">Contacto</a></li>
						</ul>
					</div>
		

					</div>
				</div>
		
				<div class="copyright">
					<p>Desarrollado por los papus &copy; 2024</p>
				</div>
			</div>
		</footer>
		

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous">
			
		</script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   			 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    		<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
	</body>
</html>
