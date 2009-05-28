-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2009 at 02:06 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `catagoery`
--

INSERT INTO `catagoery` (`cid`, `cname`) VALUES
(3, 'mp3');

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
(0, '$_POST[name]', '$_POST[discription]', 0, 0),
(12, 'fdsfer', 'dfdferew', 3, 0),
(45, 'fgfdgsds', 'fdgfdgkoko', 45, 0),
(123, 'sdads', 'dsffdass', 3434, 0),
(343, 'dfsddf', 'fdfdyu', 434345, 0),
(455, 'fdgdf', 'sfg', 0, 0),
(888, 'oighgfh', 'l;ghhgf', 0, 0),
(3432, 'dsfh', 'dsfsddfdfy', 2334324, 0),
(54435, 'fgfdgashfaq', 'fdgfgfdfsd', 45, 0),
(66577, 'sdf', 'ghhg', 675, 0),
(1298987, 'sadsert', ' adsdsafrt', 34, 0);
