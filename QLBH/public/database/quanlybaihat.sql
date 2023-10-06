-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.1.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for quanlybaihat
CREATE DATABASE IF NOT EXISTS `quanlybaihat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `quanlybaihat`;

-- Dumping structure for table quanlybaihat.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table quanlybaihat.category: ~11 rows (approximately)
INSERT INTO `category` (`id`, `nameCategory`) VALUES
	(1, 'Nhạc trẻ'),
	(2, 'Nhạc trữ tình'),
	(3, 'Nhạc châu âu'),
	(4, 'Nhạc chế'),
	(5, 'Nhạc cách mạng'),
	(6, 'Nhạc ballad'),
	(7, 'Nhạc mashup'),
	(8, 'Nhạc thiếu nhi'),
	(9, 'Nhạc yoga 1'),
	(10, 'Nhạc lofi'),
	(11, 'Nhạc Remix');

-- Dumping structure for table quanlybaihat.song
CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameSong` varchar(255) DEFAULT NULL,
  `singer` varchar(255) DEFAULT NULL,
  `idCategory` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `song_ibfk_1` (`idCategory`),
  CONSTRAINT `song_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table quanlybaihat.song: ~11 rows (approximately)
INSERT INTO `song` (`id`, `nameSong`, `singer`, `idCategory`) VALUES
	(1, 'Em của ngày hôm qua', 'dpilgram0', 1),
	(2, 'Gấp đôi yêu thương', 'abuckleigh1', 2),
	(3, 'Mẹ yêu', 'ngaynsford2', 3),
	(4, 'Cha già', 'ktuhy3', 1),
	(5, 'Quê hương', 'ncharles4', 2),
	(6, 'Có công mài sắt', 'rgymblett5', 4),
	(7, 'Chiếc đèn ông sao', 'oneed6', 6),
	(8, 'Ngỡ', 'mbroomfield7', 6),
	(9, 'Anh yêu em', 'enewbigging8', 9),
	(10, 'Beat đâu', 'KRight', 8),
	(11, 'Yassuo', 'Braum', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
