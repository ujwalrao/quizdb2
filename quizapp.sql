-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2016 at 09:34 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

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
  `department` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `about`, `name`, `department`) VALUES
('admin', 'I have ', 'mainADMIN', 'CSE'),
('simsar', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
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
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
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
  `commenttext` text NOT NULL
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
  `essay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
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
  `essaytext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentquiz`
--

INSERT INTO `presentquiz` (`quizid`, `questionid`, `userid`, `attempted`, `option1`, `option2`, `option3`, `option4`, `option5`, `essaytext`) VALUES
(1, 1, 'student1', 1, 0, 0, 0, 0, 0, ''),
(1, 2, 'student1', 0, 0, 0, 0, 0, 0, ''),
(1, 3, 'student1', -1, 0, 0, 1, 0, 0, ''),
(1, 4, 'student1', -1, 0, 0, 0, 0, 1, ''),
(2, 1, 'student1', 1, 0, 0, 1, 0, 0, '');

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
  `essay` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quizid`, `questionid`, `questiontext`, `image`, `noofoptions`, `option1`, `option2`, `option3`, `option4`, `option5`, `weight1`, `weight2`, `weight3`, `weight4`, `weight5`, `maq`, `saq`, `essay`) VALUES
(1, 1, 'how are you', 'no image', 5, 'fine', 'good', 'bad', 'worse', 'very good', 1, -1, -1, -1, -1, 0, 1, 1),
(1, 2, 'who is god', 'no image', 5, 'krishna', 'balarama', 'hanuman', 'arjun', 'bheem', 1, -1, -1, -1, -1, 0, 1, 0),
(1, 3, 'who is our president', 'no image', 5, 'pranab mukerjee', 'abdul kalam', 'narendra modi', 'manmohan singh', 'sonia gandhi', 1, -1, -1, -1, -1, 0, 1, 1),
(1, 4, 'who is our prime minister', 'no image', 5, 'pranab mukerjee', 'abdul kalam', 'narendra modi', 'manmohan singh', 'sonia gandhi', -1, -1, 1, -1, -1, 0, 1, 1),
(2, 1, '1', '1', 4, 'a', 'b', 'c', 'd', 'e', 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 'fsdfds', '1', 3, '44', '8', '8', '8', '8', 8, 7, 7, 7, 6, 6, 6, 6),
(3, 1, 'WHAT IS YOUR NAME?', 'a', 5, 'a', 'b', 'c', 'd', 'e', 1, 1, 1, 1, 1, 1, 1, 1),
(3, 2, 'khkh', '2', 5, '2', '1', '22', '3', '2', 2, 2, 2, 333, 33, 3, 3, 3),
(3, 3, 'hjgjhgj', '1', 1, '3', '2', '2', '2', '2', 2, 2, 2, 2, 2, 127, 2, 2),
(3, 4, 'dfdfdfgdf', '2', 3, '2', '8', '8', '8', '9', 8, 7, 8, 9, 8, 1, 2, 2),
(3, 5, 'dffdf', '1', 3, '1122', '3', '3', '3', '3', 2, 3, 4, 4, 4, 3, 4, 4),
(7, 1, 'dfsdf', 'a', 3, 'asd', 'fdfd', 'dffdsf', 'dfdsfdsf', 'dsfdsf', 3, 2, 3, 6, 6, 1, 1, 3),
(7, 2, 'fdfdsf', '1', 3, 'df', 'dfdsf', 'dfdsf', 'd', 'dfdsf', 2, 3, 4, 5, 3, 1, 2, 2),
(8, 1, 'ygykhkj', '2', 5, '2', '3', '3', '3', '3', 3, 22, 2, 2, 3, 4, 2, 2),
(8, 2, 'gjghjh', '2', 4, '2', '2', '2', '4', '3', 2, 2, 4, 4, 2, 4, 2, 23),
(8, 3, 'HELLLOO', '2', 5, 'hOW', 'HEY', 'HI', 'HELLOO', 'HIIII', 1, 2, 2, 2, 3, 2, 2, 3),
(8, 4, 'sECOND', '3', 4, 'IIIIII', 'KJJJJJ', 'LLLLLL', 'TTTTT', 'FFFF', 1, 3, 4, 2, 3, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
`quizid` int(11) NOT NULL,
  `quizname` varchar(50) NOT NULL,
  `inchargename` varchar(50) NOT NULL,
  `courseid` varchar(20) NOT NULL,
  `coursename` varchar(40) NOT NULL,
  `Options` int(10) NOT NULL DEFAULT '0',
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `totalscore` float NOT NULL,
  `totalquestions` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `setterid` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `inchargename`, `courseid`, `coursename`, `Options`, `starttime`, `endtime`, `totalscore`, `totalquestions`, `department`, `setterid`) VALUES
(1, 'quiz1', 'quizsettter', 'course', 'coursename', 0, '2016-03-01 23:35:14', '2016-03-01 23:50:14', 4, 4, 'cse', 'setter1'),
(2, 'TestQuiz', 'simsar', '100', 'Quiz-SWL', 0, '2016-04-05 14:55:56', '2016-04-05 23:35:56', 100, 10, 'cse', 'setter1'),
(3, 'a', 'a', '1', 'a', 2, '2016-04-05 05:50:15', '2016-04-05 01:30:15', 1, 1, 'csecs', 'setter1'),
(7, 'Quiizzz', 'simsar', '235', 'asdssdf', 1, '2016-04-05 00:15:35', '2016-04-05 22:30:36', 100, 34, 'fdfdf', 'setter1'),
(8, 'New', 'simsar', '23', 'asdssdfgdfs', 3, '2016-04-05 22:00:02', '2016-04-05 14:25:02', 23, 5, 'csed', 'setter1');

-- --------------------------------------------------------

--
-- Table structure for table `quizsetter`
--

CREATE TABLE IF NOT EXISTS `quizsetter` (
  `setterid` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `dept` varchar(20) NOT NULL
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
  `quizname` varchar(50) NOT NULL,
  `totalscore` float NOT NULL,
  `obtainedscore` float NOT NULL,
  `correctattempted` int(11) NOT NULL,
  `wrongattempted` int(11) NOT NULL,
  `totalquestions` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `quizid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `solution` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE IF NOT EXISTS `tutorials` (
  `quizid` int(11) NOT NULL DEFAULT '0',
  `tutorialid` int(11) NOT NULL DEFAULT '0',
  `contentlink` varchar(100) NOT NULL
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
  `program` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `about`, `rollno`, `name`, `stream`, `program`) VALUES
('simsar', NULL, '', '', '', ''),
('student1', NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1282 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1235, 'admin', 'admin', 'n0a8PHI-plcfr2oCuPkLHzryY9NxTCvv', '$2y$13$Vse/Ne2SN9qRzAZOg7b6Xu4w8epqVM6p3bhDjEPpi2WRZwe9GKX82', NULL, 'admin@yahoo.com', 10, 1447612288, 1447612288),
(1258, 'setter1', 'setter', 'lNtcNfkhK7cJstMEX1BkV-od7GxaREx6', '$2y$13$x7GYYtC2H70IDfOa2JwyEOqz3Nnq1lPUFL7iHrEzbtvWAarsp9HDu', NULL, 'setter1@gmail.com', 10, 1456852011, 1456852011),
(1280, 'student1', 'student', 'hj86Tutid1nTdqdXpq4JYqK2yLRxQ9vn', '$2y$13$CI00Nd.HOC.HotyptzBZvejAlAvArwvwwO.XlSzbpdAA4D4HgwVFG', NULL, 'student1@gmail.com', 10, 1456910396, 1456910396),
(1281, 'simsar', 'admin', 'bBk_etrYdNxdhR0TkA_aRPNJoEEK2qj4', '$2y$13$SKQaItj1gQrF5dZztm9Xs.ermmX0cNNZ/f9xPaS02UuhwgdyglI7W', NULL, 'simsarulhaqv@gmail.com', 10, 1459846596, 1459846596);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`role`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`questionid`,`quizid`,`commentid`), ADD KEY `quizid` (`quizid`);

--
-- Indexes for table `futurequestions`
--
ALTER TABLE `futurequestions`
 ADD PRIMARY KEY (`quizid`,`questionid`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `presentquiz`
--
ALTER TABLE `presentquiz`
 ADD PRIMARY KEY (`quizid`,`questionid`,`userid`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`quizid`,`questionid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
 ADD PRIMARY KEY (`quizid`), ADD KEY `setterid` (`setterid`);

--
-- Indexes for table `quizsetter`
--
ALTER TABLE `quizsetter`
 ADD PRIMARY KEY (`setterid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`userid`,`quizid`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
 ADD PRIMARY KEY (`quizid`,`questionid`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
 ADD PRIMARY KEY (`tutorialid`), ADD KEY `quizid` (`quizid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
MODIFY `quizid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1282;
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
