-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 12:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `anime`
--
CREATE DATABASE IF NOT EXISTS `anime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `anime`;
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`(
	  `id` int(11) NOT NULL,
    `firstname` VARCHAR(255),
    `lastname` VARCHAR(255),
    `type` VARCHAR(255),
    `username` VARCHAR(255),
    `password` VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `type`, `username`, `password`) VALUES
(1, 'Jaydee', 'Ballaho', 'admin', 'jaydee','jaydee'),
(2, 'Root', 'Root', 'admin', 'root','root'),
(3, 'Natsu', 'Dragneel', 'user', 'natsu','natsu'),
(4, 'Erza', 'Scarlet', 'user', 'erza','erza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

