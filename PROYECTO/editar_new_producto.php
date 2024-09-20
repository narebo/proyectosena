<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_inventario_stock.css">
    <title>Editar Producto</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="IMAGENES/1.png" alt="Logo de la Empresa">
            <h1>Información Actualizada</h1>
        </div>
        <nav>
            <ul>
                <li><a href="interfaz_admin.html">Atras</a></li>
            </ul>
        </nav>
    </header>
<br>

<?php

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir datos del formulario
        $id = $_POST['id'];
        $nombre_producto = $_POST['nombre_producto'];
        $descripcion = $_POST['descripcion'];
        $precio_neto = $_POST['precio_neto'];
        $precio_venta = $_POST['precio_venta'];
        $imagen = $_POST['imagen'];
       
        // Actualización del new_productos
        $sql = "UPDATE new_productos SET nombre_producto=?, descripcion=?, precio_neto=?, precio_venta=?, imagen=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssddi", $nombre_producto, $descripcion, $precio_neto, $precio_venta, $imagen, $id);
        
        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente";

            // Obtener información actualizada del registro
            $sql = "SELECT * FROM new_productos WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            ?>


            <div>
                <!-- <h3>Información Actualizada:</h3> -->
                <p><strong>Producto:</strong> <?php echo htmlspecialchars($row['nombre_producto']); ?></p>
                <p><strong>Descripcion:</strong> <?php echo htmlspecialchars($row['descripcion']); ?></p>
                <p><strong>Precio Neto:</strong> <?php echo htmlspecialchars($row['precio_neto']); ?></p>
                <p><strong>Precio de Venta:</strong> <?php echo htmlspecialchars($row['precio_venta']); ?></p>
                <p><strong>Imagen:</strong> <?php echo htmlspecialchars($row['imagen']); ?></p>
            </div>

            <form action="listar_new_producto.php">
                <input type="submit" value="Listar">
            </form>

            <?php
        } else {
            echo "Error actualizando el registro: " . $conn->error;
        }

        // Cerrar la conexión
        $stmt->close();
        $conn->close();
    } else {
        // Obtener el ID desde GET para mostrar el formulario con los datos actuales
        $id = $_GET['id'];
        $sql = "SELECT * FROM new_productos WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>


<body>
    <div class="form-container">
        <h2>Actualizar Producto</h2>
        <form action="editar_new_producto.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

            <div class="form-group">
                <label for="nombre_producto">Producto:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo htmlspecialchars($row['nombre_producto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($row['descripcion']); ?>" required>
            </div>
            <div class="form-group">
                <label for="precio_neto">Precio Neto:</label>
                <input type="text" id="precio_neto" name="precio_neto" value="<?php echo htmlspecialchars($row['precio_neto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="precio_venta">Precio de Venta:</label>
                <input type="text" id="precio_venta" name="precio_venta" value="<?php echo htmlspecialchars($row['precio_venta']); ?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="text" id="imagen" name="imagen" value="<?php echo htmlspecialchars($row['imagen']); ?>" required>
            </div>
            
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>