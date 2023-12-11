-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230713.9706a78544
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 09:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `parking_booking`
--

CREATE TABLE `parking_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `space_id` int(11) DEFAULT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_in_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_out_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_booking`
--

INSERT INTO `parking_booking` (`booking_id`, `user_id`, `space_id`, `booking_time`, `check_in_time`, `check_out_time`) VALUES
(2, 1, 8, '2023-12-11 01:32:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 10, '2023-12-11 01:35:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 10, '2023-12-11 01:38:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 8, '2023-12-11 01:40:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 8, '2023-12-11 01:44:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 8, '2023-12-11 01:45:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 9, '2023-12-11 01:46:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 8, '2023-12-11 01:47:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parking_logs`
--

CREATE TABLE `parking_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `space_id` int(11) DEFAULT NULL,
  `check_in_time` timestamp NULL DEFAULT NULL,
  `check_out_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_logs`
--

INSERT INTO `parking_logs` (`log_id`, `user_id`, `space_id`, `check_in_time`, `check_out_time`) VALUES
(2, 3, 1, '2023-12-03 01:52:57', '2023-12-03 08:11:17'),
(3, 3, 1, '2023-12-03 02:12:28', '2023-12-03 08:12:38'),
(4, 3, 1, '2023-12-03 08:17:37', '2023-12-03 08:18:01'),
(5, 3, 1, '2023-12-03 08:19:34', '2023-12-03 08:23:39'),
(6, 3, 1, '2023-12-03 08:24:24', '2023-12-03 08:24:30'),
(7, 1, 1, '2023-12-03 08:27:30', '2023-12-03 08:27:43'),
(8, 5, 4, '2023-12-03 11:44:35', '2023-12-03 11:45:10'),
(9, 4, 3, '2023-12-03 11:43:44', '2023-12-03 11:45:54'),
(10, 1, 2, '2023-12-03 11:42:10', '2023-12-03 11:46:09'),
(11, 3, 1, '2023-12-03 11:41:38', '2023-12-03 11:46:28'),
(12, 3, 1, '2023-12-04 04:11:52', '2023-12-04 04:12:40'),
(13, 4, 3, '2023-12-11 06:34:34', '2023-12-11 06:44:52'),
(14, 1, 1, '2023-12-11 06:33:20', '2023-12-11 06:55:27'),
(15, 1, 8, '0000-00-00 00:00:00', '2023-12-11 07:35:16'),
(16, 1, 10, '0000-00-00 00:00:00', '2023-12-11 07:36:31'),
(17, 1, 10, '2023-12-11 01:38:47', '2023-12-11 07:39:02'),
(18, 1, 8, '2023-12-11 01:40:31', '2023-12-11 07:43:16'),
(19, 1, 9, '2023-12-11 07:46:38', '2023-12-11 07:47:04'),
(20, 1, 8, '2023-12-11 07:47:47', '2023-12-11 07:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `parking_spaces`
--

CREATE TABLE `parking_spaces` (
  `space_id` int(11) NOT NULL,
  `name_parking` varchar(255) NOT NULL,
  `is_booked` tinyint(1) DEFAULT 0,
  `plat_nomor` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parking_token` varchar(255) DEFAULT NULL,
  `check_in_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_spaces`
--

INSERT INTO `parking_spaces` (`space_id`, `name_parking`, `is_booked`, `plat_nomor`, `user_id`, `parking_token`, `check_in_time`) VALUES
(1, 'PARK1ROW1', 0, NULL, NULL, NULL, NULL),
(2, 'PARK1ROW2', 1, 'AD 1234 QQ', 3, '6576ad529acc4', '2023-12-11 06:33:54'),
(3, 'PARK1ROW3', 1, 'AB 4567 YY', 4, '6576b03435b4e', '2023-12-11 06:46:12'),
(4, 'PARK1ROW4', 1, 'AD 1234 YY', 5, '6576ad911a98a', '2023-12-11 06:34:57'),
(5, 'PARK1ROW5', 0, NULL, NULL, NULL, NULL),
(6, 'PARK1ROW6', 0, NULL, NULL, NULL, NULL),
(7, 'PARK1ROW7', 0, NULL, NULL, NULL, NULL),
(8, 'PARK1ROW8', 0, NULL, NULL, NULL, NULL),
(9, 'PARK1ROW9', 0, NULL, NULL, NULL, NULL),
(10, 'PARK1ROW10', 0, NULL, NULL, NULL, NULL),
(11, 'PARK1ROW11', 0, NULL, NULL, NULL, NULL),
(12, 'PARK1ROW12', 0, NULL, NULL, NULL, NULL),
(13, 'PARK1ROW13', 0, NULL, NULL, NULL, NULL),
(14, 'PARK1ROW14', 0, NULL, NULL, NULL, NULL),
(15, 'PARK1ROW15', 0, NULL, NULL, NULL, NULL),
(16, 'PARK1ROW16', 0, NULL, NULL, NULL, NULL),
(17, 'PARK1ROW17', 0, NULL, NULL, NULL, NULL),
(18, 'PARK1ROW18', 0, NULL, NULL, NULL, NULL),
(19, 'PARK1ROW19', 0, NULL, NULL, NULL, NULL),
(20, 'PARK1ROW20', 0, NULL, NULL, NULL, NULL),
(21, 'PARK1ROW21', 0, NULL, NULL, NULL, NULL),
(22, 'PARK1ROW22', 0, NULL, NULL, NULL, NULL),
(23, 'PARK1ROW23', 0, NULL, NULL, NULL, NULL),
(24, 'PARK1ROW24', 0, NULL, NULL, NULL, NULL),
(25, 'PARK1ROW25', 0, NULL, NULL, NULL, NULL),
(26, 'PARK1ROW26', 0, NULL, NULL, NULL, NULL),
(27, 'PARK1ROW27', 0, NULL, NULL, NULL, NULL),
(28, 'PARK1ROW28', 0, NULL, NULL, NULL, NULL),
(29, 'PARK1ROW29', 0, NULL, NULL, NULL, NULL),
(30, 'PARK1ROW30', 0, NULL, NULL, NULL, NULL),
(31, 'PARK1ROW31', 0, NULL, NULL, NULL, NULL),
(32, 'PARK1ROW32', 0, NULL, NULL, NULL, NULL),
(33, 'PARK1ROW33', 0, NULL, NULL, NULL, NULL),
(34, 'PARK1ROW34', 0, NULL, NULL, NULL, NULL),
(35, 'PARK1ROW35', 0, NULL, NULL, NULL, NULL),
(36, 'PARK1ROW36', 0, NULL, NULL, NULL, NULL),
(37, 'PARK1ROW37', 0, NULL, NULL, NULL, NULL),
(38, 'PARK1ROW38', 0, NULL, NULL, NULL, NULL),
(39, 'PARK1ROW39', 0, NULL, NULL, NULL, NULL),
(40, 'PARK1ROW40', 0, NULL, NULL, NULL, NULL),
(41, 'PARK1ROW41', 0, NULL, NULL, NULL, NULL),
(42, 'PARK1ROW42', 0, NULL, NULL, NULL, NULL),
(43, 'PARK1ROW43', 0, NULL, NULL, NULL, NULL),
(44, 'PARK1ROW44', 0, NULL, NULL, NULL, NULL),
(45, 'PARK1ROW45', 0, NULL, NULL, NULL, NULL),
(46, 'PARK1ROW46', 0, NULL, NULL, NULL, NULL),
(47, 'PARK1ROW47', 0, NULL, NULL, NULL, NULL),
(48, 'PARK1ROW48', 0, NULL, NULL, NULL, NULL),
(49, 'PARK1ROW49', 0, NULL, NULL, NULL, NULL),
(50, 'PARK1ROW50', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'masjek', 'masjek@gmail.com', '$2y$10$CVkTogr0uz2kYjYdkeOQSOu4RVUSt7msZJotDdGSlKQ9YnS6n43fq'),
(3, 'rangga', 'rangga@gmail.com', '$2y$10$4AtCc5c4SYFYHkvBV2KwFex.zkx00Dvm3EAdmmdkMT2cXbFq2KAte'),
(4, 'nopal', 'nopal@gmail.com', '$2y$10$us41MUXTsjkcigsE1C/KOeBazOQDPoelVQxstovMZ4ZU8DxugpKMG'),
(5, 'ilham', 'ilham@gmail.com', '$2y$10$voikkhuxu3YwUp7UpAzjQuuYEQg5EBh/FNsQ0I1Ch1KpTG6RpVS.y'),
(6, 'admin', 'admin@gmail.com', '$2y$10$2refXVRdowRY/EIL3W8j3OHmwwW5lvgOYWi9ZAn/YrSD1CrZkrxJO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parking_booking`
--
ALTER TABLE `parking_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `space_id` (`space_id`) USING BTREE;

--
-- Indexes for table `parking_logs`
--
ALTER TABLE `parking_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `space_id` (`space_id`) USING BTREE;

--
-- Indexes for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  ADD PRIMARY KEY (`space_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking_booking`
--
ALTER TABLE `parking_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parking_logs`
--
ALTER TABLE `parking_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  MODIFY `space_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parking_booking`
--
ALTER TABLE `parking_booking`
  ADD CONSTRAINT `parking_booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `parking_booking_ibfk_2` FOREIGN KEY (`space_id`) REFERENCES `parking_spaces` (`space_id`);

--
-- Constraints for table `parking_logs`
--
ALTER TABLE `parking_logs`
  ADD CONSTRAINT `parking_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `parking_logs_ibfk_2` FOREIGN KEY (`space_id`) REFERENCES `parking_spaces` (`space_id`);

--
-- Constraints for table `parking_spaces`
--
ALTER TABLE `parking_spaces`
  ADD CONSTRAINT `parking_spaces_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
