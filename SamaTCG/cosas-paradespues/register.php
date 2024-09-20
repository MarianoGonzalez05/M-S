<?php
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
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

// Preparar consulta SQL para insertar datos
$sql = "INSERT INTO users (username, email, password) VALUES ('$nombre', '$email', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    // Redirigir al usuario a index.html
    header("Location: ../index.html");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
