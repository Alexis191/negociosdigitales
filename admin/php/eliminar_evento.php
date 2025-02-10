<?php
    include 'conexion.php';
    $id=$_GET['id'];

    $sql = "DELETE FROM eventos WHERE id=$id";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        echo '<script>
        alert("Evento eliminado correctamente.");
        window.location = "../eventos.php";
        </script>';
    }
?>