-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 28-02-2024 a las 09:17:13
-- Versión del servidor: 10.4.14-MariaDB-log
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desis-answers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidacy`
--

CREATE TABLE `candidacy` (
  `id_candidacy` int(11) NOT NULL,
  `name_candidacy` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `candidacy`
--

INSERT INTO `candidacy` (`id_candidacy`, `name_candidacy`) VALUES
(1, 'Gabriel Boric'),
(2, 'José Antonio Kast'),
(3, 'Franco Parisi'),
(4, 'Eduardo Artés'),
(5, 'Marco Enríquez-Ominami'),
(6, 'Yasna Provoste'),
(7, 'Sebastián Sichel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commune`
--

CREATE TABLE `commune` (
  `id_commune` int(11) NOT NULL,
  `name_commune` varchar(200) NOT NULL,
  `fk_id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `commune`
--

INSERT INTO `commune` (`id_commune`, `name_commune`, `fk_id_region`) VALUES
(1, 'Arica', 1),
(2, 'Camarones', 1),
(3, 'Iquique', 2),
(4, 'Alto Hospicio', 2),
(5, 'Pozo Almonte', 2),
(6, 'Antofagasta', 3),
(7, 'Mejillones', 3),
(8, 'Sierra Gorda', 3),
(9, 'Taltal', 3),
(10, 'Calama', 3),
(11, 'Ollagüe', 3),
(12, 'San Pedro de Atacama', 3),
(13, 'Copiapó', 4),
(14, 'Caldera', 4),
(15, 'Tierra Amarilla', 4),
(16, 'Chañaral', 4),
(17, 'Diego de Almagro', 4),
(18, 'La Serena', 5),
(19, 'Coquimbo', 5),
(20, 'Andacollo', 5),
(21, 'La Higuera', 5),
(22, 'Paiguano', 5),
(23, 'Vicuña', 5),
(24, 'Valparaíso', 6),
(25, 'Viña del Mar', 6),
(26, 'Concón', 6),
(27, 'Quilpué', 6),
(28, 'Villa Alemana', 6),
(29, 'Quintero', 6),
(30, 'Puchuncaví', 6),
(31, 'Santiago', 7),
(32, 'Cerrillos', 7),
(33, 'Cerro Navia', 7),
(34, 'Conchalí', 7),
(35, 'El Bosque', 7),
(36, 'Estación Central', 7),
(37, 'Huechuraba', 7),
(38, 'Independencia', 7),
(39, 'La Cisterna', 7),
(40, 'La Florida', 7),
(41, 'La Granja', 7),
(42, 'La Pintana', 7),
(43, 'La Reina', 7),
(44, 'Las Condes', 7),
(45, 'Lo Barnechea', 7),
(46, 'Lo Espejo', 7),
(47, 'Lo Prado', 7),
(48, 'Macul', 7),
(49, 'Maipú', 7),
(50, 'Ñuñoa', 7),
(51, 'Padre Hurtado', 7),
(52, 'Pedro Aguirre Cerda', 7),
(53, 'Peñalolén', 7),
(54, 'Pirque', 7),
(55, 'Providencia', 7),
(56, 'Pudahuel', 7),
(57, 'Puente Alto', 7),
(58, 'Quilicura', 7),
(59, 'Quinta Normal', 7),
(60, 'Recoleta', 7),
(61, 'Renca', 7),
(62, 'San Bernardo', 7),
(63, 'San Joaquín', 7),
(64, 'San José de Maipo', 7),
(65, 'San Miguel', 7),
(66, 'San Pedro', 7),
(67, 'San Ramón', 7),
(68, 'Vitacura', 7),
(69, 'Rancagua', 8),
(70, 'Codegua', 8),
(71, 'Coinco', 8),
(72, 'Coltauco', 8),
(73, 'Doñihue', 8),
(74, 'Graneros', 8),
(75, 'Las Cabras', 8),
(76, 'Machalí', 8),
(77, 'Malloa', 8),
(78, 'Mostazal', 8),
(79, 'Olivar', 8),
(80, 'Peumo', 8),
(81, 'Pichidegua', 8),
(82, 'Quinta de Tilcoco', 8),
(83, 'Rengo', 8),
(84, 'Requínoa', 8),
(85, 'San Vicente', 8),
(86, 'Talca', 9),
(87, 'Constitución', 9),
(88, 'Curepto', 9),
(89, 'Empedrado', 9),
(90, 'Maule', 9),
(91, 'Pelarco', 9),
(92, 'Pencahue', 9),
(93, 'Río Claro', 9),
(94, 'San Clemente', 9),
(95, 'San Rafael', 9),
(96, 'Chillán', 10),
(97, 'Bulnes', 10),
(98, 'Cobquecura', 10),
(99, 'Coelemu', 10),
(100, 'Coihueco', 10),
(101, 'Chillán Viejo', 10),
(102, 'El Carmen', 10),
(103, 'Ninhue', 10),
(104, 'Ñiquén', 10),
(105, 'Pemuco', 10),
(106, 'Pinto', 10),
(107, 'Portezuelo', 10),
(108, 'Quillón', 10),
(109, 'Quirihue', 10),
(110, 'Ránquil', 10),
(111, 'San Carlos', 10),
(112, 'San Fabián', 10),
(113, 'San Ignacio', 10),
(114, 'San Nicolás', 10),
(115, 'Concepción', 11),
(116, 'Coronel', 11),
(117, 'Chiguayante', 11),
(118, 'Florida', 11),
(119, 'Hualqui', 11),
(120, 'Lota', 11),
(121, 'Penco', 11),
(122, 'San Pedro de la Paz', 11),
(123, 'Santa Juana', 11),
(124, 'Talcahuano', 11),
(125, 'Tomé', 11),
(126, 'Temuco', 12),
(127, 'Carahue', 12),
(128, 'Cunco', 12),
(129, 'Curarrehue', 12),
(130, 'Freire', 12),
(131, 'Galvarino', 12),
(132, 'Gorbea', 12),
(133, 'Lautaro', 12),
(134, 'Loncoche', 12),
(135, 'Melipeuco', 12),
(136, 'Nueva Imperial', 12),
(137, 'Padre las Casas', 12),
(138, 'Perquenco', 12),
(139, 'Pitrufquén', 12),
(140, 'Pucón', 12),
(141, 'Saavedra', 12),
(142, 'Teodoro Schmidt', 12),
(143, 'Toltén', 12),
(144, 'Vilcún', 12),
(145, 'Villarrica', 12),
(146, 'Cholchol', 12),
(147, 'Valdivia', 13),
(148, 'Corral', 13),
(149, 'Lanco', 13),
(150, 'Los Lagos', 13),
(151, 'Máfil', 13),
(152, 'Mariquina', 13),
(153, 'Paillaco', 13),
(154, 'Panguipulli', 13),
(155, 'La Unión', 14),
(156, 'Futrono', 14),
(157, 'Lago Ranco', 14),
(158, 'Río Bueno', 14),
(159, 'Puerto Montt', 15),
(160, 'Calbuco', 15),
(161, 'Cochamó', 15),
(162, 'Fresia', 15),
(163, 'Frutillar', 15),
(164, 'Los Muermos', 15),
(165, 'Llanquihue', 15),
(166, 'Maullín', 15),
(167, 'Puerto Varas', 15),
(168, 'Coyhaique', 16),
(169, 'Lago Verde', 16),
(170, 'Aysén', 16),
(171, 'Cisnes', 16),
(172, 'Guaitecas', 16),
(173, 'Cochrane', 16),
(174, 'O\'Higgins', 16),
(175, 'Tortel', 16),
(176, 'Chile Chico', 16),
(177, 'Río Ibáñez', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `name_region` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `name_region`) VALUES
(1, 'Arica y Parinacota'),
(2, 'Tarapacá'),
(3, 'Antofagasta'),
(4, 'Atacama'),
(5, 'Coquimbo'),
(6, 'Valparaíso'),
(7, 'Metropolitana de Santiago'),
(8, 'Libertador General Bernardo O\'Higgins'),
(9, 'Maule'),
(10, 'Ñuble'),
(11, 'Biobío'),
(12, 'La Araucanía'),
(13, 'Los Ríos'),
(14, 'Los Lagos'),
(15, 'Aysén del General Carlos Ibáñez del Campo'),
(16, 'Magallanes y de la Antártica Chilena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votes`
--

CREATE TABLE `votes` (
  `id_vote` int(11) NOT NULL,
  `name_surname` varchar(200) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `rut` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fk_id_commune` int(11) NOT NULL,
  `fk_id_candidate` int(11) NOT NULL,
  `how_met` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidacy`
--
ALTER TABLE `candidacy`
  ADD PRIMARY KEY (`id_candidacy`);

--
-- Indices de la tabla `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id_commune`),
  ADD KEY `region_fk_relation` (`fk_id_region`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indices de la tabla `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `vote_fk1_commune` (`fk_id_commune`),
  ADD KEY `vote_fk1_candidacy` (`fk_id_candidate`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidacy`
--
ALTER TABLE `candidacy`
  MODIFY `id_candidacy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `commune`
--
ALTER TABLE `commune`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `votes`
--
ALTER TABLE `votes`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `region_fk_relation` FOREIGN KEY (`fk_id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `vote_fk1_candidacy` FOREIGN KEY (`fk_id_candidate`) REFERENCES `candidacy` (`id_candidacy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_fk1_commune` FOREIGN KEY (`fk_id_commune`) REFERENCES `commune` (`id_commune`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
