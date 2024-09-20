$id_funcionario = $conexion->insert_id;
header("Location: asignar_usuario.php?id_funcionario=" . $id_funcionario);