DROP DATABASE IF EXISTS tajsystem;
CREATE DATABASE tajsystem;
USE tajsystem;

--
-- Table structure for table `securityguards`
--

DROP TABLE IF EXISTS `securityguards`;
CREATE TABLE `securityguards` (
  `id` INT(11) NOT NULL auto_increment,
  `firstname` VARCHAR(50) NOT NULL default '',
  `lastname` VARCHAR(50) NOT NULL default '',
  `username` VARCHAR(50) NOT NULL default '',
  `password` VARCHAR(50) NOT NULL default '',
  `email` VARCHAR(50) NOT NULL default '',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `securityguards` WRITE;
INSERT INTO `securityguards` VALUES (1, 'Zoe', 'Stephens', 'chad_giga57', 'only_muscle', 'chad_giga@hotmail.com', '2023-03-09 17:29:00');
UNLOCK TABLES;

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE `managers` (
  `id` INT(11) NOT NULL auto_increment,
  `firstname` VARCHAR(50) NOT NULL default '',
  `lastname` VARCHAR(50) NOT NULL default '',
  `username` VARCHAR(50) NOT NULL default '',
  `password` VARCHAR(50) NOT NULL default '',
  `email` VARCHAR(50) NOT NULL default '',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `managers` WRITE;
INSERT INTO `managers` VALUES (1, 'Pierre', 'Mannix', 'Xman77713', 'discord_rules', 'realdiscordmod@outlook.com', '2023-03-09 17:29:00');
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE `visitors` (
  `id` INT(9) NOT NULL,
  `firstname` VARCHAR(50) NOT NULL default '',
  `lastname` VARCHAR(50) NOT NULL default '',
  `floornum` INT(50) NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`created_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

LOCK TABLES `visitors` WRITE;
INSERT INTO `visitors` VALUES (582067295, 'Tiffany', 'Parkinson', '3', '2023-03-09 17:29:00');
UNLOCK TABLES;

GRANT ALL PRIVILEGES ON TAJSystem.* TO 'pierre'@'localhost' IDENTIFIED BY 'oodStudio';