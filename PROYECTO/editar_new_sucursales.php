<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_inventario_stock.css">
    <title>Editar Sucursales</title>
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
        $id_sucursal = $_POST['id_sucursal'];
        $nombre = $_POST['nombre'];        
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];       
               
        // Actualización del new_Sucursales
        $sql = "UPDATE new_sucursales SET nombre=?, direccion=?, email=?, telefono=? WHERE id_sucursal=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $direccion, $email, $telefono, $id_sucursal);
        
        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente";

            // Obtener información actualizada del registro
            $sql = "SELECT * FROM new_sucursales WHERE id_sucursal=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_sucursal);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            ?>

            <div>
                <!-- <h3>Información Actualizada:</h3> -->
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($row['nombre']); ?></p>                
                <p><strong>Direccion:</strong> <?php echo htmlspecialchars($row['direccion']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                <p><strong>Telefono:</strong> <?php echo htmlspecialchars($row['telefono']); ?></p>                               
            </div>

            <form action="listar_new_sucursales.php">
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
        $id_sucursal = $_GET['id'];
        $sql = "SELECT * FROM new_sucursales WHERE id_sucursal=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_sucursal);
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
        <h2>Actualizar Sucursales</h2>
        <form action="editar_new_sucursales.php" method="POST">
            <input type="hidden" name="id_sucursal" value="<?php echo htmlspecialchars($row['id_sucursal']); ?>">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
            </div>            
            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($row['direccion']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($row['telefono']); ?>" required>
            </div>           
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>