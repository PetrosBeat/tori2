-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-07-2021 a las 18:09:25
-- Versión del servidor: 5.7.24
-- Versión de PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `devgocl_tori`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `giro` text,
  `actividadEconomica` text,
  `codigoActividadEconomica` int(11) DEFAULT NULL,
  `actividadPrincipal` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afp`
--

CREATE TABLE `afp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tasa_afp` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `afp`
--

INSERT INTO `afp` (`id`, `nombre`, `tasa_afp`) VALUES
(1, 'Capital', 11.44),
(2, 'Cuprum', 11.44),
(3, 'Habitat', 11.27),
(4, 'PlanVital', 11.16),
(5, 'ProVida', 11.45),
(6, 'Modelo', 10.77),
(7, 'Uno', 10.69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE `anticipos` (
  `id` int(11) NOT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`) VALUES
(1, 'COCINA'),
(2, 'AYUDANTE DE COCINA'),
(3, 'ATENCION'),
(4, 'REPARTIDORES'),
(5, 'GARZONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencias`
--

CREATE TABLE `ausencias` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `motivo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `numero_caja` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `monto_inicial` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `vendedor` varchar(500) DEFAULT NULL,
  `turno` int(11) DEFAULT '0',
  `monto_entrega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `descripcion` text,
  `color` varchar(45) DEFAULT NULL,
  `titulo` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT 'nd.jpg',
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL COMMENT '0:productos\\n1:ingrediente\\n2:promociones\\n3: menus',
  `estado` int(11) DEFAULT '1',
  `delivery` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `imagen`, `nombre`, `tipo`, `estado`, `delivery`, `orden`, `descripcion`) VALUES
(1, 'nd.jpg', 'PRUEBA CATEGORIA', 0, 1, 0, 1, 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `razonSocial` text,
  `email` text,
  `ciudad` varchar(45) DEFAULT NULL,
  `mostrar` int(11) DEFAULT '0',
  `comuna` int(11) DEFAULT NULL,
  `credito_utilizado` int(11) DEFAULT NULL,
  `cdgSIISucur` int(11) DEFAULT NULL,
  `giro` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `telefono`, `rut`, `razonSocial`, `email`, `ciudad`, `mostrar`, `comuna`, `credito_utilizado`, `cdgSIISucur`, `giro`) VALUES
(1, '963408141', '111111111', 'PUBLICO', 'garcias.aravena@gmail.com', 'TALCA', 0, 100000, NULL, NULL, 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaciones_trabajadores`
--

CREATE TABLE `colaciones_trabajadores` (
  `id` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaciones_trabajadores`
--

INSERT INTO `colaciones_trabajadores` (`id`, `hora`, `trabajador`, `dia`) VALUES
(1, '16:30:00', '26888560-9', 1),
(2, '16:30:00', '26888560-9', 2),
(3, '16:30:00', '26888560-9', 3),
(4, '16:30:00', '26888560-9', 4),
(5, '16:30:00', '26888560-9', 5),
(6, '16:30:00', '26888560-9', 6),
(17, '16:00:00', '10313718-7', 1),
(18, '16:00:00', '10313718-7', 2),
(19, '16:00:00', '10313718-7', 3),
(20, '16:00:00', '10313718-7', 4),
(21, '16:00:00', '10313718-7', 5),
(22, '16:30:00', '27054978-0', 1),
(23, '16:30:00', '27054978-0', 2),
(24, '16:30:00', '27054978-0', 3),
(25, '16:30:00', '27054978-0', 4),
(26, '16:30:00', '27054978-0', 5),
(27, '16:30:00', '27054978-0', 6),
(28, '15:30:00', '18417435-9', 2),
(29, '19:00:00', '18417435-9', 2),
(30, '15:30:00', '18417435-9', 3),
(31, '19:00:00', '18417435-9', 3),
(32, '15:30:00', '18417435-9', 4),
(33, '19:00:00', '18417435-9', 4),
(34, '15:30:00', '18417435-9', 5),
(35, '19:00:00', '18417435-9', 5),
(36, '15:30:00', '18417435-9', 6),
(37, '19:00:00', '18417435-9', 6),
(38, '15:30:00', '18308191-8', 1),
(39, '18:30:00', '18308191-8', 1),
(40, '15:30:00', '18308191-8', 2),
(41, '18:30:00', '18308191-8', 2),
(42, '15:30:00', '18308191-8', 3),
(43, '18:30:00', '18308191-8', 3),
(44, '15:30:00', '18308191-8', 4),
(45, '18:30:00', '18308191-8', 4),
(46, '15:30:00', '18308191-8', 5),
(47, '18:30:00', '18308191-8', 5),
(48, '16:00:00', '16895431-k', 1),
(49, '19:30:00', '16895431-k', 1),
(50, '16:00:00', '16895431-k', 2),
(51, '19:30:00', '16895431-k', 2),
(52, '16:00:00', '16895431-k', 3),
(53, '19:30:00', '16895431-k', 3),
(54, '16:00:00', '16895431-k', 4),
(55, '19:00:00', '16895431-k', 4),
(56, '16:00:00', '16895431-k', 5),
(57, '19:00:00', '16895431-k', 5),
(58, '16:00:00', '16895431-k', 6),
(59, '19:00:00', '16895431-k', 6),
(60, '15:30:00', '17344795-7', 1),
(61, '18:00:00', '17344795-7', 1),
(62, '15:30:00', '17344795-7', 2),
(63, '15:30:00', '17344795-7', 3),
(64, '15:30:00', '17344795-7', 5),
(65, '16:00:00', '17344795-7', 6),
(66, '20:30:00', '17344795-7', 6),
(67, '15:00:00', '18657229-7', 1),
(68, '15:30:00', '18657229-7', 1),
(69, '16:00:00', '18657229-7', 1),
(70, '16:30:00', '18657229-7', 1),
(71, '17:00:00', '18657229-7', 1),
(72, '17:30:00', '18657229-7', 1),
(73, '18:00:00', '18657229-7', 1),
(74, '18:30:00', '18657229-7', 1),
(75, '19:00:00', '18657229-7', 1),
(76, '19:30:00', '18657229-7', 1),
(77, '19:30:00', '18657229-7', 3),
(78, '18:00:00', '18657229-7', 4),
(79, '15:30:00', '18657229-7', 5),
(80, '21:30:00', '18657229-7', 5),
(81, '15:30:00', '18657229-7', 6),
(82, '21:30:00', '18657229-7', 6),
(83, '19:30:00', '26063305-8', 1),
(84, '19:30:00', '26063305-8', 2),
(85, '19:30:00', '26063305-8', 3),
(86, '19:30:00', '26063305-8', 4),
(87, '19:30:00', '26063305-8', 5),
(88, '15:30:00', '26063305-8', 6),
(89, '19:30:00', '26063305-8', 6),
(90, '20:00:00', '27226339-6', 1),
(91, '20:00:00', '27226339-6', 2),
(92, '20:00:00', '27226339-6', 3),
(93, '20:00:00', '27226339-6', 4),
(94, '18:00:00', '27226339-6', 5),
(95, '15:30:00', '27226339-6', 6),
(96, '20:00:00', '27226339-6', 6),
(97, '16:00:00', '11111111-1', 1),
(98, '16:00:00', '11111111-1', 2),
(99, '16:00:00', '11111111-1', 3),
(100, '16:00:00', '11111111-1', 4),
(101, '16:00:00', '11111111-1', 5),
(102, '16:00:00', '11111111-1', 6),
(103, '20:30:00', '26453542-5', 1),
(104, '15:30:00', '26453542-5', 2),
(105, '18:00:00', '26453542-5', 2),
(106, '20:30:00', '26453542-5', 4),
(107, '21:30:00', '26453542-5', 5),
(108, '15:30:00', '20373823-4', 1),
(109, '15:30:00', '20373823-4', 2),
(110, '15:30:00', '20373823-4', 3),
(111, '15:30:00', '20373823-4', 4),
(112, '15:30:00', '20373823-4', 5),
(113, '15:30:00', '20373823-4', 6),
(114, '19:30:00', '20373823-4', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `numero_compra` int(11) NOT NULL,
  `numero_pago` int(11) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nombre_archivo` varchar(500) DEFAULT NULL,
  `saldo_pendiente` int(11) DEFAULT NULL,
  `pagado` int(11) DEFAULT NULL,
  `tipo_pago` varchar(45) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `numero_documento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(11) NOT NULL,
  `comuna` varchar(64) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `comuna`, `provincia_id`) VALUES
(1, 'Arica', 1),
(2, 'Camarones', 1),
(3, 'General Lagos', 2),
(4, 'Putre', 2),
(5, 'Alto Hospicio', 3),
(6, 'Iquique', 3),
(7, 'Camiña', 4),
(8, 'Colchane', 4),
(9, 'Huara', 4),
(10, 'Pica', 4),
(11, 'Pozo Almonte', 4),
(12, 'Tocopilla', 5),
(13, 'María Elena', 5),
(14, 'Calama', 6),
(15, 'Ollague', 6),
(16, 'San Pedro de Atacama', 6),
(17, 'Antofagasta', 7),
(18, 'Mejillones', 7),
(19, 'Sierra Gorda', 7),
(20, 'Taltal', 7),
(21, 'Chañaral', 8),
(22, 'Diego de Almagro', 8),
(23, 'Copiapó', 9),
(24, 'Caldera', 9),
(25, 'Tierra Amarilla', 9),
(26, 'Vallenar', 10),
(27, 'Alto del Carmen', 10),
(28, 'Freirina', 10),
(29, 'Huasco', 10),
(30, 'La Serena', 11),
(31, 'Coquimbo', 11),
(32, 'Andacollo', 11),
(33, 'La Higuera', 11),
(34, 'Paihuano', 11),
(35, 'Vicuña', 11),
(36, 'Ovalle', 12),
(37, 'Combarbalá', 12),
(38, 'Monte Patria', 12),
(39, 'Punitaqui', 12),
(40, 'Río Hurtado', 12),
(41, 'Illapel', 13),
(42, 'Canela', 13),
(43, 'Los Vilos', 13),
(44, 'Salamanca', 13),
(45, 'La Ligua', 14),
(46, 'Cabildo', 14),
(47, 'Zapallar', 14),
(48, 'Papudo', 14),
(49, 'Petorca', 14),
(50, 'Los Andes', 15),
(51, 'San Esteban', 15),
(52, 'Calle Larga', 15),
(53, 'Rinconada', 15),
(54, 'San Felipe', 16),
(55, 'Llaillay', 16),
(56, 'Putaendo', 16),
(57, 'Santa María', 16),
(58, 'Catemu', 16),
(59, 'Panquehue', 16),
(60, 'Quillota', 17),
(61, 'La Cruz', 17),
(62, 'La Calera', 17),
(63, 'Nogales', 17),
(64, 'Hijuelas', 17),
(65, 'Valparaíso', 18),
(66, 'Viña del Mar', 18),
(67, 'Concón', 18),
(68, 'Quintero', 18),
(69, 'Puchuncaví', 18),
(70, 'Casablanca', 18),
(71, 'Juan Fernández', 18),
(72, 'San Antonio', 19),
(73, 'Cartagena', 19),
(74, 'El Tabo', 19),
(75, 'El Quisco', 19),
(76, 'Algarrobo', 19),
(77, 'Santo Domingo', 19),
(78, 'Isla de Pascua', 20),
(79, 'Quilpué', 21),
(80, 'Limache', 21),
(81, 'Olmué', 21),
(82, 'Villa Alemana', 21),
(83, 'Colina', 22),
(84, 'Lampa', 22),
(85, 'Tiltil', 22),
(86, 'Santiago', 23),
(87, 'Vitacura', 23),
(88, 'San Ramón', 23),
(89, 'San Miguel', 23),
(90, 'San Joaquín', 23),
(91, 'Renca', 23),
(92, 'Recoleta', 23),
(93, 'Quinta Normal', 23),
(94, 'Quilicura', 23),
(95, 'Pudahuel', 23),
(96, 'Providencia', 23),
(97, 'Peñalolén', 23),
(98, 'Pedro Aguirre Cerda', 23),
(99, 'Ñuñoa', 23),
(100, 'Maipú', 23),
(101, 'Macul', 23),
(102, 'Lo Prado', 23),
(103, 'Lo Espejo', 23),
(104, 'Lo Barnechea', 23),
(105, 'Las Condes', 23),
(106, 'La Reina', 23),
(107, 'La Pintana', 23),
(108, 'La Granja', 23),
(109, 'La Florida', 23),
(110, 'La Cisterna', 23),
(111, 'Independencia', 23),
(112, 'Huechuraba', 23),
(113, 'Estación Central', 23),
(114, 'El Bosque', 23),
(115, 'Conchalí', 23),
(116, 'Cerro Navia', 23),
(117, 'Cerrillos', 23),
(118, 'Puente Alto', 24),
(119, 'San José de Maipo', 24),
(120, 'Pirque', 24),
(121, 'San Bernardo', 25),
(122, 'Buin', 25),
(123, 'Paine', 25),
(124, 'Calera de Tango', 25),
(125, 'Melipilla', 26),
(126, 'Alhué', 26),
(127, 'Curacaví', 26),
(128, 'María Pinto', 26),
(129, 'San Pedro', 26),
(130, 'Isla de Maipo', 27),
(131, 'El Monte', 27),
(132, 'Padre Hurtado', 27),
(133, 'Peñaflor', 27),
(134, 'Talagante', 27),
(135, 'Codegua', 28),
(136, 'Coínco', 28),
(137, 'Coltauco', 28),
(138, 'Doñihue', 28),
(139, 'Graneros', 28),
(140, 'Las Cabras', 28),
(141, 'Machalí', 28),
(142, 'Malloa', 28),
(143, 'Mostazal', 28),
(144, 'Olivar', 28),
(145, 'Peumo', 28),
(146, 'Pichidegua', 28),
(147, 'Quinta de Tilcoco', 28),
(148, 'Rancagua', 28),
(149, 'Rengo', 28),
(150, 'Requínoa', 28),
(151, 'San Vicente de Tagua Tagua', 28),
(152, 'Chépica', 29),
(153, 'Chimbarongo', 29),
(154, 'Lolol', 29),
(155, 'Nancagua', 29),
(156, 'Palmilla', 29),
(157, 'Peralillo', 29),
(158, 'Placilla', 29),
(159, 'Pumanque', 29),
(160, 'San Fernando', 29),
(161, 'Santa Cruz', 29),
(162, 'La Estrella', 30),
(163, 'Litueche', 30),
(164, 'Marchigüe', 30),
(165, 'Navidad', 30),
(166, 'Paredones', 30),
(167, 'Pichilemu', 30),
(168, 'Curicó', 31),
(169, 'Hualañé', 31),
(170, 'Licantén', 31),
(171, 'Molina', 31),
(172, 'Rauco', 31),
(173, 'Romeral', 31),
(174, 'Sagrada Familia', 31),
(175, 'Teno', 31),
(176, 'Vichuquén', 31),
(177, 'Talca', 32),
(178, 'San Clemente', 32),
(179, 'Pelarco', 32),
(180, 'Pencahue', 32),
(181, 'Maule', 32),
(182, 'San Rafael', 32),
(183, 'Curepto', 33),
(184, 'Constitución', 32),
(185, 'Empedrado', 32),
(186, 'Río Claro', 32),
(187, 'Linares', 33),
(188, 'San Javier', 33),
(189, 'Parral', 33),
(190, 'Villa Alegre', 33),
(191, 'Longaví', 33),
(192, 'Colbún', 33),
(193, 'Retiro', 33),
(194, 'Yerbas Buenas', 33),
(195, 'Cauquenes', 34),
(196, 'Chanco', 34),
(197, 'Pelluhue', 34),
(198, 'Bulnes', 35),
(199, 'Chillán', 35),
(200, 'Chillán Viejo', 35),
(201, 'El Carmen', 35),
(202, 'Pemuco', 35),
(203, 'Pinto', 35),
(204, 'Quillón', 35),
(205, 'San Ignacio', 35),
(206, 'Yungay', 35),
(207, 'Cobquecura', 36),
(208, 'Coelemu', 36),
(209, 'Ninhue', 36),
(210, 'Portezuelo', 36),
(211, 'Quirihue', 36),
(212, 'Ránquil', 36),
(213, 'Treguaco', 36),
(214, 'San Carlos', 37),
(215, 'Coihueco', 37),
(216, 'San Nicolás', 37),
(217, 'Ñiquén', 37),
(218, 'San Fabián', 37),
(219, 'Alto Biobío', 38),
(220, 'Antuco', 38),
(221, 'Cabrero', 38),
(222, 'Laja', 38),
(223, 'Los Ángeles', 38),
(224, 'Mulchén', 38),
(225, 'Nacimiento', 38),
(226, 'Negrete', 38),
(227, 'Quilaco', 38),
(228, 'Quilleco', 38),
(229, 'San Rosendo', 38),
(230, 'Santa Bárbara', 38),
(231, 'Tucapel', 38),
(232, 'Yumbel', 38),
(233, 'Concepción', 39),
(234, 'Coronel', 39),
(235, 'Chiguayante', 39),
(236, 'Florida', 39),
(237, 'Hualpén', 39),
(238, 'Hualqui', 39),
(239, 'Lota', 39),
(240, 'Penco', 39),
(241, 'San Pedro de La Paz', 39),
(242, 'Santa Juana', 39),
(243, 'Talcahuano', 39),
(244, 'Tomé', 39),
(245, 'Arauco', 40),
(246, 'Cañete', 40),
(247, 'Contulmo', 40),
(248, 'Curanilahue', 40),
(249, 'Lebu', 40),
(250, 'Los Álamos', 40),
(251, 'Tirúa', 40),
(252, 'Angol', 41),
(253, 'Collipulli', 41),
(254, 'Curacautín', 41),
(255, 'Ercilla', 41),
(256, 'Lonquimay', 41),
(257, 'Los Sauces', 41),
(258, 'Lumaco', 41),
(259, 'Purén', 41),
(260, 'Renaico', 41),
(261, 'Traiguén', 41),
(262, 'Victoria', 41),
(263, 'Temuco', 42),
(264, 'Carahue', 42),
(265, 'Cholchol', 42),
(266, 'Cunco', 42),
(267, 'Curarrehue', 42),
(268, 'Freire', 42),
(269, 'Galvarino', 42),
(270, 'Gorbea', 42),
(271, 'Lautaro', 42),
(272, 'Loncoche', 42),
(273, 'Melipeuco', 42),
(274, 'Nueva Imperial', 42),
(275, 'Padre Las Casas', 42),
(276, 'Perquenco', 42),
(277, 'Pitrufquén', 42),
(278, 'Pucón', 42),
(279, 'Saavedra', 42),
(280, 'Teodoro Schmidt', 42),
(281, 'Toltén', 42),
(282, 'Vilcún', 42),
(283, 'Villarrica', 42),
(284, 'Valdivia', 43),
(285, 'Corral', 43),
(286, 'Lanco', 43),
(287, 'Los Lagos', 43),
(288, 'Máfil', 43),
(289, 'Mariquina', 43),
(290, 'Paillaco', 43),
(291, 'Panguipulli', 43),
(292, 'La Unión', 44),
(293, 'Futrono', 44),
(294, 'Lago Ranco', 44),
(295, 'Río Bueno', 44),
(297, 'Osorno', 45),
(298, 'Puerto Octay', 45),
(299, 'Purranque', 45),
(300, 'Puyehue', 45),
(301, 'Río Negro', 45),
(302, 'San Juan de la Costa', 45),
(303, 'San Pablo', 45),
(304, 'Calbuco', 46),
(305, 'Cochamó', 46),
(306, 'Fresia', 46),
(307, 'Frutillar', 46),
(308, 'Llanquihue', 46),
(309, 'Los Muermos', 46),
(310, 'Maullín', 46),
(311, 'Puerto Montt', 46),
(312, 'Puerto Varas', 46),
(313, 'Ancud', 47),
(314, 'Castro', 47),
(315, 'Chonchi', 47),
(316, 'Curaco de Vélez', 47),
(317, 'Dalcahue', 47),
(318, 'Puqueldón', 47),
(319, 'Queilén', 47),
(320, 'Quellón', 47),
(321, 'Quemchi', 47),
(322, 'Quinchao', 47),
(323, 'Chaitén', 48),
(324, 'Futaleufú', 48),
(325, 'Hualaihué', 48),
(326, 'Palena', 48),
(327, 'Lago Verde', 49),
(328, 'Coihaique', 49),
(329, 'Aysén', 50),
(330, 'Cisnes', 50),
(331, 'Guaitecas', 50),
(332, 'Río Ibáñez', 51),
(333, 'Chile Chico', 51),
(334, 'Cochrane', 52),
(335, 'O\'Higgins', 52),
(336, 'Tortel', 52),
(337, 'Natales', 53),
(338, 'Torres del Paine', 53),
(339, 'Laguna Blanca', 54),
(340, 'Punta Arenas', 54),
(341, 'Río Verde', 54),
(342, 'San Gregorio', 54),
(343, 'Porvenir', 55),
(344, 'Primavera', 55),
(345, 'Timaukel', 55),
(346, 'Cabo de Hornos', 56),
(347, 'Antártica', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `numero_compra` int(11) DEFAULT NULL,
  `insumo` varchar(45) DEFAULT NULL,
  `nombre` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `precio_compra` int(11) DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `flete` int(11) DEFAULT NULL,
  `adicional` int(11) DEFAULT NULL,
  `medida_compra` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_egresos`
--

CREATE TABLE `detalle_egresos` (
  `id` int(11) NOT NULL,
  `numero_egreso` int(11) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `motivo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventarios`
--

CREATE TABLE `detalle_inventarios` (
  `id` int(11) NOT NULL,
  `numero_inventario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `paquetes` int(11) DEFAULT NULL,
  `total_pulgadas` double DEFAULT NULL,
  `medida` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pagos`
--

CREATE TABLE `detalle_pagos` (
  `id` int(11) NOT NULL,
  `numero_compra` int(11) DEFAULT NULL,
  `numero_venta` int(11) DEFAULT NULL,
  `numero_pago` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_paquete_ingrediente`
--

CREATE TABLE `detalle_paquete_ingrediente` (
  `id` int(11) NOT NULL,
  `numero_paquete_ingrediente` int(11) DEFAULT NULL,
  `ingrediente` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `numero_pedido` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `valor_unitario` int(11) DEFAULT NULL,
  `total_pulgadas` double DEFAULT NULL,
  `cantidad_por_retirar` double DEFAULT NULL,
  `tipo_venta` int(11) DEFAULT NULL,
  `cantidad_devolucion` double DEFAULT NULL,
  `despachado` int(11) DEFAULT NULL,
  `tipo_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `numero_venta` int(11) DEFAULT '0',
  `numero_comprobante` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT '0',
  `cantidad` double DEFAULT '0',
  `precio` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `nuevo_pedido` int(11) DEFAULT '0',
  `estado_despacho` int(11) DEFAULT '1',
  `mensaje` int(11) DEFAULT '1',
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(11) NOT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_trabajadores`
--

CREATE TABLE `documentos_trabajadores` (
  `id` int(11) NOT NULL,
  `documento` varchar(450) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `trabajador` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `numero_egreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `giro` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `numero_producto` int(11) DEFAULT '1',
  `numero_venta` int(11) DEFAULT '1',
  `numero_caja` int(11) DEFAULT '1',
  `numero_cotizacion` int(11) DEFAULT '1',
  `numero_comprobante` int(11) DEFAULT '1',
  `numero_compra` int(11) DEFAULT '1',
  `numero_egreso` int(11) DEFAULT '1',
  `numero_pago` int(11) DEFAULT '1',
  `numero_devolucion` int(11) DEFAULT '1',
  `numero_combinacion` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT '19',
  `clave_autorizacion` int(11) DEFAULT '2580',
  `tipo` int(11) DEFAULT '0',
  `tipo_sistema` int(11) NOT NULL DEFAULT '0' COMMENT '0 : restaurantes\\n1 : mini market \\n2 : punto de venta\\n',
  `impresion_barra` int(11) DEFAULT NULL,
  `impresion_cocina` int(11) DEFAULT NULL,
  `impresion_venta` int(11) DEFAULT NULL,
  `impresion_precuenta` int(11) DEFAULT NULL,
  `logo` varchar(450) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL,
  `propina` int(11) DEFAULT NULL,
  `impresora_red` int(11) DEFAULT NULL COMMENT '0: red\\n1: usb\\n',
  `ip_impresora` varchar(100) DEFAULT NULL,
  `nombre_impresora` varchar(45) DEFAULT NULL,
  `key` varchar(450) DEFAULT NULL,
  `estandar_chef` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `intervalo` int(11) DEFAULT NULL,
  `numero_paquete_ingrediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `rut`, `nombre`, `giro`, `direccion`, `telefono`, `correo`, `ciudad`, `numero_producto`, `numero_venta`, `numero_caja`, `numero_cotizacion`, `numero_comprobante`, `numero_compra`, `numero_egreso`, `numero_pago`, `numero_devolucion`, `numero_combinacion`, `iva`, `clave_autorizacion`, `tipo`, `tipo_sistema`, `impresion_barra`, `impresion_cocina`, `impresion_venta`, `impresion_precuenta`, `logo`, `delivery`, `propina`, `impresora_red`, `ip_impresora`, `nombre_impresora`, `key`, `estandar_chef`, `hora_inicio`, `hora_termino`, `intervalo`, `numero_paquete_ingrediente`) VALUES
(1, '11.111.111-1', 'TORI SUSHI', 'Restaurante', 'DIRECCION RESTAURANTE #1211', '9876 5432', 'CONTACTO@RESTAURANTE.CL', 'TALCA', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 19, 2580, 1, 0, 0, 0, 0, 0, 'logo.png', 1, 1, 0, '192.168.0.100', 'IMPRESORA_PRINCIPAL', '4387f06e1c854ca3b9ee1d7eb7643af8', 25000, '11:00:00', '00:00:00', 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `rut_cliente` varchar(12) DEFAULT NULL,
  `rut_vendedor` varchar(12) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `numero_gasto` int(11) NOT NULL,
  `tipo_pago` varchar(45) DEFAULT NULL,
  `numero_documento` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `dinero_caja` int(11) DEFAULT NULL,
  `total_caja` int(11) DEFAULT NULL,
  `obs` text,
  `documento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_trabajadores`
--

CREATE TABLE `horario_trabajadores` (
  `id` int(11) NOT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `colacion` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario_trabajadores`
--

INSERT INTO `horario_trabajadores` (`id`, `trabajador`, `dia`, `hora_inicio`, `hora_termino`, `colacion`) VALUES
(1, '26063305-8', 1, '16:00:00', '23:00:00', 30),
(2, '26063305-8', 2, '16:00:00', '23:00:00', 30),
(3, '26063305-8', 3, '16:00:00', '23:00:00', 30),
(4, '26063305-8', 4, '16:00:00', '23:00:00', 30),
(5, '26063305-8', 5, '16:00:00', '23:00:00', 30),
(6, '26063305-8', 6, '11:00:00', '23:30:00', 30),
(7, '26888560-9', 7, '00:00:00', '00:00:00', 60),
(8, '26888560-9', 7, '00:00:00', '00:00:00', 0),
(9, '26888560-9', 7, '00:00:00', '00:00:00', 0),
(17, '26888560-9', 7, '00:00:00', '00:00:00', 0),
(40, '10313718-7', 1, '10:30:00', '19:30:00', 60),
(41, '10313718-7', 2, '10:30:00', '19:30:00', 60),
(42, '10313718-7', 3, '10:30:00', '19:30:00', 60),
(43, '10313718-7', 4, '10:30:00', '19:30:00', 60),
(44, '10313718-7', 5, '10:30:00', '19:30:00', 60),
(45, '10313718-7', 6, '00:00:00', '00:00:00', 0),
(46, '10313718-7', 7, '00:00:00', '00:00:00', 0),
(47, '27054978-0', 1, '13:00:00', '21:00:00', 60),
(48, '27054978-0', 2, '13:00:00', '21:00:00', 60),
(49, '27054978-0', 3, '13:00:00', '21:00:00', 60),
(50, '27054978-0', 4, '13:00:00', '21:00:00', 60),
(51, '27054978-0', 5, '13:00:00', '21:00:00', 60),
(52, '27054978-0', 6, '13:00:00', '21:00:00', 0),
(53, '27054978-0', 7, '00:00:00', '00:00:00', 0),
(54, '18417435-9', 1, '00:00:00', '00:00:00', 60),
(55, '18417435-9', 2, '11:30:00', '21:30:00', 60),
(56, '18417435-9', 3, '11:30:00', '21:30:00', 60),
(57, '18417435-9', 4, '11:30:00', '21:30:00', 60),
(58, '18417435-9', 5, '11:30:00', '21:30:00', 60),
(59, '18417435-9', 6, '11:30:00', '21:30:00', 60),
(60, '18417435-9', 7, '00:00:00', '00:00:00', 60),
(61, '18308191-8', 1, '11:30:00', '21:30:00', 60),
(62, '18308191-8', 2, '11:30:00', '21:30:00', 60),
(63, '18308191-8', 3, '11:30:00', '21:30:00', 60),
(64, '18308191-8', 4, '11:30:00', '21:30:00', 60),
(65, '18308191-8', 5, '10:30:00', '20:30:00', 60),
(66, '18308191-8', 6, '00:00:00', '00:00:00', 60),
(67, '18308191-8', 7, '00:00:00', '00:00:00', 60),
(68, '16895431-k', 1, '14:30:00', '23:00:00', 30),
(69, '16895431-k', 2, '14:30:00', '23:00:00', 30),
(70, '16895431-k', 3, '14:30:00', '23:00:00', 30),
(71, '16895431-k', 4, '14:30:00', '23:00:00', 30),
(72, '16895431-k', 5, '14:30:00', '23:00:00', 30),
(73, '16895431-k', 6, '13:00:00', '21:30:00', 30),
(74, '16895431-k', 7, '00:00:00', '00:00:00', 0),
(75, '17344795-7', 1, '10:30:00', '20:00:00', 30),
(76, '17344795-7', 2, '10:30:00', '18:00:00', 30),
(77, '17344795-7', 3, '10:30:00', '18:00:00', 30),
(78, '17344795-7', 4, '00:00:00', '00:00:00', 30),
(79, '17344795-7', 5, '10:30:00', '18:00:00', 30),
(80, '17344795-7', 6, '12:30:00', '22:30:00', 30),
(81, '17344795-7', 7, '00:00:00', '00:00:00', 0),
(82, '18657229-7', 1, '10:30:00', '23:00:00', 30),
(83, '18657229-7', 2, '00:00:00', '00:00:00', 30),
(84, '18657229-7', 3, '16:30:00', '23:00:00', 30),
(85, '18657229-7', 4, '12:00:00', '23:00:00', 30),
(86, '18657229-7', 5, '12:00:00', '23:30:00', 30),
(87, '18657229-7', 6, '12:00:00', '23:30:00', 30),
(88, '18657229-7', 7, '00:00:00', '00:00:00', 0),
(89, '26063305-8', 7, '00:00:00', '00:00:00', 0),
(90, '11111111-1', 1, '13:00:00', '21:00:00', 30),
(91, '11111111-1', 2, '13:00:00', '21:00:00', 30),
(92, '11111111-1', 3, '13:00:00', '21:00:00', 30),
(93, '11111111-1', 4, '13:00:00', '21:00:00', 30),
(94, '11111111-1', 5, '13:00:00', '21:00:00', 30),
(95, '11111111-1', 6, '13:00:00', '21:00:00', 30),
(96, '27226339-6', 7, '00:00:00', '00:00:00', 0),
(97, '11111111-1', 7, '00:00:00', '00:00:00', 0),
(98, '11111111-1', 7, '00:00:00', '00:00:00', 0),
(99, '26453542-5', 1, '16:00:00', '23:00:00', 60),
(100, '26453542-5', 2, '11:30:00', '23:00:00', 60),
(101, '26453542-5', 3, '00:00:00', '00:00:00', 60),
(102, '26453542-5', 4, '16:00:00', '23:00:00', 60),
(103, '26453542-5', 5, '16:30:00', '23:30:00', 60),
(104, '26453542-5', 6, '00:00:00', '00:00:00', 60),
(105, '26453542-5', 7, '00:00:00', '00:00:00', 60),
(106, '20373823-4', 1, '10:30:00', '18:00:00', 60),
(107, '20373823-4', 2, '10:30:00', '18:00:00', 60),
(108, '20373823-4', 3, '10:30:00', '18:00:00', 60),
(109, '20373823-4', 4, '10:30:00', '18:00:00', 60),
(110, '20373823-4', 5, '10:30:00', '18:00:00', 60),
(111, '20373823-4', 6, '12:30:00', '23:30:00', 60),
(112, '20373823-4', 7, '00:00:00', '00:00:00', 60),
(113, '26888560-9', 1, '11:30:00', '19:30:00', 30),
(114, '26888560-9', 2, '11:30:00', '19:30:00', 30),
(115, '26888560-9', 3, '11:30:00', '19:30:00', 30),
(116, '26888560-9', 4, '11:30:00', '19:30:00', 30),
(117, '26888560-9', 5, '11:30:00', '19:30:00', 30),
(118, '26888560-9', 6, '11:30:00', '19:30:00', 30),
(119, '26888560-9', 7, '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas_extras_trabajadores`
--

CREATE TABLE `horas_extras_trabajadores` (
  `id` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horas_extras_trabajadores`
--

INSERT INTO `horas_extras_trabajadores` (`id`, `hora`, `trabajador`, `dia`) VALUES
(1, '20:00:00', '26888560-9', 1),
(2, '20:30:00', '26888560-9', 1),
(3, '21:00:00', '26888560-9', 1),
(4, '20:00:00', '26888560-9', 2),
(5, '20:30:00', '26888560-9', 2),
(6, '21:00:00', '26888560-9', 2),
(7, '20:00:00', '26888560-9', 3),
(8, '20:30:00', '26888560-9', 3),
(9, '21:00:00', '26888560-9', 3),
(10, '20:00:00', '26888560-9', 4),
(11, '20:30:00', '26888560-9', 4),
(12, '21:00:00', '26888560-9', 4),
(13, '20:00:00', '26888560-9', 5),
(14, '20:30:00', '26888560-9', 5),
(15, '21:00:00', '26888560-9', 5),
(16, '20:00:00', '26888560-9', 6),
(17, '20:30:00', '26888560-9', 6),
(18, '21:00:00', '26888560-9', 6),
(30, '21:30:00', '27054978-0', 1),
(31, '22:00:00', '27054978-0', 1),
(32, '22:30:00', '27054978-0', 1),
(33, '21:30:00', '27054978-0', 2),
(34, '22:00:00', '27054978-0', 2),
(35, '22:30:00', '27054978-0', 2),
(36, '21:30:00', '27054978-0', 3),
(37, '22:00:00', '27054978-0', 3),
(38, '22:30:00', '27054978-0', 3),
(39, '21:30:00', '27054978-0', 4),
(40, '22:00:00', '27054978-0', 4),
(41, '22:30:00', '27054978-0', 4),
(42, '21:30:00', '27054978-0', 5),
(43, '22:00:00', '27054978-0', 5),
(44, '22:30:00', '27054978-0', 5),
(45, '21:30:00', '27054978-0', 6),
(46, '22:00:00', '27054978-0', 6),
(47, '22:30:00', '27054978-0', 6),
(48, '22:00:00', '18417435-9', 2),
(49, '22:30:00', '18417435-9', 2),
(50, '23:00:00', '18417435-9', 2),
(51, '22:00:00', '18417435-9', 3),
(52, '22:30:00', '18417435-9', 3),
(53, '23:00:00', '18417435-9', 3),
(54, '22:00:00', '18417435-9', 4),
(55, '22:30:00', '18417435-9', 4),
(56, '23:00:00', '18417435-9', 4),
(57, '22:00:00', '18417435-9', 5),
(58, '22:30:00', '18417435-9', 5),
(59, '23:00:00', '18417435-9', 5),
(60, '23:30:00', '18417435-9', 5),
(61, '22:00:00', '18417435-9', 6),
(62, '22:30:00', '18417435-9', 6),
(63, '23:00:00', '18417435-9', 6),
(64, '23:30:00', '18417435-9', 6),
(65, '22:00:00', '18308191-8', 1),
(66, '22:30:00', '18308191-8', 1),
(67, '22:00:00', '18308191-8', 2),
(68, '22:30:00', '18308191-8', 2),
(69, '22:00:00', '18308191-8', 3),
(70, '22:30:00', '18308191-8', 3),
(71, '22:00:00', '18308191-8', 4),
(72, '22:30:00', '18308191-8', 4),
(73, '21:00:00', '18308191-8', 5),
(74, '21:30:00', '18308191-8', 5),
(75, '22:00:00', '18308191-8', 5),
(76, '22:00:00', '11111111-1', 1),
(77, '22:30:00', '11111111-1', 1),
(78, '23:00:00', '11111111-1', 1),
(79, '22:00:00', '11111111-1', 2),
(80, '22:30:00', '11111111-1', 2),
(81, '23:00:00', '11111111-1', 2),
(82, '22:00:00', '11111111-1', 3),
(83, '22:30:00', '11111111-1', 3),
(84, '23:00:00', '11111111-1', 3),
(85, '22:00:00', '11111111-1', 4),
(86, '22:30:00', '11111111-1', 4),
(87, '23:00:00', '11111111-1', 4),
(88, '22:00:00', '11111111-1', 5),
(89, '22:30:00', '11111111-1', 5),
(90, '23:00:00', '11111111-1', 5),
(91, '22:00:00', '11111111-1', 6),
(92, '22:30:00', '11111111-1', 6),
(93, '23:00:00', '11111111-1', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT '0',
  `stock` double DEFAULT '0',
  `stock_minimo` double DEFAULT '0',
  `medida` varchar(10) DEFAULT '0',
  `mostrar` int(11) DEFAULT '0',
  `para_venta` int(11) DEFAULT '0',
  `precio_venta` int(11) DEFAULT NULL,
  `gramos_venta` double DEFAULT '0',
  `unidad_compra` double NOT NULL DEFAULT '0',
  `cantida_unidad_compra` double NOT NULL DEFAULT '0',
  `medida_equivalencia` varchar(11) NOT NULL DEFAULT '0',
  `lugar_venta` int(11) DEFAULT '0',
  `abreviatura` varchar(100) DEFAULT '-',
  `codigo` varchar(45) DEFAULT NULL,
  `porcentaje_merma` double DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL COMMENT '0: no\\n1: si',
  `precio_venta_insumo_delivery` int(11) DEFAULT NULL,
  `gramo_insumo_venta_delivery` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`, `precio`, `categoria`, `stock`, `stock_minimo`, `medida`, `mostrar`, `para_venta`, `precio_venta`, `gramos_venta`, `unidad_compra`, `cantida_unidad_compra`, `medida_equivalencia`, `lugar_venta`, `abreviatura`, `codigo`, `porcentaje_merma`, `delivery`, `precio_venta_insumo_delivery`, `gramo_insumo_venta_delivery`) VALUES
(1, 'LOMO VETADO', 8000, 0, -1627, 100, 'GR', 1, 1, 0, 0, 0, 0, '0', 1, 'LOMO', 'NULL', 0, 0, 0, 0),
(4, 'CHEDDAR', 0, 0, 941, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', 0, 'CHEDDAR', 'NULL', 0, 0, 0, 0),
(5, 'PAN', 0, 0, -615, 0, 'U', 1, 1, 0, 0, 0, 0, '0', 0, 'PAN', 'NULL', 0, 0, 0, 0),
(6, 'QUESO', 0, 0, -472, 0, 'U', 1, 1, 0, 0, 0, 0, '0', 0, 'QUESO', 'NULL', 0, 0, 0, 0),
(7, 'CEBOLLA MORADA', 0, 0, -319, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'CEBOLLA MORADA', 'NULL', 0, 0, 0, 0),
(8, 'LECHUGA', 0, 0, -1350, 0, 'CC', 1, 1, 0, 0, 0, 0, '0', 0, 'LECHUGA', 'NULL', 0, 0, 0, 0),
(9, 'TOMATES', 0, 0, -1423, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'TOMATES', 'NULL', 0, 0, 0, 0),
(10, 'PEPINILLOS', 0, 0, -1610, 0, 'GR', 1, 0, 500, 0, 0, 0, '0', 1, 'PEPINILLOS', 'NULL', 0, 0, 0, 0),
(11, 'SALSA DE LA CASA', 0, 0, -1092, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'SALSA DE LA CASA', 'NULL', 0, 0, 0, 0),
(12, 'BACON', 0, 0, -904, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'BACON', 'NULL', 0, 0, 0, 0),
(13, 'AROS DE CEBOLLA', 0, 0, 0, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'AROS DE CEBOLLA', 'NULL', 0, 0, 0, 0),
(14, 'CHAMPIÃ‘ONES', 0, 0, -121, 0, 'GR', 1, 0, 500, 0, 0, 0, '0', 1, 'CHAMPIÃ‘ONES', 'NULL', 0, 0, 0, 0),
(15, 'CAMARONES', 0, 0, -800, 0, 'GR', 1, 0, 2500, 100, 0, 0, '0', 1, 'CAMARONES', 'NULL', 0, 0, 0, 0),
(16, 'CIBOULETTE', 0, 0, 0, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'CIBOULETTE', 'NULL', 0, 0, 0, 0),
(17, 'CEBOLLIN', 0, 0, 0, 0, 'GR', 1, 1, 0, 0, 0, 0, 'GR', NULL, '', 'NULL', 0, 0, 0, 0),
(18, 'POLLO', 0, 0, 0, 0, 'GR', 1, 1, 0, 0, 0, 0, '0', NULL, 'POLLO', 'NULL', 0, 0, 0, 0),
(19, 'REPOLLO MORADO', 0, 0, -98, 0, 'x', 1, 1, 0, 0, 0, 0, 'GR', 0, 'REPOLLO MORADO', 'NULL', 0, 0, 0, 0),
(20, 'CHOCLO', 0, 0, -111, 0, 'x', 1, 1, 0, 0, 0, 0, 'GR', 0, 'CHOCLO', 'NULL', 0, 0, 0, 0),
(21, 'DIENTES DE DRAGON', 0, 0, -108, 0, 'x', 1, 1, 0, 0, 0, 0, '0', 0, 'DIENTES DE DRAGON', 'NULL', 0, 0, 0, 0),
(22, 'SALMON SALTEADO', 0, 0, 0, 0, 'x', 1, 1, 0, 0, 0, 0, '0', 0, 'SALMON SALTEADO', 'NULL', 0, 0, 0, 0),
(23, 'SALMON CRUDO', 0, 0, 0, 0, 'x', 1, 1, 0, 0, 0, 0, '0', 0, 'SALMON CRUDO', 'NULL', 0, 0, 0, 0),
(24, 'PALTA', 0, 0, -193, 0, 'x', 1, 0, 500, 0, 0, 0, '0', 1, 'PALTA', 'NULL', 0, 0, 0, 0),
(25, 'NUECES', 0, 0, 0, 0, 'x', 1, 0, 800, 0, 0, 0, '0', 1, 'NUECES', 'NULL', 0, 0, 0, 0),
(26, 'ALMENDRAS', 0, 0, 0, 0, 'x', 1, 0, 800, 0, 0, 0, '0', 1, 'ALMENDRAS', 'NULL', 0, 0, 0, 0),
(27, 'SEMILLAS DE ZAPALLO', 0, 0, 0, 0, 'GR', 1, 0, 800, 0, 0, 0, '0', 1, 'SEMILLAS DE ZAPALLO', 'NULL', 0, 0, 0, 0),
(28, 'QUESO PHILADELPHIA', 0, 0, 0, 0, 'GR', 1, 0, 600, 0, 0, 0, '0', 1, 'QUESO PHILADELPHIA', 'NULL', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isapres`
--

CREATE TABLE `isapres` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `isapres`
--

INSERT INTO `isapres` (`id`, `nombre`) VALUES
(1, 'COLMENA'),
(2, 'CONSALUD'),
(3, 'CRUZ BLANCA'),
(4, 'VIDA TRES'),
(5, 'BANMEDICA'),
(6, 'ISALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(45) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `ignore_limits` tinyint(1) DEFAULT NULL,
  `is_private_key` tinyint(1) DEFAULT NULL,
  `ip_addresses` text,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '28d5140d8950431cbc40ad6989fcd4f2', 0, 0, 1, 'NULL', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `numero_licencia` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `responsable` varchar(12) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `producto_eliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `mostrar` int(11) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `nombre`, `estado`, `mostrar`, `nivel`) VALUES
(4, '1', 0, 0, 1),
(5, '2', 0, 0, 1),
(6, '3', 0, 0, 1),
(7, '4', 0, 0, 1),
(8, '5', 0, 0, 1),
(9, '6', 0, 0, 1),
(10, '7', 0, 0, 1),
(11, '8', 0, 0, 2),
(12, '9', 0, 0, 2),
(14, '10', 0, 0, 2),
(15, '11', 0, 0, 2),
(16, '12', 0, 0, 2),
(17, '13', 0, 0, 2),
(18, '14', 0, 0, 2),
(19, '15', 0, 0, 2),
(20, '16', 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `PAIS_NAC` varchar(45) NOT NULL,
  `GENTILICIO_NAC` varchar(45) DEFAULT NULL,
  `ISO_NAC` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`PAIS_NAC`, `GENTILICIO_NAC`, `ISO_NAC`) VALUES
('Afganistán', 'AFGANA', 'AFG'),
('Albania', 'ALBANESA', 'ALB'),
('Alemania', 'ALEMANA', 'DEU'),
('Andorra', 'ANDORRANA', 'AND'),
('Angola', 'ANGOLEÑA', 'AGO'),
('AntiguayBarbuda', 'ANTIGUANA', 'ATG'),
('ArabiaSaudita', 'SAUDÍ', 'SAU'),
('Argelia', 'ARGELINA', 'DZA'),
('Argentina', 'ARGENTINA', 'ARG'),
('Armenia', 'ARMENIA', 'ARM'),
('Aruba', 'ARUBEÑA', 'ABW'),
('Australia', 'AUSTRALIANA', 'AUS'),
('Austria', 'AUSTRIACA', 'AUT'),
('Azerbaiyán', 'AZERBAIYANA', 'AZE'),
('Bahamas', 'BAHAMEÑA', 'BHS'),
('Bangladés', 'BANGLADESÍ', 'BGD'),
('Barbados', 'BARBADENSE', 'BRB'),
('Baréin', 'BAREINÍ', 'BHR'),
('Bélgica', 'BELGA', 'BEL'),
('Belice', 'BELICEÑA', 'BLZ'),
('Benín', 'BENINÉSA', 'BEN'),
('Bielorrusia', 'BIELORRUSA', 'BLR'),
('Birmania', 'BIRMANA', 'MMR'),
('Bolivia', 'BOLIVIANA', 'BOL'),
('BosniayHerzegovina', 'BOSNIA', 'BIH'),
('Botsuana', 'BOTSUANA', 'BWA'),
('Brasil', 'BRASILEÑA', 'BRA'),
('Brunéi', 'BRUNEANA', 'BRN'),
('Bulgaria', 'BÚLGARA', 'BGR'),
('BurkinaFaso', 'BURKINÉS', 'BFA'),
('Burundi', 'BURUNDÉSA', 'BDI'),
('Bután', 'BUTANÉSA', 'BTN'),
('CaboVerde', 'CABOVERDIANA', 'CPV'),
('Camboya', 'CAMBOYANA', 'KHM'),
('Camerún', 'CAMERUNESA', 'CMR'),
('Canadá', 'CANADIENSE', 'CAN'),
('Catar', 'CATARÍ', 'QAT'),
('Chad', 'CHADIANA', 'TCD'),
('Chile', 'CHILENA', 'CHL'),
('China', 'CHINA', 'CHN'),
('Chipre', 'CHIPRIOTA', 'CYP'),
('CiudaddelVaticano', 'VATICANA', 'VAT'),
('Colombia', 'COLOMBIANA', 'COL'),
('Comoras', 'COMORENSE', 'COM'),
('CoreadelNorte', 'NORCOREANA', 'PRK'),
('CoreadelSur', 'SURCOREANA', 'KOR'),
('CostadeMarfil', 'MARFILEÑA', 'CIV'),
('CostaRica', 'COSTARRICENSE', 'CRI'),
('Croacia', 'CROATA', 'HRV'),
('Cuba', 'CUBANA', 'CUB'),
('Dinamarca', 'DANÉSA', 'DNK'),
('Dominica', 'DOMINIQUÉS', 'DMA'),
('Ecuador', 'ECUATORIANA', 'ECU'),
('Egipto', 'EGIPCIA', 'EGY'),
('ElSalvador', 'SALVADOREÑA', 'SLV'),
('EmiratosÁrabesUnidos', 'EMIRATÍ', 'ARE'),
('Eritrea', 'ERITREA', 'ERI'),
('Eslovaquia', 'ESLOVACA', 'SVK'),
('Eslovenia', 'ESLOVENA', 'SVN'),
('España', 'ESPAÑOLA', 'ESP'),
('EstadosUnidos', 'ESTADOUNIDENSE', 'USA'),
('Estonia', 'ESTONIA', 'EST'),
('Etiopía', 'ETÍOPE', 'ETH'),
('Filipinas', 'FILIPINA', 'PHL'),
('Finlandia', 'FINLANDÉSA', 'FIN'),
('Fiyi', 'FIYIANA', 'FJI'),
('Francia', 'FRANCÉSA', 'FRA'),
('Gabón', 'GABONÉSA', 'GAB'),
('Gambia', 'GAMBIANA', 'GMB'),
('Georgia', 'GEORGIANA', 'GEO'),
('Ghana', 'GHANÉSA', 'GHA'),
('Gibraltar', 'GIBRALTAREÑA', 'GIB'),
('Granada', 'GRANADINA', 'GRD'),
('Grecia', 'GRIEGA', 'GRC'),
('Groenlandia', 'GROENLANDÉSA', 'GRL'),
('Guatemala', 'GUATEMALTECA', 'GTM'),
('Guinea', 'GUINEANA', 'GIN'),
('Guinea-Bisáu', 'GUINEANA', 'GNB'),
('Guineaecuatorial', 'ECUATOGUINEANA', 'GNQ'),
('Guyana', 'GUYANESA', 'GUY'),
('Haití', 'HAITIANA', 'HTI'),
('Honduras', 'HONDUREÑA', 'HND'),
('Hungría', 'HÚNGARA', 'HUN'),
('India', 'HINDÚ', 'IND'),
('Indonesia', 'INDONESIA', 'IDN'),
('Irak', 'IRAQUÍ', 'IRQ'),
('Irán', 'IRANÍ', 'IRN'),
('Irlanda', 'IRLANDÉSA', 'IRL'),
('Islandia', 'ISLANDÉSA', 'ISL'),
('IslasCook', 'COOKIANA', 'COK'),
('IslasMarshall', 'MARSHALÉSA', 'MHL'),
('IslasSalomón', 'SALOMONENSE', 'SLB'),
('Israel', 'ISRAELÍ', 'ISR'),
('Italia', 'ITALIANA', 'ITA'),
('Jamaica', 'JAMAIQUINA', 'JAM'),
('Japón', 'JAPONÉSA', 'JPN'),
('Jordania', 'JORDANA', 'JOR'),
('Kazajistán', 'KAZAJA', 'KAZ'),
('Kenia', 'KENIATA', 'KEN'),
('Kirguistán', 'KIRGUISA', 'KGZ'),
('Kiribati', 'KIRIBATIANA', 'KIR'),
('Kuwait', 'KUWAITÍ', 'KWT'),
('Laos', 'LAOSIANA', 'LAO'),
('Lesoto', 'LESOTENSE', 'LSO'),
('Letonia', 'LETÓNA', 'LVA'),
('Líbano', 'LIBANÉSA', 'LBN'),
('Liberia', 'LIBERIANA', 'LBR'),
('Libia', 'LIBIA', 'LBY'),
('Liechtenstein', 'LIECHTENSTEINIANA', 'LIE'),
('Lituania', 'LITUANA', 'LTU'),
('Luxemburgo', 'LUXEMBURGUÉSA', 'LUX'),
('Madagascar', 'MALGACHE', 'MDG'),
('Malasia', 'MALASIA', 'MYS'),
('Malaui', 'MALAUÍ', 'MWI'),
('Maldivas', 'MALDIVA', 'MDV'),
('Malí', 'MALIENSE', 'MLI'),
('Malta', 'MALTÉSA', 'MLT'),
('Marruecos', 'MARROQUÍ', 'MAR'),
('Martinica', 'MARTINIQUÉS', 'MTQ'),
('Mauricio', 'MAURICIANA', 'MUS'),
('Mauritania', 'MAURITANA', 'MRT'),
('México', 'MEXICANA', 'MEX'),
('Micronesia', 'MICRONESIA', 'FSM'),
('Moldavia', 'MOLDAVA', 'MDA'),
('Mónaco', 'MONEGASCA', 'MCO'),
('Mongolia', 'MONGOLA', 'MNG'),
('Montenegro', 'MONTENEGRINA', 'MNE'),
('Mozambique', 'MOZAMBIQUEÑA', 'MOZ'),
('Namibia', 'NAMIBIA', 'NAM'),
('Nauru', 'NAURUANA', 'NRU'),
('Nepal', 'NEPALÍ', 'NPL'),
('Nicaragua', 'NICARAGÜENSE', 'NIC'),
('Níger', 'NIGERINA', 'NER'),
('Nigeria', 'NIGERIANA', 'NGA'),
('Noruega', 'NORUEGA', 'NOR'),
('NuevaZelanda', 'NEOZELANDÉSA', 'NZL'),
('Omán', 'OMANÍ', 'OMN'),
('PaísesBajos', 'NEERLANDÉSA', 'NLD'),
('Pakistán', 'PAKISTANÍ', 'PAK'),
('Palaos', 'PALAUANA', 'PLW'),
('Palestina', 'PALESTINA', 'PSE'),
('Panamá', 'PANAMEÑA', 'PAN'),
('PapúaNuevaGuinea', 'PAPÚ', 'PNG'),
('Paraguay', 'PARAGUAYA', 'PRY'),
('Perú', 'PERUANA', 'PER'),
('Polonia', 'POLACA', 'POL'),
('Portugal', 'PORTUGUÉSA', 'PRT'),
('PuertoRico', 'PUERTORRIQUEÑA', 'PRI'),
('ReinoUnido', 'BRITÁNICA', 'GBR'),
('RepúblicaCentroafricana', 'CENTROAFRICANA', 'CAF'),
('RepúblicaCheca', 'CHECA', 'CZE'),
('RepúblicadelCongo', 'CONGOLEÑA', 'COG'),
('RepúblicadeMacedonia', 'MACEDONIA', 'MKD'),
('RepúblicaDemocráticadelCongo', 'CONGOLEÑA', 'COD'),
('RepúblicaDominicana', 'DOMINICANA', 'DOM'),
('RepúblicaSudafricana', 'SUDAFRICANA', 'ZAF'),
('Ruanda', 'RUANDÉSA', 'RWA'),
('Rumanía', 'RUMANA', 'ROU'),
('Rusia', 'RUSA', 'RUS'),
('Samoa', 'SAMOANA', 'WSM'),
('SanCristóbalyNieves', 'CRISTOBALEÑA', 'KNA'),
('SanMarino', 'SANMARINENSE', 'SMR'),
('SantaLucía', 'SANTALUCENSE', 'LCA'),
('SantoToméyPríncipe', 'SANTOTOMENSE', 'STP'),
('SanVicenteylasGranadinas', 'SANVICENTINA', 'VCT'),
('Senegal', 'SENEGALÉSA', 'SEN'),
('Serbia', 'SERBIA', 'SRB'),
('Seychelles', 'SEYCHELLENSE', 'SYC'),
('SierraLeona', 'SIERRALEONÉSA', 'SLE'),
('Singapur', 'SINGAPURENSE', 'SGP'),
('Siria', 'SIRIA', 'SYR'),
('Somalia', 'SOMALÍ', 'SOM'),
('SriLanka', 'CEILANÉSA', 'LKA'),
('Suazilandia', 'SUAZI', 'SWZ'),
('Sudán', 'SUDANÉSA', 'SDN'),
('SudándelSur', 'SURSUDANÉSA', 'SSD'),
('Suecia', 'SUECA', 'SWE'),
('Suiza', 'SUIZA', 'CHE'),
('Surinam', 'SURINAMESA', 'SUR'),
('Tailandia', 'TAILANDÉSA', 'THA'),
('Tanzania', 'TANZANA', 'TZA'),
('Tayikistán', 'TAYIKA', 'TJK'),
('TimorOriental', 'TIMORENSE', 'TLS'),
('Togo', 'TOGOLÉSA', 'TGO'),
('Tonga', 'TONGANA', 'TON'),
('TrinidadyTobago', 'TRINITENSE', 'TTO'),
('Túnez', 'TUNECINA', 'TUN'),
('Turkmenistán', 'TURCOMANA', 'TKM'),
('Turquía', 'TURCA', 'TUR'),
('Tuvalu', 'TUVALUANA', 'TUV'),
('Ucrania', 'UCRANIANA', 'UKR'),
('Uganda', 'UGANDÉSA', 'UGA'),
('Uruguay', 'URUGUAYA', 'URY'),
('Uzbekistán', 'UZBEKA', 'UZB'),
('Vanuatu', 'VANUATUENSE', 'VUT'),
('Venezuela', 'VENEZOLANA', 'VEN'),
('Vietnam', 'VIETNAMITA', 'VNM'),
('Yemen', 'YEMENÍ', 'YEM'),
('Yibuti', 'YIBUTIANA', 'DJI'),
('Zambia', 'ZAMBIANA', 'ZMB'),
('Zimbabue', 'ZIMBABUENSE', 'ZWE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `numero_pago` int(11) NOT NULL,
  `tipo_pago` varchar(45) DEFAULT NULL,
  `dinero_recibido` int(11) DEFAULT NULL,
  `deuda_final` int(11) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete_ingredientes`
--

CREATE TABLE `paquete_ingredientes` (
  `id` int(11) NOT NULL,
  `numero_paquete_ingrediente` int(11) DEFAULT NULL,
  `nombre` varchar(450) DEFAULT NULL,
  `repetible` varchar(4) DEFAULT NULL COMMENT '0: no\\n1 :si',
  `obligatorio` varchar(4) DEFAULT NULL COMMENT '0: no\\n1 :si',
  `minimo` double DEFAULT NULL,
  `maximo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `numero_producto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `barra` int(11) DEFAULT '0',
  `stock` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `margen` double DEFAULT NULL,
  `imagen` varchar(255) DEFAULT 'nd.jpg',
  `categoria` int(11) DEFAULT NULL,
  `informacion` text,
  `mostrar` int(11) DEFAULT '1',
  `promo_bebestible` int(11) DEFAULT '0',
  `promo_comida` int(11) DEFAULT '0',
  `tipo_cocina` int(11) DEFAULT '0',
  `es_happy` int(11) DEFAULT NULL,
  `hora_inicio_hh` time DEFAULT NULL,
  `hora_termino_hh` time DEFAULT '00:00:00',
  `precio_venta_hh` int(11) DEFAULT '0',
  `codigo_producto` varchar(45) NOT NULL,
  `para_delivery` int(11) DEFAULT NULL COMMENT '0: NO \\n1: SI',
  `mostrar_pagina` varchar(45) DEFAULT NULL COMMENT '0: NO \\n1: SI\\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `giro` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `es_empresa` int(11) DEFAULT NULL,
  `mostrar` int(11) DEFAULT '0',
  `credito_utilizado` int(11) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `provincia` varchar(64) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `provincia`, `region_id`) VALUES
(1, 'Arica', 1),
(2, 'Parinacota', 1),
(3, 'Iquique', 2),
(4, 'El Tamarugal', 2),
(5, 'Tocopilla', 3),
(6, 'El Loa', 3),
(7, 'Antofagasta', 3),
(8, 'ChaÃ±aral', 4),
(9, 'CopiapÃ³', 4),
(10, 'Huasco', 4),
(11, 'Elqui', 5),
(12, 'LimarÃ­', 5),
(13, 'Choapa', 5),
(14, 'Petorca', 6),
(15, 'Los Andes', 6),
(16, 'San Felipe de Aconcagua', 6),
(17, 'Quillota', 6),
(18, 'Valparaiso', 6),
(19, 'San Antonio', 6),
(20, 'Isla de Pascua', 6),
(21, 'Marga Marga', 6),
(22, 'Chacabuco', 7),
(23, 'Santiago', 7),
(24, 'Cordillera', 7),
(25, 'Maipo', 7),
(26, 'Melipilla', 7),
(27, 'Talagante', 7),
(28, 'Cachapoal', 8),
(29, 'Colchagua', 8),
(30, 'Cardenal Caro', 8),
(31, 'CuricÃ³', 9),
(32, 'Talca', 9),
(33, 'Linares', 9),
(34, 'Cauquenes', 9),
(35, 'DiguillÃ­n', 10),
(36, 'Itata', 10),
(37, 'Punilla', 10),
(38, 'Bio BÃ­o', 11),
(39, 'ConcepciÃ³n', 11),
(40, 'Arauco', 11),
(41, 'Malleco', 12),
(42, 'CautÃ­n', 12),
(43, 'Valdivia', 13),
(44, 'Ranco', 13),
(45, 'Osorno', 14),
(46, 'Llanquihue', 14),
(47, 'ChiloÃ©', 14),
(48, 'Palena', 14),
(49, 'Coyhaique', 15),
(50, 'AysÃ©n', 15),
(51, 'General Carrera', 15),
(52, 'CapitÃ¡n Prat', 15),
(53, 'Ãšltima Esperanza', 16),
(54, 'Magallanes', 16),
(55, 'Tierra del Fuego', 16),
(56, 'AntÃ¡rtica Chilena', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `region` varchar(64) DEFAULT NULL,
  `abreviatura` varchar(4) DEFAULT NULL,
  `capital` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `region`, `abreviatura`, `capital`) VALUES
(1, 'Arica y Parinacota', 'AP', 'Arica'),
(2, 'TarapacÃ¡', 'TA', 'Iquique'),
(3, 'Antofagasta', 'AN', 'Antofagasta'),
(4, 'Atacama', 'AT', 'CopiapÃ³'),
(5, 'Coquimbo', 'CO', 'La Serena'),
(6, 'Valparaiso', 'VA', 'valparaÃ­so'),
(7, 'Metropolitana de Santiago', 'RM', 'Santiago'),
(8, 'Libertador General Bernardo O\'Higgins', 'OH', 'Rancagua'),
(9, 'Maule', 'MA', 'Talca'),
(10, 'Ã‘uble', 'NB', 'ChillÃ¡n'),
(11, 'BiobÃ­o', 'BI', 'ConcepciÃ³n'),
(12, 'La AraucanÃ­a', 'IAR', 'Temuco'),
(13, 'Los RÃ­os', 'LR', 'Valdivia'),
(14, 'Los Lagos', 'LL', 'Puerto Montt'),
(15, 'AysÃ©n del General Carlos IbÃ¡Ã±ez del Campo', 'AI', 'Coyhaique'),
(16, 'Magallanes y de la AntÃ¡rtica Chilena', 'MG', 'Punta Arenas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `nombres` varchar(450) DEFAULT NULL,
  `apellidos` varchar(450) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado_civil` int(11) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `correo` varchar(600) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` text,
  `cargo` text,
  `tipo_salud` int(11) DEFAULT NULL,
  `isapre` int(11) DEFAULT NULL,
  `sueldo` int(11) DEFAULT NULL,
  `afp` int(11) DEFAULT NULL,
  `tipo_contrato` int(11) DEFAULT NULL,
  `carga_familiar` int(11) DEFAULT NULL,
  `contrato_indefinido` int(11) DEFAULT NULL,
  `duracion_contrato` int(11) DEFAULT NULL,
  `mostrar` int(11) DEFAULT NULL,
  `finiquitado` int(11) DEFAULT NULL,
  `numero_cargas` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `modalidad_trabajo` int(11) DEFAULT NULL,
  `trabaja_hora_extras` int(11) DEFAULT NULL,
  `fecha_pacto` date DEFAULT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `uf_plan` double DEFAULT NULL,
  `movilizacion` int(11) DEFAULT NULL,
  `colacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id`, `rut`, `nombres`, `apellidos`, `fecha_ingreso`, `nacionalidad`, `fecha_nacimiento`, `estado_civil`, `ciudad`, `correo`, `telefono`, `direccion`, `cargo`, `tipo_salud`, `isapre`, `sueldo`, `afp`, `tipo_contrato`, `carga_familiar`, `contrato_indefinido`, `duracion_contrato`, `mostrar`, `finiquitado`, `numero_cargas`, `area`, `modalidad_trabajo`, `trabaja_hora_extras`, `fecha_pacto`, `sexo`, `uf_plan`, `movilizacion`, `colacion`) VALUES
(3, '10313718-7', 'LORENZA JUSTINA', 'RIOSECO SILVA', '2019-03-08', 'CHILENA', '1964-09-05', 4, 'CONCEPCION', 'correo@correo.cl', 953485922, 'CALLE 2 CASA N° 530', 'AYUDANTE DE COCINA', 1, NULL, 326500, 5, 1, 1, 1, 0, 0, 0, 0, 2, 1, 1, '2021-06-09', 'F', 0, 69625, 0),
(11, '11111111-1', 'BRYAN ALEXANDER', 'ARENAS TANG', '2021-01-14', 'VENEZOLANA', '1999-03-18', 1, 'CONCEPCION', 'correo@correo.cl', 946139986, 'TUCAPEL 955 CONCEPCION', 'CHEF DE COCINA', 1, 0, 326500, 7, 2, 1, 0, 12, 0, 0, 0, 1, 1, 2, '2020-06-01', 'M', 0, 0, 0),
(6, '16895431-k', 'ANDY LEONARDO', 'BARRIENTOS SAEZ', '2020-01-02', 'CHILENA', '1988-02-09', 1, 'CONCEPCION', 'correo@correo.cl', 956944015, 'CARTAGENA 3824', 'CHEF DE COCINA', 1, NULL, 326500, 5, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, '2021-06-09', 'M', 0, 25528, 0),
(7, '17344795-7', 'DIEGO', 'PEREZ CASTILLO', '2020-09-28', 'CHILENA', '1989-11-03', 1, 'CONCEPCION', 'correo@correo.cl', 936180726, 'SANTA CLARA 2936 CHILLANCITO', 'CHEF DE COCINA', 1, NULL, 367618, 6, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, '2021-06-09', 'M', 0, 36226, 36226),
(2, '18308191-8', 'RENZO AGUSTÍN', 'ALMIRON CRUCES', '2019-03-01', 'CHILENA', '1991-05-10', 1, 'CONCEPCION', 'correo@correo.cl', 979811509, 'LAS VIOLETAS BLOCK 3239 DEPTO. 203,', 'JEFE DE COCINA', 1, 0, 419270, 6, 1, 1, 1, 0, 0, 0, 0, 1, 1, 2, '2020-06-01', 'M', 0, 75747, 75747),
(5, '18417435-9', 'HECTOR ELIAS', 'SANHUEZA SAN MARTIN', '2019-07-01', 'CHILENA', '1993-06-25', 2, 'CONCEPCION', 'correo@correo.cl', 991493398, 'JUAN JOSE MANZANO 177', 'SUBJEFE DE COCINA', 1, NULL, 373750, 6, 1, 2, 1, 0, 0, 0, 0, 1, 1, 2, '2020-06-01', 'M', 0, 50000, 0),
(8, '18657229-7', 'CRISTOFER MOISES', 'ALARCON LLANOS', '2020-11-30', 'CHILENA', '1994-09-02', 1, 'CONCEPCION', 'correo@correo.cl', 981950774, 'VICUÑA MACKENNA 1498', 'CHEF DE COCINA', 1, NULL, 326500, 4, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, '2021-06-09', 'M', 0, 48526, 0),
(13, '20373823-4', 'JAVIERA CATALINA', 'LLANOS CAMPOS', '2021-05-10', 'CHILENA', '2000-01-24', 1, 'CONCEPCION', 'correo@correo.cl', 952433919, 'SANTA CLARA 2936 CONCEPCION', 'CHEF DE COCINA', 1, NULL, 326500, 7, 2, 1, 0, 1, 0, 0, 0, 1, 1, 1, '2021-06-09', 'F', 0, 24072, 0),
(9, '26063305-8', 'HARMONIE', 'DESSOURCES', '2020-12-01', 'HAITIANA', '2021-06-09', 2, 'CONCEPCION', 'correo@correo.cl', 986808430, 'CALLE LAS TORRES 2080 VILLA CAP', 'AYUDANTE DE COCINA', 1, 0, 326500, 6, 2, 1, 0, 12, 0, 0, 0, 2, 1, 1, '2021-06-09', 'F', 0, 0, 0),
(12, '26453542-5', 'ANGIE MARCELA', 'SOLARTE RUIZ', '2021-05-03', 'COLOMBIANA', '1995-10-27', 2, 'CONCEPCION', 'correo@correo.cl', 962772815, 'JUAN JOSE MANZANO 177 CONCEPCION', 'CHEF DE COCINA', 1, NULL, 0, 7, 2, 1, 0, 12, 0, 0, 0, 1, 2, 1, '2021-06-09', 'F', 0, 0, 0),
(1, '26888560-9', 'YOSBER JAVIER', 'MARÍN MENDEZ', '2021-06-01', 'VENEZOLANA', '1993-09-28', 1, 'CONCEPCION', 'correo@correo.cl', 964356796, 'PELANTARO 1251', 'CHEF DE COCINA', 1, NULL, 326500, 6, 2, 1, 0, 3, 0, 0, 0, 1, 1, 2, '2021-06-01', 'M', 0, 0, 0),
(4, '27054978-0', 'CARMEN FATIMA', 'DE SA BRAZAO', '2021-06-09', 'VENEZOLANA', '1989-07-20', 2, 'CONCEPCION', 'carmendesa1989@gmail.com', 937464169, 'SALAS 1540 DEPTO M 52', 'RECEPCIONISTA', 1, NULL, 326500, 6, 1, 1, 1, 0, 0, 0, 0, 3, 1, 2, '2020-06-01', '', 0, 57896, 57896),
(10, '27226339-6', 'DOUGLAS GILBERTO', 'ESPAÑA MARCANO', '2021-01-23', 'VENEZOLANA', '1996-11-30', 2, 'CONCEPCION', 'ludoka96@gmail.com', 979302858, 'PORVENIR 820 CHIGUAYANTE', 'CHEF DE COCINA', 1, NULL, 400000, 6, 2, 1, 0, 12, 0, 0, 0, 1, 1, 1, '2021-06-09', 'M', 0, 38850, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `trabajador` varchar(12) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `semana` varchar(45) DEFAULT NULL,
  `opcion_trabajador` varchar(4) DEFAULT NULL,
  `valor_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `rango` int(11) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `mostrar` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `expiracion_login` datetime DEFAULT NULL,
  `conectado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `clave`, `rango`, `nombres`, `apellidos`, `mostrar`, `token`, `ultimo_login`, `expiracion_login`, `conectado`) VALUES
(1, 'garcias.aravena@gmail.com', '$2a$08$cT3qc2TCBUjoU8l17GHgXOTYPyuXJLiU8uNi6rl6773O8pzmtdoye', 0, 'PEDRO', 'GARCIAS', 0, '1301916f9e28a19f7f35386965c60019', '2021-07-02 17:43:21', '2021-07-03 05:43:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `trabajador` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `numero_venta` int(11) DEFAULT '0',
  `numero_comprobante` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_pago` datetime DEFAULT CURRENT_TIMESTAMP,
  `dinero_recibido` int(11) DEFAULT NULL,
  `vuelto` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `propina` int(11) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `cliente` varchar(25) DEFAULT NULL,
  `garzon` varchar(500) DEFAULT NULL,
  `pagado` int(11) DEFAULT '0',
  `saldo_pendiente` int(11) DEFAULT NULL,
  `mesas` varchar(45) DEFAULT NULL,
  `comensales` int(11) DEFAULT '1',
  `descuento` int(11) DEFAULT NULL,
  `descripcion_descuento` text,
  `estado_despacho` int(11) DEFAULT '0',
  `mensaje_cocina` int(11) UNSIGNED DEFAULT '0',
  `nombre_cliente` varchar(200) DEFAULT '-',
  `mensaje_entrada` int(11) DEFAULT '0',
  `numero_operacion` int(11) DEFAULT NULL,
  `observacion_general` text,
  `direccion_cliente` text,
  `delivery` int(11) DEFAULT NULL,
  `numero_boleta_electronica` int(11) DEFAULT NULL,
  `tipo_delivery` int(11) DEFAULT NULL,
  `hora_delivery` time DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `id` (`id`,`rut`);

--
-- Indices de la tabla `afp`
--
ALTER TABLE `afp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `ausencias`
--
ALTER TABLE `ausencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_t2323dsa_idx` (`trabajador`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`numero_caja`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`nombre`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`telefono`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `colaciones_trabajadores`
--
ALTER TABLE `colaciones_trabajadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_t2_idx` (`trabajador`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`numero_compra`),
  ADD KEY `id` (`id`,`numero_pago`,`rut`),
  ADD KEY `FK_ruuu_idx` (`rut`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`telefono`),
  ADD KEY `fk_cccc_idx` (`telefono`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_c_idx` (`numero_compra`);

--
-- Indices de la tabla `detalle_paquete_ingrediente`
--
ALTER TABLE `detalle_paquete_ingrediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`numero_paquete_ingrediente`,`ingrediente`),
  ADD KEY `fk_di_idx` (`ingrediente`),
  ADD KEY `fk_dp_idx` (`numero_paquete_ingrediente`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodddddcs_idx` (`producto`),
  ADD KEY `id` (`numero_comprobante`,`numero_venta`,`id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`telefono`),
  ADD KEY `fk_c33_idx` (`telefono`);

--
-- Indices de la tabla `documentos_trabajadores`
--
ALTER TABLE `documentos_trabajadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_t333_idx` (`trabajador`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`numero_gasto`),
  ADD KEY `id` (`id`,`rut`),
  ADD KEY `fk_rut_idx` (`rut`);

--
-- Indices de la tabla `horario_trabajadores`
--
ALTER TABLE `horario_trabajadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_t44343_idx` (`trabajador`);

--
-- Indices de la tabla `horas_extras_trabajadores`
--
ALTER TABLE `horas_extras_trabajadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_t2_idx` (`trabajador`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`categoria`);

--
-- Indices de la tabla `isapres`
--
ALTER TABLE `isapres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_v_idx` (`trabajador`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_r_idx` (`responsable`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`PAIS_NAC`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`numero_pago`),
  ADD KEY `id` (`id`,`rut`);

--
-- Indices de la tabla `paquete_ingredientes`
--
ALTER TABLE `paquete_ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`numero_producto`,`codigo_producto`),
  ADD KEY `id` (`id`,`categoria`,`numero_producto`,`codigo_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `id` (`id`,`rut`),
  ADD KEY `fk_afp_idx` (`afp`),
  ADD KEY `fk_area_idx` (`area`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_trabaj_idx` (`trabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `id` (`id`,`correo`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`trabajador`),
  ADD KEY `fk_v_idx` (`trabajador`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`numero_comprobante`,`numero_venta`,`garzon`,`cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `afp`
--
ALTER TABLE `afp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ausencias`
--
ALTER TABLE `ausencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colaciones_trabajadores`
--
ALTER TABLE `colaciones_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_paquete_ingrediente`
--
ALTER TABLE `detalle_paquete_ingrediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentos_trabajadores`
--
ALTER TABLE `documentos_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_trabajadores`
--
ALTER TABLE `horario_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `horas_extras_trabajadores`
--
ALTER TABLE `horas_extras_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `isapres`
--
ALTER TABLE `isapres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paquete_ingredientes`
--
ALTER TABLE `paquete_ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1257;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ausencias`
--
ALTER TABLE `ausencias`
  ADD CONSTRAINT `fk_t2323dsa` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `colaciones_trabajadores`
--
ALTER TABLE `colaciones_trabajadores`
  ADD CONSTRAINT `fk_t223232asdas` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `FK_ruuu` FOREIGN KEY (`rut`) REFERENCES `proveedores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fk_cccc` FOREIGN KEY (`telefono`) REFERENCES `clientes` (`telefono`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `fk_c` FOREIGN KEY (`numero_compra`) REFERENCES `compras` (`numero_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_paquete_ingrediente`
--
ALTER TABLE `detalle_paquete_ingrediente`
  ADD CONSTRAINT `fk_di` FOREIGN KEY (`ingrediente`) REFERENCES `ingredientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dp` FOREIGN KEY (`numero_paquete_ingrediente`) REFERENCES `paquete_ingredientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `fk_prodddddcs` FOREIGN KEY (`producto`) REFERENCES `productos` (`numero_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `fk_c33` FOREIGN KEY (`telefono`) REFERENCES `clientes` (`telefono`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentos_trabajadores`
--
ALTER TABLE `documentos_trabajadores`
  ADD CONSTRAINT `fk_t333` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_rut` FOREIGN KEY (`rut`) REFERENCES `proveedores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_trabajadores`
--
ALTER TABLE `horario_trabajadores`
  ADD CONSTRAINT `fk_t44343` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horas_extras_trabajadores`
--
ALTER TABLE `horas_extras_trabajadores`
  ADD CONSTRAINT `fk_t20` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `fk_v0` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `fk_afp` FOREIGN KEY (`afp`) REFERENCES `afp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_area` FOREIGN KEY (`area`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `fk_trabaj` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_v` FOREIGN KEY (`trabajador`) REFERENCES `trabajadores` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
