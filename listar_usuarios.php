<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listado de Usuarios</h2>
    <?php
   include_once 'conexion.php';
   $conn = conectarBD();
    // Consulta SQL para listar usuarios
    $sql = "SELECT id, correo_electronico, nombre_usuario, rol FROM Usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla
        echo "<table>";
        echo "<tr><th>ID</th><th>Correo Electrónico</th><th>Nombre de Usuario</th><th>Rol</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["correo_electronico"]."</td>";
            echo "<td>".$row["nombre_usuario"]."</td>";
            echo "<td>".$row["rol"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron usuarios.";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>