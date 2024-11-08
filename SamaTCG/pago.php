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
		<?php include 'menu.php'; ?>


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
