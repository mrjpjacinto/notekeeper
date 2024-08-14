-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 11:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notepad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `color`, `date_created`, `user_id`) VALUES
(63, 'A Song of Ice and Fire', 'the besttttttttt', 'default-color', '2024-08-14 14:01:21', 14),
(64, 'khylle', 'gabaawrrwawrra', 'default-color', '2024-08-14 14:10:53', 14),
(65, 'fefefef', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaffsdbjksdfbskjdfbsjlvfsehf', 'default-color', '2024-08-14 14:30:21', 14),
(68, 'lorem ipsum', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww\r\nwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww\r\nwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'default-color', '2024-08-14 14:40:44', 14),
(69, 'song', 'vvvvxcvcxvxcccccccccccccccccccccccccccccc', 'default-color', '2024-08-14 14:46:03', 14),
(70, 'zxc', 'zxc', 'default-color', '2024-08-14 17:14:34', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `uname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `passwd`, `fname`, `lname`, `uname`) VALUES
(14, 'khylle@gmail.com', '$2y$10$k3ji23HCnqy404SOmTHtRuyp0/C6qQcSszH/vztErJIYeUxur5b66', 'Khylle', 'Diño', 'khylle0'),
(15, 'sasuke@gmail.com', '$2y$10$v.G13NEnHE.FMl0vfw0u7u33iIhKlqhMhhbNeVRV/fd/8wmpetvKi', 'sasuke', 'sasuke', 'sasuke'),
(16, 'tope@gmail.com', '$2y$10$Hz4t9yRAGvQhf3xkJiV/N.vSlS65EAExasGNrvCFsiLvuhSz2dDBe', 'tope', 'tope', 'tope'),
(18, 'fafo@gmail.com', '$2y$10$Rv7N19zNYhoGnaQ8KZhFzeSI6iORb7gZYW.rola3M80wI06JxZhPW', 'fafo', 'fafo', 'fafo'),
(19, 'faye@gmail.com', '$2y$10$.CAUQgMLd/bCQ45DVTuioeEBFQKfm2Mdb3tTgrjMbQkDicNnoIPhy', 'faye', 'faye', 'faye'),
(20, 'khylled.0727@gmail.com', '$2y$10$kV5vgJCBw5G5EKYlP8v7JOmdex9.rehHnQH5wNOyz7c6x/be.1PJ2', 'Khylle', 'khylle', 'khylleeeeeee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
