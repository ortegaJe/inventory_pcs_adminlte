-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-12-2020 a las 03:44:27
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
(1, 'VIVA 1A IPS MACARENA', 'MAC', '2020-10-10 03:30:50', '2020-10-10 03:30:50'),
(2, 'VIVA 1A IPS CALLE 30', 'C30', '2020-11-24 23:28:32', '2020-11-24 23:28:35'),
(4, 'VIVA 1A IPS CARRERA 16', 'C16', '2020-10-04 02:05:49', '2020-10-04 02:05:49'),
(5, 'VIVA 1A IPS SOLEDAD', 'SOL', '2020-10-04 02:05:57', '2020-10-04 02:05:57'),
(6, 'VIVA 1A IPS SURA SAN JOSE', 'SSJ', '2020-10-04 02:06:12', '2020-10-04 02:06:12'),
(9, 'VIVA 1A IPS SURA 85', 'S85', '2020-11-12 06:23:59', '2020-11-12 06:23:59'),
(10, 'VIVA 1A CASA MATRIZ', 'MTRZ', '2020-11-19 23:16:23', '2020-11-19 23:16:23'),
(11, 'VIVA 1A CALL CENTER', '', '2020-11-19 23:17:12', '2020-11-19 23:17:12'),
(12, 'VIVA 1A IPS KENNEDY', 'KNY', '2020-11-20 22:58:21', '2020-11-20 22:58:21'),
(13, 'VIVA 1A IPS MARINELO', 'MAR', '2020-11-25 00:13:51', '2020-11-25 00:13:51'),
(14, 'VIVA 1A IPS CIENAGA', 'CNG', '2020-11-25 00:14:04', '2020-11-25 00:14:04'),
(15, 'VIVA 1A IPS CARRERA 12', 'C12', '2020-11-25 00:14:21', '2020-11-25 00:14:21'),
(16, 'VIVA 1A IPS RIOHACHA', 'RIO', '2020-11-25 00:46:34', '2020-11-25 00:46:34'),
(17, 'VIVA 1A IPS VALLEDUPAR', 'VDP', '2020-11-25 00:46:55', '2020-11-25 00:46:55');

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
  `name_pc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `machines`
--

INSERT INTO `machines` (`id`, `serial`, `lote`, `type_id`, `manufacturer`, `model`, `ram_slot_00_id`, `ram_slot_01_id`, `hard_drive_id`, `cpu`, `name_pc`, `ip_range`, `mac_address`, `anydesk`, `os`, `created_by`, `rol_id`, `campus_id`, `location`, `image`, `comment`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(5, '', 1001, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.71.80 ', 'B8:27:EB:7B:FA:B3', NULL, NULL, 1, NULL, 1, '', NULL, NULL, NULL, '2020-11-27 04:19:05', NULL, 1),
(6, '', 1001, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.71.81 ', 'B8:27:EB:7F:5C:23', NULL, NULL, 1, NULL, 1, '', NULL, NULL, NULL, '2020-11-26 01:56:53', NULL, 1),
(7, '', 1001, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.71.64 ', '  ', NULL, NULL, 1, NULL, 1, '', NULL, NULL, NULL, '2020-11-26 02:08:38', NULL, 1),
(8, 'NO REGISTRA', 1001, 2, NULL, NULL, 5, 1, 49, 'Mobile DualCore Intel Core i5-3230M, 2600 MHz', NULL, '192.168.71.146', '00-0E-C4-D0-0B-6C', '121 704 327', NULL, 1, NULL, 1, 'ENTRADA', NULL, 'V1AMAC-ATRIL01', NULL, '2020-11-26 02:08:25', NULL, 1),
(9, '', 1001, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.71.25 ', '6C:4B:90:50:01:76', NULL, NULL, 1, NULL, 1, '', NULL, NULL, NULL, '2020-11-26 18:39:07', NULL, 1),
(10, '', 1001, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.71.213', '  ', NULL, NULL, 1, NULL, 1, '', NULL, NULL, NULL, '2020-11-26 18:39:10', NULL, 1),
(11, '', 1006, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.62.26 ', 'B8:27:EB:AC:53:10', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, '2020-11-26 02:10:49', NULL, 1),
(12, '', 1006, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.62.28 ', 'B8:27:EB:5E:3B:D6', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, '2020-11-26 02:10:53', NULL, 1),
(13, '', 1006, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.62.29 ', 'B8:27:EB:68:55:17', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, '2020-11-26 02:12:34', NULL, 1),
(14, '', 1006, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.62.30 ', 'B8:27:EB:F8:D4:E7', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL, NULL, 1),
(15, '', 1006, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.62.31 ', 'B8:27:EB:2D:B6:9A', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL, NULL, 1),
(16, '', 1006, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.62.33 ', 'B8:27:EB:9D:57:3B', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL, NULL, 1),
(17, '', 1006, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.62.122', 'D0:27:88:91:5F:30', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, '2020-11-26 02:12:31', NULL, 1),
(18, '', 1006, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.62.34 ', '98:FA:9B:29:90:75', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL, NULL, 1),
(19, '', 1006, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.62.37 ', '  ', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL, NULL, 1),
(20, '', 1006, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.62.25 ', '6C:4B:90:67:9F:40', NULL, NULL, NULL, NULL, 6, '', NULL, NULL, NULL, NULL, NULL, 1),
(21, '', 1002, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.12.25 ', '6C:4B:90:4F:F9:12', NULL, NULL, NULL, NULL, 2, '', NULL, NULL, NULL, '2020-11-25 22:06:00', NULL, 1),
(22, '', 1002, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.12.35 ', '  ', NULL, NULL, NULL, NULL, 2, '', NULL, NULL, NULL, NULL, NULL, 1),
(23, 'XXXX', 1002, 4, ' RASPBERRY ', ' PI 4', 1, 1, 49, '', NULL, ' 192.168.12.29 ', 'B8:27:EB:8A:23:0F', '', NULL, NULL, NULL, 2, 'PISO 2', NULL, NULL, NULL, NULL, NULL, 1),
(24, 'XXXX', 1002, 4, ' RASPBERRY ', ' PI 4', 1, 1, 49, '', NULL, ' 192.168.12.28 ', 'B8:27:EB:AE:15:56', '', NULL, NULL, NULL, 2, ' TOMA DE MUESTRA ', NULL, NULL, NULL, NULL, NULL, 1),
(25, '', 1002, 4, '', '', 1, 1, 49, '', NULL, ' 192.168.12.100', 'B8:27:EB:63:99:84', NULL, NULL, NULL, NULL, 2, '', NULL, NULL, NULL, NULL, NULL, 1),
(26, 'XXXX', 1002, 4, ' RASPBERRY ', ' PI 4', 1, 1, 49, '', NULL, ' 192.168.12.101', 'B8:27:EB:63:DA:CD', '', NULL, NULL, NULL, 2, 'PISO 1', NULL, NULL, NULL, NULL, NULL, 1),
(27, 'XXXX', 1006, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', 1, 1, 49, '', NULL, ' 192.168.16.26 ', 'B8:27:EB:0E:1E:B4', '', NULL, NULL, NULL, 4, 'PISO ?', NULL, '', NULL, '2020-11-25 04:31:41', NULL, 1),
(28, 'XXXXXXXXXXXXXX', 1006, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', 1, 1, 49, '', NULL, ' 192.168.16.28 ', 'B8:27:EB:29:73:D3', '', NULL, NULL, NULL, 4, 'PISO ?', NULL, '', NULL, NULL, NULL, 1),
(29, '', 1006, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.16.25 ', 'FC:3F:DB:0A:D2:32', NULL, NULL, NULL, NULL, 4, '', NULL, NULL, NULL, NULL, NULL, 1),
(30, '', 1006, 2, '', '', 1, 1, 49, '', NULL, ' 192.168.16.30 ', '6C:4B:90:67:9F:6F', NULL, NULL, NULL, NULL, 4, '', NULL, NULL, NULL, NULL, NULL, 1),
(35, 'S1H03LKD', 1001, 1, 'LENOVO', 'THINKCENTRE ALL IN ONE', 5, 5, 41, 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', NULL, '192.168.71.75', '98-EE-CB-25-1F-C2', '465 562 426', 'Windows 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 18', NULL, NULL, NULL, '2020-10-31 11:35:28', NULL, 1),
(48, 'MJ06PZFW', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', NULL, '192.168.71.123', '6C-4B-90-EA-67', '791 415 611', 'Windows 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 02', NULL, NULL, NULL, '2020-10-31 11:51:17', NULL, 1),
(49, 'MJ06PZKJ', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', NULL, '192.168.71.162', '6C-4B-90-EA-67', '929 589 135', 'Windows 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 08', NULL, NULL, NULL, '2020-10-31 11:50:51', NULL, 1),
(50, 'MJ06PZHR', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', NULL, '192.168.71.67', '6C-4B-90-52-50', '694 961 071', 'Windows 10', 1, NULL, 1, 'CONSULTORIO 24', NULL, NULL, NULL, '2020-10-31 11:56:53', NULL, 1),
(51, 'MJ06PZFR', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 45, 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', NULL, '192.168.71.180', '6C-4B-90-52-4F', '421662546', 'Windows 10', 1, NULL, 1, 'CONSULTORIO 25', NULL, NULL, NULL, '2020-10-31 11:59:43', NULL, 1),
(116, ' PC0UF1HX ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio1 ', NULL, NULL, NULL, NULL, NULL, 1),
(117, 'PC0UF3CU', 1001, 1, 'LENOVO', 'V520S-08IKL', 8, 1, 45, 'QUADCORE INTEL CORE I5-7400, 2979 MHZ', NULL, '192.168.71.167', '6C-4B-90-61-EB-BB', '453 476 656', 'Windows 10', 1, NULL, 1, 'consultorio2', NULL, NULL, NULL, '2020-10-31 12:02:18', NULL, 1),
(118, ' PC0UF3CN ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio3 ', NULL, NULL, NULL, NULL, NULL, 1),
(119, ' PC0UF3P6 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio4 ', NULL, NULL, NULL, NULL, NULL, 1),
(120, ' PC0UF3P4 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio5 ', NULL, NULL, NULL, NULL, NULL, 1),
(121, ' MJ06PZGB ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio7 ', NULL, NULL, NULL, NULL, NULL, 1),
(122, ' MJ06PZJJ ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio8 ', NULL, NULL, NULL, NULL, NULL, 1),
(123, ' MJ06PZG8 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio9 ', NULL, NULL, NULL, NULL, NULL, 1),
(124, ' MJ06PZHH ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio10 ', NULL, NULL, NULL, NULL, NULL, 1),
(125, ' MJ06PZGT ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio11 ', NULL, NULL, NULL, NULL, NULL, 1),
(126, 'MJ06PZK1', 1001, 1, 'LENOVO', 'THINKCENTRE M710Q', 7, 1, 45, 'QuadCore Intel Core i5-7400T, 2400 MHz', NULL, '192.168.71.235', '6C-4B-90-52-4F-CE', '444 258 948', 'Windows 10', 1, NULL, 1, 'consultorio12', NULL, NULL, NULL, '2020-10-31 12:02:57', NULL, 1),
(127, ' MJ06PZFH ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio13 ', NULL, NULL, NULL, NULL, NULL, 1),
(128, ' MJ06PZFU ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio14 ', NULL, NULL, NULL, NULL, NULL, 1),
(129, ' MJ06PZGG ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio15 ', NULL, NULL, NULL, NULL, NULL, 1),
(130, ' MJ06PZJX ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio16 ', NULL, NULL, NULL, NULL, NULL, 1),
(131, ' MJ06PZEV ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio17 ', NULL, NULL, NULL, NULL, NULL, 1),
(132, ' MJ06PZKE ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio19 ', NULL, NULL, NULL, NULL, NULL, 1),
(133, ' MJ06PZEB ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio20 ', NULL, NULL, NULL, NULL, NULL, 1),
(134, ' MJ06PZKZ ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio21 ', NULL, NULL, NULL, NULL, NULL, 1),
(135, ' MJ06PZJR ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio23 ', NULL, NULL, NULL, NULL, NULL, 1),
(136, ' MJ06PZF8 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio27 ', NULL, NULL, NULL, NULL, NULL, 1),
(137, ' MJ06PZHB ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio28 ', NULL, NULL, NULL, NULL, NULL, 1),
(138, ' MJ06PZJG ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio29 ', NULL, NULL, NULL, NULL, NULL, 1),
(139, ' MJ06PZH6 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio30 ', NULL, NULL, NULL, NULL, NULL, 1),
(140, ' MJ06PZGS ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio31 ', NULL, NULL, NULL, NULL, NULL, 1),
(141, ' MJ06PZG2 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio32ELECTRO ', NULL, NULL, NULL, NULL, NULL, 1),
(142, ' MJ06PZKP ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio32CARDIOLOGIA ', NULL, NULL, NULL, NULL, NULL, 1),
(143, ' YL002MN3 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' consultorio33 ', NULL, NULL, NULL, NULL, NULL, 1),
(144, ' MJ06PZ6K ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo1 ', NULL, NULL, NULL, NULL, NULL, 1),
(145, ' MJ06PZH8 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo4 ', NULL, NULL, NULL, NULL, NULL, 1),
(146, ' MJ06PZJ9 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo5 ', NULL, NULL, NULL, NULL, NULL, 1),
(147, 'MJ06PZFN', 1001, 1, 'LENOVO', 'M710Q', 7, 1, 46, 'INTEL(R) CORE(TM) I5-7400T CPU @ 2.40GHZ, 2400 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', NULL, '192.168.71.150', '6C-4B-90-52-50-AD', '822 827 099', 'WINDOWS 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 6', NULL, NULL, NULL, '2020-11-14 07:18:17', NULL, 1),
(148, ' MJ06PZHJ ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo7 ', NULL, NULL, NULL, NULL, NULL, 1),
(149, ' MJ06PZK7 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo9 ', NULL, NULL, NULL, NULL, NULL, 1),
(150, ' MJ06PZH2 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo10 ', NULL, NULL, NULL, NULL, NULL, 1),
(151, 'MJ06PZL4', 1001, 1, 'LENOVO', 'THINKCENTRE M710Q', 7, 1, 45, 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE', NULL, '192.168.71.100', '6C-4B-90-52-50-84', '696 059 473', 'Windows 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 11', NULL, NULL, NULL, '2020-10-31 12:03:49', NULL, 1),
(154, ' MJ06PZF4 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo14 ', NULL, NULL, NULL, NULL, NULL, 1),
(155, ' MJ06PZHC ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo15 ', NULL, NULL, NULL, NULL, NULL, 1),
(156, ' MJ06PZGA ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo16 ', NULL, NULL, NULL, NULL, NULL, 1),
(157, ' MJ06PZHF ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo17 ', NULL, NULL, NULL, NULL, NULL, 1),
(158, ' PC0UF3Q7 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo23 ', NULL, NULL, NULL, NULL, NULL, 1),
(159, ' MJ06APXK ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' Modulo18 ', NULL, NULL, NULL, NULL, NULL, 1),
(160, '3CR52904FG', 1001, 1, 'HP', NULL, 1, 1, 41, 'PROCESADOR	INTEL(R) CELERON(R) CPU  J1800  @ 2.41GHZ, 2408 MHZ, 2 PROCESADORES PRINCIPALES, 2 PROCESADORES LÓGICOS', NULL, '192.168.71.38', '00-71-C2-0B-2C-23', '286 432 688', 'WINDOWS 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 1', NULL, NULL, NULL, '2020-11-10 07:27:11', NULL, 1),
(161, ' MJ07PZ6W ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' odontologia1 ', NULL, NULL, NULL, NULL, NULL, 1),
(162, ' MJ06PZGW ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' odontologia2 ', NULL, NULL, NULL, NULL, NULL, 1),
(163, ' YL002L9C ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' odontologia3 ', NULL, NULL, NULL, NULL, NULL, 1),
(164, ' PC0UAXPA ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' ECOGRAFIA ', NULL, NULL, NULL, NULL, NULL, 1),
(165, ' PC0UF3Z5 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' procedimiento ', NULL, NULL, NULL, NULL, NULL, 1),
(166, ' PC0UF3N4 ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' FISIO TERAPIA ', NULL, NULL, NULL, NULL, NULL, 1),
(167, ' MJ06PZHK ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' AUDITORIO ', NULL, NULL, NULL, NULL, NULL, 1),
(168, ' MJ06APWM ', 1001, 1, '', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, 1, NULL, 1, ' ATRIL ', NULL, NULL, NULL, NULL, NULL, 1),
(169, 'MJ00VAYE', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 7, 1, 39, 'INTEL(R) CORE(TM) I3-4130 CPU @ 3.40GHZ, 3400 MHZ, 2 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', NULL, '192.168.16.75', '44-8A-5B-75-39-36', '550 791 024', 'Windows 10', NULL, NULL, 4, 'LINEA DE FRENTE MODULO 3', NULL, NULL, NULL, '2020-11-25 21:01:02', NULL, 1),
(170, 'S1H02QGN', 1006, 1, 'LENOVO', 'THINKCENTRE E73Z', 6, 1, 41, 'DUALCORE INTEL CORE I3-4160, 3600 MHZ', NULL, '192.168.16.63', '98-EE-CB-15-12-FF', '278 779 528', 'Windows 10', NULL, NULL, 4, 'LINEA DE FRENTE MODULO 04 P2', NULL, NULL, NULL, '2020-10-31 12:06:00', NULL, 1),
(171, 'MJ00VAZ1', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 6, 1, 41, 'DUALCORE INTEL CORE I3-4130, 3400 MHZ', NULL, '192.168.16.60', '44-8A-5B-75-25-A9', '870 561 845', 'Windows 10', NULL, NULL, 4, 'LINEA DE FRENTE MODULO 05 P2', NULL, NULL, NULL, '2020-10-31 12:06:37', NULL, 1),
(172, 'MJ06APXK', 1001, 1, 'LENOVO', 'THINKCENTRE M710Q', 5, 1, 41, 'DUALCORE INTEL CORE I3-6100T, 3200 MHZ', NULL, '192.168.71.83', '6C-4B-90-34-35-2F', '405 296 429', 'Windows 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 13', NULL, NULL, NULL, '2020-10-31 12:08:30', NULL, 1),
(174, '', 1005, 4, ' RASPBERRY ', ' PI 4 ', 1, 1, 49, '', NULL, ' 192.168.12.20 ', 'DC:A6:32:3D:4A:EF', NULL, NULL, NULL, NULL, 5, ' PISO 1 SALA 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(175, '', 1005, 4, ' RASPBERRY ', ' PI 4 ', 1, 1, 49, '', NULL, ' 192.168.12.30 ', 'DC:A6:32:0D:B2:45', NULL, NULL, NULL, NULL, 5, ' PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(195, 'MJ06PZG9', 1001, 1, 'LENOVO', 'THINKCENTRE M710Q', 6, 1, 41, 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE', NULL, '192.168.71.127', '6C-4B-90-52-4F-E3', '186 636 320', 'Windows 10', 1, NULL, 1, 'LINEA DE FRENTE MODULO 12', NULL, NULL, NULL, '2020-10-31 12:09:31', NULL, 1),
(196, 'XXXXXXXXXXX', 1006, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', 1, 1, 49, '', NULL, '192.168.16.27', 'B8:27:EB:23:D6:2D', '', NULL, NULL, NULL, 4, 'PISO 1 ADMISIONES', NULL, '', NULL, NULL, NULL, 1),
(197, 'MJ00VAZ7', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 6, 1, 41, 'INTEL CORE I3-4130, 3400 MHZ DUALCORE', NULL, '192.168.16.74', '44-8A-5B-75-24-D7', '1 362 652', 'Windows 10', NULL, NULL, 4, 'CONSULTORIO 02 PISO 1', NULL, NULL, NULL, '2020-10-31 12:10:43', NULL, 1),
(198, 'MJ00VAYS', 1006, 1, 'LENOVO', 'THINKCENTRE M73', 6, 1, 41, 'DUALCORE INTEL CORE I3-4130, 3400 MHZ', NULL, '192.168.16.73', '44-8A-5B-75-16-C4', '4 898 537', 'Windows 10', NULL, NULL, 4, 'CONSULTORIO 04 PISO 1', NULL, NULL, NULL, '2020-10-31 12:10:09', NULL, 1),
(234, ' PCOUF40H ', 1002, 1, ' LENOVO ', ' V520S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 1 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(235, ' MXL83511F7 ', 1002, 1, ' HP COMPAQ ', '  ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 2 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(236, ' MJ06A4DR ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 3 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(237, ' 11S30002049001019CV3RZ ', 1002, 1, ' LENOVO ', ' H220 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 4 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(238, ' L3E224 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 5 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(239, ' PCOUF1F3 ', 1002, 1, ' LENOVO ', ' V520S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 6 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(240, ' 30089568998 ', 1002, 1, ' DELL ', ' OPTIPLEX 3020 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 7 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(241, ' MXL0351VYS ', 1002, 1, ' HP COMPAQ ', ' 5008 MT ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 8 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(242, ' L3E1350 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 9 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(243, ' L3E1102 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 10 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(244, ' L3E1124 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 11 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(245, ' L3E1100 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 12 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(246, ' L3E1159 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 13 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(247, ' MJ06LXHX ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 14 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(248, ' L3E1332 ', 1002, 1, ' LENOVO ', ' AD8 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO 15 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(249, ' CN04W34Y-70163 ', 1002, 1, ' DELL ', ' OPTIPLEX 3020 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 1 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(250, ' MJ018Y5C ', 1002, 1, ' LENOVO ', ' THINKCENTRE M73 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 2 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(251, ' MJ018Y5Y ', 1002, 1, ' LENOVO ', ' THINKCENTRE M73 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 3 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(252, ' 11S300020490010102434H ', 1002, 1, ' LENOVO ', ' LENOVO ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 4 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(253, ' MJGVCHX ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 6 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(254, ' MJ068TUL ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 7 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(255, ' MJ068TXF ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 7 AUX - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(256, ' YL005S3Z ', 1002, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 8 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(257, ' YL002MWF ', 1002, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 9 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(258, ' PCOUF40C ', 1002, 1, ' LENOVO ', ' V520S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' LINEA DE FRENTE MOD 10 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(259, ' MJ06PCU6 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' ATRIL TURNERO - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(260, ' MJ05J7T3 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' ATRIL LABORATORIO - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(261, ' 30070813286 ', 1002, 1, ' DELL ', ' OPTIPLEX 3020 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' SIAU - ATENCION AL USUARIO - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(262, ' CSO1879098 ', 1002, 1, ' LENOVO ', ' ALL IN ONE 10150 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' OFICINA ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(263, ' CSO1879177 ', 1002, 1, ' LENOVO ', ' ALL IN ONE 10151 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' OFICINA ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(264, ' MJ00M57H ', 1002, 1, ' LENOVO ', ' THINKCENTRE M73 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO DE VACUNACION - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(265, ' MXL4090ND5 ', 1002, 1, ' HP COMPAQ ', ' PRO SFF ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' CONSULTORIO DE PROCEDIMIENTOS - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(266, ' CNU0222RMH ', 1002, 3, ' HP ', ' HP420 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 2, ' OFICINA ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(267, ' MJ05J7UH ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 1 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(268, ' YL005RNN ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 2 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(269, ' YL005RMN ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 3 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(270, ' MJDVBYX ', 1005, 1, ' LENOVO ', ' THINKCENTRE M81 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 4 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(271, ' YL002L8E ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 5 - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(272, ' MJDVBZB ', 1005, 1, ' LENOVO ', ' THINKCENTRE M81 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 6 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(273, ' S1H03LHE ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 7 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(274, ' S1H01YDB ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 8 - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(275, ' MJ05HND ', 1005, 1, ' LENOVO ', ' THINKCENTRE M76E ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 9- PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(276, ' S1H03LJF ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CONSULTORIO 10- PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(277, ' VKC91160 ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO 1 MOD1   ', NULL, NULL, NULL, NULL, NULL, 1),
(278, ' MJ450GT ', 1005, 1, ' LENOVO ', ' THINKCENTRE M72E ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO 1 MOD2   ', NULL, NULL, NULL, NULL, NULL, 1),
(279, ' S5DMXYP ', 1005, 1, ' LENOVO ', ' THINCENTRE A70 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO 1  MOD3 ', NULL, NULL, NULL, NULL, NULL, 1),
(280, ' YL002M3A ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO  1 MOD4 IMAGENOLOGIA ', NULL, NULL, NULL, NULL, NULL, 1),
(281, ' YL002M80 ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' LINEA DE FRENTE - PISO  1 MOD5 ', NULL, NULL, NULL, NULL, NULL, 1),
(282, ' MJ06A4D9 ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', '541702311', NULL, NULL, NULL, 5, ' ATENCION AL USUARIO - PISO  1 SIAU ', NULL, NULL, NULL, NULL, NULL, 1),
(283, ' YL002M80 ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' FARMACIA CAJACOPI - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(284, ' MJGVHBV ', 1005, 1, ' LENOVO ', ' THINKCENTRE ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' FISIOTERAPIA - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(285, ' S1H03LH4 ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' ECOGRAFIA - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(286, ' MJ030DL3 ', 1005, 1, ' LENOVO ', ' WORKSTATION P300 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' RAYOS X - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(287, ' YL005RWM ', 1005, 1, ' LENOVO ', ' V530S ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' ODONTOLOGIA - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(288, ' MJGVHBG ', 1005, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' AUDITORIO - PISO 1 ', NULL, NULL, NULL, NULL, NULL, 1),
(289, ' MJ05UPRN ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' CIRUGIA - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(290, ' S1H01XNV ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' ADMINISTRACION - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(291, ' PB-0368K1 ', 1005, 3, ' LENOVO ', ' LAPTOP THINKPAD X240 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' OFICINA DIRECTOR - PISO 2 ', NULL, NULL, NULL, '2020-11-26 01:47:39', NULL, 1),
(292, ' S1H01YLW ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' IMAGENOLOGIA - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(293, ' PF-QFX396 ', 1005, 3, ' LENOVO ', ' LAPTOP THINKPAD E470 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' ENFERMERA - PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(294, ' PF-107PUT ', 1005, 3, ' LENOVO ', ' LAPTOP THINKPAD E470 ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' QUIMICO – PISO 2 ', NULL, NULL, NULL, NULL, NULL, 1),
(295, ' S1H02RRT ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL, NULL, 1),
(296, ' S1H02K65 ', 1005, 1, ' LENOVO ', ' ALL IN ONE E73Z ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL, NULL, 1),
(297, ' MJ06A4DR ', 1005, 1, ' LENOVO ', ' THINKCENTRE M710Q ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL, NULL, 1),
(298, ' MJGVKHX ', 1005, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL, NULL, 1),
(299, ' MJ00M576 ', 1005, 1, ' LENOVO ', ' THINKCENTRE M71E ', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 5, ' VIVA1A IPS - CALLE 30 ', NULL, NULL, NULL, NULL, NULL, 1),
(300, ' MJ04RYU3 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 4 ', NULL, NULL, NULL, '2020-11-26 02:11:05', NULL, 1),
(301, ' MJ04RYUJ ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 5 ', NULL, NULL, NULL, '2020-11-26 02:12:17', NULL, 1),
(302, ' PC0UF3CV ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 1 ', NULL, NULL, NULL, '2020-11-26 02:12:24', NULL, 1),
(303, ' PC035CCB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 1 imagenologia ', NULL, NULL, NULL, '2020-11-26 02:12:27', NULL, 1),
(304, ' PC0UHA5G ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' MODULO 2 imagenologia ', NULL, NULL, NULL, NULL, NULL, 1),
(305, ' PC0UF1K1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' TRANSCRIPCION DE RAYOS X ', NULL, NULL, NULL, NULL, NULL, 1),
(306, ' MJ030DKY ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' RAYOS X ', NULL, NULL, NULL, NULL, NULL, 1),
(307, ' MJ04RYVB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' FISIOTERAPIA ', NULL, NULL, NULL, NULL, NULL, 1),
(308, ' PF018APF ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' FISIOTERAPIA ', NULL, NULL, NULL, NULL, NULL, 1),
(309, ' 13589 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 101 ', NULL, NULL, NULL, NULL, NULL, 1),
(310, ' MJ05FCU9 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 102 ', NULL, NULL, NULL, NULL, NULL, 1),
(311, ' PC0UF3P7 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' MODULO SALA PAC ', NULL, NULL, NULL, NULL, NULL, 1),
(312, ' MJ04RYV1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' VACUNACION ', NULL, NULL, NULL, NULL, NULL, 1),
(313, ' PC0UF1ES ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 103 ', NULL, NULL, NULL, NULL, NULL, 1),
(314, ' MJ04RYUY ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CITOLOGIA ', NULL, NULL, NULL, NULL, NULL, 1),
(315, ' MJ05FCSD ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 104 ', NULL, NULL, NULL, NULL, NULL, 1),
(316, ' MJ05FCS8 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 105 ', NULL, NULL, NULL, NULL, NULL, 1),
(317, ' MJ05FCT4 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 106 ', NULL, NULL, NULL, NULL, NULL, 1),
(318, ' MJ002T6L ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' CONSULTORIO 107 ', NULL, NULL, NULL, NULL, NULL, 1),
(319, ' MJ04RYUF ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 200 ', NULL, NULL, NULL, NULL, NULL, 1),
(320, ' MJ04RYUH ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 201 ', NULL, NULL, NULL, NULL, NULL, 1),
(321, ' YL002MUB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 202 ', NULL, NULL, NULL, NULL, NULL, 1),
(322, ' YL002N49 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 203 ', NULL, NULL, NULL, NULL, NULL, 1),
(323, ' PC035CBF ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 204 ', NULL, NULL, NULL, NULL, NULL, 1),
(324, ' PC035CD0 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 205 ', NULL, NULL, NULL, NULL, NULL, 1),
(325, ' MJ04RYU8 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 206 ', NULL, NULL, NULL, NULL, NULL, 1),
(326, ' MJ04RYV4 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 207 ', NULL, NULL, NULL, NULL, NULL, 1),
(327, ' MJ04RYU5 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 208 ', NULL, NULL, NULL, NULL, NULL, 1),
(328, ' MX2292NW ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 209 ', NULL, NULL, NULL, NULL, NULL, 1),
(329, ' YL002MQ3 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 210 ', NULL, NULL, NULL, NULL, NULL, 1),
(330, ' PCOUF1EW ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 211 ', NULL, NULL, NULL, NULL, NULL, 1),
(331, ' PCOUF3CW ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 212 ', NULL, NULL, NULL, NULL, NULL, 1),
(332, ' PCOUF3PB ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio 213 ', NULL, NULL, NULL, NULL, NULL, 1),
(333, ' PCO38V6 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  1 ', NULL, NULL, NULL, NULL, NULL, 1),
(334, ' PCO35CBH ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  2 ', NULL, NULL, NULL, NULL, NULL, 1),
(335, ' PCO338X1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  3 ', NULL, NULL, NULL, NULL, NULL, 1),
(336, ' MJ018Y6K ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  4 ', NULL, NULL, NULL, NULL, NULL, 1),
(337, ' MJ05FCTC ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  5 ', NULL, NULL, NULL, NULL, NULL, 1),
(338, ' MJ04RYU2 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' odontologia  ', NULL, NULL, NULL, NULL, NULL, 1),
(339, ' REGISTRADO SIN SERIAL ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio300 ', NULL, NULL, NULL, NULL, NULL, 1),
(340, ' YL002MJ1 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio301 ', NULL, NULL, NULL, NULL, NULL, 1),
(341, ' REGISTRADO SIN SERIAL ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio302 ', NULL, NULL, NULL, NULL, NULL, 1),
(342, ' YL002MU9 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio303 ', NULL, NULL, NULL, NULL, NULL, 1),
(343, ' YL002MHT ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio304 ', NULL, NULL, NULL, NULL, NULL, 1),
(344, ' YL002MJ7 ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio305 ', NULL, NULL, NULL, NULL, NULL, 1),
(345, ' YL002M7Q ', 1006, 1, ' LENOVO ', '', 1, 1, 49, '', NULL, '', '', NULL, NULL, NULL, NULL, 6, ' consultorio306 ', NULL, NULL, NULL, NULL, NULL, 1),
(346, 'NO REGISTRA', NULL, 1, 'LENOVO', NULL, 6, 1, 41, 'INTEL(R) CORE(TM) I3-4130 CPU @ 3.40GHZ, 3400 MHZ, 2 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', NULL, '192.168.16.113', '44-8A-5B-75-2B-59', '9 555 153', NULL, NULL, NULL, 4, 'AUDITORIO', NULL, NULL, '2020-10-31 12:16:55', '2020-10-31 12:16:55', NULL, 1),
(347, 'PF1X8VQW', NULL, 3, 'LENOVO', 'THINKPAD E495', 11, 1, 46, 'AMD RYZEN 5 3500U WITH RADEON VEGA MOBILE GFX', NULL, '192.168.71.114', 'F8:75:A4:91:7B:1F', NULL, NULL, NULL, NULL, 1, 'OFICINA DIRECCIÓN MEDICA', NULL, 'PORTATIL C.MEDICO\r\nV1AMAC-DMEDJM', '2020-11-04 10:48:20', '2020-11-27 04:21:14', NULL, 1),
(348, 'Quod consectetur est.', NULL, 1, 'Libero ducimus, opti.', 'In sit eaque aliquip.', 4, 9, 46, 'Rerum odit consectet.', NULL, '192.168.71.240', 'R5:H8:0Y:K9:O9', 'Sunt.', 'Quos consequatur aut.', 1, NULL, NULL, 'Ut pariatur. Labore.', NULL, NULL, '2020-11-26 04:09:45', '2020-11-27 05:48:23', NULL, 1),
(363, 'Sint.', NULL, 3, 'Itaque rerum non ull.', 'Fugiat, voluptatibus.', 1, 14, 46, 'Sequi minima omnis u.', NULL, '192.168.200.122', '98-EE-CB-25-1F-C2', 'Veritatis nulla eu b.', 'Dolore elit, cupidit.', 2, NULL, 1, 'Ratione ad reiciendi.', NULL, 'A consequat. Libero .', '2020-11-27 04:33:06', '2020-11-27 04:33:22', '2020-11-27 04:33:22', 0),
(364, 'Aut dolor laborum do.', NULL, 1, 'Fuga. Vitae pariatur.', 'Atque deleniti venia.', 10, 13, 34, 'Enim consectetur, al.', NULL, '192.168.12.100', 'R5:H8:0Y:K9:O9', 'Odit quos.', 'Exercitationem quia .', 1, NULL, NULL, 'Esse consequat. Qui .', NULL, NULL, '2020-11-27 05:46:31', '2020-11-27 05:47:44', NULL, 1),
(365, 'Excepturi deserunt c.', NULL, 1, 'Hic id aut.', 'Nobis aliquam sed du.', 4, 15, 44, 'Mollitia dicta accus.', NULL, '192.168.200.222', 'R5:H8:0Y:K9:O9', 'Exercitation dolore .', 'Est, enim quas provi.', 1, NULL, 1, 'Consequatur? Quia in.', NULL, 'Saepe excepteur id.', '2020-11-27 05:50:59', '2020-11-27 05:50:59', NULL, 1),
(366, 'Accusamus provident.', NULL, 3, 'Cumque est amet, omn.', 'Anim reiciendis aspe.', 16, 7, 41, 'Quia quidem unde id .', NULL, '192.168.71.240', 'B8:27:EB:5F:60', 'Eaque voluptate cons.', 'Voluptates vitae.', 1, NULL, 14, 'Porro laboris aut qu.', NULL, 'Quod quo saepe ut.', '2020-11-27 05:53:53', '2020-11-27 05:53:53', NULL, 1),
(367, 'Id, consequat. Fugia.', NULL, 2, 'Officia in quia itaq.', 'Dolores quia quo ex .', 7, 11, 47, 'Sed totam porro quae.', NULL, '192.168.12.100', '98-EE-CB-25-1F-C2', 'Non est voluptatum e.', 'Ut corrupti, officia.', 1, NULL, 17, 'Et nostrud rerum.', NULL, NULL, '2020-11-27 05:59:40', '2020-12-02 02:34:30', NULL, 1),
(368, 'Velit cum et in fugi.', NULL, 1, 'Quia ut numquam duci.', 'Ullam ut repudiandae.', 7, 7, 37, 'Voluptas porro sint .', NULL, '192.168.200.122', 'B8:27:EB:63:DA', 'Sit, cumque fugit, i.', 'Doloremque.', 1, NULL, 13, 'Voluptatem. Cupidita.', NULL, NULL, '2020-11-27 06:08:35', '2020-11-27 06:13:54', '2020-11-27 06:13:54', 0),
(369, 'Tenetur illo ducimus.', NULL, 4, 'Ut labore illo iusto.', 'Officiis odit sed el.', 5, 3, 42, 'Maiores quo anim ill.', 'V1AMAC-EXAMPLE', '192.168.200.474', 'R5:H8:0Y:K9:O9', 'Pariatur. Distinctio.', 'Earum numquam omnis .', 1, NULL, 16, 'Deserunt nisi minima.', NULL, NULL, '2020-11-27 17:41:12', '2020-12-02 00:47:28', NULL, 1),
(370, 'Ut sit, beatae duis .', NULL, 1, 'Fugiat, saepe est es.', 'Consectetur, laudant.', 2, 12, 37, 'Ullamco libero labor.', NULL, '192.168.200.222', '98-EE-CB-25-1F-C2', 'Velit laborum quis e.', 'Optio, quos eveniet.', 1, NULL, 13, 'Dolores aut nihil en.', NULL, NULL, '2020-11-27 17:41:25', '2020-11-27 17:41:59', '2020-11-27 17:41:59', 0),
(371, 'Eius lorem voluptate.', NULL, 3, 'At.', 'Iste ut ut adipisci .', 15, 5, 43, 'Debitis beatae molli.', 'V1AMAC-EXAMPLE', '192.168.12.111', '98-EE-CB-25-1F-J9', 'Est, ullam consequat.', 'Rerum harum id nostr.', 1, NULL, 6, 'Repellendus. Dolore .', NULL, NULL, '2020-11-27 17:55:06', '2020-11-27 20:45:06', NULL, 1),
(372, 'Qui beatae reiciendi.', NULL, 4, 'Tempor molestias exe.', 'Sapiente similique d.', 2, 9, 45, 'Numquam est quos ea.', NULL, '192.168.71.136', '98-EE-CB-25-1F-J7', 'Rerum officia.', 'Ullamco dignissimos .', 1, NULL, 14, 'Cupiditate nemo offi.', NULL, 'Aut qui cumque omnis.', '2020-11-27 17:59:51', '2020-11-27 18:13:43', '2020-11-27 18:13:43', 0),
(373, 'Repellendus. Volupta.', NULL, 4, 'Expedita quidem eius.', 'Dicta laborum aut ma.', 2, 7, 48, 'Praesentium quis mol.', NULL, '192.168.78.215', '98-EE-CB-25-1F-L0', 'Et qui.', 'Culpa, tenetur in pl.', 1, NULL, 10, 'Commodi ipsam cupidi.', NULL, 'Atque nihil fuga. Ut.', '2020-11-27 18:03:30', '2020-11-27 18:13:39', '2020-11-27 18:13:39', 0),
(374, 'Exercitation aut Nam.', NULL, 1, 'Nihil consequatur? O.', 'Labore nihil.', 1, 1, 42, 'Saepe ad placeat, vo.', NULL, '192.168.15.35', '98-EE-CB-25-1F-K8', 'Dolore molestiae eu .', 'Iusto consequuntur q.', 1, NULL, 2, 'Voluptatem, eveniet.', NULL, 'Ab aliquid enim odio.', '2020-11-27 18:06:33', '2020-11-27 18:13:34', '2020-11-27 18:13:34', 0),
(375, 'Mollit ipsum eaque s.', NULL, 1, 'Voluptatum id volupt.', 'Accusamus illo ex la.', 7, 6, 34, 'Iure.', NULL, '192.168.74.145', '98-EE-CB-25-1F-O7', 'Do.', 'Laborum. Voluptas ad.', 1, NULL, 1, 'Vel voluptatem. Eos.', NULL, 'Molestias eaque maxi.', '2020-11-27 18:09:19', '2020-11-27 18:13:26', '2020-11-27 18:13:26', 0),
(376, 'Sit aliquip eaque be.', NULL, 4, 'Irure animi, accusam.', 'Delectus, est dolore.', 12, 14, 35, 'Similique.', 'CULPA, SED REFGHFGH', '192.168.47.25', '98-EE-CB-25-1F-P8', 'Iste aperiam quos Na.', 'Consequat. Lorem dol.', 1, NULL, 1, 'Aut est obcaecati qu.', NULL, 'Mollit adipisci.', '2020-11-27 18:13:10', '2020-11-27 18:13:22', '2020-11-27 18:13:22', 0),
(377, 'Esse vero labore omn.', NULL, 1, 'Aute veniam, nihil v.', 'Qui aut id molestias.', 10, 5, 35, 'Ea quis.', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Ut illo ipsum mollit.', 'Duis voluptas libero.', 1, NULL, 16, 'Consequuntur incidun.', NULL, 'Est, incidunt, qui e.', '2020-12-02 00:01:24', '2020-12-02 00:01:24', NULL, 1),
(378, 'Et delectus, ipsa, e.', NULL, 4, 'Quae fuga. Proident.', 'Accusantium consecte.', 8, 1, 32, 'Reprehenderit ab cor.', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Omnis explicabo. Rep.', 'Fuga. A ut ipsa, dol.', 1, NULL, 16, 'Consectetur quo eum .', NULL, 'Ea adipisci facilis .', '2020-12-02 00:03:09', '2020-12-02 00:05:08', '2020-12-02 00:05:08', 0),
(379, 'Quaerat.', NULL, 4, 'Incididunt expedita .', 'Labore distinctio. N.', 11, 15, 36, 'Est nihil rem asperi.', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Fugiat Nam voluptate.', 'In ipsum nihil id et.', 1, NULL, 16, 'Ipsum quia alias tem.', NULL, 'Amet, duis in conseq.', '2020-12-02 00:04:56', '2020-12-02 00:05:05', '2020-12-02 00:05:05', 0),
(380, 'Quis.', NULL, 2, 'Dignissimos dicta qu.', 'Enim consequuntur in.', 50, 2, 46, 'Obcaecati quas repre.', 'V1AMAC-EXAMPLE', '192.168.200.158', '98-EE-CB-25-1F-C2', 'Consectetur, nemo mo.', 'Praesentium reprehen.', 4, NULL, 15, 'Ducimus.', NULL, NULL, '2020-12-02 00:49:08', '2020-12-02 01:46:07', '2020-12-02 01:46:07', 0),
(381, 'Et eligendi dolor ve.', NULL, 3, 'Voluptas est rerum a.', 'Enim laborum. A ut s.', 12, 4, 49, 'Recusandae. Nam comm.', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Ea mollitia aut aliq.', 'Natus dolorum.', 4, NULL, 16, 'Quia ut dolore corru.', NULL, 'Reprehenderit blandi.', '2020-12-02 00:53:17', '2020-12-02 00:53:17', NULL, 1),
(382, 'Culpa voluptatem vel.', NULL, 3, 'Esse porro id quisqu.', 'Commodo architecto e.', 12, 10, 49, 'Cupidatat do suscipi.', 'V1AMAC-EXAMPLE', '192.168.200.13', '98-EE-CB-25-1F-C2', 'Dolor quibusdam aspe.', 'Facere vel nihil ea .', 1, NULL, 17, 'Dolore et laborum.', NULL, NULL, '2020-12-02 01:30:50', '2020-12-02 02:32:06', NULL, 1),
(383, 'Enim velit quo rerum.', NULL, 3, 'Aliqua. Eiusmod aute.', 'Corporis exercitatio.', 10, 8, 36, 'Accusamus odio unde .', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Incidunt, repudianda.', 'Laboris consectetur .', 1, NULL, 17, 'Fugiat fugit, sit, d.', NULL, NULL, '2020-12-02 01:44:29', '2020-12-02 02:20:29', NULL, 1),
(384, 'Temporibus dicta arc.', NULL, 1, 'Sint modi consequunt.', 'Explicabo. Est quasi.', 8, 15, 32, 'Eos dolorum.', 'V1AMAC-EXAMPLE', '192.168.71.240', '98-EE-CB-25-1F-C2', 'Quia illo veritatis .', 'Omnis pariatur? Cum .', 4, NULL, 15, 'Voluptates veritatis.', NULL, NULL, '2020-12-02 01:50:09', '2020-12-02 01:50:25', '2020-12-02 01:50:25', 0),
(385, 'Est.', NULL, 1, 'Quis tenetur quia id.', 'Vitae sint nostrud m.', 11, 9, 38, 'Et ullamco nostrum c.', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Quae error incidunt.', 'Cum nisi sunt rem et.', 1, NULL, 17, 'Elit, corporis qui n.', NULL, NULL, '2020-12-02 02:25:53', '2020-12-02 02:33:18', NULL, 1),
(386, 'Reiciendis laborum d.', NULL, 2, 'Doloremque dolor rem.', 'Vero sequi iste offi.', 14, 16, 41, 'Quo sed commodo volu.', 'V1AMAC-EXAMPLE', '192.168.200.222', '98-EE-CB-25-1F-C2', 'Elit, molestiae dolo.', 'Excepteur libero in .', 1, NULL, 17, 'Commodo totam maiore.', NULL, 'Esse mollitia vel so.', '2020-12-02 02:30:11', '2020-12-02 02:35:54', '2020-12-02 02:35:54', 0),
(387, 'Voluptas est.', NULL, 4, 'Reprehenderit anim d.', 'Ab nostrud deserunt .', 8, 9, 31, 'Pariatur. Maxime com.', 'V1AMAC-EXAMPLE', '192.168.200.122', '98-EE-CB-25-1F-C2', 'Amet, adipisci molli.', 'Omnis doloribus inci.', 1, NULL, 17, 'Sequi vel saepe sapi.', NULL, NULL, '2020-12-02 02:31:16', '2020-12-02 02:33:28', '2020-12-02 02:33:28', 0),
(388, 'Dolorem enim.', NULL, 1, 'Porro commodi dolori.', 'Error unde cumque ni.', 4, 4, 40, 'Eiusmod eiusmod culp.', 'V1AMAC-EXAMPLE', '192.168.12.100', '98-EE-CB-25-1F-C2', 'Esse.', 'Vitae ipsa, perspici.', 4, NULL, 17, 'Eiusmod consectetur .', NULL, 'Deserunt incididunt .', '2020-12-02 02:35:44', '2020-12-02 02:35:44', NULL, 1);

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
(20, '2GB DDR3 SO-DIMM', NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2GB DDR2 DIMM', NULL, NULL, NULL, NULL, NULL, NULL);

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
(3, 'TEC_MAC', '2020-11-23 07:57:44', '2020-11-23 07:57:44'),
(4, 'TEC_KNY', '2020-11-23 10:22:55', '2020-11-23 10:22:55'),
(5, 'TEC_C12', '2020-11-24 05:29:30', '2020-11-24 05:29:30'),
(6, 'TEC_MAR', '2020-11-24 05:29:41', '2020-11-24 05:29:41'),
(7, 'TEC_CNG', '2020-11-24 05:30:05', '2020-11-24 05:30:05'),
(8, 'TEC_VDP', '2020-11-24 05:30:31', '2020-11-24 05:30:31'),
(9, 'TEC_RIO', '2020-11-24 05:30:43', '2020-11-24 05:30:43');

UPDATE machines SET created_at='2020-09-01 11:07:32' WHERE created_at IS NULL

SELECT id,created_at FROM machines

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
(11, 1, 1, '2020-11-24 03:34:15', '2020-11-25 04:39:37'),
(15, 3, 4, '2020-11-25 03:59:49', '2020-11-25 03:59:49'),
(24, 4, 6, '2020-11-25 00:19:28', '2020-11-25 00:19:28'),
(25, 4, 9, '2020-11-25 00:20:12', '2020-11-25 00:20:12'),
(26, 4, 8, '2020-11-25 00:20:12', '2020-11-25 00:20:12'),
(27, 4, 7, '2020-11-25 00:48:16', '2020-11-25 00:48:16'),
(28, 2, 3, '2020-11-25 00:52:02', '2020-11-25 00:52:02'),
(29, 4, 5, '2020-11-27 20:52:23', '2020-11-27 20:52:23');

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
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `work_function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `last_sign_in_at` timestamp NULL DEFAULT NULL,
  `current_sign_in_at` timestamp NULL DEFAULT NULL,
  `status_online` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cc`, `name`, `last_name`, `nick_name`, `password`, `phone`, `campus_id`, `role_id`, `work_function`, `email`, `email_verified_at`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `status`, `last_sign_in_at`, `current_sign_in_at`, `status_online`) VALUES
(1, 1120200891, 'SUPER', 'ADMIN', 'SUPER_ADMIN', '$2y$10$LzQE2zt0eKQHwXrnGNfy2uUTW0Aw4aChUjKmoIv45jzde2mheg4wu', '3002777694', 1, 0, 'Administrator Database', 'admin@inventor.co', NULL, 'boss.svg', NULL, '2020-11-24 03:33:56', '2020-12-02 01:37:18', NULL, 1, '2020-12-02 01:37:15', '2020-12-02 01:37:18', 1),
(2, 1143434718, 'JEFFERSON JAVIER', 'ORTEGA PACHECO', 'JORTEGA', '$2y$10$JfW3a/AgCsfuS99VF4E/i.h3FgMcBkAZNUImVHOBWV22jSCKUivZC', '3002777694', 1, NULL, 'Support IT', 'jortega@viva1a.com.co', NULL, 'boss.svg', NULL, '2020-11-25 08:34:58', '2020-12-01 23:29:40', NULL, 1, '2020-12-01 23:27:23', '2020-12-01 23:29:40', 1),
(3, 1111111111, 'LUIS', 'GUTIERREZ', 'LGUTIERREZ', '$2y$10$mLoEi7/zv08jvnfV/yySC.K9e3AFx5j5W6JRsqu6GR6IWlIIhjXg6', '304214715', 12, 0, 'Support IT', 'lgutierrez@viva1a.com.co', NULL, 'boss.svg', NULL, '2020-11-21 09:57:39', '2020-11-25 20:50:58', NULL, 1, '2020-11-28 23:38:34', '2020-11-28 23:38:39', 0),
(4, 84455338, 'OSCAR', 'LARIOS', 'OLARIOS', '$2y$10$c1Un8VTxJf0PIrFSm09pIOWKbAlDOgNIzvvmVHhJpLGD/OAOA7DqO', '300255653', 13, NULL, 'Support IT', 'olarios@viva1a.com.co', NULL, 'boss.svg', NULL, '2020-11-24 08:48:19', '2020-12-02 02:36:02', NULL, 1, '2020-12-02 02:36:02', '2020-12-02 02:34:02', 0),
(17, 1141518954, 'Corrupti, ut molliti.', 'In nostrud atque inv.', 'Qui doloribus ut des.', '$2y$10$zsB0sSZBEFC3XL0ub.k/Ceg4/DpPD.Y5YEEe4A.4ikl/3QrIStsPG', '300-277-6944', 15, NULL, 'Network Administrator', 'kurodo@mailinator.com', NULL, NULL, NULL, '2020-11-29 02:49:02', '2020-11-29 02:49:35', '2020-11-29 02:49:35', 0, NULL, NULL, NULL);

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
  ADD KEY `role_id` (`role_id`),
  ADD KEY `id_campus_campus_id_foreing` (`campus_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles_alt`
--
ALTER TABLE `roles_alt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `machines_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `machines_hard_drive_id_foreign` FOREIGN KEY (`hard_drive_id`) REFERENCES `hdds` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `machines_ram_slot_00_id_foreign` FOREIGN KEY (`ram_slot_00_id`) REFERENCES `rams` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `machines_ram_slot_01_id_foreign` FOREIGN KEY (`ram_slot_01_id`) REFERENCES `rams` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `machines_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `role_user` (`role_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `machines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

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

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_campus_campus_id_foreing` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
