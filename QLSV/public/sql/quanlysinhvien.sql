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


-- Dumping database structure for quanlysinhvien
CREATE DATABASE IF NOT EXISTS `quanlysinhvien` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `quanlysinhvien`;

-- Dumping structure for table quanlysinhvien.class1
CREATE TABLE IF NOT EXISTS `class1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameClass1` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table quanlysinhvien.class1: ~15 rows (approximately)
INSERT INTO `class1` (`id`, `nameClass1`) VALUES
	(1, '63HTTT1'),
	(3, '63CNTT1'),
	(4, '63CNTT2'),
	(5, '63CNTT3'),
	(6, '63CNTT4'),
	(7, '63CNTT5'),
	(8, '63TTNT1'),
	(9, '63TTNT2'),
	(10, '63KTPM1'),
	(11, '63KTPM2'),
	(12, '64ANM1'),
	(13, '64ANM2'),
	(14, '65KT'),
	(15, '65KTO'),
	(16, '63NNA1');

-- Dumping structure for table quanlysinhvien.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameStudent` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `idClass1` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_ibfk_1` (`idClass1`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`idClass1`) REFERENCES `class1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table quanlysinhvien.student: ~42 rows (approximately)
INSERT INTO `student` (`id`, `nameStudent`, `email`, `dateOfBirth`, `idClass1`) VALUES
	(3, 'scaulket2', 'kburthom2@google.com.br', '2023-06-30', 3),
	(4, 'lmanklow3', 'gjulian3@networkadvertising.org', '2023-04-08', 4),
	(5, 'vblum4', 'sbattrum4@ow.ly', '2023-02-25', 5),
	(7, 'tosbourn6', 'kmartinuzzi6@photobucket.com', '2023-02-12', 7),
	(8, 'dansill7', 'sbroggetti7@unesco.org', '2022-12-07', 8),
	(9, 'lbudgeon8', 'fmcarthur8@desdev.cn', '2023-03-27', 9),
	(10, 'knaptine9', 'mdominka9@vkontakte.ru', '2023-05-05', 10),
	(11, 'rdavissona', 'tpannamana@livejournal.com', '2023-07-09', 11),
	(12, 'mrickettsb', 'aemenyb@examiner.com', '2023-07-30', 12),
	(13, 'dmandalc', 'cbrockleyc@over-blog.com', '2023-05-21', 13),
	(14, 'sharbord', 'wballisterd@tiny.cc', '2022-12-10', 14),
	(15, 'idelaceye', 'kproute@sakura.ne.jp', '2023-09-18', 15),
	(18, 'Stewart Rosenstein', 'srosenstein0@feedburner.com', '2023-04-25', 1),
	(24, 'Mannie Shoebottom', 'mshoebottom1@marriott.com', '2023-02-03', 3),
	(25, 'Charla Hatherell', 'chatherell2@baidu.com', '2022-12-03', 3),
	(26, 'Deidre Bristo', 'dbristo3@bloomberg.com', '2023-01-15', 4),
	(27, 'Grete Cocklie', 'gcocklie4@pagesperso-orange.fr', '2023-03-11', 5),
	(28, 'Simeon Jacobson', 'sjacobson5@soundcloud.com', '2022-12-19', 7),
	(29, 'Neile Pasek', 'npasek6@devhub.com', '2023-09-21', 7),
	(30, 'Emmye de Aguirre', 'ede7@elegantthemes.com', '2023-08-14', 8),
	(31, 'Torey Matyja', 'tmatyja8@usa.gov', '2023-01-10', 9),
	(32, 'Hildegarde MacGorley', 'hmacgorley9@boston.com', '2023-09-07', 10),
	(33, 'Glynda Cuss', 'gcussa@mediafire.com', '2023-03-06', 11),
	(34, 'Joshuah Leyninye', 'jleyninyeb@list-manage.com', '2023-02-21', 12),
	(35, 'Othilia Ilyunin', 'oilyuninc@cmu.edu', '2023-08-15', 13),
	(36, 'Dexter Braley', 'dbraleyd@cloudflare.com', '2023-04-16', 14),
	(37, 'Mychal Caplin', 'mcapline@mail.ru', '2023-02-22', 15),
	(38, 'Cullie Marchelli', 'cmarchellif@about.com', '2023-01-27', 15),
	(39, 'Zorine Marham', 'zmarhamg@fotki.com', '2022-11-16', 1),
	(40, 'Page Reddy', 'preddyh@ocn.ne.jp', '2022-10-28', 3),
	(41, 'Markus Huot', 'mhuoti@berkeley.edu', '2022-10-24', 3),
	(42, 'Danika Cousans', 'dcousansj@1688.com', '2023-05-24', 3),
	(43, 'Lyssa Mithun', 'lmithunk@umn.edu', '2023-05-13', 3),
	(44, 'Celinka Rickets', 'cricketsl@amazon.co.uk', '2022-11-11', 4),
	(45, 'Tildy Chaffin', 'tchaffinm@illinois.edu', '2023-02-02', 4),
	(46, 'Freddie Sibyllina', 'fsibyllinan@ameblo.jp', '2022-11-19', 5),
	(47, 'Elihu Staning', 'estaningo@creativecommons.org', '2022-10-29', 7),
	(48, 'Orlando Gideon', 'ogideonp@123-reg.co.uk', '2022-12-14', 8),
	(49, 'Orville Dalrymple', 'odalrympleq@alexa.com', '2023-02-17', 7),
	(50, 'Marilee Vannucci', 'mvannuccir@cyberchimps.com', '2023-02-21', 8),
	(51, 'Nelia McCaw', 'nmccaws@apache.org', '2022-10-21', 9),
	(52, 'Corbin La Vigne', 'clat@scribd.com', '2022-11-15', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
