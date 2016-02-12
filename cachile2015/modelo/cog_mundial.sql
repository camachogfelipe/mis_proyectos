-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2014 a las 14:31:40
-- Versión del servidor: 5.1.68-community-log
-- Versión de PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `C270150_mundialbrasil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_api_oauth`
--

DROP TABLE IF EXISTS `cms_api_oauth`;
CREATE TABLE IF NOT EXISTS `cms_api_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strategy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `active_oauth` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cms_api_oauth`
--

INSERT INTO `cms_api_oauth` (`id`, `name`, `provider`, `strategy`, `api_key`, `api_secret`, `scope`, `active`, `active_oauth`) VALUES
(1, 'Facebook', 'facebook', 'oauth2', '1416132521932785', '335e4e5e18413ce88244a2bd0be4f226', 'offline_access,email,publish_stream,manage_pages', 1, 1),
(2, 'Twitter', 'twitter', 'oauth1', 'oaUPjhYWiIETQBNrvt3XfQ', 'kPsTns4nNWAhcnNyP6TtWP02lEgiRQRevfDdHF5Qw4U', '', 1, 1),
(3, 'Google', 'google', 'oauth2', '1073082606021.apps.googleusercontent.com', 'dZgio_ypJkpmQEUBjwK1FYGQ', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_calendario`
--

DROP TABLE IF EXISTS `cms_calendario`;
CREATE TABLE IF NOT EXISTS `cms_calendario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` char(12) NOT NULL,
  `equipo1_id` int(11) DEFAULT NULL,
  `equipo2_id` int(11) DEFAULT NULL,
  `goles_equipo1` tinyint(2) DEFAULT NULL,
  `goles_equipo2` tinyint(2) DEFAULT NULL,
  `fase` enum('GRUPOS','OCTAVOS','CUARTOS','SEMIFINAL','FINAL') NOT NULL DEFAULT 'GRUPOS',
  PRIMARY KEY (`id`),
  KEY `equipo1_id` (`equipo1_id`),
  KEY `equipo2_id` (`equipo2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `cms_calendario`
--

INSERT INTO `cms_calendario` (`id`, `fecha`, `hora`, `equipo1_id`, `equipo2_id`, `goles_equipo1`, `goles_equipo2`, `fase`) VALUES
(1, '2014-06-12', '03:00 PM', 5, 7, 3, 1, 'GRUPOS'),
(2, '2014-06-13', '11:00 AM', 8, 6, 1, 0, 'GRUPOS'),
(3, '2014-06-13', '02:00 PM', 11, 12, 1, 5, 'GRUPOS'),
(4, '2014-06-13', '05:00 PM', 10, 9, 3, 1, 'GRUPOS'),
(5, '2014-06-14', '11:00 AM', 13, 15, 3, 0, 'GRUPOS'),
(6, '2014-06-14', '02:00 PM', 20, 17, 1, 3, 'GRUPOS'),
(7, '2014-06-14', '04:00 PM', 18, 19, 1, 2, 'GRUPOS'),
(8, '2014-06-14', '08:00 PM', 14, 16, 2, 1, 'GRUPOS'),
(9, '2014-06-15', '11:00 AM', 24, 21, 2, 1, 'GRUPOS'),
(10, '2014-06-15', '02:00 PM', 22, 23, 3, 0, 'GRUPOS'),
(11, '2014-06-15', '05:00 PM', 25, 26, 2, 1, 'GRUPOS'),
(12, '2014-06-16', '11:00 AM', 29, 32, 4, 0, 'GRUPOS'),
(13, '2014-06-16', '02:00 PM', 27, 28, 0, 0, 'GRUPOS'),
(14, '2014-06-16', '05:00 PM', 31, 30, 1, 2, 'GRUPOS'),
(15, '2014-06-17', '11:00 AM', 34, 33, 2, 1, 'GRUPOS'),
(16, '2014-06-17', '02:00 PM', 5, 8, 0, 0, 'GRUPOS'),
(17, '2014-06-17', '05:00 PM', 36, 35, 1, 1, 'GRUPOS'),
(18, '2014-06-18', '11:00 AM', 9, 12, 2, 3, 'GRUPOS'),
(19, '2014-06-18', '02:00 PM', 11, 10, 0, 2, 'GRUPOS'),
(20, '2014-06-18', '05:00 PM', 6, 7, 0, 4, 'GRUPOS'),
(21, '2014-06-19', '11:00 AM', 13, 14, 2, 1, 'GRUPOS'),
(22, '2014-06-19', '02:00 PM', 20, 18, 2, 1, 'GRUPOS'),
(23, '2014-06-19', '05:00 PM', 16, 15, 0, 0, 'GRUPOS'),
(24, '2014-06-20', '11:00 AM', 19, 17, 0, 1, 'GRUPOS'),
(25, '2014-06-20', '02:00 PM', 24, 22, 2, 5, 'GRUPOS'),
(26, '2014-06-20', '05:00 PM', 23, 21, 1, 2, 'GRUPOS'),
(27, '2014-06-21', '11:00 AM', 25, 27, 1, 0, 'GRUPOS'),
(28, '2014-06-21', '02:00 PM', 29, 31, 2, 2, 'GRUPOS'),
(29, '2014-06-21', '04:00 PM', 28, 26, 1, 0, 'GRUPOS'),
(30, '2014-06-22', '11:00 AM', 34, 36, 1, 0, 'GRUPOS'),
(31, '2014-06-22', '02:00 PM', 35, 33, 2, 4, 'GRUPOS'),
(32, '2014-06-22', '04:00 PM', 30, 32, 2, 2, 'GRUPOS'),
(33, '2014-06-23', '11:00 AM', 12, 10, 2, 0, 'GRUPOS'),
(34, '2014-06-23', '11:00 AM', 9, 11, 0, 3, 'GRUPOS'),
(35, '2014-06-23', '03:00 PM', 6, 5, 1, 4, 'GRUPOS'),
(36, '2014-06-23', '03:00 PM', 7, 8, 1, 3, 'GRUPOS'),
(37, '2014-06-24', '11:00 AM', 19, 20, 0, 1, 'GRUPOS'),
(38, '2014-06-24', '11:00 AM', 17, 18, 0, 0, 'GRUPOS'),
(39, '2014-06-24', '03:00 PM', 16, 13, NULL, NULL, 'GRUPOS'),
(40, '2014-06-24', '03:00 PM', 15, 14, NULL, NULL, 'GRUPOS'),
(41, '2014-06-25', '11:00 AM', 28, 25, NULL, NULL, 'GRUPOS'),
(42, '2014-06-25', '11:00 AM', 26, 27, NULL, NULL, 'GRUPOS'),
(43, '2014-06-25', '02:00 PM', 23, 24, NULL, NULL, 'GRUPOS'),
(44, '2014-06-25', '03:00 PM', 21, 22, NULL, NULL, 'GRUPOS'),
(45, '2014-06-26', '11:00 AM', 32, 31, NULL, NULL, 'GRUPOS'),
(46, '2014-06-26', '11:00 AM', 30, 29, NULL, NULL, 'GRUPOS'),
(47, '2014-06-26', '03:00 PM', 35, 34, NULL, NULL, 'GRUPOS'),
(48, '2014-06-26', '03:00 PM', 33, 36, NULL, NULL, 'GRUPOS'),
(49, '2014-06-28', '11:00 AM', 5, 10, NULL, NULL, 'OCTAVOS'),
(50, '2014-06-29', '11:00 AM', 12, 8, NULL, NULL, 'OCTAVOS'),
(51, '2014-06-28', '03:00 PM', NULL, 20, NULL, NULL, 'OCTAVOS'),
(52, '2014-06-29', '03:00 PM', 17, NULL, NULL, NULL, 'OCTAVOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_contacto`
--

DROP TABLE IF EXISTS `cms_contacto`;
CREATE TABLE IF NOT EXISTS `cms_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cordenada_x` double NOT NULL DEFAULT '0',
  `cordenada_y` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cms_contacto`
--

INSERT INTO `cms_contacto` (`id`, `direccion`, `telefono`, `fax`, `celular`, `email`, `ciudad`, `cordenada_x`, `cordenada_y`) VALUES
(1, 'Carrera 14B No. 161 54 T14 AP302', '+ 57 320 318 40 40', '+ 57 (1) 673 8631', '+ 57 (1) 673 6831', 'cms@cogroupsas.com', 'Bogotá - Colombia', 4.678391, -74.053883);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_equipo`
--

DROP TABLE IF EXISTS `cms_equipo`;
CREATE TABLE IF NOT EXISTS `cms_equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupo_id` (`grupo_id`),
  KEY `imagen_id` (`imagen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `cms_equipo`
--

INSERT INTO `cms_equipo` (`id`, `nombre`, `grupo_id`, `imagen_id`) VALUES
(5, 'Brasil', 1, 1),
(6, 'Camerún', 1, 2),
(7, 'Croacia', 1, 3),
(8, 'México', 1, 4),
(9, 'Australia', 2, 5),
(10, 'Chile', 2, 6),
(11, 'España', 2, 7),
(12, 'Países bajos', 2, 8),
(13, 'Colombia', 3, 9),
(14, 'Costa de marfil', 3, 26),
(15, 'Grecia', 3, 11),
(16, 'Japón', 3, 12),
(17, 'Costa rica', 4, 17),
(18, 'Inglaterra', 4, 14),
(19, 'Italia', 4, 15),
(20, 'Uruguay', 4, 16),
(21, 'Ecuador', 5, 18),
(22, 'Francia', 5, 19),
(23, 'Honduras', 5, 20),
(24, 'Suiza', 5, 21),
(25, 'Argentina', 6, 22),
(26, 'Boznia y herzegovina', 6, 23),
(27, 'Irán', 6, 24),
(28, 'Nigeria', 6, 25),
(29, 'Alemania', 7, 27),
(30, 'Estados Unidos', 7, 28),
(31, 'Ghana', 7, 29),
(32, 'Portugal', 7, 30),
(33, 'Argelia', 8, 31),
(34, 'Bélgica', 8, 32),
(35, 'República de corea', 8, 33),
(36, 'Rusia', 8, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_groups`
--

DROP TABLE IF EXISTS `cms_groups`;
CREATE TABLE IF NOT EXISTS `cms_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cms_groups`
--

INSERT INTO `cms_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Super Administrador'),
(2, 'admin', 'Administrador'),
(3, 'usuarios', 'Usuarios'),
(4, 'cliente', 'Cliente'),
(5, 'proveedor', 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_groups_permissions`
--

DROP TABLE IF EXISTS `cms_groups_permissions`;
CREATE TABLE IF NOT EXISTS `cms_groups_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `permission_id` int(11) NOT NULL,
  `view` tinyint(1) DEFAULT '0',
  `create` tinyint(1) DEFAULT '0',
  `update` tinyint(1) DEFAULT '0',
  `delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_cms_users_permissions_cms_permissions1_idx` (`permission_id`),
  KEY `fk_cms_groups_permissions_cms_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cms_groups_permissions`
--

INSERT INTO `cms_groups_permissions` (`id`, `group_id`, `permission_id`, `view`, `create`, `update`, `delete`) VALUES
(5, 1, 1, 1, 1, 1, 1),
(6, 1, 2, 1, 1, 1, 1),
(7, 2, 1, 1, 0, 0, 0),
(8, 2, 2, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_grupos`
--

DROP TABLE IF EXISTS `cms_grupos`;
CREATE TABLE IF NOT EXISTS `cms_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cms_grupos`
--

INSERT INTO `cms_grupos` (`id`, `nombre`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_imagen`
--

DROP TABLE IF EXISTS `cms_imagen`;
CREATE TABLE IF NOT EXISTS `cms_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'inputhidden|none',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `cms_imagen`
--

INSERT INTO `cms_imagen` (`id`, `path`, `name`) VALUES
(1, './uploads/29dd029167ec4223df3a4bf318e7d5c7.png', NULL),
(2, './uploads/fd411aa6e2f1425163f6b26cce0cb136.png', NULL),
(3, './uploads/8bd87518daf025710196856a413e0c4e.png', NULL),
(4, './uploads/487633e3ff1ca77274375ac56e889ddc.png', NULL),
(5, './uploads/627e4217b5ba1dec8ef8eeedfa497ba7.png', NULL),
(6, './uploads/afb47500e152ae5dc62298efde0ad83d.png', NULL),
(7, './uploads/19faac4e88862c5974e8ae4a583201ed.png', NULL),
(8, './uploads/e1c1e11c9381f948b57310682fbbf711.png', NULL),
(9, './uploads/9dbe611763787b211c0edf636fa8f065.png', NULL),
(10, './uploads/8441360c8f8016b6d1ba8f666eeed4ab.png', NULL),
(11, './uploads/ae96ba7a869af0870fb2c7bcf5af9ba3.png', NULL),
(12, './uploads/fd7834f888b88c4dfd5c893584860f29.png', NULL),
(13, './uploads/bd9def77808704b0d7b8773562378fd8.png', NULL),
(14, './uploads/8d2b4a258f9f33c93e46b7a33ef7a44a.png', NULL),
(15, './uploads/5ed47987bf2d7208785c1ab429371175.png', NULL),
(16, './uploads/a40350c208ff96ad49b6a45d5ace0a67.png', NULL),
(17, './uploads/9a99ec08cb417a6c50495b4067a00d26.png', NULL),
(18, './uploads/3b32f84201611b2af569e51a3d9460f1.png', NULL),
(19, './uploads/ac0d5532e0eec08dbe6a0de754b2cf49.png', NULL),
(20, './uploads/826e2f85484f847bcd7e0c908a52ec10.png', NULL),
(21, './uploads/cf68285799f6dea71f1c8e98fe1323c1.png', NULL),
(22, './uploads/f4ced6b514da29deec17cf3297851fe9.png', NULL),
(23, './uploads/db41c4655d1e00905550d105900a79af.png', NULL),
(24, './uploads/564f256d9c4d22c00c8d24818babadf2.png', NULL),
(25, './uploads/6e9b64a76f85159cc7a7c10e2d2d5f86.png', NULL),
(26, './uploads/6e77e43f21cd63a43a32050bb3900dfe.png', NULL),
(27, './uploads/bf01dc40197b9adbf1777317b2bd093a.png', NULL),
(28, './uploads/c870183e3f9f32501f42239fe1df9434.png', NULL),
(29, './uploads/5f8de6c215c2ab6f6f313c43ebe5c959.png', NULL),
(30, './uploads/f14d572c6f0834e5634d2f88ffff5d44.png', NULL),
(31, './uploads/f99a1260c46d40cff1c01de1c23018a4.png', NULL),
(32, './uploads/ffe6c6da6ca3c887ab06b20c4acd4cc2.png', NULL),
(33, './uploads/aa55936795490fa648b30919fbeeac68.png', NULL),
(34, './uploads/eee3935858727c64def3583f236eaab0.png', NULL),
(35, './uploads/5c352e590422f02bc583bcec7c29debb.png', NULL),
(36, './uploads/40786d7663a4d4da4a81e169aba90517.png', NULL),
(37, './uploads/2ebcad910f70d662bc21ca71683fad04.png', NULL),
(38, './uploads/c91028e2188d52d40a6d1273f299875d.png', NULL),
(39, './uploads/33d190dc78cc6b4d1c373b2d258997eb.png', NULL),
(40, './uploads/80b8ea4c66479b30eafc0779a6c9a135.png', NULL),
(41, './uploads/babfb797fba5531b58d6e4a679bcd427.png', NULL),
(42, './uploads/66a4058893fc41abff609c305d57c9d0.png', NULL),
(43, './uploads/72b0cf6f2750c5c84104667fb257609c.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_login_attempts`
--

DROP TABLE IF EXISTS `cms_login_attempts`;
CREATE TABLE IF NOT EXISTS `cms_login_attempts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menu`
--

DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE IF NOT EXISTS `cms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_short` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_oauth_config`
--

DROP TABLE IF EXISTS `cms_oauth_config`;
CREATE TABLE IF NOT EXISTS `cms_oauth_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `var` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cms_oauth_config`
--

INSERT INTO `cms_oauth_config` (`id`, `uri`, `var`) VALUES
(1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_permissions`
--

DROP TABLE IF EXISTS `cms_permissions`;
CREATE TABLE IF NOT EXISTS `cms_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `var` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('module','function','component') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `cms_permissions`
--

INSERT INTO `cms_permissions` (`id`, `name`, `var`, `type`) VALUES
(1, 'Permisos', 'cms_admin_perms', 'module'),
(2, 'Oauth', 'cms_config_oauth', 'module'),
(3, 'admin', 'cms_admin', 'module'),
(4, 'backup_db', 'cms_backup_db', 'module'),
(5, 'contactos', 'cms_contactos', 'module'),
(6, 'dashboard', 'cms_dashboard', 'module'),
(7, 'generator_front_modules', 'cms_generator_front_modules', 'module'),
(8, 'generator_models', 'cms_generator_models', 'module'),
(9, 'generator_modules', 'cms_generator_modules', 'module'),
(10, 'login', 'cms_login', 'module'),
(11, 'perms', 'cms_perms', 'module'),
(12, 'users', 'cms_users', 'module');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_posiciones`
--

DROP TABLE IF EXISTS `cms_posiciones`;
CREATE TABLE IF NOT EXISTS `cms_posiciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipo_id` int(11) NOT NULL,
  `pts` tinyint(3) NOT NULL DEFAULT '0',
  `pj` tinyint(3) NOT NULL DEFAULT '0',
  `pg` tinyint(3) NOT NULL DEFAULT '0',
  `pe` tinyint(3) NOT NULL DEFAULT '0',
  `pp` tinyint(3) NOT NULL DEFAULT '0',
  `gf` tinyint(3) NOT NULL DEFAULT '0',
  `gc` tinyint(3) NOT NULL DEFAULT '0',
  `dg` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `equipo_id` (`equipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `cms_posiciones`
--

INSERT INTO `cms_posiciones` (`id`, `equipo_id`, `pts`, `pj`, `pg`, `pe`, `pp`, `gf`, `gc`, `dg`) VALUES
(2, 5, 7, 3, 2, 1, 0, 7, 2, 5),
(3, 6, 0, 3, 0, 0, 3, 1, 9, -8),
(4, 7, 3, 3, 1, 0, 2, 6, 6, 0),
(5, 8, 7, 3, 2, 1, 0, 4, 1, 3),
(6, 9, 0, 3, 0, 0, 3, 3, 9, -6),
(7, 10, 6, 3, 2, 0, 1, 5, 3, 2),
(8, 11, 3, 3, 1, 0, 2, 4, 7, -3),
(9, 12, 9, 3, 3, 0, 0, 10, 3, 7),
(10, 13, 6, 2, 2, 0, 0, 5, 1, 4),
(11, 14, 3, 2, 1, 0, 1, 3, 3, 0),
(12, 15, 1, 2, 0, 1, 1, 0, 3, -3),
(13, 16, 1, 2, 0, 1, 1, 1, 2, -1),
(14, 17, 7, 3, 2, 1, 0, 4, 1, 3),
(15, 18, 1, 3, 0, 1, 2, 2, 4, -2),
(16, 19, 3, 3, 1, 0, 2, 2, 3, -1),
(17, 20, 6, 3, 2, 0, 1, 4, 4, 0),
(18, 21, 3, 2, 1, 0, 1, 3, 3, 0),
(19, 22, 6, 2, 2, 0, 0, 8, 2, 6),
(20, 23, 0, 2, 0, 0, 2, 1, 5, -4),
(21, 24, 3, 2, 1, 0, 1, 4, 6, -2),
(22, 25, 6, 2, 2, 0, 0, 3, 1, 2),
(23, 26, 0, 2, 0, 0, 2, 1, 3, -2),
(24, 27, 1, 2, 0, 1, 1, 0, 1, -1),
(25, 28, 4, 2, 1, 1, 0, 1, 0, 1),
(26, 29, 4, 2, 1, 1, 0, 6, 2, 4),
(27, 30, 4, 2, 1, 1, 0, 4, 3, 1),
(28, 31, 1, 2, 0, 1, 1, 3, 4, -1),
(29, 32, 1, 2, 0, 1, 1, 2, 6, -4),
(30, 33, 3, 2, 1, 0, 1, 5, 4, 1),
(31, 34, 6, 2, 2, 0, 0, 3, 1, 2),
(32, 35, 1, 2, 0, 1, 1, 3, 5, -2),
(33, 36, 1, 2, 0, 1, 1, 1, 2, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_redes_sociales`
--

DROP TABLE IF EXISTS `cms_redes_sociales`;
CREATE TABLE IF NOT EXISTS `cms_redes_sociales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red_social` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_red` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cms_redes_sociales`
--

INSERT INTO `cms_redes_sociales` (`id`, `red_social`, `link_red`, `fecha_creacion`) VALUES
(0, 'Facebook', 'https://www.facebook.com/cogroupsas', '2014-10-21 16:58:04'),
(2, 'Twitter', 'http://www.twitter.com/camachogfelipe', '2014-10-21 16:58:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_sessions`
--

DROP TABLE IF EXISTS `cms_sessions`;
CREATE TABLE IF NOT EXISTS `cms_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cms_sessions`
--

INSERT INTO `cms_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('06cd5a32cba1b73640499f382c2b52ab', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', 1384835266, 'a:10:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@imaginamos.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";s:16:"page_video_lugar";s:1:"1";s:11:"page_barner";s:1:"1";s:3:"add";s:1:"0";s:6:"editar";s:1:"0";s:6:"delete";s:1:"0";s:19:"page_destacado_home";s:1:"1";}'),
('0bab9f1effdeac0775f72766c45ccc3e', '181.136.188.31', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1403211624, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('0e162099c7f1620c4182a3e023737258', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2054.2 Safari/537.36', 1403097744, 'a:7:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('121e9c1d37f6f8f7f4668a3ab9f8349c', '181.136.188.31', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1403211386, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('26f896f7041be9042f893f62e1211f84', '181.136.188.31', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1403211407, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('28e393995a8185389806fa56679a8579', '65.52.100.214', '0', 1403215688, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('2925d3112e85bec06597f5fbfec42fce', '181.135.196.203', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2066.5 Safari/537.36', 1403634415, 'a:9:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";s:16:"page_calendarios";s:1:"1";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:12:"page_equipos";s:1:"1";}'),
('2d92a0165681539ba7a5b95f976d2b53', '181.136.188.31', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1403252397, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('30950e41ee2a7d153279325408be789b', '181.136.111.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403214389, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('3870a90ff0b6b50a830730d6903582ab', '191.145.229.57', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows Phone 8.0; Trident/6.0; IEMobile/10.0; ARM; Touch; NOKIA; Lumia 520)', 1403481221, 'a:10:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-20 17:41:37";s:16:"page_calendarios";s:1:"1";}'),
('42b5ed282a3b870e8bde144e49dc30d6', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 1394816928, 'a:7:{s:9:"user_data";s:0:"";s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-03-07 18:25:07";s:14:"page_periodoss";s:1:"1";}'),
('46901a85f48378252e3a8525460c0d32', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2056.2 Safari/537.36', 1403189011, 'a:9:{s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-18 14:06:06";s:16:"page_calendarios";s:1:"1";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('4eeb8712bfd10ef291276c1f958906bf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36', 1394249109, ''),
('4ff74c28d5a9f5005a85a9ee4499da56', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2052.0 Safari/537.36', 1403040127, 'a:7:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('5337f324bb9b757f2233f06e56c3ae59', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2054.2 Safari/537.36', 1403113992, 'a:12:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-18 08:22:29";s:16:"page_calendarios";s:1:"1";s:16:"page_posicioness";s:1:"1";s:12:"page_equipos";s:1:"1";}'),
('5d45dca4bc4c2a28ad3a777b24f4eafc', '181.135.119.242', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1403213620, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('62c7f4b0c53f704936668ae363ab6695', '181.135.246.182', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403212783, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('6f914d46a200485bc1da3f413e62c62c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2052.0 Safari/537.36', 1403036310, 'a:11:{s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-16 14:57:59";s:12:"page_gruposs";s:1:"1";s:12:"page_equipos";s:1:"1";s:16:"current_user_one";b:1;s:16:"page_calendarios";s:1:"1";i:0;s:12:"current_page";i:1;s:4:"home";}'),
('700b5bd5c4f86adae508f5f757c644c5', '191.150.89.45', 'Mozilla/5.0 (Linux; Android 4.3; D5503 Build/14.2.A.1.114) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.141 M', 1403208372, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('74f7f8c036f85be2da9d7c4bc31ecf79', '181.48.9.19', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403631996, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('7ac7ee77b0f1e1e2979bdfc6db89bc63', '181.136.111.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403208877, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('7ca1d7140353951df4d4c488fb1f5e05', '181.136.161.222', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1403211370, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('81184a1ec7eb1944842936e4015a5b9e', '65.52.242.216', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', 1403210092, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('859850986522cfa651935be17bc165d3', '69.171.247.112', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 1403207746, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('8b9d85654992811468bdb15421325c15', '181.48.9.19', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1403211596, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('922ce772ec7809f8c78772c811855fdc', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 1394833357, 'a:6:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";s:14:"page_periodoss";s:1:"1";s:13:"page_reunions";s:1:"1";}'),
('92e901d86c8e8c1c128e979071999ba3', '186.29.149.33', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403370295, 'a:9:{s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-20 17:53:04";s:16:"page_calendarios";s:1:"1";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('9a9fc7d9d95819c48bd33f0ec6fcdb4e', '181.135.246.182', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403208341, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('9d3a466263a69739d150fdcddbba0687', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2046.0 Safari/537.36', 1402954686, ''),
('9d8b5f618b98f49c825d1b696a312a03', '181.135.84.92', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2059.2 Safari/537.36', 1403301012, 'a:5:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";s:16:"page_calendarios";s:1:"1";}'),
('a6024075a9effed4f27a43801671ec89', '186.29.149.33', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403404308, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('baa5f770139b25c1fee7542a6cdd1a04', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2054.2 Safari/537.36', 1403098078, ''),
('baac92ec32fac5409fef956d86935b50', '181.136.111.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2056.2 Safari/537.36', 1403211623, ''),
('baecc55bc376d11b9c3bd59f6894d984', '69.171.247.116', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 1403208250, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('bbb56627142025ad7194ad860665fdb8', '54.198.136.86', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:28.0) Gecko/20100101 Firefox/28.0 (FlipboardProxy/1.1; +http://flipboard', 1403264537, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('c0accea448eb466d4582b2265c99a04a', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2052.0 Safari/537.36', 1403040127, 'a:7:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('c731a8663294895d60a5e768979fb749', '181.135.196.203', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2065.0 Safari/537.36', 1403624124, 'a:8:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:16:"page_calendarios";s:1:"1";}'),
('c9015a1e31222cadbbd37582e6d6633b', '181.136.111.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', 1403211373, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('d688f96f73f66688c89b991837a176d6', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 1394228013, 'a:8:{s:9:"user_data";s:0:"";s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-03-07 10:31:13";s:11:"page_actass";s:1:"1";s:12:"page_cursoss";s:1:"1";}'),
('d9581a42fc2e7af97479d7f13d555001', '181.136.229.227', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2058.2 Safari/537.36', 1403296940, 'a:10:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-19 17:49:01";s:16:"page_calendarios";s:1:"1";}'),
('e08bfb23773a70444beb42c5fb7effe9', '186.83.60.164', 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Mobile/11D201 [FBAN/FBI', 1403218674, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('e4f6286fc3b4327e2ddfeda1b236f992', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36', 1394211217, 'a:4:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";}'),
('e9f923299aa6e67da3039cc543fb4ab1', '69.171.230.119', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 1403211547, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}'),
('f10789eb4e012c5275090b74c35e1bf4', '181.135.84.92', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2059.2 Safari/537.36', 1403562260, 'a:10:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:8:"identity";s:18:"cms@cogroupsas.com";s:8:"username";s:13:"administrator";s:5:"email";s:18:"cms@cogroupsas.com";s:7:"user_id";s:1:"5";s:14:"old_last_login";s:19:"2014-06-21 12:04:57";s:16:"page_calendarios";s:1:"1";}'),
('f2e0342c9734c773978670e6e79979d6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2052.0 Safari/537.36', 1403042198, 'a:10:{s:9:"user_data";s:0:"";s:5:"email";s:18:"cms@cogroupsas.com";s:2:"id";s:1:"5";s:7:"user_id";s:1:"5";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;s:16:"page_calendarios";s:1:"1";s:12:"page_equipos";s:1:"1";s:12:"page_gruposs";s:1:"1";}'),
('fa6ea04c429449614d4dac2ff24a1927', '173.252.100.117', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 1403215147, 'a:4:{s:9:"user_data";s:0:"";i:0;s:12:"current_page";i:1;s:4:"home";s:16:"current_user_one";b:1;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_users`
--

DROP TABLE IF EXISTS `cms_users`;
CREATE TABLE IF NOT EXISTS `cms_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celphone` varbinary(20) DEFAULT NULL,
  `profesion_id` int(11) NOT NULL,
  `imagen_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profesion_id` (`profesion_id`),
  KEY `imagen_id` (`imagen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cms_users`
--

INSERT INTO `cms_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `celphone`, `profesion_id`, `imagen_id`) VALUES
(5, '\0\0', 'administrator', '092e624ccaf41c1b9c0dd32a1041043a82507bc7', 'e0efe63787', 'cms@cogroupsas.com', NULL, NULL, NULL, '1218e83c71363e71c292b071dace76d3f56b47af', 1343253917, '2014-06-24 12:47:17', 1, NULL, NULL, NULL, NULL, '320 318 40 40', 1, NULL),
(6, '\0\0', 'Admin CMS', '092e624ccaf41c1b9c0dd32a1041043a82507bc7', 'e0efe63787', 'admin@cogroupsas.com', NULL, NULL, NULL, '1218e83c71363e71c292b071dace76d3f56b47af', 1343253917, '0000-00-00 00:00:00', 2, NULL, NULL, NULL, NULL, '320 318 40 40', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_users_groups`
--

DROP TABLE IF EXISTS `cms_users_groups`;
CREATE TABLE IF NOT EXISTS `cms_users_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_users_groups` (`user_id`),
  KEY `group_users_groups` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cms_users_groups`
--

INSERT INTO `cms_users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 5, 1),
(6, 6, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cms_calendario`
--
ALTER TABLE `cms_calendario`
  ADD CONSTRAINT `cms_calendario_ibfk_1` FOREIGN KEY (`equipo1_id`) REFERENCES `cms_equipo` (`id`),
  ADD CONSTRAINT `cms_calendario_ibfk_2` FOREIGN KEY (`equipo2_id`) REFERENCES `cms_equipo` (`id`);

--
-- Filtros para la tabla `cms_equipo`
--
ALTER TABLE `cms_equipo`
  ADD CONSTRAINT `cms_equipo_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `cms_grupos` (`id`),
  ADD CONSTRAINT `cms_equipo_ibfk_2` FOREIGN KEY (`imagen_id`) REFERENCES `cms_imagen` (`id`);

--
-- Filtros para la tabla `cms_groups_permissions`
--
ALTER TABLE `cms_groups_permissions`
  ADD CONSTRAINT `cms_groups_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `cms_groups` (`id`),
  ADD CONSTRAINT `cms_groups_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `cms_permissions` (`id`);

--
-- Filtros para la tabla `cms_posiciones`
--
ALTER TABLE `cms_posiciones`
  ADD CONSTRAINT `cms_posiciones_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `cms_equipo` (`id`);

--
-- Filtros para la tabla `cms_users`
--
ALTER TABLE `cms_users`
  ADD CONSTRAINT `cms_users_ibfk_1` FOREIGN KEY (`profesion_id`) REFERENCES `cms_profesion` (`id`),
  ADD CONSTRAINT `cms_users_ibfk_2` FOREIGN KEY (`imagen_id`) REFERENCES `cms_imagen` (`id`);

--
-- Filtros para la tabla `cms_users_groups`
--
ALTER TABLE `cms_users_groups`
  ADD CONSTRAINT `cms_users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `cms_users` (`id`),
  ADD CONSTRAINT `cms_users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `cms_groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
