<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        small {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <form action="procesar_usuario.php" method="POST">
        <h1>Agregar Nuevo Usuario</h1>
        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" required>

        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" minlength="8" required>
        <small>La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un símbolo especial.</small>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="agente">Agente</option>
            <option value="cliente">Cliente</option>
        </select>

        <label for="rut">RUT:</label>
        <input type="text" id="rut" name="rut" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="tipo_plan">Tipo de Plan:</label>
        <select id="tipo_plan" name="tipo_plan" required>
            <option value="normal">Normal</option>
            <option value="bueno">Bueno</option>
            <option value="excelente">Excelente</option>
            <option value="oferta de temporada">Oferta de Temporada</option>
        </select>

        <button type="submit">Agregar Usuario</button>
    </form>
</body>
</html>
