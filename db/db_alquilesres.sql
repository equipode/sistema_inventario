-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.15-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_alquileres
CREATE DATABASE IF NOT EXISTS `db_alquileres` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_alquileres`;

-- Volcando estructura para tabla db_alquileres.alquileres
CREATE TABLE IF NOT EXISTS `alquileres` (
  `cod` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fecha` time DEFAULT NULL,
  `hora` double DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `fechadevolucion` date DEFAULT NULL,
  `interes` float DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_alquileres.alquileres: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alquileres` DISABLE KEYS */;
/*!40000 ALTER TABLE `alquileres` ENABLE KEYS */;

-- Volcando estructura para tabla db_alquileres.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` bigint(15) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `usuaio` varchar(45) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_alquileres.clientes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `direccion`, `usuaio`, `pass`, `foto`) VALUES
	(1, 'JAime Guette', 4102525, 'Carrera 30', 'wd ', '32132', 'imgs/user1.jpg'),
	(2, 'Pedro Perez', 3016325322, 'Calle 1a', 'erte', '6546', 'imgs/user2.jpg'),
	(3, 'smith', 465321, 'Calle 80', 'sm', '879', 'imgs/user3.jpg');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla db_alquileres.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(15) NOT NULL DEFAULT '0',
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valorcomercial` double DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `foto` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_id_cliente_idx` (`id_cliente`),
  CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_alquileres.productos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`cod`, `referencia`, `nombre`, `descripcion`, `cantidad`, `valorcomercial`, `id_cliente`, `foto`) VALUES
	(14, 'T85', 'teclados', NULL, 5, 5000, 2, 'imgs/productos/prod3.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla db_alquileres.productos_aparece_alquileres
CREATE TABLE IF NOT EXISTS `productos_aparece_alquileres` (
  `codp` int(11) NOT NULL,
  `coda` int(11) NOT NULL,
  PRIMARY KEY (`codp`,`coda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_alquileres.productos_aparece_alquileres: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_aparece_alquileres` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_aparece_alquileres` ENABLE KEYS */;

-- Volcando estructura para tabla db_alquileres.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_alquileres.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
