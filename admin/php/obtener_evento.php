<?php
// obtener_docente.php
include 'conexion.php';

if(isset($_GET['id'])) {
    $id = $conexion->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM eventos WHERE id = $id";
    $result = $conexion->query($sql);
    
    if($result->num_rows > 0) {
        $docente = $result->fetch_assoc();
        echo json_encode($docente);
    } else {
        echo json_encode(['error' => 'Evento no encontrado']);
    }
}

$conexion->close();
?>