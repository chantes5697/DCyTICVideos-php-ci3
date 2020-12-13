
CREATE TABLE IF NOT EXISTS `formato` (
  `idformato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL ,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idformato`)
) ENGINE=InnoDB ;



CREATE TABLE IF NOT EXISTS `cassette` (
  `idcassette` int(11) NOT NULL AUTO_INCREMENT,
  `clave` text NOT NULL ,
  `estado` int(11) NOT NULL DEFAULT 1,
  `formato` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idcassette`),
  KEY `FK__formato` (`formato`),
  CONSTRAINT `FK__formato` FOREIGN KEY (`formato`) REFERENCES `formato` (`idformato`)
) ENGINE=InnoDB ;


CREATE TABLE IF NOT EXISTS `video` (
  `idvideo` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL ,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `duracion` time NOT NULL ,
  `cassette` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idvideo`),
  KEY `FK__cassette` (`cassette`),
  CONSTRAINT `FK__cassette` FOREIGN KEY (`cassette`) REFERENCES `cassette` (`idcassette`)
) ENGINE=InnoDB ;


CREATE TABLE IF NOT EXISTS `filtro` (
  `idfiltro` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL ,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `tiempo` time NOT NULL ,
  `video` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idfiltro`),
  KEY `FK__video` (`video`),
  CONSTRAINT `FK__video` FOREIGN KEY (`video`) REFERENCES `video` (`idvideo`)
) ENGINE=InnoDB ;


CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL ,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB ;

-- Dumping data for table videossgv.rol: ~1 rows (approximately)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT IGNORE INTO `rol` (`idrol`, `nombre`) VALUES
	(1, 'admin');

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusr` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL ,
  `password` varchar(50) NOT NULL ,
  `estado` int(11) NOT NULL DEFAULT 1,
  `rol` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idusr`),
  KEY `FK__rol` (`rol`),
  CONSTRAINT `FK__rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB ;