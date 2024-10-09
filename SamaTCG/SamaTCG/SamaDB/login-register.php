<?php
// Incluir la conexión a la base de datos
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Identificar si es un registro o un inicio de sesión
    $action = $_POST['action'];

    if ($action == 'register') {
        // Proceso de registro
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena']; // Contraseña sin encriptar

        // Verificar si el email ya está registrado
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario) {
            echo "El email ya está registrado.";
        } else {
            // Insertar nuevo usuario sin encriptar la contraseña
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, contrasena) VALUES (:email, :contrasena)");
            if ($stmt->execute(['email' => $email, 'contrasena' => $contrasena])) {
                // Mostrar mensaje de éxito y redirigir a index.html después de 3 segundos
                echo "<h1>Usuario registrado con éxito.</h1>";
                echo "<p>Serás redirigido a la página principal, aguarde.</p>";
                echo '<meta http-equiv="refresh" content="3;url=/SamaTCG/index.html">';
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    } elseif ($action == 'login') {
        // Proceso de inicio de sesión
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena']; // Contraseña sin encriptar

        // Verificar si el usuario existe
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();

        // Verificar que la contraseña ingresada coincide con la almacenada
        if ($usuario && $contrasena == $usuario['contrasena']) {
            // Iniciar sesión exitosamente
            session_start();
            $_SESSION['id_user'] = $usuario['id_user'];
            $_SESSION['email'] = $usuario['email'];

            // Mostrar mensaje de inicio de sesión exitoso y redirigir a index.html después de 3 segundos
            echo "<h1>Inicio de sesión exitoso. ¡Bienvenido!</h1>";
            echo "<p>Serás redirigido a la página principal, aguarde.</p>";
            echo '<meta http-equiv="refresh" content="3;url=/SamaTCG/index.html">';
        } else {
            echo "Email o contraseña incorrectos.";
        }
    } else {
        echo "Acción no válida.";
    }
}
?>
