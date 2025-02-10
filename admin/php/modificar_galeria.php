<?php
// actualizar_docente.php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conexion->real_escape_string($_POST['id']);
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

    $sql = "UPDATE galeria SET 
            imagen = '$imagen_ruta'
            WHERE id = $id";

    if ($conexion->query($sql)) {
        echo '<script>
        alert("Foto actualizada exitosamente");
        window.location = "../galeria.php";
        </script>';
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}

$conexion->close();
?>