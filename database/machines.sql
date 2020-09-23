-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-09-2020 a las 04:01:51
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_inventor_machines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) NOT NULL,
  `lote` int(4) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `serial` varchar(255) NOT NULL,
  `ram_slot_00` varchar(255) NOT NULL,
  `ram_slot_01` varchar(255) DEFAULT NULL,
  `hard_drive` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `ip_range` varchar(15) NOT NULL,
  `mac_address` varchar(17) NOT NULL,
  `anydesk` varchar(255) DEFAULT NULL,
  `campus` varchar(45) NOT NULL,
  `location` varchar(255) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `ruta_imagen` varchar(50) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `machines`
--

INSERT INTO `machines` (`id`, `lote`, `type`, `manufacturer`, `model`, `serial`, `ram_slot_00`, `ram_slot_01`, `hard_drive`, `cpu`, `ip_range`, `mac_address`, `anydesk`, `campus`, `location`, `imagen`, `ruta_imagen`, `comment`, `created_at`, `updated_at`) VALUES
(4, NULL, 'PC', 'LENOVO', 'PRODESK G4', 'S1H03LKD', '4GB DDR3 DIMM', '1GB DDR2 DIMM', '500GB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.71.240', '98-EE-CB-25-1F-C2', '46556226', 'VIVA 1A IPS MACARENA', 'OFICINA DE SISTEMAS', NULL, NULL, NULL, '2020-09-20 02:02:28', '2020-09-20 07:10:07'),
(5, NULL, 'ATRIL', 'RASPBERRY', 'PI 4', 'PF11B184', '4GB DDR4 DIMM', 'NULL', '1TB', 'INTEL I5', '192.168.71.240', '98-EE-CB-25-1F-C2', '46556226', 'VIVA 1A IPS MACARENA', 'OFICINA DE SISTEMAS', NULL, NULL, NULL, '2020-09-20 03:18:58', '2020-09-20 03:18:58'),
(6, NULL, 'ATRIL', NULL, 'PRODESK G4', 'EYJPDII6IM', '1GB DDR2 SO-DIMM', 'NULL', '300GB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.200.122', '98-EE-CB-25-1F-C2', '46556226', 'VIVA 1A IPS CALLE 30', 'LA PARRILLA', NULL, NULL, NULL, '2020-09-21 07:59:53', '2020-09-22 09:00:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
