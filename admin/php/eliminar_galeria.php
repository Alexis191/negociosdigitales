<?php
    include 'conexion.php';
    $id=$_GET['id'];

    $sql = "DELETE FROM galeria WHERE id=$id";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado){
        echo '<script>
        alert("Foto eliminada correctamente.");
        window.location = "../galeria.php";
        </script>';
    }
?>