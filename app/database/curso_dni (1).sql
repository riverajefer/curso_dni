-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-08-2014 a las 22:46:15
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `curso_dni`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amarillopaginas`
--

DROP TABLE IF EXISTS `amarillopaginas`;
CREATE TABLE IF NOT EXISTS `amarillopaginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pagina_actual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terminado` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `amarillopaginas`
--

INSERT INTO `amarillopaginas` (`id`, `user_id`, `pagina_actual`, `terminado`, `created_at`, `updated_at`) VALUES
(1, 2, '5', 1, '2014-08-16 01:19:39', '2014-08-16 01:20:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_08_14_172433_create_RojoPaginas_table', 2),
('2014_08_14_172842_create_AmarilloPaginas_table', 3),
('2014_08_14_172851_create_VerdePaginas_table', 3),
('2014_08_14_174057_create_RojoPaginas_table', 4),
('2014_08_14_174110_create_AmarilloPaginas_table', 4),
('2014_08_14_174117_create_VerdePaginas_table', 4),
('2014_08_14_222025_create_donde_estoy_table', 5),
('2014_08_15_212841_create_preguntas_table', 6),
('2014_08_15_220002_create_user_pregunta_table', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pregunta` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` tinyint(1) NOT NULL,
  `retro` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `modulo`, `pregunta`, `respuesta`, `retro`, `created_at`, `updated_at`) VALUES
(1, '1', 'Se pueden unar redes sociales en el DNI', 0, 'No es aconsejable', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(2, '1', 'No pueden ingresar USB personales al DNI', 1, 'Esto no está permtido', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(3, '1', 'Se pueden unar redes sociales en el DNI 2', 0, 'No es aconsejable', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(4, '1', 'No pueden ingresar USB personales al DNI 2\r\n', 1, 'Esto no está permtido', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(5, '1', 'Se pueden unar redes sociales en el DNI 3', 0, 'No es aconsejable', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(6, '1', 'Se pueden unar redes sociales en el DNI 4', 0, 'No es aconsejable', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(7, '1', 'Se pueden unar redes sociales en el DNI 5', 0, 'No es aconsejable', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(8, '1', 'Se pueden unar redes sociales en el DNI 6', 0, 'No es aconsejable', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(9, '1', 'No pueden ingresar USB personales al DNI 4\r\n', 1, 'Esto no está permtido', '2014-08-15 05:00:00', '2014-08-15 05:00:00'),
(10, '1', 'No pueden ingresar USB personales al DNI 50\r\n', 1, 'Esto no está permtido', '2014-08-15 05:00:00', '2014-08-15 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rojopaginas`
--

DROP TABLE IF EXISTS `rojopaginas`;
CREATE TABLE IF NOT EXISTS `rojopaginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pagina_actual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terminado` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rojopaginas`
--

INSERT INTO `rojopaginas` (`id`, `user_id`, `pagina_actual`, `terminado`, `created_at`, `updated_at`) VALUES
(1, 2, '2', 1, '2014-08-16 01:19:16', '2014-08-16 01:19:44'),
(2, 1, '5', 1, '2014-08-16 01:20:57', '2014-08-16 01:22:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'rivera23', '$2y$10$f36oNDPDEK373F6WYRsD3esHVhWODWads4oUdD8u5U05hAQrVoxgy', NULL, 1, NULL, NULL, '2014-08-16 01:21:30', '$2y$10$t750mqxQP8je7vyfs3Ug2./zyg9llRLLrjikPmPd75xb42Fu4H2vO', NULL, 'Jefferson', 'Rivera', '2014-08-16 01:16:34', '2014-08-16 01:21:30'),
(2, 'doe', '$2y$10$XqdptojS/Q4Z1JoAamVnTuHP3bzQBwDENiOL0IYJvAQbb8AKcD4XW', NULL, 1, NULL, NULL, '2014-08-16 01:21:57', '$2y$10$azsoh1CZ/qZf4ObXcZZB9eTqaFeeuXW9JOuRPzEgH2qzY7kZCGopq', NULL, 'Jhon', 'Doe', '2014-08-16 01:18:49', '2014-08-16 01:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_pregunta`
--

DROP TABLE IF EXISTS `user_pregunta`;
CREATE TABLE IF NOT EXISTS `user_pregunta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `preguntas_id` int(11) NOT NULL,
  `respuesta` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verdepaginas`
--

DROP TABLE IF EXISTS `verdepaginas`;
CREATE TABLE IF NOT EXISTS `verdepaginas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pagina_actual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terminado` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `verdepaginas`
--

INSERT INTO `verdepaginas` (`id`, `user_id`, `pagina_actual`, `terminado`, `created_at`, `updated_at`) VALUES
(1, 2, '5', 0, '2014-08-16 01:19:50', '2014-08-16 01:21:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
