SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `hash`, `email`, `created`, `accepted`, `admin`) VALUES
(13, 'test', '$2y$10$JL44szGRKhyc3iSs6.mvyefo3aiDta9Ch2O38RGMgoMdxuJZ.7Kau', 'test@fivefactorial.se', '2018-01-21 00:43:54', NULL, 0),
(14, 'admin', '$2y$10$LC.ZsNWuQTWRlrquTtlsTe2NrAISm5P36nbMxM1D8RKBenAYmtwsy', 'admin@fivefactorial.se', '2018-01-21 00:44:15', NULL, 0);
COMMIT;