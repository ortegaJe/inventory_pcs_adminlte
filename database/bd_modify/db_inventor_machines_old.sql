-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2020 a las 21:27:19
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_inventor_machines_old`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_machines`
--

CREATE TABLE `data_machines`
(
  `id` bigint
(20) NOT NULL,
  `lote` int
(4) DEFAULT NULL,
  `type_id` varchar
(255) DEFAULT NULL,
  `manufacturer` varchar
(255) DEFAULT NULL,
  `model` varchar
(255) DEFAULT NULL,
  `serial` varchar
(255) DEFAULT NULL,
  `ram_slot_00_id` varchar
(255) DEFAULT NULL,
  `ram_slot_01_id` varchar
(255) DEFAULT NULL,
  `hard_drive` varchar
(255) DEFAULT NULL,
  `cpu` varchar
(255) DEFAULT NULL,
  `ip_range` varchar
(15) DEFAULT NULL,
  `mac_address` varchar
(17) DEFAULT NULL,
  `anydesk` varchar
(255) DEFAULT NULL,
  `campus_id` varchar
(255) DEFAULT NULL,
  `location` varchar
(255) DEFAULT NULL,
  `comment` varchar
(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_campus_v1a`
--

CREATE TABLE `table_campus_v1a`
(
  `id` int
(4) NOT NULL,
  `campus_v1a` varchar
(56) NOT NULL,
  `identifier_campus` varchar
(4) NOT NULL,
  `tec_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `table_campus_v1a`
--

ALTER TABLE campus ADD label VARCHAR(4)
AFTER
campu_name

UPDATE campus SET label='S85' WHERE id=8
UPDATE campus SET label='SOL' WHERE id=5;
UPDATE campus SET label='C30' WHERE id=2;
UPDATE campus SET label='C16' WHERE id=4;
UPDATE campus SET label='SSJ' WHERE id=6;
UPDATE campus SET label='MAC' WHERE id=1;
UPDATE campus SET label='SOL' WHERE id=5
,


INSERT INTO `campus` (`
label`)
VALUES
  ('S85')
WHERE id=8
(3, 'VIVA 1A IPS SOLEDAD', 'SOL', 3),
(4, 'VIVA 1A IPS CALLE 30', 'C30', 3),
(5, 'VIVA 1A IPS MACARENA', 'MAC', 1),
(6, 'VIVA 1A IPS CARRERA 16', 'C16', 1),
(8, 'VIVA 1A IPS SURA SAN JOSE', 'SSJ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_machines`
--

CREATE TABLE `table_machines`
(
  `id` int
(100) NOT NULL,
  `serial` varchar
(255) NOT NULL,
  `lote` int
(4) DEFAULT NULL,
  `type_id` bigint
(20) NOT NULL,
  `manufacturer` varchar
(255) NOT NULL,
  `model` varchar
(255) NOT NULL,
  `ram_slot_00` varchar
(255) NOT NULL,
  `ram_slot_01` varchar
(255) NOT NULL,
  `hard_drive` varchar
(255) NOT NULL,
  `cpu` varchar
(255) NOT NULL,
  `ip_range` varchar
(15) NOT NULL,
  `mac_address` varchar
(17) NOT NULL,
  `anydesk` varchar
(255) DEFAULT NULL,
  `campus_id` int
(4) NOT NULL,
  `location` varchar
(255) NOT NULL,
  `comment` varchar
(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `table_machines`
--

INSERT INTO `table_machines` (`
id`,
`serial`,
`lote`,
`type_id`,
`manufacturer`,
`model`,
`ram_slot_00`,
`ram_slot_01
`, `hard_drive`, `cpu`, `ip_range`, `mac_address`, `anydesk`, `campus_id`, `location`, `comment`) VALUES
(1, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.26 ', '-', NULL, 1, '', NULL),
(2, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.27 ', '-', NULL, 1, '', NULL),
(3, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.28 ', '-', NULL, 1, '', NULL),
(4, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.29 ', '-', NULL, 1, '', NULL),
(5, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.80 ', '-', NULL, 1, '', NULL),
(6, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.81 ', '-', NULL, 1, '', NULL),
(7, '', 9999, 4, '', '', '', '', '', '', ' 192.168.71.64 ', '  ', NULL, 1, '', NULL),
(8, '', 9999, 2, '', '', '4GB DDR3 SO-DIMM', '', '120 GB', 'Mobile DualCore Intel Core i5-3230M, 2600 MHz', ' 192.168.71.24', '00-0E-C4-D0-0B-6C', '939224578', 1, 'ENTRADA', 'Microsoft Windows 10 Enterprise 2016 LTSB\r\nV1AMAC-ATRIL01'),
(9, '', 9999, 2, '', '', '', '', '', '', ' 192.168.71.25 ', '-', NULL, 1, '', NULL),
(10, '', 9999, 2, '', '', '', '', '', '', ' 192.168.71.213', '  ', NULL, 1, '', NULL),
(11, '', 9999, 4, '', '', '', '', '', '', ' 192.168.62.26 ', '-', NULL, 8, '', NULL),
(12, '', 9999, 4, '', '', '', '', '', '', ' 192.168.62.28 ', '-', NULL, 8, '', NULL),
(13, '', 9999, 4, '', '', '', '', '', '', ' 192.168.62.29 ', '-', NULL, 8, '', NULL),
(14, '', 9999, 4, '', '', '', '', '', '', ' 192.168.62.30 ', '-', NULL, 8, '', NULL),
(15, '', 9999, 4, '', '', '', '', '', '', ' 192.168.62.31 ', '-', NULL, 8, '', NULL),
(16, '', 9999, 4, '', '', '', '', '', '', ' 192.168.62.33 ', '-', NULL, 8, '', NULL),
(17, '', 9999, 2, '', '', '', '', '', '', ' 192.168.62.122', '-', NULL, 8, '', NULL),
(18, '', 9999, 2, '', '', '', '', '', '', ' 192.168.62.34 ', '-', NULL, 8, '', NULL),
(19, '', 9999, 2, '', '', '', '', '', '', ' 192.168.62.37 ', '  ', NULL, 8, '', NULL),
(20, '', 9999, 2, '', '', '', '', '', '', ' 192.168.62.25 ', '-', NULL, 8, '', NULL),
(21, '', 9999, 2, '', '', '', '', '', '', ' 192.168.12.25 ', '-', NULL, 4, '', NULL),
(22, '', 9999, 2, '', '', '', '', '', '', ' 192.168.12.35 ', '  ', NULL, 4, '', NULL),
(23, 'XXXX', 9999, 4, ' RASPBERRY ', ' PI 4', '1GB DDR2 SO-DIMM', '', '70GB', '', ' 192.168.12.29 ', '-', '', 4, 'PISO 2', ''),
(24, 'XXXX', 9999, 4, ' RASPBERRY ', ' PI 4', '1GB DDR2 SO-DIMM', '', '70GB', '', ' 192.168.12.28 ', '-', '', 4, ' TOMA DE MUESTRA ', ''),
(25, '', 9999, 4, '', '', '', '', '', '', ' 192.168.12.100', '-', NULL, 4, '', NULL),
(26, 'XXXX', 9999, 4, ' RASPBERRY ', ' PI 4', '1GB DDR2 SO-DIMM', '', '70GB', '', ' 192.168.12.101', '-', '', 4, 'PISO 1', ''),
(27, 'XXXX', 9999, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', '1GB DDR2 SO-DIMM', '', '70GB', '', ' 192.168.16.26 ', '-', '', 6, 'PISO ?', ''),
(28, 'XXXXXXXXXXXXXX', 9999, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', '1GB DDR2 SO-DIMM', '', '70GB', '', ' 192.168.16.28 ', '-', '', 6, 'PISO ?', ''),
(29, '', 9999, 2, '', '', '', '', '', '', ' 192.168.16.25 ', '-', NULL, 6, '', NULL),
(30, '', 9999, 2, '', '', '', '', '', '', ' 192.168.16.30 ', '-', NULL, 6, '', NULL),
(35, 'S1H03LKD', 0, 1, 'LENOVO              ', 'THINKCENTRE ALL IN ONE', '4GB DDR3 SO-DIMM', '4GB DDR3 SO-DIMM', '500GB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.71.240', '98-EE-CB-25-1F-C2', '465 562 426', 1, 'OFICINA DE SISTEMAS ', 'EQUIPO DE TECNICO DE SISTEMAS'),
(48, 'MJ06PZFW', 0, 1, 'LENOVO', 'M710Q', '4GB DDR4 SO-DIMM', 'NULL', '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.123', '6C-4B-90-EA-67', '791 415 611', 1, 'LINEA DE FRENTE MODULO 02', ''),
(49, 'MJ06PZKJ', 0, 1, 'LENOVO', 'M710Q', '4GB DDR4 SO-DIMM', 'NULL', '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.162', '6C-4B-90-EA-67', '929 589 135', 1, 'LINEA DE FRENTE MODULO 08', ''),
(50, 'MJ06PZHR', 0, 1, 'LENOVO', 'M710Q', '4GB DDR3 SO-DIMM', 'NULL', '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.67', '6C-4B-90-52-50', '694 961 071', 1, 'CONSULTORIO 24', ''),
(51, 'MJ06PZFR', 0, 1, 'LENOVO', 'M710Q', '4GB DDR3 SO-DIMM', 'NULL', '1TB', 'Intel(R) Core(TM) i5-7400T CPU @ 2.40GHz, 2400 Mhz', '192.168.71.180', '6C-4B-90-52-4F', '421662546', 1, 'CONSULTORIO 25', ''),
(116, ' PC0UF1HX ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio1 ', NULL),
(117, 'PC0UF3CU ', 1000, 1, 'LENOVO', 'V520S-08IKL', '4GB DDR3 DIMM', '', '1TB', 'QUADCORE INTEL CORE I5-7400, 2979 MHZ', '192.168.71.167', '6C-4B-90-61-EB-BB', '453 476 656', 1, ' consultorio2 ', ''),
(118, ' PC0UF3CN ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio3 ', NULL),
(119, ' PC0UF3P6 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio4 ', NULL),
(120, ' PC0UF3P4 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio5 ', NULL),
(121, ' MJ06PZGB ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio7 ', NULL),
(122, ' MJ06PZJJ ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio8 ', NULL),
(123, ' MJ06PZG8 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio9 ', NULL),
(124, ' MJ06PZHH ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio10 ', NULL),
(125, ' MJ06PZGT ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio11 ', NULL),
(126, ' MJ06PZK1 ', 1000, 1, 'LENOVO', 'THINKCENTRE M710Q', '4GB DDR4 SO-DIMM', '', '1TB', 'QuadCore Intel Core i5-7400T, 2400 MHz', '192.168.71.235', '6C-4B-90-52-4F-CE', '444 258 948', 1, ' consultorio12 ', 'Microsoft Windows 10 Pro'),
(127, ' MJ06PZFH ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio13 ', NULL),
(128, ' MJ06PZFU ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio14 ', NULL),
(129, ' MJ06PZGG ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio15 ', NULL),
(130, ' MJ06PZJX ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio16 ', NULL),
(131, ' MJ06PZEV ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio17 ', NULL),
(132, ' MJ06PZKE ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio19 ', NULL),
(133, ' MJ06PZEB ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio20 ', NULL),
(134, ' MJ06PZKZ ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio21 ', NULL),
(135, ' MJ06PZJR ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio23 ', NULL),
(136, ' MJ06PZF8 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio27 ', NULL),
(137, ' MJ06PZHB ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio28 ', NULL),
(138, ' MJ06PZJG ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio29 ', NULL),
(139, ' MJ06PZH6 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio30 ', NULL),
(140, ' MJ06PZGS ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio31 ', NULL),
(141, ' MJ06PZG2 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio32ELECTRO ', NULL),
(142, ' MJ06PZKP ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio32CARDIOLOGIA ', NULL),
(143, ' YL002MN3 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' consultorio33 ', NULL),
(144, ' MJ06PZ6K ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo1 ', NULL),
(145, ' MJ06PZH8 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo4 ', NULL),
(146, ' MJ06PZJ9 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo5 ', NULL),
(147, ' MJ06PZFN ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo6 ', NULL),
(148, ' MJ06PZHJ ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo7 ', NULL),
(149, ' MJ06PZK7 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo9 ', NULL),
(150, ' MJ06PZH2 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo10 ', NULL),
(151, 'MJ06PZL4 ', 1000, 1, 'LENOVO', 'THINKCENTRE M710Q', '4GB DDR4 SO-DIMM', '', '1TB', 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE ', '192.168.71.100', '6C-4B-90-52-50-84', '696 059 473', 1, 'LINEA DE FRENTE MODULO 11 ', 'Microsoft Windows 10 Pro\r\nV1AMAC-LF11\r\n'),
(154, ' MJ06PZF4 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo14 ', NULL),
(155, ' MJ06PZHC ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo15 ', NULL),
(156, ' MJ06PZGA ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo16 ', NULL),
(157, ' MJ06PZHF ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo17 ', NULL),
(158, ' PC0UF3Q7 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo23 ', NULL),
(159, ' MJ06APXK ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo18 ', NULL),
(160, ' 3CR52904FG ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' Modulo2 ', NULL),
(161, ' MJ07PZ6W ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' odontologia1 ', NULL),
(162, ' MJ06PZGW ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' odontologia2 ', NULL),
(163, ' YL002L9C ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' odontologia3 ', NULL),
(164, ' PC0UAXPA ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' ECOGRAFIA ', NULL),
(165, ' PC0UF3Z5 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' procedimiento ', NULL),
(166, ' PC0UF3N4 ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' FISIO TERAPIA ', NULL),
(167, ' MJ06PZHK ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' AUDITORIO ', NULL),
(168, ' MJ06APWM ', 1000, 1, '', '', '', '', '', '', '', '', NULL, 1, ' ATRIL ', NULL),
(169, 'MJ00VAYE', 0, 1, 'LENOVO', 'THINKCENTRE M73', '4GB DDR3 DIMM', 'NULL', '300GB', 'INTEL(R) CORE(TM) I3-4130 CPU @ 3.40GHZ, 3400 MHZ, 2 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.16.75', '44-8A-5B-75-39-36', '550 791 024', 6, 'LINEA DE FRENTE MODULO 3', ''),
(170, 'S1H02QGN', 0, 1, 'LENOVO', 'THINKCENTRE E73Z', '4GB DDR3 DIMM', 'NULL', '500GB', 'DUALCORE INTEL CORE I3-4160, 3600 MHZ', '192.168.16.63', '98-EE-CB-15-12-FF', '278 779 528', 6, 'LINEA DE FRENTE MODULO 04 P2', 'Sistema operativo	Microsoft Windows 7 Professional\r\nNombre del equipo	V1AC16-LF06'),
(171, 'MJ00VAZ1', 0, 1, 'LENOVO ', 'THINKCENTRE M73', '4GB DDR3 DIMM', 'NULL', '500GB', 'DUALCORE INTEL CORE I3-4130, 3400 MHZ', '192.168.16.60', '44-8A-5B-75-25-A9', '870 561 845', 6, 'LINEA DE FRENTE MODULO 05 P2', 'ALL IN ONE\r\nSistema operativo	Microsoft Windows 7 Professional'),
(172, 'MJ06APXK', 0, 1, 'LENOVO', 'THINKCENTRE M710Q', '4GB DDR3 SO-DIMM', 'NULL', '500GB', 'DUALCORE INTEL CORE I3-6100T, 3200 MHZ', '192.168.71.83', '6C-4B-90-34-35-2F', '405 296 429', 1, 'LINEA DE FRENTE MODULO 13', 'Microsoft Windows 10 Pro\r\nV1AMAC-LF13'),
(174, '', 0, 4, ' RASPBERRY ', ' PI 4 ', '1GB DDR2 SO-DIMM', '', '', '', ' 192.168.12.20 ', '-', NULL, 3, ' PISO 1 SALA 2 ', NULL),
(175, '', 0, 4, ' RASPBERRY ', ' PI 4 ', '1GB DDR2 SO-DIMM', '', '', '', ' 192.168.12.30 ', '-', NULL, 3, ' PISO 2 ', NULL),
(195, 'MJ06PZG9', 0, 1, 'LENOVO', 'THINKCENTRE M710Q', '4GB DDR4 SO-DIMM', 'NULL', '1TB', 'INTEL CORE I5-7400T, 2400 MHZ QUADCORE', '192.168.71.127', '6C-4B-90-52-4F-E3', '186 636 320', 1, 'LINEA DE FRENTE MODULO 12', ''),
(196, 'XXXXXXXXXXX', 0, 4, 'RASPBERRY PI FOUNDATION', 'PI 4', '1GB DDR2 SO-DIMM', 'NULL', '70GB', '', '192.168.16.27', '-', '', 6, 'PISO 1 ADMISIONES', ''),
(197, 'MJ00VAZ7', 0, 1, 'LENOVO', 'THINKCENTRE M73', '4GB DDR3 DIMM', 'NULL', '500GB', 'INTEL CORE I3-4130, 3400 MHZ DUALCORE ', '192.168.16.74', '44-8A-5B-75-24-D7', '1 362 652', 6, 'CONSULTORIO 02 PISO 1', 'Microsoft Windows 7 Professional\r\nV1AC16-CON02'),
(198, 'MJ00VAYS', 0, 1, 'LENOVO', 'THINKCENTRE M73', '4GB DDR3 DIMM', 'NULL', '500GB', 'DUALCORE INTEL CORE I3-4130, 3400 MHZ', '192.168.16.73', '44-8A-5B-75-16-C4', '4 898 537', 6, 'CONSULTORIO 04 PISO 1', 'Microsoft Windows 7 Professional\r\nV1AC16-CON04'),
(234, ' PCOUF40H ', 1001, 1, ' LENOVO ', ' V520S ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 1 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(235, ' MXL83511F7 ', 1001, 1, ' HP COMPAQ ', '  ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 2 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(236, ' MJ06A4DR ', 1001, 1, ' LENOVO ', ' THINKCENTRE M71Q ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 3 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(237, ' 11S30002049001019CV3RZ ', 1001, 1, ' LENOVO ', ' H220 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 4 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(238, ' L3E224 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 5 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(239, ' PCOUF1F3 ', 1001, 1, ' LENOVO ', ' V520S ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 6 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(240, ' 30089568998 ', 1001, 1, ' DELL ', ' OPTIPLEX 3020 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 7 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(241, ' MXL0351VYS ', 1001, 1, ' HP COMPAQ ', ' 5008 MT ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 8 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(242, ' L3E1350 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 9 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(243, ' L3E1102 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 10 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(244, ' L3E1124 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 11 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(245, ' L3E1100 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 12 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(246, ' L3E1159 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 13 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(247, ' MJ06LXHX ', 1001, 1, ' LENOVO ', ' THINKCENTRE M71Q ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 14 - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(248, ' L3E1332 ', 1001, 1, ' LENOVO ', ' AD8 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO 15 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(249, ' CN04W34Y-70163 ', 1001, 1, ' DELL ', ' OPTIPLEX 3020 ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 1 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(250, ' MJ018Y5C ', 1001, 1, ' LENOVO ', ' THINKCENTRE M73 ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 2 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(251, ' MJ018Y5Y ', 1001, 1, ' LENOVO ', ' THINKCENTRE M73 ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 3 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(252, ' 11S300020490010102434H ', 1001, 1, ' LENOVO ', ' LENOVO ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 4 - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(253, ' MJGVCHX ', 1001, 1, ' LENOVO ', ' THINKCENTRE M71E ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 6 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(254, ' MJ068TUL ', 1001, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 7 - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(255, ' MJ068TXF ', 1001, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 7 AUX - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(256, ' YL005S3Z ', 1001, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 8 - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(257, ' YL002MWF ', 1001, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 9 - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(258, ' PCOUF40C ', 1001, 1, ' LENOVO ', ' V520S ', '', '', '', '', '', '', NULL, 4, ' LINEA DE FRENTE MOD 10 - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(259, ' MJ06PCU6 ', 1001, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 4, ' ATRIL TURNERO - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(260, ' MJ05J7T3 ', 1001, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 4, ' ATRIL LABORATORIO - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(261, ' 30070813286 ', 1001, 1, ' DELL ', ' OPTIPLEX 3020 ', '', '', '', '', '', '', NULL, 4, ' SIAU - ATENCION AL USUARIO - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(262, ' CSO1879098 ', 1001, 1, ' LENOVO ', ' ALL IN ONE 10150 ', '', '', '', '', '', '', NULL, 4, ' OFICINA ADMINISTRACION - PISO 2 ', ' WINDOWS 8.1 PROFESSIONAL '),
(263, ' CSO1879177 ', 1001, 1, ' LENOVO ', ' ALL IN ONE 10151 ', '', '', '', '', '', '', NULL, 4, ' OFICINA ADMINISTRACION - PISO 2 ', ' WINDOWS 8.1 PROFESSIONAL '),
(264, ' MJ00M57H ', 1001, 1, ' LENOVO ', ' THINKCENTRE M73 ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO DE VACUNACION - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(265, ' MXL4090ND5 ', 1001, 1, ' HP COMPAQ ', ' PRO SFF ', '', '', '', '', '', '', NULL, 4, ' CONSULTORIO DE PROCEDIMIENTOS - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(266, ' CNU0222RMH ', 1001, 3, ' HP ', ' HP420 ', '', '', '', '', '', '', NULL, 4, ' OFICINA ADMINISTRACION - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(267, ' MJ05J7UH ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 1 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(268, ' YL005RNN ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 2 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(269, ' YL005RMN ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 3 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(270, ' MJDVBYX ', 1002, 1, ' LENOVO ', ' THINKCENTRE M81 ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 4 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(271, ' YL002L8E ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 5 - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(272, ' MJDVBZB ', 1002, 1, ' LENOVO ', ' THINKCENTRE M81 ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 6 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(273, ' S1H03LHE ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 7 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(274, ' S1H01YDB ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 8 - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(275, ' MJ05HND ', 1002, 1, ' LENOVO ', ' THINKCENTRE M76E ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 9- PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(276, ' S1H03LJF ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' CONSULTORIO 10- PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(277, ' VKC91160 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 3, ' LINEA DE FRENTE - PISO 1 MOD1   ', ' WINDOWS 10 PROFESSIONAL '),
(278, ' MJ450GT ', 1002, 1, ' LENOVO ', ' THINKCENTRE M72E ', '', '', '', '', '', '', NULL, 3, ' LINEA DE FRENTE - PISO 1 MOD2   ', ' WINDOWS 10 PROFESSIONAL '),
(279, ' S5DMXYP ', 1002, 1, ' LENOVO ', ' THINCENTRE A70 ', '', '', '', '', '', '', NULL, 3, ' LINEA DE FRENTE - PISO 1  MOD3 ', ' WINDOWS 7 PROFESSIONAL '),
(280, ' YL002M3A ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' LINEA DE FRENTE - PISO  1 MOD4 IMAGENOLOGIA ', ' WINDOWS 10 PROFESSIONAL '),
(281, ' YL002M80 ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' LINEA DE FRENTE - PISO  1 MOD5 ', ' WINDOWS 10 PROFESSIONAL '),
(282, ' MJ06A4D9 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 3, ' ATENCION AL USUARIO - PISO  1 SIAU ', ' WINDOWS 10 PROFESSIONAL '),
(283, ' YL002M80 ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' FARMACIA CAJACOPI - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(284, ' MJGVHBV ', 1002, 1, ' LENOVO ', ' THINKCENTRE ', '', '', '', '', '', '', NULL, 3, ' FISIOTERAPIA - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(285, ' S1H03LH4 ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' ECOGRAFIA - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(286, ' MJ030DL3 ', 1002, 1, ' LENOVO ', ' WORKSTATION P300 ', '', '', '', '', '', '', NULL, 3, ' RAYOS X - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(287, ' YL005RWM ', 1002, 1, ' LENOVO ', ' V530S ', '', '', '', '', '', '', NULL, 3, ' ODONTOLOGIA - PISO 1 ', ' WINDOWS 10 PROFESSIONAL '),
(288, ' MJGVHBG ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71E ', '', '', '', '', '', '', NULL, 3, ' AUDITORIO - PISO 1 ', ' WINDOWS 7 PROFESSIONAL '),
(289, ' MJ05UPRN ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 3, ' CIRUGIA - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(290, ' S1H01XNV ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' ADMINISTRACION - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(291, ' PB-0368K1 ', 1002, 3, ' LENOVO ', ' LAPTOP THINKPAD X240 ', '', '', '', '', '', '', NULL, 3, ' OFICINA DIRECTOR - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(292, ' S1H01YLW ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' IMAGENOLOGIA - PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(293, ' PF-QFX396 ', 1002, 3, ' LENOVO ', ' LAPTOP THINKPAD E470 ', '', '', '', '', '', '', NULL, 3, ' ENFERMERA - PISO 2 ', ' WINDOWS 10 PROFESSIONAL '),
(294, ' PF-107PUT ', 1002, 3, ' LENOVO ', ' LAPTOP THINKPAD E470 ', '', '', '', '', '', '', NULL, 3, ' QUIMICO – PISO 2 ', ' WINDOWS 7 PROFESSIONAL '),
(295, ' S1H02RRT ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' VIVA1A IPS - CALLE 30 ', ' WINDOWS 7 PROFESSIONAL '),
(296, ' S1H02K65 ', 1002, 1, ' LENOVO ', ' ALL IN ONE E73Z ', '', '', '', '', '', '', NULL, 3, ' VIVA1A IPS - CALLE 30 ', ' WINDOWS 7 PROFESSIONAL '),
(297, ' MJ06A4DR ', 1002, 1, ' LENOVO ', ' THINKCENTRE M710Q ', '', '', '', '', '', '', NULL, 3, ' VIVA1A IPS - CALLE 30 ', ' WINDOWS 10 PROFESSIONAL '),
(298, ' MJGVKHX ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71E ', '', '', '', '', '', '', NULL, 3, ' VIVA1A IPS - CALLE 30 ', ' WINDOWS 7 PROFESSIONAL '),
(299, ' MJ00M576 ', 1002, 1, ' LENOVO ', ' THINKCENTRE M71E ', '', '', '', '', '', '', NULL, 3, ' VIVA1A IPS - CALLE 30 ', ' WINDOWS 7 PROFESSIONAL '),
(300, ' MJ04RYU3 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' MODULO 4 ', NULL),
(301, ' MJ04RYUJ ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' MODULO 5 ', NULL),
(302, ' PC0UF3CV ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' MODULO 1 ', NULL),
(303, ' PC035CCB ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' MODULO 1 imagenologia ', NULL),
(304, ' PC0UHA5G ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' MODULO 2 imagenologia ', NULL),
(305, ' PC0UF1K1 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' TRANSCRIPCION DE RAYOS X ', NULL),
(306, ' MJ030DKY ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' RAYOS X ', NULL),
(307, ' MJ04RYVB ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' FISIOTERAPIA ', NULL),
(308, ' PF018APF ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' FISIOTERAPIA ', NULL),
(309, ' 13589 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 101 ', NULL),
(310, ' MJ05FCU9 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 102 ', NULL),
(311, ' PC0UF3P7 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' MODULO SALA PAC ', NULL),
(312, ' MJ04RYV1 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' VACUNACION ', NULL),
(313, ' PC0UF1ES ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 103 ', NULL),
(314, ' MJ04RYUY ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CITOLOGIA ', NULL),
(315, ' MJ05FCSD ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 104 ', NULL),
(316, ' MJ05FCS8 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 105 ', NULL),
(317, ' MJ05FCT4 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 106 ', NULL),
(318, ' MJ002T6L ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' CONSULTORIO 107 ', NULL),
(319, ' MJ04RYUF ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 200 ', NULL),
(320, ' MJ04RYUH ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 201 ', NULL),
(321, ' YL002MUB ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 202 ', NULL),
(322, ' YL002N49 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 203 ', NULL),
(323, ' PC035CBF ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 204 ', NULL),
(324, ' PC035CD0 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 205 ', NULL),
(325, ' MJ04RYU8 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 206 ', NULL),
(326, ' MJ04RYV4 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 207 ', NULL),
(327, ' MJ04RYU5 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 208 ', NULL),
(328, ' MX2292NW ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 209 ', NULL),
(329, ' YL002MQ3 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 210 ', NULL),
(330, ' PCOUF1EW ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 211 ', NULL),
(331, ' PCOUF3CW ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 212 ', NULL),
(332, ' PCOUF3PB ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio 213 ', NULL),
(333, ' PCO38V6 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' odontologia  1 ', NULL),
(334, ' PCO35CBH ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' odontologia  2 ', NULL),
(335, ' PCO338X1 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' odontologia  3 ', NULL),
(336, ' MJ018Y6K ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' odontologia  4 ', NULL),
(337, ' MJ05FCTC ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' odontologia  5 ', NULL),
(338, ' MJ04RYU2 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' odontologia  ', NULL),
(339, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio300 ', NULL),
(340, ' YL002MJ1 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio301 ', NULL),
(341, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio302 ', NULL),
(342, ' YL002MU9 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio303 ', NULL),
(343, ' YL002MHT ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio304 ', NULL),
(344, ' YL002MJ7 ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio305 ', NULL),
(345, ' YL002M7Q ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio306 ', NULL),
(346, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio307 ', NULL),
(347, ' MJ04RYUA ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio308 ', NULL),
(348, ' YL002MJB ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio309 ', NULL),
(349, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio310 ', NULL),
(350, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio311 ', NULL),
(351, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio312 ', NULL),
(352, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio313 ', NULL),
(353, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio314 ', NULL),
(354, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio315 ', NULL),
(355, ' YL002N4C ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio316 ', NULL),
(356, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' consultorio317 ', NULL),
(357, ' MJ04RYUG ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' auditorio ', NULL),
(358, ' MJ04RYUL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' oficina administrativa ', NULL),
(359, ' REGISTRADO SIN SERIAL ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' oficina direccion medica ', NULL),
(360, ' MJO4RYUG ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' modulo 18 ', NULL),
(361, ' PCOUF3PF ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' modulo 17 ', NULL),
(362, ' YL002N4M ', 1003, 1, ' LENOVO ', '', '', '', '', '', '', '', NULL, 8, ' modulo 16 ', NULL),
(363, 'MJ00VB01', 0, 1, 'LENOVO', 'NO VISIBLE', '4GB DDR3 DIMM', 'NULL', '70GB', 'INTEL(R) CORE(TM) I3-4130 CPU @ 3.40GHZ, 3400 MHZ, 2 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.16.113', '44-8A-5B-75-2B-59', '9 555 153', 6, 'AUDITORIO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_user_tec`
--

CREATE TABLE `table_user_tec`
(
  `id_tec` int
(4) NOT NULL,
  `nickname_tec` varchar
(20) NOT NULL,
  `name_tec` varchar
(256) NOT NULL,
  `last_name_tec` varchar
(256) NOT NULL,
  `campus_tec` varchar
(256) NOT NULL,
  `position_job` varchar
(256) NOT NULL,
  `email_tec` varchar
(256) NOT NULL,
  `password_tec` varchar
(256) NOT NULL,
  `status` tinyint
(1) NOT NULL DEFAULT '0',
  `time_login` datetime NOT NULL,
  `time_logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `table_user_tec`
--

INSERT INTO `table_user_tec` (`
id_tec`,
`nickname_tec`,
`name_tec
`, `last_name_tec`, `campus_tec`, `position_job`, `email_tec`, `password_tec`, `status`, `time_login`, `time_logout`) VALUES
(1, 'jortega', 'Jefferson Javier', 'Ortega Pacheco', 'VIVA 1A IPS MACARENA', 'Support IT', 'jortega@viva1a.com.co', '.jortega', 0, '2020-10-08 15:40:40', '2020-10-08 16:10:42'),
(2, 'jmendoza', 'Jose', 'Mendoza', 'VIVA 1A CASA MATRIZ', 'Support IT', 'jmendoza@viva1a.com.co', '.jmendoza', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'fviloria', 'Francisco', 'Viloria', 'VIVA 1A IPS CALLE 30', 'Support IT', 'fviloria@viva1a.com.co', '.fviloria', 0, '2020-09-11 16:40:19', '2020-09-11 17:10:44'),
(4, 'ADMIN', 'administrator', '', '', '', '', '@admin.*', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data_machines`
--
ALTER TABLE `data_machines`
ADD PRIMARY KEY
(`id`);

--
-- Indices de la tabla `table_campus_v1a`
--
ALTER TABLE `table_campus_v1a`
ADD PRIMARY KEY
(`id`),
ADD KEY `tec_id`
(`tec_id`);

--
-- Indices de la tabla `table_machines`
--
ALTER TABLE `table_machines`
ADD PRIMARY KEY
(`id`);

--
-- Indices de la tabla `table_user_tec`
--
ALTER TABLE `table_user_tec`
ADD PRIMARY KEY
(`id_tec`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data_machines`
--
ALTER TABLE `data_machines`
  MODIFY `id` bigint
(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `table_campus_v1a`
--
ALTER TABLE `table_campus_v1a`
  MODIFY `id` int
(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `table_machines`
--
ALTER TABLE `table_machines`
  MODIFY `id` int
(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT de la tabla `table_user_tec`
--
ALTER TABLE `table_user_tec`
  MODIFY `id_tec` int
(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `table_campus_v1a`
--
ALTER TABLE `table_campus_v1a`
ADD CONSTRAINT `table_campus_v1a_ibfk_1` FOREIGN KEY
(`tec_id`) REFERENCES `table_user_tec`
(`id_tec`) ON
DELETE NO ACTION ON
UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
