<?php
include 'conexion.php';

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $conexion->real_escape_string($_POST['nombres']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $estado = $conexion->real_escape_string($_POST['estado']);
    $fecha = $conexion->real_escape_string($_POST['fecha']);

    // Manejo de la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_ruta = "uploads/" . basename($imagen_nombre);

    // Mover la imagen a la carpeta "uploads"
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    if (move_uploaded_file($imagen_tmp, $imagen_ruta)) {
        $sql = "INSERT INTO eventos(nombres, descripcion, imagen, fecha, estado) VALUES ('$nombres', '$descripcion', '$imagen_ruta', '$fecha', '$estado')";

        if ($conexion->query($sql)) {
            echo '<script>
            alert("Evento guardado exitosamente");
            window.location = "../eventos.php";
            </script>';
            exit();
        } else {
            echo "Error al registrar el evento: " . $conexion->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conexion->close();
?>
