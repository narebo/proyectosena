<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "proyecto");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos del formulario
$id_funcionario = $_POST['id_funcionario'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insertar datos en la tabla asignar_usuario
$sql = "INSERT INTO asignar_usuario (id_funcionario, username, password)
        VALUES ('$id_funcionario', '$username', '$password')";

if ($conexion->query($sql) === TRUE) {
    echo "Usuario asignado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>