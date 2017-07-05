-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 04:00 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `batch` varchar(255) NOT NULL,
  `course_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `collegeName`) VALUES
(1, 'JSS Academy of Technical Education, Noida'),
(2, 'Krishna Institute of Technology, Ghaziabad');

-- --------------------------------------------------------

--
-- Table structure for table `compulsorySkills`
--

CREATE TABLE IF NOT EXISTS `compulsorySkills` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_id` int(5) NOT NULL,
  `numberOfQuestions` int(5) NOT NULL,
  `positiveScore` int(5) NOT NULL,
  `negativeScore` int(5) NOT NULL,
  `time` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(5) NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `option1` longtext NOT NULL,
  `option2` longtext NOT NULL,
  `option3` longtext NOT NULL,
  `option4` longtext NOT NULL,
  `difficulty_level` enum('1','2','3') NOT NULL,
  `skill_id` int(5) NOT NULL,
  `answer` enum('0','1','2','3') NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `difficulty_level`, `skill_id`, `answer`) VALUES
(1, '<p>a</p>\r\n', '<p>b</p>\r\n', '<p>c</p>\r\n', '<p>d</p>\r\n', '<p>e</p>\r\n', '1', 1, '1'),
(2, '<p>Test Question</p>\r\n', '<p>op1</p>\r\n', '<p>op2</p>\r\n', '<p>op3</p>\r\n', '<p>op4</p>\r\n', '2', 2, '2'),
(3, '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  `availableForUserDriven` tinyint(1) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill`, `availableForUserDriven`) VALUES
(1, 'PHP', 1),
(2, 'HTML', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testSetup`
--

CREATE TABLE IF NOT EXISTS `testSetup` (
  `testID` int(2) NOT NULL,
  `college_id` int(5) NOT NULL,
  `testName` varchar(255) NOT NULL,
  `skillsAllowed` int(5) NOT NULL,
  `numberOfQuestions` int(5) NOT NULL,
  `positiveScore` int(5) NOT NULL,
  `negativeScore` int(5) NOT NULL,
  `timeAllowed` int(5) NOT NULL,
  `easyPercentage` int(3) NOT NULL,
  `mediumPercentage` int(3) NOT NULL,
  `hardPercentage` int(3) NOT NULL,
  PRIMARY KEY (`testID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testSetup`
--

INSERT INTO `testSetup` (`testID`, `college_id`, `testName`, `skillsAllowed`, `numberOfQuestions`, `positiveScore`, `negativeScore`, `timeAllowed`, `easyPercentage`, `mediumPercentage`, `hardPercentage`) VALUES
(1, 1, 'COAT-2016', 5, 30, 3, 1, 15, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college_id` int(5) NOT NULL,
  `batch_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userScore`
--

CREATE TABLE IF NOT EXISTS `userScore` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_id` int(5) NOT NULL,
  `score` int(5) NOT NULL,
  `totalScore` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
