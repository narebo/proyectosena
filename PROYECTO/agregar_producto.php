<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = $_POST['product'];
    $cantidad = $_POST['quantity'];

    $sql = "INSERT INTO stock (producto, cantidad) VALUES ('$producto', $cantidad)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
        ?>
        <form action="read.php">

        <input type="submit" name="boton" value="Listar">
    </form>
    <?php

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>