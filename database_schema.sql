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
CREATE DATABASE IF NOT EXISTS `STT` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `STT`;
 
 
-- --------------------------------------------------------
 
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
  `laptoptaken` tinyint(1) NOT NULL,
  `chargertaken` tinyint(1) NOT NULL,
  `newlaptop` tinyint(1) NOT NULL,
  `newlaptopserial` varchar(64) NOT NULL,
  `newchargerserial` varchar(64) NOT NULL,
  `explanation` varchar(256) NOT NULL,
  `receviedby` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
 
-- --------------------------------------------------------
 
--
-- Table structure for table `devices`
--
 
DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(64) NOT NULL,
  `assignedto_id` int(11) NOT NULL,
  `received` datetime NOT NULL,
  `problem` varchar(256) NOT NULL,
  `resolution` varchar(256) NOT NULL,
  `notes` varchar(512) NOT NULL,
  `repaired` datetime NOT NULL,
  `returned` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `receivedby_id` int(11) NOT NULL,
  `serial` varchar(64) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 
 
-- --------------------------------------------------------
 
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
  `bio` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;
 
--
-- Dumping data for table `students`
--
 
INSERT INTO `students` (`id`, `username`, `password`, `name`, `class`, `active`, `bio`, `admin`) VALUES
(1, 'student1', 'student1', 'Student 1', '2001', 1, '', 0),
(2, 'student2', 'student2', 'Student 2', '2002', 1, '', 0),
(3, 'student3', 'student3', 'Student 3', '2004', 1, '', 0),
(9, 'steavie', 'steavie', 'Steavie', '2020', 1, '', 0),
(14, 'admin', 'admin', 'Admin', '2000', 1, '', 1);
 
-- --------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 
