<?php
include 'db.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibir datos del formulario
        $id = $_POST['id'];
        $nombre_producto = $_POST['nombre_producto'];
        $cantidad = $_POST['cantidad'];
        $unidad_medida = $_POST['unidad_medida'];
        $unidad_medida1 = $_POST['unidad_medida1'];
        $unidad_medida2 = $_POST['unidad_medida2'];
        $precio = $_POST['precio'];
        $minimo = $_POST['minimo'];
        $consumo_diario = $_POST['consumo_diario'];
        $proxima_compra = $_POST['proxima_compra'];
        $estado = $_POST['estado'];

        // Actualización del inventario
        $sql = "UPDATE inventario SET nombre_producto=?, cantidad=?, unidad_medida=?, unidad_medida1=?, unidad_medida2=?, 
                precio=?, minimo=?, consumo_diario=?, proxima_compra=?, estado=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssissisi", $nombre_producto, $cantidad, $unidad_medida, $unidad_medida1, $unidad_medida2, 
                            $precio, $minimo, $consumo_diario, $proxima_compra, $estado, $id);

        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente";

            // Obtener información actualizada del registro
            $sql = "SELECT * FROM inventario WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_inventario_stock.css">
    <title>Editar Inventario</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="IMAGENES/1.png" alt="Logo de la Empresa">
            <h1>Editar Inventario</h1>
        </div>
        <nav>
            <ul>
                <li><a href="interfaz_admin.html">Atras</a></li>
            </ul>
        </nav>
    </header>
<br>

            <div>
                <h3>Información Actualizada:</h3>
                <p><strong>Producto:</strong> <?php echo htmlspecialchars($row['nombre_producto']); ?></p>
                <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($row['cantidad']); ?></p>
                <p><strong>Unidad de medida:</strong> <?php echo htmlspecialchars($row['unidad_medida']); ?></p>
                <p><strong>Unidad de medida 1:</strong> <?php echo htmlspecialchars($row['unidad_medida1']); ?></p>
                <p><strong>Unidad de medida 2:</strong> <?php echo htmlspecialchars($row['unidad_medida2']); ?></p>
                <p><strong>Precio:</strong> <?php echo htmlspecialchars($row['precio']); ?></p>
                <p><strong>Cantidad mínima:</strong> <?php echo htmlspecialchars($row['minimo']); ?></p>
                <p><strong>Consumo diario:</strong> <?php echo htmlspecialchars($row['consumo_diario']); ?></p>
                <p><strong>Próxima compra:</strong> <?php echo htmlspecialchars($row['proxima_compra']); ?></p>
                <p><strong>Estado:</strong> <?php echo htmlspecialchars($row['estado']); ?></p>
            </div>

            <form action="listar.php">
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
        $sql = "SELECT * FROM inventario WHERE id=?";
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
        <h2>Actualizar Inventario</h2>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

            <div class="form-group">
                <label for="nombre_producto">Producto:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo htmlspecialchars($row['nombre_producto']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="text" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($row['cantidad']); ?>" required>
            </div>
            <div class="form-group">
                <label for="unidad_medida">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" value="<?php echo htmlspecialchars($row['unidad_medida']); ?>" required>
            </div>
            <div class="form-group">
                <label for="unidad_medida1">Unidad de Medida 1:</label>
                <input type="text" id="unidad_medida1" name="unidad_medida1" value="<?php echo htmlspecialchars($row['unidad_medida1']); ?>" required>
            </div>
            <div class="form-group">
                <label for="unidad_medida2">Unidad de Medida 2:</label>
                <input type="text" id="unidad_medida2" name="unidad_medida2" value="<?php echo htmlspecialchars($row['unidad_medida2']); ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" value="<?php echo htmlspecialchars($row['precio']); ?>" required>
            </div>
            <div class="form-group">
                <label for="minimo">Cantidad Mínima:</label>
                <input type="text" id="minimo" name="minimo" value="<?php echo htmlspecialchars($row['minimo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="consumo_diario">Consumo Diario:</label>
                <input type="text" id="consumo_diario" name="consumo_diario" value="<?php echo htmlspecialchars($row['consumo_diario']); ?>" required>
            </div>
            <div class="form-group">
                <label for="proxima_compra">Próxima Compra:</label>
                <input type="text" id="proxima_compra" name="proxima_compra" value="<?php echo htmlspecialchars($row['proxima_compra']); ?>" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($row['estado']); ?>" required>
            </div>
            
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>