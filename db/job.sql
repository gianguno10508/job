-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 03:59 AM
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
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `img`) VALUES
(1, 'Thiết kế & Sáng tạo', 'IMG-639d1cb48806e5.16106096.png'),
(2, 'Công việc khác', 'IMG-639d1cce09d333.64929729.png'),
(5, 'Xây dựng', 'IMG-639d1d294cbba7.66487881.png'),
(6, 'Sale & Marketing', 'IMG-639d1d3febe046.95292866.png'),
(7, 'Phát triển Web', 'IMG-639d1d50703270.40421290.png'),
(8, 'Bất động sản', 'IMG-639d1d5f6d8259.43930157.png'),
(9, 'Viết content', 'IMG-639d1d753496e6.38233473.png');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` int(11) NOT NULL,
  `data_cv` longtext NOT NULL,
  `cver` text NOT NULL,
  `id_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `data_cv`, `cver`, `id_job`) VALUES
(4, 'DaoNgocHau.docx', 'testuser', 3),
(5, 'DaoNgocHau.docx', 'testuser1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descrip` text DEFAULT NULL,
  `date_post` date NOT NULL,
  `loca` varchar(255) NOT NULL,
  `range_price` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `descrip`, `date_post`, `loca`, `range_price`, `phone_number`, `id_status`, `id_category`, `user`) VALUES
(2, 'Thiết kế Web', '', '2023-02-19', 'Thái Nguyên', '{\"range\":\"trongkhoang\",\"tu\":\"1231\",\"den\":\"123434\"}', '0123456789', 1, 1, 'user'),
(3, 'Phục vụ quán', '', '2023-02-19', 'Thái Nguyên', '{\"range\":\"thoathuan\",\"tu\":\"\",\"den\":\"\"}', '0123456789', 1, 1, 'user'),
(9, 'Công việc A', 'Test công việc A', '2023-02-19', 'Hà Nội', '{\"range\":\"trongkhoang\",\"tu\":\"12345\",\"den\":\"123456\"}', '0123456789', 1, 6, 'user'),
(10, 'Công việc B', 'Công việc B', '2023-02-19', 'Thái Nguyên', '{\"range\":\"thoathuan\",\"tu\":\"\",\"den\":\"\"}', '0123456789', 1, 2, 'user'),
(11, 'Công việc C', '', '2023-02-19', 'Thái Nguyên', '{\"range\":\"trongkhoang\",\"tu\":\"123444\",\"den\":\"1234544\"}', '0123456789', 3, 7, 'user'),
(12, 'Công việc D', '', '2023-02-19', 'Hà Nội', '{\"range\":\"trongkhoang\",\"tu\":\"1231\",\"den\":\"12341\"}', '0123456789', 1, 2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role`) VALUES
(1, 'Quản lí'),
(2, 'Nhà tuyển dụng'),
(3, 'Người tìm việc');

-- --------------------------------------------------------

--
-- Table structure for table `status_post`
--

CREATE TABLE `status_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_post`
--

INSERT INTO `status_post` (`id`, `title`) VALUES
(1, 'Đã chấp nhận'),
(2, 'Đang xử lí'),
(3, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `id_job` int(11) DEFAULT NULL,
  `id_cv` int(11) DEFAULT NULL,
  `phone_number` text NOT NULL,
  `company` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `email`, `id_role`, `id_job`, `id_cv`, `phone_number`, `company`, `address`) VALUES
(1, 'admin', '123456789', NULL, 1, NULL, 0, '', '', ''),
(2, 'user', '12345678', 'user@gmail.com', 2, 1, 0, '12345678', 'Test Company', 'Test Address'),
(3, 'testuser', 'testuser', NULL, 3, NULL, 0, '', '', ''),
(4, 'test', '123456789', 'test@gmail.com', 3, NULL, NULL, '1234567', 'test company', 'test address'),
(5, 'test123', '123456789', 'test1234@gmail.com', 3, NULL, NULL, '', '', ''),
(6, 'testuser1', '12345678', 'test@gmail.com', 3, NULL, NULL, '1234567890', '', 'Thai Nguyen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_post`
--
ALTER TABLE `status_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_post`
--
ALTER TABLE `status_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
