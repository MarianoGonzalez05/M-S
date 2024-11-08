<?php
session_start(); // Iniciar la sesión
$carrito = $_SESSION['carrito'] ?? []; // Si no hay carrito, usamos un array vacío

// Lógica para actualizar la cantidad o eliminar productos
if (isset($_POST['accion'])) {
    $id = $_POST['id'];
    if ($_POST['accion'] === 'incrementar') {
        $carrito[$id]['cantidad']++;
    } elseif ($_POST['accion'] === 'decrementar' && $carrito[$id]['cantidad'] > 1) {
        $carrito[$id]['cantidad']--;
    } elseif ($_POST['accion'] === 'eliminar') {
        unset($carrito[$id]);
    }
    $_SESSION['carrito'] = $carrito; // Guardar los cambios en la sesión
    header("Location: carrito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>

    <?php if (empty($carrito)) { ?>
        <p>El carrito está vacío.</p>
    <?php } else { ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($carrito as $producto) { 
                    $subtotal = $producto['precio'] * $producto['cantidad'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td>$<?php echo number_format($subtotal, 2); ?></td>
                    <td>
                        <form method="POST" action="carrito.php">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" name="accion" value="incrementar">+</button>
                            <button type="submit" name="accion" value="decrementar">-</button>
                            <button type="submit" name="accion" value="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo number_format($total, 2); ?></h3>
    <?php } ?>
</body>
</html>
