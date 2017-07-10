-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2015 at 01:54 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
--
-- Database: `stt`
--
CREATE DATABASE IF NOT EXISTS `stt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stt`;
 
 
-----------------------------------------------------------
 
--
-- Table structure for table `incidents`
--
 
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-----------------------------------------------------------
 
--
-- Table structure for table `students`
--
 
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
 
--
-- Dumping data for table `students`
--
 
INSERT INTO `students` (`id`, `username`, `password`, `name`, `active`, `admin`) VALUES
(1, 'admin', '$2a$10$E0hKDlY5A7HrmatD9vcSMeO8opsr.C.ZVV5j9fxCrldmq/TZGmbZC', 'Admin', 1, 1);
 
 
-----------------------------------------------------------
 
--
-- Table structure for table `inventory`
--
 
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentOwner` varchar(64) NOT NULL,
  `LaptopID` varchar(128) NOT NULL,
  `Brand` varchar(64) NOT NULL,
  `GradYear` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
--
-- Dumping data for table `LaptopBrand`
--
 
/* INSERT INTO `inventory` (`StudentOwner`, `LaptopID`, `Brand`, `GradYear`) VALUES 
 ('Joe', '123', 'Lenovo n21', 2018), 
 ('Charlie', '11', 'Dell', 2018); */

-----------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 
