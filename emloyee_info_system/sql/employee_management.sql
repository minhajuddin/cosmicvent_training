-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2009 at 01:49 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_number` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` int(20) NOT NULL,
  `mobile_number` int(20) NOT NULL,
  PRIMARY KEY  (`employee_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_number`, `name`, `father_name`, `skills`, `location`, `salary`, `mobile_number`) VALUES
(0, 'asdsa', 'rtret', 'rt', '', 0, 0),
(12, 'rafi', 'xyzghfgh', 'c,php,xyz', 'sc', 0, 0),
(17, 'ashfaq', 'farooq', 'html', 'bdn', 0, 999),
(34, 'ys', 'hj', 'jhj', 'jh', 876, 87),
(123, 'rafi', 'xyz', 'c,php,xyz', 'sc', 0, 0),
(4334, '', '', '', '', 0, 0),
(5465, '', '', '', '', 0, 0),
(12345, 'ashfa', 'mohamm', 'c,php', 'bdn', 0, 0),
(34324, '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`, `firstname`, `lastname`, `gender`) VALUES
('as', '12', 'as', 'ds', 'male'),
('ashfaq', '12345', 'ashfaq', 'md', 'male'),
('user', 'pwd', 'fname', 'lname', 'male');
