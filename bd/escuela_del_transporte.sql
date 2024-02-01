-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2024 a las 01:15:15
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
(2, 'Licencia', 2, 'Marzo', '2023', ''),
(3, 'Manejo', 0, 'Enero', '2023', ''),
(4, 'Camion', 0, 'Enero', '2025', 'Camion_65.jpg');

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
(1, '30715180', 'V-', 'Angel', 'Perez', '2003-01-23', 'M', '0212251131', '04241906240', '', '', 'angeldavid@gmail.com', '', 'Palo Verde', '2023-12-09'),
(2, '30716181', 'V-', 'David', 'Rosales', '2023-12-08', 'M', '', '04241926343', '02122322232', '', 'angeldavid957@gmail.com', '', 'Caracas', '2023-12-09');

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
(6, 2, 1, '0', '0'),
(7, 4, 2, '12', '12'),
(8, 3, 1, '0', '0'),
(9, 3, 2, '12', '12'),
(10, 2, 2, '12', '12'),
(11, 4, 1, '0', '0');

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
(3, 'Angel', '$2y$10$0B3LUV4pVS7CAzxV7o8fkOx8FF/zC/MQVWdwZpURCx4oXCIcyIAtm', 1),
(4, 'Angel3', '$2y$10$l0j9ceCzk.B.bMnX9gH0seCPIqcq71eiQx3Na30eDJRV7q18lMiD.', 2),
(9, 'Angel2', '$2y$10$U7Jua5eckJfuxYQfXhBB0ej3/arqVkYeuMMdFmIME2eLq8SP6UIDa', 2),
(10, 'Angel4', '$2y$10$mzifkfhFd0P6AqTmRaNV9.iBbjsJL4epHv9KKMoao2wgAN/q2QoiO', 1);

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
  ADD KEY `id_estudiante` (`id_estudiante`);

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
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `estudiantes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes_cursos`
--
ALTER TABLE `estudiantes_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes_cursos`
--
ALTER TABLE `estudiantes_cursos`
  ADD CONSTRAINT `estudiantes_cursos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`curso_id`),
  ADD CONSTRAINT `estudiantes_cursos_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`estudiantes_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
