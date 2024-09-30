<?php
$host = 'localhost';
$dbname = 'samabd';
$user = 'root'; // Cambia según tus credenciales
$pass = '';     // Cambia según tus credenciales

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
