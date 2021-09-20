-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 17, 2021 lúc 02:56 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_order` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(200) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` float NOT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `customer_id`, `date_order`, `status`, `quantity`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(9, 18, '2021-09-01 22:08:20', '2', 2, 24090000, 'tienMat', 'det', '2021-09-02 05:08:20', '2021-09-17 05:05:37'),
(11, 20, '2021-09-01 22:45:21', '1', 2, 24800000, 'tienMat', 'vbhjnk', '2021-09-02 05:45:21', '2021-09-17 03:49:58'),
(12, 21, '2021-09-03 19:00:56', '1', 1, 35180000, 'tienMat', 'dvvdv', '2021-09-04 02:00:56', '2021-09-17 05:03:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(18, 9, 4, 1, 6500000, '2021-09-02 05:08:20', '2021-09-02 05:08:20'),
(19, 9, 1, 1, 17590000, '2021-09-02 05:08:20', '2021-09-02 05:08:20'),
(20, 10, 1, 1, 17590000, '2021-09-02 05:19:48', '2021-09-02 05:19:48'),
(21, 10, 2, 1, 33190000, '2021-09-02 05:19:48', '2021-09-02 05:19:48'),
(22, 11, 3, 2, 5900000, '2021-09-02 05:45:21', '2021-09-02 05:45:21'),
(23, 11, 4, 2, 6500000, '2021-09-02 05:45:21', '2021-09-02 05:45:21'),
(24, 12, 1, 2, 17590000, '2021-09-04 02:00:56', '2021-09-04 02:00:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'lenovo', NULL, 'LENOVO', '2021-08-21 21:37:02', '2021-08-21 21:37:02'),
(2, 'samsung', NULL, 'SAM SUNG', '2021-08-21 21:37:02', '2021-08-21 21:37:02'),
(3, 'xiaomi', NULL, 'XIAOMI', '2021-08-21 21:37:02', '2021-08-21 21:37:02'),
(5, 'oppo', NULL, 'OPPO', '2021-08-21 21:37:02', '2021-08-21 21:37:02'),
(6, 'asus', NULL, 'ASUS', '2021-08-21 21:37:02', '2021-08-21 21:37:02'),
(7, 'iphone', NULL, 'IPHONE', '2021-09-16 20:22:30', '2021-09-16 20:22:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(18, 'sdfe', 'thanh@gmail.com', 'fverf', 'wfe', 'det', '2021-09-02 05:08:20', '2021-09-02 05:08:20'),
(19, 'sdfvef', 'thanh@gmail.com', 'sdfvsd', 'dvvvv', 'dvdv', '2021-09-02 05:19:48', '2021-09-02 05:19:48'),
(20, 'cgvhbjnk', 'thanh@gmail.com', 'rtybjn', 'vbhjnkm', 'vbhjnk', '2021-09-02 05:45:21', '2021-09-02 05:45:21'),
(21, 'dgvd', 'thanh@gmail.com', 'vdvd', 'dvdv', 'dvvdv', '2021-09-04 02:00:56', '2021-09-04 02:00:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'view', 'xem trang ban hang'),
(2, 'manager', 'quan ly he thong'),
(3, 'manager_user', 'quản lý người dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `cpu` varchar(30) NOT NULL,
  `ram` varchar(30) NOT NULL,
  `oCung` varchar(30) NOT NULL,
  `win` varchar(50) NOT NULL,
  `manHinh` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `unit_price`, `promotion_price`, `discount`,  `description`, `cpu`, `ram`, `oCung`, `win`, `manHinh`, `brand_id`, `type_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo IdeaPad 3', 17590000, 0, 10,'', 'AMD Ryzen 3-3250U', '4GB', '256GB SSD', 'Window 10 Home', '21 inch', 1, 1, 'lap1.png', '2021-08-21 21:45:49', '2021-08-21 21:45:49'),
(2, 'Asus VivoBook A515EA', 34990000, 33190000, 20,'', 'Intel Pentium', '8 GB', '256GB SSD', 'Window 10 Home', '21 inch', 6, 1, 'lap2.jpg', '2021-08-21 21:45:49', '2021-08-21 21:45:49'),
(3, 'oppo f5', 6500000, 5900000, 0,'đẹp','MediaTek Helio P23', '4 GB', '32 GB', 'Android 9 (Pie)', 'IPS LCDFull HD+', 5, 2, '163182949426.jpg', '2021-08-21 21:48:34', '2021-09-17 04:58:14'),
(4, 'samsung A350', 7990000, 6500000, 15,'', '', '', '', '', '', 2, 2, '', '2021-08-21 21:48:34', '2021-08-21 21:48:34'),
(9, 'Iphone 12 Pro Max', 32990000, 60,30990000, '', 'Apple A14 Bionic', '6 GB', '128 GB', 'iOS 14', 'OLED6.7\"Super Retina XDR', 7, 2, 'lap3.jpg', '2021-09-16 20:24:49', '2021-09-16 20:24:49'),
(10, 'Redmi 10', 4690000, 0, 20,'', 'MediaTek Helio G88 8 nhân', '6 GB', '128 GB', 'Android 11', 'IPS LCD, 6.5\", Full HD+', 3, 2, 'redmi10.png', '2021-09-16 20:29:46', '2021-09-16 20:29:46'),
(11, 'Samsung Galaxy S20 FE', 15490000, 11990000, 0,'', 'Snapdragon 865', '8 GB', '256 GB', 'Android 11', 'Super AMOLED6.5\"Full HD+', 2, 2, 'samsungs20.jpg', '2021-09-16 20:31:52', '2021-09-16 20:31:52'),
(13, 'nhbgvfc', 8562396, 562362, 0,'bgvfcd', 'bgvfc', 'gvfcd', 'gvfcd', 'gvfc', 'vfc', 2, 2, '163183098652.jpg', '2021-09-17 05:23:06', '2021-09-17 05:23:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'quan tri vien'),
(2, 'user', 'nguoi dung'),
(3, 'employee', 'nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 1, 3),
(5, 3, 2),
(6, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'laptop', 'MÁY TÍNH', '2021-08-21 21:34:41', '2021-08-21 21:34:41'),
(2, 'smartphone', 'ĐIỆN THOẠI', '2021-08-21 21:34:41', '2021-08-21 21:34:41'),
(3, 'phukien', 'PHỤ KIỆN', '2021-08-21 21:34:41', '2021-08-21 21:34:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `money`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'long', 'long@gmail.com', '$2y$10$Kximy9mObbJkPVkCN0k0s.n7W9cyAYWnvH08sf0iyTBhxtcW5LVd.', 3, 1785080001, 'lYP6H3MVApUZJI24khNcaku2qgpXTpyJUJcx66OCE9BeRa1L2xFQeN1BxOGw', '2021-08-27 00:21:17', '2021-09-17 00:32:30'),
(18, 'thanh', 'thanh@gmail.com', '$2y$10$rCLvHcc03lhBBVY4dxm9GeyG0OrObxbonl9LcQXodGm/mJpdE4D1m', 3, NULL, NULL, '2021-08-29 05:12:36', '2021-09-17 03:48:57'),
(19, 'admin', 'admin@gmail.com', '$2y$10$h0NwcXcK.duhhoMdFrQPde18MG0louyAwkW/jUiprorFuxg63GCJ.', 1, NULL, NULL, '2021-09-15 08:17:39', '2021-09-15 08:17:39'),
(20, 'ngoc@gmail.com', 'ngoc@gmail.com', '$2y$10$yY7CfR9NL.i.C/lXyL.oMOw15GRpwLChOE1yt9mB3y9EFcrAI/cOm', 2, NULL, NULL, '2021-09-17 05:08:20', '2021-09-17 05:08:20');
-- INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `money`, `remember_token`, `created_at`, `updated_at`) VALUES(21, 'admin2', 'admin2@gmail.com', '$2a$12$V3AqnPC3HOF9eoA3.0Wsc.vf10ExENcJhX.yHbKWYXOAs2/xyaF1S', 1, NULL, NULL, '2021-09-15 08:17:39', '2021-09-15 08:17:39');
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `bill_details_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type_products` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION;
COMMIT;

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` varchar(255),
  `image` varchar(255),
  `status` int(11),
  `description` varchar(255),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `slides` (`id`, `name`, `title`, `content`, `image`, `status`, `url`,`description`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến mãi back to school', 'Tưng bừng nhập học', 'giảm 10% cho tất cả đơn hàng', '637660305811365864_F-C1_1200x300.jpg', '1', '', '', '2021-08-21 21:34:41', '2021-08-21 21:34:41'),
(2, 'Khuyến mãi back to school', 'Tưng bừng nhập học', 'giảm 10% cho tất cả đơn hàng', '637660305811365864_F-C1_1200x300.jpg', '1', '', '','2021-08-21 21:34:41', '2021-08-21 21:34:41'),
(3, 'Khuyến mãi back to school', 'Tưng bừng nhập học', 'giảm 10% cho tất cả đơn hàng', '637660305811365864_F-C1_1200x300.jpg', '1', '', '','2021-08-21 21:34:41', '2021-08-21 21:34:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
