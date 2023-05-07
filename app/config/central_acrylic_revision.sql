-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2023 at 02:58 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cenj6878_central_acrylic`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(2, 'Kasir', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(3, 'Operator Mesin Cutting', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(4, 'Operator Mesin CNC', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(5, 'Operator Mesin Print Stiker', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(6, 'Operator Mesin Print UV', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(7, 'Operator Mesin Grafir', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(8, 'Operator Mesin 3D Print', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(9, 'Operator Mesin Bending & Welding', '2023-03-22 14:19:08', '2023-03-22 14:19:08'),
(10, 'Operator Assembly', '2023-03-22 14:19:08', '2023-03-22 14:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `division` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` enum('initial','process','complete') NOT NULL DEFAULT 'initial',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `id_order`, `id_staff`, `division`, `message`, `status`, `created_at`) VALUES
(115, 17, 1, 'Kasir', 'telah ditambahkan', 'initial', '2023-05-04 01:01:22'),
(116, 17, 1, 'Operator Mesin Cutting', 'telah selesai process', 'process', '2023-05-04 01:03:44'),
(117, 17, 1, 'Operator Mesin Print UV', 'telah selesai process', 'process', '2023-05-04 01:06:02'),
(118, 17, 1, 'Operator Assembly', 'telah selesai process', 'process', '2023-05-04 01:08:02'),
(119, 17, 1, 'Operator Assembly', 'telah selesai', 'complete', '2023-05-04 01:08:02'),
(120, 18, 1, 'Kasir', 'telah ditambahkan', 'initial', '2023-05-04 01:14:29'),
(121, 18, 1, 'Operator Mesin Cutting', 'telah selesai process', 'process', '2023-05-04 01:15:45'),
(122, 18, 1, 'Operator Mesin Print UV', 'telah selesai process', 'process', '2023-05-05 07:07:18'),
(123, 18, 1, 'Operator Assembly', 'telah selesai process', 'process', '2023-05-05 07:07:45'),
(124, 18, 1, 'Operator Assembly', 'telah selesai', 'complete', '2023-05-05 07:07:45'),
(126, 20, 1, 'Kasir', 'telah ditambahkan', 'initial', '2023-05-05 07:11:06'),
(127, 20, 1, 'Operator Mesin Cutting', 'telah selesai process', 'process', '2023-05-05 07:12:14'),
(128, 20, 1, 'Operator Mesin Print UV', 'telah selesai process', 'process', '2023-05-05 07:13:31'),
(129, 20, 1, 'Operator Mesin Bending & Welding', 'telah selesai process', 'process', '2023-05-05 07:14:16'),
(130, 20, 1, 'Operator Mesin Bending & Welding', 'telah selesai', 'complete', '2023-05-05 07:14:16'),
(138, 23, 1, 'Kasir', 'telah ditambahkan', 'initial', '2023-05-05 07:43:17'),
(139, 23, 1, 'Operator Mesin Cutting', 'telah selesai process', 'process', '2023-05-05 07:46:23'),
(140, 23, 1, 'Operator Mesin Print UV', 'telah selesai process', 'process', '2023-05-05 07:46:44'),
(141, 23, 1, 'Operator Mesin Print Stiker', 'telah selesai process', 'process', '2023-05-05 07:47:48'),
(142, 23, 1, 'Operator Mesin Print Stiker', 'telah selesai', 'complete', '2023-05-05 07:47:48'),
(147, 25, 1, 'Kasir', 'telah ditambahkan', 'initial', '2023-05-05 07:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `notification_readers`
--

CREATE TABLE `notification_readers` (
  `id_notification` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `notification_readers`
--

INSERT INTO `notification_readers` (`id_notification`, `id_staff`, `is_read`, `read_at`) VALUES
(115, 1, 0, '2023-05-04 01:09:29'),
(116, 1, 0, '2023-05-04 01:09:29'),
(117, 1, 0, '2023-05-04 01:09:29'),
(118, 1, 0, '2023-05-04 01:09:29'),
(119, 1, 0, '2023-05-04 01:09:29'),
(120, 1, 0, '2023-05-05 07:08:09'),
(121, 1, 0, '2023-05-05 07:08:09'),
(122, 1, 0, '2023-05-05 07:08:09'),
(123, 1, 0, '2023-05-05 07:08:09'),
(124, 1, 0, '2023-05-05 07:08:09'),
(126, 1, 0, '2023-05-05 07:13:54'),
(127, 1, 0, '2023-05-05 07:13:54'),
(128, 1, 0, '2023-05-05 07:13:54'),
(129, 1, 0, '2023-05-05 07:14:29'),
(130, 1, 0, '2023-05-05 07:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `costumer_name` varchar(100) NOT NULL,
  `status` enum('processing','completed','initial') NOT NULL DEFAULT 'initial',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `costumer_name`, `status`, `created_at`, `updated_at`) VALUES
(17, 'SB-010211-01040523-ibnu', 'Ibnu Fadillah', 'completed', '2023-05-04 01:01:22', '2023-05-04 01:08:02'),
(18, 'SB-010211-02040523-jebred', 'Jebred', 'completed', '2023-05-04 01:14:29', '2023-05-05 07:07:45'),
(20, 'HA-010205-03050523-oke', 'Oke', 'completed', '2023-05-05 07:11:06', '2023-05-05 07:14:16'),
(23, 'PK-010203-04050523-test', 'test', 'completed', '2023-05-05 07:43:17', '2023-05-05 07:47:48'),
(25, 'SB-0102-05050523-dadang', 'dadang', 'initial', '2023-05-05 07:56:22', '2023-05-05 07:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `order_file` varchar(255) NOT NULL,
  `design_file` varchar(255) DEFAULT NULL,
  `qty` int(4) NOT NULL,
  `description` text NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `order_file`, `design_file`, `qty`, `description`, `note`, `created_at`, `updated_at`) VALUES
(40, 17, 4, 'SB-010211-01040523-ibnu.pdf', 'SB-010211-01040523-ibnu.pdf', 2, 'ukuran 1+1', 'Ukuran 2x1', '2023-05-04 01:01:22', '2023-05-04 01:02:39'),
(41, 18, 4, 'SB-010211-02040523-jebred.pdf', 'SB-010211-02040523-jebred.pdf', 2, 'Cerpen', 'Coba lagi', '2023-05-04 01:14:29', '2023-05-04 01:15:04'),
(43, 20, 6, 'HA-010205-03050523-oke.docx', 'HA-010205-03050523-oke.docx', 3, 'coba lagi', 'dengan lagi', '2023-05-05 07:11:06', '2023-05-05 07:11:40'),
(46, 23, 3, 'PK-010203-04050523-test.docx', 'PK-010203-04050523-test.docx', 2, 'coba', 'oke', '2023-05-05 07:43:17', '2023-05-05 07:43:40'),
(48, 25, 4, 'SB-0102-05050523-dadang.docx', NULL, 2, 'okep', NULL, '2023-05-05 07:56:22', '2023-05-05 07:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_divisions`
--

CREATE TABLE `order_divisions` (
  `id_order` int(11) NOT NULL,
  `id_division` int(11) NOT NULL,
  `status` enum('initial','processing','complete') NOT NULL DEFAULT 'initial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_divisions`
--

INSERT INTO `order_divisions` (`id_order`, `id_division`, `status`) VALUES
(17, 3, 'complete'),
(17, 6, 'complete'),
(17, 10, 'complete'),
(18, 3, 'complete'),
(18, 6, 'complete'),
(18, 10, 'complete'),
(20, 3, 'complete'),
(20, 6, 'complete'),
(20, 9, 'complete'),
(23, 3, 'complete'),
(23, 6, 'complete'),
(23, 5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `order_process`
--

CREATE TABLE `order_process` (
  `id_order_detail` int(11) NOT NULL,
  `id_process_machine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_process`
--

INSERT INTO `order_process` (`id_order_detail`, `id_process_machine`) VALUES
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(40, 9),
(40, 10),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(41, 9),
(41, 10),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(43, 7),
(43, 10),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(46, 5),
(46, 10),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(48, 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `id_order_detail` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `division` varchar(50) NOT NULL,
  `id_process` int(11) NOT NULL,
  `estimate_complete` int(3) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `id_order_detail`, `id_staff`, `division`, `id_process`, `estimate_complete`, `description`, `created_at`, `updated_at`) VALUES
(145, 40, 1, 'Kasir', 1, 146, 'Pesanan telah dikonfirmasi', '2023-05-04 01:01:22', '2023-05-04 01:01:22'),
(146, 40, 1, 'Admin', 2, 0, 'Pesanan telah diteruskan', '2023-05-04 01:02:39', '2023-05-04 01:02:39'),
(147, 40, 1, 'Operator Mesin Cutting', 3, 66, 'Pesanan telah diteruskan', '2023-05-04 01:03:44', '2023-05-04 01:03:44'),
(148, 40, 1, 'Operator Mesin Print UV', 4, 50, 'Pesanan telah diteruskan', '2023-05-04 01:06:02', '2023-05-04 01:06:02'),
(149, 40, 1, 'Operator Assembly', 9, 30, 'Pesanan telah diteruskan', '2023-05-04 01:08:02', '2023-05-04 01:08:02'),
(150, 40, 1, 'Operator Assembly', 10, 0, 'Pesanan telah selesai', '2023-05-04 01:08:02', '2023-05-04 01:08:02'),
(151, 41, 1, 'Kasir', 1, 146, 'Pesanan telah dikonfirmasi', '2023-05-04 01:14:29', '2023-05-04 01:14:29'),
(152, 41, 1, 'Admin', 2, 0, 'Pesanan telah diteruskan', '2023-05-04 01:15:04', '2023-05-04 01:15:04'),
(153, 41, 1, 'Operator Mesin Cutting', 3, 66, 'Pesanan telah diteruskan', '2023-05-04 01:15:45', '2023-05-04 01:15:45'),
(154, 41, 1, 'Operator Mesin Print UV', 4, 50, 'Pesanan telah diteruskan', '2023-05-05 07:07:18', '2023-05-05 07:07:18'),
(155, 41, 1, 'Operator Assembly', 9, 30, 'Pesanan telah diteruskan', '2023-05-05 07:07:45', '2023-05-05 07:07:45'),
(156, 41, 1, 'Operator Assembly', 10, 0, 'Pesanan telah selesai', '2023-05-05 07:07:45', '2023-05-05 07:07:45'),
(158, 43, 1, 'Kasir', 1, 315, 'Pesanan telah dikonfirmasi', '2023-05-05 07:11:06', '2023-05-05 07:11:06'),
(159, 43, 1, 'Admin', 2, 0, 'Pesanan telah diteruskan', '2023-05-05 07:11:40', '2023-05-05 07:11:40'),
(160, 43, 1, 'Operator Mesin Cutting', 3, 99, 'Pesanan telah diteruskan', '2023-05-05 07:12:14', '2023-05-05 07:12:14'),
(161, 43, 1, 'Operator Mesin Print UV', 4, 75, 'Pesanan telah diteruskan', '2023-05-05 07:13:31', '2023-05-05 07:13:31'),
(162, 43, 1, 'Operator Mesin Bending & Welding', 7, 141, 'Pesanan telah diteruskan', '2023-05-05 07:14:16', '2023-05-05 07:14:16'),
(163, 43, 1, 'Operator Mesin Bending & Welding', 10, 0, 'Pesanan telah selesai', '2023-05-05 07:14:16', '2023-05-05 07:14:16'),
(172, 46, 1, 'Kasir', 1, 216, 'Pesanan telah dikonfirmasi', '2023-05-05 07:43:17', '2023-05-05 07:43:17'),
(173, 46, 1, 'Admin', 2, 0, 'Pesanan telah diteruskan', '2023-05-05 07:43:40', '2023-05-05 07:43:40'),
(174, 46, 1, 'Operator Mesin Cutting', 3, 66, 'Pesanan telah diteruskan', '2023-05-05 07:46:23', '2023-05-05 07:46:23'),
(175, 46, 1, 'Operator Mesin Print UV', 4, 50, 'Pesanan telah diteruskan', '2023-05-05 07:46:44', '2023-05-05 07:46:44'),
(176, 46, 1, 'Operator Mesin Print Stiker', 5, 100, 'Pesanan telah diteruskan', '2023-05-05 07:47:48', '2023-05-05 07:47:48'),
(177, 46, 1, 'Operator Mesin Print Stiker', 10, 0, 'Pesanan telah selesai', '2023-05-05 07:47:48', '2023-05-05 07:47:48'),
(183, 48, 1, 'Kasir', 1, 116, 'Pesanan telah dikonfirmasi', '2023-05-05 07:56:22', '2023-05-05 07:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `process_machines`
--

CREATE TABLE `process_machines` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` char(2) NOT NULL,
  `time` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `process_machines`
--

INSERT INTO `process_machines` (`id`, `name`, `code`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Initial', '00', 0, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(2, 'Design & Setting', '10', 0, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(3, 'Cutting', '01', 33, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(4, 'Print UV', '02', 25, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(5, 'Print Stiker', '03', 50, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(6, 'Grafir', '04', 13, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(7, 'Bending & Welding', '05', 47, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(8, '3D Print', '06', 85, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(9, 'Assembly / Finishing', '11', 15, '2023-04-30 10:04:25', '2023-04-30 10:04:25'),
(10, 'completed', '20', 0, '2023-04-30 10:04:25', '2023-04-30 10:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Neon Box', 'NB', '2023-03-22 14:21:09', '2023-03-22 14:21:09'),
(3, 'Plakat', 'PK', '2023-04-14 09:06:41', '2023-04-14 09:06:41'),
(4, 'Sign Board', 'SB', '2023-04-14 09:07:56', '2023-04-14 09:07:56'),
(5, 'Huruf Timbul Metal', 'HM', '2023-04-14 09:08:30', '2023-04-14 09:08:30'),
(6, 'Huruf Timbul Acrylic', 'HA', '2023-04-14 09:10:09', '2023-04-14 09:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `division` enum('admin','staff') NOT NULL DEFAULT 'staff',
  `password` varchar(255) NOT NULL,
  `staff_ID` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `division`, `password`, `staff_ID`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$iCTOxB5LyiNKkN30QihCI.17cmAOs7ZB6RJQViHk2hO8LIigakid.', 'admin', '2023-03-22 14:20:29', '2023-04-19 19:25:27'),
(2, 'Dezza', 'staff', '$2y$10$NbGVqM6aaUe/YgYRSzJKaeDtq6GR6ppj85OzPcuu2EEDZt9hiMZke', 'dezza', '2023-03-24 19:59:53', '2023-04-23 21:27:07'),
(5, 'Fajar', 'staff', '$2y$10$NYEnt/eMNLxz73htKSvzTOKXYiLIWCJFXdTMz3DSurTkce2RCWEOO', 'fajar', '2023-03-24 19:59:53', '2023-04-23 21:26:49'),
(6, 'Fitri', 'staff', '$2y$10$bDxfhIGoNVKSe/UTMzOn6OS03pL0S9V0DWUiuWHoVOkfchp4JZpD2', 'fitri', '2023-03-24 19:59:53', '2023-04-23 21:26:24'),
(7, 'Rizal', 'staff', '$2y$10$HmWf1ha8dvS2csTQ6K.Q4OIOe/5RXx5jEjisLVlBpJbdVtjRm5B4S', 'rizal', '2023-03-24 19:59:53', '2023-04-23 21:27:48'),
(8, 'Umar', 'staff', '$2y$10$/E2G25KjwD/FAaMCNeN3ou1/ze5IbuAcbBVIoF/bAqcVUsAASi8Ee', 'umar', '2023-03-24 19:59:53', '2023-04-23 21:28:27'),
(20, 'Jalal', 'staff', '$2y$10$oUW.Xi4McrghcbRI8AQF/OKf0c42B4G3NZWeXnF7vdVHrg.THAZkC', 'jalal', '2023-04-24 16:28:58', '2023-04-23 21:29:35'),
(22, 'Anton', 'admin', '$2y$10$CVtBKKE6nDmNkK/NUUssfu5hergS2djfAWnK0Q3ZO.hvn6ueSeioO', 'anton', '2023-04-24 16:30:17', '2023-04-23 21:30:31'),
(23, 'Yusak', 'admin', '$2y$10$bZKXlLpN8MszioZr6mddyujz5MHlr5YmTTAhCp0p5HIUJfZlA8tPG', 'yusak', '2023-04-24 16:30:41', '2023-04-23 21:30:56'),
(24, 'test', 'staff', '$2y$10$szy0sG4qin.pSnxQrItyWO2jc77oKqItAl431vrvt2LAv3DajsGaG', 'test', '2023-04-25 03:17:20', '2023-05-02 23:55:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `division_name` (`name`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `notification_readers`
--
ALTER TABLE `notification_readers`
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `id_notification` (`id_notification`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `order_divisions`
--
ALTER TABLE `order_divisions`
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_division` (`id_division`);

--
-- Indexes for table `order_process`
--
ALTER TABLE `order_process`
  ADD KEY `id_order_status` (`id_order_detail`),
  ADD KEY `id_process_machines` (`id_process_machine`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order_detail` (`id_order_detail`),
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `id_process` (`id_process`);

--
-- Indexes for table `process_machines`
--
ALTER TABLE `process_machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_ID` (`staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `process_machines`
--
ALTER TABLE `process_machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_4` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_readers`
--
ALTER TABLE `notification_readers`
  ADD CONSTRAINT `notification_readers_ibfk_1` FOREIGN KEY (`id_notification`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_readers_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_divisions`
--
ALTER TABLE `order_divisions`
  ADD CONSTRAINT `order_divisions_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_divisions_ibfk_2` FOREIGN KEY (`id_division`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_process`
--
ALTER TABLE `order_process`
  ADD CONSTRAINT `order_process_ibfk_1` FOREIGN KEY (`id_process_machine`) REFERENCES `process_machines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_process_ibfk_2` FOREIGN KEY (`id_order_detail`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`id_order_detail`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_status_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_status_ibfk_3` FOREIGN KEY (`id_process`) REFERENCES `process_machines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
