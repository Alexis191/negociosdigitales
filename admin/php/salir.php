<?php
session_start();
session_destroy();
header("location: ../InicioSesion.php");
exit();
?>