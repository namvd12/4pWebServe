-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.37 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table 4p_db.tula_table1
CREATE TABLE IF NOT EXISTS `tula_table1` (
  `tula_Key` int unsigned NOT NULL AUTO_INCREMENT,
  `tula1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula3` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula4` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula5` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula6` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula7` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula8` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula9` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula10` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula11` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula12` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula13` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula14` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula15` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula16` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula17` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula18` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula19` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tula20` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`tula_Key`) USING BTREE,
  UNIQUE KEY `tula1` (`tula1`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 4p_db.tula_table1: ~78 rows (approximately)
INSERT INTO `tula_table1` (`tula_Key`, `tula1`, `tula2`, `tula3`, `tula4`, `tula5`, `tula6`, `tula7`, `tula8`, `tula9`, `tula10`, `tula11`, `tula12`, `tula13`, `tula14`, `tula15`, `tula16`, `tula17`, `tula18`, `tula19`, `tula20`) VALUES
	(1, 'M1', 'NO MACHINE 1', '1', '2', 'OK', '04-06-2024 07:59', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(2, 'M2', 'AUTO LABEL 1.1', '1', '1', 'NG', '04-06-2024 06:20', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(3, 'M3', 'NO MACHINE', '1', '2', 'NG', '04-06-2024 02:03', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/PL3.txt', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(4, 'M4', 'VACUUM LOADER BOT 1.2', '1', '1', 'NG', '04-06-2024 08:17', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(5, 'M5', 'AUTO LABEL 1.2', '1', '1', 'OK', '04-06-2024 07:46', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(6, 'M6', 'CONVERTER CONVEYOR BOT 1.2', '1', '1', 'OK', '04-06-2024 07:59', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(7, 'M7', 'Printer 1.1', '1', '1', 'OK', '04-06-2024 07:59', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(8, 'M8', 'PRINTER 1.2', '1', '1', 'OK', '04-06-2024 07:59', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(9, 'M9', 'MOUNTER A  BOT1', '1', '1', 'OK', '05-06-2024 08:28', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(10, 'M10', 'SHUTTER TRUOC MOUNTER A', '1', '1', 'OK', '31-05-2024 17:47', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(11, 'M11', 'PRINTER BOT 1.1', '1', '1', 'NG', '14-06-2024 11:07', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/M11.txt', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(12, 'M12', 'SPI BOT', '1', '1', 'OK', '08-06-2024 07:55', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/PL12.txt', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(13, 'M13', 'BUFFER SAU SPI BOT', '1', '1', 'OK', '31-05-2024 17:46', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(14, 'M14', 'SHUTTER SAU PRINTER BOT1.1', '1', '1', 'OK', '31-05-2024 17:47', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(15, 'M15', 'MOUNTER A 1.2 BOT', '1', '2', 'OK', '13-06-2024 10:07', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(16, 'M16', 'NO MACHINE', '1', '2', 'OK', '31-05-2024 17:47', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(17, 'M17', 'MOUNTER G 1.1 BOT', '1', '1', 'OK', '31-05-2024 17:47', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(18, 'M18', 'SHUTTER  TRUOC MOI BOT', '1', '1', 'OK', '10-06-2024 20:31', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(19, 'M19', 'BUFFER SAU MOI 1.1', '1', '1', 'OK', '13-06-2024 17:38', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(20, 'M20', 'MOUNTER H BOT 1.1', '1', '1', 'OK', '06-06-2024 19:49', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(21, 'M21', 'GATE CONVEYOR 1.1 BOT', '1', '1', 'OK', '12-06-2024 21:14', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(22, 'M22', 'GATE 1.2 BOT', '1', '2', 'OK', '12-06-2024 19:13', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/PL22.txt', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(23, 'M23', 'MOUNTER H 1.2 BOT', '1', '2', 'OK', '31-05-2024 17:47', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(24, 'M24', 'BUFFER SAU MOI 1.2 BOT', '1', '2', 'OK', '31-05-2024 17:47', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(25, 'M25', 'CONVEYOR INVECTOR 1.1 TOP', '1', '1', 'OK', '12-06-2024 20:35', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(26, 'M26', 'SHUTTER BEFORE PRINTE 1.1 TOP ', '1', '1', 'OK', '11-06-2024 23:40', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(27, 'M27', 'PRINTER 1.1 TOP', '1', '1', 'OK', '13-06-2024 02:55', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(28, 'M28', 'SHUTTER SAU PRINTER 1.1 TOP', '1', '1', 'OK', '13-06-2024 02:55', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(29, 'M29', 'SPI TOP 1.1', '1', '1', 'OK', '13-06-2024 02:56', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(30, 'M30', 'BUFFER SAU SPI 1.1 TOP', '1', '1', 'OK', '14-06-2024 10:50', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(31, 'M31', 'MOUNTER A 1.1 TOP', '1', '1', 'OK', '13-06-2024 02:56', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/PL31.txt', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(32, 'M32', 'NO MACHINE ', '0', '0', 'OK', '11-06-2024 23:43', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(57, 'M33', 'SHUTTER TRUOC MOI 1.1 TOP', '1', '1', 'OK', '13-06-2024 11:02', '', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(58, 'M34', 'MOI 1.1 TOP', '1', '1', 'OK', '13-06-2024 11:02', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(59, 'M35', 'BUFER 1.1 TOP SAU MOI', '1', '1', 'OK', '13-06-2024 11:02', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(60, 'M36', 'SHUTTER 1.1 TOP TRUOC MOUNT J', '1', '1', 'OK', '13-06-2024 11:02', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(61, 'M37', 'SHUTTER 1.1 TOP AFTER MOUNT J', '1', '1', 'OK', '13-06-2024 11:02', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(62, 'M38', 'GATE CONVEYOR 1.1 TOP', '1', '1', 'OK', '14-06-2024 11:13', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(63, 'M39', 'NO MACHINE', '0', '0', 'OK', '08-06-2024 07:25', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(64, 'M40', 'NO MACHINE', '0', '0', 'OK', '08-06-2024 07:28', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(65, 'M41', 'SHUTTER TRƯỚC AOI 1.2 TOP', '1', '2', 'OK', '11-06-2024 04:57', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(66, 'M42', 'BUFER SAU LÒ 1.1 TOP', '1', '1', 'OK', '14-06-2024 10:54', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(67, 'M43', 'OVEN 1.2 TOP', '1', '2', 'OK', '11-06-2024 05:00', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(68, 'M44', 'OVEN 1.1TOP', '1', '1', 'OK', '10-06-2024 20:33', '', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(69, 'M45', 'AOI 1.2 TOP', '1', '2', 'OK', '10-06-2024 21:23', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(70, 'M46', 'AOI 1.1 TOP', '1', '1', 'OK', '06-06-2024 16:34', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(71, 'M47', 'NO MACHINE', '0', '0', 'OK', '07-06-2024 13:52', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(72, 'M48', 'NO MACHINE', '0', '0', 'OK', '14-06-2024 10:54', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(73, 'M49', 'VACCUM LOADER 1.2 BOT', '1', '2', 'OK', '12-06-2024 09:17', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(74, 'M50', 'AUTOLABEL 1.2 BOT', '1', '2', 'OK', '07-06-2024 02:33', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(75, 'M51', 'CONVEYER INVECTOR 1.2 BOT', '1', '2', 'OK', '14-06-2024 10:29', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/PL51.txt', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(76, 'M52', 'PRINTER 1.2 BOT', '1', '2', 'OK', '14-06-2024 09:11', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(77, 'M53', 'SHUTTER  BEFORE SPI 1.2 BOT', '1', '2', 'OK', '13-06-2024 10:06', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(78, 'M54', 'SPI 1.2 BOT', '1', '2', 'OK', '14-06-2024 09:40', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(79, 'M55', 'BUFFER SAU SPI 1.2 BOT', '1', '2', 'OK', '07-06-2024 02:33', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(80, 'M56', 'SHUTTER TRƯỚC MOUNTER 1.2', '1', '2', 'OK', '07-06-2024 02:33', '', '', '', '1', '1', 'Bot', '', '', '', '', '', '', '', ''),
	(81, 'M57', 'SHUTTER BEFORE MOUNTERA 1.2 TOP', '1', '2', 'OK', '12-06-2024 01:08', '', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(82, 'M58', 'BUFER SAU SPI 1.2 TOP', '1', '2', 'OK', '12-06-2024 01:08', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(83, 'M59', 'SPI 1.2 TOP', '1', '2', 'OK', '12-06-2024 04:09', '', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(84, 'M60', 'SHUTTER SAU PRINTER 1.2 TOP', '1', '2', 'OK', '12-06-2024 04:09', '', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(85, 'M61', 'NO MACHINE', '0', '0', 'OK', '12-06-2024 01:02', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(86, 'M62', 'SHUTTER TRƯỚC PRINTER 1.2 TOP', '1', '2', 'OK', '12-06-2024 02:50', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(87, 'M63', 'CONVERTER 1.2 TOP', '1', '2', 'OK', '04-06-2024 16:40', '', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(88, 'M64', 'NO MACHINE', '0', '0', 'OK', '04-06-2024 16:40', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(89, 'M65', 'MOUNTER I  1.2 TOP', '1', '2', 'OK', '11-06-2024 21:50', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(90, 'M66', 'MOI TOP 1.2', '1', '2', 'OK', '13-06-2024 17:29', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(91, 'M67', 'NO MACHINE', '0', '0', 'OK', '11-06-2024 23:17', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(92, 'M68', 'MOUNTER J 1.2 TOP', '1', '2', 'OK', '12-06-2024 07:33', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/PL68.txt', '', '', '1', '1', 'Top', '', '', '', '', '', '', '', ''),
	(93, 'M69', 'GATE 1.2 TOP', '1', '2', 'OK', '11-06-2024 17:20', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(94, 'M70', 'NO MACHINE', '0', '0', 'OK', '14-06-2024 11:11', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(95, 'M71', 'NO MACHINE', '0', '0', 'OK', '04-06-2024 10:45', '', '', '', '', '', 'Top', '', '', '', '', '', '', '', ''),
	(96, 'M72', 'NO MACHINE', '0', '0', 'OK', '11-06-2024 20:48', '', '', '', '', '', 'Bot', '', '', '', '', '', '', '', ''),
	(97, 'M11.1', '11.1', '1', '1', '', '', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/M11.1.txt', '', '', '1', '2', 'Top', '', '', '', '', '', '', '', ''),
	(98, 'M11.2', '11.2', '1', '1', '', '', '', '', '', '1', '2', 'Top', '', '', '', '', '', '', '', ''),
	(99, 'M11.3', 'PRINTER BOT 1.2', '1', '1', 'OK', '11-06-2024 20:48', 'C:\\xampp\\htdocs\\TestPHP/dataMachine/M11.3.txt', '', '', '1', '2', 'Top', '', '', '', '', '', '', '', ''),
	(101, 'M79', 'NO MACHINE', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(122, 'M73', 'NO MACHINE', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(125, 'M74', 'NO MACHINE 1', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
