-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 03:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecture_hall_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `class_rep` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `duration` int(2) NOT NULL,
  `class_time` varchar(5) NOT NULL,
  `class_date` varchar(10) NOT NULL,
  `date_booked` varchar(10) NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `hall` int(11) NOT NULL,
  `hall_name` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `class_rep`, `course_id`, `duration`, `class_time`, `class_date`, `date_booked`, `course_code`, `course_title`, `hall`, `hall_name`) VALUES
(1, 1, 1, 3, '09:00', '2020-04-30', '2020-4-10', 'CSC101', 'Introduction to computer science', 1, 'SLT1'),
(2, 1, 2, 2, '12:00', '2020-4-19', '2020-4-10', 'CSC102', 'Introduction to algorithms', 1, 'SLT1'),
(3, 1, 5, 2, '14:00', '2020-4-21', '2020-4-10', 'CSC301', 'Object oriented programming', 2, 'SLT2'),
(4, 1, 3, 2, '10:00', '2020-4-22', '2020-4-10', 'CSC201', 'Computer programming I', 2, 'SLT2'),
(5, 1, 4, 2, '16:00', '2020-4-25', '2020-4-10', 'CSC202', 'Computer programming II', 3, 'SLT3'),
(6, 1, 2, 2, '8:00', '2020-5-2', '2020-04-12', 'CSC102', 'Introduction to computer algorithms', 1, 'SLT1'),
(7, 1, 2, 2, '08:00', '2020-05-01', '2020-04-14', 'CSC102', 'Introduction to computer algorithms', 1, 'SLT1'),
(8, 1, 4, 2, '10:00', '2020-05-01', '2020-04-14', 'CSC202', 'Computer programming II', 1, 'SLT1'),
(9, 1, 3, 2, '08:00', '2020-05-02', '2020-04-14', 'CSC201', 'Computer programming I', 1, 'SLT1'),
(10, 1, 2, 2, '15:00', '2020-04-26', '2020-04-15', 'CSC102', 'Introduction to computer algorithms', 3, 'SLT3'),
(12, 1, 3, 1, '22:00', '2020-04-24', '2020-04-15', 'CSC201', 'Computer programming I', 3, 'SLT3'),
(13, 1, 3, 3, '08:00', '2020-04-27', '2020-04-15', 'CSC201', 'Computer programming I', 3, 'SLT3'),
(14, 1, 4, 1, '21:00', '2020-04-30', '2020-04-15', 'CSC202', 'Computer programming II', 2, 'SLT2'),
(16, 1, 3, 2, '08:00', '2020-04-27', '2020-04-17', 'CSC201', 'Computer programming I', 2, 'SLT2');

-- --------------------------------------------------------

--
-- Table structure for table `courses_sim`
--

CREATE TABLE `courses_sim` (
  `id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `lecturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_sim`
--

INSERT INTO `courses_sim` (`id`, `code`, `title`, `lecturer`) VALUES
(1, 'CSC101', 'Introduction to computer science', 1),
(2, 'CSC102', 'Introduction to computer algorithms', 1),
(3, 'CSC201', 'Computer programming I', 2),
(4, 'CSC202', 'Computer programming II', 2),
(5, 'CSC301', 'Object oriented programming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`) VALUES
(1, 'SLT1'),
(2, 'SLT2'),
(3, 'SLT3');

-- --------------------------------------------------------

--
-- Table structure for table `staff_sim`
--

CREATE TABLE `staff_sim` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_sim`
--

INSERT INTO `staff_sim` (`id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Will', 'Smith', 'willsmith@gmail.com', 'willsmith'),
(2, 'Billie', 'Jean', 'billiejean@gmail.com', 'billiejean');

-- --------------------------------------------------------

--
-- Table structure for table `students_sim`
--

CREATE TABLE `students_sim` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matric_number` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_sim`
--

INSERT INTO `students_sim` (`id`, `name`, `surname`, `status`, `email`, `matric_number`, `password`) VALUES
(1, 'John', 'Doe', 'class_rep', 'johndoe@gmail.com', 'kasu/16/csc/1111', 'johndoe'),
(2, 'Mary', 'Ann', '', 'maryann@gmail.com', 'kasu/16/csc/0000', 'maryann');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_sim`
--
ALTER TABLE `courses_sim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_sim`
--
ALTER TABLE `staff_sim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_sim`
--
ALTER TABLE `students_sim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `courses_sim`
--
ALTER TABLE `courses_sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff_sim`
--
ALTER TABLE `staff_sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students_sim`
--
ALTER TABLE `students_sim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
