-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 05:46 PM
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
  `employee` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `attachment` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` int(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `priority`) VALUES
('admin', '$2y$10$lfYweJAVP8BY3NUNnFYEX.xDavpLRaZEE6OfizKK3ewgDB7WcmgMm', 0),
('moctana', '$2y$10$i.scjgaCq5VFIAL0LTEIZ.rqESKwomxBG3hlmox68OWDfN/7KEp4G', 1),
('moctanb', '$2y$10$wO96xSdhTI58aFjWuToBr.dp0Vv./olHFwcTTKW68ipwBMw.DPFP6', 2),
('moctanc', '$2y$10$1vZ9NkT9ORJlMAubGQxv5eJH5Y1aSKMK7Lzx9yVXfBCafzBOj95Ca', 2),
('moctand', '$2y$10$zv4aL3O3UoULTbaUU9P8SuaRb7JF9XRSMtDZSUP2XH7mD.TjV.lc.', 2),
('nguyentrana', '$2y$10$eAvUu6EcePBgq90KWjpsXOTF.tKNJaPM9swHD9q8smBnqRSemwaOq', 1),
('nguyentranb', '$2y$10$TC/BD6c7qIw99bGXJsM2I..RiBDDCdKRNRWVKqs0QGm6ChTtK3OnK', 2),
('nguyentranc', '$2y$10$MaOm2r/dOKkxBoS.8ssn7ONZ49bXnrtRAalTYVcPOC/pOMeHd5awy', 2),
('nguyentrand', '$2y$10$rDLBi/HlZypl59Z9ZBFTIOc18V62D4QXdZlbc.mLOjjIfVagV50Qe', 2),
('nguyenvana', '$2y$10$ba6qy91lHveMfQGAfrARF.WjM43oA61OZotgO1AvreTBemzYKWaTO', 1),
('nguyenvanb', '$2y$10$kPNz.gG2tW1vtk2LVrTN8u5t/KRZTQ7VKg990DJZ.qUdEN2SnsYWG', 2),
('nguyenvanc', '$2y$10$FCMs9skc4KtAhmTKA/D3EOfbDIvtZdSCvLPs/h.KiNF8edHvTptY2', 2),
('nguyenvand', '$2y$10$2L0ll/QdCy.tPlq1x9nw9OaKyTV9nw5sqnNfqNFq.yxsp5T7h1Xue', 2),
('tranvana', '$2y$10$aMjNDZNKZGeqImPW75Y9G.I2PX0ARcQCPgJZgXWqrRP13aBg/8wRS', 1),
('tranvanb', '$2y$10$/2HABV8CtF86smcv1ED2Le3c7KFRJo5CAFzMj1lIGJcv.xPNI1KoG', 2),
('tranvanc', '$2y$10$Oi7KQ8OZG5Qt09vQuk876u.FQzlwIW5dn7vTkBkKoNht/0STa235q', 2),
('tranvand', '$2y$10$782IQ7bKqlm1LXukdSRmu.HXlN.cJGuHJpqkNaP866j3/IGOfz92e', 2),
('vothia', '$2y$10$FPECtKaYfH/omoDSyYR8beF1Yr9Q6Pg/8tPJD99FPM1QePgtvBICW', 1),
('vothib', '$2y$10$9le/gYqOb18hkk4Hb4PumOMU.VH9K2DjN/zZSrIsKDL1jaATLoCO6', 2),
('vothic', '$2y$10$0/CCfnUksphJBkkZGKiTduZQhQpdaJari3cS4GrB4a20y4BR47vxy', 2),
('vothid', '$2y$10$vzTxI4q4cRA9hcQspW20P.zgWiNgGbnb64oSs3V2BKk5sINg6ptIW', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`name`, `description`, `room`) VALUES
('Administration', 'Phụ trách hành chính', 5),
('Analysis', 'Phụ trách phân tích', 2),
('Business', 'Phụ trách kinh doanh', 1),
('Design', 'Phụ trách thiết kế', 3),
('IT', 'Phụ trách lập trình', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(1) DEFAULT NULL,
  `department` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_off` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `fullname`, `position`, `department`, `avatar`, `day_off`) VALUES
('AD017', 'nguyentrana', 'Nguyễn Trần A', 1, 'Administration', '', 15),
('AD018', 'nguyentranb', 'Nguyễn Trần B', 2, 'Administration', '', 12),
('AD019', 'nguyentranc', 'Nguyễn Trần C', 2, 'Administration', '', 12),
('AD020', 'nguyentrand', 'Nguyễn Trần D', 2, 'Administration', '', 12),
('AN005', 'tranvana', 'Trần Văn A', 1, 'Analysis', '', 15),
('AN006', 'tranvanb', 'Trần Văn B', 2, 'Analysis', '', 12),
('AN007', 'tranvanc', 'Trần Văn C', 2, 'Analysis', '', 12),
('AN008', 'tranvand', 'Trần Văn D', 2, 'Analysis', '', 12),
('BU001', 'nguyenvana', 'Nguyễn Văn A', 1, 'Business', '', 15),
('BU002', 'nguyenvanb', 'Nguyễn Văn B', 2, 'Business', '', 12),
('BU003', 'nguyenvanc', 'Nguyễn Văn C', 2, 'Business', '', 12),
('BU004', 'nguyenvand', 'Nguyễn Văn D', 2, 'Business', '', 12),
('DE009', 'vothia', 'Võ Thị A', 1, 'Design', '', 15),
('DE010', 'vothib', 'Võ Thị B', 2, 'Design', '', 12),
('DE011', 'vothic', 'Võ Thị C', 2, 'Design', '', 12),
('DE012', 'vothid', 'Võ Thị D', 2, 'Design', '', 12),
('IT013', 'moctana', 'Mộc Tần A', 1, 'IT', '', 15),
('IT014', 'moctanb', 'Mộc Tần B', 2, 'IT', '', 12),
('IT015', 'moctanc', 'Mộc Tần C', 2, 'IT', '', 12),
('IT016', 'moctand', 'Mộc Tần D', 2, 'IT', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(5) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `creator` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_log`
--

CREATE TABLE `task_log` (
  `task_id` int(5) NOT NULL,
  `comment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`name`);

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
  ADD PRIMARY KEY (`task_id`,`comment`,`attachment`);

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
  ADD CONSTRAINT `employee_fk1` FOREIGN KEY (`department`) REFERENCES `department` (`name`);

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
