-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para laliga
CREATE DATABASE IF NOT EXISTS `laliga` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `laliga`;

-- Volcando estructura para tabla laliga.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `puntos` int(11) NOT NULL,
  `p_jugados` int(11) NOT NULL,
  `g_favor` int(11) NOT NULL,
  `g_contra` int(11) NOT NULL,
  `diferencia` int(11) NOT NULL,
  `estadio` varchar(100) NOT NULL,
  `presupuesto` decimal(10,0) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla laliga.equipos: ~20 rows (aproximadamente)
INSERT INTO `equipos` (`id`, `nombre`, `puntos`, `p_jugados`, `g_favor`, `g_contra`, `diferencia`, `estadio`, `presupuesto`, `img`) VALUES
	(1, 'REAL BETIS', 26, 13, 42, 29, 0, 'BENITO VILLAMARIN', 109, 'https://assets.laliga.com/assets/2022/09/15/small/e4a09419d3bd115b8f3dab73d480e146.png'),
	(3, 'VALENCIA', 15, 12, 25, 34, 0, 'MESTALLA', 11, 'https://assets.laliga.com/assets/2019/06/07/small/valencia.png'),
	(4, 'REAL MADIRD', 1, 1, 0, 0, 0, 'SANTIAGO BERNABÉU', 62, 'https://assets.laliga.com/assets/2019/06/07/small/real-madrid.png'),
	(5, 'GIRONA', 0, 2, 4, 8, 0, 'MONTILIVI', 9, 'https://assets.laliga.com/assets/2022/06/22/small/8f43addbb29e4a72f5e90b6edfe4728f.png'),
	(6, 'BARCELONA', 1, 1, 0, 0, 0, 'CAMP NOU', 50, 'https://assets.laliga.com/assets/2019/06/07/small/barcelona.png'),
	(7, 'ATLÉTICO DE MADRID', 0, 0, 0, 0, 0, 'CIVITAS METROPOLITANO', 56, 'https://assets.laliga.com/assets/2019/06/07/small/atletico.png'),
	(8, 'ATHLETIC CLUB', 3, 1, 3, 2, 0, 'SAN MAMÉS', 45, 'https://assets.laliga.com/assets/2019/06/07/small/athletic.png'),
	(9, 'REAL SOCIEDAD', 0, 0, 0, 0, 0, 'REALE ARENA', 45, 'https://assets.laliga.com/assets/2019/06/07/small/real-sociedad.png'),
	(10, 'VILLARREAL', 0, 1, 2, 3, 0, 'LA CERAMICA', 40, 'https://assets.laliga.com/assets/2019/06/07/small/villarreal.png'),
	(11, 'GETAFE', 0, 0, 0, 0, 0, 'COLISEUM ', 20, 'https://assets.laliga.com/assets/2023/05/12/small/dc59645c96bc2c9010341c16dd6d4bfa.png'),
	(12, 'ALAVÉS', 0, 0, 0, 0, 0, 'MENDIZORROZA', 15, 'https://assets.laliga.com/assets/2020/09/01/small/27002754a98bf535807fe49a24cc63ea.png'),
	(13, 'SEVILLA', 0, 0, 0, 0, 0, 'SANCHEZ-PIZJUÁN', 45, 'https://assets.laliga.com/assets/2019/06/07/small/sevilla.png'),
	(14, 'OSASUNA', 3, 1, 3, 2, 0, 'EL SADAR', 25, 'https://assets.laliga.com/assets/2019/06/07/small/osasuna.png'),
	(15, 'LAS PALMAS', 0, 0, 0, 0, 0, 'GRAN CANARIA', 15, 'https://assets.laliga.com/assets/2019/06/07/small/las-palmas.png'),
	(16, 'CELTA ', 0, 0, 0, 0, 0, 'BALAÍDOS', 15, 'https://assets.laliga.com/assets/2019/06/07/small/celta.png'),
	(17, 'RAYO VALLECANO', 0, 0, 0, 0, 0, 'VALLECAS', 15, 'https://assets.laliga.com/assets/2023/04/27/small/57d9950a8745ead226c04d37235c0786.png'),
	(18, 'MALLORCA', 0, 1, 0, 7, 0, 'SON MOIX', 15, 'https://assets.laliga.com/assets/2023/03/22/small/013ae97735bc8e519dcf30f6826168ca.png'),
	(19, 'CÁDIZ', 0, 1, 2, 3, 0, 'NUEVO MIRANDILLA', 15, 'https://assets.laliga.com/assets/2019/06/07/small/cadiz.png'),
	(20, 'GRANADA', 1, 1, 0, 0, 0, 'LOS CÁRMENES', 10, 'https://assets.laliga.com/assets/2023/01/17/small/f5db12f3a29fdfd14a0d50337016dc95.png'),
	(21, 'ALMERÍA', 3, 1, 7, 0, 0, 'POWER HORSE', 10, 'https://assets.laliga.com/assets/2019/06/07/small/almeria.png');

-- Volcando estructura para tabla laliga.jugadores
CREATE TABLE IF NOT EXISTS `jugadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla laliga.jugadores: ~11 rows (aproximadamente)
INSERT INTO `jugadores` (`id`, `nombre`, `id_equipo`, `valor`, `img`) VALUES
	(1, 'ISCO', 1, 20, 'https://assets.laliga.com/squad/2023/t185/p80209/256x278/p80209_t185_2023_1_001_000.png'),
	(2, 'RUI SILVA', 1, 3, 'https://assets.laliga.com/squad/2023/t185/p124097/512x512/p124097_t185_2023_1_003_000.png'),
	(3, 'SABALY', 1, 3, 'https://assets.laliga.com/squad/2023/t185/p164474/512x512/p164474_t185_2023_1_003_000.png'),
	(4, 'PEZZELLA', 1, 5, 'https://assets.laliga.com/squad/2023/t185/p121220/512x512/p121220_t185_2023_1_003_000.png'),
	(5, 'CHADI RIAD', 1, 6, 'https://assets.laliga.com/squad/2023/t185/p515621/512x512/p515621_t185_2023_1_003_000.png'),
	(6, 'MIRANDA', 7, 8, 'https://assets.laliga.com/squad/2023/t185/p433530/512x512/p433530_t185_2023_1_003_000.png'),
	(7, 'GUIDO ', 1, 24, 'https://assets.laliga.com/squad/2023/t185/p197024/512x512/p197024_t185_2023_1_003_000.png'),
	(8, 'JHONNY CARDOSO', 1, 10, 'https://assets.laliga.com/squad/2023/t185/p488662/512x512/p488662_t185_2023_1_003_000.png'),
	(9, 'AYOZE PEREZ', 1, 7, 'https://assets.laliga.com/squad/2023/t185/p168580/512x512/p168580_t185_2023_1_003_000.png'),
	(10, 'WILLIAM JOSÉ', 3, 6, 'https://assets.laliga.com/squad/2023/t185/p73314/512x512/p73314_t185_2023_1_003_000.png'),
	(11, 'NABIL FEKIR', 1, 12, 'https://assets.laliga.com/squad/2023/t185/p166552/512x512/p166552_t185_2023_1_003_000.png');

-- Volcando estructura para tabla laliga.traspasos
CREATE TABLE IF NOT EXISTS `traspasos` (
  `nombre` varchar(50) NOT NULL,
  `e_nuevo` varchar(50) NOT NULL,
  `e_viejo` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla laliga.traspasos: ~2 rows (aproximadamente)
INSERT INTO `traspasos` (`nombre`, `e_nuevo`, `e_viejo`, `valor`) VALUES
	('NABIL FEKIR', 'REAL MADIRD', 'REAL BETIS', 12),
	('WILLIAM JOSÉ', 'VALENCIA', 'REAL BETIS', 6),
	('MIRANDA', 'ATLÉTICO DE MADRID', 'REAL BETIS', 8);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
