<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_inventario_stock.css">
    <title>Editar Funcionario</title>
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
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];        
        $cargo = $_POST['cargo'];
               
        // Actualización del new_Funcionario
        $sql = "UPDATE new_funcionario SET nombre=?, apellido=?, direccion=?, email=?, telefono=?, cargo=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $nombre, $apellido, $direccion, $email, $telefono, $cargo, $id);
        
        if ($stmt->execute()) {
            echo "Registro actualizado exitosamente";

            // Obtener información actualizada del registro
            $sql = "SELECT * FROM new_funcionario WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            ?>

            <div>
                <!-- <h3>Información Actualizada:</h3> -->
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($row['nombre']); ?></p>
                <p><strong>Apellido:</strong> <?php echo htmlspecialchars($row['apellido']); ?></p>
                <p><strong>Direccion:</strong> <?php echo htmlspecialchars($row['direccion']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                <p><strong>Telefono:</strong> <?php echo htmlspecialchars($row['telefono']); ?></p>                
                <p><strong>Cargo:</strong> <?php echo htmlspecialchars($row['cargo']); ?></p>                
            </div>

            <form action="listar_new_funcionario.php">
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
        $sql = "SELECT * FROM new_funcionario WHERE id=?";
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
        <h2>Actualizar Funcionario</h2>
        <form action="editar_new_funcionario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($row['apellido']); ?>" required>
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
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" value="<?php echo htmlspecialchars($row['cargo']); ?>" required>
            </div>           
            
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>