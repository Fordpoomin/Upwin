-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 07:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webscan`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(100) DEFAULT NULL,
  `check_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `check_type`) VALUES
(1, 'คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ', 0),
(2, 'คณะเทคโนโลยีสารสนเทศและการสื่อสาร', 0),
(3, 'คณะพยาบาลศาสตร์', 0),
(4, 'คณะเภสัชศาสตร์', 0),
(5, 'คณะวิทยาศาสตร์', 0),
(6, 'คณะวิศวกรรมศาสตร์', 0),
(7, 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์', 0),
(8, 'คณะทันตแพทยศาสตร์', 0),
(9, 'คณะนิติศาสตร์', 0),
(10, 'คณะแพทยศาสตร์', 0),
(11, 'คณะรัฐศาสตร์และสังคมศาสตร์', 0),
(12, 'คณะวิทยาการจัดการและสารสนเทศศาสตร์', 0),
(13, 'คณะวิทยาศาสตร์การแพทย์', 0),
(14, 'คณะศิลปศาสตร์', 0),
(15, 'คณะสหเวชศาสตร์', 0),
(16, 'คณะพลังงานและสิ่งแวดล้อม', 0),
(17, 'วิทยาลัยการศึกษา', 0),
(18, 'วิทยาลัยการจัดการ', 0),
(19, 'กองกลาง', 1),
(20, 'กองกิจการนิสิต', 1),
(21, 'กองการเจ้าหน้าที่', 1),
(22, 'กองคลัง', 1),
(23, 'กองบริการการศึกษา', 1),
(24, 'กองแผนงาน', 1),
(25, 'กองพัฒนาคุณภาพนิสิตและนิสิตพิการ', 1),
(26, 'กองบริหารงานวิจัย', 1),
(27, 'กองอาคารสถานที่', 1),
(28, 'สำนักงานสภา มหาวิทยาลัยพะเยา', 1),
(29, 'สภาพนักงาน มหาวิทยาลัยพะเยา', 1),
(30, 'สำนักงานอธิการบดี', 1),
(31, 'ศูนย์บรรณสารและการเรียนรู้', 1),
(32, 'โรงเรียนสาธิตมหาวิทยาลัยพะเยา', 1),
(33, 'ศูนย์การแพทย์และโรงพยาบาลมหาวิทยาลัยพะเยา', 1),
(34, 'ศูนย์เครือข่ายความร่วมมือเพื่อการพัฒนาเชิงพื้นที่แบบสร้างสรรค์', 1),
(35, 'ศูนย์บริการเทคโนโลยีสารสนเทศและการสื่อสาร', 1),
(36, 'ศูนย์พัฒนาเด็กเล็ก', 1),
(37, 'ศูนย์พัฒนาเทคโนโลยียานยนต์', 1),
(38, 'ศูนย์สถาบันนวัตกรรมและถ่ายทอดเทคโนโลยี', 1),
(39, 'ศูนย์บ่มเพาะวิสาหกิจ', 1),
(40, 'ศูนย์ศึกษาเศรษฐกิจพอเพียงการเกษตรและความอยู่รอดของมนุษยชาติ', 1),
(41, 'หน่วยกฎหมาย', 1),
(42, 'หน่วยตรวจสอบภายใน', 1),
(43, 'หน่วยบริหารความเสี่ยง', 1),
(44, 'หน่วยปฏิบัติการวิชาชีพการโรงแรมและการท่องเที่ยว', 1),
(45, 'อุทยานวิทยาศาสตร์', 1),
(99, 'none', 2);

-- --------------------------------------------------------

--
-- Table structure for table `history_qrcode`
--

CREATE TABLE `history_qrcode` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `activity_name` varchar(100) DEFAULT NULL,
  `date_finish` varchar(100) DEFAULT NULL,
  `date_gen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_qrcode`
--

INSERT INTO `history_qrcode` (`history_id`, `user_id`, `faculty_id`, `activity_name`, `date_finish`, `date_gen`) VALUES
(1, 3, 99, 'ทดสอบกิจกรรม', '2020-06-21', '2020-06-18 17:05:37'),
(2, 3, 1, 'none', '0000-00-00', '2020-06-18 17:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `stats_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  `activity_name` varchar(100) DEFAULT NULL,
  `activity_date_finish` varchar(100) DEFAULT NULL,
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) DEFAULT NULL,
  `date_gen` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`stats_id`, `user_id`, `history_id`, `phone`, `faculty_id`, `activity_name`, `activity_date_finish`, `check_in`, `check_out`, `date_gen`) VALUES
(1, 1, 2, '0901234561', 1, 'none', '0000-00-00', '19-06-2020 00:09:01', '19-06-2020 00:09:04', '2020-06-18 17:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `faculty` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `nisit_id` varchar(8) DEFAULT NULL,
  `role` enum('USER','ADMIN') DEFAULT 'USER',
  `date_gen` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `faculty`, `name`, `id`, `phone`, `nisit_id`, `role`, `date_gen`) VALUES
(1, 1, 'user1', '1619900263651', '0901234561', '-', 'USER', '2020-06-14 15:26:24'),
(2, 1, 'user2', '1619900263652', '0901234562', '57363795', 'USER', '2020-06-14 15:26:45'),
(3, 2, 'user3', '1619900263653', '0901234563', '-', 'ADMIN', '2020-06-14 15:27:04'),
(4, 1, 'user4', '1619900263654', '0901234564', '-', 'USER', '2020-06-15 06:34:09'),
(5, 4, 'ีuser5', '1619900263655', '0901234565', '12345678', 'USER', '2020-06-15 06:34:38'),
(6, 8, 'user6', '1619900263656', '0901234566', '-', 'USER', '2020-06-15 06:35:29'),
(7, 4, 'user6', '1619900263657', '0901234567', '12345678', 'USER', '2020-06-15 07:02:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `history_qrcode`
--
ALTER TABLE `history_qrcode`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `faculty` (`faculty_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stats_id`),
  ADD KEY `faculty` (`faculty_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `history_id` (`history_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `faculty` (`faculty`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `history_qrcode`
--
ALTER TABLE `history_qrcode`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `stats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_qrcode`
--
ALTER TABLE `history_qrcode`
  ADD CONSTRAINT `history_qrcode_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_qrcode_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stats_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stats_ibfk_3` FOREIGN KEY (`history_id`) REFERENCES `history_qrcode` (`history_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
