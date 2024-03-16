<?php
// Definir las constantes de conexión
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'stephens');
define('DB_NAME', 'en_linea');

// Función para establecer la conexión a la base de datos
function conectarBD() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Configurar el conjunto de caracteres a utf8
    $conn->set_charset("utf8");

    return $conn;
}
?>
