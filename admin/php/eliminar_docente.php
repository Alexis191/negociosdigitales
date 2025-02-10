<?php
    include 'conexion.php';
    $id=$_GET['id'];

    $sql = "DELETE FROM docentes WHERE id=$id";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        echo '<script>
        alert("Registro eliminado correctamente.");
        window.location = "../docentes.php";
        </script>';
    }
?>