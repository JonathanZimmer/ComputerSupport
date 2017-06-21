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
 
DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `owner` varchar(64) NOT NULL,
  `status` varchar(128) NOT NULL,
  `laptopserial` varchar(64) NOT NULL,
  `chargerserial` varchar(64) NOT NULL,
  `laptoptaken` varchar(3) NOT NULL,
  `chargertaken` varchar(3) NOT NULL,
  `newlaptopserial` varchar(64) NOT NULL,
  `newchargerserial` varchar(64) NOT NULL,
  `explanation` varchar(256) NOT NULL,
  `receviedby` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
INSERT INTO `incidents`(`id`, `owner`, `laptopserial`, `chargerserial`, `laptoptaken`, `chargertaken`, `newlaptopserial`,`newchargerserial`, `problem`, `receviedby`) VALUES
(1,'Jimbo', 'LR0343', 'SPARE001', 'Yes', 'No', 'LR0344', '', 'Will not connect to Wi-Fi', 1);
(2,'Joe', 'LR0344', 'SPARE033', 'No', 'No', '', '', 'Does not turn on', 2);
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
  `class` varchar(4) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
 
--
-- Dumping data for table `students`
--
 
INSERT INTO `students` (`id`, `username`, `password`, `name`, `class`, `active`, `admin`) VALUES
(1, 'student1', 'student1', 'Student 1', '2001', 1, 0),
(2, 'student2', 'student2', 'Student 2', '2002', 1, 0),
(3, 'student3', 'student3', 'Student 3', '2004', 1, 0),
(9, 'steavie', 'steavie', 'Steavie', '2020', 1, 0),
(14, 'admin', 'admin', 'Admin', '2000', 1, 1);
 
 
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
  `TakeHome` tinyint(1) NOT NULL,
  `GradYear` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
--
-- Dumping data for table `LaptopBrand`
--
 
INSERT INTO `inventory` (`StudentOwner`, `LaptopID`, `Brand`, `TakeHome`, `GradYear`) VALUES
('Joe', '123', '1', 1, 2018),
('Charlie', '11', 2, 2, 2018);

-----------------------------------------------------------

--
-- Table structure for table `LaptopHistory`
--
 
DROP TABLE IF EXISTS `LaptopHistory`;
CREATE TABLE IF NOT EXISTS `LaptopHistory` (
  `LaptopID` varchar(64) NOT NULL,
  `Brand` varchar(64) NOT NULL,
  `FixedOn` varchar(64) NOT NULL,
  PRIMARY KEY (`LaptopID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-----------------------------------------------------------
 
--
-- Table structure for table `LaptopBrand`
--
 
DROP TABLE IF EXISTS `LaptopBrand`;
CREATE TABLE IF NOT EXISTS `LaptopBrand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
 
--
-- Dumping data for table `LaptopBrand`
--
 
INSERT INTO `LaptopBrand` (`id`, `name`) VALUES
(1, 'Lenovo'),
(2, 'Dell'),
(3, 'Samsung');


-----------------------------------------------------------
 
--
-- Table structure for table `TakeHome`
--
 
DROP TABLE IF EXISTS `TakeHome`;
CREATE TABLE IF NOT EXISTS `TakeHome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
 
--
-- Dumping data for table `TakeHome`
--
 
INSERT INTO `TakeHome` (`id`, `answer`) VALUES
(1, 'Yes'),
(2, 'No');


-----------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 
