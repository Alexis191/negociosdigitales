<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: InicioSesion.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Costeñito</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="iniciosesion" class="login">
        <h2>Registra un nuevo usuario</h2>
        <form action="php/Registro.php" method="post">
            <label for="nombres">Nombres *</label>
            <input type="text" name="nombres" placeholder="Ingresa los nombres" class="login-input" required>
            <label for="apellidos">Apellidos *</label>
            <input type="text" name="apellidos" placeholder="Ingresa los apellidos  " class="login-input" required>
            <label for="correo">Correo Electrónico *</label>
            <input type="email" name="correo" placeholder="Ingresa un correo electrónico" class="login-input" required>
            <label for="clave">Contraseña *</label>
            <input type="password" name="clave" placeholder="Ingresa una contraseña" class="login-input" required>
            <button type="submit" class="login-button1">Registrar</button>
        </form>
        <a class="login-button2" href="Inicio.php">Regresar</a>
    </div>
</body>
</html>