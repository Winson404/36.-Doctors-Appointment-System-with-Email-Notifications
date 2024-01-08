-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 05:28 PM
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
-- Database: `frial_capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Id` int(11) NOT NULL,
  `studNum` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `selectedDate` varchar(20) NOT NULL,
  `selectedTime` varchar(20) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 1 COMMENT '0=Unavailable, 1=Available',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `studNum`, `name`, `email`, `phone`, `selectedDate`, `selectedTime`, `doctor`, `message`, `availability`, `date_added`) VALUES
(11, 201910034, 'Michael  Ramilo ', 'sonerwin12@gmail.com', '43432342', '2023-11-13', '11:00 - 11:15 AM', 'Leovihilda Chan Cheng (School Dentist)', 'Sample', 0, '2023-10-11 21:20:32'),
(12, 202110379, 'John Christopher  Paras ', 'sonerwin12@ccp.edu.ph', '09269228230', '2023-11-28', '11:15 - 11:30 AM', 'Barbara Velayo Diuco (School Physician)', '', 1, '2023-11-23 23:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`log_Id`, `user_Id`, `login_time`, `logout_time`) VALUES
(43, 66, '2023-11-10 12:54 PM', ''),
(44, 66, '2023-11-10 09:12 PM', ''),
(45, 66, '2023-11-10 11:49 PM', ''),
(46, 66, '2023-11-23 10:55 PM', '2023-11-23 11:03:52'),
(47, 67, '2023-11-23 11:04 PM', '2023-11-23 11:10:47'),
(48, 67, '2023-11-23 11:12 PM', '2023-11-23 11:14:22'),
(49, 66, '2023-11-23 11:14 PM', '2023-11-23 11:22:36'),
(50, 67, '2023-11-23 11:22 PM', '2023-11-23 11:22:47'),
(51, 66, '2023-11-23 11:22 PM', '2023-11-24 12:11:30'),
(52, 66, '2023-11-24 12:22 AM', '2023-11-24 12:22:50'),
(53, 66, '2023-11-24 12:28 AM', '2023-11-24 12:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` int(11) NOT NULL,
  `studNum` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `suffix` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted, 1=Deleted',
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `studNum`, `firstname`, `middlename`, `lastname`, `suffix`, `is_deleted`, `date_added`) VALUES
(1, 202110379, 'John Christopher', '', 'Paras', '', 0, '2023-11-09'),
(3, 201910034, 'Michael', '', 'Ramilo', '', 0, '2023-11-09'),
(4, 201910247, 'Cristaneille ', '', 'Gile Gile', '', 0, '2023-11-09'),
(5, 201910248, 'Armel', '', 'Santos', '', 0, '2023-11-09'),
(6, 202010002, 'Jhoven', '', 'De Paz', '', 0, '2023-11-09'),
(7, 201910148, 'Bryan', '', 'Frial', '', 0, '2023-11-09'),
(8, 202110359, 'Sager', '', 'Deol', '', 0, '2023-11-09'),
(9, 202010228, 'Sheryl', '', 'Baldoza', '', 0, '2023-11-09'),
(10, 201910055, 'Kenjie', '', 'Correa', '', 1, '2023-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'User',
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `verification_code`, `date_registered`) VALUES
(66, 'Erwinss', 'Cabag', 'Son', '', '1997-09-22', '25 years old', 'admin@gmail.com', '9359428963', 'Poblacion, Medellin, Cebu', 'Male', 'Married', 'Web developer', 'Bible Baptist Church', '1234', 'Sitio Upper Landing', 'Purok San Isidro', 'Ambot', 'Daanlungsod', 'Medellin', 'Cebu', 'VII', 'testimonials-2.jpg', '0192023a7bbd73250516f069df18b500', 'Admin', 109724, '2022-11-25'),
(67, 'Staff', '', 'StaffStaff', 'Staff', '2007-03-01', '16 years old', 'staff@gmail.com', '9359428963', 'Staff', 'Female', 'Single', 'Staff', 'Iglesia Ni Cristo', 'StaffStaff', 'StaffStaff', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', 'Staff', 'testimonials-1.jpg', '0192023a7bbd73250516f069df18b500', 'Staff', 0, '2023-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`log_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
