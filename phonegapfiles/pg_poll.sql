

CREATE TABLE IF NOT EXISTS `pg_poll` (
  `mov_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) DEFAULT NULL,
  `name` varchar(512) COLLATE latin1_general_ci NOT NULL,
  `fecha_mov` datetime DEFAULT NULL,
  `email` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
  `dateofbirth` datetime DEFAULT NULL,
  `car` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
  `model` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
  `comment` tinytext COLLATE latin1_general_ci,
  `uploaded` int(11) DEFAULT NULL,
  PRIMARY KEY (`mov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
