-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 20:52:44
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
  `activo` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id_accesorios`, `id_producto`, `nombre`, `precio`, `Tipo`, `Descripcion`, `activo`) VALUES
(1, 3, 'Deck box - mago oscuro', 100, 'Deck-box', 'Este es el deck box del mago oscuro', 1),
(2, 7, 'Folios - celestes', 599, 'Folios', 'Folios celestes para equipar y proteger tus cartas', 1),
(3, 8, 'Playmat', 100, 'Playmat', 'Yugioh TCG CCG Mazo Juego Alfombra de Juego Personalizada Doomking Balerdroch Alfombra de Juego', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Accesorio', 1),
(4, 'Structure', 1),
(5, 'Structure', 1),
(6, 'Structure', 1),
(7, 'Accesorio', 1),
(8, 'Accesorio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `singles`
--

CREATE TABLE `singles` (
  `id_singles` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `arquetipo` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `singles`
--

INSERT INTO `singles` (`id_singles`, `id_producto`, `nombre`, `Descripcion`, `tipo`, `arquetipo`, `activo`, `precio`) VALUES
(0, 0, 'Doomking balerdoch', 'Durante la Standby Phase, si una carta boca arriba está en una Zona del Campo y esta carta está en tu Cementerio: puedes Invocar esta carta de Modo Especial en Posición de Defensa. Sólo puedes usar este efecto de \"Balardroch Rey de las Fatalidades\" una vez por turno. Una vez por Cadena, cuando un monstruo Zombi, excepto \"Balardroch Rey de las Fatalidades\" active su efecto (excepto durante el Damage Step) (Efecto Rápido): puedes aplicar 1 de estos efectos (pero no puedes aplicar ese mismo efecto de \"Balardroch Rey de las Fatalidades\" otra vez este turno).\r\n●Niega ese efecto.\r\n●Destierra 1 monstruo en el Campo o Cementerio.', 'Zombie', 'Ningún arquetipo', 1, 9.12),
(1, 1, 'Sacred Fire King Garunix', 'Si uno o más de tus monstruos que originalmente eran de FUEGO son destruidos en batalla o por el efecto de una carta: puedes Invocar esta carta de Modo Especial desde tu Cementerio (si estaba allí cuando el monstruo fue destruido) o mano (aun si no lo estaba). Si esta carta es Invocada de Modo Normal o Especial: puedes destruir 1 monstruo Bestia, Guerrero-Bestia o Bestia Alada de FUEGO en tu mano, Deck o Campo boca arriba, excepto \"Sagrado Rey de Fuego Garunix\" y, si lo haces, esta carta gana ATK igual a la mitad del ATK que tenía allí el monstruo destruido, hasta el final de este turno. Sólo puedes usar cada efecto de \"Sagrado Rey de Fuego Garunix\" una vez por turno.\r\n\r\n', 'Bestia Alada', 'Fire king', 1, 0),
(2, 2, 'Ultimate Tyranno Conductor', 'No puede ser Invocado de Modo Normal/Colocado. Debe ser primero Invocado de Modo Especial (desde tu mano) desterrando 2 monstruos Dinosaurio en tu Cementerio. Una vez por turno, durante la Main Phase (Efecto Rápido): puedes destruir 1 monstruo en tu mano o Campo y, si lo haces, cambia todos los monstruos boca arriba que controle tu adversario a Posición de Defensa boca abajo. Esta carta puede atacar a todos los monstruos que controle tu adversario, una vez a cada uno. Al comienzo del Damage Step, si esta carta ataca a un monstruo en Posición de Defensa: puedes infligir 1000 puntos de daño a tu adversario y, si lo haces, manda al Cementerio ese monstruo en Posición de Defensa.\r\n\r\n', 'Dinosaurio', 'Ningún arquetipo', 1, 4.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `structure`
--

CREATE TABLE `structure` (
  `id_structure` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `Precio` int(10) NOT NULL,
  `Descripcion` text NOT NULL,
  `activo` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `structure`
--

INSERT INTO `structure` (`id_structure`, `id_producto`, `nombre`, `Precio`, `Descripcion`, `activo`) VALUES
(1, 4, ' Dinosmasher\'s Fury Structure Deck', 20, 'Para aquellos de vosotros que preferís la naturaleza a las maquinaciones humanas, ¡la Baraja de Estructura Furia de Dinodespedazador trae la experiencia prehistórica definitiva al mundo de los Duelos! Es la supervivencia del más fuerte, y solo las cartas más poderosas de tu Deck lo conseguirán. El resto será comida para el súper depredador, Ultimate Tyranno Conductor, ¡un monstruo de 3.500ATK que puede enviar al terror encogidos de miedo a todos los monstruos enemigos antes de devorarlos a todos ellos en una sola Battle Phase!\r\n\r\nEste Deck es experto en Invocaciones de múltiples Dinosaurios del mismo Nivel al mismo tiempo, y la mayoría de esos monstruos son de Nivel 4. ¡Eso hace a este Deck el complemento perfecto para las Invocaciones Xyz! Tanto Saga del Duelista como Crisis Máxima tienen grandes Monstruos Xyz de Rango 4 que casan perfectamente con esta estrategia.', 1),
(2, 5, 'Structure Deck: Zombie Horde', 1000, 'Baraja de Estructura Horda de Zombis es una baraja de estructura en el Yu-Gi-Oh! Juego de Cartas Coleccionables (JCC). Es el 43° baraja de la serie Baraja de Estructura, después de Baraja de Estructura Enlace Podercodificador. Este Deck es el equivalente de Structure Deck R: Undead World en el OCG.', 1),
(3, 6, 'Fire king', 2, '¡Derrite la nieve y el hielo este diciembre con Baraja de Estructura: Reyes de Fuego!\r\n¡ESTO ESTÁ QUE ARDE! ¡Derrite la nieve y el hielo este diciembre con Baraja de Estructura: Reyes de Fuego! ¡Intensifica la potencia de fuego de tu Deck con nuevas Cartas de Monstruos, Mágicas y Trampa capaces de liberar el auténtico poder destructor de Avatar del Alto Rey de Fuego Garunix! ¡Aquí te adelantamos parte de lo que te espera!', 1);

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_accesorios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `singles`
--
ALTER TABLE `singles`
  MODIFY `id_singles` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `structure`
--
ALTER TABLE `structure`
  MODIFY `id_structure` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
