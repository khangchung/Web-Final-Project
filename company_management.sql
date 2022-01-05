-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 11:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id` int(5) NOT NULL,
  `employee` char(4) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `priority` int(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `priority`) VALUES
('admin', '$2y$10$uioy1sd2NAeZGOmTRIrjLOEFQU0QJszdPzkpam.v2r8vg8WX0cQVq', 0),
('nguyenthia', '$2y$10$gqKpeW1fSQeJRlY4IQ8lwe4N7hR2HtW8S31TOlfOI73OEXC.MskOi', 1),
('nguyenthib', '$2y$10$4/QJlr6DwmHCvcPfaeZYr.zTj8/RvbotGQovRyQvDzXAk/lZf1ZFa', 2),
('tranvana', '$2y$10$t7hL9A1SFWIbHVpeACrDceuRF7ibBjNYuMP1DvNs2IVOYo8TAL5P6', 1),
('tranvanb', '$2y$10$DCaR0jxwI8pWEq1McV9/ieiVo6wZWZDdLZlG.1rriyQOuoGAnAsey', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` char(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `room` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `room`) VALUES
('A', 'Nhân sự', 'Phụ trách nhân sự công ty', 1),
('B', 'Thiết kế', 'Phụ trách thiết kế sản phẩm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` char(4) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `day_off` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `fullname`, `position`, `department`, `avatar`, `day_off`) VALUES
('A001', 'tranvana', 'Trần Văn A', '1', 'A', '../../documents/A/tranvana/avatar.jpg', 15),
('A002', 'tranvanb', 'Trần Văn B', '2', 'A', '../../documents/A/tranvanb/avatar.jpg', 12),
('B003', 'nguyenthia', 'Nguyễn Thị A', '1', 'B', '../../documents/B/nguyenthia/avatar.jpg', 15),
('B004', 'nguyenthib', 'Nguyễn Thị B', '2', 'B', '../../documents/B/nguyenthib/avatar.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(5) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `creator` char(4) DEFAULT NULL,
  `receiver` char(4) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task_log`
--

CREATE TABLE `task_log` (
  `task_id` int(5) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `owner` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absence_fk0` (`employee`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_fk0` (`username`),
  ADD KEY `employee_fk1` (`department`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_fk0` (`creator`),
  ADD KEY `task_fk1` (`receiver`);

--
-- Indexes for table `task_log`
--
ALTER TABLE `task_log`
  ADD PRIMARY KEY (`task_id`,`comment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_fk0` FOREIGN KEY (`employee`) REFERENCES `employee` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_fk0` FOREIGN KEY (`username`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `employee_fk1` FOREIGN KEY (`department`) REFERENCES `department` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_fk0` FOREIGN KEY (`creator`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `task_fk1` FOREIGN KEY (`receiver`) REFERENCES `employee` (`id`);

--
-- Constraints for table `task_log`
--
ALTER TABLE `task_log`
  ADD CONSTRAINT `task_log_fk0` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
