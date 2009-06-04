-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2009 at 07:13 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `emailcv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Name` varchar(50) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Pass`) VALUES
('admin', 'adminpass');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `Id` int(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Message` longtext NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`Id`, `Name`, `Message`) VALUES
(1, 'Sample', 'Dear [__user_name__],\r\n   We are proud to announce our new mailing system designed by CosmicVent Software technologies in coalition with iSattar Corporation. Your name is in the list of our users. That''s why you get our mail.\r\n\r\nRegards,\r\nAdmin.'),
(2, 'sattar', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  KEY `Active` (`Active`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Active`) VALUES
(1, 'Sattar', 'sattar@mailinator.com', 1),
(2, 'abdul', 'abdul@mailinator.com', 1),
(7, 'Minhaj', 'min@mailinator.com', 0),
(8, 'Some', 'me@isattar.com', 1),
(9, 'Hello', 'hello@mailinator.com', 1),
(10, 'sattar', 'mr.abdulsattar@gmail.com', 1);
