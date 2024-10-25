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
						<?php if(isset($_SESSION['nombre_usuario'])) { ?>

							<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<a href="#" class="btn btn-primary"> <?php echo $_SESSION['nombre_usuario']; ?> </a>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="logout.php">Cerrar sesión</a> 
						</div>
					</div>



						<?php } ?>
						
						<a href="Login/login.php"><i class="fa-solid fa-user"></i></a>
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
						<li><a href="index.php">Inicio</a></li>
						<li><a href="cartas.php">Cartas</a></li>
						<li><a href="#">Structure</a></li>
						<li><a href="accesorios.php">Accesorios</a></li>
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
