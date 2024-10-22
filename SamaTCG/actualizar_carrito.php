<?php
session_start();

$index = $_POST['index'];
$accion = $_POST['accion'];

if ($accion == 'incrementar') {
    $_SESSION['carrito'][$index]['cantidad']++;
} elseif ($accion == 'decrementar') {
    if ($_SESSION['carrito'][$index]['cantidad'] > 1) {
        $_SESSION['carrito'][$index]['cantidad']--;
    } else {
        unset($_SESSION['carrito'][$index]);
    }
} elseif ($accion == 'eliminar') {
    unset($_SESSION['carrito'][$index]);
}

// Reindexar el carrito para evitar índices vacíos.
$_SESSION['carrito'] = array_values($_SESSION['carrito']);

header('Location: carrito.php');
exit;
?>
