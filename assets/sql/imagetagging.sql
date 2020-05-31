-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 04:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imagetagging`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `tag_x` int(11) NOT NULL,
  `tag_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`) VALUES
(1, 'Aaditya Bhusal'),
(2, 'Ram Shah'),
(3, 'Rita Kumar'),
(4, 'Hari Bastola'),
(5, 'Subham Sharma'),
(6, 'Jill Grhoul'),
(7, 'Richard Hendrix'),
(8, 'Jack Rim'),
(9, 'Arun Chaulagain'),
(10, 'Aditya Jha'),
(11, 'Ajay Bista'),
(22, 'Aaron Swartz'),
(23, 'Alice Wonder'),
(24, 'Berry John'),
(25, 'Bipana Kandel'),
(26, 'Bibek Shrestha'),
(27, 'Crizts Roftl'),
(28, 'Custo Busta'),
(39, 'Dipa Sharma'),
(40, 'Dungen Dusko'),
(41, 'Diwas Kumar'),
(42, 'Derek Banas'),
(43, 'Eichen Ruthford'),
(44, 'Ellen Degeneres'),
(45, 'Emamuel Roger'),
(46, 'Fredrick Smith'),
(47, 'Farrukh Khan'),
(48, 'Flock Rick'),
(49, 'Jared Leto'),
(50, 'Jennifer Lawrence'),
(51, 'Brad Pitt'),
(52, 'Angelina Jolie'),
(53, 'Julia Roberts'),
(54, 'Bradley Cooper'),
(55, 'Kevin Spacy'),
(56, 'Meryl Streep'),
(57, 'Channing Tatum'),
(58, 'Jason Travolt'),
(59, 'Menaka Shah'),
(60, 'Ram Singh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_tags_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
