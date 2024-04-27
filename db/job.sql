-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 16, 2023 lúc 07:39 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `job`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
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
-- Cấu trúc bảng cho bảng `cvs`
--

CREATE TABLE `cvs` (
  `id` int(11) NOT NULL,
  `data_cv` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cver` text COLLATE utf8_unicode_ci NOT NULL,
  `id_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cvs`
--

INSERT INTO `cvs` (`id`, `data_cv`, `cver`, `id_job`) VALUES
(4, 'DaoNgocHau.docx', 'testuser', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `descrip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_post` date NOT NULL,
  `loca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `descrip`, `date_post`, `loca`, `price`, `phone_number`, `id_status`, `id_category`, `user`) VALUES
(2, 'Thiết kế Web', '', '2022-11-26', 'Thái Nguyên', 100000, '0123456789', 1, 1, 'user'),
(3, 'Phục vụ quán', '', '2022-12-08', 'Thái Nguyên', 20000, '0123456789', 1, 2, 'user'),
(5, 'test huy cong viec', 'test huy cong viec', '2023-02-01', 'test huy cong viec', 234343, '34324534', 1, 5, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `role`) VALUES
(1, 'Quản lí'),
(2, 'Nhà tuyển dụng'),
(3, 'Người tìm việc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_post`
--

CREATE TABLE `status_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status_post`
--

INSERT INTO `status_post` (`id`, `title`) VALUES
(1, 'Đã chấp nhận'),
(2, 'Đang xử lí'),
(3, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `id_job` int(11) DEFAULT NULL,
  `id_cv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `email`, `id_role`, `id_job`, `id_cv`) VALUES
(1, 'admin', '12345678', NULL, 1, NULL, 0),
(2, 'user', '123456789', NULL, 2, 1, 0),
(3, 'testuser', 'testuser', NULL, 3, NULL, 0),
(4, 'test', '123456789', 'test@gmail.com', 3, NULL, NULL),
(5, 'test123', '123456789', 'test1234@gmail.com', 3, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_post`
--
ALTER TABLE `status_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `status_post`
--
ALTER TABLE `status_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
