<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'proyecto');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Capturar los datos del formulario
$saldo_inicial = $_POST['saldo_inicial'];
$usuario_id = $_POST['usuario_id'];

// Insertar los datos en la tabla 'caja'
$sql = "INSERT INTO caja (fecha_apertura, saldo_inicial, usuario_id, estado) 
        VALUES (NOW(), ?, ?, 'abierta')";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('di', $saldo_inicial, $usuario_id);

if ($stmt->execute()) {
    echo "Caja abierta con éxito.";
} else {
    echo "Error al abrir la caja: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
