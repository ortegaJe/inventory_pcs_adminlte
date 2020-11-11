-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-11-2020 a las 06:38:57
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
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE `campus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `campu_name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'VIVA 1A IPS MACARENA', 'MAC', '2020-10-09 22:30:50', '2020-10-09 22:30:50'),
(2, 'VIVA 1A IPS CALLE 30', 'C30', NULL, NULL),
(4, 'VIVA 1A IPS CARRERA 16', 'C16', '2020-10-03 21:05:49', '2020-10-03 21:05:49'),
(5, 'VIVA 1A IPS SOLEDAD', 'SOL', '2020-10-03 21:05:57', '2020-10-03 21:05:57'),
(6, 'VIVA 1A IPS SURA SAN JOSE', 'SSJ', '2020-10-03 21:06:12', '2020-10-03 21:06:12'),
(8, 'VIVA 1A IPS SURA 85', 'S85', '2020-10-04 16:35:14', '2020-10-04 16:35:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hdds`
--

CREATE TABLE `hdds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hdds`
--

INSERT INTO `hdds` (`id`, `size`, `type`, `created_at`, `updated_at`) VALUES
(29, '70 GB', 'Escritorio', NULL, NULL),
(30, '70 GB', 'Portatil', NULL, NULL),
(31, '100 GB', 'Escritorio', NULL, NULL),
(32, '100 GB', 'Portatil', NULL, NULL),
(33, '150 GB', 'Escritorio', NULL, NULL),
(34, '150 GB', 'Portatil', NULL, NULL),
(35, '200 GB', 'Escritorio', NULL, NULL),
(36, '200 GB', 'Portatil', NULL, NULL),
(37, '250 GB', 'Escritorio', NULL, NULL),
(38, '250 GB', 'Portatil', NULL, NULL),
(39, '300 GB', 'Escritorio', NULL, NULL),
(40, '300 GB', 'Portatil', NULL, NULL),
(41, '500 GB', 'Escritorio', NULL, NULL),
(42, '500 GB', 'Portatil', NULL, NULL),
(43, '800 GB', 'Escritorio', NULL, NULL),
(44, '800 GB', 'Portatil', NULL, NULL),
(45, '1 TB', 'Escritorio', NULL, NULL),
(46, '1 TB', 'Portatil', NULL, NULL),
(47, '2 TB', 'Escritorio', NULL, NULL),
(48, '2 TB', 'Portatil', NULL, NULL),
(49, '??', '??', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` smallint(6) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `manufacturer` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(56) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram_slot_00_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ram_slot_01_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hard_drive_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_range` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anydesk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `rol_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `machines`
--

INSERT INTO `machines` (`id`, `serial`, `lote`, `type_id`, `manufacturer`, `model`, `ram_slot_00_id`, `ram_slot_01_id`, `hard_drive_id`, `cpu`, `ip_range`, `mac_address`, `anydesk`, `os`, `created_by`, `rol_id`, `campus_id`, `location`, `image`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'NO REGISTRA', 1001, 4, NULL, NULL, 1, 1, 49, NULL, '192.168.71.26', 'B8:27:EB:71:97:71', NULL, 'Windows 10', 1, 1, 1, NULL, NULL, NULL, NULL, '2020-10-28 07:27:06'),
(2, '', 1001, 4, '', '', 1, 1, 49, '', ' 192.168.71.27 ', 'B8:27:EB:39:0C:5C', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(3, '', 1001, 4, '', '', 1, 1, 49, '', ' 192.168.71.28 ', 'B8:27:EB:5F:59:D3', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(4, '', 1001, 4, '', '', 1, 1, 49, '', ' 192.168.71.29 ', 'B8:27:EB:3E:16:A7', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(6, '', 1001, 4, '', '', 1, 1, 49, '', ' 192.168.71.81 ', 'B8:27:EB:7F:5C:23', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(7, '', 1001, 4, '', '', 1, 1, 49, '', ' 192.168.71.64 ', '  ', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(8, '', 1001, 2, '', '', 5, 1, 49, 'Mobile DualCore Intel Core i5-3230M, 2600 MHz', ' 192.168.71.24', '00-0E-C4-D0-0B-6C', '939224578', NULL, 1, 1, 1, 'ENTRADA', NULL, 'Microsoft Windows 10 Enterprise 2016 LTSB\r\nV1AMAC-ATRIL01', NULL, NULL),
(9, '', 1001, 2, '', '', 1, 1, 49, '', ' 192.168.71.25 ', '6C:4B:90:50:01:76', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(10, '', 1001, 2, '', '', 1, 1, 49, '', ' 192.168.71.213', '  ', NULL, NULL, 1, 1, 1, '', NULL, NULL, NULL, NULL),
(11, '', 1006, 4, '', '', 1, 1, 49, '', ' 192.168.62.26 ', 'B8:27:EB:AC:53:10', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(12, '', 1006, 4, '', '', 1, 1, 49, '', ' 192.168.62.28 ', 'B8:27:EB:5E:3B:D6', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(13, '', 1006, 4, '', '', 1, 1, 49, '', ' 192.168.62.29 ', 'B8:27:EB:68:55:17', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(14, '', 1006, 4, '', '', 1, 1, 49, '', ' 192.168.62.30 ', 'B8:27:EB:F8:D4:E7', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(15, '', 1006, 4, '', '', 1, 1, 49, '', ' 192.168.62.31 ', 'B8:27:EB:2D:B6:9A', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(16, '', 1006, 4, '', '', 1, 1, 49, '', ' 192.168.62.33 ', 'B8:27:EB:9D:57:3B', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(17, '', 1006, 2, '', '', 1, 1, 49, '', ' 192.168.62.122', 'D0:27:88:91:5F:30', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(18, '', 1006, 2, '', '', 1, 1, 49, '', ' 192.168.62.34 ', '98:FA:9B:29:90:75', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(19, '', 1006, 2, '', '', 1, 1, 49, '', ' 192.168.62.37 ', '  ', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(20, '', 1006, 2, '', '', 1, 1, 49, '', ' 192.168.62.25 ', '6C:4B:90:67:9F:40', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL),
(21, '', 1002, 2, '', '', 1, 1, 49, '', ' 192.168.12.25 ', '6C:4B:90:4F:F9:12', NULL, NULL, NULL, NULL, 2, '', NULL, NULL, NULL, NULL),
(22, '', 1002, 2, '', '', 1, 1, 49, '', ' 192.168.12.35 ', '  ', NULL, NULL, NULL, NULL, 2, '', NULL, NULL, NULL, NULL),
(23, 'XXXX', 1002, 4, ' RASPBERRY ', ' PI 4', 1, 1, 49, '', ' 192.168.12.29 ', 'B8:27:EB:8A:23:0F', '', NULL, NULL, NULL, 2, 'PISO 2', NULL, NULL, NULL, NULL),
(24, 'XXXX', 1002, 4, ' RASPBERRY ', ' PI 4', 1, 1, 49, '', ' 192.168.12.28 ', 'B8:27:EB:AE:15:56', '', NULL, NULL, NULL, 2, ' TOMA DE MUESTRA ', NULL, NULL, NULL, NULL),
(25, '', 1002, 4, '', '', 1, 1, 49, '', ' 192.168.12.100', 'B8:27:EB:63:99:84', NULL, NULL, NULL, NULL, 2, '', NULL, NULL, NULL, NULL),
(26, 'XXXX', 1002, 4, ' RASPBERRY ', ' PI 4', 1, 1, 49, '', ' 192.168.12.101', 'B8:27:EB:63:DA:CD', '', NULL, NULL, NULL, 2, 'PISO 1', NULL, NULL, NULL, NULL),
(27, 'NO REGISTRA', 1006, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', 1, 1, 49, NULL, '192.168.16.26', 'B8:27:EB:0E:1E:B4', NULL, NULL, NULL, NULL, 4, 'PISO ?', NULL, NULL, NULL, '2020-11-06 10:42:26'),
(28, 'XXXXXXXXXXXXXX', 1006, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', 1, 1, 49, '', ' 192.168.16.28 ', 'B8:27:EB:29:73:D3', '', NULL, NULL, NULL, 4, 'PISO ?', NULL, '', NULL, NULL),
(29, '', 1006, 2, '', '', 1, 1, 49, '', ' 192.168.16.25 ', 'FC:3F:DB:0A:D2:32', NULL, NULL, NULL, NULL, 4, '', NULL, NULL, NULL, NULL),
(30, '', 1006, 2, '', '', 1, 1, 49, '', ' 192.168.16.30 ', '6C:4B:90:67:9F:6F', NULL, NULL, NULL, NULL, 4, '', NULL, NULL, NULL, NULL),
(35, 'S1H03LKD', 1001, 1, 'LENOVO', 'THINKCENTRE ALL IN ONE', 5, 5, 41, 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.71.75', '98-EE-CB-25-1F-C2', '465 562 426', 'Windows 10', 1, 1, 1, 'LINEA DE FRENTE MODULO 18', NULL, NULL, NULL, '2020-10-31 01:35:28'),
(48, 'MJ06PZFW', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.123', '6C-4B-90-EA-67', '791 415 611', 'Windows 10', 1, 1, 1, 'LINEA DE FRENTE MODULO 02', NULL, NULL, NULL, '2020-10-31 01:51:17'),
(49, 'MJ06PZKJ', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.162', '6C-4B-90-EA-67', '929 589 135', 'Windows 10', 1, 1, 1, 'LINEA DE FRENTE MODULO 08', NULL, NULL, NULL, '2020-10-31 01:50:51'),
(50, 'MJ06PZHR', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.67', '6C-4B-90-52-50', '694 961 071', 'Windows 10', 1, 1, 1, 'CONSULTORIO 24', NULL, NULL, NULL, '2020-10-31 01:56:53'),
(51, 'MJ06PZFR', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.180', '6C-4B-90-52-4F', '421662546', 'Windows 10', 1, 1, 1, 'CONSULTORIO 25', NULL, NULL, NULL, '2020-10-31 01:59:43'),
(116, ' PC0UF1HX ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio1 ', NULL, NULL, NULL, NULL),
(117, 'PC0UF3CU', 1001, 1, 'LENOVO', 'V520S-08IKL', 8, 1, 45, 'QUADCORE INTEL CORE I5-7400, 2979 MHZ', '192.168.71.167', '6C-4B-90-61-EB-BB', '453 476 656', 'Windows 10', 1, 1, 1, 'consultorio2', NULL, NULL, NULL, '2020-10-31 02:02:18'),
(118, ' PC0UF3CN ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio3 ', NULL, NULL, NULL, NULL),
(119, ' PC0UF3P6 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio4 ', NULL, NULL, NULL, NULL),
(120, ' PC0UF3P4 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio5 ', NULL, NULL, NULL, NULL),
(121, ' MJ06PZGB ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio7 ', NULL, NULL, NULL, NULL),
(122, ' MJ06PZJJ ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio8 ', NULL, NULL, NULL, NULL),
(123, ' MJ06PZG8 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio9 ', NULL, NULL, NULL, NULL),
(124, ' MJ06PZHH ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio10 ', NULL, NULL, NULL, NULL),
(125, ' MJ06PZGT ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio11 ', NULL, NULL, NULL, NULL),
(126, 'MJ06PZK1', 1001, 1, 'LENOVO', 'THINKCENTRE M710Q', 7, 1, 45, 'QuadCore Intel Core i5-7400T, 2400 MHz', '192.168.71.235', '6C-4B-90-52-4F-CE', '444 258 948', 'Windows 10', 1, 1, 1, 'consultorio12', NULL, NULL, NULL, '2020-10-31 02:02:57'),
(127, ' MJ06PZFH ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio13 ', NULL, NULL, NULL, NULL),
(128, ' MJ06PZFU ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio14 ', NULL, NULL, NULL, NULL),
(129, ' MJ06PZGG ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio15 ', NULL, NULL, NULL, NULL),
(130, ' MJ06PZJX ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio16 ', NULL, NULL, NULL, NULL),
(131, ' MJ06PZEV ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio17 ', NULL, NULL, NULL, NULL),
(132, ' MJ06PZKE ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio19 ', NULL, NULL, NULL, NULL),
(133, ' MJ06PZEB ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio20 ', NULL, NULL, NULL, NULL),
(134, ' MJ06PZKZ ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio21 ', NULL, NULL, NULL, NULL),
(135, ' MJ06PZJR ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio23 ', NULL, NULL, NULL, NULL),
(136, ' MJ06PZF8 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio27 ', NULL, NULL, NULL, NULL),
(137, ' MJ06PZHB ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio28 ', NULL, NULL, NULL, NULL),
(138, ' MJ06PZJG ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio29 ', NULL, NULL, NULL, NULL),
(139, ' MJ06PZH6 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio30 ', NULL, NULL, NULL, NULL),
(140, ' MJ06PZGS ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio31 ', NULL, NULL, NULL, NULL),
(141, ' MJ06PZG2 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio32ELECTRO ', NULL, NULL, NULL, NULL),
(142, ' MJ06PZKP ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio32CARDIOLOGIA ', NULL, NULL, NULL, NULL),
(143, ' YL002MN3 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' consultorio33 ', NULL, NULL, NULL, NULL),
(144, ' MJ06PZ6K ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo1 ', NULL, NULL, NULL, NULL),
(145, ' MJ06PZH8 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo4 ', NULL, NULL, NULL, NULL),
(146, ' MJ06PZJ9 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo5 ', NULL, NULL, NULL, NULL),
(147, ' MJ06PZFN ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo6 ', NULL, NULL, NULL, NULL),
(148, ' MJ06PZHJ ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo7 ', NULL, NULL, NULL, NULL),
(149, ' MJ06PZK7 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo9 ', NULL, NULL, NULL, NULL),
(150, ' MJ06PZH2 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo10 ', NULL, NULL, NULL, NULL),
(151, 'MJ06PZL4', 1001, 1, 'LENOVO', 'THINKCENTRE M710Q', 7, 1, 45, 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE', '192.168.71.100', '6C-4B-90-52-50-84', '696 059 473', 'Windows 10', 1, 1, 1, 'LINEA DE FRENTE MODULO 11', NULL, NULL, NULL, '2020-10-31 02:03:49'),
(154, ' MJ06PZF4 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo14 ', NULL, NULL, NULL, NULL),
(155, ' MJ06PZHC ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo15 ', NULL, NULL, NULL, NULL),
(156, ' MJ06PZGA ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo16 ', NULL, NULL, NULL, NULL),
(157, ' MJ06PZHF ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo17 ', NULL, NULL, NULL, NULL),
(158, ' PC0UF3Q7 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo23 ', NULL, NULL, NULL, NULL),
(159, ' MJ06APXK ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo18 ', NULL, NULL, NULL, NULL),
(160, ' 3CR52904FG ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' Modulo2 ', NULL, NULL, NULL, NULL),
(161, ' MJ07PZ6W ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' odontologia1 ', NULL, NULL, NULL, NULL),
(162, ' MJ06PZGW ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' odontologia2 ', NULL, NULL, NULL, NULL),
(163, ' YL002L9C ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' odontologia3 ', NULL, NULL, NULL, NULL),
(164, ' PC0UAXPA ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' ECOGRAFIA ', NULL, NULL, NULL, NULL),
(165, ' PC0UF3Z5 ', 1001, 1, '', '', 1, 1, 49, '', '', '', NULL, NULL, 1, 1, 1, ' procedimiento ', NULL, NULL, NULL, NULL),
(169, 'MJ00VAYE', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 7, 1, 39, 'INTEL(R) CORE(TM) I3-4130 CPU @ 3.40GHZ, 3400 MHZ, 2 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.16.75', '44-8A-5B-75-39-36', '550 791 024', 'Windows 10', NULL, NULL, 4, 'LINEA DE FRENTE MODULO 3', NULL, NULL, NULL, '2020-10-31 02:05:12'),
(170, 'S1H02QGN', 1006, 1, 'LENOVO', 'THINKCENTRE E73Z', 6, 1, 41, 'DUALCORE INTEL CORE I3-4160, 3600 MHZ', '192.168.16.63', '98-EE-CB-15-12-FF', '278 779 528', 'Windows 10', NULL, NULL, 4, 'LINEA DE FRENTE MODULO 04 P2', NULL, NULL, NULL, '2020-10-31 02:06:00'),
(171, 'MJ00VAZ1', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 6, 1, 41, 'DUALCORE INTEL CORE I3-4130, 3400 MHZ', '192.168.16.60', '44-8A-5B-75-25-A9', '870 561 845', 'Windows 10', NULL, NULL, 4, 'LINEA DE FRENTE MODULO 05 P2', NULL, NULL, NULL, '2020-10-31 02:06:37'),
(174, '', 1005, 4, ' RASPBERRY ', ' PI 4 ', 1, 1, 49, '', ' 192.168.12.20 ', 'DC:A6:32:3D:4A:EF', NULL, NULL, NULL, NULL, 5, ' PISO 1 SALA 2 ', NULL, NULL, NULL, NULL),
(175, '', 1005, 4, ' RASPBERRY ', ' PI 4 ', 1, 1, 49, '', ' 192.168.12.30 ', 'DC:A6:32:0D:B2:45', NULL, NULL, NULL, NULL, 5, ' PISO 2 ', NULL, NULL, NULL, NULL),
(196, 'XXXXXXXXXXX', 1006, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', 1, 1, 49, '', '192.168.16.27', 'B8:27:EB:23:D6:2D', '', NULL, NULL, NULL, 4, 'PISO 1 ADMISIONES', NULL, '', NULL, NULL),
(197, 'MJ00VAZ7', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 6, 1, 41, 'INTEL CORE I3-4130, 3400 MHZ DUALCORE', '192.168.16.74', '44-8A-5B-75-24-D7', '1 362 652', 'Windows 10', NULL, NULL, 4, 'CONSULTORIO 02 PISO 1', NULL, NULL, NULL, '2020-10-31 02:10:43'),
(198, 'MJ00VAYS', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 6, 1, 41, 'DUALCORE INTEL CORE I3-4130, 3400 MHZ', '192.168.16.73', '44-8A-5B-75-16-C4', '4 898 537', 'Windows 10', NULL, NULL, 4, 'CONSULTORIO 04 PISO 1', NULL, NULL, NULL, '2020-10-31 02:10:09'),
(234, ' PCOUF40H ', 1002, 1, ' LENOVO ', ' V520S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 1 - PISO 1 ', NULL, NULL, NULL, NULL),
(235, ' MXL83511F7 ', 1002, 1, ' HP COMPAQ ', '  ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 2 - PISO 1 ', NULL, NULL, NULL, NULL),
(236, ' MJ06A4DR ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 3 - PISO 1 ', NULL, NULL, NULL, NULL),
(237, ' 11S30002049001019CV3RZ ', 1002, 1, ' LENOVO ', ' H220 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 4 - PISO 1 ', NULL, NULL, NULL, NULL),
(238, ' L3E224 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 5 - PISO 1 ', NULL, NULL, NULL, NULL),
(239, ' PCOUF1F3 ', 1002, 1, ' LENOVO ', ' V520S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 6 - PISO 1 ', NULL, NULL, NULL, NULL),
(240, ' 30089568998 ', 1002, 1, ' DELL ', ' OPTIPLEX 3020 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 7 - PISO 1 ', NULL, NULL, NULL, NULL),
(241, ' MXL0351VYS ', 1002, 1, ' HP COMPAQ ', ' 5008 MT ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 8 - PISO 1 ', NULL, NULL, NULL, NULL),
(242, ' L3E1350 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 9 - PISO 2 ', NULL, NULL, NULL, NULL),
(243, ' L3E1102 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 10 - PISO 2 ', NULL, NULL, NULL, NULL),
(244, ' L3E1124 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 11 - PISO 2 ', NULL, NULL, NULL, NULL),
(245, ' L3E1100 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 12 - PISO 2 ', NULL, NULL, NULL, NULL),
(246, ' L3E1159 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 13 - PISO 2 ', NULL, NULL, NULL, NULL),
(247, ' MJ06LXHX ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 14 - PISO 2 ', NULL, NULL, NULL, NULL),
(248, ' L3E1332 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 15 - PISO 2 ', NULL, NULL, NULL, NULL),
(249, ' CN04W34Y-70163 ', 1002, 1, ' DELL ', ' OPTIPLEX 3020 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 1 - PISO 1 ', NULL, NULL, NULL, NULL),
(250, ' MJ018Y5C ', 1002, 1, ' LENOVO ', ' THINKCENTRE M73 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 2 - PISO 1 ', NULL, NULL, NULL, NULL),
(251, ' MJ018Y5Y ', 1002, 1, ' LENOVO ', ' THINKCENTRE M73 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 3 - PISO 1 ', NULL, NULL, NULL, NULL),
(252, ' 11S300020490010102434H ', 1002, 1, ' LENOVO ', ' LENOVO ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 4 - PISO 1 ', NULL, NULL, NULL, NULL),
(253, ' MJGVCHX ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 6 - PISO 2 ', NULL, NULL, NULL, NULL),
(254, ' MJ068TUL ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 7 - PISO 2 ', NULL, NULL, NULL, NULL),
(255, ' MJ068TXF ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 7 AUX - PISO 2 ', NULL, NULL, NULL, NULL),
(256, ' YL005S3Z ', 1002, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 8 - PISO 2 ', NULL, NULL, NULL, NULL),
(257, ' YL002MWF ', 1002, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 9 - PISO 2 ', NULL, NULL, NULL, NULL),
(258, ' PCOUF40C ', 1002, 1, ' LENOVO ', ' V520S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 10 - PISO 2 ', NULL, NULL, NULL, NULL),
(259, ' MJ06PCU6 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' ATRIL TURNERO - PISO 1 ', NULL, NULL, NULL, NULL),
(260, ' MJ05J7T3 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' ATRIL LABORATORIO - PISO 1 ', NULL, NULL, NULL, NULL),
(261, ' 30070813286 ', 1002, 1, ' DELL ', ' OPTIPLEX 3020 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' SIAU - ATENCION AL USUARIO - PISO 1 ', NULL, NULL, NULL, NULL),
(262, ' CSO1879098 ', 1002, 1, ' LENOVO ', ' ALL IN ONE 10150 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' OFICINA ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL),
(263, ' CSO1879177 ', 1002, 1, ' LENOVO ', ' ALL IN ONE 10151 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' OFICINA ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL),
(264, ' MJ00M57H ', 1002, 1, ' LENOVO ', ' THINKCENTRE M73 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO DE VACUNACION - PISO 1 ', NULL, NULL, NULL, NULL),
(265, ' MXL4090ND5 ', 1002, 1, ' HP COMPAQ ', ' PRO SFF ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO DE PROCEDIMIENTOS - PISO 1 ', NULL, NULL, NULL, NULL),
(266, ' CNU0222RMH ', 1002, 3, ' HP ', ' HP420 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 2, ' OFICINA ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL),
(267, ' MJ05J7UH ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 1 - PISO 1 ', NULL, NULL, NULL, NULL),
(268, ' YL005RNN ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 2 - PISO 1 ', NULL, NULL, NULL, NULL),
(269, ' YL005RMN ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 3 - PISO 1 ', NULL, NULL, NULL, NULL),
(270, ' MJDVBYX ', 1005, 1, ' LENOVO ', ' THINKCENTRE M81 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 4 - PISO 1 ', NULL, NULL, NULL, NULL),
(271, ' YL002L8E ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 5 - PISO 1 ', NULL, NULL, NULL, NULL),
(272, ' MJDVBZB ', 1005, 1, ' LENOVO ', ' THINKCENTRE M81 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 6 - PISO 2 ', NULL, NULL, NULL, NULL),
(273, ' S1H03LHE ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 7 - PISO 2 ', NULL, NULL, NULL, NULL),
(274, ' S1H01YDB ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 8 - PISO 2 ', NULL, NULL, NULL, NULL),
(275, ' MJ05HND ', 1005, 1, ' LENOVO ', ' THINKCENTRE M76E ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 9- PISO 2 ', NULL, NULL, NULL, NULL),
(276, ' S1H03LJF ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 10- PISO 2 ', NULL, NULL, NULL, NULL),
(277, ' VKC91160 ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO 1 MOD1   ', NULL, NULL, NULL, NULL),
(278, ' MJ450GT ', 1005, 1, ' LENOVO ', ' THINKCENTRE M72E ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO 1 MOD2   ', NULL, NULL, NULL, NULL),
(279, ' S5DMXYP ', 1005, 1, ' LENOVO ', ' THINCENTRE A70 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO 1  MOD3 ', NULL, NULL, NULL, NULL),
(280, ' YL002M3A ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO  1 MOD4 IMAGENOLOGIA ', NULL, NULL, NULL, NULL),
(281, ' YL002M80 ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO  1 MOD5 ', NULL, NULL, NULL, NULL),
(282, ' MJ06A4D9 ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', '541702311', NULL, NULL, NULL, 5, ' ATENCION AL USUARIO - PISO  1 SIAU ', NULL, NULL, NULL, NULL),
(283, ' YL002M80 ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' FARMACIA CAJACOPI - PISO 1 ', NULL, NULL, NULL, NULL),
(284, ' MJGVHBV ', 1005, 1, ' LENOVO ', ' THINKCENTRE ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' FISIOTERAPIA - PISO 1 ', NULL, NULL, NULL, NULL),
(285, ' S1H03LH4 ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' ECOGRAFIA - PISO 1 ', NULL, NULL, NULL, NULL),
(286, ' MJ030DL3 ', 1005, 1, ' LENOVO ', ' WORKSTATION P300 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' RAYOS X - PISO 1 ', NULL, NULL, NULL, NULL),
(287, ' YL005RWM ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' ODONTOLOGIA - PISO 1 ', NULL, NULL, NULL, NULL),
(288, ' MJGVHBG ', 1005, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' AUDITORIO - PISO 1 ', NULL, NULL, NULL, NULL),
(289, ' MJ05UPRN ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' CIRUGIA - PISO 2 ', NULL, NULL, NULL, NULL),
(290, ' S1H01XNV ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL),
(291, ' PB-0368K1 ', 1005, 3, ' LENOVO ', ' LAPTOP THINKPAD X240 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' OFICINA DIRECTOR - PISO 2 ', NULL, NULL, NULL, NULL),
(292, ' S1H01YLW ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' IMAGENOLOGIA - PISO 2 ', NULL, NULL, NULL, NULL),
(293, ' PF-QFX396 ', 1005, 3, ' LENOVO ', ' LAPTOP THINKPAD E470 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' ENFERMERA - PISO 2 ', NULL, NULL, NULL, NULL),
(294, ' PF-107PUT ', 1005, 3, ' LENOVO ', ' LAPTOP THINKPAD E470 ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' QUIMICO – PISO 2 ', NULL, NULL, NULL, NULL),
(295, ' S1H02RRT ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL),
(296, ' S1H02K65 ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL),
(297, ' MJ06A4DR ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL),
(298, ' MJGVKHX ', 1005, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL),
(299, ' MJ00M576 ', 1005, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL),
(300, ' MJ04RYU3 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 4 ', NULL, NULL, NULL, NULL),
(301, ' MJ04RYUJ ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 5 ', NULL, NULL, NULL, NULL),
(302, ' PC0UF3CV ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 1 ', NULL, NULL, NULL, NULL),
(303, ' PC035CCB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 1 imagenologia ', NULL, NULL, NULL, NULL),
(304, ' PC0UHA5G ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 2 imagenologia ', NULL, NULL, NULL, NULL),
(305, ' PC0UF1K1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' TRANSCRIPCION DE RAYOS X ', NULL, NULL, NULL, NULL),
(306, ' MJ030DKY ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' RAYOS X ', NULL, NULL, NULL, NULL),
(307, ' MJ04RYVB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' FISIOTERAPIA ', NULL, NULL, NULL, NULL),
(308, ' PF018APF ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' FISIOTERAPIA ', NULL, NULL, NULL, NULL),
(309, ' 13589 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 101 ', NULL, NULL, NULL, NULL),
(310, ' MJ05FCU9 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 102 ', NULL, NULL, NULL, NULL),
(311, ' PC0UF3P7 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' MODULO SALA PAC ', NULL, NULL, NULL, NULL),
(312, ' MJ04RYV1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' VACUNACION ', NULL, NULL, NULL, NULL),
(313, ' PC0UF1ES ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 103 ', NULL, NULL, NULL, NULL),
(314, ' MJ04RYUY ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CITOLOGIA ', NULL, NULL, NULL, NULL),
(315, ' MJ05FCSD ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 104 ', NULL, NULL, NULL, NULL),
(316, ' MJ05FCS8 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 105 ', NULL, NULL, NULL, NULL),
(317, ' MJ05FCT4 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 106 ', NULL, NULL, NULL, NULL),
(318, ' MJ002T6L ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 107 ', NULL, NULL, NULL, NULL),
(319, ' MJ04RYUF ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 200 ', NULL, NULL, NULL, NULL),
(320, ' MJ04RYUH ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 201 ', NULL, NULL, NULL, NULL),
(321, ' YL002MUB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 202 ', NULL, NULL, NULL, NULL),
(322, ' YL002N49 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 203 ', NULL, NULL, NULL, NULL),
(323, ' PC035CBF ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 204 ', NULL, NULL, NULL, NULL),
(324, ' PC035CD0 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 205 ', NULL, NULL, NULL, NULL),
(325, ' MJ04RYU8 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 206 ', NULL, NULL, NULL, NULL),
(326, ' MJ04RYV4 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 207 ', NULL, NULL, NULL, NULL),
(327, ' MJ04RYU5 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 208 ', NULL, NULL, NULL, NULL),
(328, ' MX2292NW ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 209 ', NULL, NULL, NULL, NULL),
(329, ' YL002MQ3 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 210 ', NULL, NULL, NULL, NULL),
(330, ' PCOUF1EW ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 211 ', NULL, NULL, NULL, NULL),
(331, ' PCOUF3CW ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 212 ', NULL, NULL, NULL, NULL),
(332, ' PCOUF3PB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 213 ', NULL, NULL, NULL, NULL),
(333, ' PCO38V6 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  1 ', NULL, NULL, NULL, NULL),
(334, ' PCO35CBH ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  2 ', NULL, NULL, NULL, NULL),
(335, ' PCO338X1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  3 ', NULL, NULL, NULL, NULL),
(336, ' MJ018Y6K ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  4 ', NULL, NULL, NULL, NULL),
(337, ' MJ05FCTC ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  5 ', NULL, NULL, NULL, NULL),
(338, ' MJ04RYU2 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  ', NULL, NULL, NULL, NULL),
(339, ' REGISTRADO SIN SERIAL ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio300 ', NULL, NULL, NULL, NULL),
(340, ' YL002MJ1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio301 ', NULL, NULL, NULL, NULL),
(341, ' REGISTRADO SIN SERIAL ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio302 ', NULL, NULL, NULL, NULL),
(342, ' YL002MU9 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio303 ', NULL, NULL, NULL, NULL),
(343, ' YL002MHT ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio304 ', NULL, NULL, NULL, NULL),
(344, ' YL002MJ7 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio305 ', NULL, NULL, NULL, NULL),
(345, ' YL002M7Q ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', '', '', NULL, NULL, NULL, NULL, 6, ' consultorio306 ', NULL, NULL, NULL, NULL),
(346, 'NO REGISTRA', NULL, 1, 'LENOVO', NULL, 6, 1, 41, 'INTEL(R) CORE(TM) I3-4130 CPU @ 3.40GHZ, 3400 MHZ, 2 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.16.113', '44-8A-5B-75-2B-59', '9 555 153', NULL, NULL, NULL, 4, 'AUDITORIO', NULL, NULL, '2020-10-31 02:16:55', '2020-10-31 02:16:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machine_registration`
--

CREATE TABLE `machine_registration` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `machine_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_09_24_011222_create_machines_table', 1),
(4, '2020_09_25_214906_add_image_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_books', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(2, 'edit_books', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(3, 'delete_books', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(4, 'view_books', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(5, 'reserve_books', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(6, 'create_users', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(7, 'edit_users', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(8, 'delete_users', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(9, 'view_users', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(10, 'create_roles', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(11, 'edit_roles', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(12, 'delete_roles', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59'),
(13, 'view_roles', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rams`
--

CREATE TABLE `rams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mhz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rams`
--

INSERT INTO `rams` (`id`, `ram`, `size`, `standart`, `type`, `mhz`, `created_at`, `updated_at`) VALUES
(1, 'No aplica', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1GB DDR2 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2GB DDR2 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2GB DDR2 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '4GB DDR3 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '4GB DDR3 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '4GB DDR4 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '4GB DDR4 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '8GB DDR3 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '8GB DDR3 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '8GB DDR4 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '8GB DDR4 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '16GB DDR4 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(14, '16GB DDR4 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '32GB DDR4 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '64GB DDR4 DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(50, '1GB DDR2 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-11-11 05:34:49', '2020-11-11 05:34:49'),
(2, 'c30', '2020-11-11 05:47:27', '2020-11-11 05:47:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_alt`
--

CREATE TABLE `roles_alt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles_alt`
--

INSERT INTO `roles_alt` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2020-11-09 22:44:59', '2020-11-09 22:44:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-11-11 05:37:26', '2020-11-11 11:31:49'),
(3, 4, 2, '2020-11-11 05:48:00', '2020-11-11 05:48:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PC', NULL, NULL),
(2, 'ATRIL', NULL, NULL),
(3, 'LAPTOP', NULL, NULL),
(4, 'TV\nRASPBERRY PI', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cc` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `campus_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `work_function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cc`, `name`, `last_name`, `nick_name`, `password`, `phone`, `campus_id`, `role_id`, `work_function`, `email`, `email_verified_at`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1143434718, 'JEFFERSON JAVIER', 'ORTEGA PACHECO', 'JORTEGA', '$2y$10$MoXvdKIgd3/nHnGbOqYQueW9R3e8An8T7CaB.vPr6uhNRoaBIR91y', 3002777694, 1, 0, 'DATABASE ADMINISTRATOR', 'admin@inventor.co', NULL, 'boss.svg', NULL, '2020-10-03 15:38:04', '2020-10-03 15:38:04'),
(2, 1143434720, 'DUMMY', 'USER', 'DUMMYUSER', '$2y$10$HczhCG7SPQ7xVeewsdGajuIAsjiRiiHm8CbNTNnbH1G9xJyXwoIpy', 3002777694, 4, 2, 'Network Administrator', 'dummyuser@inventor.co', NULL, 'avatar5.png', NULL, '2020-10-03 21:27:31', '2020-10-04 14:15:33'),
(3, 1143434723, 'POLO', 'MONTAÑEZ', 'PMONTAÑEZ', '$2y$10$hYCNNgdf/OMF6SGbyPsWFewvrJxxEC1miD2wgtkXp1h0pqH1Xdq8.', 3002777694, 5, 3, 'Tech Support Enginner', 'admin@inventor.co', NULL, 'avatar04.png', NULL, '2020-10-03 21:29:29', '2020-10-06 06:48:35'),
(4, 1143434200, 'FRANCISCO', 'VILORIA', 'FVILORIA', '$2y$10$n626lKlNPPw4PI4Ek.8hnOxmKnnn7sznbEzAz0BSCi5j/rNyCAsBy', 3002777694, 2, 6, 'Support IT', 'fviloria@viva1a.com.co', NULL, 'avatar04.png', NULL, '2020-10-30 22:55:35', '2020-10-30 23:12:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hdds`
--
ALTER TABLE `hdds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machines_hard_drive_id_foreign` (`hard_drive_id`),
  ADD KEY `machines_type_id_index` (`type_id`),
  ADD KEY `machines_ram_slot_00_id_index` (`ram_slot_00_id`),
  ADD KEY `machines_ram_slot_01_id_index` (`ram_slot_01_id`),
  ADD KEY `machines_created_by_index` (`created_by`),
  ADD KEY `machines_rol_id_index` (`rol_id`),
  ADD KEY `machines_campus_id_index` (`campus_id`);

--
-- Indices de la tabla `machine_registration`
--
ALTER TABLE `machine_registration`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `machine_registration_machine_id_foreign` (`machine_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rams`
--
ALTER TABLE `rams`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_alt`
--
ALTER TABLE `roles_alt`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_foreing` (`user_id`) USING BTREE,
  ADD KEY `role_id_foreing` (`role_id`) USING BTREE;

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hdds`
--
ALTER TABLE `hdds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rams`
--
ALTER TABLE `rams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles_alt`
--
ALTER TABLE `roles_alt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_hard_drive_id_foreign` FOREIGN KEY (`hard_drive_id`) REFERENCES `hdds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_ram_slot_00_id_foreign` FOREIGN KEY (`ram_slot_00_id`) REFERENCES `rams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_ram_slot_01_id_foreign` FOREIGN KEY (`ram_slot_01_id`) REFERENCES `rams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles_alt` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `machine_registration`
--
ALTER TABLE `machine_registration`
  ADD CONSTRAINT `machine_registration_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_registration_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles_alt` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles_alt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `roles_role_id_foreing` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_user_id_foreing` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
