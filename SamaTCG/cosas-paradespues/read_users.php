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

$sql = "SELECT id, username, email, created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de datos por cada fila
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " - Email: " . $row["email"]. " - Created at: " . $row["created_at"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
