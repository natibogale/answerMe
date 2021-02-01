-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 07:27 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `answermenow`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `profilePicture`) VALUES
(7, 'loss', 'loss', 'loss', 'loss@loss.com', 'loss', 'images/6017504f644a0.jpg'),
(6, 'pass', 'passop', 'passew', 'pass@pass.noi', 'pass', 'images/60174431310dc.jpg'),
(8, 'sdsd', 'sdsd', 'sdsd', 'sdsd@ww.ddd', 'sdsd', 'images/60175b7d12cac.jpg'),
(9, 'teddy ', 'sddf', 'ddssd', 'sdf@sds.y', 'reww', 'images/6017871d7e9f9.jpg'),
(11, 'tesfa', 'rrrrr', 'bbbb', 'dfgdfg@sdfsdf.rrr', 'qwe', 'images/60178abc0605d.jpg'),
(5, 'test', 'test', 'test', 'test@test.com', 'test', 'images/6016986425f56.jpg'),
(10, 'weee', 'weee', 'weee', 'weee@ww.d', 'weee', 'images/601789e6771ba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `vote` int(20) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question`, `unique_id`, `answer`, `author`, `vote`, `date`, `who`) VALUES
(91, 0, '601741a1d2942', 'fdyuuuuuu', 'pass ', NULL, '2021-02-01', 'pass'),
(94, 0, '601749bee04b4', 'dssssssss', 'Anonymous', NULL, '2021-02-01', 'pass'),
(95, 0, '601749bee04b4', 'fdddddddddddddd', 'Anonymous', NULL, '2021-02-01', 'pass'),
(96, 0, '6017502c0671e', 'uugiiiiiiiiii', 'pass ', NULL, '2021-02-01', 'pass'),
(101, 0, '60178b3587aee', 'kebede', 'tesfa', NULL, '2021-02-01', 'tesfa'),
(102, 0, '60178b3587aee', 'fddddddd', 'pass', NULL, '2021-02-01', 'pass'),
(103, 0, '6017992076429', 'adcaca', 'pass ', NULL, '2021-02-01', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Other',
  `anonymous` varchar(50) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `author`, `author_id`, `question`, `unique_id`, `category`, `anonymous`, `date`) VALUES
(41, 'pass', 6, 'ewwwwwwww', '601741976900d', 'Technology', 'no', '2021-02-01'),
(42, 'pass', 6, 'nb  m weew  nnmkkk', '601741a1d2942', 'Curiosity', 'no', '2021-02-01'),
(43, 'pass', 6, 'hjghhghg 666666666 ', '601749bee04b4', 'RelationShip', 'yes', '2021-02-01'),
(44, 'pass', 6, 'ewwwwwwww', '6017502c0671e', 'Technology', 'yes', '2021-02-01'),
(45, 'pass', 6, 'hhhhhhhhhhhhh asd', '6017597ced85c', 'Sports and Life style', 'yes', '2021-02-01'),
(47, 'tesfa', 11, 'who am i', '60178b3587aee', 'Health and Sciences', 'yes', '2021-02-01'),
(48, 'pass', 6, 'dfgdfgdfgdfg', '6017992076429', 'Health and Sciences', 'no', '2021-02-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `unique_id` (`unique_id`),
  ADD KEY `question` (`question`),
  ADD KEY `who` (`who`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD KEY `author` (`author`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `questions` (`unique_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`who`) REFERENCES `accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`author`) REFERENCES `accounts` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
