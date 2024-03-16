<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $correo_electronico = $_POST["correo_electronico"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $tipo_plan = $_POST["tipo_plan"];

    // Incluir el archivo de conexión
    include_once 'conexion.php';

    // Conexión a la base de datos
    $conn = conectarBD();
    
    // Insertar nuevo cliente en la base de datos
    $sql = "INSERT INTO Clientes (correo_electronico, nombre, direccion, telefono, tipo_plan) 
            VALUES ('$correo_electronico', '$nombre', '$direccion', '$telefono', '$tipo_plan')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cliente agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Redireccionar si se intenta acceder directamente a este script
    header("Location: agregar_cliente.php");
    exit();
}
?>
