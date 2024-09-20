<?php
include 'db.php';

$id_sucursal = $_GET['id'];

$sql = "DELETE FROM new_sucursales WHERE id_sucursal=$id_sucursal";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado exitosamente";
    ?>

        <form action="listar_new_sucursales.php">
            
        <input type="submit" name="boton" value="Listar">
        </form>

    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>