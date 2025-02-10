-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2025 a las 18:36:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `negocios_digitales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `materia1` text DEFAULT NULL,
  `materia2` text DEFAULT NULL,
  `materia3` text DEFAULT NULL,
  `materia4` text DEFAULT NULL,
  `materia5` text DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombres`, `materia1`, `materia2`, `materia3`, `materia4`, `materia5`, `imagen`) VALUES
(9, 'Carlos Martínez', 'Ecosistemas Digitales', '', '', '', '', 'uploads/2.png'),
(11, 'Marcela Gallegos', 'Programación', 'Realidad Aumentada', 'Asistentes Virtuales y APP', 'Diseño y Creación de Páginas Web', 'Programación Orientada a Objetos', 'uploads/1.png'),
(13, 'Paola Torres', 'Finanzas para Negocios Digitales', '', '', '', '', 'uploads/1.png'),
(14, 'Tania Chicaiza', 'Marketing Digital', 'Publicidad Digital', '', '', '', 'uploads/1.png'),
(15, 'Walter Gaibor', 'Negocios Electrónicos', '', '', '', '', 'uploads/2.png'),
(16, 'Julio Proaño', 'Inteligencia Artificial para la Gestión Empresarial', '', '', '', '', 'uploads/2.png'),
(17, 'Patricia Villagómez', 'Transformación Digital', '', '', '', '', 'uploads/1.png'),
(18, 'Rubén Sánchez', 'Auditoría de Sistemas y Negocios Electrónicos', 'Prácticas de Servicio Comunitario', 'Fundamentos de Bases de Datos', '', '', 'uploads/2.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombres`, `descripcion`, `imagen`, `fecha`, `estado`) VALUES
(7, 'Explorando Nuevos Modelos de Negocios con Realidad Aumentada', 'Descubre cómo la Realidad Aumentada está transformando los negocios y las oportunidades de emprendimiento en la era digital. 💡  📲 La carrera de Negocios Digitales te invita a conocer cómo esta tecnología puede potenciar ideas innovadoras y llevarlas al siguiente nivel. 🙌', 'uploads/EV6.jpg', '2024-10-17', 'Pasado'),
(8, 'Encuentro Innovación en Seguridad de la Información y Protección de Datos', '¡No te pierdas el Encuentro de Innovación en Seguridad de la Información y Protección de Datos! ✨🔐  Contaremos con la participación de dos grandes exponentes:  Diana Velasco - Directora Nacional de Registros Públicos.  Bryan Mancero - Docente de la carrera de Negocios Digitales.', 'uploads/EV5.jpg', '2024-10-03', 'Pasado'),
(9, 'Exposición de Proyectos Digitales', 'En esta exposición, nuestros estudiantes presentarán sus proyectos innovadores, que abarcan desde la Programación Orientada a Objetos, Ecosistemas Digitales y Proyectos de Realidad Aumentada. Será una excelente oportunidad para descubrir las ideas creativas y los avances tecnológicos desarrollados por nuestros futuros profesionales.', 'uploads/EV4.jpg', '2024-07-22', 'Pasado'),
(10, 'Emprendimientos Digitales', 'La carrera de #NegociosDigitales de la UPS sede #Quito invita a la comunidad universitaria a la charla “Emprendimientos digitales”. Conoce sobre cómo iniciar un negocio en línea a través de modelos de emprendimientos exitosos.', 'uploads/EV3.jpeg', '2024-01-17', 'Pasado'),
(11, 'Emprendimiento Digital y Soporte para Ecosistemas de Negocios Digitales', '¡Te invitamos a una charla imperdible sobre emprendimientos digitales! 💡 Descubre claves para impulsar ecosistemas de negocios digitales. Únete a la conversación que transformará tu perspectiva y fortalecerá tu visión emprendedora.', 'uploads/EV2.jpeg', '2023-11-10', 'Pasado'),
(12, 'Transformación Digital en la Banca y Blockchain', '¡Te invitamos a una charla imperdible sobre la tecnología blockchain en la banca! 💡 Descubre claves para la transformación digital. Únete a la conversación que transformará tu perspectiva y fortalecerá tu visión emprendedora.', 'uploads/EV1.jpg', '2023-04-18', 'Pasado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `imagen`) VALUES
(6, 'uploads/ND.jpg'),
(7, 'uploads/ND2.jpg'),
(8, 'uploads/ND3.jpg'),
(9, 'uploads/ND4.jpg'),
(10, 'uploads/ND5.jpg'),
(11, 'uploads/ND6.jpeg'),
(12, 'uploads/ND7.jpeg'),
(13, 'uploads/ND8.jpg'),
(14, 'uploads/ND9.jpg'),
(15, 'uploads/ND10.jpg'),
(16, 'uploads/ND11.jpg'),
(17, 'uploads/ND12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, '22', '22', 'uploads/Legera Max 1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(20) UNSIGNED NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(500) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `clave`, `nombres`, `apellidos`) VALUES
(2, '123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', '123', '123'),
(3, 'admin@nd.ups.ec', '8cf216209f83b82ab3235e5e258364999e68f2e54a236908b8fe7ac90021130d7e359921ec6559d7512395dd4d0da02a80103414d0664e88cbdee5b5bb9e5da7', 'Cesar', 'Trujillo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
