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

    <div class="docentes">
    <div class="titulo-docentes">
        <h1>Lista de Docentes</h1>
    </div>

    <!-- Botones de acciones -->
    <div class="action-buttons">
        <button class="action-card" id="openModal"><i class="fas fa-user-plus"></i>Registrar nuevo docente.</button>
        <p class="action-card">Las imagenes deben tener una relación de aspecto 1:1.</p>
        <p class="action-card">Dejar vacio los campos materia si el docente no tiene muchas materias.</p>
        <p class="action-card">Se acepta cualquier tipo de formato de imagen.</p>
    </div>

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
                    <img src="php/<?php echo $mostrar['imagen']; ?>" alt="Foto de <?php echo $mostrar['nombres']; ?>">
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

                <!-- Acciones -->
                <div class="acciones">
                    <a class="eliminar-btn" href="php/eliminar_docente.php?id=<?php echo $mostrar['id']; ?>">Eliminar</a>
                    <a class="modificar-btn" href="php/modificar_docentes.php?id=<?php echo $mostrar['id']; ?>">Modificar</a>
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
            <h2>Registrar un nuevo docente</h2>
            <form action="php/registro_docente.php" method="POST" enctype="multipart/form-data">
                <label for="nombres">Nombre y apellido:</label>
                <input type="text" name="nombres" placeholder="Ingresa el nombre y apellido." class="modal-input" required><br><br>

                <div class="materias-container">
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="materia1">Escoge la materia 1:</label>
                            <select name="materia1" id="materia1">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <label for="materia2">Escoge la materia 2:</label>
                            <select name="materia2" id="materia2">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select><br>
                        </div>
                    </div>
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="materia3">Escoge la materia 3:</label>
                            <select name="materia3" id="materia3">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select><br>
                        </div>
                        <div class="form-group">            
                            <label for="materia4">Escoge la materia 4:</label>
                            <select name="materia4" id="materia4">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select><br>
                        </div>
                    </div>
                </div>
                <div class="materia-group">
                    <div class="form-group">
                        <label for="materia5">Escoge la materia 5:</label>
                        <select name="materia5" id="materia5">
                            <option value="">Por favor escoge una opción</option>
                            <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                            <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                            <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                            <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                            <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                            <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                            <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                            <option value="Marketing Digital">Marketing Digital</option>
                            <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                            <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                            <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                            <option value="Programación">Programación</option>                    
                            <option value="Publicidad Digital">Publicidad Digital</option>
                            <option value="Realidad Aumentada">Realidad Aumentada</option>
                            <option value="Transformación Digital">Transformación Digital</option>
                        </select><br>
                    </div>
                </div>
                
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" name="imagen" accept="image/*" required><br><br>

                <button class="modal-enviar" type="submit">Subir Docente</button>
            </form>
        </div>
    </div>

    <!--Modal Actualizar-->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close_edit">&times;</span>
            <h2>Modificar docente</h2>
            <form action="php/modificar_docentes.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <label for="edit_nombres">Nombre y apellido:</label>
                <input type="text" name="nombres" id="edit_nombres" class="modal-input" required><br><br>

                <div class="materias-container">
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="edit_materia1">Materia 1:</label>
                            <select name="materia1" id="edit_materia1">
                                <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_materia2">Materia 2:</label>
                            <select name="materia2" id="edit_materia2">
                            <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select>
                        </div>
                    </div>
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="edit_materia3">Materia 3:</label>
                            <select name="materia3" id="edit_materia3">
                            <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_materia4">Materia 4:</label>
                            <select name="materia4" id="edit_materia4">
                            <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select>
                        </div>
                    </div>
                    <div class="materia-group">
                        <div class="form-group">
                            <label for="edit_materia5">Materia 5:</label>
                            <select name="materia5" id="edit_materia5">
                            <option value="">Por favor escoge una opción</option>
                                <option value="Asistentes Virtuales y APP">Asistentes Virtuales y APP</option>
                                <option value="Auditoría de Sistemas y Negocios Electrónicos">Auditoría de Sistemas y Negocios Electrónicos</option>
                                <option value="Diseño y Creación de Páginas Web">Diseño y Creación de Páginas Web</option>
                                <option value="Ecosistemas Digitales">Ecosistemas Digitales</option>
                                <option value="Finanzas para Negocios Digitales">Finanzas para Negocios Digitales</option>
                                <option value="Fundamentos de Bases de Datos">Fundamentos de Bases de Datos</option>
                                <option value="Inteligencia Artificial para la Gestión Empresarial">Inteligencia Artificial para la Gestión Empresarial</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Negocios Electrónicos">Negocios Electrónicos</option>
                                <option value="Programación Orientada a Objetos">Programación Orientada a Objetos</option>
                                <option value="Prácticas de Servicio Comunitario">Prácticas de Servicio Comunitario</option>
                                <option value="Programación">Programación</option>                    
                                <option value="Publicidad Digital">Publicidad Digital</option>
                                <option value="Realidad Aumentada">Realidad Aumentada</option>
                                <option value="Transformación Digital">Transformación Digital</option>
                            </select>
                        </div>
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

                <button class="modal-enviar" type="submit">Actualizar Docente</button>
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
            fetch(`php/obtener_docente.php?id=${teacherId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_id').value = data.id;
                    document.getElementById('edit_nombres').value = data.nombres;
                    document.getElementById('edit_materia1').value = data.materia1;
                    document.getElementById('edit_materia2').value = data.materia2;
                    document.getElementById('edit_materia3').value = data.materia3;
                    document.getElementById('edit_materia4').value = data.materia4;
                    document.getElementById('edit_materia5').value = data.materia5;
                    
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