-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 28, 2019 lúc 03:13 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `democake`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bithday` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `bithday`, `created`, `modified`) VALUES
(1, 'Tran Manh Quan', 'tranmanhquan@gmail.com', '123456', '2019-08-23', '2019-08-23 00:00:00', '2019-08-23 00:00:00'),
(2, 'NguyenHaiAnh', 'nguyenhaianh@gmail.com', '123456', '2019-08-23', '2019-08-23 00:00:00', '2019-08-23 00:00:00'),
(3, 'nguyen van A', 'nguyenvana@gmail.com', '123456', '2019-08-23', '2019-08-23 04:37:40', '2019-08-23 04:37:40'),
(4, 'Lee xuân vũ', 'elevensds@gmail.com', '1334434', '2019-08-23', '2019-08-23 04:40:06', '2019-08-23 04:40:06'),
(5, 'tranhainam', 'tranhainam@gmail.com', '123456', '2015-04-07', '2019-08-23 04:48:10', '2019-08-23 04:48:10'),
(9, 'nguyen van c', 'nguyenvanc@gmail.com', '123456', '2017-03-07', '2019-08-23 08:31:16', '2019-08-23 08:31:16'),
(10, 'nguyen van d', 'nguyenvand@gmail.com', '1234567833', '2009-06-10', '2019-08-23 08:31:47', '2019-08-23 08:31:47'),
(11, 'nguyenthic', 'nguyenthic@gmail.com', '123456', '2009-05-13', '2019-08-23 08:32:54', '2019-08-23 08:32:54'),
(12, 'nguyenducminh', 'nguyenducminh@gmail.com', '3343439934', '2019-01-01', '2019-08-23 08:35:08', '2019-08-23 08:35:08'),
(13, 'trancongdanh', 'trancongdanh123@gmail.com', '1233433434', '2019-01-01', '2019-08-23 08:38:11', '2019-08-23 08:38:11'),
(14, 'aaaaaa', 'nguyenvana@gmail.com', '123456', '2015-05-11', '2019-08-23 09:42:12', '2019-08-23 09:42:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detailt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `detailt`) VALUES
(1, 'Demo1', 'Day la demo1'),
(2, 'Demo2', 'Day la demo2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numberphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bithday` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `numberphone`, `bithday`, `created`, `modified`) VALUES
(1, 'user1', 'eleven', 'eleven1308@gmail.com', '123456', '123456', '2019-08-23', '2019-08-23 00:00:00', '2019-08-23 00:00:00'),
(2, 'Tran Ba Hoa', 'admin', 'admin@admin.com', '$2y$10$Dl23OyepV5Hl4t4nFKThT./lGM9UFt9iyTisHppACj3srhGe59b3S', '123456', '2018-02-04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Nguyen Hai Anh', 'haianh123', 'haianh@gmail.com', '$2y$10$0UO49cvUgZO/WdW7ecsJAukC0Ss3Xt.0UeBqPZ0f08fU3YkjB1QKC', '123456', '2017-03-06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'nguyenbinhan', 'binhan123', 'binhan123@gmail.com', '$2y$10$W5n0mKbui8xM0yQzRQyCWe/fCtQmd0XUCzl9K6vsbpRZ8ycsousBG', '123456', '2019-08-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'nguyen van nam', 'nam123', 'nguyenvannam@gmail.com', '$2y$10$DQR3Lt0xFMSkbFOLAMej0OEAky47FmxrohQGYkgmk0Mejp4KWfNyy', '123456', '2015-03-06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'nguyenvanb', 'banb', 'nguyenvanb@gmail.com', '$2y$10$yjblZxd1FJ0h.brKKrqcBOG/RrrRxu0BV5wXd/DaybIqCzOt8kKoq', '123456', '2019-08-23', '2019-08-23 04:44:48', '2019-08-23 04:44:48'),
(7, 'khanhlinh', 'khanhlinh123', 'khanhlinh@gmail.com', '$2y$10$hOzvCaAR/lDt0zztZGucue8Y3PREim3/V4Fm1kM1MJ/h5S75TCscC', '34343', '2013-05-11', '2019-08-23 09:04:51', '2019-08-23 09:04:51'),
(8, 'hahaha', 'conchimnon', 'eleven123@gmail.com', '$2y$10$NZXPAwKdIY8i1f03tO1YBuYGg4fv0eL2.TTo0N7j4JKIb2aqSW17y', '123456', '2019-08-23', '2019-08-23 10:27:51', '2019-08-23 10:27:51'),
(9, 'nguyenvanminh', 'nguyenminh', 'nguyenvanminh@gmail.com', '$2y$10$AnvQ75Up8JJkSFOCiWvsne.qwxEhiuEmpZ4Y7i2v3rstzn9HmE3L.', '123456', '2014-04-08', '2019-08-23 10:41:27', '2019-08-23 10:41:27');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
