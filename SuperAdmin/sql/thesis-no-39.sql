-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 09:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `filipatrol36`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL DEFAULT 'first_name',
  `last_name` varchar(100) NOT NULL DEFAULT 'last_name',
  `middle_name` varchar(100) DEFAULT 'middle_name',
  `email_address` varchar(100) NOT NULL,
  `mobile_no` varchar(11) NOT NULL DEFAULT '00000000000',
  `country` varchar(100) NOT NULL DEFAULT 'country',
  `region` varchar(20) NOT NULL DEFAULT 'region',
  `province` varchar(100) NOT NULL DEFAULT 'province',
  `city` varchar(100) NOT NULL DEFAULT 'city',
  `com_code` varchar(255) DEFAULT NULL,
  `status` enum('approved','pending','blocked') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `first_name`, `last_name`, `middle_name`, `email_address`, `mobile_no`, `country`, `region`, `province`, `city`, `com_code`, `status`) VALUES
(00000000001, 'des', 'e10adc3949ba59abbe56e057f20f883e', 'Desiree', 'Gatchalian', 'Da', 'dhes.gatchalian@gmail.com', '09123456789', 'Philippines', 'NCR', 'Metro Manila', 'Paranaque City', NULL, 'blocked'),
(00000000017, 'ryan', 'e10adc3949ba59abbe56e057f20f883e', 'first_name', 'last_name', 'middle_name', 'fryanchristian@gmail.com', '00000000000', 'country', 'region', 'province', 'city', '9e6c910f173087a4660656b3f6307835', 'approved'),
(00000000018, 'ren', 'e10adc3949ba59abbe56e057f20f883e', 'first_name', 'last_name', 'middle_name', 'superrylai@gmail.com', '00000000000', 'country', 'region', 'province', 'city', '9dd6fb5d8d44270e970fd821e3426870', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `active_admin`
--

CREATE TABLE IF NOT EXISTS `active_admin` (
  `username` varchar(20) NOT NULL,
  `time_visited` int(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_admin`
--

INSERT INTO `active_admin` (`username`, `time_visited`) VALUES
('admin', 1486621839);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `govt_agency` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `govt_agency`) VALUES
(00000000001, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Desiree', 'Gatchalian', 'dhes.gatchalian@gmail.com', 'DepEd');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE IF NOT EXISTS `alert` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `alert_title` varchar(30) NOT NULL,
  `alert_msg` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `date_issued` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `alert_title`, `alert_msg`, `image`, `country`, `region`, `province`, `city`, `date_issued`) VALUES
(00000000002, 'Special Holiday on January 9', 'The city government of Manila has declared January 9 as a holiday in celebration of the Feast of the Black Nazarene, according to the city tourism office.', NULL, 'Philippines', 'NCR', 'Metro Manila', 'Manila', '2017-01-26 21:57:27'),
(00000000003, 'Davao City Day', 'March 16 of every year is a Special Non-Working Public Holiday in Davao City in celebration of Araw ng Dabaw ', NULL, 'Philippines', 'Region 11', '', '', '2017-01-18 13:09:05'),
(00000000007, 'Manila Day', 'June 24 has been declared a special non-working holiday in accordance to the celebration of its 446th foundation anniversary (locally referred to as Araw ng Maynila).', NULL, 'Philippines', 'NCR', 'Metro Manila', 'Manila', '2017-01-18 13:38:09'),
(00000000008, 'Quezon City Day', ' Every 19th of August is declared a special nonworking public holiday in Quezon City', NULL, 'Philippines', 'NCR', 'Metro Manila', 'Quezon City', '2017-01-18 13:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE IF NOT EXISTS `chat_rooms` (
  `chat_room_id` int(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unattended',
  PRIMARY KEY (`chat_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=189 ;

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE IF NOT EXISTS `concern` (
  `concern_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `concern_title` varchar(100) NOT NULL,
  `concern_msg` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `govt_agency_recepient` varchar(50) NOT NULL,
  `message_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`concern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `username`, `concern_title`, `concern_msg`, `image`, `govt_agency_recepient`, `message_date`, `status`) VALUES
(00000000031, 'des', 'Free Education in State Universities and Colleges', 'Is it already approved? When will it be implemented? Thank you!', '', 'DepEd', '2017-01-18 12:30:43', 'replied'),
(00000000032, 'des', 'SSS Registration', 'I was thinking to register for SSS. However, I would like to know the requirements and the procedure before going to an SSS branch. I hope you reply the soonest. Thank you!', '', 'SSS', '2017-01-18 12:44:41', 'unreplied'),
(00000000033, 'des', 'Getting Voters ID', ' I registered last year as a voter here at Paranaque City. How can I know if I can claim the ID already?', '', 'COMELEC', '2017-01-18 20:10:44', 'unreplied'),
(00000000034, 'des', 'Do NSO birth certificates expire?', 'I went to Reli Tours Agency today in SM Southmall to apply for a Japan Tourist Visa, however the lady at the agency said my NSO is no longer valid and that I need to request for a new one.', '', 'NSO', '2017-01-18 20:19:21', 'unreplied'),
(00000000039, 'des', 'Road Repair taking 6 months already', ' This road repair on Purok 4, Brgy. Lag-on, Camarines Norte was started July last year. However, we have observed that there are no longer workers on the area anymore since last month.', '571ba72c54689cf396417c8077e55252road.jpg', 'DPWH', '2017-01-21 19:58:53', 'replied'),
(00000000041, 'des', 'Dayaan sa Eleksyon', 'Dayaan noong eleksyon.', '', 'COMELEC', '2017-02-08 14:35:05', 'unreplied'),
(00000000042, 'des', 'Illegal mining on mountains', 'Illegal mining on mountains of Palawan', '8fd6db0e9b101326bc6b3c3bb959294c10299998_10202209588708062_1750999122905178899_n.jpg', 'DENR', '2017-02-08 14:38:05', 'unreplied');

-- --------------------------------------------------------

--
-- Table structure for table `concern_response`
--

CREATE TABLE IF NOT EXISTS `concern_response` (
  `response_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `response_msg` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `message_date` datetime NOT NULL,
  `concern_id` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`response_id`),
  KEY `concern_id` (`concern_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `concern_response`
--

INSERT INTO `concern_response` (`response_id`, `response_msg`, `image`, `message_date`, `concern_id`) VALUES
(00000000012, ' Hi! Thank you for sending your concern to us. We have already reached the contractor of the project on your area and the repair would continue next week.', '', '2017-01-21 20:14:17', 00000000039),
(00000000023, 'Yes, students may enroll next semester to any State Universities and Colleges tuition-free.', '', '2017-01-26 21:38:10', 00000000031);

-- --------------------------------------------------------

--
-- Table structure for table `geography`
--

CREATE TABLE IF NOT EXISTS `geography` (
  `id` int(3) unsigned zerofill NOT NULL,
  `region` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geography`
--

INSERT INTO `geography` (`id`, `region`, `province`, `city`) VALUES
(001, 'Region 1', 'Ilocos Norte', 'Laoag'),
(002, 'Region 1', 'Ilocos Sur', 'Candon'),
(003, 'Region 1', 'Ilocos Sur', 'Vigan'),
(004, 'Region 1', 'La Union', 'null'),
(005, 'Region 1', 'Pangasinan', 'Alaminos'),
(006, 'Region 1', 'Pangasinan', 'Dagupan'),
(007, 'Region 1', 'Pangasinan', 'San Carlos'),
(008, 'Region 1', 'Pangasinan', 'Urdaneta'),
(009, 'Region 2', 'Batanes', 'null'),
(010, 'Region 2', 'Cagayan', 'null'),
(011, 'Region 2', 'Isabela', 'null'),
(012, 'Region 2', 'Nueva Vizcaya', 'null'),
(013, 'Region 2', 'Quirino', 'null'),
(014, 'Region 3', 'Aurora', 'null'),
(015, 'Region 3', 'Bataan', 'null'),
(016, 'Region 3', 'Bulacan', 'null'),
(017, 'Region 3', 'Nueva Ecija', 'null'),
(018, 'Region 3', 'Pampanga', 'null'),
(019, 'Region 3', 'Tarlac', 'null'),
(020, 'Region 3', 'Zambales', 'null'),
(021, 'Region 4A', 'Batangas', 'Batangas'),
(022, 'Region 4A', 'Batangas', 'Lipa'),
(023, 'Region 4A', 'Batangas', 'Tanauan'),
(024, 'Region 4A', 'Cavite', 'Cavite'),
(025, 'Region 4A', 'Cavite', 'Dasmariñas'),
(026, 'Region 4A', 'Cavite', 'Tagaytay'),
(027, 'Region 4A', 'Cavite', 'Tagaytay'),
(028, 'Region 4A', 'Cavite', 'Trece Martires'),
(029, 'Region 4A', 'Laguna', 'Calamba'),
(030, 'Region 4A', 'Laguna', 'San Pablo'),
(031, 'Region 4A', 'Laguna', 'Santa Rosa'),
(032, 'Region 4A', 'Quezon', 'Lucena'),
(033, 'Region 4A', 'Quezon', 'Tayabas'),
(034, 'Region 4A', 'Rizal', 'Antipolo'),
(035, 'Region 4B', 'Marinduque', 'null'),
(036, 'Region 4B', 'Mindoro Occidental', 'null'),
(037, 'Region 4B', 'Mindoro Oriental', 'null'),
(038, 'Region 4B', 'Palawan', 'null'),
(039, 'Region 4B', 'Romblon', 'null'),
(040, 'Region 5', 'Albay', 'Legazpi'),
(041, 'Region 5', 'Albay', 'Ligao'),
(042, 'Region 5', 'Albay', 'Tabaco'),
(043, 'Region 5', 'Camarines Norte', 'null'),
(044, 'Region 5', 'Camarines Sur', 'Iriga'),
(045, 'Region 5', 'Camarines Sur', 'Naga'),
(046, 'Region 5', 'Catanduanes', 'null'),
(047, 'Region 5', 'Masbate', 'Masbate'),
(048, 'Region 5', 'Sorsogon', 'Sorsogon'),
(049, 'Region 6', 'Aklan', 'null'),
(050, 'Region 6', 'Antique', 'null'),
(051, 'Region 6', 'Capiz', 'null'),
(052, 'Region 6', 'Iloilo', 'null'),
(053, 'Region 6', 'Guimaras', 'null'),
(054, 'Region 7', 'Bohol', 'Tagbiliran'),
(055, 'Region 7', 'Cebu', 'Bogo'),
(056, 'Region 7', 'Cebu', 'Carcar'),
(057, 'Region 7', 'Cebu', 'Cebu'),
(058, 'Region 7', 'Cebu', 'Danao'),
(059, 'Region 7', 'Cebu', 'Danao'),
(060, 'Region 7', 'Cebu', 'Lapu-lapu'),
(061, 'Region 7', 'Cebu', 'Mandaue'),
(062, 'Region 7', 'Cebu', 'Naga'),
(063, 'Region 7', 'Cebu', 'Talisay'),
(064, 'Region 7', 'Cebu', 'Toledo'),
(065, 'Region 7', 'Siquijor', 'null'),
(066, 'Region 8', 'Biliran', 'null'),
(067, 'Region 8', 'Biliran', 'null'),
(068, 'Region 8', 'Eastern Samar', 'null'),
(069, 'Region 8', 'Leyte', 'null'),
(070, 'Region 8', 'Northern Samar', 'null'),
(071, 'Region 8', 'Samar', 'null'),
(072, 'Region 8', 'Southern Leyte', 'null'),
(073, 'Region 9', 'Zamboanga Del Norte', 'Dapitan'),
(074, 'Region 9', 'Zamboanga Del Norte', 'Dipolog'),
(075, 'Region 9', 'Basilan', 'Isabela'),
(076, 'Region 9', 'Zamboanga Sibugay', 'null'),
(077, 'Region 9', 'Zamboanga City', 'null'),
(078, 'Region 10', 'Bukidnon', 'Malaybalay'),
(079, 'Region 10', 'Bukidnon', 'Valencia'),
(080, 'Region 10', 'Camiguin', 'null'),
(081, 'Region 10', 'Lanao del Norte', 'null'),
(082, 'Region 10', 'Misamis Occidental', 'null'),
(083, 'Region 10', 'Misamis Oriental', 'null'),
(084, 'Region 11', 'Compostela Valley', 'null'),
(085, 'Region 11', 'Davao del Norte', 'null'),
(086, 'Region 11', 'Davao del Sur', 'null'),
(087, 'Region 11', 'null', 'Davao City'),
(088, 'Region 11', 'Davao Occidental', 'null'),
(089, 'Region 11', 'Davao Oriental', 'null'),
(090, 'Region 12', 'Cotabato', 'Cotabato'),
(091, 'Region 12', 'South Cotabato', 'null'),
(092, 'Region 12', 'Sultan Kudarat', 'null'),
(093, 'Region 12', 'Sarangani', 'null'),
(094, 'Region 13', 'Agusan del Norte', 'null'),
(095, 'Region 13', 'Agusan del Sur', 'null'),
(096, 'Region 13', 'Surigao del Norte', 'null'),
(097, 'Region 13', 'Surigao del Sur', 'null'),
(098, 'Region 13', 'Dinagat Island', 'null'),
(099, 'Region 14', 'Abra', 'null'),
(100, 'Region 14', 'Apayao', 'null'),
(101, 'Region 14', 'Benguet', 'null'),
(102, 'Region 14', 'Ifugao', 'null'),
(103, 'Region 14', 'Kalinga', 'null'),
(104, 'Region 14', 'Mountain province', 'null'),
(105, 'Region 15', 'Basilan', 'Lamitan'),
(106, 'Region 15', 'Lanao del Sur', 'Marawi'),
(107, 'Region 15', 'Maguindanao', 'null'),
(108, 'Region 15', 'Sulu', 'null'),
(109, 'Region 15', 'Tawi-tawi', 'null'),
(110, 'NCR', 'Metro Manila', 'Caloocan'),
(111, 'NCR', 'Metro Manila', 'Las Piñas'),
(112, 'NCR', 'Metro Manila', 'Makati'),
(113, 'NCR', 'Metro Manila', 'Malabon'),
(114, 'NCR', 'Metro Manila', 'Mandaluyong'),
(115, 'NCR', 'Metro Manila', 'Manila'),
(116, 'NCR', 'Metro Manila', 'Marikina'),
(117, 'NCR', 'Metro Manila', 'Muntinlupa'),
(118, 'NCR', 'Metro Manila', 'Navotas'),
(119, 'NCR', 'Metro Manila', 'Paranaque'),
(120, 'NCR', 'Metro Manila', 'Pasay'),
(121, 'NCR', 'Metro Manila', 'Pasig'),
(122, 'NCR', 'Metro Manila', 'Pateros'),
(123, 'NCR', 'Metro Manila', 'Quezon City'),
(124, 'NCR', 'Metro Manila', 'San Juan'),
(125, 'NCR', 'Metro Manila', 'Taguig');

-- --------------------------------------------------------

--
-- Table structure for table `govt_agency`
--

CREATE TABLE IF NOT EXISTS `govt_agency` (
  `id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `agency_name` varchar(50) NOT NULL,
  `agency_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agency` (`agency_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `govt_agency`
--

INSERT INTO `govt_agency` (`id`, `agency_name`, `agency_desc`) VALUES
(001, 'Office of the President', ''),
(002, 'Supreme Court of the Philippines', ''),
(003, 'Senate of the Philippines', ''),
(004, 'House of Representatives', ''),
(005, 'CSC', ''),
(006, 'COA', 'Commission on Audit'),
(007, 'COMELEC', 'Commision on Elections'),
(008, 'DA', 'Department of Agriculture'),
(009, 'DAR', 'Department of Agrarian Reform'),
(010, 'DBM', 'Department of budget Management'),
(011, 'DepEd', 'Department of Education'),
(012, 'DOE', 'Department of Energy'),
(013, 'DENR', ''),
(014, 'DOF', ''),
(015, 'DFA', ''),
(016, 'DOH', ''),
(017, 'DILG', ''),
(018, 'DOJ', ''),
(019, 'DOLE', ''),
(020, 'DND', ''),
(021, 'DPWH', ''),
(022, 'DOST', ''),
(023, 'DSWD', ''),
(024, 'DOT', ''),
(025, 'DTI', ''),
(026, 'DOTC', ''),
(027, 'AFP', 'Armed Forces of the Philippines'),
(028, 'PAF', ''),
(029, 'PA', ''),
(030, 'PN', ''),
(031, 'BSP', ''),
(032, 'CESB', ''),
(033, 'DAP', ''),
(034, 'DBP', ''),
(035, 'GSIS', ''),
(036, 'LBP', ''),
(037, 'NCC', ''),
(038, 'NCDA', ''),
(039, 'NEDA', ''),
(040, 'NFA', ''),
(041, 'NAMRIA', ''),
(042, 'NSCB', ''),
(043, 'NSO', ''),
(044, 'NTC', ''),
(045, 'OWWA', ''),
(046, 'PhilHealth', ''),
(047, 'SEC', ''),
(048, 'SSS', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `action` varchar(30) NOT NULL,
  `object_id` int(11) unsigned zerofill DEFAULT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=267 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `action`, `object_id`, `datetime`) VALUES
(00000000100, 'admin', 'logs in', NULL, '2017-01-30 20:01:04'),
(00000000101, 'admin', 'edits admin profile', 00000000006, '2017-01-30 20:13:15'),
(00000000102, 'admin', 'deletes admin', 00000000006, '2017-01-30 21:04:58'),
(00000000103, 'admin', 'deletes admin', 00000000006, '2017-01-30 21:05:53'),
(00000000104, 'admin', 'logs out', NULL, '2017-01-30 21:16:38'),
(00000000105, 'admin', 'logs in', NULL, '2017-01-30 21:21:42'),
(00000000106, 'admin', 'logs out', NULL, '2017-01-30 21:26:20'),
(00000000107, 'admin', 'logs in', NULL, '2017-01-31 21:56:52'),
(00000000108, 'admin', 'logs out', NULL, '2017-01-31 22:31:54'),
(00000000109, 'admin', 'logs in', NULL, '2017-01-31 22:32:09'),
(00000000110, 'admin', 'logs out', NULL, '2017-01-31 22:58:00'),
(00000000111, 'admin', 'adds admin', 00000000002, '2017-02-03 01:29:05'),
(00000000112, 'admin', 'adds admin', 00000000000, '2017-02-03 01:30:13'),
(00000000113, 'admin', 'deletes admin', 00000000002, '2017-02-03 01:30:43'),
(00000000114, 'admin', 'logs in', NULL, '2017-02-03 15:38:50'),
(00000000115, 'admin', 'adds admin', 00000000002, '2017-02-03 15:50:39'),
(00000000116, 'admin', 'logs out', NULL, '2017-02-03 15:56:00'),
(00000000117, 'admin', 'logs in', NULL, '2017-02-03 15:56:20'),
(00000000118, 'admin', 'logs out', NULL, '2017-02-03 15:56:23'),
(00000000119, 'admin', 'logs in', NULL, '2017-02-03 15:57:08'),
(00000000120, 'admin', 'adds admin', 00000000003, '2017-02-03 16:01:07'),
(00000000121, 'admin', 'deletes admin', 00000000003, '2017-02-03 16:01:31'),
(00000000122, 'admin', 'adds admin', 00000000004, '2017-02-03 16:02:45'),
(00000000123, 'admin', 'adds admin', 00000000005, '2017-02-03 16:07:05'),
(00000000124, 'admin', 'deletes admin', 00000000005, '2017-02-03 16:07:27'),
(00000000125, 'admin', 'deletes admin', 00000000005, '2017-02-03 16:12:08'),
(00000000126, 'admin', 'deletes admin', 00000000005, '2017-02-03 16:12:43'),
(00000000127, 'admin', 'deletes admin', 00000000004, '2017-02-03 16:12:54'),
(00000000128, 'admin', 'logs out', NULL, '2017-02-03 16:14:02'),
(00000000129, 'admin', 'logs in', NULL, '2017-02-03 16:18:33'),
(00000000130, 'admin', 'replies to concern', 00000000040, '2017-02-03 16:29:33'),
(00000000131, 'admin', 'deletes admin', 00000000002, '2017-02-03 17:13:38'),
(00000000132, 'admin', 'deletes admin', 00000000002, '2017-02-03 17:13:44'),
(00000000133, 'admin', 'deletes admin', 00000000002, '2017-02-03 17:13:51'),
(00000000134, 'admin', 'adds admin', 00000000000, '2017-02-03 18:31:11'),
(00000000135, 'admin', 'adds admin', 00000000000, '2017-02-03 18:41:16'),
(00000000136, 'admin', 'adds admin', 00000000000, '2017-02-03 18:42:16'),
(00000000137, 'admin', 'adds admin', 00000000000, '2017-02-03 18:53:16'),
(00000000138, 'admin', 'adds admin', 00000000000, '2017-02-03 19:11:52'),
(00000000139, 'admin', 'adds admin', 00000000049, '2017-02-03 19:19:15'),
(00000000140, 'admin', 'edits admin profile', 00000000027, '2017-02-03 19:54:20'),
(00000000141, 'admin', 'deletes admin', 00000000049, '2017-02-03 19:54:32'),
(00000000142, 'admin', 'edits admin profile', 00000000027, '2017-02-03 20:27:02'),
(00000000143, 'admin', 'adds admin', 00000000050, '2017-02-03 20:30:04'),
(00000000144, 'admin', 'deletes admin', 00000000050, '2017-02-03 20:30:23'),
(00000000145, 'admin', 'logs in', NULL, '2017-02-03 20:46:35'),
(00000000146, 'admin', 'logs in', NULL, '2017-02-03 21:07:39'),
(00000000147, 'admin', 'blocks user', 00000000017, '2017-02-03 21:22:48'),
(00000000148, 'admin', 'adds admin', 00000000051, '2017-02-03 21:26:31'),
(00000000149, 'admin', 'deletes admin', 00000000051, '2017-02-03 21:26:41'),
(00000000150, 'admin', 'blocks user', 00000000001, '2017-02-03 21:45:13'),
(00000000151, 'admin', 'blocks user', 00000000017, '2017-02-03 21:45:19'),
(00000000152, '', 'blocks user', 00000000017, '2017-02-03 21:58:26'),
(00000000153, 'admin', 'logs in', NULL, '2017-02-03 21:58:33'),
(00000000154, 'admin', 'blocks user', 00000000018, '2017-02-03 21:58:45'),
(00000000155, 'admin', 'blocks user', 00000000018, '2017-02-03 21:58:51'),
(00000000156, 'admin', 'blocks user', 00000000018, '2017-02-03 22:00:00'),
(00000000157, 'admin', 'blocks user', 00000000017, '2017-02-03 22:00:05'),
(00000000158, 'admin', 'blocks user', 00000000017, '2017-02-03 22:02:15'),
(00000000159, 'admin', 'blocks user', 00000000017, '2017-02-03 22:02:44'),
(00000000160, 'admin', 'blocks user', 00000000017, '2017-02-03 22:02:47'),
(00000000161, 'admin', 'blocks user', 00000000017, '2017-02-03 22:03:18'),
(00000000162, 'admin', 'blocks user', 00000000017, '2017-02-03 22:03:22'),
(00000000163, 'admin', 'blocks user', 00000000017, '2017-02-03 22:03:23'),
(00000000164, 'admin', 'blocks user', 00000000017, '2017-02-03 22:03:25'),
(00000000165, 'admin', 'blocks user', 00000000017, '2017-02-03 22:03:27'),
(00000000166, 'admin', 'blocks user', 00000000018, '2017-02-03 22:03:37'),
(00000000167, 'admin', 'blocks user', 00000000001, '2017-02-03 22:03:42'),
(00000000168, 'admin', 'blocks user', 00000000001, '2017-02-03 22:03:58'),
(00000000169, 'admin', 'blocks user', 00000000001, '2017-02-03 22:03:59'),
(00000000170, 'admin', 'blocks user', 00000000001, '2017-02-03 22:04:48'),
(00000000171, 'admin', 'blocks user', 00000000018, '2017-02-03 22:04:57'),
(00000000172, 'admin', 'blocks user', 00000000018, '2017-02-03 22:07:32'),
(00000000173, 'admin', 'blocks user', 00000000001, '2017-02-03 22:07:38'),
(00000000174, 'admin', 'blocks user', 00000000018, '2017-02-03 22:07:42'),
(00000000175, 'admin', 'blocks user', 00000000018, '2017-02-03 22:09:19'),
(00000000176, 'admin', 'blocks user', 00000000018, '2017-02-03 22:09:21'),
(00000000177, 'admin', 'blocks user', 00000000018, '2017-02-03 22:09:25'),
(00000000178, 'admin', 'blocks user', 00000000017, '2017-02-03 22:09:29'),
(00000000179, 'admin', 'blocks user', 00000000017, '2017-02-03 22:10:06'),
(00000000180, 'admin', 'blocks user', 00000000017, '2017-02-03 22:11:32'),
(00000000181, 'admin', 'blocks user', 00000000001, '2017-02-03 22:12:02'),
(00000000182, 'admin', 'blocks user', 00000000018, '2017-02-03 22:12:09'),
(00000000183, 'admin', 'blocks user', 00000000018, '2017-02-03 22:12:22'),
(00000000184, 'admin', 'blocks user', 00000000017, '2017-02-03 22:12:25'),
(00000000185, 'admin', 'blocks user', 00000000017, '2017-02-03 22:13:59'),
(00000000186, 'admin', 'blocks user', 00000000017, '2017-02-03 22:14:02'),
(00000000187, 'admin', 'blocks user', 00000000017, '2017-02-03 22:14:22'),
(00000000188, 'admin', 'blocks user', 00000000001, '2017-02-03 22:14:27'),
(00000000189, 'admin', 'blocks user', 00000000018, '2017-02-03 22:14:30'),
(00000000190, 'admin', 'blocks user', 00000000018, '2017-02-03 22:15:45'),
(00000000191, 'admin', 'blocks user', 00000000018, '2017-02-03 22:15:49'),
(00000000192, 'admin', 'blocks user', 00000000001, '2017-02-03 22:16:07'),
(00000000193, 'admin', 'blocks user', 00000000018, '2017-02-03 22:16:10'),
(00000000194, 'admin', 'blocks user', 00000000018, '2017-02-03 22:16:40'),
(00000000195, 'admin', 'blocks user', 00000000018, '2017-02-03 22:16:44'),
(00000000196, 'admin', 'blocks user', 00000000018, '2017-02-03 22:19:15'),
(00000000197, 'admin', 'blocks user', 00000000001, '2017-02-03 22:19:20'),
(00000000198, 'admin', 'blocks user', 00000000001, '2017-02-03 22:19:25'),
(00000000199, 'admin', 'blocks user', 00000000001, '2017-02-03 22:19:29'),
(00000000200, 'admin', 'blocks user', 00000000001, '2017-02-03 22:20:06'),
(00000000201, 'admin', 'blocks user', 00000000001, '2017-02-03 22:20:57'),
(00000000202, 'admin', 'blocks user', 00000000001, '2017-02-03 22:21:02'),
(00000000203, 'admin', 'blocks user', 00000000001, '2017-02-03 22:21:07'),
(00000000204, 'admin', 'blocks user', 00000000018, '2017-02-03 22:21:10'),
(00000000205, 'admin', 'blocks user', 00000000018, '2017-02-03 22:21:16'),
(00000000206, 'admin', 'blocks user', 00000000017, '2017-02-03 22:21:19'),
(00000000207, 'admin', 'blocks user', 00000000017, '2017-02-03 22:21:24'),
(00000000208, 'admin', 'logs in', NULL, '2017-02-04 22:14:52'),
(00000000209, '', 'logs out', NULL, '2017-02-04 22:27:30'),
(00000000210, '', 'logs out', NULL, '2017-02-04 22:27:33'),
(00000000211, 'admin', 'logs in', NULL, '2017-02-04 22:27:59'),
(00000000212, 'admin', 'logs out', NULL, '2017-02-04 22:28:29'),
(00000000213, 'admin', 'logs in', NULL, '2017-02-05 16:52:47'),
(00000000214, 'admin', 'logs out', NULL, '2017-02-05 22:13:26'),
(00000000215, 'admin', 'logs in', NULL, '2017-02-08 13:45:15'),
(00000000216, 'admin', 'blocks user', 00000000017, '2017-02-08 13:45:39'),
(00000000217, 'admin', 'blocks user', 00000000017, '2017-02-08 13:45:44'),
(00000000218, 'admin', 'blocks user', 00000000018, '2017-02-08 13:45:48'),
(00000000219, 'admin', 'adds admin', 00000000002, '2017-02-08 14:11:04'),
(00000000220, 'des', 'logs out', NULL, '2017-02-08 17:50:06'),
(00000000221, 'admin', 'logs in', NULL, '2017-02-08 17:50:44'),
(00000000222, 'admin', 'blocks user', 00000000001, '2017-02-08 18:24:49'),
(00000000223, 'admin', 'blocks user', 00000000017, '2017-02-08 18:24:57'),
(00000000224, 'admin', 'blocks user', 00000000017, '2017-02-08 18:25:04'),
(00000000225, 'admin', 'blocks user', 00000000017, '2017-02-08 18:25:47'),
(00000000226, 'admin', 'blocks user', 00000000017, '2017-02-08 18:26:27'),
(00000000227, 'admin', 'blocks user', 00000000001, '2017-02-08 18:29:36'),
(00000000228, 'admin', 'blocks user', 00000000017, '2017-02-08 18:29:40'),
(00000000229, 'admin', 'blocks user', 00000000017, '2017-02-08 18:31:31'),
(00000000230, 'admin', 'blocks user', 00000000001, '2017-02-08 18:31:35'),
(00000000231, 'admin', 'blocks user', 00000000001, '2017-02-08 18:32:12'),
(00000000232, 'admin', 'blocks user', 00000000001, '2017-02-08 18:32:18'),
(00000000233, 'admin', 'blocks user', 00000000001, '2017-02-08 18:32:23'),
(00000000234, 'admin', 'logs in', NULL, '2017-02-08 18:56:03'),
(00000000235, 'admin', 'logs out', NULL, '2017-02-08 18:59:39'),
(00000000236, 'admin', 'logs in', NULL, '2017-02-08 18:59:49'),
(00000000237, 'admin', 'logs out', NULL, '2017-02-08 19:00:02'),
(00000000238, 'admin', 'logs in', NULL, '2017-02-08 19:00:21'),
(00000000239, 'admin', 'logs in', NULL, '2017-02-08 19:34:10'),
(00000000240, 'admin', 'logs out', NULL, '2017-02-08 19:39:04'),
(00000000241, 'Admin', 'logs in', NULL, '2017-02-08 19:39:47'),
(00000000242, 'Admin', 'logs out', NULL, '2017-02-08 19:40:02'),
(00000000243, 'admin', 'logs in', NULL, '2017-02-08 19:41:48'),
(00000000244, 'admin', 'logs out', NULL, '2017-02-08 19:42:10'),
(00000000245, 'admin', 'logs in', NULL, '2017-02-08 19:49:10'),
(00000000246, 'admin', 'logs out', NULL, '2017-02-08 19:50:46'),
(00000000247, 'superadmin', 'logs in', NULL, '2017-02-08 19:50:53'),
(00000000248, 'superadmin', 'logs out', NULL, '2017-02-08 19:52:50'),
(00000000249, 'superadmin', 'logs in', NULL, '2017-02-08 19:52:54'),
(00000000250, 'superadmin', 'logs out', NULL, '2017-02-08 20:01:09'),
(00000000251, 'superadmin', 'logs in', NULL, '2017-02-08 20:01:23'),
(00000000252, 'admin', 'logs in', NULL, '2017-02-08 20:44:04'),
(00000000253, 'admin', 'logs out', NULL, '2017-02-08 20:49:57'),
(00000000254, '', 'logs out', NULL, '2017-02-08 20:50:34'),
(00000000255, 'admin', 'logs in', NULL, '2017-02-09 11:24:20'),
(00000000256, 'admin', 'logs out', NULL, '2017-02-09 11:37:27'),
(00000000257, 'superadmin', 'logs in', NULL, '2017-02-09 11:37:53'),
(00000000258, 'superadmin', 'logs out', NULL, '2017-02-09 13:00:23'),
(00000000259, 'admin', 'logs in', NULL, '2017-02-09 13:00:31'),
(00000000260, 'admin', 'logs in', NULL, '2017-02-09 13:06:47'),
(00000000261, 'admin', 'logs out', NULL, '2017-02-09 13:11:14'),
(00000000262, 'admin', 'logs in', NULL, '2017-02-09 13:11:28'),
(00000000263, 'admin', 'logs out', NULL, '2017-02-09 13:21:36'),
(00000000264, 'superadmin', 'logs in', NULL, '2017-02-09 13:22:01'),
(00000000265, 'superadmin', 'logs out', NULL, '2017-02-09 14:11:42'),
(00000000266, 'admin', 'logs in', NULL, '2017-02-09 14:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `chat_room_id` int(20) unsigned zerofill NOT NULL,
  `username` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `chat_room_id` (`chat_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE IF NOT EXISTS `super_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'superadmin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ryan Christian', 'Fernandez', 'fryanchristian@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
