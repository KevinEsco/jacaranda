-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2019 a las 22:08:59
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

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
(1, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(2, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(3, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(4, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(5, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(6, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(7, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(8, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(9, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(10, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(11, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(12, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(13, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(14, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(15, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(16, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(17, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(18, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(19, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(20, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(21, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(22, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(23, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(24, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asd', 'OlavarrÃ­a', 'Buenos Aires'),
(25, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Aires'),
(26, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Aires'),
(27, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Aires'),
(28, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Aires'),
(29, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Airesasd'),
(30, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Airesasd'),
(31, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Airesasd'),
(32, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Airesasd'),
(33, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'sadsdaasdsad', 'OlavarrÃ­a', 'Buenos Airesasd'),
(34, 'kevinescobedo248@gmail.com', 2147483647, 'Barrio CECO1 C593', 'sadsda', 'OlavarrÃ­a', 'Buenos Aires'),
(35, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'asdsad', 'OlavarrÃ­a', 'Buenos Aires'),
(36, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'afdas', 'OlavarrÃ­a', 'Buenos Aires'),
(37, 'kily_24@live.com', 2147483647, 'Barrio CECO1 C593', 'ftftd', 'OlavarrÃ­a', 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `creado` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  `estado` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `total`, `creado`, `modificado`, `estado`) VALUES
(4, 21, 1198.00, '2018-12-20 06:10:22', '2018-12-20 06:10:22', '1'),
(5, 22, 1198.00, '2018-12-20 06:10:26', '2018-12-20 06:10:26', '1'),
(6, 23, 1198.00, '2018-12-20 06:10:53', '2018-12-20 06:10:53', '1'),
(7, 24, 1198.00, '2018-12-20 06:12:44', '2018-12-20 06:12:44', '1'),
(8, 25, 300.00, '2018-12-20 21:58:15', '2018-12-20 21:58:15', '1'),
(9, 26, 300.00, '2018-12-20 21:59:08', '2018-12-20 21:59:08', '1'),
(10, 27, 300.00, '2018-12-20 22:00:00', '2018-12-20 22:00:00', '1'),
(11, 28, 300.00, '2018-12-20 22:00:04', '2018-12-20 22:00:04', '1'),
(12, 29, 300.00, '2018-12-20 22:00:20', '2018-12-20 22:00:20', '1'),
(13, 30, 300.00, '2018-12-20 22:00:56', '2018-12-20 22:00:56', '1'),
(14, 31, 300.00, '2018-12-20 22:02:28', '2018-12-20 22:02:28', '1'),
(15, 32, 300.00, '2018-12-20 22:02:31', '2018-12-20 22:02:31', '1'),
(16, 33, 300.00, '2018-12-20 22:02:40', '2018-12-20 22:02:40', '1'),
(17, 34, 300.00, '2018-12-20 22:09:29', '2018-12-20 22:09:29', '1'),
(18, 35, 300.00, '2018-12-20 22:11:37', '2018-12-20 22:11:37', '1'),
(19, 36, 300.00, '2018-12-20 22:40:56', '2018-12-20 22:40:56', '1'),
(20, 37, 599.00, '2018-12-21 20:25:56', '2018-12-21 20:25:56', '1');

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
(1, 'Buzo Ana', '3DcAM01', 'product-images/31.jpg', 599.00, 10, 10, 10, 8, 'abrigo'),
(2, 'Musculosa Ganesha', 'USB02', 'product-images/29.jpg', 300.00, 10, 10, 6, 8, 'remera'),
(3, 'Ruana de hilo', 'wristWear03', 'product-images/2.jpg', 500.00, 10, 10, 10, 10, 'abrigo'),
(4, 'Remera Hamsa', 'LPN45', 'product-images/33.jpg', 315.00, 10, 10, 10, 10, 'remera');

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
(1, 'Kevin', '$2y$10$YwADA1ENH6i4HezQrFgrsOtPm42qJFINp0840cIEo3VHt/g6mDg4C', NULL, NULL, NULL, '0', NULL, NULL),
(2, 'carlos', '$2y$10$e4xlMgKV9q8Lixmpbtl8Y.R1Kas5dOuB1JUb96h8QWdvEPcUZeDF.', 'asfkf@fasmm.com', NULL, 'ksakdksak 2141', 'clasd', 'fas,s,fa,', NULL),
(3, NULL, '$2y$10$0NmSvltVWfovssMNgnG5oOe03DCf7xbfcruQNr9iRqnAZW4SJxVsa', '', NULL, '', '', 'Olavarria', NULL),
(4, NULL, '$2y$10$3abMrRSiIofgsx6Nr69jsOZ7II9eFwkKJY3fZKtek57nn4dL0Dx2i', 'asdjjda@gmail.com', NULL, 'Viasdn 1233', 'asdasdasd', 'OlavarrÃ­a', NULL),
(5, NULL, '$2y$10$CGt.2vWBAH3jr/HQupzoNOlgNsRhTX041FirX4DrNGza5Tvok5ZPq', 'asdasd@gmail.com', NULL, 'asdasda 1234', 'ceco1', 'Olavarria', NULL),
(6, NULL, '$2y$10$KNyJX2qKeb1wpFOX/fif9eVTHFt9bNYv6izfO/ihJs3hDZ87DngOq', 'kevinescobedo248@gmail.com', NULL, 'Barrio CECO1 C593', 'CECO1', 'OlavarrÃ­a', NULL),
(9, NULL, '$2y$10$bjPJmKlpmuGeY/O24qn2H.4mGLeEFk9y/HR2FSpb9M8Rr8tAesrIW', 'kily_24@live.com', NULL, 'Barrio CECO1 C593', 'CECO1', 'azul', NULL),
(10, '', '$2y$10$0WywV49VdcU9Hda0wd8ys..iD6h7rpmjZXUUAuoyCtBZLDcIsYWIC', 'ASDJJSDA@gmail.com', NULL, 'asdjajd 123', 'CECO1', 'OlavarrÃ­a', NULL),
(16, 'ezequiel', '$2y$10$qIkaxYyqN4PpdaWVvlVdhueXuHeYIAYsYRFfv6JC/7DEn1BvwgASO', 'addfskafk@gmail.com', NULL, 'Barrio CECO1 C593', 'asdasd', 'OlavarrÃ­a', NULL);

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
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
