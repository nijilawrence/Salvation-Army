-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2011 at 08:07 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salvation`
--
CREATE DATABASE `salvation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `salvation`;

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE IF NOT EXISTS `deleted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `ident1` varchar(100) NOT NULL,
  `ident2` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deleted`
--

INSERT INTO `deleted` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `sex`, `category`, `father`, `mother`, `guardian`, `address`, `ident1`, `ident2`, `date`) VALUES
(2, 123457145, 'Nijo', 'Lawrence', 8, 'A', 'Male', '', 'Lawrence', 'Jyothi', '-', 'NIJI , TC 14/574(1)Nandavanam , Trivandrum', 'Mole on the right hand', 'Mole on the left legjkbkjb', '2011-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `firsths`
--

CREATE TABLE IF NOT EXISTS `firsths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `malayalam1` float NOT NULL DEFAULT '0',
  `malayalam1g` varchar(10) NOT NULL DEFAULT 'E',
  `malayalam2` float NOT NULL DEFAULT '0',
  `malayalam2g` varchar(10) NOT NULL DEFAULT 'E',
  `sanskrit` float NOT NULL DEFAULT '0',
  `sanskritg` varchar(10) NOT NULL DEFAULT 'E',
  `english` float NOT NULL DEFAULT '0',
  `englishg` varchar(10) NOT NULL DEFAULT 'E',
  `hindi` float NOT NULL DEFAULT '0',
  `hindig` varchar(10) NOT NULL DEFAULT 'E',
  `physics` float NOT NULL DEFAULT '0',
  `physicsg` varchar(10) NOT NULL DEFAULT 'E',
  `chemistry` float NOT NULL DEFAULT '0',
  `chemistryg` varchar(10) NOT NULL DEFAULT 'E',
  `biology` float NOT NULL DEFAULT '0',
  `biologyg` varchar(10) NOT NULL DEFAULT 'E',
  `socialscience` float NOT NULL DEFAULT '0',
  `socialscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `maths` float NOT NULL DEFAULT '0',
  `mathsg` varchar(10) NOT NULL DEFAULT 'E',
  `informationtechnology` float NOT NULL DEFAULT '0',
  `informationtechnologyg` varchar(10) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `firsths`
--

INSERT INTO `firsths` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `malayalam1`, `malayalam1g`, `malayalam2`, `malayalam2g`, `sanskrit`, `sanskritg`, `english`, `englishg`, `hindi`, `hindig`, `physics`, `physicsg`, `chemistry`, `chemistryg`, `biology`, `biologyg`, `socialscience`, `socialscienceg`, `maths`, `mathsg`, `informationtechnology`, `informationtechnologyg`) VALUES
(2, 2147483647, 'Reggie', 'David', 8, 'A', 55, 'A+', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E'),
(8, 465789, 'Susan', 'Alex', 10, 'A', 50, 'C+', 50, 'C+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 50, 'C+', 75, 'B+', 85, 'A', 80, 'A', 90, 'A+'),
(6, 1235167137, 'Praveen', 'Mammen', 8, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(7, 5648799, 'Tony', 'Johny', 10, 'A', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+', 100, 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `firstup`
--

CREATE TABLE IF NOT EXISTS `firstup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `malayalam` float NOT NULL DEFAULT '0',
  `malayalamg` varchar(10) NOT NULL DEFAULT 'E',
  `sanskrit` float NOT NULL DEFAULT '0',
  `sanskritg` varchar(10) NOT NULL DEFAULT 'E',
  `english` float NOT NULL DEFAULT '0',
  `englishg` varchar(10) NOT NULL DEFAULT 'E',
  `hindi` float NOT NULL DEFAULT '0',
  `hindig` varchar(10) NOT NULL DEFAULT 'E',
  `basicscience` float NOT NULL DEFAULT '0',
  `basicscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `socialscience` float NOT NULL DEFAULT '0',
  `socialscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `maths` float NOT NULL DEFAULT '0',
  `mathsg` varchar(10) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `firstup`
--

INSERT INTO `firstup` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `malayalam`, `malayalamg`, `sanskrit`, `sanskritg`, `english`, `englishg`, `hindi`, `hindig`, `basicscience`, `basicscienceg`, `socialscience`, `socialscienceg`, `maths`, `mathsg`) VALUES
(1, 0, 'dsjkv', 'dsjkv', 7, '', 50, 'C+', 50, 'C+', 100, 'A+', 50, 'C+', 50, 'C+', 50, 'C+', 50, 'C+'),
(2, 34, 'sddsd', '', 6, '', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(3, 8912743, 'kans', '', 6, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(5, 123456, 'JyothiLawrence', 'JyothiLawrence', 6, 'C', 60, 'E', 50, 'E', 56, 'E', 45, 'E', 65, 'E', 52, 'E', 88, 'E'),
(6, 1234571, 'Nijo', 'Lawrence', 6, 'C', 55, 'C+', 62.5, 'B', 23, 'D', 23, 'D', 22, 'D', 23, 'D', 33, 'D+'),
(7, 2131231, 'dsjkv', 'dsjkv', 6, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(8, 32132, 'hjvbkhjb', 'kjgbkj', 6, 'C', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E'),
(9, 12312414, 'jksvhskljn', 'kjhb', 6, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(11, 1231, 'Hello', 'Howare', 6, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `leftwithtc`
--

CREATE TABLE IF NOT EXISTS `leftwithtc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `ident1` varchar(100) NOT NULL,
  `ident2` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leftwithtc`
--

INSERT INTO `leftwithtc` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `sex`, `category`, `father`, `mother`, `guardian`, `address`, `ident1`, `ident2`, `date`) VALUES
(3, 123457145, 'Nijo', 'Lawrence', 8, 'A', 'Male', '', 'Lawrence', 'Jyothi', '-', 'NIJI , TC 14/574(1)Nandavanam , Trivandrum', 'Mole on the right hand', 'Mole on the left legjkbkjb', '2011-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'salvation', 'salvation');

-- --------------------------------------------------------

--
-- Table structure for table `passed`
--

CREATE TABLE IF NOT EXISTS `passed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `ident1` varchar(100) NOT NULL,
  `ident2` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `passed`
--


-- --------------------------------------------------------

--
-- Table structure for table `secondhs`
--

CREATE TABLE IF NOT EXISTS `secondhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `malayalam1` float NOT NULL DEFAULT '0',
  `malayalam1g` varchar(10) NOT NULL DEFAULT 'E',
  `malayalam2` float NOT NULL DEFAULT '0',
  `malayalam2g` varchar(10) NOT NULL DEFAULT 'E',
  `sanskrit` float NOT NULL DEFAULT '0',
  `sanskritg` varchar(10) NOT NULL DEFAULT 'E',
  `english` float NOT NULL DEFAULT '0',
  `englishg` varchar(10) NOT NULL DEFAULT 'E',
  `hindi` float NOT NULL DEFAULT '0',
  `hindig` varchar(10) NOT NULL DEFAULT 'E',
  `physics` float NOT NULL DEFAULT '0',
  `physicsg` varchar(10) NOT NULL DEFAULT 'E',
  `chemistry` float NOT NULL DEFAULT '0',
  `chemistryg` varchar(10) NOT NULL DEFAULT 'E',
  `biology` float NOT NULL DEFAULT '0',
  `biologyg` varchar(10) NOT NULL DEFAULT 'E',
  `socialscience` float NOT NULL DEFAULT '0',
  `socialscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `maths` float NOT NULL DEFAULT '0',
  `mathsg` varchar(10) NOT NULL DEFAULT 'E',
  `informationtechnology` float NOT NULL DEFAULT '0',
  `informationtechnologyg` varchar(10) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `secondhs`
--

INSERT INTO `secondhs` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `malayalam1`, `malayalam1g`, `malayalam2`, `malayalam2g`, `sanskrit`, `sanskritg`, `english`, `englishg`, `hindi`, `hindig`, `physics`, `physicsg`, `chemistry`, `chemistryg`, `biology`, `biologyg`, `socialscience`, `socialscienceg`, `maths`, `mathsg`, `informationtechnology`, `informationtechnologyg`) VALUES
(2, 2147483647, 'Reggie', 'David', 8, 'A', 55, 'A+', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E'),
(8, 465789, 'Susan', 'Alex', 10, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(6, 1235167137, 'Praveen', 'Mammen', 8, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(7, 5648799, 'Tony', 'Johny', 10, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `secondup`
--

CREATE TABLE IF NOT EXISTS `secondup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `malayalam` float NOT NULL DEFAULT '0',
  `malayalamg` varchar(10) NOT NULL DEFAULT 'E',
  `sanskrit` float NOT NULL DEFAULT '0',
  `sanskritg` varchar(10) NOT NULL DEFAULT 'E',
  `english` float NOT NULL DEFAULT '0',
  `englishg` varchar(10) NOT NULL DEFAULT 'E',
  `hindi` float NOT NULL DEFAULT '0',
  `hindig` varchar(10) NOT NULL DEFAULT 'E',
  `basicscience` float NOT NULL DEFAULT '0',
  `basicscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `socialscience` float NOT NULL DEFAULT '0',
  `socialscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `maths` float NOT NULL DEFAULT '0',
  `mathsg` varchar(10) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `secondup`
--

INSERT INTO `secondup` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `malayalam`, `malayalamg`, `sanskrit`, `sanskritg`, `english`, `englishg`, `hindi`, `hindig`, `basicscience`, `basicscienceg`, `socialscience`, `socialscienceg`, `maths`, `mathsg`) VALUES
(1, 0, 'dsjkv', 'dsjkv', 7, '', 90.45, 'E', 50.56, 'E', 75.45, 'E', 23, 'E', 56.451, 'E', 98.486, 'E', 56, 'E'),
(2, 34, 'sddsd', '', 6, '', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(3, 8912743, 'kans', '', 6, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(5, 123456, 'JyothiLawrence', 'JyothiLawrence', 6, 'C', 60, 'E', 50, 'E', 56, 'E', 45, 'E', 65, 'E', 52, 'E', 88, 'E'),
(6, 1234571, 'Nijo', 'Lawrence', 6, 'C', 55, 'C+', 50, 'C+', 23, 'D', 23, 'D', 22, 'D', 23, 'D', 33, 'D+'),
(7, 2131231, 'dsjkv', 'dsjkv', 6, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(8, 32132, 'hjvbkhjb', 'kjgbkj', 6, 'C', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E'),
(9, 12312414, 'jksvhskljn', 'kjhb', 6, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(10, 1231, 'Hello', 'Howare', 6, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `studdetails`
--

CREATE TABLE IF NOT EXISTS `studdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `ident1` varchar(100) NOT NULL,
  `ident2` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `studdetails`
--

INSERT INTO `studdetails` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `sex`, `category`, `father`, `mother`, `guardian`, `address`, `ident1`, `ident2`) VALUES
(1, 123456, 'JyothiLawrence', 'JyothiLawrence', 6, 'C', 'Female', 'Normal', 'George', 'Njanaselvam', 'Lawrence E Benjamin', 'NIJI , TC 14/574(1)Nandavanam , Trivandrum', 'dgnsdnbsdfnb', 'dfshnsdnhdsfnb'),
(2, 123457, 'Nijo', 'Lawrence', 10, 'B', 'Male', 'Normal', 'Lawrence', 'Jyothi', '-', 'NIJI , TC 14/574(1)Nandavanam , Trivandrum', 'Mole on the right hand', 'Mole on the left'),
(3, 1234571, 'Nijo', 'Lawrence', 6, 'C', 'Male', '', 'Lawrence', 'Jyothi', '', '', 'Mole on the right hand', 'Mole on the left legjkbkjb'),
(12, 8912743, 'kans', '', 6, 'A', 'Male', '', '', '', '', '', '', ''),
(17, 465789, 'Susan', 'Alex', 10, 'A', 'Female', 'Normal', 'George', 'Njanaselvam', 'Alex', 'ohias bph bnvjandfvkl;janfvjlkvnkqj', 'j; ', 'kj b'),
(5, 454132, 'Jino', 'Lawrence', 9, 'A', 'Male', '', 'Lawrence', 'Jyothi', '-', 'NIJI, TC 14/574Nandavanam , Trivandrum', 'Mole on the left hand', 'Mole on the back of the neck'),
(6, 565632, 'Lawrence', 'Benjamin', 10, 'A', 'Male', '', 'B Enose', 'Victoria Enose', '-', 'Niji TC 124/1235\r\nNandavanam Trivandrum', 'kjnvdvlkn', 'kndsbvdvsdv'),
(7, 2131231, 'dsjkv', 'dsjkv', 7, '', '', '', '', '', '', '', '', ''),
(8, 34, 'sddsd', '', 6, 'C', '', '', '', '', '', '', '', ''),
(9, 32132, 'hjvbkhjb', 'kjgbkj', 6, 'C', 'Male', '', 'ghfb', 'gbfh', 'hgfvhgfj', 'ghfjbvfdfnbmfdmdfgngfngfn', 'hgvhgjvnb', 'kbkjhbj'),
(10, 2147483647, 'Reggie', 'David', 8, 'A', 'Male', '', 'David Sugunakumar', 'Jaya ', '-', 'hjskdvln dvdzNBdfgndfgnfgnfgnfdngfnfgn', 'sdflvl h ', 'lnlnjhnkjb'),
(11, 12312414, 'jksvhskljn', 'kjhb', 6, 'C', 'Female', '', 'sdvsd', 'sdvsdv', 'sdbvsdvvdsvs', 'sdvds', 'dvsvsd', 'sdvvsdv'),
(13, 1231, 'Hello', 'Howare', 6, 'A', 'Male', '', 'hj', 'bjhk', 'b', 'nmbn', 'jkbk', 'nmbmn'),
(14, 1235167137, 'Praveen', 'Mammen', 8, 'C', 'Male', '', 'sgkhj', 'vkjhkvb', 'jhnb', 'khj', 'hjb', 'kbbk'),
(15, 5648799, 'Tony', 'Johny', 10, 'A', 'Male', 'Normal', 'Johny', 'Cicy', 'Johny', 'sbhsnajbnjksad bns advjna v jlbnadsjfbnl; fbaf basj', 'skfjbh ;kj ', ' KJ N  JKN ');

-- --------------------------------------------------------

--
-- Table structure for table `thirdhs`
--

CREATE TABLE IF NOT EXISTS `thirdhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `malayalam1` float NOT NULL DEFAULT '0',
  `malayalam1g` varchar(10) NOT NULL DEFAULT 'E',
  `malayalam2` float NOT NULL DEFAULT '0',
  `malayalam2g` varchar(10) NOT NULL DEFAULT 'E',
  `sanskrit` float NOT NULL DEFAULT '0',
  `sanskritg` varchar(10) NOT NULL DEFAULT 'E',
  `english` float NOT NULL DEFAULT '0',
  `englishg` varchar(10) NOT NULL DEFAULT 'E',
  `hindi` float NOT NULL DEFAULT '0',
  `hindig` varchar(10) NOT NULL DEFAULT 'E',
  `physics` float NOT NULL DEFAULT '0',
  `physicsg` varchar(10) NOT NULL DEFAULT 'E',
  `chemistry` float NOT NULL DEFAULT '0',
  `chemistryg` varchar(10) NOT NULL DEFAULT 'E',
  `biology` float NOT NULL DEFAULT '0',
  `biologyg` varchar(10) NOT NULL DEFAULT 'E',
  `socialscience` float NOT NULL DEFAULT '0',
  `socialscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `maths` float NOT NULL DEFAULT '0',
  `mathsg` varchar(10) NOT NULL DEFAULT 'E',
  `informationtechnology` float NOT NULL DEFAULT '0',
  `informationtechnologyg` varchar(10) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `thirdhs`
--

INSERT INTO `thirdhs` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `malayalam1`, `malayalam1g`, `malayalam2`, `malayalam2g`, `sanskrit`, `sanskritg`, `english`, `englishg`, `hindi`, `hindig`, `physics`, `physicsg`, `chemistry`, `chemistryg`, `biology`, `biologyg`, `socialscience`, `socialscienceg`, `maths`, `mathsg`, `informationtechnology`, `informationtechnologyg`) VALUES
(2, 2147483647, 'Reggie', 'David', 8, 'A', 55, 'A+', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E', 55, 'E'),
(8, 465789, 'Susan', 'Alex', 10, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(6, 1235167137, 'Praveen', 'Mammen', 8, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(7, 5648799, 'Tony', 'Johny', 10, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `thirdup`
--

CREATE TABLE IF NOT EXISTS `thirdup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `std` int(11) NOT NULL,
  `division` varchar(10) NOT NULL,
  `malayalam` float NOT NULL DEFAULT '0',
  `malayalamg` varchar(10) NOT NULL DEFAULT 'E',
  `sanskrit` float NOT NULL DEFAULT '0',
  `sanskritg` varchar(10) NOT NULL DEFAULT 'E',
  `english` float NOT NULL DEFAULT '0',
  `englishg` varchar(10) NOT NULL DEFAULT 'E',
  `hindi` float NOT NULL DEFAULT '0',
  `hindig` varchar(10) NOT NULL DEFAULT 'E',
  `basicscience` float NOT NULL DEFAULT '0',
  `basicscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `socialscience` float NOT NULL DEFAULT '0',
  `socialscienceg` varchar(10) NOT NULL DEFAULT 'E',
  `maths` float NOT NULL DEFAULT '0',
  `mathsg` varchar(10) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admno` (`admno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `thirdup`
--

INSERT INTO `thirdup` (`id`, `admno`, `fname`, `lname`, `std`, `division`, `malayalam`, `malayalamg`, `sanskrit`, `sanskritg`, `english`, `englishg`, `hindi`, `hindig`, `basicscience`, `basicscienceg`, `socialscience`, `socialscienceg`, `maths`, `mathsg`) VALUES
(1, 0, 'dsjkv', 'dsjkv', 7, '', 90.45, 'E', 50.56, 'E', 75.45, 'E', 23, 'E', 56.451, 'E', 98.486, 'E', 56, 'E'),
(2, 34, 'sddsd', '', 6, '', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(3, 8912743, 'kans', '', 6, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(5, 123456, 'JyothiLawrence', 'JyothiLawrence', 6, 'C', 60, 'E', 50, 'E', 56, 'E', 45, 'E', 65, 'E', 52, 'E', 88, 'E'),
(6, 1234571, 'Nijo', 'Lawrence', 6, 'C', 55, 'C+', 71.4286, 'B+', 23, 'D', 23, 'D', 22, 'D', 23, 'D', 33, 'D+'),
(7, 2131231, 'dsjkv', 'dsjkv', 6, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(8, 32132, 'hjvbkhjb', 'kjgbkj', 6, 'C', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E', 88, 'E'),
(9, 12312414, 'jksvhskljn', 'kjhb', 6, 'C', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E'),
(10, 1231, 'Hello', 'Howare', 6, 'A', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E', 0, 'E');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
