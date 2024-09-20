<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_inventario_stock.css">
    <title>Listar Inventario</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="IMAGENES/2.png" alt="Logo de la Empresa">
            <h1>Listar Inventario</h1>
        </div>
        <nav>
            <ul>
                <li><a href="interfaz_admin.html">Atrás</a></li>
            </ul>
        </nav>
    </header>
    <br>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Obtener los datos del formulario y sanitizar
        $nombre_producto = $conn->real_escape_string($_POST['nombre_producto']);
        $cantidad = $conn->real_escape_string($_POST['cantidad']);
        $unidad_medida = $conn->real_escape_string($_POST['unidad_medida']);
        $precio = $conn->real_escape_string($_POST['precio']);
        $minimo = $conn->real_escape_string($_POST['minimo']);
        $consumo_diario = $conn->real_escape_string($_POST['consumo_diario']);
        $proxima_compra = $conn->real_escape_string($_POST['proxima_compra']);
        $estado = $conn->real_escape_string($_POST['estado']);

        // Preparar la consulta SQL para evitar SQL injection
        $sql = $conn->prepare("INSERT INTO inventario (nombre_producto, cantidad, unidad_medida, precio, minimo, consumo_diario, proxima_compra, estado) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("sisddsds", $nombre_producto, $cantidad, $unidad_medida, $precio, $minimo, $consumo_diario, $proxima_compra, $estado);

        // Ejecutar la consulta
        if ($sql->execute()) {
            echo "Registro guardado exitosamente";
            ?>
            <form action="listar.php">
                <input type="submit" name="boton" value="Listar">
            </form>
            <?php
        } else {
            echo "Error: " . $sql->error;
        }

        // Cerrar la conexión
        $sql->close();
        $conn->close();
    }
    ?>
</body>
</html>
