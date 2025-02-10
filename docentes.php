<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Negocios Digitales</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <img src="img/logo_ND.png" alt="Logo" class="logo">
        <nav>
            <a href="inicio.php">Inicio</a>
            <a href="docentes.php">Docentes</a>
            <a href="materias.php">Materias</a>
            <a href="eventos.php">Eventos</a>
            <a href="galeria.php">Galería</a>
        </nav>
    </header>

    <div class="galeria-encabezado">
        <h1>Conoce a los docentes de la Carrera de Negocios Digitales</h1>
        <p>Te presentamos a nuestros docentes con las materias que ofrecen.</p>
    </div>

    <div class="galeria">
        <?php
        include ("php/conexion.php");
        $sql = "SELECT * FROM docentes";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
        ?>
            <div class="docente-card">
                <!-- Nombre en H1 -->
                <h1><?php echo $mostrar['nombres']; ?></h1>

                <!-- Imagen en un círculo -->
                <div class="imagen-container">
                    <img src="admin/php/<?php echo $mostrar['imagen']; ?>" alt="Foto de <?php echo $mostrar['nombres']; ?>">
                </div>

                <!-- Lista de Materias -->
                <h3>Materias</h3>
                <ol>
                    <li><?php echo $mostrar['materia1']; ?></li>
                    <li><?php echo $mostrar['materia2']; ?></li>
                    <li><?php echo $mostrar['materia3']; ?></li>
                    <li><?php echo $mostrar['materia4']; ?></li>
                    <li><?php echo $mostrar['materia5']; ?></li>
                </ol>

            </div>
        <?php
        }
        ?>
    </div>

    <footer>
        <div class="footer-column">
            <h3>Desarrollado por</h3>
            <p>Eddie Ayala</p>
            <p>Alexis Collaguazo</p>
            <p>Mateo Narváez</p>
            <p>Cristhian Pazmiño</p>
            <p>Cesar Trujillo</p>
        </div>
        <div class="footer-column">
            <h3>Contacto</h3>
            <p>Directora: Paola Ximena Torres Cisneros</p>
            <p>Teléfono: (+593) 2 3962900 ext.: 2178</p>
            <p>Email: ptorres@ups.edu.ec</p>
            <p>Dirección: Av. Isabela Católica, Bloque B - Campus Girón </p>
        </div>
        <div class="footer-column">
            <h3>Redes Sociales</h3>
            <div class="social-icons">
                <a href="https://www.instagram.com/negociosdigitales.uio/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@negociosdigitales.ups?is_from_webapp=1&sender_device=pc"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </footer>
    <div class="copyright">
        © 2025 Carrera de Negocios Digitales. Todos los derechos reservados.
    </div>
</body>
</html>