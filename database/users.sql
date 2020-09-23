-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-09-2020 a las 04:05:55
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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `campus` varchar(56) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_job` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `nick_name`, `password`, `phone`, `campus`, `pos_job`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Jefferson J.', '', '', '$2y$10$MoXvdKIgd3/nHnGbOqYQueW9R3e8An8T7CaB.vPr6uhNRoaBIR91y', 0, NULL, '', 'admin@inventor.co', NULL, NULL, '2020-09-21 00:44:13', '2020-09-21 00:44:13'),
(3, 'PEPON', 'ORTEGA', 'POPON.O', '12345678', 3174752, 'VIVA 1A IPS MACARENA', 'Support IT', 'admin.m45@parkingya.com.co', NULL, NULL, '2020-09-21 09:58:23', '2020-09-21 09:58:23'),
(7, 'PABLO', 'R.', 'PABLO.R', '$2y$10$55ppF1hDfPOigyAGMLtiXOHeH3eaHNc8bJy7Jla1V4URE0bKfiZEC', 3174752, 'VIVA 1A IPS MACARENA', 'Support IT', 'jeffersonjortega@itsa.edu.co', NULL, NULL, '2020-09-21 10:44:13', '2020-09-21 10:44:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
