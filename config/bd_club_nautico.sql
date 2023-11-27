

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Base de datos: `bd_club_nautico`
--
DROP SCHEMA IF EXISTS `bd_club_nautico` ;

-- -----------------------------------------------------
-- Schema bd_club_nautico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_club_nautico` ;
USE `bd_club_nautico` ;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Barcos`
--

CREATE TABLE `Barcos` (
  `id_barco` varchar(45) NOT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `nombre_barco` varchar(45) DEFAULT NULL,
  `numero_amarre` int(11) DEFAULT NULL,
  `cuota` varchar(45) DEFAULT NULL,
  `id_socio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Patrones`
--

CREATE TABLE `Patrones` (
  `id_patron` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Salidas`
--

CREATE TABLE `Salidas` (
  `id_salida` varchar(45) NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `id_barco` varchar(45) NOT NULL,
  `id_patron` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Socios`
--

CREATE TABLE `Socios` (
  `id_socio` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Socios_Usuarios`
--

CREATE TABLE `Socios_Usuarios` (
  `id_socio` varchar(45) NOT NULL,
  `id_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuario` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------

--
-- Estructura de tabla para la tabla `Agendar`
--

CREATE TABLE `Agendar` (
  `id_agenda` varchar(45) NOT NULL,
  `fecha_agenda` date DEFAULT NULL,
  `hora_agenda` time DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `id_salida` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Barcos`
--
ALTER TABLE `Barcos`
  ADD PRIMARY KEY (`id_barco`),
  ADD KEY `fk_Barcos_Socios_idx` (`id_socio`);

--
-- Indices de la tabla `Patrones`
--
ALTER TABLE `Patrones`
  ADD PRIMARY KEY (`id_patron`);

--
-- Indices de la tabla `Salidas`
--
ALTER TABLE `Salidas`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `fk_Salidas_Barcos1_idx` (`id_barco`),
  ADD KEY `fk_Salidas_Patrones1_idx` (`id_patron`);

--
-- Indices de la tabla `Socios`
--
ALTER TABLE `Socios`
  ADD PRIMARY KEY (`id_socio`);

--
-- Indices de la tabla `Socios_Usuarios`
--
ALTER TABLE `Socios_Usuarios`
  ADD PRIMARY KEY (`id_socio`,`id_usuario`),
  ADD KEY `fk_Socios_has_Usuarios_Usuarios1_idx` (`id_usuario`),
  ADD KEY `fk_Socios_has_Usuarios_Socios1_idx` (`id_socio`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `Agendar`
--
ALTER TABLE `Agendar`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `fk_Agendar_Salidas_idx` (`id_salida`);

--
-- Restricciones para tablas volcadas
--
--
-- Filtros para la tabla `Barcos`
--
ALTER TABLE `Barcos`
  ADD CONSTRAINT `fk_Barcos_Socios` FOREIGN KEY (`id_socio`) REFERENCES `Socios` (`id_socio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Salidas`
--
ALTER TABLE `Salidas`
  ADD CONSTRAINT `fk_Salidas_Barcos1` FOREIGN KEY (`id_barco`) REFERENCES `Barcos` (`id_barco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Salidas_Patrones1` FOREIGN KEY (`id_patron`) REFERENCES `Patrones` (`id_patron`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Socios_Usuarios`
--
ALTER TABLE `Socios_Usuarios`
  ADD CONSTRAINT `fk_Socios_has_Usuarios_Socios1` FOREIGN KEY (`id_socio`) REFERENCES `Socios` (`id_socio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Socios_has_Usuarios_Usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `Usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

--
-- Filtros para la tabla `Agendar`
--
ALTER TABLE `Agendar`
  ADD CONSTRAINT `fk_Agendar_Salidas` FOREIGN KEY (`id_salida`) REFERENCES `Salidas` (`id_salida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

