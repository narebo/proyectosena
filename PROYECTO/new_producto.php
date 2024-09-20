<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'proyecto');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio_neto = $_POST['precio_neto'];
$precio_venta = $_POST['precio_venta'];

// Manejo de la imagen
$imagen = $_FILES['imagen']['name'];
$directorio = 'imagenes/'; // Directorio donde se guardarán las imágenes
$ruta_imagen = $directorio . basename($imagen);

// Verificar si la imagen se subió correctamente
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO new_productos (nombre_producto, descripcion, precio_neto, precio_venta, imagen) 
            VALUES ('$nombre_producto', '$descripcion', '$precio_neto', '$precio_venta', '$ruta_imagen')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo producto agregado con éxito.";

        ?>
        <form action="listar_new_producto.php">
        <input type="submit" name="boton" value="Listar">
    </form>
    <?php

    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
} else {
    echo "Error al subir la imagen.";
}

// Cerrar la conexión
$conexion->close();
?>
