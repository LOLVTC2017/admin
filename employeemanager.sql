-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 31, 2021 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `employeemanager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `manhanvien` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentaikhoan` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaytao` date NOT NULL,
  `trangthai` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `personnel`
--

INSERT INTO `personnel` (`id`, `manhanvien`, `tentaikhoan`, `matkhau`, `ngaytao`, `trangthai`) VALUES
(2, 'T1_111v', 'Admin_Pv', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-26', 2),
(5, 'T1_0003', 'nguyenthanhphu11', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-27', 2),
(29, 't13-125412', 'nguyenthanhhai', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-30', 1),
(30, 't13-224', 'nguyenthanhmai', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-31', 1),
(31, 't13-223', 'nguyenmaithanhhuong', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-31', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
