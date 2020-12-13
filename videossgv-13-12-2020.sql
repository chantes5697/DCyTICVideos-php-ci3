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
CREATE DATABASE IF NOT EXISTS `videossgv` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `videossgv`;

-- Dumping structure for table videossgv.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL DEFAULT '0',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.rol: ~0 rows (approximately)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT IGNORE INTO `rol` (`idrol`, `nombre`) VALUES
	(1, 'admin');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Dumping structure for table videossgv.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusr` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT 1,
  `rol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusr`),
  KEY `FK__rol` (`rol`),
  CONSTRAINT `FK__rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.usuario: ~7 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`idusr`, `username`, `password`, `estado`, `rol`) VALUES
	(1, 'admin', '$2a$10$kBkOeXR1gcwgRn/lAmoKaOMITbKm0l83G3lOp6jrx7QJySzlRvIqG', 1, 1),
	(2, 'admin2', '$2a$10$YJgzNRG8vx1ixyb1ycG9tuJdyn0eC.udKRxbn7V9lCUwHCEgSfYwG', 1, 1),
	(3, 'chantes5697', '$2a$08$FsGxANBY2rfuxpPFOM9kgeOSloF4GqupXDyzBfcfcubtRUG/gOqui', 1, 1),
	(4, 'snakecake5697', '$2a$08$sw0s.Q9g3IS47FuohBKMouicZrCGBsDQ9OL6xxMHPNjLTVxwdW29u', 1, 1),
	(5, 'chantes235', '$2a$08$qjJFsB5LgCdRZMY81WahiOiI9zDEImt6VZocj.QzXtnLxs92PcS2m', 1, 1),
	(6, 'admin123456', '$2a$08$ItAyc9Rkx22h3VzxtVOf5eDr6BOFiCfJqbSyoK9BpV6DJ5XI9nfSm', 0, 1),
	(7, 'useradmin123456', '$2a$08$Mdm44ees/gAgONgdcpZXoO4PL3N2zkhgh9t0btZaD9MPku2glY6Q6', 1, 1),
	(8, 'mimikyu_dayo', '$2a$08$4UnyCM9/CP93ZAdBfKafee0B2PztVkFPmNyaS7DaVXfR6Oz2b3qGK', 1, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Dumping structure for table videossgv.formato
CREATE TABLE IF NOT EXISTS `formato` (
  `idformato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idformato`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.formato: ~0 rows (approximately)
/*!40000 ALTER TABLE `formato` DISABLE KEYS */;
INSERT IGNORE INTO `formato` (`idformato`, `nombre`, `estado`) VALUES
	(1, 'DVD', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.cassette: ~0 rows (approximately)
/*!40000 ALTER TABLE `cassette` DISABLE KEYS */;
INSERT IGNORE INTO `cassette` (`idcassette`, `clave`, `estado`, `formato`) VALUES
	(1, 'DVDBUAP01', 1, 1);
/*!40000 ALTER TABLE `cassette` ENABLE KEYS */;







-- Dumping structure for table videossgv.video
CREATE TABLE IF NOT EXISTS `video` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT curdate(),
  `duracion` time NOT NULL DEFAULT curtime(),
  `cassette` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idvideo`),
  KEY `FK__cassette` (`cassette`),
  CONSTRAINT `FK__cassette` FOREIGN KEY (`cassette`) REFERENCES `cassette` (`idcassette`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.video: ~0 rows (approximately)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT IGNORE INTO `video` (`idvideo`, `contenido`, `fecha`, `duracion`, `cassette`, `estado`) VALUES
	(1, 'curso ionic CONACIC ', '2020-11-10', '03:00:00', 1, 1);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;

-- Dumping structure for table videossgv.filtro
CREATE TABLE IF NOT EXISTS `filtro` (
  `idfiltro` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT curdate(),
  `tiempo` time NOT NULL DEFAULT curtime(),
  `video` int(11) NOT NULL DEFAULT 0,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idfiltro`),
  KEY `FK__video` (`video`),
  CONSTRAINT `FK__video` FOREIGN KEY (`video`) REFERENCES `video` (`idvideo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table videossgv.filtro: ~0 rows (approximately)
/*!40000 ALTER TABLE `filtro` DISABLE KEYS */;
INSERT IGNORE INTO `filtro` (`idfiltro`, `contenido`, `fecha`, `tiempo`, `video`, `estado`) VALUES
	(1, 'Introduccion', '2020-11-10', '00:05:00', 1, 1);
/*!40000 ALTER TABLE `filtro` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
