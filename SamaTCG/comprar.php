<?php
session_start();

// Simular la compra (podrías registrar en la base de datos).
unset($_SESSION['carrito']); // Vaciar el carrito.

echo "<p>Compra realizada con éxito. ¡Gracias por tu compra!</p>";
echo "<a href='cartas.php'>Volver a la tienda</a>";
?>
