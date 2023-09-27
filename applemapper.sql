-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 12:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applemapper`
--

-- --------------------------------------------------------

--
-- Table structure for table `apples`
--

CREATE TABLE `apples` (
  `id` int(11) NOT NULL,
  `apple_id` varchar(30) NOT NULL,
  `yop` date NOT NULL,
  `breed_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `image_data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apple_breeds`
--

CREATE TABLE `apple_breeds` (
  `id` int(11) NOT NULL,
  `breed_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(3, 'Godfrey W Kariuki', 'godfreykarisw@gmail.com'),
(5, 'Godfrey W Kariuki', 'oketchs702@gmail.com'),
(6, 'Godfrey W Kariuki', 'oke@gmail.com'),
(12, 'Godfrey Karis', 'godfreykaris25@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_register`
--

CREATE TABLE `users_register` (
  `user_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_register`
--

INSERT INTO `users_register` (`user_id`, `email`, `password`, `role`) VALUES
(3, 'oke@gmail.com', '$2y$10$7Tu2jtXTaypPVpkX2devneDbwkSpyoA7HkN2O7r6CIB0rZYtnJ8NS', 2),
(5, 'oketchs702@gmail.com', '$2y$10$tqU3gOPoKDFfeS8tfFWL9eQa5ZBhzCBADxuRTYKfB8nwdLXqLk3UG', 2),
(6, 'godfreykaris254@gmail.com', '$2y$10$kDrrHyeIp.brFEqsT2/VUefanw9h80wRd5PYmHL.VWN7T9zgi6GN2', 2),
(9, 'godfreykaris25@gmail.com', '$2y$10$4pUXhXZxFJfhAEyo6OofY.1jqDqJa0I04R8hMPY0P1JBVLOxfBOJ2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apples`
--
ALTER TABLE `apples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breed` (`breed_id`);

--
-- Indexes for table `apple_breeds`
--
ALTER TABLE `apple_breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_register`
--
ALTER TABLE `users_register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apples`
--
ALTER TABLE `apples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `apple_breeds`
--
ALTER TABLE `apple_breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_register`
--
ALTER TABLE `users_register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apples`
--
ALTER TABLE `apples`
  ADD CONSTRAINT `apples_ibfk_1` FOREIGN KEY (`breed_id`) REFERENCES `apple_breeds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
