<?php
include 'conexion.php';

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Manejo de la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_ruta = "uploads/" . basename($imagen_nombre);

    // Mover la imagen a la carpeta "uploads"
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    if (move_uploaded_file($imagen_tmp, $imagen_ruta)) {
        $sql = "INSERT INTO galeria(imagen) VALUES ('$imagen_ruta')";

        if ($conexion->query($sql)) {
            echo '<script>
            alert("Foto guardada exitosamente");
            window.location = "../galeria.php";
            </script>';
            exit();
        } else {
            echo "Error al registrar la foto: " . $conexion->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conexion->close();
?>
