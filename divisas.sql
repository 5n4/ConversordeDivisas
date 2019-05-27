-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2019 a las 10:13:04
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `divisas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoresdivisa`
--

CREATE TABLE `valoresdivisa` (
  `idAbreviacion` varchar(4) NOT NULL,
  `nombreDivisa` varchar(40) NOT NULL,
  `valorDivisa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valoresdivisa`
--

INSERT INTO `valoresdivisa` (`idAbreviacion`, `nombreDivisa`, `valorDivisa`) VALUES
('AUD', 'Dólar Australiano', 1.6205),
('BGN', 'Lev búlgaro', 1.9558),
('BRL', 'Real Brasileño', 4.5247),
('CAD', 'Dólar canadiense', 1.5053),
('CHF', 'Franco suizo', 1.1215),
('CNY', 'Renminbi chino', 7.7206),
('CZK', 'Corona checa', 25.83),
('DKK', 'Corona danesa', 7.4678),
('EUR', 'Euro', 1),
('GBP', 'Libra esterlina', 0.88318),
('HKD', 'Dólar de Hong Kong', 8.7806),
('HRK', 'Kuna croata', 7.4258),
('HUF', 'Forinto húngaro', 325.95),
('IDR', 'Rupia indonesia', 16100.9),
('ILS', 'Nuevo séquel', 4.0331),
('INR', 'Rupia india', 77.8),
('ISK', 'Corona Islandesa', 138.3),
('JPY', 'Yen japonés', 122.61),
('KRW', 'Won surcoreano', 1328.29),
('MXN', 'Peso mexicano', 21.3057),
('MYR', 'Ringgit malasio', 4.6857),
('NOK', 'Corona noruega', 9.7558),
('NZD', 'Dólar neozenlandés', 1.7109),
('PHP', 'Peso filipino', 58.403),
('PLN', 'Zloty polaco', 4.2974),
('RON', 'Leu rumano', 4.7619),
('RUB', 'Rublo ruso', 72.1352),
('SEK', 'Corona sueca', 10.7098),
('SGD', 'Dólar de Singapur', 1.5403),
('THB', 'Baht tailandés', 35.636),
('TRY', 'Lira turca', 6.7988),
('USD', 'Dólar estadounidense', 1.1187),
('ZAR', 'Rand sudafricano', 16.1554);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `valoresdivisa`
--
ALTER TABLE `valoresdivisa`
  ADD PRIMARY KEY (`idAbreviacion`),
  ADD UNIQUE KEY `nombreDivisa` (`nombreDivisa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
