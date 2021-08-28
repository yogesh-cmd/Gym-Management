-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 07:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'satyamgupta3001@gmail.com', 'admin', 'satyam');

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `gym_id` int(50) NOT NULL,
  `gym_address` varchar(225) NOT NULL,
  `gym_contact` varchar(12) NOT NULL,
  `gym_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`gym_id`, `gym_address`, `gym_contact`, `gym_name`) VALUES
(1, 'p.n road,bhandup(w),mumbai-78', '9533772299', 'arofit'),
(2, 'tankroad,mulund,mumbai-78', '9335522772', 'needfit'),
(8, 'mulund,mumbai', '9999999999', 'fit2fit');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(50) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_mobile` varchar(12) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_address` varchar(225) NOT NULL,
  `member_plan` varchar(50) NOT NULL,
  `member_plan_type` varchar(50) NOT NULL,
  `gym_id` int(50) NOT NULL,
  `trainer_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_mobile`, `member_email`, `member_address`, `member_plan`, `member_plan_type`, `gym_id`, `trainer_id`) VALUES
(1, 'satyam', '9702866020', 'satyam@gmail.com', 'bhandup(w),mumbai-78', 'monthly', 'cardio', 1, 1),
(3, 'harshit', '7766554433', 'harshit@gmail.com', 'mumbai', '6_months', 'gym and cardio', 8, 2),
(4, 'rahul', '6655997766', 'rahul@gmail.com', 'mumbai', 'quaterly', 'cardio only', 1, 1),
(14, 'sumit', '6655997766', 'submit@gmail.com', 'mumbai', 'quaterly', 'gym only', 1, 1),
(16, 'krithik', '8989454525', 'krithik@gmail.com', 'mumbai', '6_months', 'cardio only', 2, 2),
(22, 'yash', '9594565760', 'yash@gmail.com', '401/C Sundaram Balaji aangan Thakurli east', 'monthly', 'gym only', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(50) NOT NULL,
  `trainer_name` varchar(50) NOT NULL,
  `trainer_mobile` varchar(12) NOT NULL,
  `trainer_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `trainer_mobile`, `trainer_email`) VALUES
(1, 'ajayraj', '8877996644', 'ajayraj@gym.com'),
(2, 'vijayraj', '9966339955', 'vijayraj@gymfit.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(110) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_address`, `user_password`, `user_phone`) VALUES
(1, 'satyam', 'satyam@gmail.com', 'bhandup(w),mumbai-78', 'admin', '9702866020'),
(2, 'alok', 'alok@gmail.com', 'mumbai', '12345', '8828442253'),
(3, 'harshit', 'harshit@gmail.com', 'mumbai', 'harshit', '7766554433'),
(4, 'rahul', 'rahul@gmail.com', 'mumbai', 'admin', '6655997766'),
(5, 'yogesh', 'yogesh@gmail.com', 'mumbai', 'yogesh', '8877004477'),
(14, 'sumit', 'submit@gmail.com', 'mumbai', 'submit', '6655997766'),
(15, 'devesh', 'devesh@sakec.ac.in', 'mumbai', 'devesh', '9988998899'),
(16, 'krithik', 'krithik@gmail.com', 'mumbai', 'krithik', '8989454525'),
(25, 'chunilal', 'chunilal@gmail.com', 'mumbai', 'admin', '8976564556');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `visitor_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `visitor_no`) VALUES
(1, 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `gym_fk` (`gym_id`),
  ADD KEY `trainer_fk` (`trainer_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `gym_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `gym_fk` FOREIGN KEY (`gym_id`) REFERENCES `gym` (`gym_id`),
  ADD CONSTRAINT `trainer_fk` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
