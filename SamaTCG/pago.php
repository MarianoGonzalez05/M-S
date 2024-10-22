<?php

require 'SamaDB/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con ->prepare("SELECT id_singles, nombre, precio FROM singles where activo=1");
$sql->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>SamaTCG</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<header>
			<div class="container-hero">
				<div class="container hero">
					<div class="customer-support">
						<i class="fa-solid fa-headset"></i>
						<div class="content-customer-support">
							<span class="text">Soporte al cliente</span>
							<span class="number">123-456-7890</span>
						</div>
					</div>

					<div class="container-logo">
						<i class="fa-solid fa-puzzle-piece"></i>
						<h1 class="logo"><a href="/">SamaTcg</a></h1>
					</div>

					<div class="container-user">
						<a href="login/login.php"><i class="fa-solid fa-user"></i></a>
						<i class="fa-solid fa-basket-shopping"></i>
                        <div class="container-user">
                    <a href="./carrito.php" onclick="mostrarCarrito(); return false;">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </a>
                    <div class="content-shopping-cart">
                        <span class="text">Carrito</span>
                        <span class="number">(0)</span>
                    </div>
                </div>
					</div>
				</div>
			</div>

			<div class="container-navbar">
				<nav class="navbar container">
					<i class="fa-solid fa-bars"></i>
					<ul class="menu">
						<li><a href="index.html">Inicio</a></li>
						<li><a href="cartas.php">Cartas</a></li>
						<li><a href="https://www.youtube.com/watch?v=MZqBppfIbh4">Accesorios</a></li>
						<li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Mas</a></li>
						<li><a href="Sobresama/sobresama.html">Sobre Sama</a></li>
					</ul>

					<form class="search-form">
						<input type="search" placeholder="Buscar..." />
						<button class="btn-search">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
				</nav>
			</div>
		</header>


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
			crossorigin="anonymous"
		></script>
	</body>
</html>
