-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2022 at 02:56 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_us`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `photo`, `created_at`) VALUES
(1, 'moe chan myae', 'chankin@gmail.com', '09123456781', 'store/62e3ec5609452one.jpeg', '2022-07-29 14:05:00'),
(2, 'susu', 'susu@gmail.com', '09123456781', 'store/62e3e91b07f1etwo.jpeg', '2022-07-29 14:05:15'),
(3, 'kyaw kyaw', 'kk@gmail.com', '09123456781', 'store/62e3ec711a7b0three.jpeg', '2022-07-29 14:19:29'),
(4, 'mgmg', 'mgmg@gmail.com', '09123456781', 'store/62e3ec7de7dd1six.jpeg', '2022-07-29 14:19:41'),
(5, 'chankin', 'chankin@gmail.com', '09123456781', 'store/62e3ecd5d66deseven.jpeg', '2022-07-29 14:21:09'),
(6, 'admin', 'admin@gmail.com', '09123456781', 'store/62e3ece7adc77five.jpeg', '2022-07-29 14:21:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
