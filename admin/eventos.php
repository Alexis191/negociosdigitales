<?php
    session_start();
    
     // Verificar si el usuario ha iniciado sesión
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

    <div class="eventos">
    <div class="titulo-evento">
        <h1>Lista de Eventos</h1>
    </div>

    <!-- Botones de acciones -->
    <div class="action-buttons">
        <button class="action-card" id="openModal"><i class="fas fa-calendar-check"></i>Registrar nuevo evento.</button>
        <p class="action-card">Las imagenes deben tener una relación de aspecto 1:1.</p>
        <p class="action-card">Se acepta cualquier tipo de formato de imagen.</p>
    </div>

        <?php
        include ("php/conexion.php");
        $sql = "SELECT * FROM eventos";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
        ?>
            <div class="evento-card">
                <!-- Nombre en H1 -->
                <h1><?php echo $mostrar['nombres']; ?></h1>

                <!-- Imagen en un círculo -->
                <div class="imagen-evento">
                    <img src="php/<?php echo $mostrar['imagen']; ?>" alt="Foto de evento">
                </div>

                <!-- Lista de Materias -->
                <h3>Información del evento</h3>
                <ol>
                    <li><?php echo $mostrar['descripcion']; ?></li>
                    <li><?php echo $mostrar['fecha']; ?></li>
                    <li><?php echo $mostrar['estado']; ?></li>
                </ol>

                <!-- Acciones -->
                <div class="acciones">
                    <a class="eliminar-btn" href="php/eliminar_evento.php?id=<?php echo $mostrar['id']; ?>">Eliminar</a>
                    <a class="modificar-btn" href="php/modificar_evento.php?id=<?php echo $mostrar['id']; ?>">Modificar</a>
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
            <h2>Registrar un nuevo evento</h2>
            <form action="php/registro_evento.php" method="POST" enctype="multipart/form-data">
                <label for="nombres">Nombre del evento:</label>
                <input type="text" name="nombres" placeholder="Ingresa el nombre del evento." class="modal-input" required><br><br>

                <label for="descripcion">Descripción del evento:</label>
                <input type="text" name="descripcion" placeholder="Ingresa la descripcion del evento" class="modal-input" required><br><br>

                <div class="materias-container">
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="estado">Escoge el estado del evento:</label>
                            <select name="estado" id="estado">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Proximamente">Proximamente</option>
                                <option value="Pasado">Pasado</option>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Escoge la fecha del evento:</label>
                            <input type="date" name="fecha" class="modal-input" required><br><br>
                            
                        </div>
                    </div>
                </div>
                
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" name="imagen" accept="image/*" required><br><br>

                <button class="modal-enviar" type="submit">Subir Evento</button>
            </form>
        </div>
    </div>

    <!--Modal Actualizar-->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close_edit">&times;</span>
            <h2>Modificar evento</h2>
            <form action="php/modificar_evento.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <label for="edit_nombres">Nombre del evento:</label>
                <input type="text" name="nombres" id="edit_nombres" class="modal-input" required><br><br>

                <label for="edit_descripcion">Descripción del evento:</label>
                <input type="text" name="descripcion" id="edit_descripcion" class="modal-input" required><br><br>

                <div class="materias-container">
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="edit_estado">Estado del evento:</label>
                            <select name="estado" id="edit_estado">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Proximamente">Proximamente</option>
                                <option value="Pasado">Pasado</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_fecha">Fecha del evento:</label>
                            <input type="date" name="fecha" class="modal-input" id="edit_fecha" required><br><br>
                        </div>
                    </div>
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="edit_imagen">Nueva imagen (opcional):</label>
                            <input type="file" name="imagen" id="edit_imagen" accept="image/*"><br>
                            <input type="hidden" name="imagen_actual" id="imagen_actual">

                        </div>
                    </div>
                </div>

                <div class="imagen-preview">
                    <img id="current_image" src="" alt="Imagen actual" style="max-width: 150px;">
                </div>

                <button class="modal-enviar" type="submit">Actualizar Evento</button>
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
            fetch(`php/obtener_evento.php?id=${teacherId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_nombres').value = data.nombres;
                    document.getElementById('edit_descripcion').value = data.descripcion;
                    document.getElementById('edit_fecha').value = data.fecha;
                    document.getElementById('edit_estado').value = data.estado;
                    
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