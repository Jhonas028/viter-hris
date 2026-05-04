-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 09:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viter_hris_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_aid` int(11) NOT NULL,
  `employee_is_active` tinyint(1) NOT NULL,
  `employee_first_name` varchar(128) NOT NULL,
  `employee_middle_name` varchar(128) NOT NULL,
  `employee_last_name` varchar(128) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_created` datetime NOT NULL,
  `employee_updated` datetime NOT NULL,
  `employee_department_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_aid`, `employee_is_active`, `employee_first_name`, `employee_middle_name`, `employee_last_name`, `employee_email`, `employee_created`, `employee_updated`, `employee_department_id`) VALUES
(4, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(5, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(6, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(7, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(8, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(9, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(10, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(11, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(12, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(13, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(14, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(15, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(16, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(17, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(18, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(19, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(20, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(21, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(22, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(23, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(24, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(25, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(26, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(27, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(28, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(29, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(30, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(31, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(32, 1, 'John', 'Middle', 'Doe', 'johnDoe@gmail.com', '2026-04-17 02:44:05', '2026-04-17 02:44:05', ''),
(33, 1, 'a', '', '', 'asdas@gmail.com', '2026-04-17 10:04:47', '2026-04-17 10:04:47', ''),
(34, 1, 'asd', '', '', 'asd@gmail.com', '2026-04-17 10:04:16', '2026-04-17 10:04:16', ''),
(35, 1, 'jonas', '', '', 'jhonas@gmail.com', '2026-04-17 10:04:28', '2026-04-17 10:04:28', ''),
(36, 1, 'Jhnas', 'G.', 'Sotero', 'soterojhonas028@gmail.com', '2026-04-17 10:04:34', '2026-04-17 10:04:34', ''),
(37, 1, 'asdasdsadsada', 'asdsdsadsadas', 'asd', 'asd@gmail.com', '2026-04-17 12:04:00', '2026-04-17 12:04:00', ''),
(38, 0, 'fczxxzxzx', 'xzxzxzxcz', 'xzxcz', 'ssadfsa@gmaasd', '2026-04-17 12:04:16', '2026-04-17 12:04:16', '');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `memo_aid` int(11) NOT NULL,
  `memo_is_active` tinyint(1) NOT NULL,
  `memo_from` varchar(200) NOT NULL,
  `memo_to` varchar(200) NOT NULL,
  `memo_date` varchar(20) NOT NULL,
  `memo_category` varchar(128) NOT NULL,
  `memo_text` text NOT NULL,
  `memo_created` datetime NOT NULL,
  `memo_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`memo_aid`, `memo_is_active`, `memo_from`, `memo_to`, `memo_date`, `memo_category`, `memo_text`, `memo_created`, `memo_updated`) VALUES
(1, 1, 'aaaa', 'aaaaa', '2026-04-10', 'aaaaa', 'aaaa', '2026-04-22 07:28:53', '2026-04-22 10:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings_department`
--

CREATE TABLE `settings_department` (
  `department_aid` int(11) NOT NULL,
  `department_is_active` tinyint(1) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `department_created` varchar(200) NOT NULL,
  `department_updated` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_department`
--

INSERT INTO `settings_department` (`department_aid`, `department_is_active`, `department_name`, `department_created`, `department_updated`) VALUES
(2, 1, 'AAAA', '2026-04-23 07:32:02', '2026-04-24 08:40:22'),
(4, 1, 'it', '2026-04-24 08:40:31', '2026-04-24 08:41:22'),
(5, 0, 'Sa', '2026-04-24 08:40:48', '2026-04-24 08:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings_notification`
--

CREATE TABLE `settings_notification` (
  `notification_aid` int(11) NOT NULL,
  `notification_is_active` tinyint(1) NOT NULL,
  `notification_first_name` varchar(255) NOT NULL,
  `notification_last_name` varchar(255) NOT NULL,
  `notification_email` varchar(255) NOT NULL,
  `notification_purpose` varchar(20) NOT NULL,
  `notification_created` datetime NOT NULL,
  `notification_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_notification`
--

INSERT INTO `settings_notification` (`notification_aid`, `notification_is_active`, `notification_first_name`, `notification_last_name`, `notification_email`, `notification_purpose`, `notification_created`, `notification_updated`) VALUES
(1, 1, 'asd', 'as', 'ads@asd', 'overtime', '2026-04-24 10:06:05', '2026-04-24 10:57:43'),
(6, 1, 'ccc', 'ccc', 'Ccc@cff', 'leave', '2026-04-24 10:55:48', '2026-04-24 10:55:48'),
(7, 1, 'eeee', 'eeeee', 'eeee@eeee', 'leave', '2026-04-24 10:57:14', '2026-04-24 10:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings_roles`
--

CREATE TABLE `settings_roles` (
  `role_aid` int(11) NOT NULL,
  `role_is_active` tinyint(1) NOT NULL,
  `role_name` varchar(128) NOT NULL,
  `role_code` varchar(50) NOT NULL,
  `role_description` text NOT NULL,
  `role_created` datetime NOT NULL,
  `role_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_roles`
--

INSERT INTO `settings_roles` (`role_aid`, `role_is_active`, `role_name`, `role_code`, `role_description`, `role_created`, `role_updated`) VALUES
(30, 1, 'developer', 'r_is_developer', 'developer', '2026-05-04 08:05:24', '2026-05-04 08:05:24'),
(31, 1, 'viewer', 'r_is_viewer', 'viewer', '2026-05-04 08:05:41', '2026-05-04 08:05:41'),
(32, 1, 'admin', 'r_is_admin', 'admin', '2026-05-04 08:05:48', '2026-05-04 08:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings_users`
--

CREATE TABLE `settings_users` (
  `users_aid` int(11) NOT NULL,
  `users_is_active` tinyint(1) NOT NULL,
  `users_first_name` varchar(255) NOT NULL,
  `users_last_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_role_id` varchar(20) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_key` varchar(255) NOT NULL,
  `users_created` datetime NOT NULL,
  `users_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_users`
--

INSERT INTO `settings_users` (`users_aid`, `users_is_active`, `users_first_name`, `users_last_name`, `users_email`, `users_role_id`, `users_password`, `users_key`, `users_created`, `users_updated`) VALUES
(1, 1, 'asd', 'asd', 'asdas@adsa', '21', '', '', '2026-04-20 12:04:48', '2026-04-20 12:04:48'),
(2, 1, 'aaaaaaaa@asdsa', 'adada', 'asdsda@asds', '24', '', '', '2026-04-20 12:04:24', '2026-04-20 12:04:24'),
(3, 1, 'asd', 'ads', 'asdas@sadds', '24', '', '', '2026-04-20 12:04:28', '2026-04-20 12:04:28'),
(4, 1, 'as', 'ads', 'das@sad', '24', '', '', '2026-04-20 12:04:01', '2026-04-20 12:04:01'),
(5, 1, 'as', 'asd', 'assda@asd', '24', '', '', '2026-04-20 12:04:07', '2026-04-20 12:04:07'),
(6, 1, 'ad', 'asd', 'asd@ads', '24', '', '', '2026-04-20 13:04:37', '2026-04-20 13:04:37'),
(7, 1, 'ad', 'ads', 'asd@asd', '24', '', '', '2026-04-20 13:04:49', '2026-04-20 13:04:49'),
(8, 1, 'asd', 'das', 'as@sd', '25', '', '', '2026-04-20 13:04:25', '2026-04-20 13:04:25'),
(9, 1, 'asd', 'ads', 'ads@sd', '24', '', '', '2026-04-20 13:04:37', '2026-04-20 13:04:37'),
(10, 1, 'as', 'asd', 'as@sdsada', '24', '', '', '2026-04-20 14:04:38', '2026-04-20 14:04:38'),
(11, 1, 'asd', 'asd', 'ads@sad', '25', '', '', '2026-04-20 14:04:08', '2026-04-20 14:04:08'),
(12, 0, 'sad', 'ads', 'das@dsa', '24', '', '', '2026-04-20 14:04:05', '2026-04-20 14:04:05'),
(13, 1, 'jhonas', 'asd', 'asd@gmailcom', '24', '', '', '2026-04-20 15:04:34', '2026-04-20 15:04:34'),
(22, 0, '', '', '', '', '$2y$10$D2HEI6pTKZKgeWI/J5Cda.NHwmvWeDT/V9nli7iWMYBDK8WOIIzOK', '', '2026-05-04 13:05:57', '2026-05-04 15:24:34'),
(23, 1, 'Jhonas', 'Sotero', 'soterojhonas028@gmail.com', '30', '$2y$10$GPCXTpYVS0XJdQJiDqUYg.d2OOsNWzByDygGnYJ19szEvqWbLSes2', '', '2026-05-04 15:05:59', '2026-05-04 15:30:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_aid`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`memo_aid`);

--
-- Indexes for table `settings_department`
--
ALTER TABLE `settings_department`
  ADD PRIMARY KEY (`department_aid`);

--
-- Indexes for table `settings_notification`
--
ALTER TABLE `settings_notification`
  ADD PRIMARY KEY (`notification_aid`);

--
-- Indexes for table `settings_roles`
--
ALTER TABLE `settings_roles`
  ADD PRIMARY KEY (`role_aid`);

--
-- Indexes for table `settings_users`
--
ALTER TABLE `settings_users`
  ADD PRIMARY KEY (`users_aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memo_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings_department`
--
ALTER TABLE `settings_department`
  MODIFY `department_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings_notification`
--
ALTER TABLE `settings_notification`
  MODIFY `notification_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings_roles`
--
ALTER TABLE `settings_roles`
  MODIFY `role_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `settings_users`
--
ALTER TABLE `settings_users`
  MODIFY `users_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
