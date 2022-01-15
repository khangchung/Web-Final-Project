-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 03:07 PM
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
(6, 'A001', '2022-01-14', '2022-01-16', '2022-01-17', 'Bận công việc gia đình', 1, ''),
(7, 'A002', '2022-01-15', '2022-01-16', '2022-01-17', 'Chăm người thân bị bệnh', 0, '../../documents/A/A002/absense/2022-01-15.pdf'),
(10, 'A003', '2022-01-15', '2022-01-16', '2022-01-17', 'Bận việc gia đình', 0, '');

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
('admin', '$2y$10$wPPydT7wuMsSvAVQunRb3.i2B4hdEQuQSNmJvPKXzfjgMFdiW/gRG', 0),
('buitrucphuong', '$2y$10$kRqOX2/YlObRdZuhSq.qNOEJZgh.3o9GqMB/NCzF0CzWf1A4mozQy', 2),
('caothitrucquynh', '$2y$10$LRjztqAyWYmXDp8H/tTWpOPurRG4vkPjhy4XTT8mBlswshfsze4vy', 2),
('chauthanhtoan', '$2y$10$keauji6Zm.Uo7vDV/W7MeegGBZeCtDZPgrkxvrV52rMtRI3WVa8RO', 2),
('chungsungkhang', '$2y$10$u.X3aY4vVpATj3kO7njMA.dUd/6OjYSuX0IzmdNIcT3MRFotYjc9e', 2),
('duongthithuyvy', '$2y$10$QNBWKVbPFFMMFyL8YcwkNOSjHLw2ByAkZIxdGqXjAib7kdhGA2406', 1),
('hongoctuyet', '$2y$10$VBj3vPV87d.V.WFvS/o8M.46KRwW4Pojx8dQa3IvOdIwTpfhVppyK', 2),
('huynhlong', '$2y$10$5RYWzmllS/m8iP905Bu5aeuoGBKwMyG.tfr2Y2mDnv0pfmLRGtw7K', 2),
('huynhthanhtrieu', '$2y$10$q1C3UhtlRlU0Y49RPgKrGuVLjY/zQBUKMBnviFFAs.IJ/mTK81d72', 1),
('huynhvankiet', '$2y$10$4..qZII6EViGZbRxquOu.Oz8iHW.dP0iJiopIvs.2zaCWoMddNSLy', 2),
('lamvotrongnhan', '$2y$10$IDpdiaSm7bsbjRveiWIIc.gxYjdBG0eaj3JLl7RZQD2n1YJvARUAG', 2),
('letruchan', '$2y$10$6AErDExjSQvpOTHgu4ikAuQ/Vzs0Y.QM33t.KgWHNXzneFh3MHiq2', 1),
('levohoaibao', '$2y$10$fEENOBqyTGoYNqZu8.YHUOJKpr37jCmAkNp33B1.2wMsUC1pAzsZC', 2),
('lythithuhuong', '$2y$10$f7jL0SYpeTffOjtSN731meYvG1Oc5/sxBwHkzItz99QR7MwmzsHga', 2),
('nguyenhoaingoc', '$2y$10$tYSgNgI6V7ds6MImEnt1i..uBB1axKkrv02v.8Oa15dKcBtXdQg4K', 2),
('nguyenphamkhang', '$2y$10$6zr8j8ree.9aQBBw554FaeIwXmS2t/ps1Q7viLMPdKWLwGyXETPgu', 2),
('nguyenvanthai', '$2y$10$K8pgMCifaeawUADIEgcUDOcJul7KUJ/F8meU2wzACgh4d2MKQX/zy', 2),
('phamtam', '$2y$10$MmUC5S0ueQN8pKB9FvILK.aXn4xP3C3IBnf5bNtSLh8bf1sveHi4u', 1),
('trannguyenphuongthi', '$2y$10$3aDX7219edW0TKj9w/9QZekefhi.DPrZCkdd61FqdHRzdEsGrzmXy', 2),
('tranthithaoanh', '$2y$10$LNCtgxQu2U/v0uR0EZQ2qeqCTPzkWQifUZvs4coSyIBe8PL9IAk4S', 1),
('tranvantuan', '$2y$10$bj8Axxz6XfZ8gVUn1cbAwOR77dpjUg3LPsdN2RWnEsBEc96UH1KRK', 2),
('trinhtuyetvan', '$2y$10$IyWZcgpb5.LpVO2MKWFrIe6l2pbwHi7X45ngXZfC1b9Z/o2zUDYwa', 2),
('vocatphuong', '$2y$10$xL.2fGHxqaLSXcG4yGxft.qBztesvRS7luNlcLxBGtvT6/6dxhQnW', 2),
('vothanhlong', '$2y$10$fv3.eclmgZ1o9dYnIeKFXezCTDppCaxDZ6gSw6XVLTah7G/gsZGNG', 2),
('vuducmanh', '$2y$10$xEzvNrevp8Ffx3GE.2X/MuktJe.JfgLbIrbZzC3cG1GwIG2.DbQ7C', 2),
('vulanminhtri', '$2y$10$sW2bjnLkwQkkT31Zr6nuV.mXtvD29JIdKAkPLFtb0Li2UBAfSg2Fy', 2),
('vungocha', '$2y$10$Q9ess2y7Qr4OfpMzwfgoT.DFNwHlQGwcgtAng8Hn3xzZ6IQj.Sjmq', 2);

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
('A', 'Nhân sự', 'Phụ trách các công việc liên quan đến tổ chức, sắp xếp, điều động nhân sự công ty', 1),
('B', 'Thiết kế', 'Phụ trách các công việc liên quan đến thiết kế trong công ty', 2),
('C', 'Truyền thông', 'Phụ trách truyền thông sản phẩm, dịch vụ của công ty trên các nền tảng internet', 3),
('D', 'Kinh doanh', 'Phụ trách các công việc liên quan đến phân tích thị trường, chiến lược kinh doanh', 4),
('E', 'Kỹ thuật', 'Phụ trách các công việc liên quan đến xây dựng, bảo trì, nghiên cứu sản phẩm', 5),
('F', 'Nhân sự 2', 'abcabcabcabcabc', 6),
('G', 'Kế toán', 'abcabcabcabcabc', 7);

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
('A001', 'tranthithaoanh', 'Trần Thị Thảo Anh', '1', 'A', '../../documents/A/A001/avatar.jpg', 15),
('A002', 'tranvantuan', 'Trần Văn Tuấn', '2', 'A', '../../documents/A/A002/avatar.jpg', 12),
('A003', 'vocatphuong', 'Võ Cát Phượng', '2', 'A', '../../documents/A/A003/avatar.jpg', 12),
('A004', 'trannguyenphuongthi', 'Trần Nguyễn Phương Thi', '2', 'A', '../../documents/A/A004/avatar.jpg', 12),
('A005', 'levohoaibao', 'Lê Võ Hoài Bảo', '2', 'A', '../../documents/A/A005/avatar.jpg', 12),
('A026', 'chungsungkhang', 'Chung Sùng Khang', '2', 'A', '../../documents/A/A026/avatar.jpg', 12),
('B006', 'duongthithuyvy', 'Dương Thị Thúy Vy', '1', 'B', '../../documents/B/B006/avatar.jpg', 15),
('B007', 'caothitrucquynh', 'Cao Thị Trúc Quỳnh', '2', 'B', '../../documents/B/B007/avatar.jpg', 12),
('B008', 'lamvotrongnhan', 'Lâm Võ Trọng Nhân', '2', 'B', '../../documents/B/B008/avatar.jpg', 12),
('B009', 'nguyenhoaingoc', 'Nguyễn Hoài Ngọc', '2', 'B', '../../documents/B/B009/avatar.jpg', 12),
('B010', 'chauthanhtoan', 'Châu Thanh Toàn', '2', 'B', '../../documents/B/B010/avatar.jpg', 12),
('C011', 'letruchan', 'Lê Trúc Hân', '1', 'C', '../../documents/C/C011/avatar.jpg', 15),
('C012', 'huynhvankiet', 'Huỳnh Văn Kiệt', '2', 'C', '../../documents/C/C012/avatar.jpg', 12),
('C013', 'nguyenvanthai', 'Nguyễn Văn Thái', '2', 'C', '../../documents/C/C013/avatar.jpg', 12),
('C014', 'trinhtuyetvan', 'Trịnh Tuyết Vân', '2', 'C', '../../documents/C/C014/avatar.jpg', 12),
('C015', 'vothanhlong', 'Võ Thành Long', '2', 'C', '../../documents/C/C015/avatar.jpg', 12),
('D016', 'phamtam', 'Phạm Tâm', '1', 'D', '../../documents/D/D016/avatar.jpg', 15),
('D017', 'vungocha', 'Vũ Ngọc Hà', '2', 'D', '../../documents/D/D017/avatar.jpg', 12),
('D018', 'hongoctuyet', 'Hồ Ngọc Tuyết', '2', 'D', '../../documents/D/D018/avatar.jpg', 12),
('D019', 'vulanminhtri', 'Vũ Lân Minh Trí', '2', 'D', '../../documents/D/D019/avatar.jpg', 12),
('D020', 'lythithuhuong', 'Lý Thị Thu Hương', '2', 'D', '../../documents/D/D020/avatar.jpg', 12),
('E021', 'huynhthanhtrieu', 'Huỳnh Thanh Triều', '1', 'E', '../../documents/E/E021/avatar.jpg', 15),
('E022', 'nguyenphamkhang', 'Nguyễn Phạm Khang', '2', 'E', '../../documents/E/E022/avatar.jpg', 12),
('E023', 'buitrucphuong', 'Bùi Trúc Phương', '2', 'E', '../../documents/E/E023/avatar.jpg', 12),
('E024', 'huynhlong', 'Huỳnh Long', '2', 'E', '../../documents/E/E024/avatar.jpg', 12),
('E025', 'vuducmanh', 'Vũ Đức Mạnh', '2', 'E', '../../documents/E/E025/avatar.jpg', 12);

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
(19, 'Tuyển dụng nhân sự đợt 1', 'Tuyển dụng 5 nhân sự cho phòng thiết kế', 5, 1, 'A001', 'A002', '2022-01-14', '2022-01-14', '2022-01-14', '../../documents/A/A002/task/19/2022-01-14.docx'),
(20, 'Tuyển dụng nhân sự đợt 1', 'Tuyển dụng 2 nhân sự cho phòng truyền thông', 3, 0, 'A001', 'A003', '2022-01-14', '2022-01-15', '2022-01-14', '../../documents/A/A003/task/20/2022-01-14.docx'),
(21, 'Tuyển dụng nhân sự đợt 1', 'Tuyển dụng 2 nhân sự cho phòng kinh doanh', 2, 0, 'A001', 'A004', '2022-01-14', '2022-01-14', '2022-01-14', ''),
(22, 'Tuyển dụng nhân sự đợt 1', 'Tuyển dụng 3 nhân sự cho phòng kỹ thuật', 4, 0, 'A001', 'A005', '2022-01-14', '2022-01-15', '2022-01-14', '../../documents/A/A005/task/22/2022-01-14.docx');

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
(19, 'Tuyển dụng 5 nhân sự đạt yêu cầu', '../../documents/A/A002/task/19/2022-01-14(1).docx', 0),
(20, 'Tuyển dụng 2 nhân sự đạt yêu cầu', '../../documents/A/A003/task/20/2022-01-15.docx', 0),
(22, 'Tuyển dụng 3 nhân sự đạt yêu cầu', '../../documents/A/A005/task/22/2022-01-14(1).docx', 0),
(22, 'Xem xét lại nhân sự Nguyễn Thị Minh Thư', '', 1);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
