-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 02:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anime`
--
CREATE DATABASE IF NOT EXISTS `anime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anime`;
--
--
-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `season` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `season`) VALUES
(1, 'Seasonal Anime', 'Fall 2022'),
(2, 'Male Character', 'Fall 2022');

-- --------------------------------------------------------

--
-- Table structure for table `polls_answers`
--

CREATE TABLE `polls_answers` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `choice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `polls_choices`
--

CREATE TABLE `polls_choices` (
  `id` int(11) NOT NULL,
  `anime_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls_choices`
--

INSERT INTO `polls_choices` (`id`, `anime_name`, `description`, `poll`) VALUES
(1, 'Chainsaw Man', '', 1),
(2, 'Spy x Family', '', 1),
(3, 'Blue Lock', '', 1),
(4, 'Kagenou, Cid', 'The Eminence in Shadow', 2),
(5, 'Kageyama, Shigeo / Mob', 'Mob Psycho 100 III', 2),
(6, 'Forger, Loid', 'SPY x FAMILY Part II', 2),
(7, 'Denji', 'Chainsaw Man', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `type`, `username`, `password`) VALUES
(1, 'Jaydee', 'Ballaho', 'admin', 'jaydee', 'jaydee'),
(2, 'Root', 'Root', 'admin', 'root', 'root'),
(3, 'Natsu', 'Dragneel', 'user', 'natsu', 'natsu'),
(4, 'Erza', 'Scarlet', 'user', 'erza', 'erza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_answers`
--
ALTER TABLE `polls_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_choices`
--
ALTER TABLE `polls_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `polls_answers`
--
ALTER TABLE `polls_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `polls_choices`
--
ALTER TABLE `polls_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;