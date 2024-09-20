<?php
include 'conexion.php';

$sql = "SELECT producto, cantidad FROM stock";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="table-container">
        <h2>Lista de Usuarios</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Producto</th><th>Cantidad</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["producto"]. "</td><td>" . $row["cantidad"]. "</td><td>";

              echo "<table id="stockTable">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>"

                echo "<td><a href='update.php?id=" . $row["id"] . "' class='btn btn-success'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger'>Eliminar</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay usuarios registrados.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
