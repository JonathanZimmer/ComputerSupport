SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `stt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stt`;


DROP TABLE IF EXISTS `LaptopHistory`;
CREATE TABLE IF NOT EXISTS `LaptopHistory` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `LaptopID` varchar(20) NOT NULL,
  `GradYear` varchar(4) NOT NULL,
  `StudentOwner` varchar(64) NOT NULL,
  `DateRecieved` date NOT NULL,
  `RecievedBy` int(3) NOT NULL,
  `Problem` varchar(128) NOT NULL,
  `KeyboardReplaced` varchar(3) NOT NULL,
  `LCDReplaced` varchar(3) NOT NULL,
  `WirelessCardReplaced` varchar(3) NOT NULL,
  `FanReplaced` varchar(3) NOT NULL,
  `BezelReplaced` varchar(3) NOT NULL,
  `MotherBoardReplaced` varchar(3) NOT NULL,
  `UnitReplaced` varchar(3) NOT NULL,
  `ScrewsUsed` varchar(3) NOT NULL,
  `RepairNotes` varchar(256) NOT NULL,
  `RepairedBy` int(3) NOT NULL,
  `DateRepaired` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;


DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentOwner` varchar(64) NOT NULL,
  `LaptopID` varchar(128) NOT NULL,
  `Brand` varchar(64) NOT NULL,
  `GradYear` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `Spares`;
CREATE TABLE IF NOT EXISTS `Spares` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Student` varchar(64) NOT NULL,
  `LaptopID` varchar(64) NOT NULL,
  `LaptopBrand` varchar(64) NOT NULL,
  PRIMARY KEY (`id`))
  ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `students` (`id`, `username`, `password`, `name`, `active`, `admin`) VALUES
(1, 'admin', '$2a$10$E0hKDlY5A7HrmatD9vcSMeO8opsr.C.ZVV5j9fxCrldmq/TZGmbZC', 'Admin', 1, 1);

INSERT INTO `Spares` (`id`, `Student`, `LaptopID`, `LaptopBrand`) VALUES
(1, 'Joe', '8807', 'Lenovo');
(2, 'Jim', '33', 'Dell');
(3, 'Bob', '42', 'Dell');
(4, 'NoStudent', '9', 'Apple');