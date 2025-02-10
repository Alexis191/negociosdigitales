<?php
include 'conexion.php';

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $conexion->real_escape_string($_POST['nombres']);
    $materia1 = $conexion->real_escape_string($_POST['materia1']);
    $materia2 = $conexion->real_escape_string($_POST['materia2']);
    $materia3 = $conexion->real_escape_string($_POST['materia3']);
    $materia4 = $conexion->real_escape_string($_POST['materia4']);
    $materia5 = $conexion->real_escape_string($_POST['materia5']);

    // Manejo de la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_ruta = "uploads/" . basename($imagen_nombre);

    // Mover la imagen a la carpeta "uploads"
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    if (move_uploaded_file($imagen_tmp, $imagen_ruta)) {
        $sql = "INSERT INTO docentes(nombres, materia1, materia2, materia3, materia4, materia5, imagen) VALUES ('$nombres', '$materia1', '$materia2', '$materia3', '$materia4', '$materia5', '$imagen_ruta')";

        if ($conexion->query($sql)) {
            echo '<script>
            alert("Docente guardado exitosamente");
            window.location = "../docentes.php";
            </script>';
            exit();
        } else {
            echo "Error al registrar el docente: " . $conexion->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conexion->close();
?>
