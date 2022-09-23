-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 03:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odc_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `file` varchar(2000) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `file`, `branch_id`) VALUES
(7, 'Capture.PNG', 5),
(8, 'New Text Document.txt', 3),
(9, '122.PNG', 4),
(10, '21.PNG', 3),
(11, '33.PNG', 4);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`) VALUES
(3, 'Alex'),
(4, 'Luxor'),
(5, 'Cairo');

-- --------------------------------------------------------

--
-- Table structure for table `odc_users`
--

CREATE TABLE `odc_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_type` varchar(200) NOT NULL,
  `branches_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odc_users`
--

INSERT INTO `odc_users` (`id`, `name`, `email`, `phone`, `password`, `admin`, `course_name`, `course_type`, `branches_id`, `active`) VALUES
(26, 'mohamed amr', 'mohamed13@gmail.com', '0126464677', '123', 1, 'php', 'online', 5, 1),
(28, 'noureldin', ' nour12@gmail.com', '01164614677', ' 123', 0, 'php', 'online', 3, 1),
(29, 'ahmed', ' ah1412@g.com', '01164614677', ' 123', 0, 'php', 'offline', 4, 1),
(32, 'hassan', 'ha12@g.com', '0126464677', '145', 0, 'php', 'online', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branche_id` (`branch_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `odc_users`
--
ALTER TABLE `odc_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_id` (`branches_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odc_users`
--
ALTER TABLE `odc_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odc_users`
--
ALTER TABLE `odc_users`
  ADD CONSTRAINT `odc_users_ibfk_1` FOREIGN KEY (`branches_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
