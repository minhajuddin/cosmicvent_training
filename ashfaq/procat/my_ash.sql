-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2009 at 10:15 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_ash`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagoery`
--

CREATE TABLE `catagoery` (
  `cid` int(15) NOT NULL auto_increment,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `cname` (`cname`),
  UNIQUE KEY `cname_2` (`cname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `catagoery`
--

INSERT INTO `catagoery` (`cid`, `cname`) VALUES
(11, 'books'),
(28, 'Games'),
(26, 'movies'),
(12, 'mp3players'),
(13, 'softwares'),
(30, 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `price` int(15) NOT NULL,
  `catagoeryId` int(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `name`, `discription`, `price`, `catagoeryId`) VALUES
(1, 'head first PHP', 'php', 300, 28);
