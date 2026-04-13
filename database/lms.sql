-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 10:59 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'usama', '$2y$10$iuK.P53B69DR/IMQgf4OtuvMaJ4eTfnSrXWolXqC5fxC4Qyd3Dw..', '2021-09-30 01:03:03'),
(2, 'admin', '$2y$10$4KwftygmXYO0KTQW/YFwA.KjBA/2GxMMy4qeDHkAiTyOACK/ohkmu', '2024-04-22 12:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `adhaar` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`sno`, `name`, `fname`, `mname`, `course`, `dob`, `gender`, `mob`, `address`, `adhaar`, `category`, `session`) VALUES
(5, 'Mohd Ansab', '', 'Kishawer Haneef', 'B.Sc', '1999-12-15', 'male', '8130657402', '', '13652173265', '', ''),
(6, 'jhfhgf', '', 'ghfghf', 'B.Sc', '2026-03-03', 'male', '', '', '13652173265', 'general', '2023-23'),
(7, 'jhfhgf', '', 'ghfghf', 'B.Sc', '2026-03-03', 'male', '', '', '13652173265', 'general', '2023-23'),
(8, 'jhfhgf', '', 'ghfghf', 'B.Sc', '2026-03-03', 'male', '', '', '13652173265', 'general', '2023-23'),
(9, 'jhfhgf', '', 'ghfghf', 'B.Sc', '2026-03-03', 'male', '', '', '13652173265', 'general', '2023-23');

-- --------------------------------------------------------

--
-- Table structure for table `ansab`
--

CREATE TABLE `ansab` (
  `sno` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '0',
  `assignment` varchar(255) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '0',
  `syllabus` varchar(255) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `b.ed`
--

CREATE TABLE `b.ed` (
  `sno` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '0',
  `assignment` varchar(255) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '0',
  `syllabus` varchar(255) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '0',
  `staff` varchar(255) NOT NULL DEFAULT 'usama'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `b.ed`
--

INSERT INTO `b.ed` (`sno`, `subject`, `topic`, `sem`, `url`, `assignment`, `note`, `syllabus`, `question`, `staff`) VALUES
(2, 'Test Mail', 'Electronics', 'Second', '0', '0', '1633383706.jpg', '0', '0', 'usama');

-- --------------------------------------------------------

--
-- Table structure for table `b.sc`
--

CREATE TABLE `b.sc` (
  `sno` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '0',
  `assignment` varchar(255) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '0',
  `syllabus` varchar(255) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '0',
  `staff` varchar(255) NOT NULL DEFAULT 'usama'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `b.sc`
--

INSERT INTO `b.sc` (`sno`, `subject`, `topic`, `sem`, `url`, `assignment`, `note`, `syllabus`, `question`, `staff`) VALUES
(11, 'Chemistry', 'Security', 'Third', '0', '0', '1633377413.jpg', '0', '0', 'usama'),
(15, 'Computer', 'Atom', 'Fourth', '0', '1633382506.jpg', '0', '0', '0', 'usama'),
(16, 'Computer', 'Grammer', 'Second', '0', '1633382531.jpg', '0', '0', '0', 'usama'),
(17, 'Test Mail', 'Electronics', 'Second', '0', '0', '1633383730.jpg', '0', '0', 'usama'),
(18, 'Computer', 'sqw', 'Second', '0', '0', '0', '1633384072.jpg', '0', 'usama'),
(22, 'electronics', 'physics', 'Fourth', 'rFX_QPf0GDE', '0', '0', '0', '0', 'usama'),
(27, 'dsa', 'bfs', 'First', 'rFX_QPf0GDE', '0', '0', '0', '0', 'usama'),
(28, 'dsa', 'bfs', 'Fourth', '0', '1716214470.pdf', '0', '0', '0', 'usama'),
(31, 'Physics', 's', 'First', '0', '0', '0', '0', '1716215232.pdf', 'usama'),
(32, 'Physics', 'Computer', 'Fourth', '0', '0', '0', '0', '1716215271.pdf', 'usama'),
(33, 'DProgramming', 'BFS', 'Fourth', 'vqd9k-N0dOk', '0', '0', '0', '0', 'ansab');

-- --------------------------------------------------------

--
-- Table structure for table `b.tech`
--

CREATE TABLE `b.tech` (
  `sno` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '0',
  `assignment` varchar(255) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '0',
  `syllabus` varchar(255) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '0',
  `staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `b.tech`
--

INSERT INTO `b.tech` (`sno`, `subject`, `topic`, `sem`, `url`, `assignment`, `note`, `syllabus`, `question`, `staff`) VALUES
(1, 'Physics', 'Optics', 'First', 'vqd9k-N0dOk', '0', '0', '0', '0', 'ansab');

-- --------------------------------------------------------

--
-- Table structure for table `bba`
--

CREATE TABLE `bba` (
  `sno` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '0',
  `assignment` varchar(255) NOT NULL DEFAULT '0',
  `note` varchar(255) NOT NULL DEFAULT '0',
  `syllabus` varchar(255) NOT NULL DEFAULT '0',
  `question` varchar(255) NOT NULL DEFAULT '0',
  `staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `sno` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `subjects` varchar(1000) NOT NULL,
  `fee` int(11) NOT NULL,
  `pfee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`sno`, `cname`, `subjects`, `fee`, `pfee`) VALUES
(18, 'B.Sc', 'PCM', 7560, 200),
(19, 'B.Ed', 'English', 20000, 0),
(21, 'B.Tech', 'CSE', 320000, 80000),
(22, 'BBA', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `docs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`sno`, `name`, `docs`) VALUES
(3, 'Prospectus', '1716208154.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `sno` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`sno`, `img`) VALUES
(11, '1636007361.jpg'),
(12, '1636007370.jpg'),
(13, '1636007379.jpg'),
(14, '1636007391.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `sno` int(11) NOT NULL,
  `notice` varchar(100) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp(),
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`sno`, `notice`, `detail`, `dt`, `link`) VALUES
(10, 'Scholarships available right now!', 'You can apply for scholarships by clicking on below link', '2024-05-20', 'https://scholarships.gov.in/');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `sno` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`sno`, `img`) VALUES
(1, '1633890675.jpg'),
(4, '1636007435.jpg'),
(5, '1636007446.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sno`, `name`, `username`, `password`) VALUES
(9, 'Usama Husain', 'usama', 'u'),
(10, 'Parvez', 'parvez', 'p'),
(11, 'Arshad Hussain', 'arshad', 'a'),
(12, 'Abu Bakar', 'abu', 'a'),
(13, 'Ansab', 'ansab', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sno` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `eno` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `tc` varchar(255) NOT NULL DEFAULT '0',
  `migration` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sno`, `name`, `password`, `cname`, `year`, `session`, `eno`, `mobile`, `status`, `tc`, `migration`) VALUES
(10, 'Usama', '123', 'B.Sc', 'Fourth', '2019-20', '123', '8171475514', 1, '1633906190.jpg', '1716208132.pdf'),
(11, 'TARIQ ALI', 'ads', 'B.Ed', 'First', '2022-23', 'ads', '8171475514', 1, '0', '0'),
(13, 'ansab', 'ansab', 'BBA', 'First', '2022-23', '999', '', 1, '0', '0'),
(16, 'MOHD ADEEB', 'aa', 'B.Tech', 'First', '2024-25', '1234', '1234567890', 1, '1716221487.png', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `ansab`
--
ALTER TABLE `ansab`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `b.ed`
--
ALTER TABLE `b.ed`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `b.sc`
--
ALTER TABLE `b.sc`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `b.tech`
--
ALTER TABLE `b.tech`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `bba`
--
ALTER TABLE `bba`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `eno` (`eno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ansab`
--
ALTER TABLE `ansab`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b.ed`
--
ALTER TABLE `b.ed`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `b.sc`
--
ALTER TABLE `b.sc`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `b.tech`
--
ALTER TABLE `b.tech`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bba`
--
ALTER TABLE `bba`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
