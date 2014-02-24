-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2014 at 09:05 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polling`
--
CREATE DATABASE IF NOT EXISTS `polling` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `polling`;

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrators`
--

CREATE TABLE IF NOT EXISTS `tbadministrators` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbadministrators`
--

INSERT INTO `tbadministrators` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Kimani', 'Kahiga', 'kahiga@gmail.com', '547da2b03f947606f1d06a8dec093e64'),
(2, 'admin', 'admin', 'admin@ps.anu.ac.ke', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbcandidates`
--

CREATE TABLE IF NOT EXISTS `tbcandidates` (
  `candidate_id` int(5) NOT NULL AUTO_INCREMENT,
  `candidate_of_birth` date NOT NULL,
  `candidate_gender` varchar(10) NOT NULL,
  `candidate_vision` varchar(300) NOT NULL,
  `candidate_mission` varchar(300) NOT NULL,
  `candidate_achievements` varchar(1000) NOT NULL,
  `candidate_photo` varchar(50) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbcandidates`
--

INSERT INTO `tbcandidates` (`candidate_id`, `candidate_of_birth`, `candidate_gender`, `candidate_vision`, `candidate_mission`, `candidate_achievements`, `candidate_photo`, `candidate_name`, `candidate_position`, `candidate_cvotes`) VALUES
(3, '0000-00-00', '', '', '', '', '', 'Luis Nani', 'Chairperson', 15),
(4, '0000-00-00', '', '', '', '', '', 'Wayne Rooney', 'Chairperson', 25),
(6, '0000-00-00', '', '', '', '', '', 'Thomas Vaemalen', 'Vice-Secretary', 1),
(8, '0000-00-00', '', '', '', '', '', 'Michael Walters', 'Secretary', 9),
(9, '0000-00-00', '', '', '', '', '', 'Roberto Mancini', 'Secretary', 47),
(10, '0000-00-00', '', '', '', '', '', 'Alex Ferguson', 'Treasurer', 0),
(11, '0000-00-00', '', '', '', '', '', 'Howard Web', 'Vice-Treasurer', 0),
(12, '0000-00-00', '', '', '', '', '', 'Richard Santana', 'Vice-Treasurer', 0),
(13, '0000-00-00', '', '', '', '', '', 'Chemical Reaction', 'Treasurer', 0),
(14, '0000-00-00', '', '', '', '', '', 'Danny Welbeck', 'Vice-Secretary', 1),
(15, '0000-00-00', '', '', '', '', '', 'Paul Allen', 'Organizing-Secretary', 0),
(16, '0000-00-00', '', '', '', '', '', 'Bill Gates', 'Organizing-Secretary', 1),
(17, '0000-00-00', '', '', '', '', '', 'Exponential Functions', 'Vice-Chairperson', 30),
(18, '0000-00-00', '', '', '', '', '', 'Algebraic Equations', 'Vice-Chairperson', 14),
(19, '0000-00-00', '', '', '', '', '', 'Susilo Bambang Yudhoyono', 'Presiden', 10),
(21, '0000-00-00', '', '', '', '', '', 'Harry Tanoesoedibyo', 'Wapres', 0),
(23, '0000-00-00', '', '', '', '', '', 'Megawati', 'Presiden', 200),
(24, '0000-00-00', '', '', '', '', '', 'Jokowi', 'Wapres', 0),
(25, '0000-00-00', '', '', '', '', '', 'qwew', 'Presiden', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbmembers`
--

CREATE TABLE IF NOT EXISTS `tbmembers` (
  `member_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `voting` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbmembers`
--

INSERT INTO `tbmembers` (`member_id`, `first_name`, `last_name`, `email`, `password`, `voting`) VALUES
(1, 'Kimani', 'Kahiga', 'kahiga@gmail.com', '547da2b03f947606f1d06a8dec093e64', 0),
(2, 'MacDonald', 'Ngowi', 'mcbcrue08@gmail.com', '14b876400a7ae986df9b17fbaffb9eca', 0),
(3, 'bambang', 'sueb', 'asd@asd.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(4, 'asdasd', 'dsadasd', 'qwe@qwe.com', 'c20ad4d76fe97759aa27a0c99bff6710', 1),
(5, '12321', '213213', '123@123.com', '202cb962ac59075b964b07152d234b70', 0),
(6, 'asdasd', 'asddasd', 'da@da.com', '912ec803b2ce49e4a541068d495ab570', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbpolling`
--

CREATE TABLE IF NOT EXISTS `tbpolling` (
  `poll_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_name` varchar(50) NOT NULL,
  `poll_year` int(11) NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbpolling`
--

INSERT INTO `tbpolling` (`poll_id`, `poll_name`, `poll_year`) VALUES
(1, 'Polling HMIF', 2014),
(2, 'Pemilu Indonesia', 2014),
(5, 'jy', 2014),
(6, 'qwe', 2014),
(7, 'asd', 2014),
(8, 'rtr', 2014),
(9, 'Jokowi', 2014),
(10, 'rr', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `tbpositions`
--

CREATE TABLE IF NOT EXISTS `tbpositions` (
  `position_id` int(5) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(45) NOT NULL,
  `f_polling_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbpositions`
--

INSERT INTO `tbpositions` (`position_id`, `position_name`, `f_polling_id`) VALUES
(1, 'Chairperson', 1),
(2, 'Secretary', 1),
(5, 'Vice-Secretary', 1),
(7, 'Organizing-Secretary', 1),
(8, 'Treasurer', 1),
(9, 'Vice-Treasurer', 1),
(10, 'Vice-Chairperson', 1),
(11, 'Presiden', 2),
(12, 'Wapres', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
