<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos_CSS/ad_funcionarios.css">
    <title>Gestión de Funcionarios</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="IMAGENES/2.png" alt="Logo de la Empresa">
            <h1>Gestión de Funcionarios</h1>
        </div>
        <nav>
            <ul>
                <li><a href="interfaz_admin.html">Atras</a></li>
            </ul>
        </nav>
    </header>

    <main class="form-container">
        <form action="new_funcionario.php" method="post"></form>
            <h2>Adicionar Nuevo Funcionario</h2>
    
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" required><br><br>

        <label for="cargo">Cargo:</label>
        <select id="cargo" name="cargo" required>
            <option value="cajero">Cajero</option>
            <option value="chef">Chef</option>
            <option value="mesero">Mesero</option>
        </select><br><br>

        <input type="submit" value="Adicionar Funcionario">
        </form>
    </main>
</body>
</html>