<?php
session_start();

// Verificar si el carrito ya existe, sino crearlo como array vacío.
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Obtener los datos del producto desde el formulario.
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

// Verificar si el producto ya está en el carrito.
$producto_encontrado = false;
foreach ($_SESSION['carrito'] as &$producto) {
    if ($producto['id'] == $id) {
        $producto['cantidad']++;
        $producto_encontrado = true;
        break;
    }
}

// Si no estaba, agregarlo al carrito.
if (!$producto_encontrado) {
    $_SESSION['carrito'][] = [
        'id' => $id,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => 1
    ];
}

header('Location: carrito.php'); // Redirigir al carrito.
exit;
?>
