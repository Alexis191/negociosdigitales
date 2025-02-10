<?php
session_start(); // Iniciar sesión
include 'conexion.php'; // Conexión a la base de datos

$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Verificar que los campos no estén vacíos
if (empty($correo) || empty($clave)) {
    echo '<script>
        alert("Por favor, completa todos los campos");
        window.location = "../InicioSesion.php";
        </script>';
    exit();
}

// Buscar el usuario en la base de datos
$query = "SELECT correo, clave, nombres, apellidos FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
    
    // Verificar la clave encriptada con SHA-512
    if (hash('sha512', $clave) === $usuario['clave']) {
        $_SESSION['U_correo'] = $usuario['correo'];
        $_SESSION['U_nombres'] = $usuario['nombres'];
        $_SESSION['u_apellidos'] = $usuario['apellidos'];
        $_SESSION['loggedin'] = true;

        echo '<script>
            alert("Inicio de sesión exitoso");
            window.location = "../inicio.php";
            </script>';
        exit();
    } else {
        echo '<script>
            alert("Clave incorrecta");
            window.location = "../InicioSesion.php";
            </script>';
        exit();
    }
} else {
    echo '<script>
        alert("El correo no está registrado");
        window.location = "../InicioSesion.php";
        </script>';
    exit();
}

mysqli_close($conexion);
?>
