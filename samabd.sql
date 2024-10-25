-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2024 a las 19:55:14
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
-- Base de datos: `samabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id_accesorios` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(100) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `activo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id_accesorios`, `id_producto`, `nombre`, `precio`, `Tipo`, `Descripcion`, `activo`) VALUES
(1, 3, 'Deck box - mago oscuro', 100, 'Deck-box', 'Este es el deck box del mago oscuro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL,
  `tipo` varchar(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `tipo`, `activo`) VALUES
(0, 'single', 1),
(1, 'single', 1),
(2, 'single', 1),
(3, 'Accesorio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `singles`
--

CREATE TABLE `singles` (
  `id_singles` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `arquetipo` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `singles`
--

INSERT INTO `singles` (`id_singles`, `id_producto`, `nombre`, `Descripcion`, `tipo`, `arquetipo`, `activo`, `precio`) VALUES
(0, 0, 'Doomking balerdoch', '	\r\nDurante la Standby Phase, si una carta boca arriba está en una Zona del Campo y esta carta está e', 'Zombie', 'Ningún arquetipo', 1, 9.12),
(1, 1, 'Sacred Fire King Garunix', 'Si uno o más de tus monstruos que originalmente eran de FUEGO son destruidos en batalla o por el efe', 'Bestia Alada', 'Fire king', 1, 0),
(2, 2, 'Ultimate Tyranno Conductor', 'No puede ser Invocado de Modo Normal/Colocado. Debe ser primero Invocado de Modo Especial (desde tu ', 'Dinosaurio', 'Ningún arquetipo', 1, 4.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `structure`
--

CREATE TABLE `structure` (
  `id_structure` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `activo` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `nombre_usuario`, `correo`, `contrasena`, `activo`) VALUES
(1, 'Mariano Gonzalez', 'Reivax', 'marianoxaviergonzalez@gmail.com', '$2y$10$XgCf0m6w6Ow3AKk7vswZSOngjqETMAi8V50T59P/e9OFdJlrjPzqK', 1),
(2, 'Agustin diaz', 'cheriefox', 'camapared21@gmail.com', '$2y$10$kbRLypfegUuzwILKxDvTxOrIrsD6pjn66bEJnqVmP4bSaUTelBPAm', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id_accesorios`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `singles`
--
ALTER TABLE `singles`
  ADD PRIMARY KEY (`id_singles`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id_structure`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id_accesorios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `singles`
--
ALTER TABLE `singles`
  MODIFY `id_singles` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `structure`
--
ALTER TABLE `structure`
  MODIFY `id_structure` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD CONSTRAINT `accesorios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `singles`
--
ALTER TABLE `singles`
  ADD CONSTRAINT `singles_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `structure`
--
ALTER TABLE `structure`
  ADD CONSTRAINT `structure_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
