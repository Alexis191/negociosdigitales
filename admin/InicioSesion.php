<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negocios Digitales</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="iniciosesion" class="login">
        <h1>Panel de Administrador</h1>
        <h2>Carrera de Negocios Digitales</h2>
        <h2>Iniciar Sesión</h2>
        <form action="php/InicioSesion.php" method="post">
            <label for="correo">Correo Electrónico *</label>
            <input type="email" name="correo" placeholder="Ingresa tu correo" class="login-input" required>
            <label for="password">Contraseña *</label>
            <input type="password" name="clave" placeholder="Ingresa tu contraseña" class="login-input" required>
            <button class="login-button1" type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>