-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2009 at 01:58 PM
-- Server version: 5.1.32
-- PHP Version: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE IF NOT EXISTS `book_list` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `catageoryId` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `price` double NOT NULL,
  `Description` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`id`, `catageoryId`, `name`, `author`, `publisher`, `price`, `Description`) VALUES
(1, 0, 'treasure Island', 'sajju', 'dfasdf', 1000, NULL),
(3, 0, 'harry potter and prisoner of azkaban', 'j. k. Rowling', 'mc graw hill', 800, NULL),
(4, 0, 'harry potter and chamber of secrets', 'j. k. Rowling', 'ashfaq', 2304, NULL),
(5, 0, 'asfas', 'asdflkj', 'ashfaq', 2304, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catageory`
--

CREATE TABLE IF NOT EXISTS `catageory` (
  `cid` int(15) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `catageory`
--

INSERT INTO `catageory` (`cid`, `cname`) VALUES
(1, 'fiction'),
(2, 'Non-Fiction'),
(3, 'fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

