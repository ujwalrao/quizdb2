-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 01:54 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` varchar(30) NOT NULL,
  `about` text,
  `name` varchar(50) NOT NULL,
  `department` varchar(10) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `about`, `name`, `department`) VALUES
('admin', 'I have ', 'mainADMIN', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `userid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `quizid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `commenttext` text NOT NULL,
  PRIMARY KEY (`questionid`,`quizid`,`commentid`),
  KEY `quizid` (`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `futurequestions`
--

CREATE TABLE IF NOT EXISTS `futurequestions` (
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `questiontext` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `noofoptions` int(11) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `option5` varchar(50) NOT NULL,
  `weight1` float NOT NULL,
  `weight2` float NOT NULL,
  `weight3` float NOT NULL,
  `weight4` float NOT NULL,
  `weight5` float NOT NULL,
  `maq` tinyint(1) NOT NULL,
  `saq` tinyint(1) NOT NULL,
  `essay` tinyint(1) NOT NULL,
  PRIMARY KEY (`quizid`,`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1447608053),
('m151115_171632_create_users_table', 1447608085),
('m151115_172001_create_users_table', 1447608085),
('m151115_172731_create_users_table', 1447608500);

-- --------------------------------------------------------

--
-- Table structure for table `presentquiz`
--

CREATE TABLE IF NOT EXISTS `presentquiz` (
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `attempted` float NOT NULL,
  `option1` tinyint(1) DEFAULT NULL,
  `option2` tinyint(1) DEFAULT NULL,
  `option3` tinyint(1) DEFAULT NULL,
  `option4` tinyint(1) DEFAULT NULL,
  `option5` tinyint(1) DEFAULT NULL,
  `essaytext` text NOT NULL,
  PRIMARY KEY (`quizid`,`questionid`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentquiz`
--

INSERT INTO `presentquiz` (`quizid`, `questionid`, `userid`, `attempted`, `option1`, `option2`, `option3`, `option4`, `option5`, `essaytext`) VALUES
(1, 1, 'student1', -1, 0, 0, 1, 1, 1, ''),
(1, 1, 'vikram', 0, 0, 0, 0, 0, 0, ''),
(1, 2, 'student1', -1, 0, 0, 0, 0, 1, ''),
(2, 1, 'ujwal', 1, 1, 0, 0, 0, 0, ''),
(2, 2, 'ujwal', 1, 0, 0, 1, 0, 0, ''),
(3, 1, 'student1', 1, 1, 0, 0, 0, 0, ''),
(3, 2, 'student1', 1, 0, 0, 0, 1, 0, ''),
(4, 1, 'student1', 1, 1, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `questiontext` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `noofoptions` int(11) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `option5` varchar(50) NOT NULL,
  `weight1` float NOT NULL,
  `weight2` float NOT NULL,
  `weight3` float NOT NULL,
  `weight4` float NOT NULL,
  `weight5` float NOT NULL,
  `maq` tinyint(1) NOT NULL,
  `saq` tinyint(1) NOT NULL,
  `essay` tinyint(1) NOT NULL,
  `solution` text NOT NULL,
  PRIMARY KEY (`quizid`,`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quizid`, `questionid`, `questiontext`, `image`, `noofoptions`, `option1`, `option2`, `option3`, `option4`, `option5`, `weight1`, `weight2`, `weight3`, `weight4`, `weight5`, `maq`, `saq`, `essay`, `solution`) VALUES
(1, 1, '<p><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">F</span><span style="font-family:mathjax_main; font-size:19.68px">(</span><span style="font-family:mathjax_math-italic; font-size:19.68px">P</span><span style="font-family:mathjax_main; font-size:19.68px">)</span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_size3; font-size:19.68px">(</span></span></span></span><span style="font-family:mathjax_math-italic; font-size:19.68px">l</span><span style="font-family:mathjax_math-italic; font-size:19.68px">e</span><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span><span style="font-family:mathjax_math-italic; font-size:19.68px">g</span><span style="font-family:mathjax_math-italic; font-size:19.68px">t</span><span style="font-family:mathjax_math-italic; font-size:19.68px">h</span><span style="font-family:mathjax_main; font-size:19.68px">(</span><span style="font-family:mathjax_math-italic; font-size:19.68px">P</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:19.68px">)</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:13.9138px">d</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">i</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">s</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">t</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">i</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">n</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">c</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">t</span><span style="font-family:mathjax_main; font-size:13.9138px">(</span><span style="font-family:mathjax_math-italic; font-size:13.9138px">P</span><span style="font-family:mathjax_main; font-size:13.9138px">)</span></span></span></span></span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_size3; font-size:19.68px">)</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&nbsp;</span><span style="font-family:mathjax_main; font-size:19.68px">%</span><span style="font-family:mathjax_main; font-size:19.68px">&nbsp;</span><span style="font-family:mathjax_main; font-size:19.68px">(</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:19.68px">10</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">9</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">+</span><span style="font-family:mathjax_main; font-size:19.68px">7</span><span style="font-family:mathjax_main; font-size:19.68px">)</span></span></span></span></span><span style="color:rgb(57, 66, 78); font-family:whitney ssm a,whitney ssm b,avenir,helvetica neue,segoe ui,helvetica,arial,ubuntu,sans-serif; font-size:16px">F(P)=(length(P)distinct(P))&nbsp;%&nbsp;(109+7)</span></p>\r\n', 'uploads/questions39skinrelation_soulrelation.jpg', 5, 'fine', 'good', 'bad', 'worse', 'very good', 1, -1, -1, -1, -1, 0, 1, 1, 'this'),
(1, 2, '<p>Consider the consecutive primes&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">19</span></span></span></span></span><span style="font-family:inherit">p1=19</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">23</span></span></span></span></span><span style="font-family:inherit">p2=23</span></span>. It can be verified that&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:19.68px">1219</span></span></span></span></span><span style="font-family:inherit">1219</span></span>&nbsp;is the smallest number such that the last digits are formed by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p1</span></span>&nbsp;whilst also being divisible by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2</span></span>.</p>\r\n\r\n<p>In fact, with the exception of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">3</span></span></span></span></span><span style="font-family:inherit">p1=3</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">5</span></span></span></span></span><span style="font-family:inherit">p2=5</span></span>, for every pair of consecutive primes,&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&gt;</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2&gt;p1</span></span>, there exist values of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>&nbsp;for which the last digits are formed by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p1</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>&nbsp;is divisible by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2</span></span>. Let&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">S</span></span></span></span></span><span style="font-family:inherit">S</span></span>&nbsp;be the smallest of these values of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>.</p>\r\n\r\n<p>Given&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">L</span></span></span></span></span><span style="font-family:inherit">L</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">R</span></span></span></span></span><span style="font-family:inherit">R</span></span>, find&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_size1; font-size:19.68px">&sum;</span><span style="font-family:mathjax_math-italic; font-size:19.68px">S</span></span></span></span></span><span style="font-family:inherit">&sum;S</span></span>&nbsp;for every pair of consecutive primes with&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">L</span><span style="font-family:mathjax_main; font-size:19.68px">&le;</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&le;</span><span style="font-family:mathjax_math-italic; font-size:19.68px">R</span></span></span></span></span><span style="font-family:inherit">L&le;p1&le;R</span></span>.</p>\r\n', 'uploads/questions96images.jpg', 5, 'krishna', 'balarama', 'hanuman', 'arjun', 'bheem', 1, -1, -1, -1, -1, 0, 1, 0, 'God is krishna'),
(2, 1, '<p>what is 2+3&nbsp;<strong>good????</strong></p>\r\n', 'uploads/questions95images.jpg', 4, '4', '44', '5', '4', '5', 1, 1, 1, 1, 1, 1, 1, 1, ''),
(2, 2, 'what is 3+4`', 'no image', 5, '1', '2', '3', '4', '5', 1, 1, 1, 1, 1, 1, 1, 1, ''),
(3, 1, '<p><strong>what is ip?</strong></p>\r\n', 'uploads/questions98Screenshot from 2015-11-10 03:28:52.png', 5, 'internet protocol', 'intranet protocol', 'infrared protocol', 'inner packet', 'inter packet', 1, -1, -1, -1, -1, 0, 1, 0, 'ip is the abbrev for internet protocol'),
(3, 2, '<p>What is stack</p>\r\n', 'no image', 5, 'data', 'struct', 'structed data', 'data structure', 'number', -1, -1, -1, 1, -1, 0, 1, 0, 'This is a data'),
(4, 1, '<p>Consider the consecutive primes&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">19</span></span></span></span></span><span style="font-family:inherit">p1=19</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">23</span></span></span></span></span><span style="font-family:inherit">p2=23</span></span>. It can be verified that&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:19.68px">1219</span></span></span></span></span><span style="font-family:inherit">1219</span></span>&nbsp;is the smallest number such that the last digits are formed by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p1</span></span>&nbsp;whilst also being divisible by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2</span></span>.</p>\r\n\r\n<p>In fact, with the exception of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">3</span></span></span></span></span><span style="font-family:inherit">p1=3</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">5</span></span></span></span></span><span style="font-family:inherit">p2=5</span></span>, for every pair of consecutive primes,&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&gt;</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2&gt;p1</span></span>, there exist values of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>&nbsp;for which the last digits are formed by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p1</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>&nbsp;is divisible by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2</span></span>. Let&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">S</span></span></span></span></span><span style="font-family:inherit">S</span></span>&nbsp;be the smallest of these values of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>.</p>\r\n\r\n<p>Given&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">L</span></span></span></span></span><span style="font-family:inherit">L</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">R</span></span></span></span></span><span style="font-family:inherit">R</span></span>, find&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_size1; font-size:19.68px">&sum;</span><span style="font-family:mathjax_math-italic; font-size:19.68px">S</span></span></span></span></span><span style="font-family:inherit">&sum;S</span></span>&nbsp;for every pair of consecutive primes with&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">L</span><span style="font-family:mathjax_main; font-size:19.68px">&le;</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&le;</span><span style="font-family:mathjax_math-italic; font-size:19.68px">R</span></span></span></span></span><span style="font-family:inherit">L&le;p1&le;R</span></span>.</p>\r\n', 'no image', 5, 'The first line of input contains TT, the number of', 'Each test case consists of one line containing two', 'But in test cases worth 50% of the total points, R', 'For each test case, output a single line containin', 'The following are the relevant values in the range', 1, -1, -1, -1, -1, 0, 1, 0, '<p>Consider the consecutive primes&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">19</span></span></span></span></span><span style="font-family:inherit">p1=19</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">23</span></span></span></span></span><span style="font-family:inherit">p2=23</span></span>. It can be verified that&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:19.68px">1219</span></span></span></span></span><span style="font-family:inherit">1219</span></span>&nbsp;is the smallest number such that the last digits are formed by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p1</span></span>&nbsp;whilst also being divisible by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2</span></span>.</p>\r\n\r\n<p>In fact, with the exception of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">3</span></span></span></span></span><span style="font-family:inherit">p1=3</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">=</span><span style="font-family:mathjax_main; font-size:19.68px">5</span></span></span></span></span><span style="font-family:inherit">p2=5</span></span>, for every pair of consecutive primes,&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&gt;</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2&gt;p1</span></span>, there exist values of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>&nbsp;for which the last digits are formed by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span></span></span></span></span><span style="font-family:inherit">p1</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>&nbsp;is divisible by&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">2</span></span></span></span></span></span></span></span><span style="font-family:inherit">p2</span></span>. Let&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">S</span></span></span></span></span><span style="font-family:inherit">S</span></span>&nbsp;be the smallest of these values of&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">n</span></span></span></span></span><span style="font-family:inherit">n</span></span>.</p>\r\n\r\n<p>Given&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">L</span></span></span></span></span><span style="font-family:inherit">L</span></span>&nbsp;and&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">R</span></span></span></span></span><span style="font-family:inherit">R</span></span>, find&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_size1; font-size:19.68px">&sum;</span><span style="font-family:mathjax_math-italic; font-size:19.68px">S</span></span></span></span></span><span style="font-family:inherit">&sum;S</span></span>&nbsp;for every pair of consecutive primes with&nbsp;<span style="font-family:inherit"><span style="font-family:inherit"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">L</span><span style="font-family:mathjax_main; font-size:19.68px">&le;</span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_math-italic; font-size:19.68px">p</span></span><span style="font-family:inherit; font-size:19.68px"><span style="font-family:mathjax_main; font-size:13.9138px">1</span></span></span></span><span style="font-family:mathjax_main; font-size:19.68px">&le;</span><span style="font-family:mathjax_math-italic; font-size:19.68px">R</span></span></span></span></span><span style="font-family:inherit">L&le;p1&le;R</span></span>.</p>\r\n'),
(4, 2, '<p><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">Consider a source computer(S) transmitting a file of size 10</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">6</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;bits to a destination computer(D)over a network of two routers (R</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">1</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;and R</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">2</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">) and three links(L</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">1</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">, L</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">2</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">, and L</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">3</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">). L</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">1</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">connects S to R</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">1</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">; L</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">2</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;connects R</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">1</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;to R</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">2</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">; and L</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">3</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;connects R</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">2</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;to D.Let each link be of length 100 km. Assume signals travel over each link at a speed of 10</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif; font-size:9.75px">8</span><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">&nbsp;meters per second.Assume that the link bandwidth on each link is 1Mbps. Let the file be broken down into 1000 packets each of size 1000 bits. Find the total sum of transmission and propagation delays in transmitting the file from S to D?</span></p>\r\n', 'no image', 5, '1005ms', '1006ms', '1007ms', '1008ms', '1009ms', 1, 1, 1, -1, -1, 1, 0, 0, '<p><span style="color:rgb(0, 0, 0); font-family:open sans,helvetica,arial,verdana,sans-serif">Assume that source S and destination D are connected through two intermediate routers labeled R. Determine how many times each packet has to visit the network layer and the data link layer during a&nbsp;</span></p>\r\n'),
(4, 3, '<p style="text-align:justify">CodeChef has been very busy with his christmas preparations and he doesn&#39;t have time to look after Samosa Bhai and Jalebi Bai. To keep them busy, CodeChef has given them an array&nbsp;<strong>A</strong>&nbsp;of size&nbsp;<strong>N</strong>. He has asked them to plant trees at the points with Cartesian coordinates (<strong>A[ i ]</strong>,&nbsp;<strong>A[ j ]</strong>), such that&nbsp;<strong>i</strong>&nbsp;&lt;&nbsp;<strong>j</strong>.</p>\r\n\r\n<p style="text-align:justify">There are a lot of giraffes nearby. To save the trees from the giraffes, they decide to build a fence around the trees. Moreover, they want to use the minimum length of fencing for this task. Find the value equal to&nbsp;<strong>twice the area</strong>&nbsp;covered by the fence using the minimum length of fencing.</p>\r\n', 'no image', 5, 'yes', 'no', 'we ', 'do ', 'will', 1, 1, 1, -1, -2, 1, 0, 0, '<p style="text-align:justify">The first line contains&nbsp;<strong>T</strong>, the number of test cases to follow.</p>\r\n\r\n<p style="text-align:justify">The first line of each test case contains an integer&nbsp;<strong>N</strong>, the size of the array.</p>\r\n\r\n<p style="text-align:justify">The second line of the test case contains&nbsp;<strong>N</strong>&nbsp;space-separated integers.</p>\r\n'),
(4, 4, '<p style="text-align:justify">CodeChef has received an order from the President of Mithai country for his son&#39;s birthday cake. The president is a person of very high temper and CodeChef doesn&#39;t want to tick him him, so he had to prepare a cake exactly as described by the President&#39;s son. He asked for a cake with&nbsp;<strong>N</strong>&nbsp;layers and each layer has to be of a type specified by him. The type of layer is represented by a lowercase letter from the English alphabet.</p>\r\n\r\n<p style="text-align:justify">CodeChef asked his sous Chef, Jalebi Bai, to make this cake, who was very sleepy due to a very long and tiring journey to a planet far far away earlier.<br />\r\nDue to tiredness, Jalebi Bai screwed up the the layers while baking the cake. Thankfully, it has the same number of layers as required, but any of the layers may or may not be the same as described in the order. CodeChef is really worried because of this, as making a new cake will cost him a huge amount of money.</p>\r\n\r\n<p style="text-align:justify">At this point of time, Samosa Bhai comes to the rescue. He has a layer swapper (patent pending) which can swap the layers of a cake without ruining the cake. This swapper has a limitation that it can swap layers separated&nbsp;<strong>exactly</strong>&nbsp;by distance&nbsp;<strong>D</strong>&nbsp;only, meaning there should be&nbsp;<strong>exactly</strong>&nbsp;<strong>D-1</strong>&nbsp;layers in between the two layers to be swapped.</p>\r\n\r\n<p style="text-align:justify">You have to tell if the cake made by Jalebi Bai can be changed into the cake described by the President&#39;s son using Samosa Bhai&#39;s swapper.</p>\r\n', 'no image', 5, 'No', 'MAking', 'cake', 'cream', 'cream', 1, 1, -1, -1, -1, 1, 0, 0, '<ul>\r\n	<li>Swap Layer &#39;f&#39; with &#39;c&#39;, The cake will now be &quot;nbfc&quot;</li>\r\n	<li>Swap Layer &#39;n&#39; with &#39;b&#39;, The cake will now be &quot;bnfc&quot;</li>\r\n	<li>Swap Layer &#39;n&#39; with &#39;f&#39;, The cake will now be &quot;bfnc&quot;</li>\r\n	<li>Swap Layer &#39;f&#39; with &#39;b&#39;, The cake will now be &quot;fbnc&quot;</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `quizid` int(11) NOT NULL AUTO_INCREMENT,
  `quizname` varchar(50) NOT NULL,
  `inchargename` varchar(50) NOT NULL,
  `courseid` varchar(20) NOT NULL,
  `coursename` varchar(40) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `totalscore` float NOT NULL,
  `totalquestions` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `setterid` varchar(30) NOT NULL,
  `mattempt` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  `enrollmentkey` varchar(20) NOT NULL,
  PRIMARY KEY (`quizid`),
  KEY `setterid` (`setterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `inchargename`, `courseid`, `coursename`, `starttime`, `endtime`, `totalscore`, `totalquestions`, `department`, `setterid`, `mattempt`, `option`, `enrollmentkey`) VALUES
(1, 'quiz1', 'quizsettter', 'course', 'coursename', '2016-04-18 14:00:14', '2016-04-27 09:15:14', 4, 4, 'cse', 'setter1', 1, 3, '1234'),
(2, 'Math', 'Trump', 'cs1094', 'Maths', '2016-05-05 03:15:14', '2016-05-05 04:15:14', 10, 5, 'cse', 'setter1', 1, 3, ''),
(3, 'networks-1', 'sumesh', 'cs2034', 'networks', '2016-04-22 14:00:04', '2016-04-25 01:05:04', 5, 5, 'cse', 'setter1', 1, 3, '123456'),
(4, 'demo', 'quizsetter', 'cs1094', 'programming', '2016-04-25 01:05:40', '2016-04-30 15:30:40', 6, 6, 'cse', 'setter1', 1, 3, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `quizsetter`
--

CREATE TABLE IF NOT EXISTS `quizsetter` (
  `setterid` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(20) NOT NULL,
  PRIMARY KEY (`setterid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizsetter`
--

INSERT INTO `quizsetter` (`setterid`, `about`, `name`, `dept`) VALUES
('setter1', '', '', ''),
('setter2', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `userid` varchar(30) NOT NULL,
  `quizid` int(11) NOT NULL,
  `quizname` varchar(50) NOT NULL,
  `totalscore` float NOT NULL,
  `obtainedscore` float NOT NULL,
  `correctattempted` int(11) NOT NULL,
  `wrongattempted` int(11) NOT NULL,
  `totalquestions` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `order` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`,`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`userid`, `quizid`, `quizname`, `totalscore`, `obtainedscore`, `correctattempted`, `wrongattempted`, `totalquestions`, `feedback`, `order`) VALUES
('kartik', 1, 'quiz1', 4, 0, 0, 0, 4, '', 'a:5:{i:0;i:1;i:1;i:0;i:2;i:2;i:3;i:3;i:4;i:4;}'),
('kartik', 2, 'Math', 10, 0, 0, 0, 5, '', ''),
('student1', 1, 'quiz1', 4, 0, 0, 0, 4, '', 'a:5:{i:0;i:1;i:1;i:0;i:2;i:2;i:3;i:3;i:4;i:4;}'),
('student1', 2, 'Math', 10, 0, 0, 0, 5, '', 'a:2:{i:0;i:1;i:1;i:0;}'),
('student1', 3, 'networks-1', 5, 2, 2, 0, 5, '', 'a:3:{i:0;i:2;i:1;i:0;i:2;i:1;}'),
('student1', 4, '', 0, 0, 0, 0, 0, '', 'a:4:{i:0;i:2;i:1;i:3;i:2;i:1;i:3;i:0;}'),
('ujwal', 1, '', 0, 0, 0, 0, 0, '', 'a:5:{i:0;i:3;i:1;i:4;i:2;i:0;i:3;i:1;i:4;i:2;}'),
('ujwal', 2, 'Math', 10, 2, 2, 0, 5, '', 'a:2:{i:0;i:1;i:1;i:0;}'),
('vikram', 1, 'quiz1', 4, 0, 0, 2, 4, '', 'a:5:{i:0;i:3;i:1;i:4;i:2;i:1;i:3;i:2;i:4;i:0;}'),
('vikram', 3, '', 0, 0, 0, 0, 0, '', 'a:3:{i:0;i:2;i:1;i:1;i:2;i:0;}');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `solution` text NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`quizid`,`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE IF NOT EXISTS `tutorials` (
  `quizid` int(11) NOT NULL DEFAULT '0',
  `tutorialid` int(11) NOT NULL DEFAULT '0',
  `contentlink` varchar(100) NOT NULL,
  `tutorialname` varchar(40) NOT NULL,
  `coursename` varchar(30) NOT NULL,
  `courseid` varchar(30) NOT NULL,
  `tutorialtext` text NOT NULL,
  PRIMARY KEY (`tutorialid`),
  KEY `quizid` (`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`quizid`, `tutorialid`, `contentlink`, `tutorialname`, `coursename`, `courseid`, `tutorialtext`) VALUES
(1, 1, 'no image', 'dsa', 'dsa', 'ds1234', '<p>hello hai 11</p>\r\n'),
(2, 4, 'no image', 'adfdsaf', 'afdsaf', 'afddsaf', 'iam ujwal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(30) NOT NULL,
  `about` text,
  `rollno` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stream` varchar(5) NOT NULL,
  `program` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `about`, `rollno`, `name`, `stream`, `program`) VALUES
('ganesh', NULL, '', '', '', ''),
('kartik', NULL, '', '', '', ''),
('raju', NULL, '', '', '', ''),
('rama', NULL, '', '', '', ''),
('sstudent3', NULL, '', '', '', ''),
('student1', 'hi', 'b120419cs', 'P.v.v.vidhe', 'cse', 'btech'),
('student2', NULL, '', '', '', ''),
('student3', NULL, '', '', '', ''),
('ujwal', NULL, '', '', '', ''),
('vikram', NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1271 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1235, 'admin', 'admin', 'n0a8PHI-plcfr2oCuPkLHzryY9NxTCvv', '$2y$13$Z7rAu2ekc8lxOmuJhHgQEebqn8X6r5xzBRoCf6f.FUD/KwaCYgRFm', NULL, 'admin@yahoo.com', 10, 1447612288, 1461009378),
(1258, 'setter1', 'setter', 'lNtcNfkhK7cJstMEX1BkV-od7GxaREx6', '$2y$13$T5fBPtNMF/j7qSEdBnS3AezBUuWMsV1Tid2jmfkvAOp/kLkCFQ4Ke', NULL, 'setter1@gmail.com', 10, 1456852011, 1460746415),
(1259, 'student1', 'student', 'r3w9FJDQHZOenL8z5y-0WBNnRMJiZ_0U', '$2y$13$B22Cn58Qstpn1xTfQsyBPu/qg5OJuXcy8AarS.JmuUgd5gFl9HecO', NULL, 'student1@gmail.com', 10, 1456852790, 1460746304),
(1266, 'vikram', 'student', 'x3nh14L0qNr06XwLG5C0xRPhZ9ZE1HB6', '$2y$13$SzEAz1Vsr5lp2CQjnJmodepNC/lybXfZj3bYAPpHGz1bTg6lQjBYa', NULL, 'vicks@gmail.com', 10, 1460746725, 1460746725),
(1267, 'sstudent3', 'student', '31j4pE0Y_-DfR9V4s1yba9O1MZLAWHFd', '$2y$13$x17mrVbssGRv/PI..TkVa.WaxFVLMZfLlZBjwBw6J7a6BZYdI7516', NULL, 'paluru_20419cs@nitc.ac.in', 10, 1460796833, 1460796833),
(1268, 'kartik', 'student', 'ssiHN5W9uTEG5BK1RVwh-nfR9-QY5C-O', '$2y$13$r4I0IcLffpuGNRAjfgZjVOhcoF.nA7Z9mgeb1R5o8OKeAUEzjsrAq', NULL, 'kartik@top.com', 10, 1460981756, 1461194128),
(1269, 'raju', 'student', 'V8xPVCU2HLV7tQe83NLG-NzREw2L9a5g', '$2y$13$b6PJAXffGDEITiTBGY2v3eYfrdBNr08bJR4o74PWy3lnBfRqYW1fC', NULL, 'raju@raju.com', 10, 1461008398, 1461008398),
(1270, 'ujwal', 'student', 'anlXmPAsxciHdWZEsQ7iNt9qDSJFPoZX', '$2y$13$XiZALHrlGLqabp4wYQphNe5LihCU.nYVBG34tau5ySw5mIR8KSwsy', NULL, 'ujwal@gmail.com', 10, 1461227815, 1461227815);

-- --------------------------------------------------------

--
-- Table structure for table `virtualquiz`
--

CREATE TABLE IF NOT EXISTS `virtualquiz` (
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `attempted` float NOT NULL,
  `option1` tinyint(1) DEFAULT NULL,
  `option2` tinyint(1) DEFAULT NULL,
  `option3` tinyint(1) DEFAULT NULL,
  `option4` tinyint(1) DEFAULT NULL,
  `option5` tinyint(1) DEFAULT NULL,
  `essaytext` text NOT NULL,
  PRIMARY KEY (`quizid`,`questionid`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `virtualquiz`
--

INSERT INTO `virtualquiz` (`quizid`, `questionid`, `userid`, `attempted`, `option1`, `option2`, `option3`, `option4`, `option5`, `essaytext`) VALUES
(0, 0, '', 0, NULL, NULL, NULL, NULL, NULL, ''),
(1, 1, 'student1', 1, 1, 0, 0, 0, 0, ''),
(1, 2, 'student1', -1, 0, 1, 1, 0, 0, ''),
(4, 1, 'student1', 1, 1, 0, 0, 0, 0, ''),
(4, 2, 'student1', 1, 0, 1, 0, 0, 0, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`questionid`) REFERENCES `questions` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `futurequestions`
--
ALTER TABLE `futurequestions`
  ADD CONSTRAINT `futurequestions_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presentquiz`
--
ALTER TABLE `presentquiz`
  ADD CONSTRAINT `presentquiz_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presentquiz_ibfk_2` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`setterid`) REFERENCES `quizsetter` (`setterid`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `solutions_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD CONSTRAINT `tutorials_ibfk_1` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
