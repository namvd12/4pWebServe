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

-- Dumping structure for table 4p_db.tula_table8
CREATE TABLE IF NOT EXISTS `tula_table8` (
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
  PRIMARY KEY (`tula_Key`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table 4p_db.tula_table8: ~4 rows (approximately)
INSERT INTO `tula_table8` (`tula_Key`, `tula1`, `tula2`, `tula3`, `tula4`, `tula5`, `tula6`, `tula7`, `tula8`, `tula9`, `tula10`, `tula11`, `tula12`, `tula13`, `tula14`, `tula15`, `tula16`, `tula17`, `tula18`, `tula19`, `tula20`) VALUES
	(1, '00000', '1', 'admin', '$2a$10$7YyiX7hL28imon4bUWIZLOCENqsk80qHKVmDnzzPuVosLeVxZI8wq', '', '', 'hotrotula@gmail.com', 'avatar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, '0001', '3', 'namvd', '$2y$10$v6SPHQl8bfqIlLccCHP6uezK.J/fvDRWZp..4.aNufzbr7IjJ6ReC', 'vu dinh nam', '0334103284', 'vudinhnambk01@gmail.com', 'D:\\namvd\\webServe\\public\\..\\storage\\app\\public/dataAvatar/namvd.txt', 'Team leader', '', '', '', '', '', '', '', '', '', '', ''),
	(3, '31101295', '2', 'phucdv', '$2a$10$dxR.jVAU1KDp19yX.2J/iOfqPmv001Ouvv0p5HLXuabhVR2sI7lh.', 'Đặng văn phúc', '', 'dongvua92@gmail.com', 'D:\\namvd\\webServe\\public\\..\\storage\\app\\public/dataAvatar/phucdv.txt', 'Part leader', '', '', '', '', '', '', '', '', '', '', ''),
	(4, '31100094', '4', 'namvd2', '$2a$10$JHt9Rk756Gl6BoTKd6AcqOt9MaK9cQyg.BAL1g5kb1fbqcfFfOFrK', 'namvd', '0334103284', 'peovjp9x@gmail.com', '', 'Part leader', '', '', '', '', '', '', '', '', '', '', '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
