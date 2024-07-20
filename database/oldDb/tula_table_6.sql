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

-- Dumping structure for table 4p_db.tula_table6
CREATE TABLE IF NOT EXISTS `tula_table6` (
  `tula_Key` int unsigned NOT NULL AUTO_INCREMENT,
  `tula1` int unsigned NOT NULL,
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
  KEY `FK_tula_table6_tula_table1` (`tula1`),
  CONSTRAINT `FK_tula_table6_tula_table1` FOREIGN KEY (`tula1`) REFERENCES `tula_table1` (`tula_Key`)
) ENGINE=InnoDB AUTO_INCREMENT=33165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 4p_db.tula_table6: ~34 rows (approximately)
INSERT INTO `tula_table6` (`tula_Key`, `tula1`, `tula2`, `tula3`, `tula4`, `tula5`, `tula6`, `tula7`, `tula8`, `tula9`, `tula10`, `tula11`, `tula12`, `tula13`, `tula14`, `tula15`, `tula16`, `tula17`, `tula18`, `tula19`, `tula20`) VALUES
	(31673, 75, '28896', '1', '1', '03-06-2024 23:09', 'NG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31674, 75, '28970', '1', '1', '03-06-2024 23:42', 'OK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31675, 9, '34436', '1', '2', '05-06-2024 08:17', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(31680, 9, '34547', '1', '2', '05-06-2024 08:28', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(31915, 73, '43208', '1', '1', '06-06-2024 13:01', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(31918, 73, '43425', '1', '1', '06-06-2024 13:27', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32073, 86, '44242', '1', '1', '07-06-2024 06:04', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32078, 86, '44275', '1', '1', '07-06-2024 06:54', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32085, 86, '44308', '1', '1', '07-06-2024 07:57', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32104, 86, '44525', '1', '1', '07-06-2024 13:49', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32247, 31, '45630', '1', '1', '08-06-2024 10:30', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32248, 31, '45643', '1', '1', '08-06-2024 11:03', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32267, 18, '45738', '1', '1', '10-06-2024 08:00', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32268, 68, '45739', '1', '1', '10-06-2024 08:00', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32281, 86, '46066', '1', '2', '10-06-2024 18:50', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32282, 86, '46069', '1', '2', '10-06-2024 19:17', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32283, 18, '46082', '1', '1', '10-06-2024 20:31', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32284, 68, '46083', '1', '1', '10-06-2024 20:33', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32315, 86, '46172', '1', '2', '10-06-2024 22:29', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32316, 86, '46173', '1', '2', '10-06-2024 22:33', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32427, 65, '46422', '1', '2', '11-06-2024 04:49', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32432, 65, '46427', '1', '2', '11-06-2024 04:57', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32691, 86, '46952', '1', '2', '11-06-2024 18:54', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32830, 86, '47305', '1', '2', '12-06-2024 02:28', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32965, 75, '47604', '1', '2', '12-06-2024 09:19', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32966, 75, '47605', '1', '2', '12-06-2024 14:03', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(32993, 25, '47714', '1', '1', '12-06-2024 19:31', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33002, 25, '47733', '1', '1', '12-06-2024 20:35', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33145, 75, '48220', '1', '2', '14-06-2024 10:17', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33146, 75, '48223', '1', '2', '14-06-2024 10:27', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33149, 11, '48230', '1', '1', '14-06-2024 10:30', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33152, 11, '48239', '1', '1', '14-06-2024 10:41', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33159, 11, '48250', '1', '1', '14-06-2024 10:53', 'NG', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(33164, 11, '48259', '1', '1', '14-06-2024 11:07', 'OK', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
