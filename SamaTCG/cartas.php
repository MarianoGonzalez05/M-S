<?php
require 'SamaDB/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_singles, nombre FROM singles WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SamaTCG</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
        /* Estilos de las cartas */
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
            border: none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .yugioh-container .yugioh-card button:hover {
            background-color: #161616;
        }

        /* Estilos del modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
        }
        .modal-content table {
            width: 100%;
            margin-bottom: 20px;
        }
        .modal-content table th, .modal-content table td {
            padding: 10px;
        }
        .close-modal {
            cursor: pointer;
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
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
						<a href="login/login.php"><i class="fa-solid fa-user"></i></a>
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

<!-- Cartas -->
<div class="yugioh-container" id="yugioh-card-container">
    <?php foreach ($resultado as $row) { ?>
    <div class="yugioh-card">
        <?php 
        $id = $row['id_singles'];
        $imagen = "img/productos/singles/" . $id . "/monstruo.jpg";
        if (!file_exists($imagen)) {
            $imagen = "img/productos/singles/no-photo.jpg";
        }
        ?>
        <img src="<?php echo $imagen; ?>" alt="Carta" />
        <h3><?php echo $row['nombre']; ?></h3>
        <p>$9.12</p>
        <button onclick="agregarAlCarrito(<?php echo $id; ?>, '<?php echo $row['nombre']; ?>', 9.12)">Añadir al carrito</button>
    </div>
    <?php } ?>
</div>

<!-- Modal del carrito -->
<div class="modal" id="carrito-modal">
    <div class="modal-content">
        <h2>Carrito de compras</h2>
        <table id="tabla-carrito">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <p id="total-compra"></p>
        <button class="close-modal" onclick="cerrarCarrito()">Cerrar</button>
    </div>
</div>

<footer class="footer">
        <div class="container container-footer">
            <div class="menu-footer">
                <div class="contact-info">
                    <p class="title-footer">Información de Contacto</p>
                    <ul>
                        <li>Dirección: 71 Pennington Lane Vernon Rockville, CT 06066</li>
                        <li>Teléfono: 123-456-7890</li>
                        <li>Tw: samauuhh</li>
                        <li>Email: samaTCG@nerfeenalminero.com</li>
                    </ul>
                    <div class="social-icons">
                        <span class="facebook"><i class="fa-brands fa-facebook-f"></i></span>
                        <span class="twitter"><i class="fa-brands fa-twitter"></i></span>
                        <span class="youtube"><i class="fa-brands fa-youtube"></i></span>
                        <span class="pinterest"><i class="fa-brands fa-pinterest-p"></i></span>
                        <span class="instagram"><i class="fa-brands fa-instagram"></i></span>
                    </div>
                </div>

                <div class="information">
                    <p class="title-footer">Información</p>
                    <ul>
                        <li><a href="#">Acerca de Nosotros</a></li>
                        <li><a href="#">Información de SamaTCG</a></li>
                        <li><a href="#">Políticas de Privacidad</a></li>
                        <li><a href="#">Términos y Condiciones</a></li>
                        <li><a href="#">Contáctanos</a></li>
                    </ul>
                </div>

                <div class="my-account">
                    <p class="title-footer">Mi cuenta</p>
                    <ul>
                        <li><a href="#">Mi cuenta</a></li>
                        <li><a href="#">Historial de órdenes</a></li>
                        <li><a href="#">Lista de deseos</a></li>
                        <li><a href="#">Boletín</a></li>
                        <li><a href="#">Reembolsos</a></li>
                    </ul>
                </div>

                <div class="newsletter">
                    <p class="title-footer">Boletín informativo</p>
                    <div class="content">
                        <p>Suscríbete a nuestros boletines ahora y mantente al día con noticias sobre Yu-Gi-Oh!</p>
                        <input type="email" placeholder="Ingresa el correo aquí...">
                        <button>Suscríbete</button>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <p>Desarrollado por los papus &copy; 2024</p>
                <img src="img/payment.png" alt="Pagos">
            </div>
        </div>
    </footer>

<script>
    function agregarAlCarrito(id, nombre, precio) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let producto = carrito.find(item => item.id === id);

        if (producto) {
            producto.cantidad++;
        } else {
            carrito.push({ id, nombre, precio, cantidad: 1 });
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        actualizarCarritoUI();
    }

    function actualizarCarritoUI() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        document.querySelector('.content-shopping-cart .number').textContent = `(${carrito.length})`;

        let tabla = document.querySelector('#tabla-carrito tbody');
        tabla.innerHTML = '';

        let total = 0;
        carrito.forEach(item => {
            let subtotal = item.precio * item.cantidad;
            total += subtotal;
            let row = `<tr>
                <td>${item.nombre}</td>
                <td>${item.cantidad}</td>
                <td>$${item.precio.toFixed(2)}</td>
                <td>$${subtotal.toFixed(2)}</td>
                <td>
                    <button onclick="cambiarCantidad(${item.id}, 'increase')">+</button>
                    <button onclick="cambiarCantidad(${item.id}, 'decrease')">-</button>
                    <button onclick="eliminarDelCarrito(${item.id})">Eliminar</button>
                </td>
            </tr>`;
            tabla.innerHTML += row;
        });

        document.getElementById('total-compra').textContent = `Total: $${total.toFixed(2)}`;
    }

    function cambiarCantidad(id, action) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let producto = carrito.find(item => item.id === id);

        if (producto) {
            if (action === 'increase') {
                producto.cantidad++;
            } else if (action === 'decrease' && producto.cantidad > 1) {
                producto.cantidad--;
            } else if (action === 'decrease' && producto.cantidad === 1) {
                carrito = carrito.filter(item => item.id !== id);
            }
        }

        localStorage.setItem('carrito', JSON.stringify(carrito));
        actualizarCarritoUI();
    }

    function eliminarDelCarrito(id) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito = carrito.filter(item => item.id !== id);

        localStorage.setItem('carrito', JSON.stringify(carrito));
        actualizarCarritoUI();
    }

    function mostrarCarrito() {
        actualizarCarritoUI();
        document.getElementById('carrito-modal').style.display = 'flex';
    }

    function cerrarCarrito() {
        document.getElementById('carrito-modal').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', actualizarCarritoUI);
</script>

<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>
