<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "proyecto");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Preparar la consulta SQL
$sql = "INSERT INTO new_sucursales (nombre, direccion, email, telefono) VALUES (?, ?, ?, ?)";

// Usar prepared statements para evitar inyecciones SQL
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $nombre, $direccion, $email, $telefono);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Sucursal agregada exitosamente.";

    ?>
    <form action="listar_new_sucursales.php">
    <input type="submit" name="boton" value="Listar">
    </form>
    <?php

} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>