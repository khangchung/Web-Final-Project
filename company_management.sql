-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 11:13 AM
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

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id`, `employee`, `created_date`, `start_date`, `end_date`, `reason`, `status`, `attachment`) VALUES
(3, 'A004', '2022-01-06', '2022-01-07', '2022-01-10', 'abc', -1, '../../documents/A/A004/absense/2022-01-06.docx'),
(4, 'A003', '2022-01-06', '2022-01-08', '2022-01-12', 'xyz', -1, '../../documents/A/A003/absense/2022-01-06.pdf'),
(5, 'A003', '2022-01-13', '2022-01-14', '2022-01-16', 'Bận công việc gia đình', 0, '');

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
('admin', '$2y$10$1zhwkV0aXcQK1vUa8cWAX.0CjryPY.jT3chm/Z1VNl9Cj60PgMGZG', 0),
('nguyenthia', '$2y$10$jRyBSJMa/vDoGe7AbyfRu..OxJFjxNDf6PtZoi6wasG53qOIBAHQW', 1),
('nguyenthib', '$2y$10$AqrrI1EJ7PNa9WJIcXwFNuJD89MtRvyoLuMIYG5n2/f9NjXcf7B7u', 2),
('tranvana', '$2y$10$iv/fIJbZtM9grAlpiI/E/eEoLKHEZ0QYk4Rw4l2Y.K24SXJBJ84jO', 1),
('tranvanb', '$2y$10$p2Ia.FnbDLkfxShRKCqsveebhQ2khNrlUu9PzopimNXxf8qRi5GTm', 2);

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
('A003', 'tranvana', 'Trần Văn A', '1', 'A', '../../documents/A/A003/avatar.jpg', 15),
('A004', 'tranvanb', 'Trần Văn B', '2', 'A', '../../documents/A/A004/avatar.jpg', 12),
('B001', 'nguyenthia', 'Nguyễn Thị A', '1', 'B', '../../documents/B/B001/avatar.jpg', 15),
('B002', 'nguyenthib', 'Nguyễn Thị B', '2', 'B', '../../documents/B/B002/avatar.jpg', 12);

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
  `last_modified` date DEFAULT current_timestamp(),
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `status`, `rate`, `creator`, `receiver`, `created_date`, `deadline`, `last_modified`, `attachment`) VALUES
(1, 'Tuyển dụng nhân sự', 'Tuyển dụng 5 nhân viên thiết kế', 3, 0, 'A003', 'A004', '2022-01-11', '2022-01-14', '2022-01-13', ''),
(2, 'Sắp xếp nhân sự', 'Sắp xếp vị trí nhân được tuyển dụng vào phòng ban thiết kế ', 2, 0, 'A003', 'A004', '2022-01-12', '2022-01-14', '2022-01-13', ''),
(3, 'Điều động nhân sự', 'Điều động nhân sự phòng thiết kế hỗ trợ phòng kỹ thuật', 0, 0, 'A003', 'A004', '2022-01-12', '2022-01-13', '2022-01-13', '');

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
-- Dumping data for table `task_log`
--

INSERT INTO `task_log` (`task_id`, `comment`, `attachment`, `owner`) VALUES
(1, 'Đã hoàn thành', '../../documents/A/A004/task/1/2022-01-11-tasklog.docx', 0);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
