<?php
$servername = "localhost";
$username = "root"; // Cambia si tu usuario es diferente
$password = ""; // Cambia si tienes una contraseña
$dbname = "proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>