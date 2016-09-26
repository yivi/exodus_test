SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `pruebaxxx_alojamiento`;
CREATE TABLE `pruebaxxx_alojamiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`),
  KEY `tipo_id` (`tipo_id`),
  CONSTRAINT `pruebaxxx_alojamiento_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `pruebaxxx_alojamiento_tipo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pruebaxxx_alojamiento` (`id`, `nombre`, `ubicacion`, `tipo_id`) VALUES
  (1,	'Azul',	'Valencia, Valencia',	1),
  (2,	'Verde',	'Almería, Almería',	1),
  (3,	'Amarillo',	'Madrid, Madrid',	1),
  (4,	'Morado',	'Oviedo, Asturias',	1),
  (5,	'Violeta 雅芙',	'Logroño, La Rioja',	1),
  (6,	'Veracruz',	'Barcelona, Barcelona',	1),
  (7,	'Verde',	'Murcia, Murcia',	2),
  (8,	'Ärgern',	'Toledo, Castilla-La Mancha',	2),
  (9,	'雅芙雅芙 Miralejos',	'A Coruña, Galicia',	2),
  (10,	'Amarcord',	'Bilbao, Vizcaya',	2);

DROP TABLE IF EXISTS `pruebaxxx_alojamiento_meta`;
CREATE TABLE `pruebaxxx_alojamiento_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alojamiento_id` int(10) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_alojamiento_id` (`nombre`,`alojamiento_id`),
  KEY `alojamiento_id` (`alojamiento_id`),
  KEY `nombre_valor` (`nombre`,`valor`),
  CONSTRAINT `pruebaxxx_alojamiento_meta_ibfk_1` FOREIGN KEY (`alojamiento_id`) REFERENCES `pruebaxxx_alojamiento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pruebaxxx_alojamiento_meta` (`id`, `alojamiento_id`, `nombre`, `valor`) VALUES
  (1,	1,	'estrellas',	'3'),
  (2,	1,	'tipo_habitacion',	'habitación doble con vistas'),
  (3,	2,	'estrellas',	'5'),
  (4,	2,	'tipo_habitacion',	'suite con terraza'),
  (5,	3,	'estrellas',	'2'),
  (6,	3,	'tipo_habitacion',	'habitación doble económica'),
  (7,	4,	'estrellas',	'4'),
  (8,	4,	'tipo_habitacion',	'habitación doble con vistas'),
  (9,	5,	'estrellas',	'2'),
  (10,	5,	'tipo_habitacion',	'habitación sencilla'),
  (11,	6,	'estrellas',	'5'),
  (12,	6,	'tipo_habitacion',	'habitación doble estándar'),
  (13,	7,	'apartamentos',	'10'),
  (14,	7,	'capacidad',	'6 adultos'),
  (15,	8,	'apartamentos',	'4'),
  (16,	8,	'capacidad',	'12 adultos'),
  (17,	9,	'apartamentos',	'5'),
  (18,	9,	'capacidad',	'8 adultos'),
  (19,	10,	'apartamentos',	'8'),
  (20,	10,	'capacidad',	'10 adultos');

DROP TABLE IF EXISTS `pruebaxxx_alojamiento_tipo`;
CREATE TABLE `pruebaxxx_alojamiento_tipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pruebaxxx_alojamiento_tipo` (`id`, `nombre`) VALUES
  (1,	'hotel'),
  (2,	'apartamento');

-- 2016-09-24 20:04:40
