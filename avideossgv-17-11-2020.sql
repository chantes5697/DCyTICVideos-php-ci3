-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for videossgv


CREATE TABLE IF NOT EXISTS `formato` (
  `idformato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idformato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.formato: ~0 rows (approximately)
/*!40000 ALTER TABLE `formato` DISABLE KEYS */;
/*!40000 ALTER TABLE `formato` ENABLE KEYS */;

-- Dumping structure for table videossgv.cassette
CREATE TABLE IF NOT EXISTS `cassette` (
  `idcassette` int(11) NOT NULL AUTO_INCREMENT,
  `clave` text NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT 1,
  `formato` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcassette`),
  KEY `FK__formato` (`formato`),
  CONSTRAINT `FK__formato` FOREIGN KEY (`formato`) REFERENCES `formato` (`idformato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.cassette: ~0 rows (approximately)
/*!40000 ALTER TABLE `cassette` DISABLE KEYS */;
/*!40000 ALTER TABLE `cassette` ENABLE KEYS */;

-- Dumping structure for table videossgv.video
CREATE TABLE IF NOT EXISTS `video` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL DEFAULT '',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `duracion` time NOT NULL DEFAULT curtime(),
  `cassette` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idvideo`),
  KEY `FK__cassette` (`cassette`),
  CONSTRAINT `FK__cassette` FOREIGN KEY (`cassette`) REFERENCES `cassette` (`idcassette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.video: ~0 rows (approximately)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

-- Dumping structure for table videossgv.filtro
CREATE TABLE IF NOT EXISTS `filtro` (
  `idfiltro` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `tiempo` time NOT NULL DEFAULT curtime(),
  `video` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idfiltro`),
  KEY `FK__video` (`video`),
  CONSTRAINT `FK__video` FOREIGN KEY (`video`) REFERENCES `video` (`idvideo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.filtro: ~0 rows (approximately)
/*!40000 ALTER TABLE `filtro` DISABLE KEYS */;
/*!40000 ALTER TABLE `filtro` ENABLE KEYS */;

-- Dumping structure for table videossgv.formato


-- Dumping structure for table videossgv.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL DEFAULT '0',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.rol: ~1 rows (approximately)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT IGNORE INTO `rol` (`idrol`, `nombre`) VALUES
	(1, 'admin');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Dumping structure for table videossgv.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusr` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT 1,
  `rol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusr`),
  KEY `FK__rol` (`rol`),
  CONSTRAINT `FK__rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.usuario: ~0 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;



/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
