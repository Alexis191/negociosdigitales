<?php
    include 'conexion.php';
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    //Encriptar clave
    $clave = hash('sha512', $clave);

    $query = "INSERT INTO usuarios(correo, clave, nombres, apellidos) VALUES ('$correo', '$clave', '$nombres', '$apellidos')";

    //Verificar si el correo ya existe
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '<script>
        alert("Este correo ya está registrado, intenta con otro correo diferente");
        window.location = "../Registro.php";
        </script>';
        exit();
        mysqli_close($conexion);
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo '<script>
        alert("Usuario Registrado Exitosamente");
        window.location = "../inicio.php";
        </script>';
    }else{
        echo '<script>
        alert("Inténtalo de nuevo, usuario no almacenado");
        window.location = "../Registro.php";
        </script>';
    }

    mysqli_close($conexion);

?>