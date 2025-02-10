<?php
    session_start();
    
     if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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

    <div class="galeria">
    <div class="titulo-docentes">
        <h1>Imágenes de Galería</h1>
    </div>

    <!-- Botones de acciones -->
    <div class="action-buttons">
        <button class="action-card" id="openModal"><i class="fas fa-user-plus"></i>Subir nueva imagen.</button>
        <p class="action-card">Las imagenes deben tener una relación de aspecto 1:1.</p>
        <p class="action-card">Se acepta cualquier tipo de formato de imagen.</p>
    </div>
        <?php
        include ("php/conexion.php");
        $sql = "SELECT * FROM galeria";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
        ?>
            <div class="galeria-card">
                
                <!-- Imagen en un círculo -->
                <div class="imagen-galeria">
                    <img src="php/<?php echo $mostrar['imagen']; ?>">
                </div>

                <!-- Acciones -->
                <div class="acciones">
                    <a class="eliminar-btn" href="php/eliminar_galeria.php?id=<?php echo $mostrar['id']; ?>">Eliminar</a>
                    <a class="modificar-btn" href="php/modificar_galeria.php?id=<?php echo $mostrar['id']; ?>">Modificar</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- Modal Registrar -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Registrar una nueva foto en galería</h2>
            <form action="php/registro_galeria.php" method="POST" enctype="multipart/form-data">
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" name="imagen" accept="image/*" required><br><br>

                <button class="modal-enviar" type="submit">Subir Foto</button>
            </form>
        </div>
    </div>

    <!--Modal Actualizar-->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close_edit">&times;</span>
            <h2>Modificar foto</h2>
            <form action="php/modificar_galeria.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="edit_imagen">Nueva imagen (opcional):</label>
                        <input type="file" name="imagen" id="edit_imagen" accept="image/*"><br>
                        <input type="hidden" name="imagen_actual" id="imagen_actual">
                    </div>
                <div class="imagen-preview">
                    <img id="current_image" src="php/<?php if(isset($imagen_actual)) echo $imagen_actual; ?>" alt="Imagen actual" style="max-width: 150px;">
                </div>

                <button class="modal-enviar" type="submit">Actualizar Foto</button>
            </form>
        </div>
    </div>
        

    <script>
        // Obtener elementos del DOM
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("openModal");
        var span = document.getElementsByClassName("close")[0];

        // Mostrar el modal al hacer clic en el botón
        btn.onclick = function() {
            modal.style.display = "flex";
        }

        // Cerrar el modal al hacer clic en la "X"
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Cerrar el modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }};

        document.addEventListener('DOMContentLoaded', function() {
        var editModal = document.getElementById("editModal");
        var editBtns = document.querySelectorAll(".modificar-btn");
        var closeEdit = document.getElementsByClassName("close_edit")[0];

        // Function to load teacher data
        function loadTeacherData(teacherId) {
        fetch(`php/obtener_galeria.php?id=${teacherId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_id').value = data.id;
                
                // Show current image
                document.getElementById('current_image').src = 'php/' + data.imagen;
                document.getElementById('imagen_actual').value = data.imagen;
            })
            .catch(error => console.error('Error:', error));
        }

        // Add click event to all edit buttons
        editBtns.forEach(btn => {
        btn.onclick = function(e) {
            e.preventDefault();
            const teacherId = this.getAttribute('href').split('=')[1];
            loadTeacherData(teacherId);
            editModal.style.display = "flex";
        }
        });

        // Close modal functionality
        closeEdit.onclick = function() {
        editModal.style.display = "none";
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
        }});
    </script>
</body>
</html>