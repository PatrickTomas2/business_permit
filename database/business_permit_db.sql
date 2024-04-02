-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 11:05 AM
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
-- Database: `business_permit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_designation_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_designation_id`, `username`, `password`, `user_type`) VALUES
(7, '1', 'maria123', 'maria123', 'permit'),
(9, '123', 'admin_fire_one', 'fire_one', 'fire'),
(10, '123', 'sanitary_admin', 'sanitary_admin', 'sanitary'),
(11, '2', 'jude1', 'jude1', 'permit'),
(24, '6606dec54add6', 'patrick123', 'patrick123', 'owner'),
(25, '6606df6f2a173', 'lanny11', 'lanny11', 'owner'),
(26, '6606e05aed641', '123456', '123456', 'owner'),
(27, '6606e10e03f1c', 'asd', 'asd', 'owner'),
(29, '6607b745edca7', 'topetope', 'qwerty123', 'owner'),
(30, '6609228b0eec4', '1', '1', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `admin_business_permit`
--

CREATE TABLE `admin_business_permit` (
  `admin_id` varchar(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_business_permit`
--

INSERT INTO `admin_business_permit` (`admin_id`, `admin_name`) VALUES
('1', 'Maria Clara Sy'),
('2', 'Jude Criston');

-- --------------------------------------------------------

--
-- Table structure for table `business_registration`
--

CREATE TABLE `business_registration` (
  `business_id` varchar(50) NOT NULL,
  `owner_id` varchar(50) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `business_houseNumber` varchar(50) NOT NULL,
  `business_barangay` varchar(50) NOT NULL,
  `business_zone` varchar(50) NOT NULL,
  `business_type` varchar(50) NOT NULL,
  `business_phone` varchar(20) NOT NULL,
  `business_email` varchar(20) NOT NULL,
  `business_register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_registration`
--

INSERT INTO `business_registration` (`business_id`, `owner_id`, `business_name`, `business_houseNumber`, `business_barangay`, `business_zone`, `business_type`, `business_phone`, `business_email`, `business_register_date`) VALUES
('6606e304a67fa', '6606e10e03f1c', 'Mars Computer Shop', 'lot 234', 'Poblacion East', '1', 'Computer shop', '09123456789', 'computershop@gmail.c', '2024-03-29 23:49:24'),
('660799fdbe3f8', '6607995edbfa3', 'mcdo', '21', 'Poblacion East', '3', 'Food', '0912212121', 'md@gmail.com', '2024-03-30 12:50:05'),
('66079a1ed90e6', '6607995edbfa3', 'Jabee', '2121', 'La Luna', '1', 'Foods', '21212121', 'r@gmail.com', '2024-03-30 12:50:38'),
('6607b76b2ea28', '6607b745edca7', 'Mcdo', '11', 'Santo Niño', '1', 'Food', '091111111111', 'mcdo@gmail.com', '2024-03-30 14:55:39'),
('660804b1e1394', '6606e10e03f1c', 'Mcdo', '11', 'La Luna', '2', 'Food', '09123456789', 'mcdo@gmail.com', '2024-03-30 20:25:21'),
('660804dca2e78', '6606e10e03f1c', 'jabeee', '31', 'San Antonio', '4', 'Food', '0911111111', 'jabee@gmail.comm', '2024-03-30 20:26:04'),
('66080bb7a69b6', '6606e10e03f1c', 'kfc', '11', 'Poblacion West', '2', 'Food', '0900000000', 'kfc@gmail.comm', '2024-03-30 20:55:19'),
('66080f9d53524', '6606dec54add6', '7/11', '11', 'Poblacion East', '3', 'Food', '0921212121', 'food@gmail.com', '2024-03-30 21:11:57'),
('6608ea28c79b2', '6606e10e03f1c', 'fs', 'dsaa', 'Salvacion', '1', 'afsd', '3232', 'dfsa', '2024-03-31 12:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `fire_inspection_admin`
--

CREATE TABLE `fire_inspection_admin` (
  `admin_id` varchar(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fire_inspection_admin`
--

INSERT INTO `fire_inspection_admin` (`admin_id`, `admin_name`) VALUES
('123', 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `owner_checklist`
--

CREATE TABLE `owner_checklist` (
  `owner_id` varchar(50) NOT NULL,
  `requirement1` tinyint(1) NOT NULL DEFAULT 0,
  `requirement2` tinyint(1) NOT NULL DEFAULT 0,
  `requirement3` tinyint(1) NOT NULL DEFAULT 0,
  `requirement4` tinyint(1) NOT NULL DEFAULT 0,
  `requirement5` tinyint(1) NOT NULL DEFAULT 0,
  `requirement6` tinyint(1) NOT NULL DEFAULT 0,
  `requirement7` tinyint(1) NOT NULL DEFAULT 0,
  `requirement8` tinyint(1) NOT NULL DEFAULT 0,
  `requirement9` tinyint(1) NOT NULL DEFAULT 0,
  `requirement10` tinyint(1) NOT NULL DEFAULT 0,
  `requirement11` tinyint(1) NOT NULL DEFAULT 0,
  `requirement12` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_checklist`
--

INSERT INTO `owner_checklist` (`owner_id`, `requirement1`, `requirement2`, `requirement3`, `requirement4`, `requirement5`, `requirement6`, `requirement7`, `requirement8`, `requirement9`, `requirement10`, `requirement11`, `requirement12`) VALUES
('6606e10e03f1c', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
('6607b745edca7', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('6609228b0eec4', 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner_information`
--

CREATE TABLE `owner_information` (
  `owner_id` varchar(50) NOT NULL,
  `owner_fname` varchar(50) NOT NULL,
  `owner_lname` varchar(50) NOT NULL,
  `owner_contactNumber` varchar(50) NOT NULL,
  `owner_houseNumber` varchar(20) NOT NULL,
  `owner_barangay` varchar(20) NOT NULL,
  `owner_zone` varchar(5) NOT NULL,
  `owner_registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_information`
--

INSERT INTO `owner_information` (`owner_id`, `owner_fname`, `owner_lname`, `owner_contactNumber`, `owner_houseNumber`, `owner_barangay`, `owner_zone`, `owner_registration_date`) VALUES
('6606dec54add6', 'Patrick John', 'Tomas', '09084594021', '176', 'San Antonio', '3', '2024-03-29 23:31:17'),
('6606e05aed641', 'Lanny Marie', 'Forger', '09876543212', '1313', 'La Luna', '1', '2024-03-29 23:38:02'),
('6606e10e03f1c', 'asda', 'asd', 'asd', 'asd', 'La Luna', '1', '2024-03-29 23:41:02'),
('6607995edbfa3', 'Christopherson', 'Carpio', '09123456789', '11', 'La Luna', '1', '2024-03-30 12:47:26'),
('6607b745edca7', 'Christopherson', 'Carpio', '09121212121', '69', 'Santo Domingo', '4', '2024-03-30 14:55:01'),
('6609228b0eec4', 'tope', '1', '1', '1', 'Poblacion West', '1', '2024-03-31 16:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `sanitary_inspection_admin`
--

CREATE TABLE `sanitary_inspection_admin` (
  `admin_id` varchar(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanitary_inspection_admin`
--

INSERT INTO `sanitary_inspection_admin` (`admin_id`, `admin_name`) VALUES
('123', 'Katin Koh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `Fk_accounts_owner_information` (`account_designation_id`);

--
-- Indexes for table `admin_business_permit`
--
ALTER TABLE `admin_business_permit`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `business_registration`
--
ALTER TABLE `business_registration`
  ADD PRIMARY KEY (`business_id`),
  ADD KEY `Fk_owner-business` (`owner_id`);

--
-- Indexes for table `fire_inspection_admin`
--
ALTER TABLE `fire_inspection_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `owner_information`
--
ALTER TABLE `owner_information`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `sanitary_inspection_admin`
--
ALTER TABLE `sanitary_inspection_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_registration`
--
ALTER TABLE `business_registration`
  ADD CONSTRAINT `Fk_owner-business` FOREIGN KEY (`owner_id`) REFERENCES `owner_information` (`owner_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
