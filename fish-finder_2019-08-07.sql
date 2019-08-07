# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.20.20 (MySQL 5.6.44)
# Database: fish-finder
# Generation Time: 2019-08-07 13:31:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table fish
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fish`;

CREATE TABLE `fish` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `species` varchar(255) NOT NULL DEFAULT '',
  `img-filepath` varchar(255) DEFAULT '',
  `length` int(11) unsigned NOT NULL,
  `aggression` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `color` varchar(255) NOT NULL DEFAULT '',
  `pattern` varchar(255) DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fish` WRITE;
/*!40000 ALTER TABLE `fish` DISABLE KEYS */;

INSERT INTO `fish` (`id`, `name`, `species`, `img-filepath`, `length`, `aggression`, `color`, `pattern`)
VALUES
	(1,'Grondel','Veiltail Goldfish','images/grondel.png',20,'1','Gold and White','Bi-coloured'),
	(2,'Timothy','Siamese Fighting Fish','images/timothy.png',10,'5','Red and Blue','Bi-coloured'),
	(3,'Arnold','Leopard Pleco','images/arnold.png',61,'2','Black and Yellow','Spotted'),
	(4,'Oscar','Oscar','images/oscar.png',30,'5','Black and Red','Speckled'),
	(5,'Susan','Asian Arowana','images/susan.png',90,'5','Orange','Bi-coloured'),
	(6,'Fishly','Dwarf Puffer Fish','images/fishly.png',2,'5','Yellow and Black','Spotted'),
	(7,'Wishly','Goshiki Koi','images/wishly.png',60,'2','Red and White','Patched'),
	(8,'Harold','Dwarf Gourami','images/harold.png',8,'3','Red and Blue','Speckled'),
	(9,'Lucifer','Axolotl','images/lucifer.png',21,'2','White','Albino');

/*!40000 ALTER TABLE `fish` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
