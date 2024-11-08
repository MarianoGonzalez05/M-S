<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'samabd';

$conn = mysqli_connect($host, $user, $password, $database);

// Verificar conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
