<?php
session_start(); // Iniciar sesión para mantener la sesión activa

// Conexión a la base de datos
$servername = "localhost";
$username = "sama";
$password = "sama";
$dbname = "usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Recibir datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar el usuario y contraseña
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Iniciar sesión y redirigir al usuario
    $_SESSION['email'] = $email; // Guardar el email en la sesión
    header("Location: ../index.html"); // Redirigir al usuario a index.html
    exit(); // Asegurar que el script se detenga después de la redirección
} else {
    echo "Email o contraseña incorrectos";
}

// Cerrar conexión
$conn->close();
?>
