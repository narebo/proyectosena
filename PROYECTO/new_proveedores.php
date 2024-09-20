<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_de_datos = "proyecto";

// Crear la conexión
$conn = new mysqli($host, $usuario, $password, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$producto = $_POST['producto'];
$descripcion = $_POST['descripcion'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO new_proveedores (nombre, direccion, telefono, email, producto, descripcion) VALUES ('$nombre', '$direccion', '$telefono', '$email', '$producto', '$descripcion')";

// Ejecutar la consulta y verificar si se insertaron los datos
if ($conn->query($sql) === TRUE) {
    echo "Proveedor registrado exitosamente.";

    ?>
    <form action="listar_new_proveedores.php">
    <input type="submit" name="boton" value="Listar">
    </form>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
