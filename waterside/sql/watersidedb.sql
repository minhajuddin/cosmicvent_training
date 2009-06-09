-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2009 at 11:39 AM
-- Server version: 5.1.32
-- PHP Version: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `watersidedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `picture` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `picture`, `description`, `show_status`) VALUES
(1, 'rafi', '', 'here is a small description  about me', 0),
(2, 'ravi', '', ' i am a author for this ', 0),
(3, 'minha', '', 'minh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Modern art', 'modernart gallery will come under this category'),
(2, 'glass', 'glass '),
(3, 'sculpture', 'sculpture');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

CREATE TABLE IF NOT EXISTS `exhibitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exhibition_title` varchar(50) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `exhibitions`
--


-- --------------------------------------------------------

--
-- Table structure for table `paintings`
--

CREATE TABLE IF NOT EXISTS `paintings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `artistId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryId` (`categoryId`),
  KEY `artistId` (`artistId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `paintings`
--

INSERT INTO `paintings` (`id`, `title`, `description`, `price`, `status`, `categoryId`, `artistId`) VALUES
(8, 'this is the ainting subject', 'this is the painting description', 0, '', 1, 1),
(9, 'tihs is the second painting that i am adding ', 'here is the corresponding description of it.', 0, '', 1, 2),
(10, 'asfasfasf', 'asfasfasf', 0, '', 3, 3),
(11, 'fsdfsdf', 'fsdfsdf', 0, '', 2, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paintings`
--
ALTER TABLE `paintings`
  ADD CONSTRAINT `paintings_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `paintings_ibfk_2` FOREIGN KEY (`artistId`) REFERENCES `artists` (`id`);
