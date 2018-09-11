-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2018 at 08:04 AM
-- Server version: 5.5.44-37.3-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websysc_RRsofT`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `institute_type_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `institute_type_id`, `pid`, `ins_id`, `course_name`, `doj`) VALUES
(1, 0, 0, 1, 'MBA', '2017-12-12'),
(2, 0, 1, 1, 'First Year', '2017-12-12'),
(3, 0, 1, 1, 'Second Year', '2017-12-12'),
(4, 0, 0, 5, 'Class KG', '2017-12-15'),
(5, 0, 0, 0, 'history', '2017-12-15'),
(6, 0, 0, 0, 'bio', '2017-12-15'),
(7, 0, 0, 0, 'Physical science', '2017-12-15'),
(8, 0, 0, 0, 'wrhsf_____       ', '2017-12-15'),
(9, 0, 0, 0, 'dhbzd', '2017-12-15'),
(10, 0, 0, 0, 'Science', '2017-12-15'),
(11, 0, 10, 0, 'Bio Science', '2017-12-15'),
(12, 0, 0, 0, 'Engineering', '2017-12-15'),
(13, 0, 12, 0, 'jjg', '2017-12-15'),
(14, 0, 0, 19, 'B.tect', '2017-12-21'),
(15, 0, 0, 19, 'M.Tech', '2017-12-21'),
(16, 0, 0, 19, 'BCA', '2017-12-21'),
(17, 0, 0, 19, 'MCA', '2017-12-21'),
(18, 0, 0, 2, 'MBA', '2017-12-21'),
(19, 0, 18, 2, '1st Year', '2017-12-21'),
(20, 0, 18, 2, '2nd Year', '2017-12-21'),
(21, 0, 0, 5, 'Standard I', '2017-12-28'),
(22, 0, 0, 26, 'Junior', '2017-12-29'),
(23, 0, 0, 26, 'Secondary', '2017-12-29'),
(24, 0, 0, 26, 'Higher Secondary', '2017-12-29'),
(25, 0, 24, 26, 'Pure Science', '2017-12-29'),
(26, 0, 24, 26, 'Bio Science', '2017-12-29'),
(27, 0, 24, 26, 'Arts', '2017-12-29'),
(28, 0, 24, 26, 'Commerce', '2017-12-29'),
(29, 0, 0, 26, 'Play School', '2017-12-29'),
(30, 0, 0, 33, 'Science', '2018-01-10'),
(31, 0, 0, 33, 'Arts', '2018-01-10'),
(32, 0, 0, 33, 'Commerce', '2018-01-10'),
(33, 0, 0, 33, 'B.Tech', '2018-01-10'),
(34, 0, 0, 33, 'M.Tech', '2018-01-10'),
(35, 0, 30, 33, 'Pure Science', '2018-01-10'),
(36, 0, 30, 33, 'Bio-Sciencce', '2018-01-10'),
(37, 0, 33, 33, 'CSE', '2018-01-10'),
(38, 0, 33, 33, 'CE', '2018-01-10'),
(39, 0, 33, 33, 'ECE', '2018-01-10'),
(40, 0, 33, 33, 'EE', '2018-01-10'),
(41, 0, 0, 40, 'class 1', '2018-02-27'),
(42, 0, 0, 5, 'class 1', '2018-03-02'),
(43, 0, 0, 5, 'class 2', '2018-03-02'),
(44, 0, 0, 41, 'Primary', '2018-03-04'),
(45, 0, 0, 41, 'Secondary', '2018-03-04'),
(46, 0, 0, 41, 'Higher Secondary', '2018-03-04'),
(47, 0, 46, 41, 'Science(BIO)', '2018-03-04'),
(48, 0, 46, 41, 'Science(Pure)', '2018-03-04'),
(49, 0, 46, 41, 'Arts', '2018-03-04'),
(50, 0, 0, 42, 'Primary', '2018-03-07'),
(51, 0, 0, 42, 'Secondary', '2018-03-07'),
(52, 0, 0, 42, 'Higher Secondary', '2018-03-07'),
(53, 0, 52, 42, 'Science', '2018-03-07'),
(54, 0, 52, 42, 'Arts', '2018-03-07'),
(55, 0, 52, 42, 'Commerce', '2018-03-07'),
(56, 0, 0, 43, 'Computer Science', '2018-03-07'),
(57, 0, 0, 43, 'Electronics', '2018-03-07'),
(58, 0, 0, 43, 'Electrical', '2018-03-07'),
(59, 1, 0, 0, 'I', '0000-00-00'),
(60, 3, 0, 0, 'Arts  ', '0000-00-00'),
(61, 3, 0, 0, 'Science', '0000-00-00'),
(62, 4, 0, 0, 'MBA', '0000-00-00'),
(63, 4, 62, 0, '1st year2', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
