-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2014 at 12:28 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polling`
--

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
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbcandidates`
--

INSERT INTO `tbcandidates` (`candidate_id`, `candidate_name`, `candidate_position`, `candidate_cvotes`) VALUES
(3, 'Luis Nani', 'Chairperson', 15),
(4, 'Wayne Rooney', 'Chairperson', 25),
(6, 'Thomas Vaemalen', 'Vice-Secretary', 0),
(8, 'Michael Walters', 'Secretary', 7),
(9, 'Roberto Mancini', 'Secretary', 46),
(10, 'Alex Ferguson', 'Treasurer', 0),
(11, 'Howard Web', 'Vice-Treasurer', 0),
(12, 'Richard Santana', 'Vice-Treasurer', 0),
(13, 'Chemical Reaction', 'Treasurer', 0),
(14, 'Danny Welbeck', 'Vice-Secretary', 0),
(15, 'Paul Allen', 'Organizing-Secretary', 0),
(16, 'Bill Gates', 'Organizing-Secretary', 0),
(17, 'Exponential Functions', 'Vice-Chairperson', 30),
(18, 'Algebraic Equations', 'Vice-Chairperson', 14);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbmembers`
--

INSERT INTO `tbmembers` (`member_id`, `first_name`, `last_name`, `email`, `password`, `voting`) VALUES
(1, 'Kimani', 'Kahiga', 'kahiga@gmail.com', '547da2b03f947606f1d06a8dec093e64', 0),
(2, 'MacDonald', 'Ngowi', 'mcbcrue08@gmail.com', '14b876400a7ae986df9b17fbaffb9eca', 0),
(3, 'bambang', 'sueb', 'asd@asd.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbpolling`
--

CREATE TABLE IF NOT EXISTS `tbpolling` (
  `poll_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_name` varchar(50) NOT NULL,
  `poll_year` int(11) NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbpolling`
--

INSERT INTO `tbpolling` (`poll_id`, `poll_name`, `poll_year`) VALUES
(1, 'Polling HMIF', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `tbpositions`
--

CREATE TABLE IF NOT EXISTS `tbpositions` (
  `position_id` int(5) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(45) NOT NULL,
  `f_polling_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
(10, 'Vice-Chairperson', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
