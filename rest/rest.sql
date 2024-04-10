DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `enlace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `colaboradores`;
CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `info` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link_fb` varchar(100) NOT NULL,
  `link_insta` varchar(100) NOT NULL,
  `link_linkedin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL,
  `plato` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `precio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `resena`;
CREATE TABLE `resena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opinion` varchar(255) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
);


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);