<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$cargo = $_POST['cargo'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO new_funcionario (nombre, apellido, direccion, email, telefono, cargo)
        VALUES ('$nombre', '$apellido', '$direccion', '$email', '$telefono', '$cargo')";

// Ejecutar la consulta y verificar si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo "Funcionario adicionado exitosamente.";
    
    ?>
    <form action="listar_new_funcionario.php">
    <input type="submit" name="boton" value="Listar">
    </form>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
