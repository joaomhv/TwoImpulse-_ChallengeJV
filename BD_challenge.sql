-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table challenge_twoimpulse.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `empolyeeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `adress` text,
  `statusId` int(11) DEFAULT NULL,
  `positionId` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`empolyeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=latin1;

-- Dumping data for table challenge_twoimpulse.employee: ~5 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`empolyeeId`, `name`, `birthdate`, `adress`, `statusId`, `positionId`, `created`, `updated`) VALUES
	(304, 'Wilson Edgar', '1990-03-28 00:00:00', 'Rua Serpa Pinto, Évora', 1, 2, '2020-07-06 17:26:19', '2020-07-06 17:26:19'),
	(305, 'Paulo Nunes ', '1987-02-19 00:00:00', ' Briennerstraße, Munique', 2, 1, '2020-07-06 17:36:34', '2020-07-06 17:36:34'),
	(306, 'Tânia Passinhas', '1994-08-22 00:00:00', 'R. de Soeiro Mendes, Évora', 1, 8, '2020-07-06 17:38:31', '2020-07-06 17:38:31'),
	(307, 'Gabriela Oliveira', '1989-12-20 00:00:00', 'Av. Duque de Ávilla, Lisboa', 2, 5, '2020-07-06 17:41:07', '2020-07-06 17:41:07'),
	(308, 'Pedro Vaz', '1995-05-25 00:00:00', 'R. Egas Moniz, Évora', 1, 3, '2020-07-06 17:42:18', '2020-07-06 17:42:18');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table challenge_twoimpulse.position
CREATE TABLE IF NOT EXISTS `position` (
  `positionId` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`positionId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table challenge_twoimpulse.position: ~8 rows (approximately)
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`positionId`, `description`) VALUES
	(1, 'CEO'),
	(2, 'CTO'),
	(3, 'Developer'),
	(4, 'Software Developer'),
	(5, 'Project Manager'),
	(6, 'Data Scientist'),
	(7, 'AI Developer'),
	(8, 'Executive Assistant');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;

-- Dumping structure for table challenge_twoimpulse.status
CREATE TABLE IF NOT EXISTS `status` (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table challenge_twoimpulse.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`statusId`, `description`) VALUES
	(1, 'Remote'),
	(2, 'Quarters');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
