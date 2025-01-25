-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 11:01 AM
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
-- Database: `apimanagementtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_ckediter_records`
--

CREATE TABLE `api_ckediter_records` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_ckediter_records`
--

INSERT INTO `api_ckediter_records` (`id`, `message`, `created_at`, `updated_at`) VALUES
(1, '<h2>Hi there! Enter your important notes here :)</h2><p>&nbsp;</p><p>&nbsp;</p><h3>jhdwjhdjhsd</h3>', '2025-01-24 07:09:24', '2025-01-24 09:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `api_records`
--

CREATE TABLE `api_records` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `json_data` text DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_records`
--

INSERT INTO `api_records` (`id`, `name`, `group_name`, `status`, `json_data`, `updated_at`, `created_at`) VALUES
(2, 'Sandeep Prajapati', 'dh', NULL, NULL, '2025-01-24 09:15:40', '2025-01-24 07:12:48'),
(3, '10', NULL, NULL, NULL, '2025-01-24 08:57:00', '2025-01-24 07:12:57'),
(6, 'sjhgsgjsdgj', 'ksssjhhjhj', NULL, NULL, '2025-01-24 09:30:39', '2025-01-24 09:30:28'),
(7, 'hhsjhjhfsjhkjfsh', 'hjgjgjghj', 'Dev Reopen', '{\n\"jhg\"\n}', '2025-01-24 09:31:39', '2025-01-24 09:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_ckediter_records`
--
ALTER TABLE `api_ckediter_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_records`
--
ALTER TABLE `api_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_ckediter_records`
--
ALTER TABLE `api_ckediter_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_records`
--
ALTER TABLE `api_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
