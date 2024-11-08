<?php
// login.php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'samabd');

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['contrasena'])) {
            $_SESSION['user'] = $user['nombre_usuario'];
            header('Location: ../index.html');
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Correo no encontrado";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - SamaTCG</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        /* Estilo del formulario de login, inspirado en el diseño de la referencia */
        .login-section {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .login-section h2 {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 24px;
            color: #333;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        .btn {
            width: 100%;
            padding: 0.75rem;
            background: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 0.5rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
        .login-link {
            text-align: center;
            margin-top: 1rem;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
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
						<li><a href="#">Cartas</a></li>
						<li><a href="structure.php">Structure</a></li>
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

    <main class="main-content">
        <section class="login-section">
            <h2>Iniciar Sesión</h2>
            <?php if (isset($error)): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit" name="login" class="btn">Iniciar Sesión</button>
                <div class="login-link">
                    <p>¿No tienes una cuenta? <a href="register.php">Regístrate</a></p>
                </div>
            </form>
        </section>
    </main>

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

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
</body>
</html>