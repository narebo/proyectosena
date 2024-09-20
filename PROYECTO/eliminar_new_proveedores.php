<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM new_proveedores WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado exitosamente";
    ?>

        <form action="listar_new_proveedores.php">
            
        <input type="submit" name="boton" value="Listar">
        </form>

    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>