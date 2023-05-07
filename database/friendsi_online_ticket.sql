-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 05:58 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendsi_online_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `sell_ticket_history`
--

CREATE TABLE `sell_ticket_history` (
  `s_no` int(255) NOT NULL,
  `ticket_id` varchar(60) NOT NULL,
  `coach_no` varchar(60) NOT NULL,
  `coach_id` varchar(60) NOT NULL,
  `route` varchar(90) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(60) NOT NULL,
  `seat` varchar(30) NOT NULL,
  `fare` int(6) NOT NULL,
  `total_fare` int(6) NOT NULL,
  `station` varchar(60) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `insert_date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_ticket_history`
--

INSERT INTO `sell_ticket_history` (`s_no`, `ticket_id`, `coach_no`, `coach_id`, `route`, `date`, `time`, `seat`, `fare`, `total_fare`, `station`, `mobile`, `name`, `gender`, `insert_date_time`) VALUES
(1, '6454c6388c91a', '101', '10456', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'A1', 700, 700, 'Khulna - 700', '01747503257', 'MR. Mafuz Alam', 'Male', '2023-05-05 15:02:48.575938'),
(2, '6454ef7679f80', '101', '10456', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'A3', 500, 500, 'Gopalgonj', '01747503257', 'MR. Mafuz Alam', 'Male', '2023-05-05 17:58:46.499641'),
(3, '6454f014522fd', '101', '10456', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'B1B2', 600, 1200, 'Fakirhat', '01747503257', 'MR. Mafuz Alam', 'Female', '2023-05-05 18:01:24.336727'),
(4, '6454f084dbbb5', '101', '24226', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'A4', 600, 600, 'Nawapara', '01751944774', 'MR. ', '', '2023-05-05 18:03:16.900093'),
(5, '6454f0e15ef91', '101', '24226', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'B4', 500, 500, 'Gopalgonj', '01747503257', 'MR. Mafuz Alam', '', '2023-05-05 18:04:49.389151'),
(6, '6454f10c9f8ba', '101', '24226', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'C4', 500, 500, 'Gopalgonj', '01747503257', 'MR. Mafuz Alam', '', '2023-05-05 18:05:32.653547'),
(7, '6454f4149a23b', '101', '10456', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'A4', 450, 450, 'Muksudpur', '01747503257', 'MR. Mafuz Alam', 'Male', '2023-05-05 18:18:28.631496'),
(8, '64550dfcd7f17', '101', '10456', 'Dhaka - Gopalganj - Khulna', '2023-05-05', '06:30 AM', 'J5', 450, 0, 'Muksudpur', '+9656565', 'MR. mafuz', 'Female', '2023-05-05 20:09:00.884573');

-- --------------------------------------------------------

--
-- Table structure for table `trip_status`
--

CREATE TABLE `trip_status` (
  `s_no` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `coach_no` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `date` varchar(60) NOT NULL,
  `time` varchar(60) NOT NULL,
  `route` varchar(255) NOT NULL,
  `station` text NOT NULL,
  `A1` int(1) NOT NULL DEFAULT 0,
  `A2` int(1) NOT NULL DEFAULT 0,
  `A3` int(1) NOT NULL DEFAULT 0,
  `A4` int(1) NOT NULL DEFAULT 0,
  `B1` int(1) NOT NULL DEFAULT 0,
  `B2` int(1) NOT NULL DEFAULT 0,
  `B3` int(1) NOT NULL DEFAULT 0,
  `B4` int(1) NOT NULL DEFAULT 0,
  `C1` int(1) NOT NULL DEFAULT 0,
  `C2` int(1) NOT NULL DEFAULT 0,
  `C3` int(1) NOT NULL DEFAULT 0,
  `C4` int(1) NOT NULL DEFAULT 0,
  `D1` int(1) NOT NULL DEFAULT 0,
  `D2` int(1) NOT NULL DEFAULT 0,
  `d3` int(1) NOT NULL DEFAULT 0,
  `d4` int(1) NOT NULL DEFAULT 0,
  `e1` int(1) NOT NULL DEFAULT 0,
  `e2` int(1) NOT NULL DEFAULT 0,
  `e3` int(1) NOT NULL DEFAULT 0,
  `e4` int(1) NOT NULL DEFAULT 0,
  `f1` int(1) NOT NULL DEFAULT 0,
  `f2` int(1) NOT NULL DEFAULT 0,
  `f3` int(1) NOT NULL DEFAULT 0,
  `f4` int(1) NOT NULL DEFAULT 0,
  `g1` int(1) NOT NULL DEFAULT 0,
  `g2` int(1) NOT NULL DEFAULT 0,
  `g3` int(1) NOT NULL DEFAULT 0,
  `g4` int(1) NOT NULL DEFAULT 0,
  `h1` int(1) NOT NULL DEFAULT 0,
  `h2` int(1) NOT NULL DEFAULT 0,
  `h3` int(1) NOT NULL DEFAULT 0,
  `h4` int(1) NOT NULL DEFAULT 0,
  `i1` int(1) NOT NULL DEFAULT 0,
  `i2` int(1) NOT NULL DEFAULT 0,
  `i3` int(1) NOT NULL DEFAULT 0,
  `i4` int(1) NOT NULL DEFAULT 0,
  `j1` int(1) NOT NULL DEFAULT 0,
  `j2` int(1) NOT NULL DEFAULT 0,
  `j3` int(1) NOT NULL DEFAULT 0,
  `j4` int(1) NOT NULL DEFAULT 0,
  `j5` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_status`
--

INSERT INTO `trip_status` (`s_no`, `id`, `coach_no`, `status`, `date`, `time`, `route`, `station`, `A1`, `A2`, `A3`, `A4`, `B1`, `B2`, `B3`, `B4`, `C1`, `C2`, `C3`, `C4`, `D1`, `D2`, `d3`, `d4`, `e1`, `e2`, `e3`, `e4`, `f1`, `f2`, `f3`, `f4`, `g1`, `g2`, `g3`, `g4`, `h1`, `h2`, `h3`, `h4`, `i1`, `i2`, `i3`, `i4`, `j1`, `j2`, `j3`, `j4`, `j5`) VALUES
(1, '23356', '101', 1, '2023-05-01', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '5368', '180', 1, '2023-05-01', '10:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '44401', '210', 1, '2023-05-01', '06:00 AM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '41024', '295', 1, '2023-05-01', '11:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '71714', '310', 1, '2023-05-01', '06:15 AM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '54471', '390', 1, '2023-05-01', '10:15 PM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '11798', '410', 1, '2023-05-01', '06:45 AM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '16692', '470', 1, '2023-05-01', '09:45 PM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '10456', '101', 1, '2023-05-05', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, '24226', '101', 1, '2023-05-05', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 550, Nawapara - 600, Khulna -700', 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '38467', '101', 1, '2023-05-06', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '82486', '110', 1, '2023-05-06', '08:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '37821', '115', 1, '2023-05-06', '09:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '62970', '130', 1, '2023-05-06', '12:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, '18059', '165', 1, '2023-05-06', '07:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, '81332', '210', 1, '2023-05-06', '06:00 AM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, '50446', '240', 1, '2023-05-06', '12:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, '73749', '255', 1, '2023-05-06', '03:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, '28944', '295', 1, '2023-05-06', '11:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, '74215', '310', 1, '2023-05-06', '06:15 AM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, '15137', '340', 1, '2023-05-06', '12:15 PM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, '33532', '340', 1, '2023-05-06', '12:15 PM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, '58910', '370', 1, '2023-05-06', '06:15 PM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, '61867', '410', 1, '2023-05-06', '06:45 AM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '43413', '425', 1, '2023-05-06', '09:45 AM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '88294', '470', 1, '2023-05-06', '09:45 PM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, '16570', '455', 1, '2023-05-06', '03:45 PM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_type` int(5) NOT NULL,
  `counter_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `password` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `counter_name`, `user_name`, `mobile`, `password`) VALUES
(1, 1, 'Hemayetpur', 'Mafuz Alam', '01747503257', 123456),
(2, 3, 'Hemayetpur', 'MD Titu Mir', '01751944774', 123456),
(3, 3, 'Gabtoli', 'MR Sagor', '01918851337', 19188);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sell_ticket_history`
--
ALTER TABLE `sell_ticket_history`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `trip_status`
--
ALTER TABLE `trip_status`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sell_ticket_history`
--
ALTER TABLE `sell_ticket_history`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trip_status`
--
ALTER TABLE `trip_status`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
