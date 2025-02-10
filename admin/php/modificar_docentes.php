<?php
// actualizar_docente.php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conexion->real_escape_string($_POST['id']);
    $nombres = $conexion->real_escape_string($_POST['nombres']);
    $materia1 = $conexion->real_escape_string($_POST['materia1']);
    $materia2 = $conexion->real_escape_string($_POST['materia2']);
    $materia3 = $conexion->real_escape_string($_POST['materia3']);
    $materia4 = $conexion->real_escape_string($_POST['materia4']);
    $materia5 = $conexion->real_escape_string($_POST['materia5']);
    $imagen_actual = $_POST['imagen_actual'];

    $imagen_ruta = $imagen_actual; // Mantener imagen actual por defecto

    // Procesar nueva imagen si se subió una
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen_ruta = "uploads/" . basename($imagen_nombre);

        // Eliminar imagen anterior si existe
        if ($imagen_actual && file_exists($imagen_actual)) {
            unlink($imagen_actual);
        }

        // Mover nueva imagen
        move_uploaded_file($imagen_tmp, $imagen_ruta);
    }

    $sql = "UPDATE docentes SET 
            nombres = '$nombres',
            materia1 = '$materia1',
            materia2 = '$materia2',
            materia3 = '$materia3',
            materia4 = '$materia4',
            materia5 = '$materia5',
            imagen = '$imagen_ruta'
            WHERE id = $id";

    if ($conexion->query($sql)) {
        echo '<script>
        alert("Docente actualizado exitosamente");
        window.location = "../docentes.php";
        </script>';
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}

$conexion->close();
?>