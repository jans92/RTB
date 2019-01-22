/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.36-MariaDB : Database - retoblog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`retoblog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `retoblog`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idCategoria` int(40) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`idCategoria`,`nombre`) values (1,'Javascript'),(2,'PHP'),(3,'JQuery'),(4,'Problemas');

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `idComentario` int(4) NOT NULL AUTO_INCREMENT,
  `idNoticia` int(4) NOT NULL,
  `idusuario` int(4) NOT NULL,
  `contenido` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nGusta` int(4) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idNoticia` (`idNoticia`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idNoticia`) REFERENCES `noticias` (`idNoticia`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `comentarios` */

insert  into `comentarios`(`idComentario`,`idNoticia`,`idusuario`,`contenido`,`nombre`,`nGusta`) values (9,27,11,'awdada','hola',0),(11,25,11,'awd','hola',0),(12,25,11,'aswaaaaaaaaaaaaaaaaa','hola',0),(14,27,11,'awdwd','hola',0),(15,27,11,'awdwd','hola',0),(16,27,11,'awdad','hola',0),(17,27,11,'tuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu','hola',0),(18,28,11,'awd','hola',0),(19,28,11,'awd','hola',0),(20,28,11,'','hola',0),(21,28,11,'asa','hola',0),(22,28,11,'asa','hola',0),(23,28,11,'aawd','hola',0),(24,28,11,'adwadsss','hola',0),(25,28,11,'awda','hola',0),(26,28,11,'awd','hola',0),(27,28,11,'wd','hola',0),(28,28,11,'wd','hola',0),(29,28,11,'awd','hola',0),(30,28,11,'adw','hola',0);

/*Table structure for table `noticias` */

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `idNoticia` int(4) NOT NULL AUTO_INCREMENT,
  `idusuario` int(4) NOT NULL,
  `idCategoria` int(4) NOT NULL,
  `titulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cabecera` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaModificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nComentarios` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idNoticia`),
  KEY `idCategoria` (`idCategoria`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `noticias` */

insert  into `noticias`(`idNoticia`,`idusuario`,`idCategoria`,`titulo`,`cabecera`,`contenido`,`fechaPublicacion`,`fechaModificacion`,`nComentarios`) values (25,11,1,'titulonkjkkaaa','FDSF','FEWDGRW','2018-11-01 15:20:46','2018-11-01 15:20:46',0),(27,11,4,'adw','awd','awda','2018-11-01 19:32:30','2018-11-01 19:32:30',0),(28,11,1,'adwwdaaa','awd','adwwda','2018-11-01 20:29:15','2018-11-01 20:29:15',0);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` bit(1) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email` (`email`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`nombre`,`apellidos`,`email`,`password1`,`tipo`) values (11,'janirea','perez heredero','ianireperez9@gmail.com','74792a598fc9c7cd1c3d026dae863a95dd42095c',''),(15,'hola','knkj','janire@gmail.com','74792a598fc9c7cd1c3d026dae863a95dd42095c','\0'),(17,'asa','asa','asa@amail.com','0cf9dcc10c374831b6bb5e6361ca9a7a248e90b2','\0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
