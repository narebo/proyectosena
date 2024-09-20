<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'restaurante');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$table = $_POST['table'];
$menu_items = $_POST['menu_items'];

// Verificar si se seleccionaron productos
if (!empty($menu_items)) {
    // Preparar y ejecutar la consulta SQL para guardar el pedido
    $stmt = $conn->prepare("INSERT INTO orders (table_number, item_id) VALUES (?, ?)");
    
    foreach ($menu_items as $item_id) {
        $stmt->bind_param("ii", $table, $item_id);
        $stmt->execute();
    }
    
    $stmt->close();
    echo "Pedido registrado con éxito.";
} else {
    echo "No se seleccionaron productos.";
}

$conn->close();
?>
