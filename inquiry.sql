-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2017 at 05:17 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inquiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `branch_id` int(11) unsigned zerofill NOT NULL,
  `department_id` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `first_name`, `last_name`, `branch_id`, `department_id`) VALUES
(00000000008, 'desiree', '5f4dcc3b5aa765d61d8327deb882cf99', 'desiree', 'gatch', 00000000001, 00000000002);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `answer` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `description`) VALUES
(00000000001, 'TUP Manila', 'Ermita, Manila'),
(00000000002, 'TUP Cavite', 'Dasmarinas, Cavite'),
(00000000003, 'TUP Visayas', 'Talisay City, Visayas'),
(00000000004, 'TUP Taguig', 'Western Bicutan, Taguig'),
(00000000005, 'TUP Quezon', 'Lopez, Quezon'),
(00000000006, 'TUP Cuenca', 'Cuenca, Batangas');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) unsigned zerofill NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `branch_id`, `name`, `description`) VALUES
(00000000001, 00000000001, 'Registrar', '   '),
(00000000002, 00000000001, 'Office of Student Affairs', 'Along CLA Lobby in front of University Student Government'),
(00000000003, 00000000001, 'Admission Office', 'Along CLA Lobby beside Office of Student Affairs'),
(00000000004, 00000000001, 'University Library', 'In front of University Canteen'),
(00000000005, 00000000001, 'TUP Museum', 'Along CLA Lobby in front of English Department'),
(00000000006, 00000000001, 'University Student Government', 'Along CLA Lobby in front of Office of Student Affairs'),
(00000000007, 00000000001, 'Cashier', 'Beside Accounting'),
(00000000008, 00000000001, 'Accounting', 'Beside Cashier'),
(00000000009, 00000000001, 'ROTC Office', 'Below of University stage '),
(00000000010, 00000000001, 'Alumni Office Affairs', ''),
(00000000011, 00000000001, 'Artisan', 'Along CLA Lobby'),
(00000000012, 00000000001, 'Clinic', 'Along CLA Lobby'),
(00000000013, 00000000001, 'University Information Technology Center', 'Inside of College of Information Technology 1st floor'),
(00000000014, 00000000001, 'Information Technology Development Center', 'Along CLA Lobby in front of Admission Office'),
(00000000015, 00000000001, 'Integrated Research and Training Center', 'Beside of College of Engineering'),
(00000000016, 00000000002, 'Registrar', ''),
(00000000017, 00000000002, 'Office of Student Affairs', ''),
(00000000018, 00000000002, 'Admission Office', ''),
(00000000019, 00000000002, 'University Library', ''),
(00000000020, 00000000002, 'University Student Government', ''),
(00000000021, 00000000002, 'Cashier', ''),
(00000000022, 00000000002, 'Accounting', ''),
(00000000023, 00000000002, 'Alumni Office Affairs', ''),
(00000000024, 00000000002, 'Artisan', ''),
(00000000025, 00000000002, 'Clinic', ''),
(00000000026, 00000000003, 'Registrar', ''),
(00000000027, 00000000003, 'Office of Student Affairs', ''),
(00000000028, 00000000003, 'Admission Office', ''),
(00000000029, 00000000003, 'University Library', ''),
(00000000030, 00000000003, 'University Student Government', ''),
(00000000031, 00000000003, 'Cashier', ''),
(00000000032, 00000000003, 'Accounting', ''),
(00000000033, 00000000002, 'Alumni Office Affairs', ''),
(00000000034, 00000000002, 'Artisan', ''),
(00000000035, 00000000003, 'Clinic', ''),
(00000000036, 00000000004, 'Registrar', ''),
(00000000037, 00000000004, 'Office of Student Affairs', ''),
(00000000038, 00000000004, 'Admission Office', ''),
(00000000039, 00000000004, 'University Library', ''),
(00000000040, 00000000004, 'University Student Government', ''),
(00000000041, 00000000004, 'Cashier', ''),
(00000000042, 00000000004, 'Accounting', ''),
(00000000043, 00000000004, 'Alumni Office Affairs', ''),
(00000000044, 00000000004, 'Artisan', ''),
(00000000045, 00000000004, 'Clinic', ''),
(00000000046, 00000000005, 'Registrar', ''),
(00000000047, 00000000005, 'Office of Student Affairs', ''),
(00000000048, 00000000005, 'Admission Office', ''),
(00000000049, 00000000005, 'University Library', ''),
(00000000050, 00000000005, 'University Student Government', ''),
(00000000051, 00000000005, 'Cashier', ''),
(00000000052, 00000000005, 'Accounting', ''),
(00000000053, 00000000005, 'Alumni Office Affairs', ''),
(00000000054, 00000000005, 'Artisan', ''),
(00000000055, 00000000005, 'Clinic', ''),
(00000000056, 00000000006, 'Registrar', ''),
(00000000057, 00000000006, 'Office of Student Affairs', ''),
(00000000058, 00000000006, 'Admission Office', ''),
(00000000059, 00000000006, 'University Library', ''),
(00000000060, 00000000006, 'University Student Government', ''),
(00000000061, 00000000006, 'Cashier', ''),
(00000000062, 00000000006, 'Accounting', ''),
(00000000063, 00000000006, 'Alumni Office Affairs', ''),
(00000000064, 00000000006, 'Artisan', ''),
(00000000065, 00000000006, 'Clinic', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `action` varchar(50) NOT NULL,
  `object_id` int(11) unsigned zerofill DEFAULT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `action`, `object_id`, `datetime`) VALUES
(00000000047, 'superadmin', 'logs in', NULL, '2017-02-25 11:36:19'),
(00000000048, 'superadmin', 'adds superadmin', 00000000007, '2017-02-25 11:54:38'),
(00000000049, 'superadmin', 'edits superadmin', 00000000007, '2017-02-25 11:56:54'),
(00000000054, 'superadmin', 'adds operator', 00000000009, '2017-02-25 12:02:27'),
(00000000055, 'superadmin', 'deletes admin', 00000000009, '2017-02-25 12:02:45'),
(00000000057, 'superadmin', 'deletes superadmin', 00000000006, '2017-02-25 12:04:36'),
(00000000058, 'superadmin', 'edits admin profile', 00000000008, '2017-02-25 12:06:55'),
(00000000059, 'superadmin', 'adds branch', 00000000009, '2017-02-25 12:08:45'),
(00000000061, 'superadmin', 'edits branch', 00000000009, '2017-02-25 12:12:02'),
(00000000062, 'superadmin', 'deletes branch', 00000000009, '2017-02-25 12:12:42'),
(00000000063, 'superadmin', 'adds department', 00000000069, '2017-02-25 12:13:25'),
(00000000064, 'superadmin', 'edits department', 00000000069, '2017-02-25 12:14:46'),
(00000000065, 'superadmin', 'deletes department', 00000000069, '2017-02-25 12:15:19'),
(00000000066, 'superadmin', 'logs out', NULL, '2017-02-25 12:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `branch_id` int(11) unsigned zerofill NOT NULL,
  `department_id` int(11) unsigned zerofill NOT NULL,
  `answer_id` int(11) unsigned zerofill DEFAULT NULL,
  `date_submitted` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_id` (`answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `branch_id`, `department_id`, `answer_id`, `date_submitted`) VALUES
(00000000011, 'Pwede po ba pumasok sa TUP Museum?', 'Tanong ko lang po kung pwede po pumasok sa TUP Museum. Curious lang po ako. Thanks!', 00000000001, 00000000005, NULL, '2017-01-02 22:09:21'),
(00000000012, 'School Year 2017-2018 Enrolment', 'Kailan po yung enrolment next sem? Salamat po!', 00000000002, 00000000018, NULL, '2017-02-21 22:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE IF NOT EXISTS `super_admin` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(00000000001, 'superadmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Des', 'Gatch', 'gatchie@gmail.com'),
(00000000003, 'superadmin2', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ivan', 'Brizuela', 'ivan@yahoo.com'),
(00000000004, 'superadmin3', '5f4dcc3b5aa765d61d8327deb882cf99', 'Dan', 'Dadivas', 'dan@ymail.com'),
(00000000005, 'superadmin4', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ikson', 'Pancho', 'pancho@aol.com'),
(00000000007, 'nancyda', '', 'NancyB', 'DaB', 'nancy_da@gmail.comB');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `branch_id_fk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `answer_id` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
