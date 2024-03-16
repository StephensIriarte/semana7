<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $correo_electronico = $_POST["correo_electronico"];
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];
    $rut = $_POST["rut"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $tipo_plan = $_POST["tipo_plan"];

    // Validar la contraseña
    if (!preg_match("/[A-Z]/", $contrasena) || !preg_match("/[!$%\"\/&=]/", $contrasena) || strlen($contrasena) < 8) {
        echo "Error: La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un símbolo especial.";
        exit();
    }

    // Incluir el archivo de conexión
    include_once 'conexion.php';

    // Conexión a la base de datos
    $conn = conectarBD();
    
    // Insertar nuevo usuario en la base de datos como cliente
    $sql_usuario = "INSERT INTO Usuarios (correo_electronico, nombre_usuario, contrasena, rol) 
                    VALUES ('$correo_electronico', '$nombre_usuario', '$contrasena', '$rol')";

    if ($conn->query($sql_usuario) === TRUE) {
        // Obtener el ID del usuario recién insertado
        $usuario_id = $conn->insert_id;

        // Insertar al usuario como cliente
        $sql_cliente = "INSERT INTO Clientes (usuario_id) VALUES ('$usuario_id')";

        if ($conn->query($sql_cliente) === TRUE) {
            // Obtener el ID del cliente recién insertado
            $cliente_id = $conn->insert_id;

            // Insertar datos personales del usuario en la base de datos
            $sql_datos_personales = "INSERT INTO DatosPersonales (cliente_id, rut, nombre, direccion, email, telefono, tipo_plan) 
                                    VALUES ('$cliente_id', '$rut', '$nombre', '$direccion', '$correo_electronico', '$telefono', '$tipo_plan')";

            if ($conn->query($sql_datos_personales) === TRUE) {
                echo "Nuevo usuario agregado correctamente";
            } else {
                echo "Error al agregar datos personales: " . $sql_datos_personales . "<br>" . $conn->error;
            }
        } else {
            echo "Error al agregar usuario como cliente: " . $sql_cliente . "<br>" . $conn->error;
        }
    } else {
        echo "Error al agregar usuario: " . $sql_usuario . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Redireccionar si se intenta acceder directamente a este script
    header("Location: agregar_usuario.php");
    exit();
}
?>
