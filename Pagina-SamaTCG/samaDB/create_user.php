<?php
$servername = "localhost";
$username = "sama";
$password = "sama";
$dbname = "usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Datos del usuario
$user_username = "new_user";
$user_email = "user@example.com";
$user_password = password_hash("user_password", PASSWORD_DEFAULT);

// Insertar usuario
$sql = "INSERT INTO users (username, email, password) VALUES ('$user_username', '$user_email', '$user_password')";

if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
