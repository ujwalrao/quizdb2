-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2016 at 02:53 PM
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
(1, 2, 'vikram', 0, 0, 0, 0, 0, 0, ''),
(1, 3, 'student1', 0, 0, 0, 0, 0, 0, ''),
(1, 4, 'student1', -1, 0, 0, 1, 1, 0, ''),
(1, 7, 'student1', 2, 1, 1, 0, 0, 0, ''),
(2, 1, 'ujwal', 1, 1, 0, 0, 0, 0, ''),
(2, 2, 'ujwal', 1, 0, 0, 1, 0, 0, '');

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
(1, 1, '<p>x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}</p>\r\n', 'uploads/questions72Screenshot from 2015-08-23 21:34:16.png', 5, 'fine', 'good', 'bad', 'worse', 'very good', 1, -1, -1, -1, -1, 0, 1, 1, 'this'),
(1, 2, 'who is god', 'uploads/questions96images.jpg', 5, 'krishna', 'balarama', 'hanuman', 'arjun', 'bheem', 1, -1, -1, -1, -1, 0, 1, 0, ''),
(2, 1, '<p>what is 2+3&nbsp;<strong>good????</strong></p>\r\n', 'uploads/questions95images.jpg', 4, '4', '44', '5', '4', '5', 1, 1, 1, 1, 1, 1, 1, 1, ''),
(2, 2, 'what is 3+4`', 'no image', 5, '1', '2', '3', '4', '5', 1, 1, 1, 1, 1, 1, 1, 1, ''),
(3, 1, '<p><strong>what is ip?</strong></p>\r\n', 'no image', 5, 'internet protocol', 'intranet protocol', 'infrared protocol', 'inner packet', 'inter packet', 1, -1, -1, -1, -1, 0, 1, 0, 'ip is the abbrev for internet protocol');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `inchargename`, `courseid`, `coursename`, `starttime`, `endtime`, `totalscore`, `totalquestions`, `department`, `setterid`, `mattempt`, `option`, `enrollmentkey`) VALUES
(1, 'quiz1', 'quizsettter', 'course', 'coursename', '2016-04-18 14:00:14', '2016-04-21 00:15:14', 4, 4, 'cse', 'setter1', 1, 3, '1234'),
(2, 'Math', 'Trump', 'cs1094', 'Maths', '2016-05-05 03:15:14', '2016-05-05 04:15:14', 10, 5, 'cse', 'setter1', 1, 3, ''),
(3, 'networks-1', 'sumesh', 'cs2034', 'networks', '2016-04-22 14:00:04', '2016-04-22 18:30:04', 5, 5, 'cse', 'setter1', 1, 3, '123456');

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
('student1', 3, '', 0, 0, 0, 0, 0, '', 'a:2:{i:0;i:0;i:1;i:-1;}'),
('ujwal', 1, '', 0, 0, 0, 0, 0, '', 'a:5:{i:0;i:3;i:1;i:4;i:2;i:0;i:3;i:1;i:4;i:2;}'),
('ujwal', 2, 'Math', 10, 2, 2, 0, 5, '', 'a:2:{i:0;i:1;i:1;i:0;}'),
('vikram', 1, 'quiz1', 4, 0, 0, 2, 4, '', 'a:5:{i:0;i:3;i:1;i:4;i:2;i:1;i:3;i:2;i:4;i:0;}');

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
(1, 2, 'student1', -1, 0, 0, 1, 0, 0, '');

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
