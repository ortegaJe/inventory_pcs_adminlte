-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-10-2020 a las 04:29:01
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VIVA 1A IPS MACARENA', NULL, NULL),
(2, 'VIVA 1A IPS CALLE 30', NULL, NULL),
(4, 'VIVA 1A IPS CARRERA 16', '2020-10-03 11:05:49', '2020-10-03 11:05:49'),
(5, 'VIVA 1A IPS SOLEDAD', '2020-10-03 11:05:57', '2020-10-03 11:05:57'),
(6, 'VIVA 1A IPS SURA SAN JOSE', '2020-10-03 11:06:12', '2020-10-03 11:06:12'),
(7, 'VIVA 1A COUNTRY', '2020-10-04 06:35:01', '2020-10-04 06:35:01'),
(8, 'VIVA 1A IPS SURA 85', '2020-10-04 06:35:14', '2020-10-04 06:35:14');

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
-- Estructura de tabla para la tabla `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lote` smallint(6) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram_slot_00` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram_slot_01` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hard_drive` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_range` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anydesk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `machines` (`id`, `serial`, `lote`, `type_id`, `manufacturer`, `model`, `ram_slot_00`, `ram_slot_01`, `hard_drive`, `cpu`, `ip_range`, `mac_address`, `anydesk`, `campus_id`, `location`, `image`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'S1H03LKD', NULL, 1, 'LENOVO', 'PRODESK G4', '2GB DDR2 SO-DIMM', 'NULL', '800GB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.71.240', '98-EE-CB-25-1F-C2', '46556226', 1, 'OFICINA DE SISTEMAS', NULL, NULL, '2020-10-04 06:28:02', '2020-10-04 06:41:18'),
(2, 'EYJPDII6I', NULL, 2, 'LENOVO', 'PRODESK G4', '5', '7', '1TB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '192.168.12.100', 'R5:H8:0Y:K9:O9', '46556226', 5, 'OFICINA DE SISTEMAS', NULL, NULL, '2020-10-05 05:57:25', '2020-10-05 05:57:25'),
(7, 'EYJPDII6IM', NULL, 3, 'LENOVO', 'PRODESK G4', '4', '1', '300GB', 'INTEL(R) CORE(TM) I5-4460T CPU @ 1.90GHZ, 1901 MHZ, 4 PROCESADORES PRINCIPALES, 4 PROCESADORES LÓGICOS', '127.0.0.1', '2C-FD-A1-6F-EA-A6', '46556226', 5, 'OFICINA DE SISTEMASS', NULL, NULL, '2020-10-05 09:24:05', '2020-10-05 09:24:05');

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
  `id` bigint(20) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rams`
--

INSERT INTO `rams` (`id`, `ram`, `created_at`, `updated_at`) VALUES
(1, 'No aplica', NULL, NULL),
(2, '1GB DDR2 DIMM', NULL, NULL),
(3, '2GB DDR2 SO-DIMM', NULL, NULL),
(4, '2GB DDR2 DIMM', NULL, NULL),
(5, '4GB DDR3 SO-DIMM', NULL, NULL),
(6, '4GB DDR3 DIMM', NULL, NULL),
(7, '4GB DDR4 SO-DIMM', NULL, NULL),
(8, '4GB DDR4 DIMM', NULL, NULL),
(9, '8GB DDR3 SO-DIMM', NULL, NULL),
(10, '8GB DDR3 SO-DIMM', NULL, NULL),
(11, '8GB DDR4 SO-DIMM', NULL, NULL),
(12, '8GB DDR4 SO-DIMM', NULL, NULL),
(13, '16GB DDR4 SO-DIMM', NULL, NULL),
(14, '16GB DDR4 DIMM', NULL, NULL),
(15, '32GB DDR4 DIMM', NULL, NULL),
(16, '64GB DDR4 DIMM', NULL, NULL),
(50, '1GB DDR2 SO-DIMM', NULL, NULL);

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
(2, 'TECNICO MACARENA', NULL, '2020-10-04 06:35:52', '2020-10-04 06:35:52');

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
(1, 1, 1, NULL, NULL),
(3, 3, 1, '2020-10-03 11:29:29', '2020-10-04 04:14:52'),
(4, 1, 2, NULL, NULL);

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

INSERT INTO `users` (`id`, `cc`, `name`, `last_name`, `nick_name`, `password`, `phone`, `campus_id`, `work_function`, `email`, `email_verified_at`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1143434718, 'JEFFERSON JAVIER', 'ORTEGA PACHECO', 'JORTEGA', '$2y$10$MoXvdKIgd3/nHnGbOqYQueW9R3e8An8T7CaB.vPr6uhNRoaBIR91y', 3002777694, 1, 'DATABASE ADMINISTRATOR', 'admin@inventor.co', NULL, 'boss.svg', NULL, '2020-10-03 05:38:04', '2020-10-03 05:38:04'),
(2, 1143434720, 'DUMMY', 'USER', 'DUMMYUSER', '$2y$10$HczhCG7SPQ7xVeewsdGajuIAsjiRiiHm8CbNTNnbH1G9xJyXwoIpy', 3002777694, 4, 'Network Administrator', 'dummyuser@inventor.co', NULL, 'avatar5.png', NULL, '2020-10-03 11:27:31', '2020-10-04 04:15:33'),
(3, 1143434723, 'POLO', 'MONTAÑEZ', 'PMONTAÑEZ', '$2y$10$hYCNNgdf/OMF6SGbyPsWFewvrJxxEC1miD2wgtkXp1h0pqH1Xdq8.', 3002777694, 2, 'Tech Support Enginner', 'admin@inventor.co', NULL, 'avatar04.png', NULL, '2020-10-03 11:29:29', '2020-10-04 04:14:52');

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
-- AUTO_INCREMENT de la tabla `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rams`
--
ALTER TABLE `rams`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `machines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

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
