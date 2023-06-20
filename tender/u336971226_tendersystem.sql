-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2023 at 11:21 AM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u336971226_tendersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `bid_title` varchar(255) NOT NULL,
  `bid_offer` varchar(255) DEFAULT NULL,
  `timeframe` char(100) DEFAULT NULL,
  `bid_status` tinyint(2) DEFAULT 1,
  `bid_description` longtext DEFAULT NULL,
  `bid_attachment` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `tender_id`, `bid_title`, `bid_offer`, `timeframe`, `bid_status`, `bid_description`, `bid_attachment`, `updated_at`, `created_at`) VALUES
(1, 7, 7, 'Ad velit ea quibusd', NULL, 'Eaque ea rem rerum l', NULL, 'In aliqua Velit od', 'bid_16844592394542645.docx', '2023-05-19 01:20:39', '2023-05-19 01:20:39'),
(2, 7, 7, 'In eos perferendis f', 'Sequi cupidatat quia', 'Eum quia dicta magna', NULL, 'Ut sunt a qui exerci', NULL, '2023-05-19 01:21:27', '2023-05-19 01:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `business_profiles`
--

CREATE TABLE `business_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `business_city` varchar(255) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `business_latitude` varchar(255) DEFAULT NULL,
  `business_longitude` varchar(255) DEFAULT NULL,
  `business_status` tinyint(4) DEFAULT 2,
  `business_profile` text DEFAULT NULL,
  `business_logo` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `business_profiles`
--

INSERT INTO `business_profiles` (`id`, `user_id`, `business_name`, `email_address`, `contact_person`, `contact_number`, `business_city`, `business_address`, `business_latitude`, `business_longitude`, `business_status`, `business_profile`, `business_logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 10, 'Ulices Sauer', 'mitchell.lorine@example.org', 'Mr. Rex Schoen', '1-703-220-0198', 'East Generalchester', '7466 Maurine Lane\nKuhicborough, MT 78880', '-68.029367', '-141.917579', 3, NULL, 'https://via.placeholder.com/640x480.png/00ee33?text=aliquid', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(2, 10, 'Kaelyn Hegmann', 'ttremblay@example.org', 'Danika Schumm III', '+1-424-995-7578', 'East Amayaton', '442 Bergstrom Neck\nPort Deonteton, PA 87480-7208', '-33.570344', '-130.758486', 2, NULL, 'https://via.placeholder.com/640x480.png/00ff44?text=eos', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(3, 8, 'Ursula Hudson', 'hailie17@example.net', 'Coleman Conn PhD', '+1-442-265-0512', 'New Isaiton', '7960 Lockman Orchard\nPort Tatyanafurt, OH 53023-6394', '-32.973863', '-62.821992', 2, NULL, 'https://via.placeholder.com/640x480.png/00ee88?text=doloribus', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(4, 8, 'Stefanie Pacocha', 'alverta.harber@example.net', 'Dr. Jody Wolff', '(281) 959-2048', 'Horaceland', '8653 Jerry Prairie Suite 109\nSouth Tyrique, OK 98355-4369', '-29.880648', '-126.604598', 2, NULL, 'https://via.placeholder.com/640x480.png/00aa77?text=cum', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(5, 9, 'Matteo Gulgowski', 'acummerata@example.net', 'Hiram Graham', '+18088401007', 'New Katlynnfurt', '29724 Reynolds Mountains Suite 551\nNorth Jodie, RI 18879-0065', '-77.877889', '-88.795523', 3, NULL, 'https://via.placeholder.com/640x480.png/0055bb?text=sed', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(6, 4, 'Eric Collins', 'ellie98@example.org', 'Prof. Alek Grady DDS', '979-822-8311', 'Littelport', '139 Beier Manors\nCormiermouth, PA 34091-0081', '1.571766', '2.288097', 1, NULL, 'https://via.placeholder.com/640x480.png/000066?text=debitis', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(7, 10, 'Jamie Mueller', 'hayden.purdy@example.com', 'Robert Pollich', '+1-757-591-3631', 'Runolfssonstad', '91650 Haley Walks Suite 425\nPort Laverna, KS 30037', '53.465175', '-103.505888', 1, NULL, 'https://via.placeholder.com/640x480.png/0088dd?text=ea', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(8, 8, 'Melvin Cormier', 'merlin12@example.org', 'Dr. Wilbert Beier Jr.', '(916) 357-7397', 'Greenton', '84832 Gulgowski Ports\nWest Rubye, MD 94041', '-84.997998', '179.146385', 1, NULL, 'https://via.placeholder.com/640x480.png/00aaaa?text=qui', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(9, 6, 'Julie Conroy', 'sedrick87@example.net', 'Cristina Ferry', '(702) 265-2073', 'New Jazlyn', '2819 Koch Isle Apt. 345\nCalebport, NC 18339-6559', '21.412853', '-162.728174', 2, NULL, 'https://via.placeholder.com/640x480.png/0077cc?text=et', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(10, 8, 'Hortense Jerde', 'alverta94@example.com', 'Mackenzie Purdy', '+1-575-367-5614', 'Faytown', '617 Dolly Tunnel\nNew Orrinside, RI 13965', '-2.126523', '169.550139', 1, NULL, 'https://via.placeholder.com/640x480.png/002233?text=est', NULL, '2023-04-01 19:21:59', '2023-04-01 19:21:59'),
(11, 1, 'Dylan Diaz', 'lisykin@mailinator.com', 'Eos nostrud ut veli', '3934', 'Incididunt quasi qui', 'Dignissimos sed voludsa', 'Et quidem unde natus', 'Molestiae iste sunt', 1, 'Velit ex et vel dolo', 'logo_16805851198566551.jpg', NULL, '2023-04-03 23:19:03', '2023-04-14 11:21:30'),
(12, 23, 'Marvin Cobb', 'sagyvex@mailinator.com', 'Ullamco maxime solut', '914', 'Dolorem rerum vel no', 'Dolore quis omnis do', 'Minim harum hic quas', 'Laboriosam quo aper', 2, 'Corporis temporibus', NULL, NULL, '2023-04-14 10:22:59', '2023-04-14 11:05:37'),
(13, 24, 'tahir rasheed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-14 15:02:19', '2023-04-14 15:02:19'),
(14, 25, 'Saad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-14 20:03:56', '2023-04-14 20:03:56'),
(15, 26, 'Saad2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-14 22:04:36', '2023-04-14 22:04:36'),
(16, 27, 'Saad2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-14 22:06:32', '2023-04-14 22:06:32'),
(17, 28, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-15 01:01:19', '2023-04-15 01:01:19'),
(18, 29, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-15 01:15:48', '2023-04-15 01:15:48'),
(19, 30, 'Yahya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-15 06:39:20', '2023-04-15 06:39:20'),
(20, 31, 'shan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-15 06:49:12', '2023-04-15 06:49:12'),
(21, 32, 'babar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-15 06:49:55', '2023-04-15 06:49:55'),
(22, 33, 'sss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 06:11:58', '2023-04-16 06:11:58'),
(23, 34, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 06:13:04', '2023-04-16 06:13:04'),
(24, 35, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 06:44:11', '2023-04-16 06:44:11'),
(25, 36, 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 06:44:56', '2023-04-16 06:44:56'),
(26, 37, 'saad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 06:48:57', '2023-04-16 06:48:57'),
(27, 38, 'mmm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 06:49:34', '2023-04-16 06:49:34'),
(28, 39, 'saad', 'saad@gmail.com', '05544', '05555', 'riyadh', 'gg', '44', '44', 1, 'grr', NULL, NULL, '2023-04-16 06:54:13', '2023-04-16 07:00:52'),
(29, 40, 'ccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 07:03:36', '2023-04-16 07:03:36'),
(30, 41, 'sad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 07:19:27', '2023-04-16 07:19:27'),
(31, 42, 'sad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 07:25:00', '2023-04-16 07:25:00'),
(32, 43, 'sdc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 'logo_16816692064503784.png', NULL, '2023-04-16 09:40:44', '2023-04-16 18:20:06'),
(33, 44, 'mmm', NULL, 'Michael', '0555', 'Miami', NULL, NULL, NULL, 1, NULL, 'logo_16830348208229375.png', NULL, '2023-04-16 13:10:24', '2023-05-02 13:40:20'),
(34, 45, 'ven2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 18:40:25', '2023-04-16 18:40:25'),
(35, 46, 'ven2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 18:40:58', '2023-04-16 18:40:58'),
(36, 47, 'bbb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 18:40:59', '2023-04-16 18:40:59'),
(37, 48, 'sddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-16 20:35:10', '2023-04-16 20:35:10'),
(38, 49, 'wwd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-18 17:23:36', '2023-04-18 17:23:36'),
(39, 50, 'saaddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-18 17:53:18', '2023-04-18 17:53:18'),
(40, 51, 'abc2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-20 05:05:25', '2023-04-20 05:05:25'),
(41, 52, 'iis3d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-24 09:57:11', '2023-04-24 09:57:11'),
(42, 53, 'ven222', NULL, '0559922', NULL, 'Riyadh', NULL, NULL, NULL, NULL, 'Aaa', NULL, NULL, '2023-04-26 16:15:33', '2023-04-30 12:54:34'),
(43, 54, 's3d22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-27 14:36:31', '2023-04-27 14:36:31'),
(44, 55, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-28 21:40:26', '2023-04-28 21:40:26'),
(45, 56, 'sarmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-30 00:21:02', '2023-04-30 00:21:02'),
(46, 57, 'ranufunim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-30 00:25:35', '2023-04-30 00:25:35'),
(47, 58, 'cafunur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-30 00:30:16', '2023-04-30 00:30:16'),
(48, 59, 'zykytecadu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-30 09:56:28', '2023-04-30 09:56:28'),
(49, 60, 'gyvavoz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-30 10:14:58', '2023-04-30 10:14:58'),
(50, 61, 'lyjylumon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-04-30 10:20:54', '2023-04-30 10:20:54'),
(51, 62, 'Sarmad2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 12:40:12', '2023-05-02 12:40:12'),
(52, 63, 'maki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 13:22:53', '2023-05-02 13:22:53'),
(53, 64, 'Pexcc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 13:23:24', '2023-05-02 13:23:24'),
(54, 65, 'man', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 13:25:32', '2023-05-02 13:25:32'),
(55, 66, 'Pexcc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:44:26', '2023-05-02 14:44:26'),
(56, 67, 'man', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:48:02', '2023-05-02 14:48:02'),
(57, 68, 'man2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:49:25', '2023-05-02 14:49:25'),
(58, 69, 'Wmm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:49:27', '2023-05-02 14:49:27'),
(59, 70, 'man2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:52:06', '2023-05-02 14:52:06'),
(60, 71, 'sarmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:52:51', '2023-05-02 14:52:51'),
(61, 72, 'man2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:55:27', '2023-05-02 14:55:27'),
(62, 73, 'man3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 14:56:58', '2023-05-02 14:56:58'),
(63, 74, 'sarmad872', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 17:53:46', '2023-05-02 17:53:46'),
(64, 75, 'S3dm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-02 18:38:40', '2023-05-02 18:38:40'),
(65, 76, 'Scm22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-03 07:33:37', '2023-05-03 07:33:37'),
(66, 77, 'mbc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-03 07:34:26', '2023-05-03 07:34:26'),
(67, 4, 'sarmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-15 05:51:47', '2023-05-15 05:51:47'),
(68, 5, 'sarmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-15 06:20:22', '2023-05-15 06:20:22'),
(69, 6, 'Sarmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-15 06:45:16', '2023-05-15 06:45:16'),
(70, 7, 'Sarmad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-15 06:47:43', '2023-05-15 06:47:43'),
(71, 8, 'kojyk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-18 07:33:19', '2023-05-18 07:33:19'),
(72, 9, 'KEHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-18 07:34:04', '2023-05-18 07:34:04'),
(73, 10, 'su.systems', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2023-05-30 22:19:55', '2023-05-30 22:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `business_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT 1,
  `category_thumbnail` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `business_id`, `category_name`, `category_slug`, `category_status`, `category_thumbnail`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, 12, 'Vehicles', 'vehicles', 1, 'thumbnail_16816095304348528.jpg', NULL, NULL, '2023-04-16 01:45:30', '2023-05-16 17:20:37'),
(22, 28, 'Mobile & Computers', 'mobile-computers', 1, 'thumbnail_16816281699976458.png', NULL, NULL, '2023-04-16 06:56:09', '2023-05-16 17:20:28'),
(23, 33, 'Stationary', 'stationary', 1, 'thumbnail_16842576135177709.jpg', NULL, NULL, '2023-04-16 13:14:10', '2023-05-16 17:20:13'),
(26, NULL, 'Healthcare', 'healthcare', 1, 'thumbnail_16825260259016847.png', NULL, NULL, '2023-04-26 16:20:25', '2023-05-16 18:56:42'),
(27, NULL, 'Information Technology', 'information-technology', 1, 'thumbnail_16842574929333266.png', NULL, NULL, '2023-04-27 13:08:04', '2023-05-16 17:18:12'),
(28, NULL, 'Logistics', 'logistics', 1, NULL, NULL, NULL, '2023-05-16 18:56:59', '2023-05-16 18:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `tender_id`, `full_name`, `email`, `comment`, `updated_at`, `created_at`) VALUES
(1, 3, 'Kylynn Russo', 'nyribaguke@mailinator.com', 'Ut eveniet enim nis', '2023-05-19 06:14:59', '2023-05-19 06:14:59'),
(2, 3, 'Ishmael Morris', 'tipi@mailinator.com', 'Nostrum voluptatibus', '2023-05-19 06:15:24', '2023-05-19 06:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `email`, `subject`, `message`, `updated_at`, `created_at`) VALUES
(1, 'Iliana Pierce', 'vyteqiqobe@mailinator.com', 'Ut hic voluptatum ut', 'Laboriosam tempor s', '2023-05-17 18:34:20', '2023-05-17 18:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_slug` varchar(255) NOT NULL,
  `location_status` tinyint(4) NOT NULL DEFAULT 1,
  `location_thumbnail` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `business_id`, `location_name`, `location_slug`, `location_status`, `location_thumbnail`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(27, NULL, 'USA', 'usa', 1, 'thumbnail_16829308948221210.jpg', NULL, NULL, '2023-05-01 08:18:13', '2023-05-01 08:48:14'),
(28, NULL, 'UK', 'uk', 1, 'thumbnail_16829308769031476.jpg', NULL, NULL, '2023-05-01 08:18:25', '2023-05-01 08:47:56'),
(29, NULL, 'France', 'france', 1, 'thumbnail_16829308467195276.jpg', NULL, NULL, '2023-05-01 08:18:39', '2023-05-01 08:47:26'),
(30, NULL, 'China', 'china', 1, 'thumbnail_16829308223053550.jpg', NULL, NULL, '2023-05-01 08:18:57', '2023-05-01 08:47:02'),
(31, NULL, 'Canada', 'canada', 1, 'thumbnail_16829308042980531.jpg', NULL, NULL, '2023-05-01 08:19:13', '2023-05-01 08:46:44'),
(32, NULL, 'Australia', 'australia', 1, 'thumbnail_16842620794251448.png', NULL, NULL, '2023-05-01 08:19:25', '2023-05-16 18:34:39'),
(33, NULL, 'Germany', 'germany', 1, NULL, NULL, NULL, '2023-05-16 18:35:00', '2023-05-16 18:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message_title` varchar(255) DEFAULT NULL,
  `message_description` longtext DEFAULT NULL,
  `message_status` tinyint(2) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `message_title`, `message_description`, `message_status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 7, 3, NULL, 'test', 1, NULL, '2023-05-19 18:17:12', '2023-05-19 18:17:12'),
(2, 7, 9, NULL, 'test', 1, NULL, '2023-05-21 08:30:58', '2023-05-21 08:30:58'),
(3, 7, 3, NULL, 'testing', 1, NULL, '2023-05-23 23:10:33', '2023-05-23 23:10:33'),
(4, 7, 3, NULL, 'hello Mrs. Ottilie, I wanna bid on your tender', 1, NULL, '2023-05-23 23:13:36', '2023-05-23 23:13:36'),
(5, 3, 7, NULL, 'yes sarmad', 1, NULL, '2023-05-23 23:37:01', '2023-05-23 23:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_31_180040_create_business_profiles_table', 1),
(6, '2023_03_31_182411_create_categories_table', 1),
(7, '2023_03_31_183233_create_sub_categories_table', 1),
(8, '2023_03_31_183503_create_products_table', 1),
(9, '2023_03_31_184649_create_product_variants_table', 1),
(10, '2023_04_07_115813_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` char(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_amount` int(11) DEFAULT NULL,
  `order_status` tinyint(2) DEFAULT 1,
  `buyer_status` tinyint(2) DEFAULT NULL,
  `vendor_status` tinyint(2) DEFAULT NULL,
  `payment_status` tinyint(2) DEFAULT 1,
  `card_number` varchar(255) DEFAULT NULL,
  `card_title` varchar(255) DEFAULT NULL,
  `exp_year` char(100) DEFAULT NULL,
  `exp_month` char(100) DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `name`, `email`, `contact`, `shipping_address`, `order_amount`, `order_status`, `buyer_status`, `vendor_status`, `payment_status`, `card_number`, `card_title`, `exp_year`, `exp_month`, `cvc`, `date`, `updated_at`, `created_at`) VALUES
(1, 61, '332358', 'lyjylumon', 'sarmad.dts@gmail.com', '96582478523', 'test address', 8460, 2, NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, '2023-04-30 12:14:53', '2023-04-30 12:44:45', '2023-04-30 12:14:53'),
(2, 42, '340776', 'sad', 'sad@gmail.com', '0554422233', 'Riyadh, Saudi Arabia', 1999, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, '2023-04-30 12:55:05', '2023-05-01 06:38:27', '2023-04-30 12:55:05'),
(3, 50, '543404', 'saaddd', 'buy@gmail.com', '555555', 'Riyadh', 1999, 3, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2023-05-01 06:40:43', '2023-05-01 06:41:58', '2023-05-01 06:40:43'),
(4, 50, '932040', 'saaddd', 'buy@gmail.com', '055555', 'Riyadh', 3998, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, '2023-05-01 08:21:23', '2023-05-02 08:29:17', '2023-05-01 08:21:23'),
(5, 23, '877185', 'omar', 'omar@mail.com', '025635', 'test address', 3998, 3, NULL, 3, 3, '4242424242424242', 'Test', '2023', '12', 123, '2023-05-02 08:51:00', '2023-05-02 19:12:06', '2023-05-02 08:51:00'),
(6, 50, '953632', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 0, 1, NULL, NULL, 1, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 11:43:30', '2023-05-02 11:43:30', '2023-05-02 11:43:30'),
(7, 44, '969713', 'mmm', 'm@gmail.com', 'mmm', 'mumbai', 0, 1, NULL, NULL, 1, '4845', 'mmm ccc', '24', '05', 123, '2023-05-02 13:35:23', '2023-05-02 13:35:23', '2023-05-02 13:35:23'),
(8, 44, '491721', 'mmm', 'm@gmail.com', 'mmm', 'Mumbai', 0, 1, NULL, NULL, 1, '4845', 'mmm ccc', '24', '05', 123, '2023-05-02 13:36:07', '2023-05-02 13:36:07', '2023-05-02 13:36:07'),
(9, 50, '450335', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 1999, 2, NULL, 2, 2, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 13:56:21', '2023-05-02 15:02:55', '2023-05-02 13:56:21'),
(10, 50, '247201', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 20000, 2, NULL, NULL, 2, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 13:58:37', '2023-05-02 14:00:34', '2023-05-02 13:58:37'),
(11, 50, '721712', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 20000, 3, NULL, NULL, 3, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 14:01:59', '2023-05-02 14:02:17', '2023-05-02 14:01:59'),
(12, 50, '967832', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 0, 1, NULL, NULL, 1, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 15:08:45', '2023-05-02 15:08:45', '2023-05-02 15:08:45'),
(13, 50, '465781', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 20000, 2, NULL, 2, 2, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 15:15:43', '2023-05-02 15:19:10', '2023-05-02 15:15:43'),
(14, 50, '520946', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 1999, 2, NULL, 2, 2, '244034343', 'Saad', '2025', '4', 455, '2023-05-02 15:16:12', '2023-05-02 15:17:35', '2023-05-02 15:16:12'),
(15, 50, '119525', 'saaddd', 'buy@gmail.com', '05555', 'Riyadh', 1999, 2, NULL, NULL, 2, '244034343', 'Saad', '2025', '4', 455, '2023-05-03 07:23:56', '2023-05-03 07:46:10', '2023-05-03 07:23:56'),
(16, 40, '180322', 'ccc', 'ccc@gmail.com', 'Simon michael', 'Mumbai', 0, 1, NULL, NULL, 1, '4568', 'Simon michael', '24', '06', 345, '2023-05-03 07:27:25', '2023-05-03 07:27:25', '2023-05-03 07:27:25'),
(17, 40, '850196', 'ccc', 'ccc@gmail.com', 'Simon michael', 'Mumbai', 6000, 2, NULL, NULL, 3, '4568', 'Simon michael', '24', '06', 345, '2023-05-03 07:27:58', '2023-05-03 07:47:08', '2023-05-03 07:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `order_amount` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `user_id`, `product_id`, `vendor_id`, `business_id`, `quantity`, `amount`, `order_amount`, `updated_at`, `created_at`) VALUES
(1, 1, 61, 1, 23, 12, 3, 2820, 8460, '2023-04-30 12:14:53', '2023-04-30 12:14:53'),
(2, 2, 42, 2, 53, 42, 1, 1999, 1999, '2023-04-30 12:55:05', '2023-04-30 12:55:05'),
(3, 3, 50, 2, 53, 42, 1, 1999, 1999, '2023-05-01 06:40:43', '2023-05-01 06:40:43'),
(4, 4, 50, 2, 53, 42, 2, 1999, 3998, '2023-05-01 08:21:23', '2023-05-01 08:21:23'),
(5, 5, 23, 2, 53, 42, 2, 1999, 3998, '2023-05-02 08:51:00', '2023-05-02 08:51:00'),
(6, 9, 50, 2, 53, 42, 1, 1999, 1999, '2023-05-02 13:56:21', '2023-05-02 13:56:21'),
(7, 10, 50, 3, 44, 33, 1, 20000, 20000, '2023-05-02 13:58:37', '2023-05-02 13:58:37'),
(8, 11, 50, 3, 44, 33, 1, 20000, 20000, '2023-05-02 14:01:59', '2023-05-02 14:01:59'),
(9, 13, 50, 3, 44, 33, 1, 20000, 20000, '2023-05-02 15:15:43', '2023-05-02 15:15:43'),
(10, 14, 50, 2, 53, 42, 1, 1999, 1999, '2023-05-02 15:16:12', '2023-05-02 15:16:12'),
(11, 15, 50, 2, 53, 42, 1, 1999, 1999, '2023-05-03 07:23:56', '2023-05-03 07:23:56'),
(12, 17, 40, 5, 44, 33, 1, 6000, 6000, '2023-05-03 07:27:58', '2023-05-03 07:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_price` bigint(30) NOT NULL,
  `product_inventory` int(11) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `product_status` tinyint(4) NOT NULL DEFAULT 1,
  `product_thumbnail` varchar(255) DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `business_id`, `user_id`, `category_id`, `subcategory_id`, `product_title`, `product_slug`, `product_price`, `product_inventory`, `subtitle`, `product_status`, `product_thumbnail`, `product_description`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 12, 23, 27, 22, 'Buggati', 'buggati', 2820, 7, 'Buggati', 1, 'product_16828566836979097.jpg', 'Labore id, culpa qui.', 23, NULL, '2023-04-30 12:11:23', '2023-04-30 12:14:53'),
(2, 42, 53, 22, 21, 'IPhone 11', 'iphone-11', 1999, 11, '256 GB', 1, 'product_16828592128565948.jpg', '<p><span class=\"ILfuVd\" lang=\"en\"><span class=\"hgKElc\"><span dir=\"ltr\">The iPhone 11 display has <b>rounded corners that follow a beautiful curved design</b>,\r\n and these corners are within a standard rectangle. When measured as a \r\nstandard rectangular shape, the screen is 6.06 inches diagonally (actual\r\n viewable area is less). Video playback: Up to 17 hours.</span></span></span></p>', 53, NULL, '2023-04-30 12:53:32', '2023-05-03 07:23:56'),
(3, 33, 44, 23, 27, 'Camry', 'camry', 20000, 5, 'Camry 2009', 1, 'product_16830358791907365.jpg', NULL, 44, NULL, '2023-05-02 13:57:59', '2023-05-03 07:21:23'),
(5, 33, 44, 22, 21, 'Iphone 14', 'iphone-14', 6000, 9, 'Iphone 14 pro max', 1, 'product_16830987868640341.jpg', '<p><font color=\"#86868b\" face=\"SF Pro Text, Myriad Set Pro, SF Pro Icons, Apple Legacy Chevron, Helvetica Neue, Helvetica, Arial, sans-serif\"><span style=\"font-size: 12px; letter-spacing: -0.12px; background-color: rgb(22, 22, 23);\">iPhone 14 Pro and iPhone 14 Pro Max are splash, water, and dust resistant and were tested under controlled laboratory conditions with a rating of IP68 under IEC standard 60529 (maximum depth of 6 meters up to 30 minutes). Splash, water, and dust resistance are not permanent conditions. Resistance might decrease as a result of normal wear. Do not attempt to charge a wet iPhone; refer to the user guide for cleaning and drying instructions.</span></font><br></p>', 44, NULL, '2023-05-03 07:26:26', '2023-05-03 07:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `title`, `image`, `updated_at`, `created_at`) VALUES
(1, 1, NULL, 'image_168285668361880.jpeg', '2023-04-30 12:11:23', '2023-04-30 12:11:23'),
(2, 1, NULL, 'image_168285668384593.jpeg', '2023-04-30 12:11:23', '2023-04-30 12:11:23'),
(3, 1, NULL, 'image_168285668353003.png', '2023-04-30 12:11:23', '2023-04-30 12:11:23'),
(4, 2, NULL, 'image_168285921247081.jpg', '2023-04-30 12:53:32', '2023-04-30 12:53:32'),
(5, 2, NULL, 'image_168285921285526.jpg', '2023-04-30 12:53:32', '2023-04-30 12:53:32'),
(6, 2, NULL, 'image_168285921224977.jpg', '2023-04-30 12:53:32', '2023-04-30 12:53:32'),
(7, 2, NULL, 'image_168285921297663.png', '2023-04-30 12:53:32', '2023-04-30 12:53:32'),
(8, 3, NULL, 'image_168303587961988.jpg', '2023-05-02 13:57:59', '2023-05-02 13:57:59'),
(9, 3, NULL, 'image_168303587915993.jpg', '2023-05-02 13:57:59', '2023-05-02 13:57:59'),
(10, 3, NULL, 'image_168303587923103.jpg', '2023-05-02 13:57:59', '2023-05-02 13:57:59'),
(11, 4, NULL, 'image_168303923280513.jpeg', '2023-05-02 14:53:52', '2023-05-02 14:53:52'),
(12, 4, NULL, 'image_168303923297683.jpg', '2023-05-02 14:53:52', '2023-05-02 14:53:52'),
(13, 5, NULL, 'image_168309878668294.jpg', '2023-05-03 07:26:26', '2023-05-03 07:26:26'),
(14, 5, NULL, 'image_168309878639256.jpg', '2023-05-03 07:26:26', '2023-05-03 07:26:26'),
(15, 5, NULL, 'image_16830987867476.jpg', '2023-05-03 07:26:26', '2023-05-03 07:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_type` varchar(255) NOT NULL,
  `variant_value` varchar(255) NOT NULL,
  `variant_price` varchar(255) NOT NULL,
  `variant_slug` varchar(255) NOT NULL,
  `variant_image` varchar(255) DEFAULT NULL,
  `variant_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_tenders`
--

CREATE TABLE `saved_tenders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `saved_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_tenders`
--

INSERT INTO `saved_tenders` (`id`, `user_id`, `tender_id`, `saved_date`, `updated_at`, `created_at`) VALUES
(1, 7, 2, '2023-05-18 00:01:19', '2023-05-18 00:01:19', '2023-05-18 00:01:19'),
(2, 7, 2, '2023-05-18 00:05:50', '2023-05-18 00:05:50', '2023-05-18 00:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `date`, `updated_at`, `created_at`) VALUES
(1, 'vafov@mailinator.com', '2023-05-17 18:03:06', '2023-05-17 18:03:06', '2023-05-17 18:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_slug` varchar(255) NOT NULL,
  `subcategory_status` tinyint(4) NOT NULL DEFAULT 1,
  `subcategory_thumbnail` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `business_id`, `category_id`, `subcategory_name`, `subcategory_slug`, `subcategory_status`, `subcategory_thumbnail`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 12, 22, 'Samsung', 'samsung', 1, 'subcategory_16816097729459708.jpg', NULL, NULL, '2023-04-16 01:46:12', '2023-05-16 17:22:58'),
(21, 28, 21, 'Iphone', 'iphone', 1, 'subcategory_16816282202555803.jpg', NULL, NULL, '2023-04-16 06:57:00', '2023-04-16 06:57:00'),
(22, 33, 21, 'Bugati', 'bugati', 1, 'subcategory_1681650903678566.jpg', NULL, NULL, '2023-04-16 13:15:03', '2023-05-16 17:22:43'),
(24, NULL, 23, 'Audi', 'audi', 1, 'subcategory_1682052100513876.jpg', NULL, NULL, '2023-04-21 04:38:58', '2023-04-21 04:41:40'),
(26, NULL, 26, 'Home Appliances', 'home-appliances', 1, 'subcategory_16825260434351685.png', NULL, NULL, '2023-04-26 16:20:43', '2023-05-16 17:21:21'),
(27, NULL, 23, 'Books', 'books', 1, 'subcategory_1684257662330839.jpg', NULL, NULL, '2023-05-02 13:56:48', '2023-05-16 17:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tender_title` text NOT NULL,
  `tender_no` varchar(255) DEFAULT NULL,
  `tender_slug` varchar(255) DEFAULT NULL,
  `tender_keywords` varchar(255) NOT NULL,
  `tender_amount` int(11) DEFAULT NULL,
  `tender_date` timestamp NULL DEFAULT current_timestamp(),
  `tender_deadline` date DEFAULT NULL,
  `tender_location` varchar(255) DEFAULT NULL,
  `tender_country` varchar(255) DEFAULT NULL,
  `tender_city` varchar(255) DEFAULT NULL,
  `tender_description` longtext DEFAULT NULL,
  `tender_requirements` longtext DEFAULT NULL,
  `tender_attachment` varchar(255) DEFAULT NULL,
  `tender_status` tinyint(2) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`id`, `user_id`, `category_id`, `tender_title`, `tender_no`, `tender_slug`, `tender_keywords`, `tender_amount`, `tender_date`, `tender_deadline`, `tender_location`, `tender_country`, `tender_city`, `tender_description`, `tender_requirements`, `tender_attachment`, `tender_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 21, 'Consequatur Sint iu', '202330420', 'consequatur-sint-iu', 'Dolore officia a ape', 6, '2023-05-03 23:32:26', '1983-12-15', 'USA', NULL, NULL, 'Eos recusandae Cons', NULL, 'attachment_16831567464709153.png', 1, NULL, '2023-05-03 23:32:26', '2023-05-03 23:32:26'),
(2, 3, 26, 'Non deserunt volupta', '202330421', 'non-deserunt-volupta', 'Quae amet in sapien', 75, '2023-05-03 23:37:43', '1993-10-24', 'Canada', NULL, NULL, 'Maiores id sit aut', NULL, 'attachment_16831570638238744.pdf', 1, NULL, '2023-05-03 23:37:43', '2023-05-03 23:37:43'),
(3, 9, 22, 'tender1', '202330422', 'tender1', 'tender1 Keywords', 15000, '2023-05-18 07:37:17', '2023-06-08', 'abc xyz', 'Pak', 'Khi', 'tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc tender1 desc', NULL, 'attachment_16843954377884109.webp', 1, NULL, '2023-05-18 07:37:17', '2023-05-18 07:37:17'),
(4, 9, 28, 'Consequuntur aut nec', '202330423', 'consequuntur-aut-nec', 'Qui fuga Et sed duc', 23, '2023-05-18 07:38:27', '1971-11-25', 'Nam nihil illum Nam', 'Est ipsum possimus', 'Rem porro omnis do e', 'Consectetur placeat', NULL, 'attachment_16843955076813621.webp', 1, NULL, '2023-05-18 07:38:27', '2023-05-18 07:38:27'),
(5, 9, 22, 'Eius eum ratione opt', '202330425', 'eius-eum-ratione-opt', 'Ex natus consequat', 88, '2023-05-18 07:39:24', '1999-01-28', 'Sapiente laboris lab', 'Sed velit nulla qua', 'Fugit molestiae adi', 'Nulla itaque sit dol', NULL, 'attachment_16843955641470802.webp', 1, NULL, '2023-05-18 07:39:24', '2023-05-18 07:39:24'),
(6, 9, 27, 'Odit adipisicing sun', '202330450', 'odit-adipisicing-sun', 'Sit dolor velit hi', 42, '2023-05-18 07:58:23', '1999-06-25', 'Deleniti dolore est', 'Cupiditate sit sint', 'Voluptas laboris nos', 'Architecto quo magni', NULL, 'attachment_16843967039176978.webp', 1, NULL, '2023-05-18 07:58:23', '2023-05-18 07:58:23'),
(7, 7, 23, 'Books & Pen', 'TENDER#20231684399000', 'books-pen', 'Rerum exercitationem', 4800, '2023-05-18 08:36:40', '2022-06-06', 'USA', 'Velit id blanditiis', 'NewYork', 'Sapiente non qui qui', 'Sapiente non qui qui ,  Sapiente non qui qui   Sapiente non qui qui', 'attachment_1684451116666092.png', 1, NULL, '2023-05-18 08:36:40', '2023-05-23 22:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` varchar(258) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `clear_password` varchar(255) NOT NULL,
  `user_type` tinyint(4) DEFAULT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT 1,
  `profile_picture` varchar(255) DEFAULT NULL,
  `contact` char(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `user_slug` char(100) DEFAULT NULL,
  `joined_on` varchar(255) DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `clear_password`, `user_type`, `user_status`, `profile_picture`, `contact`, `address`, `about`, `user_slug`, `joined_on`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Whitney Kunze', 'kyler89@example.org', '2023-04-18 19:30:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 2, 1, 'logo_1681454949668005.jpg', NULL, NULL, NULL, 'whitney-kunze', '2023-04-02 00:21:58', 'JndPLp8TZsadEN7f4d8mfCOrjJlZUI5mkcX8a3yr0Wu2YKz07K7JfzXq34Sq', NULL, '2023-04-01 19:21:58', '2023-04-18 19:30:11'),
(2, 'ADMIN', 'admin@gmail.com', '2023-04-14 08:02:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 1, 1, NULL, NULL, NULL, NULL, 'admin', '2023-04-02 00:21:58', '09LloQEIaPS7glyJFWcN70J95IDNfUPwQ1E7yI5y9wJdVr5S4uz5r9fZucOY', NULL, '2023-04-01 19:21:58', '2023-05-03 07:47:08'),
(3, 'Mrs. Ottilie Satterfield', 'senger.sarah@example.com', '', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'password', 3, 2, NULL, NULL, NULL, NULL, 'mrs.-ottilie-satterfield', '2023-04-02 00:21:58', 'J8X2MBaIBLdK0Wl1DEnHJ5TL6cxTRjxSx1vIu0FBiWtd9M4vj5b7dH4bSZW7', NULL, '2023-04-01 19:21:58', '2023-04-01 19:21:58'),
(7, 'Sarmad', 'sarmad.dts@gmail.com', '2023-05-15 06:50:28', '$2y$10$ZP2jJtP.GARJrI0tx2e2AuFOLwdStzObMyPpJhrIstAiIXjE/BV0K', 'sarmad123', 3, 2, NULL, '03205862140', 'test address', 'test about', 'sarmad', '2023-05-15 06:47:43', 'x1of0CnM08HTswgUN4lCMJdNWIwTosqpJSLVTi9uOhq3kbob8bvdOqlDB9er', NULL, '2023-05-15 06:47:43', '2023-05-17 06:54:19'),
(8, 'kojyk', 'salolemew@mailinator.com', NULL, '$2y$10$1BCFGkQU9Aa2ya9XARGmW.vz19mijyuZdr9vLHIOvmaUELlx4q55i', 'Pa$$w0rd!', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-05-18 07:33:19', 'tcYZPFYGzMdDeWBSQqFv0nfVv5m8PrivF4UNiGR6cWGt6mKexuBDKQ0yP2p0', NULL, '2023-05-18 07:33:19', '2023-05-18 07:33:19'),
(9, 'Sarfraz', 'keharjohn@gmail.com', '2023-05-18 07:34:53', '$2y$10$.kpLN4DInlZglHtaWXiOnOGSb2KbvZ3Ew/2HTNTcWX31inD1nhhZO', 'john1234', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-05-18 07:34:04', '6f13gZ17VNddNGdTF1Vt4nW7OcUcj0Fxyt7ugUDpBh0u0fydY9dQGnKD6f2o', NULL, '2023-05-18 07:34:04', '2023-05-18 07:35:38'),
(10, 'su.systems', 'su.systems2020@gmail.com', NULL, '$2y$10$UmwNf0T6vdWfqZAFD/5Unud/X1n2M0NIylbfardx3mTM/HGdSPBRu', '123456', 3, 2, NULL, NULL, NULL, NULL, NULL, '2023-05-30 22:19:55', '23XGft6CiqCkdM8UjoYsIuBmC2wP9EmZxxxYeSsYGWPCs80fPyltcDQpHwBg', NULL, '2023-05-30 22:19:55', '2023-05-30 22:19:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_profiles`
--
ALTER TABLE `business_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_tenders`
--
ALTER TABLE `saved_tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_profiles`
--
ALTER TABLE `business_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_tenders`
--
ALTER TABLE `saved_tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
