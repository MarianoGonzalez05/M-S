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

// Datos actualizados del usuario
$user_id = 1;
$new_username = "updated_user";
$new_email = "updated_user@example.com";

$sql = "UPDATE users SET username='$new_username', email='$new_email' WHERE id=$user_id";

if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
