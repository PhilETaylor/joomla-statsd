CREATE TABLE IF NOT EXISTS `#__statsd_config` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL DEFAULT '127.0.0.1',
  `port` int(11) NOT NULL DEFAULT '8125',
  `prefix` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `#__statsd_config` SET `id`=1, `host`='127.0.0.1', `port`=8125, `prefix`='applications.michaelmarod.'; 

CREATE TABLE IF NOT EXISTS `#__statsd_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventName` varchar(50) NOT NULL,
  `active` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
