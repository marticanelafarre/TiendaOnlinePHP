-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 17-01-2021 a les 13:21:45
-- Versió del servidor: 10.4.16-MariaDB
-- Versió de PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcament de dades per a la taula `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `telefono`, `direccion`, `pwd`) VALUES
(1, 'marti', 'marti@canela.com', '123123123', 'c portella', '123123'),
(2, 'admin', 'admin@tienda.com', '999999999', 'no disponible', 'admin');

-- --------------------------------------------------------

--
-- Estructura de la taula `mis_productos`
--

CREATE TABLE `mis_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcament de dades per a la taula `mis_productos`
--

INSERT INTO `mis_productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES
(21, 'Festival Mil·leni', 'El Festival Mil·lenni es un ciclo de conciertos que cada año lleva un programa de lo más variado.', 25.00),
(22, 'Madrid Brillante', 'Nace Madrid Brillante, un nuevo festival que reúne diversos artistas en recintos especiales de la capital.', 12.00),
(23, 'Mad Cool Festival', 'Mad Cool Festival regresa en 2021 para celebrar el 5º aniversario a lo grande y com muchas ganas.', 179.00),
(24, 'Rock Fest BCN', 'El Rock Fest BCN regresará al parque de Can Zam de Santa Coloma de Gramanet.', 100.00),
(25, 'Bravo Madrid', '¡Bravo Madrid! es un nuevo ciclo de conciertos de otoño-invierno por teatros y espacios de la capital. ', 45.00),
(26, 'Rockin Race Jamboree', 'El Rockin Race Jamboree es un festival que cada mes de febrero dedica varios días a homenajear.', 21.00),
(27, 'Heavy Jaia', 'Zenobia y Grendel son las bandas confirmadas de una edición atípica, con aforo limitado y con mascarilla.', 35.00),
(28, 'Snowdaze', 'Si tienes debilidad por la música electrónica y el ski & snow, Snowdaze te está preparando un dia irrepetible.', 115.00),
(29, 'Iberian Warriors Metal Fest', 'Afortunadamente para todos los seguidores del death, doom, black, pagan ha llegado el dia.', 89.00),
(30, 'Noches Mediterráneas', 'La música en directo vuelve al Puerto de Alicante con la segunda edición de las Noches Mediterráneas.', 16.00),
(31, 'NEU! Festival', 'A pesar de la situación actual, música y cultura se unen una vez más en el NEU! Festival', 67.00),
(32, 'Primavera Sound', 'Ya conocemos gran parte del espectacular cartel de esta nueva entrega.', 56.00);

-- --------------------------------------------------------

--
-- Estructura de la taula `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `precioTotal` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `mis_productos`
--
ALTER TABLE `mis_productos`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la taula `mis_productos`
--
ALTER TABLE `mis_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la taula `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
