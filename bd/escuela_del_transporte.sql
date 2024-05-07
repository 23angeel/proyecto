-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2024 a las 06:37:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela del transporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `curso_id` int(11) NOT NULL,
  `curso_nombre` varchar(100) NOT NULL,
  `curso_grado` int(10) NOT NULL,
  `curso_mes` varchar(30) NOT NULL,
  `curso_año` varchar(10) NOT NULL,
  `curso_foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`curso_id`, `curso_nombre`, `curso_grado`, `curso_mes`, `curso_año`, `curso_foto`) VALUES
(11, 'FACILITADORES EN TRANSPORTE TERRESTRE', 0, 'ABRIL', '2024', ''),
(12, 'TSP CARGA PESADA', 0, 'ABRIL', '2024', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `estudiantes_id` int(11) NOT NULL,
  `estudiantes_cedula` varchar(50) NOT NULL,
  `estudiantes_n` varchar(11) NOT NULL,
  `estudiantes_nombres` varchar(250) NOT NULL,
  `estudiantes_apellidos` varchar(250) NOT NULL,
  `estudiantes_naciemineto` varchar(50) NOT NULL,
  `estudiantes_sexo` varchar(10) NOT NULL,
  `estudiantes_habitacion` varchar(50) NOT NULL,
  `estudiantes_celular` varchar(50) NOT NULL,
  `estudiantes_oficia` varchar(50) NOT NULL,
  `estudiantes_otro` varchar(50) NOT NULL,
  `estudiantes_correo` varchar(150) NOT NULL,
  `estudiantes_correo2` varchar(150) NOT NULL,
  `estudiantes_direccion` varchar(250) NOT NULL,
  `estudiantes_inscripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`estudiantes_id`, `estudiantes_cedula`, `estudiantes_n`, `estudiantes_nombres`, `estudiantes_apellidos`, `estudiantes_naciemineto`, `estudiantes_sexo`, `estudiantes_habitacion`, `estudiantes_celular`, `estudiantes_oficia`, `estudiantes_otro`, `estudiantes_correo`, `estudiantes_correo2`, `estudiantes_direccion`, `estudiantes_inscripcion`) VALUES
(14, '19686101', 'V-', 'RUTH', 'CRESPO', '2002-06-19', 'F', '0414-1233225', '', '', '', 'rutcrespo@gmail.com', '', 'CARACAS', '2024-01-18'),
(15, '2309015', 'V-', 'RAMON', 'CRESPO', '1997-05-27', 'M', '0412-4845110', '0424-7654329', '', '', 'Ramoncrespo@gmail.com', '', 'LOS TEQUES', '2024-02-16'),
(17, '10327110', 'V-', 'DAVID', 'CHAVEZ', '1990-05-15', 'M', '', '0426-3387654', '', '', 'david@gmail.com', '', 'CARACAS', '2024-01-16'),
(18, '9230653', 'V-', 'DISBELTHER', 'RIVERA', '1989-06-15', 'M', '', '0414-2348790', '', '', 'diesbel@gmail.com', '', 'LOS TEQUES', '2024-01-21'),
(19, '12464009', 'V-', 'KEY', 'HERNANDEZ', '1996-02-22', 'F', '0412-4657623', '0424-1926341', '', '', 'riverakey@gmail.com', '', 'CARACAS', '2023-12-15'),
(20, '759002', 'V-', 'JOSE NAPOLEON', 'RINCONES ALCAZA', '1983-06-23', 'M', '-Seleccione-', '0412-1812714', '', '', 'napoleon@gmail.com', '', 'CARACAS', '2023-12-09'),
(21, '14710.337', 'V-', 'CARLOS LUIS', 'FUENTES', '1996-06-15', 'M', '0412-324568', '', '', '', 'carlosfuentes@gmail.com', '', 'CARACAS', '2024-01-19'),
(22, '3548677', 'V-', 'TERESA SOCORRO', 'CAMPOS MONTESINOS', '1970-06-16', 'F', '-Seleccione-', '0414-1675432', '', '', 'teresacampos@gmail.com', '', 'LOS TEQUES', '2023-11-16'),
(23, '16042091', 'V-', 'JENNIFER NATALIT', 'ALFONZO ALVAREZ', '1990-02-24', 'F', '-Seleccione-', '0414-342786', '', '', 'jenniferalfonzo@gmail.com', '', 'CARACAS', '2024-02-03'),
(24, '11401852', 'V-', 'ALEXANDER ENRIQUE', 'GARCIA QUINTERO', '2024-01-10', 'M', '0414-2453421', '', '', '', 'alexandergarcia@gmail.com', '', 'CARACAS', '2024-01-12'),
(25, '13795019', 'V-', 'JUAN CARLOS', 'RINCONES MAROTTA', '1995-02-16', 'M', '-Seleccione-', '0424-1807230', '', '', 'carlosjuan@gmail.com', '', 'LOS TEQUES', '2024-01-19'),
(26, '13938837', 'V-', 'VIRGINIA', 'ROA', '1992-10-14', 'F', '0414-5436789', '', '', '', 'virginiaroa@gmail.com', '', 'CARACAS', '2024-01-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_cursos`
--

CREATE TABLE `estudiantes_cursos` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `evaluacion_teorica` varchar(50) NOT NULL,
  `evaluacion_practica` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes_cursos`
--

INSERT INTO `estudiantes_cursos` (`id`, `id_curso`, `id_estudiante`, `evaluacion_teorica`, `evaluacion_practica`) VALUES
(69, 11, 17, '15', '18'),
(70, 11, 24, '20', '19'),
(71, 11, 19, '20', '15'),
(72, 11, 25, '20', '20'),
(73, 11, 26, '0', '0'),
(74, 11, 21, '20', '18'),
(75, 11, 23, '20', '18'),
(76, 11, 14, '15', '18'),
(77, 11, 15, '10', '18'),
(78, 11, 22, '20', '20'),
(79, 11, 20, '20', '20'),
(80, 11, 18, '20', '18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nombre`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_usuario` varchar(50) NOT NULL,
  `usuario_contrasena` varchar(100) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_usuario`, `usuario_contrasena`, `rol_id`) VALUES
(3, 'Angel', '$2y$10$dfhg3yu82X.3oe0bvlybkeRn2RtwNkrKcVALHZOnliJor/lCFju/m', 1),
(12, 'Juan', '$2y$10$vEyHAG.363OB20Zr4fwZt.JXYHeXxqwCLf8J7w6sHdpRShGgPm7Py', 1),
(13, 'Saraid', '$2y$10$yi0Av11BW8AD6UP48k0ceO4UyumC.JptfhMSc07Zr9yR5jHk6ShoG', 1),
(14, 'Angel3', '$2y$10$sojTSrbcjgXLl41M/kucqeALH2yJIqQHd5qNKNeh1R2bvrbpWCgae', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`curso_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`estudiantes_id`);

--
-- Indices de la tabla `estudiantes_cursos`
--
ALTER TABLE `estudiantes_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_curso_2` (`id_curso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `usuario_rol` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `estudiantes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `estudiantes_cursos`
--
ALTER TABLE `estudiantes_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes_cursos`
--
ALTER TABLE `estudiantes_cursos`
  ADD CONSTRAINT `estudiantes_cursos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`curso_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_cursos_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`estudiantes_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
