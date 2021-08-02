-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2010 at 10:18 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bulk_sms`
--
CREATE DATABASE `bulk_sms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bulk_sms`;

-- --------------------------------------------------------

--
-- Table structure for table `group_elearning`
--

CREATE TABLE `group_elearning` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `level` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_elearning`
--

INSERT INTO `group_elearning` (`id`, `name`, `level`, `subject`, `contact`) VALUES
(1, 'MUGERWA FRED', 'PRIMARY', 'SCIENCE', '789999678'),
(2, 'NAKISUBIKA JANE', 'O LEVEL', 'MATHEMATICS', '755234111'),
(3, 'HUZAIRU MUSA', 'O LEVEL', 'MATHEMATICS', '757777444');

-- --------------------------------------------------------

--
-- Table structure for table `group_parents`
--

CREATE TABLE `group_parents` (
  `id` int(11) NOT NULL auto_increment,
  `student` varchar(500) NOT NULL,
  `parent` varchar(500) NOT NULL,
  `class` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `contact2` varchar(200) NOT NULL,
  `contact3` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `group_parents`
--

INSERT INTO `group_parents` (`id`, `student`, `parent`, `class`, `contact`, `contact2`, `contact3`) VALUES
(1, 'kirumira isaac', 'ssenkute drake', 'S1', '759939936', '756234679', 'none'),
(2, 'kiseka alex', 'kiberu john', 'S2', '786156432', '', ''),
(3, 'NAMULI MABLE', 'MUKASA PAUL', 'S3', '756789000', '', ''),
(4, 'KASOZI CHARLES', 'DEMBE MOSES', 'S1', '785234567', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_schools`
--

CREATE TABLE `group_schools` (
  `id` int(11) NOT NULL auto_increment,
  `school` varchar(200) NOT NULL,
  `zone` varchar(500) NOT NULL,
  `subcounty` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `contact2` varchar(500) NOT NULL,
  `contact3` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_schools`
--

INSERT INTO `group_schools` (`id`, `school`, `zone`, `subcounty`, `contact`, `contact2`, `contact3`) VALUES
(1, 'TRINITY HIGH SCHOOL', 'ZONE1', 'NABWERU', '701350530', '', ''),
(2, 'ST MARYS KABULENGWA', 'ZONE2', 'KYEBANDO', '754234123', '', ''),
(3, 'NANZIGA PARENTS', 'ZONE1', 'NABWERU', '756111222', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_teachers`
--

CREATE TABLE `group_teachers` (
  `id` int(11) NOT NULL auto_increment,
  `teacher` varchar(500) NOT NULL,
  `level` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `contact2` varchar(500) NOT NULL,
  `contact3` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_teachers`
--

INSERT INTO `group_teachers` (`id`, `teacher`, `level`, `subject`, `contact`, `contact2`, `contact3`) VALUES
(1, 'KIVIRI ERIC', 'O LEVEL', 'PHYSICS', '753674531', '', ''),
(2, 'NDAGIRE OLIVER', 'PRIMARY', 'SST', '778682257', '', ''),
(3, 'KIZITO DAN', 'A LEVEL', 'CHEMISTRY', '755333456', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_university`
--

CREATE TABLE `group_university` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group_university`
--

INSERT INTO `group_university` (`id`, `name`, `contact`) VALUES
(1, 'NANYANZI MAGRATE', '753957165');
