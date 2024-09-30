-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 12:10 AM
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
-- Database: `senior_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `full_name`, `contact_number`, `username`, `password`) VALUES
(1, 'Admin User', '1234567890', 'admin', '$2y$10$er2a0E5uq/xO2N6bfwZS3Owxh.ZFZZ0myUl8fa0tLnqJISnr5oFiO');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_person_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay_name`, `contact_number`, `email`, `contact_person`, `contact_person_number`) VALUES
(8, 'Adaoag', '0987654321223', 'mon@gmail.com', 'mons', '098765434569098'),
(9, 'Bunugan', '0987654321223', 'dathena770@gmail.com', 'mons', '098765434569098'),
(10, 'Remus', '0987654321223', 'dathena770@gmail.com', 'mons', '098765434569098');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_captains`
--

CREATE TABLE `barangay_captains` (
  `id` int(11) NOT NULL,
  `captain_name` varchar(255) NOT NULL,
  `barangay_assigned` varchar(255) NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay_captains`
--

INSERT INTO `barangay_captains` (`id`, `captain_name`, `barangay_assigned`, `contact_number`, `email`, `address`) VALUES
(1, 'necio kudarat ', 'Awallan', '095556668998', 'neciokudarat@gmail.com', 'imurungbaggao'),
(2, 'necio kudarat JJJ', 'Asassi', '095556668998', 'neciokudarat@gmail.com', 'HGFDS'),
(3, 'AAAA..', 'Bagunot', '095556668998', 'neciokudarat@gmail.com', 'HGFDSo'),
(4, 'AAAAnnn', 'Bitag Grande', '095556668998', 'neciokudarat@gmail.com', 'HGFDS'),
(5, 'necio kudarat aka', 'San Vicente', '095556668998', 'neciokudarat@gmail.com', 'HGFDSo'),
(6, 'necio kudarat aka', 'Carupian', '095556668998', 'neciokudarat@gmail.com', 'HGFDSo'),
(7, 'AAAA', 'Catayauan', '095556668998', 'neciokudarat@gmail.com', 'HGFDS');

-- --------------------------------------------------------

--
-- Table structure for table `senior_profiles`
--

CREATE TABLE `senior_profiles` (
  `senior_id` varchar(20) NOT NULL,
  `barangay_assigned` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `birth_place` varchar(150) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `spouse_contact_number` varchar(20) DEFAULT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `with_pension` enum('Yes','No') NOT NULL,
  `monthly_pension` varchar(20) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `emergency_contact_person` varchar(100) DEFAULT NULL,
  `emergency_contact_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `senior_profiles`
--

INSERT INTO `senior_profiles` (`senior_id`, `barangay_assigned`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `age`, `birth_place`, `religion`, `civil_status`, `spouse_name`, `spouse_contact_number`, `address`, `contact_number`, `with_pension`, `monthly_pension`, `status`, `emergency_contact_person`, `emergency_contact_number`) VALUES
('123456', 'Awallan', 'NECIO0', 'pOP', 'AMBOLIGAN', 'Male', '2024-09-04', 90, NULL, NULL, NULL, NULL, NULL, 'Awallan', '', 'Yes', NULL, '', NULL, NULL),
('123456789', 'Asassi', 'NECIO', 'KUDARAT', 'AMBOLIGAN', 'Female', '0000-00-00', 98, 'BAGGAO', 'RC', 'Single', 'JHGF', '0365475768', 'UHGFDSGFDFGDR', NULL, 'Yes', NULL, 'Active', NULL, NULL),
('12689', 'Awallan', 'NECIO', 'KUDARAT', 'AMBOLIGAN', 'Male', '0000-00-00', 91, 'BAGGAO', 'RC', 'Single', 'JHGF', '0365475768', 'yujyu', NULL, 'Yes', NULL, 'Active', NULL, NULL),
('5689', 'Carupian', 'NECIO', 'KUDARAT', 'AMBOLIGAN', 'Male', '0000-00-00', 98, 'BAGGAO', '', 'Single', 'JHGF', '0365475768', 'hjkgk', NULL, 'Yes', NULL, 'Active', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_captains`
--
ALTER TABLE `barangay_captains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senior_profiles`
--
ALTER TABLE `senior_profiles`
  ADD PRIMARY KEY (`senior_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barangay_captains`
--
ALTER TABLE `barangay_captains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
