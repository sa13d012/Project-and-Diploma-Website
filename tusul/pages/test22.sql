-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 13, 2017 at 02:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test22`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_content`
--

CREATE TABLE `borrowed_content` (
  `borrow_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `awsan_ognoo` datetime NOT NULL,
  `ugsun_ognoo` datetime DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `content_type` varchar(20) NOT NULL,
  `content_name` varchar(240) NOT NULL,
  `author_name` varchar(240) NOT NULL,
  `author_code` varchar(240) NOT NULL,
  `registred_date` varchar(100) NOT NULL,
  `dvn` int(11) NOT NULL,
  `content_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_type`, `content_name`, `author_name`, `author_code`, `registred_date`, `dvn`, `content_code`) VALUES
(12, 'Ð”Ð¸Ð¿Ð»Ð¾Ð¼', 'SQL Injection', 'Batdorj', 'J.SA09D009', '2011b', 87, '2011b8735'),
(13, 'Ð¢Ó©ÑÓ©Ð»', 'DHCP DoS', 'Byambadorj', 'J.SA06D004', '2010b', 76, '2010b0142'),
(14, 'Ð”Ð¸Ð¿Ð»Ð¾Ð¼', 'IDS System', 'Dorj', 'J.SA13D099', '2017-18a', 89, '2017-18a4956');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_type` varchar(50) NOT NULL,
  `member_code` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_type`, `member_code`, `firstname`, `lastname`, `tel`, `email`) VALUES
(1, 'Student', 'J.SA13D012', 'Akhjol', 'Khaytarbyek', '94505898', 'j.sa13d012@gmail.com'),
(2, 'Student', 'J.SA13D013', 'Baatar', 'Bold', '99887766', 'b.bold@gmail.com'),
(3, 'ÐžÑŽÑƒÑ‚Ð°Ð½', 'J.SA13D099', 'Ð‘Ð°Ñ‚', 'Ð‘Ð¾Ð»Ð´', '99424242', 'bagii.bakhit@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'Akhjol', 'akhjol@mail.com', '7b24afc8bc80e548d66c4e7ff72171c5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowed_content`
--
ALTER TABLE `borrowed_content`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `borrowed_content_ibfk_1` (`member_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowed_content`
--
ALTER TABLE `borrowed_content`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_content`
--
ALTER TABLE `borrowed_content`
  ADD CONSTRAINT `borrowed_content_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`),
  ADD CONSTRAINT `borrowed_content_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
