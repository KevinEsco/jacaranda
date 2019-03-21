-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2019 a las 21:46:00
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` int(18) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `barrio` text NOT NULL,
  `localidad` text NOT NULL,
  `provincia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `telefono`, `direccion`, `barrio`, `localidad`, `provincia`) VALUES
(95, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'zasdasd', 'OlavarrÃ­a', 'Buenos Aires'),
(96, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asdasd', 'OlavarrÃ­a', 'Buenos Aires'),
(97, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asdasd', 'OlavarrÃ­a', 'Buenos Aires'),
(98, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(99, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadd', 'OlavarrÃ­a', 'Buenos Aires'),
(100, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'dsa', 'OlavarrÃ­a', 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `estado` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `total`, `creado`, `modificado`, `estado`) VALUES
(65, 95, 300.00, '2019-03-14 04:29:45', '2019-03-14 04:29:45', '1'),
(66, 96, 900.00, '2019-03-14 05:24:10', '2019-03-14 05:24:10', '1'),
(67, 97, 600.00, '2019-03-14 05:30:24', '2019-03-14 05:30:24', '1'),
(68, 98, 1198.00, '2019-03-14 05:34:18', '2019-03-14 05:34:18', '1'),
(69, 99, 1198.00, '2019-03-14 05:35:21', '2019-03-14 05:35:21', '1'),
(70, 100, 750.00, '2019-03-14 21:53:10', '2019-03-14 21:53:10', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoxpedido`
--

CREATE TABLE `productoxpedido` (
  `id_pedido` int(5) NOT NULL,
  `id_producto` varchar(20) NOT NULL,
  `talle` varchar(5) NOT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productoxpedido`
--

INSERT INTO `productoxpedido` (`id_pedido`, `id_producto`, `talle`, `cantidad`) VALUES
(63, 'USB02', 'XL', 1),
(64, 'USB02', 'XL', 1),
(65, 'USB02', 'XL', 1),
(66, 'USB02', 'XL', 1),
(67, 'USB02', 'XL', 2),
(68, '3DcAM01', 'L', 2),
(69, '3DcAM01', 'L', 2),
(70, 'VES231', 'XL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `S` int(3) NOT NULL,
  `M` int(3) NOT NULL,
  `L` int(3) NOT NULL,
  `XL` int(3) NOT NULL,
  `categoria` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `S`, `M`, `L`, `XL`, `categoria`) VALUES
(1, 'Buzo Ana', '3DcAM01', 'product-images/31.jpg', 599.00, 10, 5, 5, 0, 'abrigo'),
(2, 'Musculosa Ganesha', 'USB02', 'product-images/29.jpg', 300.00, 10, 10, 6, 7, 'remera'),
(3, 'Ruana de hilo', 'wristWear03', 'product-images/2.jpg', 500.00, 10, 10, 10, 9, 'abrigo'),
(4, 'Remera Hamsa', 'LPN45', 'product-images/33.jpg', 315.00, 10, 10, 10, 10, 'remera'),
(5, 'Vestido Lara', 'VES231', 'product-images/vestidoLara.jpg', 750.00, 10, 10, 10, 9, 'vestido'),
(6, 'Saco Marga', 'MAR24', 'product-images/sacoMarga.jpg', 909.00, 10, 10, 10, 10, 'saco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` int(18) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `barrio` text,
  `localidad` text,
  `id_provincia` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usuario`, `username`, `password`, `email`, `telefono`, `direccion`, `barrio`, `localidad`, `id_provincia`) VALUES
(17, 'KevinEsco', '$2y$10$Azy0hNdv1Kao4XLKvv6jpuovqbw0nBYSn6kYnAE..6VX6qMUvBerq', 'kily_24@live.com', NULL, 'Barrio CECO1 C593', 'asdasd', 'OlavarrÃ­a', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_cliente`);

--
-- Indices de la tabla `productoxpedido`
--
ALTER TABLE `productoxpedido`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`,`talle`);

--
-- Indices de la tabla `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
