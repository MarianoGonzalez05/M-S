<?php
require 'SamaDB/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_accesorios, nombre, precio FROM accesorios WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
	<?php include 'menu.php'; ?>
       
        <!-- intento -->  
            <div class="cuerpo">
                <div class="yugioh-container" id="yugioh-card-container">
				<?php foreach ($resultado as $row) { ?>
                    <div class="yugioh-card">
					<?php 
        			$id = $row['id_accesorios'];
        			$imagen ="img/productos/accesorios/" . $id . "/accesorio.jpg";
        			if (!file_exists($imagen)) {
          			  $imagen = "img/productos/accesorios/no-photo.jpg";}
        		?>
                    <img src="<?php echo $imagen; ?>"  > 
                    <h3><?php echo $row['nombre']; ?></h3>
                    <p>$9.12</p>
					<button>Añadir al carrito</button>
                    </div>
       			 </div> 
					
				<?php } ?>
        <!-- intento -->
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
	</body>
</html>
