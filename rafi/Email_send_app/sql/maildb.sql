-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2009 at 07:29 AM
-- Server version: 5.1.32
-- PHP Version: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `maildb`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail_entries`
--

CREATE TABLE IF NOT EXISTS `mail_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `enable_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mail_entries`
--

INSERT INTO `mail_entries` (`id`, `user_name`, `email_id`, `enable_status`) VALUES
(1, 'rafi', 'rafi.ece528@gmail.com', 1),
(2, 'rafi', 'rafi.ece528@gmail.com', 1),
(3, 'sindhu', 'vandu@gmail.com', 1),
(4, 'asfaq', 'imstar_star@yahoo.com', 1),
(5, 'minhaj', 'm@mailinator.com', 1);
