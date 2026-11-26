-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2026 at 05:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecourse`
--
CREATE DATABASE IF NOT EXISTS `onlinecourse` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `onlinecourse`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2024-03-10 16:21:18', '2024-04-25 05:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `departmentId` varchar(255) DEFAULT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `noofSeats` int(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`departmentId`, `courseCode`, `courseName`, `noofSeats`, `creationDate`, `updationDate`) VALUES
('MTE', 'ASE104', 'Probability Theory', 15, '2026-02-12 09:27:56', NULL),
('MTE', 'ASE105', 'Applied Statistics', 15, '2026-02-12 09:35:30', NULL),
('BLE', 'BLE101', 'Microbiology', 15, '2026-02-12 09:09:27', NULL),
('BLE', 'BLE102', 'Cell Biology', 15, '2026-02-12 09:09:46', NULL),
('BLE', 'BLE103', 'Molecular Biology', 15, '2026-02-12 09:10:10', NULL),
('BLE', 'BLE104', 'Genetics', 15, '2026-02-12 09:10:41', NULL),
('BLE', 'BLE105', 'Ecology & Evolution', 15, '2026-02-12 09:11:47', NULL),
('CHE', 'CHE101', 'General Chemistry', 20, '2026-02-12 09:12:12', NULL),
('CHE', 'CHE102', 'Organic Chemistry', 20, '2026-02-12 09:12:35', NULL),
('CHE', 'CHE103', 'Inorganic Chemistry', 20, '2026-02-12 09:13:39', NULL),
('CHE', 'CHE104', 'Physical Chemistry', 20, '2026-02-12 09:14:15', '12-02-2026 02:44:36 PM'),
('CHE', 'CHE105', 'Analytical Chemistry', 20, '2026-02-12 09:15:04', NULL),
('CSE', 'CSE101', 'Introduction to Programming', 25, '2026-02-12 09:15:39', NULL),
('CSE', 'CSE102', 'Data Structures', 25, '2026-02-12 09:16:05', NULL),
('CSE', 'CSE103', 'Database Management Systems', 25, '2026-02-12 09:16:37', NULL),
('CSE', 'CSE104', 'Operating Systems', 25, '2026-02-12 09:17:55', NULL),
('CSE', 'CSE105', 'Web Development', 25, '2026-02-12 09:23:41', NULL),
('PHE', 'ESE104', 'Fundamentals of Earth Science', 15, '2026-02-12 09:40:02', NULL),
('PHE', 'ESE105', 'Environmental Geophysics', 15, '2026-02-12 09:52:43', NULL),
('MTE', 'MTE101', 'Calculus I', 15, '2026-02-12 09:24:24', NULL),
('MTE', 'MTE102', 'Linear Algebra', 15, '2026-02-12 09:24:47', NULL),
('MTE', 'MTE103', 'Differential Equations', 15, '2026-02-12 09:25:06', NULL),
('PHE', 'PHE101', 'Classical Mechanics', 15, '2026-02-12 09:37:51', NULL),
('PHE', 'PHE102', 'Electricity & Magnetism', 15, '2026-02-12 09:38:13', NULL),
('PHE', 'PHE103', 'Experimental Physics Techniques', 15, '2026-02-12 09:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` varchar(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` varchar(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `enrollDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `department`, `semester`, `course`, `enrollDate`) VALUES
(5, 'SEU/IS/21/BS/087', '747774', '2026', 'CSE', '3 months', 'CSE101', '2026-02-11 06:14:53'),
(6, 'SEU/IS/21/PS/084', '731019', '2026', 'CSE', '3 months', 'CSE105', '2026-02-12 11:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `course_duration`
--

CREATE TABLE `course_duration` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_duration`
--

INSERT INTO `course_duration` (`id`, `semester`, `start_date`, `end_date`) VALUES
(1, '3 months', '2026-01-05', '2026-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `course_intake`
--

CREATE TABLE `course_intake` (
  `id` int(11) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `intake_date` date DEFAULT NULL,
  `creationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_intake`
--

INSERT INTO `course_intake` (`id`, `session`, `intake_date`, `creationDate`) VALUES
(1, '2026', '2026-01-05', NULL),
(12, '2026', '2026-06-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
('BLE', 'Biological Sciences Department'),
('CHE', 'Chemical Sciences Department'),
('CSE', 'Computer Sciences Department'),
('MTE', 'Mathematical Sciences Department'),
('PHE', 'Physical Sciences Department');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newstitle` varchar(255) DEFAULT NULL,
  `newsDescription` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newstitle`, `newsDescription`, `postingDate`) VALUES
(4, 'Admissions Open', 'Starts from ....', '2026-01-28 11:40:27'),
(5, 'Deadline', 'closes ....', '2026-01-28 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `studentName`, `pincode`, `session`, `department`, `semester`, `creationdate`, `updationDate`) VALUES
('SEU/IS/21/BS/087', NULL, '20dfc6fafd6674c0961e9d1f84b43459', 'SINTHATHURAI KETMAN', '747774', NULL, NULL, NULL, '2026-01-21 16:33:07', '11-02-2026 12:22:48 PM'),
('SEU/IS/21/PS/084', 'WhatsApp Image 2025-12-30 at 13.14.45.jpeg', 'e8076447ad22edaf9277d6b150f4d638', 'SHANMUGARAJAH THADHUSHA', '731019', NULL, NULL, NULL, '2026-02-12 11:28:17', '12-02-2026 05:02:39 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(5, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-23 10:35:19', NULL, 1),
(6, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-23 10:50:58', '23-01-2026 04:24:52 PM', 1),
(7, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-23 10:57:17', '23-01-2026 04:34:15 PM', 1),
(8, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-24 07:17:53', '24-01-2026 12:54:21 PM', 1),
(9, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-24 07:26:11', '24-01-2026 12:59:29 PM', 1),
(10, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-27 11:41:09', '27-01-2026 05:19:38 PM', 1),
(11, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-27 12:19:32', '27-01-2026 05:50:10 PM', 1),
(14, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 05:14:29', '28-01-2026 10:45:01 AM', 1),
(16, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 05:27:51', '28-01-2026 10:58:03 AM', 1),
(17, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 06:01:26', '28-01-2026 11:31:33 AM', 1),
(18, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 06:02:32', '28-01-2026 11:32:38 AM', 1),
(19, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 06:11:54', '28-01-2026 11:42:05 AM', 1),
(20, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 11:42:46', '28-01-2026 05:14:23 PM', 1),
(21, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 17:28:30', NULL, 1),
(22, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-28 17:36:27', '28-01-2026 11:06:32 PM', 1),
(23, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-01-29 09:02:29', '29-01-2026 02:33:16 PM', 1),
(24, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-02-10 15:12:54', '10-02-2026 08:44:01 PM', 1),
(25, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-10 15:34:37', '10-02-2026 09:06:56 PM', 1),
(26, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-10 18:02:28', NULL, 1),
(27, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-10 18:34:02', NULL, 1),
(28, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-10 18:37:47', NULL, 1),
(29, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-10 18:39:30', NULL, 1),
(30, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-10 19:10:28', NULL, 1),
(31, 'SEU/IS/21/BS/087', 0x3132372e302e302e3100000000000000, '2026-02-11 06:14:27', '11-02-2026 12:00:03 PM', 1),
(32, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-11 06:52:21', '11-02-2026 12:27:57 PM', 1),
(33, 'SEU/IS/21/BS/087', 0x3a3a3100000000000000000000000000, '2026-02-11 07:16:32', '11-02-2026 12:48:04 PM', 1),
(34, 'SEU/IS/21/PS/084', 0x3132372e302e302e3100000000000000, '2026-02-12 11:29:46', '12-02-2026 05:01:08 PM', 1),
(35, 'SEU/IS/21/PS/084', 0x3132372e302e302e3100000000000000, '2026-02-12 11:31:38', '12-02-2026 05:05:40 PM', 1),
(36, 'SEU/IS/21/PS/084', 0x3a3a3100000000000000000000000000, '2026-02-12 11:42:25', '12-02-2026 05:23:44 PM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `fk1` (`departmentId`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_duration`
--
ALTER TABLE `course_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_intake`
--
ALTER TABLE `course_intake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentRegno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_duration`
--
ALTER TABLE `course_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `course_intake`
--
ALTER TABLE `course_intake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
