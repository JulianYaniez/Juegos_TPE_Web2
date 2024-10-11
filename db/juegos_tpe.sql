-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2024 a las 00:15:49
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
-- Base de datos: `juegos_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidoras`
--

CREATE TABLE `distribuidoras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `año_fundacion` year(4) NOT NULL,
  `pais_sede` varchar(45) NOT NULL,
  `sitio_web` varchar(45) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `distribuidoras`
--

INSERT INTO `distribuidoras` (`id`, `nombre`, `año_fundacion`, `pais_sede`, `sitio_web`, `imagen`) VALUES
(1, 'Ubisoft', '1986', 'Francia', 'ubisoft.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQX2b_QUkkA6fKJOY9tLJUKvGSKJsaIt2wl2Q&amp;s'),
(2, 'Electronic Arts', '1982', 'Estados Unidos', 'ea.com', 'https://upload.wikimedia.org/wikipedia/commons/0/0d/Electronic-Arts-Logo.svg'),
(3, 'Rockstar Games', '1998', 'Estados Unidos', 'rockstargames.com', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Rockstar_Games_Logo.svg/2226px-Rockstar_Games_Logo.svg.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `id_distribuidora` int(11) NOT NULL,
  `precio` double NOT NULL,
  `fecha_salida` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `genero`, `id_distribuidora`, `precio`, `fecha_salida`) VALUES
(1, 'Far Cry 3', 'Accion', 1, 15.99, '2012'),
(2, 'Assasin\'s Creed Unity', 'Aventura', 1, 23.99, '2014'),
(3, 'Grand Theft Auto V', 'Accion', 3, 39.98, '2013'),
(4, 'Dragon Age: Inquisition', 'RPG', 2, 39.99, '2014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(45) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `contraseña`) VALUES
('webadmin', '$2y$10$RSJcNKrgSmkv9PaKIj6s3.stsXfXVtKODOQS4FPtRgjddlrabsCpS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distribuidoras`
--
ALTER TABLE `distribuidoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distribuidora` (`id_distribuidora`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distribuidoras`
--
ALTER TABLE `distribuidoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`id_distribuidora`) REFERENCES `distribuidoras` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
