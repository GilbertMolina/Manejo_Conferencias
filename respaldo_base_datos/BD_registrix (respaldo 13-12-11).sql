-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-12-2011 a las 04:09:45
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `registrix`
--

DROP DATABASE IF EXISTS registrix;
CREATE DATABASE registrix DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE registrix;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcategoria`
--

CREATE TABLE IF NOT EXISTS `tcategoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tcategoria`
--

INSERT INTO `tcategoria` (`id_categoria`, `categoria`) VALUES
(1, 'Desarrollo Web'),
(2, 'Base de datos'),
(3, 'Programación'),
(4, 'Navegadores Web'),
(5, 'Servidores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcharla`
--

CREATE TABLE IF NOT EXISTS `tcharla` (
  `id_charla` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_charla` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `esta_aprobada` tinyint(1) DEFAULT '0',
  `duracion` int(11) NOT NULL DEFAULT '0',
  `id_conferencia` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `es_charla` tinyint(1) DEFAULT '1',
  `id_documento` int(11) DEFAULT '0',
  `hora` time NOT NULL,
  `fecha` date DEFAULT NULL,
  `costo_entrada` float(9,3) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_charla`),
  KEY `id_persona` (`id_persona`),
  KEY `id_conferencia` (`id_conferencia`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcar la base de datos para la tabla `tcharla`
--

INSERT INTO `tcharla` (`id_charla`, `titulo_charla`, `descripcion`, `esta_aprobada`, `duracion`, `id_conferencia`, `id_persona`, `es_charla`, `id_documento`, `hora`, `fecha`, `costo_entrada`, `id_categoria`) VALUES
(1, 'Lenguaje PHP', 'Novedades en PHP', 1, 1, 1, 1, 1, 0, '08:00:00', '2011-12-21', 25.000, 1),
(2, 'Lenguaje CSS', 'Novedades en CSS', 1, 2, 1, 5, 1, 0, '09:00:00', '2011-12-21', 30.000, 1),
(3, 'Lenguaje HTML', 'Novedades en HTML', 1, 3, 1, 9, 0, 0, '10:00:00', '2011-12-21', 35.000, 1),
(4, 'Lenguaje JavaScript', 'Novedades en JavaScript', 0, 4, 1, 1, 1, 0, '11:00:00', '2011-12-21', 40.000, 1),
(5, 'Lenguaje JSP', 'Novedades en JSP', 1, 5, 1, 5, 1, 0, '12:00:00', '2011-12-21', 45.000, 1),
(6, 'Base de datos MySQL', 'Novedades en MySQL', 1, 1, 2, 9, 1, 0, '13:00:00', '2011-12-21', 25.000, 2),
(7, 'Base de datos Oracle', 'Novedades en Oracle', 1, 2, 2, 1, 1, 0, '14:00:00', '2011-12-21', 30.000, 2),
(8, 'Base de datos Microsoft SQL Server', 'Novedades en Microsoft SQL Server', 1, 3, 2, 5, 1, 0, '15:00:00', '2011-12-21', 35.000, 2),
(9, 'Base de datos PostgreSQL', 'Novedades en PostgreSQL', 0, 4, 2, 9, 1, 0, '16:00:00', '2011-12-21', 40.000, 2),
(10, 'Base de datos DB2', 'Novedades en DB2', 1, 5, 2, 1, 0, 0, '17:00:00', '2011-12-21', 45.000, 2),
(11, 'Framework Netbeans', 'Novedades en Netbeans', 1, 1, 3, 5, 1, 0, '08:00:00', '2011-12-22', 25.000, 3),
(12, 'Framework Eclipse', 'Novedades en Eclipse', 1, 2, 3, 9, 1, 0, '09:00:00', '2011-12-22', 30.000, 3),
(13, 'Framework JCreator', 'Novedades en JCreator', 0, 3, 3, 1, 1, 0, '10:00:00', '2011-12-22', 35.000, 3),
(14, 'Framework Zend Studio', 'Novedades en Zend Studio', 1, 4, 3, 5, 1, 0, '11:00:00', '2011-12-22', 40.000, 3),
(15, 'Framework Aptana Studio', 'Novedades en Aptana Studio', 1, 5, 3, 9, 0, 0, '12:00:00', '2011-12-22', 45.000, 3),
(16, 'Navegador Web Internet Explorer', 'Novedades en Internet Explorer', 1, 1, 4, 1, 1, 0, '13:00:00', '2011-12-22', 25.000, 4),
(17, 'Navegador Web Firefox', 'Novedades en Firefox', 1, 2, 4, 5, 1, 0, '14:00:00', '2011-12-22', 30.000, 4),
(18, 'Navegador Web Safari', 'Novedades en Safari', 1, 3, 4, 9, 1, 0, '15:00:00', '2011-12-22', 35.000, 4),
(19, 'Navegador Web Opera', 'Novedades en Opera', 0, 4, 4, 1, 1, 0, '16:00:00', '2011-12-22', 40.000, 4),
(20, 'Navegador Web Google Chrome', 'Novedades en Google Chrome', 1, 5, 4, 5, 0, 0, '17:00:00', '2011-12-22', 45.000, 4),
(21, 'Servidor Web Apache', 'Novedades en Apache', 1, 1, 5, 9, 1, 0, '08:00:00', '2011-12-23', 25.000, 5),
(22, 'Servidor Web IIS', 'Novedades en IIS', 1, 2, 5, 1, 1, 0, '09:00:00', '2011-12-23', 30.000, 5),
(23, 'Servidor Web Tomcat', 'Novedades en Tomcat', 1, 3, 5, 5, 1, 0, '10:00:00', '2011-12-23', 35.000, 5),
(24, 'Servidor Web Cherokee', 'Novedades en Cherokee', 0, 4, 5, 9, 0, 0, '11:00:00', '2011-12-23', 40.000, 5),
(25, 'Servidor Web WebLogic', 'Novedades en WebLogic', 1, 5, 5, 1, 1, 0, '12:00:00', '2011-12-23', 45.000, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcharla_tgasto`
--

CREATE TABLE IF NOT EXISTS `tcharla_tgasto` (
  `id_charla` int(11) NOT NULL,
  `id_gasto` int(11) NOT NULL,
  PRIMARY KEY (`id_charla`,`id_gasto`),
  KEY `id_gasto` (`id_gasto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tcharla_tgasto`
--

INSERT INTO `tcharla_tgasto` (`id_charla`, `id_gasto`) VALUES
(1, 10),
(2, 11),
(3, 12),
(4, 13),
(5, 14),
(6, 15),
(7, 16),
(8, 17),
(9, 18),
(10, 19),
(11, 20),
(12, 21),
(13, 22),
(14, 23),
(15, 24),
(16, 25),
(17, 26),
(18, 27),
(19, 28),
(20, 29),
(21, 30),
(22, 31),
(23, 32),
(24, 33),
(25, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcola`
--

CREATE TABLE IF NOT EXISTS `tcola` (
  `id_cola` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_charla` int(11) NOT NULL,
  PRIMARY KEY (`id_cola`),
  KEY `id_persona` (`id_persona`),
  KEY `id_charla` (`id_charla`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tcola`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconferencia`
--

CREATE TABLE IF NOT EXISTS `tconferencia` (
  `id_conferencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `titulo_conferencia` varchar(200) NOT NULL,
  `localidad` text,
  `presupuesto_conferencia` float(12,3) DEFAULT '0.000',
  PRIMARY KEY (`id_conferencia`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tconferencia`
--

INSERT INTO `tconferencia` (`id_conferencia`, `fecha_inicio`, `fecha_finalizacion`, `titulo_conferencia`, `localidad`, `presupuesto_conferencia`) VALUES
(1, '2011-12-21', '2011-12-21', 'Uso óptimo de lenguajes de programación', 'UCR, auditorio 1', 800000.000),
(2, '2011-12-21', '2011-12-21', 'Novedades en bases de datos relacionales', 'UNA, auditorio 1', 900000.000),
(3, '2011-12-22', '2011-12-22', 'Que framework se adecua más a su trabajo', 'U Fidélitas, auditorio 2', 700000.000),
(4, '2011-12-22', '2011-12-22', 'Qué hay de nuevo en los navegadores web', 'UNA, auditorio 2', 750000.000),
(5, '2011-12-23', '2011-12-23', 'Servidores web más utilizados en la última década', 'Ulatina, auditorio 1', 950000.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconferencia_tgasto`
--

CREATE TABLE IF NOT EXISTS `tconferencia_tgasto` (
  `id_conferencia` int(11) NOT NULL,
  `id_gasto` int(11) NOT NULL,
  PRIMARY KEY (`id_conferencia`,`id_gasto`),
  KEY `id_gasto` (`id_gasto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tconferencia_tgasto`
--

INSERT INTO `tconferencia_tgasto` (`id_conferencia`, `id_gasto`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconferencia_tproveedor`
--

CREATE TABLE IF NOT EXISTS `tconferencia_tproveedor` (
  `id_proveedor` int(11) NOT NULL,
  `id_conferencia` int(11) NOT NULL,
  `costo_para_conferencia` float(9,3) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`,`id_conferencia`),
  KEY `id_conferencia` (`id_conferencia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tconferencia_tproveedor`
--

INSERT INTO `tconferencia_tproveedor` (`id_proveedor`, `id_conferencia`, `costo_para_conferencia`) VALUES
(1, 1, 220000.000),
(3, 2, 60000.000),
(5, 3, 75000.000),
(4, 4, 60000.000),
(2, 5, 35670.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tconferencista_tgasto`
--

CREATE TABLE IF NOT EXISTS `tconferencista_tgasto` (
  `id_persona` int(11) NOT NULL,
  `id_gasto` int(11) NOT NULL,
  PRIMARY KEY (`id_persona`,`id_gasto`),
  KEY `id_gasto` (`id_gasto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tconferencista_tgasto`
--

INSERT INTO `tconferencista_tgasto` (`id_persona`, `id_gasto`) VALUES
(1, 7),
(5, 8),
(9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcupo`
--

CREATE TABLE IF NOT EXISTS `tcupo` (
  `id_cupo` int(11) NOT NULL AUTO_INCREMENT,
  `capacidad_charlas` int(11) DEFAULT '0',
  `ocupados` int(11) NOT NULL,
  PRIMARY KEY (`id_cupo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcar la base de datos para la tabla `tcupo`
--

INSERT INTO `tcupo` (`id_cupo`, `capacidad_charlas`, `ocupados`) VALUES
(1, 50, 50),
(2, 60, 60),
(3, 70, 1),
(4, 80, 1),
(5, 90, 1),
(6, 50, 1),
(7, 60, 1),
(8, 70, 1),
(9, 80, 1),
(10, 90, 1),
(11, 50, 1),
(12, 60, 1),
(13, 70, 1),
(14, 80, 1),
(15, 90, 1),
(16, 50, 1),
(17, 60, 1),
(18, 70, 1),
(19, 80, 1),
(20, 90, 1),
(21, 50, 1),
(22, 60, 1),
(23, 70, 1),
(24, 80, 1),
(25, 90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcupo_tcharla`
--

CREATE TABLE IF NOT EXISTS `tcupo_tcharla` (
  `id_charla` int(11) NOT NULL,
  `id_cupo` int(11) NOT NULL,
  PRIMARY KEY (`id_charla`,`id_cupo`),
  KEY `id_cupo` (`id_cupo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tcupo_tcharla`
--

INSERT INTO `tcupo_tcharla` (`id_charla`, `id_cupo`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocumento`
--

CREATE TABLE IF NOT EXISTS `tdocumento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `archivo` blob NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `peso` varchar(15) NOT NULL DEFAULT '',
  `tipo` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_documento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tdocumento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tgasto`
--

CREATE TABLE IF NOT EXISTS `tgasto` (
  `id_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `costo` float(9,3) DEFAULT '0.000',
  `hospedaje_duracion` int(11) DEFAULT '0',
  `hospedaje_lugar` varchar(150) DEFAULT 'N/A',
  `transporte_origen` varchar(150) DEFAULT 'N/A',
  `esta_aprobado` tinyint(1) DEFAULT NULL,
  `id_tipo_gasto` int(11) NOT NULL,
  PRIMARY KEY (`id_gasto`),
  KEY `id_tipo_gasto` (`id_tipo_gasto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcar la base de datos para la tabla `tgasto`
--

INSERT INTO `tgasto` (`id_gasto`, `descripcion`, `costo`, `hospedaje_duracion`, `hospedaje_lugar`, `transporte_origen`, `esta_aprobado`, `id_tipo_gasto`) VALUES
(1, 'Hospedaje', 300000.000, 2, 'Hotel Allegro Papagayo', 'Costa Rica', 1, 1),
(2, 'Transporte', 250000.000, 2, 'Hotel Flamingo Beach', 'Argentina', 1, 2),
(3, 'Alimentacion', 250000.000, 2, 'Hotel Terraza del Pacífico', 'Brasil', 1, 3),
(4, 'N/A', 220000.000, 0, 'N/A', 'N/A', 1, 4),
(5, 'N/A', 600000.000, 0, 'N/A', 'N/A', 1, 5),
(6, 'N/A', 100000.000, 0, 'N/A', 'N/A', 1, 6),
(7, 'Hospedaje', 175000.000, 2, 'Hotel Tamarindo', 'Paraguay', 1, 7),
(8, 'Transporte', 227000.000, 2, 'Hotel Papagayo', 'Mexico', 1, 8),
(9, 'Alimentacion', 558000.000, 2, 'Hotel Tambor', 'Portugal', 1, 9),
(10, 'N/A', 213000.000, 0, 'N/A', 'N/A', 1, 13),
(11, 'N/A', 186000.000, 0, 'N/A', 'N/A', 1, 14),
(12, 'N/A', 134000.000, 0, 'N/A', 'N/A', 1, 15),
(13, 'N/A', 123000.000, 0, 'N/A', 'N/A', 1, 16),
(14, 'N/A', 189000.000, 0, 'N/A', 'N/A', 1, 17),
(15, 'N/A', 163000.000, 0, 'N/A', 'N/A', 1, 18),
(16, 'N/A', 127000.000, 0, 'N/A', 'N/A', 1, 13),
(17, 'N/A', 196000.000, 0, 'N/A', 'N/A', 1, 14),
(18, 'N/A', 205000.000, 0, 'N/A', 'N/A', 1, 15),
(19, 'N/A', 171000.000, 0, 'N/A', 'N/A', 1, 16),
(20, 'N/A', 218000.000, 0, 'N/A', 'N/A', 1, 17),
(21, 'N/A', 143000.000, 0, 'N/A', 'N/A', 1, 18),
(22, 'N/A', 224000.000, 0, 'N/A', 'N/A', 1, 13),
(23, 'N/A', 254000.000, 0, 'N/A', 'N/A', 1, 14),
(24, 'N/A', 109200.000, 0, 'N/A', 'N/A', 1, 15),
(25, 'N/A', 187000.000, 0, 'N/A', 'N/A', 1, 16),
(26, 'N/A', 142000.000, 0, 'N/A', 'N/A', 1, 17),
(27, 'N/A', 129000.000, 0, 'N/A', 'N/A', 1, 18),
(28, 'N/A', 282000.000, 0, 'N/A', 'N/A', 1, 13),
(29, 'N/A', 159500.000, 0, 'N/A', 'N/A', 1, 14),
(30, 'N/A', 191000.000, 0, 'N/A', 'N/A', 1, 15),
(31, 'N/A', 283000.000, 0, 'N/A', 'N/A', 1, 16),
(32, 'N/A', 104000.000, 0, 'N/A', 'N/A', 1, 17),
(33, 'N/A', 274000.000, 0, 'N/A', 'N/A', 1, 18),
(34, 'N/A', 232000.000, 0, 'N/A', 'N/A', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tidioma`
--

CREATE TABLE IF NOT EXISTS `tidioma` (
  `id_idioma` int(11) NOT NULL,
  `nombre_idioma` varchar(50) NOT NULL,
  PRIMARY KEY (`id_idioma`),
  UNIQUE KEY `nombre_idioma` (`nombre_idioma`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tidioma`
--

INSERT INTO `tidioma` (`id_idioma`, `nombre_idioma`) VALUES
(1, 'Afrikaans'),
(2, 'Albano'),
(3, 'Alemán'),
(4, 'Amhárico'),
(5, 'Árabe'),
(6, 'Armenio'),
(7, 'Azeri'),
(8, 'Bahasa'),
(9, 'Bengalés'),
(10, 'Bengla'),
(11, 'Bosnio'),
(12, 'Búlgaro'),
(13, 'Catalán'),
(14, 'Chamorro'),
(15, 'Checo'),
(16, 'Chino'),
(17, 'Cingalés'),
(18, 'Coreano'),
(19, 'Croata'),
(20, 'Danés'),
(21, 'Eslovaco'),
(22, 'Esloveno'),
(23, 'Español'),
(24, 'Estonio'),
(25, 'Euskera'),
(26, 'Faroés'),
(27, 'Finlandés'),
(28, 'Filipino'),
(29, 'Francés'),
(30, 'Frisian'),
(31, 'Gaélico escocés'),
(32, 'Gaélico Irlandés'),
(33, 'Galés'),
(34, 'Gallego'),
(35, 'Georgiano'),
(36, 'German'),
(37, 'Griego'),
(38, 'Hebreo'),
(39, 'Hindi'),
(40, 'Holandés'),
(41, 'Húngaro'),
(42, 'Indonesio'),
(43, 'Inglés'),
(44, 'Islandés'),
(45, 'Italiano'),
(46, 'Japonés'),
(47, 'Javanés'),
(48, 'Kazajo'),
(49, 'Kirghís'),
(50, 'Kurdo'),
(51, 'Laot'),
(52, 'Letón'),
(53, 'Lituano'),
(54, 'Macedonio'),
(55, 'Malayo Bahasa'),
(56, 'Maltés'),
(57, 'Marati'),
(58, 'Mongol'),
(59, 'Mongolien'),
(60, 'Nepali'),
(61, 'Noruego (Bokmål)'),
(62, 'Noruego (Nynorsk)'),
(63, 'Occitano'),
(64, 'Persa'),
(65, 'Polaco'),
(66, 'Portugués'),
(67, 'Punjabi'),
(68, 'Roumano'),
(69, 'Rumano'),
(70, 'Ruso'),
(71, 'Serbio'),
(72, 'Sesotho'),
(73, 'Sindhi'),
(74, 'Somalí'),
(75, 'Suahili'),
(76, 'Sueco'),
(77, 'Tagalo'),
(78, 'Tailandés'),
(79, 'Tamil'),
(80, 'Telegu'),
(81, 'Tigrinya'),
(82, 'Turco'),
(83, 'Turcomano'),
(84, 'Ucraniano'),
(85, 'Uigur'),
(86, 'Uzbeko'),
(87, 'Vietnamita'),
(88, 'Xhosa'),
(89, 'Zoulou'),
(90, 'Zulú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titinerario_conferencista`
--

CREATE TABLE IF NOT EXISTS `titinerario_conferencista` (
  `id_itinerario` int(11) NOT NULL AUTO_INCREMENT,
  `medio_transporte` varchar(50) NOT NULL,
  `lugar_hospedaje` varchar(50) NOT NULL,
  `duracion_hospedaje` varchar(50) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_conferencia` int(11) NOT NULL,
  `id_gasto` int(11) NOT NULL,
  PRIMARY KEY (`id_itinerario`),
  KEY `id_conferencia` (`id_conferencia`),
  KEY `id_gasto` (`id_gasto`),
  KEY `id_persona` (`id_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `titinerario_conferencista`
--

INSERT INTO `titinerario_conferencista` (`id_itinerario`, `medio_transporte`, `lugar_hospedaje`, `duracion_hospedaje`, `id_persona`, `id_conferencia`, `id_gasto`) VALUES
(1, 'Automóvil', 'Hotel Allegro Papagayo', '2', 1, 1, 1),
(2, 'Avión', 'Hotel Flamingo Beach', '1', 5, 2, 2),
(3, 'Tren', 'Hotel Terraza del Pacífico', '2', 9, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlugar`
--

CREATE TABLE IF NOT EXISTS `tlugar` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `capacidad_lugar` int(11) DEFAULT '0',
  `nombre_lugar` char(20) NOT NULL,
  PRIMARY KEY (`id_lugar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tlugar`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnivel_persona`
--

CREATE TABLE IF NOT EXISTS `tnivel_persona` (
  `id_nivel_persona` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nivel_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tnivel_persona`
--

INSERT INTO `tnivel_persona` (`id_nivel_persona`, `titulo`, `ruta`) VALUES
(1, 'Conferencista', '../index_conferencista'),
(2, 'Organizador', '../index_administrador'),
(3, 'Staff', '../index_staff'),
(4, 'Asistente', '../index_asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torden_proveedor`
--

CREATE TABLE IF NOT EXISTS `torden_proveedor` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `monto_factura` float(9,3) NOT NULL,
  `orden_pagada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `torden_proveedor`
--

INSERT INTO `torden_proveedor` (`id_orden`, `id_proveedor`, `numero_factura`, `fecha`, `monto_factura`, `orden_pagada`) VALUES
(1, 1, 1, '2011-12-13 03:35:10', 220000.000, 0),
(2, 2, 2, '2011-12-12 20:43:23', 35670.000, 0),
(3, 3, 3, '2011-12-12 18:25:49', 60000.000, 0),
(4, 4, 4, '2011-12-13 00:52:14', 200000.000, 0),
(5, 5, 5, '2011-12-12 22:03:48', 130000.000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpais`
--

CREATE TABLE IF NOT EXISTS `tpais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `id_region` int(11) NOT NULL,
  `nombre_pais` varchar(100) DEFAULT NULL,
  `idioma_oficial` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_pais`),
  KEY `id_region` (`id_region`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

--
-- Volcar la base de datos para la tabla `tpais`
--

INSERT INTO `tpais` (`id_pais`, `id_region`, `nombre_pais`, `idioma_oficial`) VALUES
(1, 7, 'Albania', 'Albano'),
(2, 8, 'Alemania', 'Alemán'),
(3, 1, 'Angola', 'Portugués'),
(4, 6, 'Anguila', 'Inglés'),
(5, 6, 'Antigua y Barbuda', 'Inglés'),
(6, 9, 'Arabia Saudita', 'Árabe'),
(7, 4, 'Argentina', 'Español'),
(8, 5, 'Armenia', 'Armenio'),
(9, 10, 'Australia', 'Inglés'),
(10, 8, 'Austria', 'Alemán'),
(11, 5, 'Azerbaijan', 'Azeri'),
(12, 5, 'Bangladesh', 'Bengalés'),
(13, 7, 'Belarús', 'Ruso'),
(14, 8, 'Bélgica', 'Francés'),
(15, 2, 'Belice', 'Español'),
(16, 4, 'Bolivia', 'Español'),
(17, 7, 'Bosnia Herzegovina', 'Bosnio'),
(18, 4, 'Brasil', 'Portugués'),
(19, 7, 'Bulgaria', 'Búlgaro'),
(20, 1, 'Burundi', 'Francés'),
(21, 5, 'Camboya', 'Vietnamita'),
(22, 3, 'Canadá', 'Inglés'),
(23, 1, 'Chad', 'Francés'),
(24, 4, 'Chile', 'Español'),
(25, 5, 'China', 'Chino'),
(26, 4, 'Colombia', 'Español'),
(27, 5, 'Corea', 'Coreano'),
(28, 1, 'Costa de Marfil', 'Francés'),
(29, 2, 'Costa Rica', 'Español'),
(30, 7, 'Croacia', 'Croata'),
(31, 6, 'Cuba', 'Español'),
(32, 8, 'Dinamarca', 'Danés'),
(33, 1, 'Djibouti', 'Árabe'),
(34, 4, 'Ecuador', 'Español'),
(35, 2, 'El Salvador', 'Español'),
(36, 9, 'Emiratos Arabes Unidos', 'Árabe'),
(37, 1, 'Etiopía (norte)', 'Tigrinya'),
(38, 1, 'Etiopía (sur)', 'Amhárico'),
(39, 8, 'Escocia', 'Gaélico escocés'),
(40, 7, 'Eslovaquia', 'Eslovaco'),
(41, 7, 'Eslovenia', 'Esloveno'),
(42, 8, 'España', 'Español'),
(43, 7, 'Estonia', 'Estonio'),
(44, 8, 'Feroe', 'Faroés'),
(45, 10, 'Fiji', 'Inglés'),
(46, 5, 'Filipinas', 'Pilipino tagalo'),
(47, 8, 'Finlandia', 'Finlandés'),
(48, 8, 'Francia', 'Francés'),
(49, 8, 'Gales', 'Inglés'),
(50, 1, 'Gambia ', 'Inglés'),
(51, 5, 'Georgia', 'Georgiano'),
(52, 8, 'Gibraltar', 'Inglés'),
(53, 8, 'Gran Bretaña', 'Inglés'),
(54, 9, 'Grecia', 'Griego'),
(55, 3, 'Groenlandia ', 'Inglés'),
(56, 3, 'Saïpan', 'Chamorro'),
(57, 2, 'Guatemala', 'Español'),
(58, 8, 'Guernsey', 'Inglés'),
(59, 5, 'Hindi', 'Hindi'),
(60, 2, 'Honduras', 'Español'),
(61, 5, 'Hong Kong', 'Chino'),
(62, 7, 'Hungría', 'Húngaro'),
(63, 5, 'India', 'Hindi'),
(64, 5, 'Indonesia', 'Indonesio'),
(65, 8, 'Inglaterra', 'Inglés'),
(66, 9, 'Irak', 'Persa'),
(67, 9, 'Iran', 'Persa'),
(68, 8, 'Irlanda', 'Gaélico Irlandés'),
(69, 7, 'Islandia', 'Islandés'),
(70, 10, 'Islas Cook', 'Inglés'),
(71, 9, 'Israel', 'Árabe'),
(72, 8, 'Italia', 'Italiano'),
(73, 6, 'Jamaica', 'Inglés'),
(74, 5, 'Japón', 'Japonés'),
(75, 7, 'Jersey', 'Francés'),
(76, 5, 'Kazajstán', 'Kazajo'),
(77, 1, 'Kenia', 'Suahili'),
(78, 5, 'Kirguistán', 'Kirghís'),
(79, 5, 'Kirguizistán', 'Uigur'),
(80, 5, 'Laos', 'Laot'),
(81, 1, 'Lesotho', 'Inglés'),
(82, 8, 'Letonia', 'Letón'),
(83, 1, 'Libia', 'Árabe'),
(84, 7, 'Liechtenstein', 'Alemán'),
(85, 7, 'Lituania', 'Lituano'),
(86, 8, 'Luxemburgo', 'German'),
(87, 8, 'Macedonia', 'Macedonio'),
(88, 5, 'Malasia', 'Inglés'),
(89, 1, 'Malawi', 'Inglés'),
(90, 7, 'Malta (Isla)', 'Maltés'),
(91, 1, 'Mauricio', 'Inglés'),
(92, 2, 'México', 'Español'),
(93, 10, 'Micronesia', 'Inglés'),
(94, 5, 'Mongolia', 'Mongol'),
(95, 7, 'Montserrat', 'Inglés'),
(96, 1, 'Mozambique', 'Zulu'),
(97, 1, 'Namibia', 'Inglés'),
(98, 5, 'Nepal', 'Nepali'),
(99, 2, 'Nicaragua ', 'Español'),
(100, 7, 'Noruega', 'Noruego (Nynorsk)'),
(101, 10, 'Nueva Zelanda', 'Inglés'),
(102, 8, 'Países Bajos ', 'Holandés'),
(103, 5, 'Pakistán', 'Punjabi'),
(104, 2, 'Panamá', 'Español'),
(105, 4, 'Paraguay ', 'Español'),
(106, 4, 'Perú', 'Español'),
(107, 8, 'Pitcairn (Islas)', 'Inglés'),
(108, 7, 'Polonia', 'Polaco'),
(109, 8, 'Portugal', 'Portugués'),
(110, 6, 'Puerto Rico', 'Español'),
(111, 7, 'Reino Unido', 'Inglés'),
(112, 1, 'República del Congo', 'Francés'),
(113, 6, 'República Dominicana', 'Español'),
(114, 7, 'República Checa', 'Checo'),
(115, 7, 'Rumania', 'Rumano'),
(116, 7, 'Rusia', 'Ruso'),
(117, 1, 'Ruanda', 'Inglés'),
(118, 10, 'Samoa (Americana)', 'Inglés'),
(119, 6, 'San Vicente', 'Inglés'),
(120, 8, 'San Marino', 'Italiano'),
(121, 1, 'Santa Helena ', 'Inglés'),
(122, 8, 'Serbia', 'Serbio'),
(123, 1, 'Seychelles', 'Francés'),
(124, 5, 'Singapur', 'Tamil'),
(125, 1, 'Somalia', 'Somalí'),
(126, 5, 'Sri Lanka', 'Tamil'),
(127, 1, 'Sudáfrica', 'Zulú'),
(128, 8, 'Suecia ', 'Sueco'),
(129, 7, 'Suiza', 'Alemán'),
(130, 5, 'Tailandia', 'Tailandés'),
(131, 5, 'Taiwán', 'Chino'),
(132, 1, 'Tanzania', 'Suahili'),
(133, 10, 'Tonga ', 'Inglés'),
(134, 7, 'Trinidad y Tobago', 'Inglés'),
(135, 5, 'Turkmenistán', 'Turcomano'),
(136, 9, 'Turquia', 'Turco'),
(137, 7, 'Ucrania', 'Ucraniano'),
(138, 1, 'Uganda ', 'Inglés'),
(139, 4, 'Uruguay', 'Español'),
(140, 5, 'Uzbekistán', 'Uzbeko'),
(141, 5, 'Vietnam', 'Vietnamita'),
(142, 6, 'Vírgenes (Islas)', 'Inglés'),
(143, 7, 'Yugoslavia', 'Serbio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpais_tidioma`
--

CREATE TABLE IF NOT EXISTS `tpais_tidioma` (
  `id_pais` int(11) NOT NULL,
  `id_idioma` int(11) NOT NULL,
  PRIMARY KEY (`id_pais`,`id_idioma`),
  KEY `id_idioma` (`id_idioma`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `tpais_tidioma`
--

INSERT INTO `tpais_tidioma` (`id_pais`, `id_idioma`) VALUES
(1, 2),
(2, 3),
(2, 30),
(3, 66),
(4, 43),
(5, 43),
(6, 5),
(7, 23),
(8, 6),
(8, 50),
(9, 43),
(10, 3),
(11, 7),
(11, 70),
(12, 9),
(12, 10),
(13, 70),
(14, 3),
(14, 29),
(14, 40),
(14, 43),
(15, 23),
(15, 43),
(16, 43),
(17, 11),
(17, 19),
(17, 71),
(18, 66),
(19, 12),
(20, 29),
(21, 16),
(21, 29),
(21, 87),
(22, 29),
(22, 43),
(23, 29),
(24, 23),
(25, 16),
(25, 59),
(25, 85),
(26, 23),
(27, 18),
(28, 29),
(29, 23),
(29, 43),
(30, 19),
(31, 23),
(32, 20),
(33, 5),
(34, 23),
(35, 23),
(36, 5),
(36, 50),
(36, 64),
(37, 81),
(38, 4),
(39, 31),
(39, 43),
(40, 21),
(41, 22),
(42, 13),
(42, 23),
(42, 25),
(42, 34),
(42, 63),
(43, 24),
(44, 20),
(44, 26),
(45, 43),
(46, 28),
(46, 77),
(47, 27),
(48, 13),
(48, 25),
(48, 29),
(48, 63),
(49, 33),
(49, 43),
(50, 43),
(51, 35),
(52, 23),
(52, 43),
(52, 45),
(52, 63),
(53, 43),
(54, 37),
(55, 20),
(55, 43),
(56, 14),
(57, 23),
(58, 29),
(58, 43),
(59, 9),
(59, 39),
(59, 43),
(59, 57),
(59, 80),
(60, 23),
(61, 16),
(61, 43),
(62, 41),
(63, 9),
(63, 39),
(63, 43),
(63, 57),
(63, 80),
(64, 8),
(64, 42),
(65, 43),
(66, 50),
(66, 64),
(67, 35),
(67, 50),
(67, 64),
(68, 32),
(68, 43),
(69, 44),
(70, 43),
(71, 5),
(71, 38),
(72, 45),
(73, 43),
(74, 46),
(75, 29),
(75, 43),
(76, 49),
(76, 85),
(77, 75),
(78, 49),
(79, 85),
(80, 16),
(80, 29),
(80, 51),
(80, 87),
(81, 43),
(81, 89),
(82, 52),
(83, 5),
(83, 43),
(83, 45),
(84, 3),
(85, 53),
(85, 65),
(86, 36),
(87, 19),
(87, 54),
(87, 71),
(88, 43),
(88, 55),
(89, 43),
(90, 43),
(90, 56),
(91, 29),
(91, 43),
(92, 23),
(93, 43),
(94, 58),
(95, 43),
(96, 66),
(96, 90),
(97, 1),
(97, 3),
(97, 43),
(98, 60),
(99, 23),
(100, 61),
(100, 62),
(101, 43),
(101, 70),
(102, 40),
(103, 67),
(103, 73),
(104, 23),
(104, 43),
(105, 23),
(106, 23),
(107, 43),
(108, 65),
(109, 66),
(110, 23),
(111, 43),
(112, 29),
(113, 23),
(114, 15),
(115, 69),
(116, 70),
(117, 43),
(117, 75),
(118, 43),
(119, 43),
(120, 45),
(121, 43),
(122, 71),
(123, 29),
(123, 43),
(124, 55),
(124, 79),
(125, 74),
(126, 17),
(126, 79),
(127, 1),
(127, 72),
(127, 88),
(127, 90),
(128, 76),
(129, 3),
(129, 45),
(130, 78),
(131, 16),
(132, 43),
(132, 75),
(133, 43),
(134, 23),
(134, 43),
(135, 83),
(136, 35),
(136, 50),
(136, 82),
(136, 85),
(137, 84),
(138, 43),
(139, 23),
(140, 85),
(140, 86),
(141, 16),
(141, 29),
(141, 78),
(141, 87),
(142, 43),
(143, 2),
(143, 21),
(143, 41),
(143, 68),
(143, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersona`
--

CREATE TABLE IF NOT EXISTS `tpersona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesion` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) DEFAULT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `es_discapacitado` tinyint(1) DEFAULT '0',
  `habilitado` tinyint(1) DEFAULT '1',
  `contrasena` text NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `correo_electronico` (`correo_electronico`),
  KEY `id_profesion` (`id_profesion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `tpersona`
--

INSERT INTO `tpersona` (`id_persona`, `id_profesion`, `nombre`, `apellido1`, `apellido2`, `sexo`, `correo_electronico`, `fecha_nacimiento`, `telefono`, `es_discapacitado`, `habilitado`, `contrasena`, `id_pais`, `imagen`) VALUES
(1, 34, 'Daniel', 'Villalobos', 'Rodriguez', 'M', 'djvr@gmail.com', '1995-04-06', '86524175', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 29, '/pictures/foto1.jpg'),
(2, 2, 'Gilberth', 'Molina', 'Castrillo', 'M', 'gg@gmail.com', '1991-05-11', '86548475', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 2, '/pictures/foto2.jpg'),
(3, 4, 'Gerard', 'Barquero', 'Valverde', 'M', 'gbarq@gmail.com', '1984-04-06', '86123175', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 3, '/pictures/foto3.jpg'),
(4, 3, 'Jose', 'Rodriguez', 'Umaña', 'M', 'choma@gmail.com', '1981-11-08', '86521175', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 4, '/pictures/foto4.jpg'),
(5, 6, 'Roger', 'Flores', 'Guardado', 'M', 'rflores@gmail.com', '1982-05-07', '96133172', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 29, '/pictures/foto5.jpg'),
(6, 5, 'Ericka', 'Madrigal', 'Leon', 'F', 'dimely@gmail.com', '1987-10-08', '86123987', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 6, '/pictures/foto6.jpg'),
(7, 2, 'Koala', 'Cespedes', 'Rodriguez', 'M', 'koala@gmail.com', '1974-10-08', '85643175', 0, 0, 'e10adc3949ba59abbe56e057f20f883e', 7, '/pictures/foto7.jpg'),
(8, 1, 'Nancy', 'Cespedes', 'Sandoval', 'F', 'nancy@gmail.com', '1985-09-08', '86098175', 0, 0, 'e10adc3949ba59abbe56e057f20f883e', 8, '/pictures/foto8.jpg'),
(9, 3, 'Steven', 'Guevara', 'Madrigal', 'M', 'piven@gmail.com', '1990-01-02', '74593175', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 29, '/pictures/foto9.jpg'),
(10, 4, 'Ana', 'Vargas', 'Fonseca', 'F', 'analu@gmail.com', '1992-10-08', '86123155', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 10, '/pictures/foto10.jpg'),
(11, 2, 'Alvaro', 'Monge', 'Monge', 'M', 'alvaro@gmail.com', '1982-10-08', '65433175', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', 11, '/pictures/foto11.jpg'),
(12, 5, 'Roberto', 'Valverde', 'Mora', 'M', 'rvalverde@gmail.com', '1971-06-08', '86121234', 0, 0, 'e10adc3949ba59abbe56e057f20f883e', 12, '/pictures/foto12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersona_tcharla`
--

CREATE TABLE IF NOT EXISTS `tpersona_tcharla` (
  `id_persona_charla` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_charla` int(11) NOT NULL,
  PRIMARY KEY (`id_persona_charla`),
  KEY `id_persona` (`id_persona`),
  KEY `id_charla` (`id_charla`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcar la base de datos para la tabla `tpersona_tcharla`
--

INSERT INTO `tpersona_tcharla` (`id_persona_charla`, `id_persona`, `id_charla`) VALUES
(1, 4, 1),
(2, 8, 2),
(3, 12, 3),
(4, 4, 5),
(5, 8, 6),
(6, 12, 7),
(7, 4, 8),
(8, 8, 10),
(9, 12, 11),
(10, 4, 12),
(11, 8, 14),
(12, 12, 15),
(13, 4, 16),
(14, 8, 17),
(15, 12, 18),
(16, 4, 20),
(17, 8, 21),
(18, 12, 22),
(19, 4, 23),
(20, 8, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersona_tnivel_persona`
--

CREATE TABLE IF NOT EXISTS `tpersona_tnivel_persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_persona`,`id_nivel_persona`),
  KEY `id_nivel_persona` (`id_nivel_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `tpersona_tnivel_persona`
--

INSERT INTO `tpersona_tnivel_persona` (`id_persona`, `id_nivel_persona`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1),
(6, 2),
(7, 3),
(8, 4),
(9, 1),
(10, 2),
(11, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tprofesion`
--

CREATE TABLE IF NOT EXISTS `tprofesion` (
  `id_profesion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_profesion` varchar(100) NOT NULL,
  `habilitado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_profesion`),
  UNIQUE KEY `nombre_profesion` (`nombre_profesion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Volcar la base de datos para la tabla `tprofesion`
--

INSERT INTO `tprofesion` (`id_profesion`, `nombre_profesion`, `habilitado`) VALUES
(1, 'Abogado/Legalista', 1),
(2, 'Administrador de base de datos', 1),
(3, 'Administrador de redes', 1),
(4, 'Administrador de sistemas', 1),
(5, 'Analista', 1),
(6, 'Arquitecto de sistemas', 1),
(7, 'Asistente/Personal de soporte', 1),
(8, 'Consultor/Contratista', 1),
(9, 'Contratista general', 1),
(10, 'Controlador/tesorero', 1),
(11, 'Controles de proyectos', 1),
(12, 'Director', 1),
(13, 'Director de informática/director de tecnología', 1),
(14, 'Director de marketing', 1),
(15, 'Director de operaciones', 1),
(16, 'Director de seguridad', 1),
(17, 'Director financiero', 1),
(18, 'Diseñador', 1),
(19, 'Diseñador de interiores', 1),
(20, 'Especialista/colaborador individual', 1),
(21, 'Estimador', 1),
(22, 'Estudiante', 1),
(23, 'Gestión del riesgo y de asuntos legales', 1),
(24, 'Gestor/Supervisor', 1),
(25, 'Gestor de construcción', 1),
(26, 'Gestor de diseños', 1),
(27, 'Gestor regional/general', 1),
(28, 'Ingeniero (no de TI)', 1),
(29, 'Ingeniero (TI)', 1),
(30, 'Jefe', 1),
(31, 'Jefe Ejecutivo/Director', 1),
(32, 'Otros', 1),
(33, 'Presidente', 1),
(34, 'Programador/Desarrollador', 1),
(35, 'Propietario', 1),
(36, 'Servicios medioambientales, sanitarios y de seguridad', 1),
(37, 'Vicepresidente ejecutivo/Vicepresidente Senior/Vicepresidente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedor`
--

CREATE TABLE IF NOT EXISTS `tproveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(20) DEFAULT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `costo_servicio_referencia` float(9,3) DEFAULT NULL,
  `descripcion_servicio` text,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tproveedor`
--

INSERT INTO `tproveedor` (`id_proveedor`, `nombre_proveedor`, `razon_social`, `cedula`, `costo_servicio_referencia`, `descripcion_servicio`) VALUES
(1, 'CompuVenta', 'CompuVenta S.A', '3-101-01873-23', 220000.000, 'Productos Informaticos'),
(2, 'Office Center', 'Office Center S.A', '3-101-16636-64', 35670.000, 'Entrega de suministros de oficina'),
(3, 'Alquileres Express', 'Alquileres Express S.A', '3-101-10389-87', 60000.000, 'Alquiler de sillas y mesas'),
(4, 'Kleavers', 'Kleavers S.A', '3-101-75494-12', 200000.000, 'Catering Services y salas para eventos'),
(5, 'Dos Pinos', 'Cooperativa Dos Pinos', '3-002-45628-04', 130000.000, 'Provicion de lacteos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tregion`
--

CREATE TABLE IF NOT EXISTS `tregion` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_region` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `tregion`
--

INSERT INTO `tregion` (`id_region`, `nombre_region`) VALUES
(1, 'Africa'),
(2, 'America Central'),
(3, 'America del Norte'),
(4, 'America del Sur'),
(5, 'Asia'),
(6, 'El Caribe'),
(7, 'Europa Oriental'),
(8, 'Union Europea'),
(9, 'Medio Oriente'),
(10, 'Oceania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_gasto`
--

CREATE TABLE IF NOT EXISTS `ttipo_gasto` (
  `id_tipo_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_gasto` char(20) NOT NULL,
  `descripcion_tipo_gasto` text,
  PRIMARY KEY (`id_tipo_gasto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `ttipo_gasto`
--

INSERT INTO `ttipo_gasto` (`id_tipo_gasto`, `nombre_tipo_gasto`, `descripcion_tipo_gasto`) VALUES
(1, 'Hospedaje', 'Estadia en el hotel'),
(2, 'Transporte', 'Ida y vuelta a aeropuerto o destino'),
(3, 'Alimentacion', 'Gastos de alimentación'),
(4, 'Local', 'Alquiler del local'),
(5, 'Servicios basicos', 'Pago de los recibos de agua y luz'),
(6, 'Eventos especiales', 'Equipo de sonido y luces para eventos'),
(7, 'Hospedaje', 'Estadia en el hotel'),
(8, 'Inventario', 'Pago a empleados'),
(9, 'Servicios extras', 'Equipo para las conferencias extra'),
(10, 'Prestamo', 'Prestamo para pagar equipos para las conferencias'),
(11, 'Pago transporte', 'Pago del transporte'),
(12, 'Alquiler automovil', 'Pago del alquiler de un automovil'),
(13, 'Local', 'Alquiler del local'),
(14, 'Servicios basicos', 'Pago de los recibos de agua'),
(15, 'Eventos especiales', 'Pago de los recibos de luz'),
(16, 'Servicios basicos', 'Pago de los recibos de teléfono'),
(17, 'Local', 'Equipo de sonido para eventos'),
(18, 'Eventos especiales', 'Equipo de luces para eventos');
