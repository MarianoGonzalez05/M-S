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
            // Insertar nuevo usuario
            $stmt = $pdo->prepare("INSERT INTO usuarios (email, contrasena) VALUES (:email, :contrasena)");
            if ($stmt->execute(['email' => $email, 'contrasena' => $contrasena])) {
                // Redirigir a index.html después de registro
                header('Location: /SamaTCG/index.html');
                exit();
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

            // Redirigir a index.html después de inicio de sesión
            header('Location: /M-S/SamaTCG/index.html');
            exit();
        } else {
            echo "Email o contraseña incorrectos.";
        }
    } else {
        echo "Acción no válida.";
    }
}
?>