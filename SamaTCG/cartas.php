<?php

require 'SamaDB/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con ->prepare("SELECT id_singles, nombre FROM singles where activo=1");
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
        <style>
        .yugioh-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }
        .yugioh-container .yugioh-card {
            margin: 15px;
            width: 200px;
            padding: 15px;
            text-align: center;
        }
        .yugioh-container .yugioh-card img {
            width: 100%;
            height: auto;
        }
        .yugioh-container .yugioh-card h3 {
            font-size: 10px;
            margin: 10px 0;
        }
        .yugioh-container .yugioh-card p {
            font-size: 16px;
            color: #333;
        }
        .yugioh-container .yugioh-card button {
            background-color: #000000;
            color: white;
            border:none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .yugioh-container .yugioh-card button:hover {
            background-color: #161616;
        }
    
        </style>
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
						<a href="./login.html"><i class="fa-solid fa-user"></i></a>
						<i class="fa-solid fa-basket-shopping"></i>
						<div class="content-shopping-cart">
							<span class="text">Carrito</span>
							<span class="number">(0)</span>
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
						<li><a href="#">Accesorios</a></li>
						<li><a href="#">Mas</a></li>
						<li><a href="Sobresama/sobresama.html">Sobre Sama</a></li>
					</ul>

					<form class="search-form" onsubmit="event.preventDefault(); buscarCartas();">
						<input id="search-input" type="search" placeholder="Buscar..." />
						<button class="btn-search" type="submit">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
				</nav>
			</div>
		</header>

		<!-- intento -->
		<div class="cuerpo">
            <div class="col">
            <div class="yugioh-container" id="yugioh-card-container">
				<div class="card shadow-sm">
					<img src="img/productos/singles/0/principal.jpg" height="300px">   
					
            </div>     
			<!-- <button id="load-more" style=" 
			background-color: #000000;
            color: white;
            border:none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
			display:block; 
			margin:20px auto;" onclick="cargarMasCartas()">Cargar más cartas</button> -->
        </div> 
        <!-- intento -->
	</div>
	</div>
		<footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Dirección: 71 Pennington Lane Vernon Rockville, CT
								06066
							</li>
							<li>Teléfono: 123-456-7890</li>
							<li>Tw: samauuhh</li>
							<li>EmaiL: samaTCG@nerfeenalminero.com</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
								<i class="fa-brands fa-youtube"></i>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Información de SamaTCG</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Contactános</a></li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Mi cuenta</p>

						<ul>
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="#">Historial de ordenes</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Boletín</a></li>
							<li><a href="#">Reembolsos</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Boletín informativo</p>

						<div class="content">
							<p>
								Suscríbete a nuestros boletines ahora y mantente al
								día con noticias sobre Yu-Gi-Oh!
							</p>
							<input type="email" placeholder="Ingresa el correo aquí...">
							<button>Suscríbete</button>
						</div>
					</div>
				</div>

				<div class="copyright">
					<p>
						Desarrollado por los papus &copy; 2024
					</p>

					<img src="img/payment.png" alt="Pagos">
				</div>
			</div>
		</footer>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>

		<script>
			// let cartasCargadas = 0;
			// let cartasEnCarrito = [];
			// let total = 0;
			// const container = document.getElementById('yugioh-card-container');
	
			// async function fetchCartasYugioh(offset = 0, query = '') {
			// 	try {
			// 		let url = `https://db.ygoprodeck.com/api/v7/cardinfo.php?num=10&offset=${offset}`;
			// 		if (query) {
			// 			url = `https://db.ygoprodeck.com/api/v7/cardinfo.php?fname=${encodeURIComponent(query)}&num=10&offset=${offset}`;
			// 		}
			// 		const response = await fetch(url);
			// 		const data = await response.json();
			// 		mostrarCartas(data.data);
			// 	} catch (error) {
			// 		console.error('Error al obtener las cartas:', error);
			// 	}
			// }
	
			// function mostrarCartas(cartas) {
			// 	cartas.forEach(carta => {
			// 		const nombre = carta.name;
			// 		const imagen = carta.card_images[0].image_url;
			// 		const precio = parseFloat(carta.card_prices[0].cardmarket_price) || 0;
	
			// 		const cardDiv = document.createElement('div');
			// 		cardDiv.className = 'yugioh-card';
	
			// 		const img = document.createElement('img');
			// 		img.src = imagen;
			// 		img.alt = nombre;
	
			// 		const h3 = document.createElement('h3');
			// 		h3.textContent = nombre;
	
			// 		const p = document.createElement('p');
			// 		p.textContent = `$${precio.toFixed(2)}`;
	
			// 		const button = document.createElement('button');
			// 		button.textContent = 'Agregar al carrito';
			// 		button.onclick = () => agregarAlCarrito(carta.id, nombre, precio);
	
			// 		cardDiv.appendChild(img);
			// 		cardDiv.appendChild(h3);
			// 		cardDiv.appendChild(p);
			// 		cardDiv.appendChild(button);
	
			// 		container.appendChild(cardDiv);
			// 	});
			// }
	
			
			// function buscarCartas() {
			// 	const query = document.getElementById('search-input').value.trim();
			// 	container.innerHTML = ''; // Limpiar el contenedor
			// 	cartasCargadas = 0; // Reiniciar el contador de cartas
			// 	if (query) {
			// 		fetchCartasYugioh(0, query);
			// 	} else {
			// 		fetchCartasYugioh();
			// 	}
			// }
	
			// function cargarMasCartas() {
			// 	cartasCargadas += 10;
			// 	const query = document.getElementById('search-input').value.trim();
			// 	fetchCartasYugioh(cartasCargadas, query);
			// }
	
			// // Cargar las primeras 10 cartas al cargar la página
			// fetchCartasYugioh();
		</script>
	</body>
</html>
