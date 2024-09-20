<?php
include 'db.php';

$sql = "SELECT id, nombre, apellido, direccion, email, telefono, cargo FROM new_funcionario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_inventario_stock.css">
    <title>Lista de Nuevos Funcionario</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="IMAGENES/2.png" alt="Logo de la Empresa">
            <h1>Nuevos Funcionario</h1>
        </div>
        <nav>
            <ul>
                <li><a href="interfaz_admin.html">Atras</a></li>
            </ul>
        </nav>
    </header>
<br>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .table-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            text-decoration: none;
            padding: 8px 12px;
            color: #fff;
            background-color: #28a745;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        p {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Nuevos Funcionario</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>";
        while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['apellido']}</td>
                        <td>{$row['direccion']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['telefono']}</td>
                        <td>{$row['cargo']}</td>
                      <td>
                            <a href='editar_new_funcionario.php?id={$row['id']}' class='btn'>Editar</a><br></br>
                            <a href='eliminar_new_funcionario.php?id={$row['id']}' class='btn btn-danger'>Eliminar</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay inventario registrado.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>