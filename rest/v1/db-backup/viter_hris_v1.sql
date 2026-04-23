-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2026 at 01:13 AM
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
  `employee_department_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_aid`, `employee_is_active`, `employee_first_name`, `employee_middle_name`, `employee_last_name`, `employee_email`, `employee_created`, `employee_updated`, `employee_department_id`) VALUES
(3, 1, 'asd', 'asd', 'asd', 'asd@asd', '2026-04-23 07:38:19', '2026-04-23 07:38:19', '2');

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
(2, 1, 'Marketing', '2026-04-23 07:32:02', '2026-04-23 07:32:02'),
(3, 1, 'IT', '2026-04-23 14:26:17', '2026-04-23 14:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings_roles`
--

CREATE TABLE `settings_roles` (
  `role_aid` int(11) NOT NULL,
  `role_is_active` tinyint(1) NOT NULL,
  `role_name` varchar(128) NOT NULL,
  `role_description` text NOT NULL,
  `role_created` datetime NOT NULL,
  `role_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_roles`
--

INSERT INTO `settings_roles` (`role_aid`, `role_is_active`, `role_name`, `role_description`, `role_created`, `role_updated`) VALUES
(27, 1, 'developer', 'developer', '2026-04-21 07:04:02', '2026-04-21 07:04:02'),
(28, 1, 'UI/UX', 'UI/UX', '2026-04-21 07:04:52', '2026-04-21 07:04:52');

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
  `users_created` datetime NOT NULL,
  `users_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings_users`
--

INSERT INTO `settings_users` (`users_aid`, `users_is_active`, `users_first_name`, `users_last_name`, `users_email`, `users_role_id`, `users_password`, `users_created`, `users_updated`) VALUES
(1, 1, 'asd', 'asd', 'asdas@adsa', '21', '', '2026-04-20 12:04:48', '2026-04-20 12:04:48'),
(2, 1, 'aaaaaaaa@asdsa', 'adada', 'asdsda@asds', '24', '', '2026-04-20 12:04:24', '2026-04-20 12:04:24'),
(3, 1, 'asd', 'ads', 'asdas@sadds', '24', '', '2026-04-20 12:04:28', '2026-04-20 12:04:28'),
(4, 1, 'as', 'ads', 'das@sad', '24', '', '2026-04-20 12:04:01', '2026-04-20 12:04:01'),
(5, 1, 'as', 'asd', 'assda@asd', '24', '', '2026-04-20 12:04:07', '2026-04-20 12:04:07'),
(6, 1, 'ad', 'asd', 'asd@ads', '24', '', '2026-04-20 13:04:37', '2026-04-20 13:04:37'),
(7, 1, 'ad', 'ads', 'asd@asd', '24', '', '2026-04-20 13:04:49', '2026-04-20 13:04:49'),
(8, 1, 'asd', 'das', 'as@sd', '25', '', '2026-04-20 13:04:25', '2026-04-20 13:04:25'),
(9, 1, 'asd', 'ads', 'ads@sd', '24', '', '2026-04-20 13:04:37', '2026-04-20 13:04:37'),
(10, 1, 'as', 'asd', 'as@sdsada', '24', '', '2026-04-20 14:04:38', '2026-04-20 14:04:38'),
(11, 1, 'asd', 'asd', 'ads@sad', '25', '', '2026-04-20 14:04:08', '2026-04-20 14:04:08'),
(12, 0, 'sad', 'ads', 'das@dsa', '24', '', '2026-04-20 14:04:05', '2026-04-20 14:04:05'),
(13, 1, 'jhonas', 'asd', 'asd@gmailcom', '24', '', '2026-04-20 15:04:34', '2026-04-20 15:04:34'),
(14, 1, 'asd', 'asd', 'asdas@sad', '23', '', '2026-04-21 07:04:29', '2026-04-21 07:04:29'),
(15, 1, 'fffff', 'ffff', 'asd@asd', '26', '', '2026-04-21 07:04:05', '2026-04-21 07:04:05'),
(16, 1, 'asd', 'asd', 'asd@asasd', '23', '', '2026-04-21 07:04:02', '2026-04-21 07:04:02'),
(18, 1, 'jhonas', 'asdasd', 'dasda@gmail.com', '27', '', '2026-04-21 07:04:42', '2026-04-21 10:04:19'),
(25, 1, 'jhonas', 'hijkhkjbkj', 'dasdahjghj@gmail.com', '27', '', '2026-04-21 10:04:04', '2026-04-21 10:04:57'),
(27, 1, 'jhonas', 'ghjkghjguijk', 'jklhkjhjl@gmail.com', '27', '', '2026-04-21 10:04:31', '2026-04-21 10:04:31');

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
  MODIFY `employee_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `memo_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings_department`
--
ALTER TABLE `settings_department`
  MODIFY `department_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings_roles`
--
ALTER TABLE `settings_roles`
  MODIFY `role_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings_users`
--
ALTER TABLE `settings_users`
  MODIFY `users_aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
