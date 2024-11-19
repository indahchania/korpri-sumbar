-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2024 at 01:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `korpri_sumbar`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrier`
--

CREATE TABLE `carrier` (
  `carrier_id` int NOT NULL,
  `carrier_tittle` varchar(50) NOT NULL,
  `carrier_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `carrier_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `carrier_content` varchar(1000) NOT NULL,
  `carrier_img` blob NOT NULL,
  `carrier_status` varchar(50) NOT NULL,
  `carcategory_id` int NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrier_category`
--

CREATE TABLE `carrier_category` (
  `carcategory_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int NOT NULL,
  `content_tittle` varchar(200) NOT NULL,
  `content_author` varchar(200) NOT NULL,
  `content_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content_body` varchar(500) NOT NULL,
  `content_img` blob NOT NULL,
  `content_file` longblob NOT NULL,
  `content_status` varchar(50) NOT NULL,
  `concategory_id` int NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_category`
--

CREATE TABLE `content_category` (
  `concategory_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int NOT NULL,
  `pages_tittle` varchar(200) NOT NULL,
  `pages_author` varchar(100) NOT NULL,
  `pages_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pages_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pages_body` varchar(1000) NOT NULL,
  `pages_img` blob NOT NULL,
  `pages_status` varchar(30) NOT NULL,
  `pages_name` varchar(50) NOT NULL,
  `users_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_name` varchar(200) NOT NULL,
  `users_uname` varchar(50) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_pass` varchar(20) NOT NULL,
  `users_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrier`
--
ALTER TABLE `carrier`
  ADD PRIMARY KEY (`carrier_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `carcategory_id` (`carcategory_id`);

--
-- Indexes for table `carrier_category`
--
ALTER TABLE `carrier_category`
  ADD PRIMARY KEY (`carcategory_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `concategory_id` (`concategory_id`);

--
-- Indexes for table `content_category`
--
ALTER TABLE `content_category`
  ADD PRIMARY KEY (`concategory_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrier`
--
ALTER TABLE `carrier`
  ADD CONSTRAINT `carrier_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carrier_ibfk_2` FOREIGN KEY (`carcategory_id`) REFERENCES `carrier_category` (`carcategory_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`concategory_id`) REFERENCES `content_category` (`concategory_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
