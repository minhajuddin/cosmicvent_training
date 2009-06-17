-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2009 at 11:05 AM
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
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `catagoery`
--

INSERT INTO `catagoery` (`cid`, `cname`) VALUES
(10, '');

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
(12, 'first', 'this is first entry', 34, 10),
(45, 'secon', 'thanks for test', 676, 10);
