<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: InicioSesion.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Gestión</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Panel lateral -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="../img/logo_ND.png" alt="Logo" class="logo">
            <h2>Panel de Gestión</h2>
        </div>
        <nav class="nav-menu">
            <a href="inicio.php">Inicio</a>
            <a href="docentes.php">Docentes</a>
            <a href="eventos.php">Eventos</a>
            <a href="galeria.php">Galería</a>
            <a href="registro.php">Registrar usuario</a>
            <a href="php/salir.php">Cerrar Sesión</a>
        </nav>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
        <div class="main-header">
            <h1>Bienvenido al Panel de Gestión</h1>
        </div>

       <!-- Botones de acciones -->
       <div class="action-buttons">
            <a href="docentes.php" class="action-card"><i class="fas fa-user-plus"></i>Registrar docente</a>
            <a href="eventos.php" class="action-card"><i class="fas fa-calendar-check"></i>Crear evento</a>
            <a href="galeria.php" class="action-card"><i class="fas fa-photo-film"></i>Subir multimedia</a>
            <a href="registro.php" class="action-card"><i class="fas fa-users"></i>Registrar Usuario</a>
        </div>

        <!-- Tarjetas de estadísticas con iconos -->
        <div class="stats-container">
            <div class="stat-card">
                <i class="fas fa-user-graduate icon"></i>
                <h3>Estudiantes</h3>
                <p>+150</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-chalkboard-teacher icon"></i>
                <h3>Docentes</h3>
                <p>+15</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-award icon"></i>
                <h3>Graduados</h3>
                <p>0</p>
            </div>
            <div class="stat-card">
                <i class="fas fa-dollar-sign icon"></i>
                <h3>Inversión</h3>
                <p>+$4,000</p>
            </div>
        </div>

        <!-- Gráfico de Estudiantes -->
        <div class="chart-container">
            <canvas id="graficaEstudiantes"></canvas>
        </div>
    </div>

    <script>
        // Configuración de la gráfica
        const ctx = document.getElementById('graficaEstudiantes').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['P60', 'P61', 'P62', 'P63', 'P64', 'P65'],
                datasets: [{
                    label: 'Número de Estudiantes',
                    data: [10, 25, 28, 30, 35, 40],
                    backgroundColor: ['#003976', '#e36a0e', '#FCC000'],
                    borderColor: '#333',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
