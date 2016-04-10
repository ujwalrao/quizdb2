-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2016 at 12:37 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
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
(1, 1, 'student1', 0, 0, 0, 0, 0, 0, '');

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
  PRIMARY KEY (`quizid`,`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quizid`, `questionid`, `questiontext`, `image`, `noofoptions`, `option1`, `option2`, `option3`, `option4`, `option5`, `weight1`, `weight2`, `weight3`, `weight4`, `weight5`, `maq`, `saq`, `essay`) VALUES
(1, 1, 'how are you', 'no image', 5, 'fine', 'good', 'bad', 'worse', 'very good', 1, -1, -1, -1, -1, 0, 1, 1),
(1, 2, 'who is god', 'no image', 5, 'krishna', 'balarama', 'hanuman', 'arjun', 'bheem', 1, -1, -1, -1, -1, 0, 1, 0),
(1, 3, 'who is our president', 'no image', 5, 'pranab mukerjee', 'abdul kalam', 'narendra modi', 'manmohan singh', 'sonia gandhi', 1, -1, -1, -1, -1, 0, 1, 1),
(1, 4, 'who is our prime minister', 'no image', 5, 'pranab mukerjee', 'abdul kalam', 'narendra modi', 'manmohan singh', 'sonia gandhi', -1, -1, 1, -1, -1, 0, 1, 1);

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
  PRIMARY KEY (`quizid`),
  KEY `setterid` (`setterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `inchargename`, `courseid`, `coursename`, `starttime`, `endtime`, `totalscore`, `totalquestions`, `department`, `setterid`) VALUES
(1, 'quiz1', 'quizsettter', 'course', 'coursename', '2016-03-01 23:35:14', '2016-03-01 23:50:14', 4, 4, 'cse', 'setter1');

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
('setter1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `userid` varchar(30) NOT NULL,
  `quizid` int(11) NOT NULL,
<<<<<<< HEAD
  `questionid` int(11) NOT NULL,
=======
>>>>>>> 787a24740b3781dec55da357a82967b18d24016f
  `quizname` varchar(50) NOT NULL,
  `totalscore` float NOT NULL,
  `obtainedscore` float NOT NULL,
  `correctattempted` int(11) NOT NULL,
  `wrongattempted` int(11) NOT NULL,
  `totalquestions` int(11) NOT NULL,
  `feedback` text NOT NULL,
<<<<<<< HEAD
  PRIMARY KEY (`userid`,`quizid`,`questionid`)
=======
  PRIMARY KEY (`userid`,`quizid`)
>>>>>>> 787a24740b3781dec55da357a82967b18d24016f
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`tutorialid`),
  KEY `quizid` (`quizid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('student1', NULL, '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1281 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1235, 'admin', 'admin', 'n0a8PHI-plcfr2oCuPkLHzryY9NxTCvv', '$2y$13$Vse/Ne2SN9qRzAZOg7b6Xu4w8epqVM6p3bhDjEPpi2WRZwe9GKX82', NULL, 'admin@yahoo.com', 10, 1447612288, 1447612288),
(1258, 'setter1', 'setter', 'lNtcNfkhK7cJstMEX1BkV-od7GxaREx6', '$2y$13$x7GYYtC2H70IDfOa2JwyEOqz3Nnq1lPUFL7iHrEzbtvWAarsp9HDu', NULL, 'setter1@gmail.com', 10, 1456852011, 1456852011),
(1280, 'student1', 'student', 'hj86Tutid1nTdqdXpq4JYqK2yLRxQ9vn', '$2y$13$CI00Nd.HOC.HotyptzBZvejAlAvArwvwwO.XlSzbpdAA4D4HgwVFG', NULL, 'student1@gmail.com', 10, 1456910396, 1456910396);

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
