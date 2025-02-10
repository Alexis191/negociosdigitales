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

    <main class="materias">
        <h1>Materias por Nivel Negocios Digitales</h1>
        <?php
        $materias = [
            "Primer Nivel" => [
                "Antropología Filosófico-Teológica" => "Es el estudio del ser humano desde una perspectiva filosófica y teológica, abordando su origen, naturaleza, propósito y relación con lo trascendental y lo divino.",
                "Fundamentos de Administración" => "Son los principios básicos de la gestión empresarial, incluyendo planificación, organización, dirección y control para optimizar recursos y alcanzar objetivos organizacionales.",
                "Fundamentos Contables" => "Son las bases teóricas y prácticas de la contabilidad, enfocadas en el registro, clasificación e interpretación de transacciones financieras para la toma de decisiones.",
                "Comunicación Oral y Escrita" => "Es el desarrollo de habilidades para expresarse de manera efectiva tanto de forma verbal como escrita, considerando estructura, claridad, coherencia y adaptación al público objetivo.",
                "Matemáticas" => "Es la ciencia que estudia números, estructuras, patrones y relaciones, proporcionando herramientas fundamentales para la resolución de problemas en diversas áreas del conocimiento."
            ],
            "Segundo Nivel" => [
                "Matemáticas II" => "Continuación del estudio matemático con enfoque en funciones avanzadas, cálculo diferencial e integral, álgebra lineal y sus aplicaciones en diversas disciplinas.",
                "Fundamentos de Costos" => "Principios básicos para la identificación, análisis y control de costos en una organización, incluyendo costos fijos, variables, directos e indirectos para la toma de decisiones financieras.",
                "Ética" => "Estudio de los principios y valores que rigen el comportamiento humano, abordando dilemas morales, toma de decisiones responsables y su aplicación en la vida personal y profesional.",
                "Programación" => "Introducción al desarrollo de software mediante lenguajes de programación, abordando lógica, algoritmos, estructuras de datos y resolución de problemas computacionales.",
                "Ecosistemas Digitales" => "Análisis del entorno digital, incluyendo plataformas, redes sociales, comercio electrónico y nuevas tecnologías que influyen en la comunicación, negocios y sociedad.",
                "Metodología de la Investigación" => "Estudio de los métodos y técnicas para la recolección, análisis e interpretación de datos con el fin de generar conocimiento científico y soluciones a problemáticas específicas."
            ],
            "Tercer Nivel" => [
                "Legislación Informática y Electrónica" => "Estudio del marco legal que regula el uso de la tecnología, la protección de datos, la ciberseguridad, la propiedad intelectual y los delitos informáticos en el ámbito digital.",
                "Fundamentos de Base de Datos" => "Principios esenciales para el diseño, gestión y administración de bases de datos, incluyendo modelos relacionales, normalización, consultas SQL y almacenamiento eficiente de la información.",
                "Matemáticas Financiera" => " Es la disciplina que aplica principios matemáticos para evaluar y tomar decisiones en el ámbito financiero. Incluye conceptos como el valor del dinero en el tiempo, tasas de interés, anualidades, amortizaciones e inversiones.",
                "Fundamentos de Marketing" => "Son los principios básicos del marketing, que incluyen el estudio del mercado, el comportamiento del consumidor, el desarrollo de estrategias de producto, precio, distribución y promoción para satisfacer las necesidades de los clientes y generar valor para la empresa.",
                "Vida y Trascendencia" => "Reflexión filosófica y espiritual sobre el sentido de la vida, la existencia humana y su proyección más allá de lo material, abordando temas como la ética, la espiritualidad y el propósito personal."
            ],
            "Cuarto Nivel" => [
                "Negocios Electrónicos" => "Fundamentos y estrategias para el comercio electrónico, incluyendo modelos de negocio, plataformas digitales, marketing en línea y gestión de transacciones electrónicas.",
                "Pensamiento Social de la Iglesia" => "Doctrina social de la Iglesia y su impacto en la sociedad, abordando temas como justicia social, dignidad humana, solidaridad y el bien común desde una perspectiva cristiana.",
                "Estadística" => "Análisis y aplicación de métodos estadísticos para la recopilación, organización, interpretación y presentación de datos en la toma de decisiones.",
                "Transformación Digital" => "Proceso de digitalización en las empresas, enfocándose en la integración de tecnologías emergentes para mejorar la eficiencia, la competitividad y la innovación organizacional.",
                "Programación Orientada a Objetos" => "Principios y prácticas de la POO, incluyendo conceptos como clases, objetos, herencia, polimorfismo y encapsulamiento para el desarrollo de software modular y reutilizable.",
            ],
            "Quinto Nivel" => [
                "Finanzas para Negocios Digitales" => "Estudia la gestión financiera en entornos digitales, abordando modelos de ingresos como suscripciones, publicidad y comercio electrónico. Incluye evaluación de inversiones tecnológicas, análisis de costos digitales y gestión de riesgos financieros en plataformas digitales.",
                "Pensamiento Crítico" => "Desarrollo de habilidades analíticas y argumentativas para evaluar información de manera objetiva. Se enfoca en la identificación de falacias, razonamiento lógico, resolución de problemas y toma de decisiones fundamentadas.",
                "Prácticas de Servicio Comunitario" => "Aplicación de conocimientos académicos en proyectos de impacto social. Los estudiantes trabajan en comunidades o con organizaciones para resolver problemáticas mediante soluciones tecnológicas o empresariales.",
                "Marketing Digital" => " Explora estrategias de mercadeo aplicadas a medios digitales, incluyendo SEO, SEM, redes sociales, email marketing y analítica digital. Se centra en la captación y fidelización de clientes en plataformas online. ",
                "Realidad Aumentada" => " Introducción a la tecnología de realidad aumentada y su implementación en distintos sectores, como el comercio, la educación y el entretenimiento. Incluye el uso de software especializado y diseño de experiencias inmersivas.",
            ],
            "Sexto Nivel" => [
                "Publicidad Digital" => "Análisis de estrategias y herramientas para la promoción de productos y servicios en medios digitales. Se abordan plataformas como Google Ads, Facebook Ads y estrategias de remarketing para maximizar el alcance y la conversión.",
                "Diseño y Creación de Páginas Web" => " Principios fundamentales del desarrollo web, desde la estructura de HTML y CSS hasta frameworks modernos como Bootstrap. También incluye nociones de UX/UI para mejorar la experiencia del usuario.",
                "Inteligencia Artificial para la Gestión Empresarial" => "Aplicaciones de IA en el ámbito empresarial, como chatbots, análisis predictivo, automatización de procesos y recomendación de productos basada en datos. Se estudian herramientas como machine learning y procesamiento de datos.",
                "Auditoría de Sistemas y Negocios Electrónicos" => "Evaluación de seguridad y eficiencia en plataformas digitales, identificando vulnerabilidades en sistemas informáticos. Incluye normativas de ciberseguridad, protección de datos y auditoría de e-commerce.",
                "Asistentes Virtuales y APP" => " Diseño, desarrollo e integración de asistentes virtuales como chatbots y aplicaciones móviles para mejorar la interacción con los usuarios en plataformas digitales y automatizar tareas empresariales."
            ],
            "Séptimo Nivel" => [
                "Proyectos" => "Planificación, desarrollo y ejecución de proyectos digitales empresariales. Se enfoca en la gestión de recursos, metodologías ágiles (Scrum, Kanban) y evaluación de impacto.",
                "Prácticas Pre Profesionales" => " Experiencia laboral en empresas digitales o startups, donde los estudiantes aplican sus conocimientos en entornos reales, enfrentando desafíos del mundo laboral.",
                "Metodología para Emprendimientos Digitales" => "Guía para la creación y gestión de startups digitales, abarcando modelos de negocio innovadores, análisis de mercado, validación de ideas y financiamiento.",
                "Gestión de la Calidad de Software, plataformas y aplicaciones" => "Control y aseguramiento de calidad en desarrollo de software, enfocándose en pruebas automatizadas, control de versiones y estándares de calidad en UX/UI.",
                "Blockchain y Criptomonedas" => "Exploración de la tecnología blockchain y su impacto en la economía digital. Se estudian criptomonedas como Bitcoin y Ethereum, contratos inteligentes y aplicaciones descentralizadas (DApps)."
            ],
            "Octavo Nivel" => [
                "Integración Curricular" => "Síntesis y aplicación de los conocimientos adquiridos a lo largo de la carrera. Los estudiantes desarrollan un proyecto final que demuestre sus habilidades en negocios digitales.",
                "Herramientas de Gestión Empresarial" => " Uso de software y técnicas para la administración empresarial, incluyendo ERPs, CRMs y plataformas de análisis de datos para mejorar la toma de decisiones.",
                "Ingeniería de Requerimientos, Usabilidad y Experiencia de Usuario" => " Metodologías para el diseño centrado en el usuario en aplicaciones digitales. Se estudian herramientas de prototipado, pruebas de usabilidad y principios de UX/UI.",
                "Procesos para Negocios Digitales" => "Optimización y automatización de procesos empresariales en entornos digitales. Incluye metodologías Lean, BPM (Business Process Management) y transformación digital para mejorar la eficiencia operativa."
            ]
        ];
        
        foreach ($materias as $nivel => $listaMaterias) {
            echo "<div class='nivel' onclick=\"toggleMaterias('$nivel')\">
                    <span>$nivel</span>
                    <i id='icon-$nivel' class='fas fa-chevron-down'></i>
                  </div>";
            echo "<ul id='$nivel' class='materias-lista'>";
            foreach ($listaMaterias as $materia => $descripcion) {
                echo "<li><strong>$materia:</strong> <p class='materia-descripcion'>$descripcion</p></li>";
            }
            echo "</ul>";
        }
        ?>
    </main>
    
    <script>
        function toggleMaterias(nivel) {
            let lista = document.getElementById(nivel);
            let icon = document.getElementById('icon-' + nivel);
            if (lista.style.display === "none" || lista.style.display === "") {
                lista.style.display = "block";
                icon.style.transform = "rotate(180deg)";
            } else {
                lista.style.display = "none";
                icon.style.transform = "rotate(0deg)";
            }
        }
    </script>

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