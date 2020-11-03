-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2020 a las 21:26:54
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `campu_name`, `created_at`, `updated_at`) VALUES
(1, 'VIVA 1A IPS MACARENA', '2020-10-09 17:30:50', '2020-10-09 17:30:50'),
(2, 'VIVA 1A IPS CALLE 30', NULL, NULL),
(4, 'VIVA 1A IPS CARRERA 16', '2020-10-03 16:05:49', '2020-10-03 16:05:49'),
(5, 'VIVA 1A IPS SOLEDAD', '2020-10-03 16:05:57', '2020-10-03 16:05:57'),
(6, 'VIVA 1A IPS SURA SAN JOSE', '2020-10-03 16:06:12', '2020-10-03 16:06:12'),
(8, 'VIVA 1A IPS SURA 85', '2020-10-04 11:35:14', '2020-10-04 11:35:14');

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
  `id` bigint(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hdds`
--

INSERT INTO `hdds` (`id`,`size`, `type`, `created_at`, `updated_at`) VALUES
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
(48, '2 TB', 'Portatil', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` smallint(6) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram_slot_00_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ram_slot_01_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hard_drive` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_range` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anydesk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campus_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `machines`
--

INSERT INTO `machines` (`id`, `serial`, `lote`, `type_id`, `manufacturer`, `model`, `ram_slot_00_id`, `ram_slot_01_id`, `hard_drive`, `cpu`, `ip_range`, `mac_address`, `anydesk`, `os`, `campus_id`, `location`, `image`, `comment`, `created_at`, `updated_at`) VALUES
(1, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.26 ', 'B8:27:EB:71:97:71', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(2, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.27 ', 'B8:27:EB:39:0C:5C', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(3, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.28 ', 'B8:27:EB:5F:59:D3', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(4, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.29 ', 'B8:27:EB:3E:16:A7', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(5, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.80 ', 'B8:27:EB:7B:FA:B3', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(6, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.81 ', 'B8:27:EB:7F:5C:23', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(7, '', 9999, 4, '', '', NULL, NULL, '', '', ' 192.168.71.64 ', '  ', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(8, '', 9999, 2, '', '', NULL, NULL, '120 GB', 'Mobile DualCore Intel Core i5-3230M, 2600 MHz', ' 192.168.71.24', '00-0E-C4-D0-0B-6C', '939224578', NULL, 1, 'ENTRADA', NULL, 'Microsoft Windows 10 Enterprise 2016 LTSB\r\nV1AMAC-ATRIL01', NULL, NULL),
(9, '', 9999, 2, '', '', NULL, NULL, '', '', ' 192.168.71.25 ', '6C:4B:90:50:01:76', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(10, '', 9999, 2, '', '', NULL, NULL, '', '', ' 192.168.71.213', '  ', NULL, NULL, 1, '', NULL, NULL, NULL, NULL),
(35, 'S1H03LKD', 0, 1, 'LENOVO              ', 'THINKCENTRE ALL IN ONE', NULL, NULL, '500GB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.71.240', '98-EE-CB-25-1F-C2', '465 562 426', NULL, 1, 'OFICINA DE SISTEMAS ', NULL, 'EQUIPO DE TECNICO DE SISTEMAS', NULL, NULL),
(48, 'MJ06PZFW', 0, 1, 'LENOVO', 'M710Q', NULL, NULL, '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.123', '6C-4B-90-EA-67', '791 415 611', NULL, 1, 'LINEA DE FRENTE MODULO 02', NULL, '', NULL, NULL),
(49, 'MJ06PZKJ', 0, 1, 'LENOVO', 'M710Q', NULL, NULL, '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.162', '6C-4B-90-EA-67', '929 589 135', NULL, 1, 'LINEA DE FRENTE MODULO 08', NULL, '', NULL, NULL),
(50, 'MJ06PZHR', 0, 1, 'LENOVO', 'M710Q', NULL, NULL, '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.67', '6C-4B-90-52-50', '694 961 071', NULL, 1, 'CONSULTORIO 24', NULL, '', NULL, NULL),
(51, 'MJ06PZFR', 0, 1, 'LENOVO', 'M710Q', NULL, NULL, '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.180', '6C-4B-90-52-4F', '421662546', NULL, 1, 'CONSULTORIO 25', NULL, '', NULL, NULL),
(116, ' PC0UF1HX ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio1 ', NULL, NULL, NULL, NULL),
(117, 'PC0UF3CU ', 1000, 1, 'LENOVO', 'V520S-08IKL', NULL, NULL, '1TB', 'QUADCORE INTEL CORE I5-7400, 2979 MHZ', '192.168.71.167', '6C-4B-90-61-EB-BB', '453 476 656', NULL, 1, ' consultorio2 ', NULL, '', NULL, NULL),
(118, ' PC0UF3CN ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio3 ', NULL, NULL, NULL, NULL),
(119, ' PC0UF3P6 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio4 ', NULL, NULL, NULL, NULL),
(120, ' PC0UF3P4 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio5 ', NULL, NULL, NULL, NULL),
(121, ' MJ06PZGB ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio7 ', NULL, NULL, NULL, NULL),
(122, ' MJ06PZJJ ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio8 ', NULL, NULL, NULL, NULL),
(123, ' MJ06PZG8 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio9 ', NULL, NULL, NULL, NULL),
(124, ' MJ06PZHH ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio10 ', NULL, NULL, NULL, NULL),
(125, ' MJ06PZGT ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio11 ', NULL, NULL, NULL, NULL),
(126, ' MJ06PZK1 ', 1000, 1, 'LENOVO', 'THINKCENTRE M710Q', NULL, NULL, '1TB', 'QuadCore Intel Core i5-7400T, 2400 MHz', '192.168.71.235', '6C-4B-90-52-4F-CE', '444 258 948', NULL, 1, ' consultorio12 ', NULL, 'Microsoft Windows 10 Pro', NULL, NULL),
(127, ' MJ06PZFH ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio13 ', NULL, NULL, NULL, NULL),
(128, ' MJ06PZFU ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio14 ', NULL, NULL, NULL, NULL),
(129, ' MJ06PZGG ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio15 ', NULL, NULL, NULL, NULL),
(130, ' MJ06PZJX ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio16 ', NULL, NULL, NULL, NULL),
(131, ' MJ06PZEV ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio17 ', NULL, NULL, NULL, NULL),
(132, ' MJ06PZKE ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio19 ', NULL, NULL, NULL, NULL),
(133, ' MJ06PZEB ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio20 ', NULL, NULL, NULL, NULL),
(134, ' MJ06PZKZ ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio21 ', NULL, NULL, NULL, NULL),
(135, ' MJ06PZJR ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio23 ', NULL, NULL, NULL, NULL),
(136, ' MJ06PZF8 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio27 ', NULL, NULL, NULL, NULL),
(137, ' MJ06PZHB ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio28 ', NULL, NULL, NULL, NULL),
(138, ' MJ06PZJG ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio29 ', NULL, NULL, NULL, NULL),
(139, ' MJ06PZH6 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio30 ', NULL, NULL, NULL, NULL),
(140, ' MJ06PZGS ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio31 ', NULL, NULL, NULL, NULL),
(141, ' MJ06PZG2 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio32ELECTRO ', NULL, NULL, NULL, NULL),
(142, ' MJ06PZKP ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio32CARDIOLOGIA ', NULL, NULL, NULL, NULL),
(143, ' YL002MN3 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' consultorio33 ', NULL, NULL, NULL, NULL),
(144, ' MJ06PZ6K ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo1 ', NULL, NULL, NULL, NULL),
(145, ' MJ06PZH8 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo4 ', NULL, NULL, NULL, NULL),
(146, ' MJ06PZJ9 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo5 ', NULL, NULL, NULL, NULL),
(147, ' MJ06PZFN ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo6 ', NULL, NULL, NULL, NULL),
(148, ' MJ06PZHJ ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo7 ', NULL, NULL, NULL, NULL),
(149, ' MJ06PZK7 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo9 ', NULL, NULL, NULL, NULL),
(150, ' MJ06PZH2 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo10 ', NULL, NULL, NULL, NULL),
(151, 'MJ06PZL4 ', 1000, 1, 'LENOVO', 'THINKCENTRE M710Q', NULL, NULL, '1TB', 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE ', '192.168.71.100', '6C-4B-90-52-50-84', '696 059 473', NULL, 1, 'LINEA DE FRENTE MODULO 11 ', NULL, 'Microsoft Windows 10 Pro\r\nV1AMAC-LF11\r\n', NULL, NULL),
(154, ' MJ06PZF4 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo14 ', NULL, NULL, NULL, NULL),
(155, ' MJ06PZHC ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo15 ', NULL, NULL, NULL, NULL),
(156, ' MJ06PZGA ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo16 ', NULL, NULL, NULL, NULL),
(157, ' MJ06PZHF ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo17 ', NULL, NULL, NULL, NULL),
(158, ' PC0UF3Q7 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo23 ', NULL, NULL, NULL, NULL),
(159, ' MJ06APXK ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo18 ', NULL, NULL, NULL, NULL),
(160, ' 3CR52904FG ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' Modulo2 ', NULL, NULL, NULL, NULL),
(161, ' MJ07PZ6W ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' odontologia1 ', NULL, NULL, NULL, NULL),
(162, ' MJ06PZGW ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' odontologia2 ', NULL, NULL, NULL, NULL),
(163, ' YL002L9C ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' odontologia3 ', NULL, NULL, NULL, NULL),
(164, ' PC0UAXPA ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' ECOGRAFIA ', NULL, NULL, NULL, NULL),
(165, ' PC0UF3Z5 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' procedimiento ', NULL, NULL, NULL, NULL),
(166, ' PC0UF3N4 ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' FISIO TERAPIA ', NULL, NULL, NULL, NULL),
(167, ' MJ06PZHK ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' AUDITORIO ', NULL, NULL, NULL, NULL),
(168, ' MJ06APWM ', 1000, 1, '', '', NULL, NULL, '', '', '', '', NULL, NULL, 1, ' ATRIL ', NULL, NULL, NULL, NULL),
(172, 'MJ06APXK', 0, 1, 'LENOVO', 'THINKCENTRE M710Q', 1, 1, '500GB', 'DUALCORE INTEL CORE I3-6100T, 3200 MHZ', '192.168.71.83', '6C-4B-90-34-35-2F', '405 296 429', 'Windows 10', 1, 'LINEA DE FRENTE MODULO 13', NULL, NULL, NULL, '2020-10-16 02:06:10'),
(195, 'MJ06PZG9', 0, 1, 'LENOVO', 'THINKCENTRE M710Q', NULL, NULL, '1TB', 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE', '192.168.71.127', '6C-4B-90-52-4F-E3', '186 636 320', NULL, 1, 'LINEA DE FRENTE MODULO 12', NULL, '', NULL, NULL),
(196, 'PF1F460D', NULL, 1, 'LENOVO', '20KQ', 2, 1, '37', 'QUADCORE INTEL CORE I5-7400T, 2500 MHZ (25 X 100)', '192.168.71.102', '6C:4B:90:34:35:10', '327 921 07', 'Windows 10', 2, 'OFICINA DE SISTEMAS', NULL, NULL, '2020-10-10 01:12:57', '2020-10-16 02:06:33');

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
(3, '2020_09_24_011222_create_machines_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `id` bigint(20) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`id`, `label`) VALUES
(1, 'No Aplica');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRATOR', NULL, NULL, NULL),
(2, 'TECNICO MACARENA', NULL, '2020-10-04 11:35:52', '2020-10-04 11:35:52'),
(3, 'TECNICO SOLEDAD', NULL, '2020-10-06 23:46:26', '2020-10-06 23:46:26');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-10-09 17:44:04', '2020-10-09 17:44:04'),
(3, 3, 1, '2020-10-03 16:29:29', '2020-10-06 01:48:35'),
(5, 1, 2, '2020-10-09 17:44:42', '2020-10-09 17:44:42'),
(6, 2, 3, '2020-10-17 02:21:32', '2020-10-17 02:21:32');

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

INSERT INTO `users` (`id`, `cc`, `name`, `last_name`, `nick_name`, `password`, `phone`, `rol_id`,`campus_id`, `work_function`, `email`, `email_verified_at`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1143434718, 'JEFFERSON JAVIER', 'ORTEGA PACHECO', 'JORTEGA', '$2y$10$MoXvdKIgd3/nHnGbOqYQueW9R3e8An8T7CaB.vPr6uhNRoaBIR91y', 3002777694, 1, 1, 'DATABASE ADMINISTRATOR', 'admin@inventor.co', NULL, 'boss.svg', NULL, '2020-10-03 10:38:04', '2020-10-03 10:38:04'),
(2, 1143434720, 'DUMMY', 'USER', 'DUMMYUSER', '$2y$10$HczhCG7SPQ7xVeewsdGajuIAsjiRiiHm8CbNTNnbH1G9xJyXwoIpy', 3002777694, 2, 4, 'Network Administrator', 'dummyuser@inventor.co', NULL, 'avatar5.png', NULL, '2020-10-03 16:27:31', '2020-10-04 09:15:33'),
(3, 1143434723, 'POLO', 'MONTAÑEZ', 'PMONTAÑEZ', '$2y$10$hYCNNgdf/OMF6SGbyPsWFewvrJxxEC1miD2wgtkXp1h0pqH1Xdq8.', 3002777694, 3, 5, 'Tech Support Enginner', 'admin@inventor.co', NULL, 'avatar04.png', NULL, '2020-10-03 16:29:29', '2020-10-06 01:48:35');

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
  ADD KEY `machines_type_id_index` (`type_id`),
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
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
  ADD UNIQUE KEY `users_cc_unique` (`cc`),
  ADD KEY `users_campus_id_index` (`campus_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rams`
--
ALTER TABLE `rams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `machines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `machine_registration`
--
ALTER TABLE `machine_registration`
  ADD CONSTRAINT `machine_registration_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machine_registration_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
