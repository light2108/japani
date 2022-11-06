-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 03:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@com', '$2y$10$SKbTwXtm/UwAb1LLI7ALjOYSFrLNQKC8Iiit3LAoAWUso4XhhM7aa', 'backend/imgs/1664592992.jpg', NULL, '2022-10-01 02:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mimage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `mimage`, `category_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Collagen Shiseido', 'backend/imgs/1666922525.jpg', NULL, '3', '1', 1, '2022-10-06 07:38:30', '2022-11-03 03:14:38'),
(2, 'Mỹ phẩm SK-II', 'backend/imgs/1666922532.jpg', NULL, '4', '1', 1, '2022-10-28 02:02:12', '2022-11-03 03:14:49'),
(3, 'Giảm cân an toàn', 'backend/imgs/1666922539.jpg', NULL, '2', '1', 1, '2022-10-28 02:02:19', '2022-11-03 03:14:56'),
(4, 'Ngày Đôi Ưu Đãi Bội', 'backend/imgs/1666922547.jpg', NULL, '5', '1', 1, '2022-10-28 02:02:27', '2022-11-03 03:15:10'),
(5, 'Deal tháng 9', 'backend/imgs/1666922555.jpg', NULL, '3', '1', 1, '2022-10-28 02:02:35', '2022-11-03 03:15:19'),
(6, 'Event Collagen 82x', 'backend/imgs/1666922563.jpg', NULL, '2', '1', 1, '2022-10-28 02:02:43', '2022-11-03 03:15:30'),
(7, 'Nucos', 'backend/imgs/1666922572.jpg', NULL, '5', '1', 1, '2022-10-28 02:02:52', '2022-11-03 03:15:38'),
(8, 'Sản Phẩm Thịnh Hành', 'backend/imgs/1666922581.jpg', NULL, '3', '1', 1, '2022-10-28 02:03:01', '2022-11-03 03:15:48'),
(9, NULL, 'backend/imgs/1666940954.jpg', 'backend/imgs/4814701667528930.jpg', '4', '2', 1, '2022-10-28 07:09:14', '2022-11-04 02:28:50'),
(10, NULL, 'backend/imgs/1666941289.jpg', NULL, '1', '3', 1, '2022-10-28 07:14:49', '2022-11-03 03:16:22'),
(11, NULL, 'backend/imgs/1666942284.jpg', 'backend/imgs/5214291667529515.jpg', '4', '4', 1, '2022-10-28 07:31:24', '2022-11-04 02:38:35'),
(12, NULL, 'backend/imgs/1666942438.jpg', NULL, '5', '5', 1, '2022-10-28 07:33:58', '2022-11-03 03:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `session_id`, `status`, `created_at`, `updated_at`) VALUES
(27, NULL, 'k5pt5vnee1tpl0aj65g4958de4', 0, '2022-10-20 10:38:07', '2022-10-20 10:38:07'),
(28, '1', 'pvr1oajh123u8ir9ccth5cg9hm', 2, '2022-10-21 07:04:57', '2022-10-21 08:43:17'),
(29, NULL, '', 0, '2022-10-21 07:41:27', '2022-10-21 07:41:27'),
(30, NULL, '364ca54293faf30e4a62455121902e4b', 0, '2022-10-23 01:04:13', '2022-10-23 01:04:13'),
(31, NULL, '44c1770f36a35dbfc9add808ace658e6', 0, '2022-10-23 01:05:22', '2022-10-23 01:05:22'),
(32, NULL, '04ede4edfa43da9e6f1a221a85846ef3', 0, '2022-10-23 01:05:47', '2022-10-23 01:05:47'),
(33, NULL, 'aa2402b01af5988416b9a5e0e95946fa', 0, '2022-10-23 01:06:09', '2022-10-23 01:06:09'),
(34, NULL, 'bac81789a592f08871b6e0177179f819', 0, '2022-10-23 01:06:31', '2022-10-23 01:06:31'),
(35, NULL, '7a098875b1609a9a390549c13e7510e1', 0, '2022-10-23 01:06:32', '2022-10-23 01:06:32'),
(36, NULL, 'a76bdaea561d1a5ab8aa88fa3c2c4425', 0, '2022-10-23 01:06:32', '2022-10-23 01:06:32'),
(37, NULL, '34edbd3887295fe91c7251b1855c422b', 0, '2022-10-23 01:06:38', '2022-10-23 01:06:38'),
(38, NULL, 'a9035905e846570d2c0fc1a628673054', 0, '2022-10-23 01:09:01', '2022-10-23 01:09:01'),
(39, NULL, 'ead91c9b4fea4a3cdca1948dac1927b2', 0, '2022-10-23 01:09:03', '2022-10-23 01:09:03'),
(40, NULL, '545f8cd11542be44c37128c8127e3341', 0, '2022-10-23 01:12:17', '2022-10-23 01:12:17'),
(41, NULL, '9548b4e2a0dc6f5fb970389d62c11e89', 0, '2022-10-23 01:14:23', '2022-10-23 01:14:23'),
(42, NULL, '74fec201f96026cde58fc520faacf0f8', 0, '2022-10-23 01:14:31', '2022-10-23 01:14:31'),
(43, NULL, 'e6a8d34586e47fd415265e6ffe45c713', 0, '2022-10-23 01:14:58', '2022-10-23 01:14:58'),
(44, NULL, '38d80b0f0f07a1a86e339cfa1448027a', 0, '2022-10-23 01:31:20', '2022-10-23 01:31:20'),
(45, NULL, '74afcf258c2e4c912ae2cbf0952e642e', 0, '2022-10-23 01:37:52', '2022-10-23 01:37:52'),
(46, NULL, '7257384d2e99eac1d27eeac99deca5b5', 0, '2022-10-23 01:41:13', '2022-10-23 01:41:13'),
(47, NULL, '076f9b97ade04d03834c33c466042b5c', 0, '2022-10-23 01:43:53', '2022-10-23 01:43:53'),
(48, NULL, '82a3009a0c6947bd610eb40349cda600', 0, '2022-10-23 03:52:54', '2022-10-23 03:52:54'),
(49, NULL, 'd3aa2d67cee0652f3d4f74c78578ac1a', 0, '2022-10-23 04:32:32', '2022-10-23 04:32:32'),
(50, NULL, '959e097025b47b45aea5f8b547215561', 0, '2022-10-23 07:01:56', '2022-10-23 07:01:56'),
(51, NULL, '120b4b37862df1a4242e90586a25b229', 0, '2022-10-23 09:54:14', '2022-10-23 09:54:14'),
(52, NULL, '670e8196684973a5fa501f4106d2eb52', 0, '2022-10-23 21:15:51', '2022-10-23 21:15:51'),
(53, NULL, 'd3ed7d276c8c430c95308c85f530fdf4', 0, '2022-10-23 21:16:30', '2022-10-23 21:16:30'),
(54, NULL, 'a052f82abf66eda9edbb8e05c031f0eb', 0, '2022-10-24 00:46:22', '2022-10-24 00:46:22'),
(55, NULL, '64bcf2d90c12d7942c687feefc1a507f', 0, '2022-10-24 00:46:42', '2022-10-24 00:46:42'),
(56, NULL, 'e26b51500b7e1c4e37adcfcb104752a0', 0, '2022-10-24 03:57:56', '2022-10-24 03:57:56'),
(57, NULL, 'bf75e0c61770cb87ab626daa2132cad4', 0, '2022-10-24 08:48:58', '2022-10-24 08:48:58'),
(58, NULL, 'da24ab48378d7a11965884d054a1ed25', 0, '2022-10-24 08:49:03', '2022-10-24 08:49:03'),
(59, NULL, '0b3aa263210a0a9dc16d697364029135', 0, '2022-10-24 08:51:03', '2022-10-24 08:51:03'),
(60, NULL, '87d6f432a9443d00d4afd1d4cc246b3d', 0, '2022-10-24 09:02:29', '2022-10-24 09:02:29'),
(61, NULL, '8a5cad58e10566002e981bd0a34b0c14', 0, '2022-10-24 11:07:16', '2022-10-24 11:07:16'),
(62, NULL, 'de3520bd33711171e497fe9dd96a1159', 0, '2022-10-24 13:42:34', '2022-10-24 13:42:34'),
(63, NULL, '16ebaac6ab365370ec04df121cfed632', 0, '2022-10-24 20:01:56', '2022-10-24 20:01:56'),
(64, NULL, '1800a3fc36195e722c903d05250a5e8c', 0, '2022-10-24 20:05:25', '2022-10-24 20:05:25'),
(65, NULL, 'd3372df3782835812f5cca28a63c4b38', 0, '2022-10-24 21:23:29', '2022-10-24 21:23:29'),
(66, NULL, '89efa5893589afe7d196528022cd4228', 0, '2022-10-24 21:27:01', '2022-10-24 21:27:01'),
(67, NULL, '8bcc5b3d79ba943733bdeb0700bd6703', 0, '2022-10-24 22:43:52', '2022-10-24 22:43:52'),
(68, NULL, 'cbc7cc5609277248b45c96186bd73ded', 0, '2022-10-25 02:00:25', '2022-10-25 02:00:25'),
(69, NULL, 'aa998267a30cf19f7054e49c7e52547c', 0, '2022-10-25 02:00:32', '2022-10-25 02:00:32'),
(70, NULL, 'd280fc6279a94c3eb911c9bdc476bc1f', 0, '2022-10-25 02:00:32', '2022-10-25 02:00:32'),
(71, NULL, 'dfd0e89e42194e7607e6c4dac0ede725', 0, '2022-10-25 02:00:32', '2022-10-25 02:00:32'),
(72, NULL, 'b7ae1aaf1602fdf85414c73f2da6097a', 0, '2022-10-25 02:01:26', '2022-10-25 02:01:26'),
(73, NULL, '9d959167bc74647b93609658ca7bce78', 0, '2022-10-25 02:34:15', '2022-10-25 02:34:15'),
(74, NULL, '9eb0cd66ff8bcc6bc6605c300626482c', 0, '2022-10-25 02:34:16', '2022-10-25 02:34:16'),
(75, NULL, 'mbncqkaoroddep20v5t1epvp1h', 0, '2022-10-25 02:41:14', '2022-10-25 02:41:14'),
(76, NULL, 'llp5v3g584akmc6746st8ahpha', 0, '2022-10-25 02:42:39', '2022-10-25 02:42:39'),
(77, NULL, '74rn3rjo84ko9m3v34n1n0dg9d', 0, '2022-10-25 09:44:06', '2022-10-25 09:44:06'),
(80, NULL, 'qj5r88932a23cgpbpok49v3g27', 0, '2022-10-28 01:57:35', '2022-10-28 01:57:35'),
(81, NULL, 'jjpl57erpli4q9t4ni33c0csjd', 0, '2022-10-28 07:03:43', '2022-10-28 07:03:43'),
(82, NULL, 'gttk0e2vk2fqm8s2cfrnmthfin', 0, '2022-10-29 01:44:07', '2022-10-29 01:44:07'),
(83, NULL, '22eateld7gld9bjifpl7olf5ql', 0, '2022-10-29 07:36:49', '2022-10-29 07:36:49'),
(84, NULL, 'rndv2r98tip2hfdfe5nqri0u74', 0, '2022-10-31 02:06:16', '2022-10-31 02:06:16'),
(85, NULL, 'jsp4uvcgvnuu0g6j0429dbfvm1', 0, '2022-10-31 02:07:42', '2022-10-31 02:07:42'),
(86, '1', 'fvs35vh0b04076acelea9988ij', 0, '2022-10-31 02:23:29', '2022-10-31 04:18:38'),
(87, NULL, 'q13kvcue8gk79j94lo1dd8vv0p', 0, '2022-11-01 01:59:10', '2022-11-01 01:59:10'),
(88, NULL, 'i8gmvkf8g7dbjjgutk4c7vf05i', 0, '2022-11-01 02:15:35', '2022-11-01 02:15:35'),
(89, NULL, 'l9nnjlaipc0hkptkh817vnaden', 0, '2022-11-01 04:40:10', '2022-11-01 04:40:10'),
(90, NULL, 'pujaaicnk9geu4v60okaobdqgb', 0, '2022-11-01 07:16:56', '2022-11-01 07:16:56'),
(91, NULL, 'qbvpfmbsmfut4j5t1il2ad8tc5', 0, '2022-11-03 01:40:01', '2022-11-03 01:40:01'),
(92, NULL, 'a4qcl94cieb6adqb96dd5trebj', 0, '2022-11-03 07:00:07', '2022-11-03 07:00:07'),
(93, '1', '7a5e1t49c1sel0apfognuhmpfu', 0, '2022-11-03 07:33:09', '2022-11-03 07:42:04'),
(94, NULL, 'nsq12c1aaldhqlhsafoufcc3dj', 0, '2022-11-04 01:56:56', '2022-11-04 01:56:56'),
(95, NULL, '9p8e3bcus5o3oo1p5pup86vaf1', 0, '2022-11-04 07:56:48', '2022-11-04 07:56:48'),
(96, NULL, 'dp45g3037pvs11iimqdakffcet', 0, '2022-11-04 09:08:43', '2022-11-04 09:08:43'),
(97, '1', '1l27qis49b0989hqrbq4ebdqdi', 0, '2022-11-05 01:46:09', '2022-11-05 01:51:31'),
(98, NULL, 'hg4pmdk21e5mhj9b42523le12e', 0, '2022-11-05 04:20:51', '2022-11-05 04:20:51'),
(99, '1', 'di8q4rcgmoeifg1srqfco8vf94', 0, '2022-11-05 07:12:01', '2022-11-05 07:29:41'),
(100, NULL, 'ik5ou8ljdich7lm7q1hn28fmlr', 0, '2022-11-05 08:05:54', '2022-11-05 08:05:54'),
(101, NULL, 'dnnqfkus8m0l20f2jmbe71d87g', 0, '2022-11-05 08:22:44', '2022-11-05 08:22:44'),
(102, NULL, 's8qq0t7vi8qf34sa0eriu5hibb', 0, '2022-11-05 13:46:36', '2022-11-05 13:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sản Phẩm Bán Chạy', 'backend/imgs/1665376658.png', 1, '2022-10-06 02:13:11', '2022-10-10 05:41:29'),
(2, 'Collagen', 'backend/imgs/1665376671.png', 1, '2022-10-06 07:41:57', '2022-10-10 05:41:56'),
(3, 'Thực Phẩm Làm Đẹp', 'backend/imgs/1665376683.png', 1, '2022-10-06 07:42:04', '2022-10-10 05:42:16'),
(4, 'Chăm Sóc Sức Khỏe', 'backend/imgs/1665376696.png', 1, '2022-10-06 07:42:11', '2022-10-10 05:42:47'),
(5, 'Chăm Sóc Cơ Thể', 'backend/imgs/1667290303.png', 1, '2022-11-01 08:11:43', '2022-11-01 08:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `product_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `rating`, `image`, `name`, `mobile`, `comment`, `created_at`, `updated_at`) VALUES
(2, '2', NULL, '5', NULL, 'long', '0989068867', 'ggkhkhkhkhkkkkh', '2022-11-05 09:25:42', '2022-11-05 09:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_30_094434_create_admins_table', 1),
(6, '2022_10_05_170430_create_categories_table', 2),
(7, '2022_10_05_170940_create_products_table', 3),
(8, '2022_10_06_141922_create_banners_table', 4),
(9, '2022_10_10_114826_create_type_products_table', 5),
(10, '2022_10_15_113718_create_carts_table', 6),
(11, '2022_10_15_113941_create_orders_table', 6),
(12, '2022_10_20_114258_create_ordereds_table', 7),
(13, '2022_10_28_170943_create_posts_table', 8),
(14, '2022_11_04_172910_create_comments_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ordereds`
--

CREATE TABLE `ordereds` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `cart_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordereds`
--

INSERT INTO `ordereds` (`id`, `cart_id`, `name`, `email`, `mobile`, `city`, `district`, `ward`, `note`, `address`, `created_at`, `updated_at`) VALUES
(3, '28', 'long', 'long@com', '0989068867', 'Thành phố Hải Phòng', 'Quận Hồng Bàng', 'Phường Thượng Lý', NULL, 'ghfghfgh', '2022-10-21 07:41:25', '2022-10-21 07:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `cart_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `product_id`, `quantity`, `price`, `image`, `name`, `url`, `created_at`, `updated_at`) VALUES
(20, '26', '2', '2', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-10-20 10:38:37', '2022-10-20 10:38:37'),
(27, '28', '2', '3', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-10-21 07:30:41', '2022-10-21 07:30:41'),
(31, '33', '2', '2', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://japavi.vn/detail/product/2', '2022-10-23 01:07:50', '2022-10-23 01:07:50'),
(32, '76', '2', '5', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-10-25 02:51:49', '2022-10-25 04:33:22'),
(34, '77', '2', '2', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-10-25 09:54:28', '2022-10-25 09:54:36'),
(35, '78', '16229', '4', '120000', 'https://japana.vn/uploads/product/2022/08/10/168x168-1660119483-cated-skincare-tang-bong-tay-trang-cao-cap-088.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'https://japana.vn/combo-dac-tri-nam-Shiseido-medicated-skincare-tang-bong-tay-trang-cao-cap-sp-16229', '2022-10-26 01:49:26', '2022-10-26 03:53:38'),
(36, '78', '2', '1', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-10-26 03:18:55', '2022-10-26 03:25:56'),
(37, '28', '16229', '2', '120000', 'https://japana.vn/uploads/product/2022/08/10/168x168-1660119483-cated-skincare-tang-bong-tay-trang-cao-cap-088.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'https://japana.vn/combo-dac-tri-nam-Shiseido-medicated-skincare-tang-bong-tay-trang-cao-cap-sp-16229', '2022-10-26 03:59:26', '2022-10-26 04:02:21'),
(38, '79', '16229', '2', '120000', 'https://japana.vn/uploads/product/2022/08/10/168x168-1660119483-cated-skincare-tang-bong-tay-trang-cao-cap-088.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'https://japana.vn/combo-dac-tri-nam-Shiseido-medicated-skincare-tang-bong-tay-trang-cao-cap-sp-16229', '2022-10-26 04:02:47', '2022-10-26 04:02:49'),
(45, '93', '2', '2', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-11-03 09:59:40', '2022-11-03 10:01:35'),
(46, '93', '3', '1', '200000', 'backend/imgs/483681351665975261.jpeg', 'Nước uống The Collagen Shiseido (Hộp 10 chai x 50ml)', 'http://localhost:8000/detail/product/3', '2022-11-03 09:59:52', '2022-11-03 09:59:52'),
(47, '94', '2', '1', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-11-04 04:35:07', '2022-11-04 04:35:07'),
(48, '96', '2', '1', '120000', 'backend/imgs/852749371665383813.jpg', 'Viên thuốc giảm nám Nhật Bản 240 viên', 'http://localhost:8000/detail/product/2', '2022-11-04 09:57:00', '2022-11-04 09:57:02'),
(49, '97', '3', '1', '200000', 'backend/imgs/483681351665975261.jpeg', 'Nước uống The Collagen Shiseido (Hộp 10 chai x 50ml)', 'http://localhost:8000/detail/product/3', '2022-11-05 04:14:18', '2022-11-05 04:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_brief` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_full` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description_brief`, `description_full`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, '3 thuốc mát gan cho trẻ em của Nhật bán chạy nhất 2022', 'backend/imgs/621821191667009462.jpg', '<p>asdfadasdadasd</p>', NULL, '0', 1, '2022-10-29 02:00:07', '2022-10-29 02:11:02'),
(2, 'dasdasdas', 'backend/imgs/590763941667009373.jpg', '<p>dasdasdasdads</p>', NULL, '0', 1, '2022-10-29 02:09:33', '2022-10-29 02:09:33'),
(3, 'đâsdasdas', 'backend/imgs/380776591667014158.jpeg', '<p>đâsdasdadadsad</p>', NULL, '0', 1, '2022-10-29 03:29:18', '2022-10-29 03:29:18'),
(4, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'backend/imgs/651136721667014174.jpeg', '<p>ddddddddddddddasdadadadadsad</p>', NULL, '0', 1, '2022-10-29 03:29:34', '2022-10-29 03:29:34'),
(5, 'đâsdasddddddddddddddddd', 'backend/imgs/916692371667014193.jpg', '<p>đahklahdlkahndlahkl;sdhjklajsdkasdklasndlsdsad</p>', NULL, '0', 1, '2022-10-29 03:29:53', '2022-10-29 03:29:53'),
(6, 'l.ákdal;sdjk;adj;ạdal;jsdljdlajsldas', 'backend/imgs/475268441667014214.jpg', '<p>áidhjoalshjdlkasd;ạd;á;d;ạdjasdhjasgdjagsdgjasgdgajsgdjasgda</p>', '<p>adadadasdads</p>', '0', 1, '2022-10-29 03:30:14', '2022-11-04 03:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `category_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeproduct_id` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sku` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gtin` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `trademark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `typeproduct_id`, `name`, `description`, `image`, `price`, `rating`, `sell`, `sku`, `gtin`, `trademark`, `specification`, `origin`, `kg`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', '1', 'Viên thuốc giảm nám Nhật Bản 240 viên', '<strong>The Collagen Shiseido dạng nước</strong> gi&uacute;p cung cấp h&agrave;m lượng cao Collagen, bổ sung nguồn năng lượng tươi trẻ cho l&agrave;n da căng mịn, săn chắc v&agrave; cơ thể khỏe khoắn, dẻo dai.</p>\r\n\r\n<h2>Collagen Shiseido dạng nước &ndash; Khỏe người, đẹp da</h2>\r\n\r\n<h3>C&ocirc;ng dụng của The Collagen Shiseido dạng nước</h3>\r\n\r\n<ul>\r\n	<li>Bổ sung nguồn năng lượng tươi trẻ, tự nhi&ecirc;n cho cơ thể khỏe khoắn, sảng kho&aacute;i.</li>\r\n	<li>Nu&ocirc;i dưỡng l&agrave;n da căng mịn, săn chắc v&agrave; đ&agrave;n hồi, căng đầy c&aacute;c nếp nhăn.</li>\r\n	<li>L&agrave;m&nbsp;<em>l&agrave;nh sẹo</em>,&nbsp;<em>hỗ trợ vết thương</em>&nbsp;được mau l&agrave;nh.</li>\r\n	<li>Cải thiện hệ miễn dịch, cho cơ thể khỏe mạnh.</li>\r\n	<li>Cung cấp h&agrave;m lượng Collagen, Hyaluronic Acid dưỡng xương khớp v&agrave; m&oacute;ng t&oacute;c chắc khỏe, dẻo dai.</li>\r\n	<li>Giảm thiểu sự h&igrave;nh th&agrave;nh c&aacute;c dấu hiệu của tuổi t&aacute;c.</li>\r\n</ul>\r\n\r\n<h3>Th&agrave;nh phần của Collagen Shiseido dạng nước</h3>\r\n\r\n<ul>\r\n	<li>H&agrave;m lượng th&agrave;nh phần c&oacute; trong 1 chai: Collagen (1000mg), Hyaluronic Acid (5mg), Vitamin C (100mg), Ceramide (600mg).</li>\r\n	<li>H&agrave;m lượng dinh dưỡng c&oacute; trong 1 chai: Năng lượng (8.2 kcal), Protein (1.1g), Lipid (0g), Carbohydrate (4.2g), muối tương đương (Sodium) (0.0019-0.18g).</li>\r\n</ul>\r\n\r\n<h3>C&aacute;ch d&ugrave;ng &amp; c&aacute;ch bảo quản nước uống Collagen Shiseido</h3>\r\n\r\n<p>Hướng dẫn sử dụng</p>\r\n\r\n<ul>\r\n	<li>D&ugrave;ng 01 lọ/ng&agrave;y, lắc đều trước khi uống.</li>\r\n	<li>Uống v&agrave;o buổi s&aacute;ng trước khi ăn hay buổi tối trước khi đi ngủ 30 ph&uacute;t.</li>\r\n	<li>Để ở ngăn m&aacute;t tủ lạnh trước khi uống để thưởng thức hương vị tươi m&aacute;t, thơm ngon.</li>\r\n	<li>Lưu &yacute;</li>\r\n	<li>T&ugrave;y theo cơ địa của người d&ugrave;ng m&agrave; c&oacute; hiệu quả kh&aacute;c nhau.</li>\r\n	<li>Sản phẩm n&agrave;y kh&ocirc;ng phải l&agrave; thuốc, kh&ocirc;ng c&oacute; t&aacute;c dụng thay thế thuốc chữa bệnh.</li>\r\n	<li>Những người bị&nbsp;dị ứng với Gelatin, cam, đậu n&agrave;nh vui l&ograve;ng tham khảo &yacute; kiến b&aacute;c sĩ trước khi d&ugrave;ng.</li>\r\n</ul>\r\n\r\n<p>C&aacute;ch bảo quản</p>\r\n\r\n<ul>\r\n	<li>Để xa tầm tay trẻ em.</li>\r\n	<li>Bảo quản ở ngăn m&aacute;t tủ lạnh.</li>\r\n	<li>Bảo quản nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</li>\r\n	<li>Tr&aacute;nh &aacute;nh nắng chiếu trực tiếp, nơi c&oacute; nhiệt độ cao.</li>\r\n</ul>', 'backend/imgs/852749371665383813.jpg,backend/imgs/535669491665383813.jpg,backend/imgs/855334511665383813.jpg,backend/imgs/811857161665383813.jpg,backend/imgs/286944161665383813.jpg', '120000', '3', '0', '001AA17', '4987415993454', 'Shiseido', 'Hộp', 'Nhật Bản', '1', 1, '2022-10-06 04:04:00', '2022-10-15 02:51:59'),
(3, '1', '2', 'Nước uống The Collagen Shiseido (Hộp 10 chai x 50ml)', '<p>dfgdfgdgdfgdg</p>', 'backend/imgs/483681351665975261.jpeg,backend/imgs/356248981665975261.jpeg,backend/imgs/89082011665975261.jpeg,backend/imgs/49254341665975261.jpeg,backend/imgs/89172931665975261.jpeg,backend/imgs/854325511665975261.jpeg', '200000', NULL, '0', '001AA16', '0', 'fsdfsdfs', 'Hộp', 'Nhật Bản', '1', 1, '2022-10-17 02:54:21', '2022-10-17 02:54:21'),
(5, '3', '9', 'Nước thần SK-II Facial Treatment Essence 75ml', '<p>đâsdasdad</p>', 'backend/imgs/292281861666948039.jpg,backend/imgs/862076041666948039.jpg,backend/imgs/916109121666948039.jpg', '100000', '3.5', '0', 'đâsdad', '0', 'dấdasd', 'đấ', 'đấ', '1', 1, '2022-10-28 09:07:19', '2022-10-28 09:07:19'),
(6, '1', '6', 'Viên uống tăng chiều cao GH Creation EX+ 270 viên', '<p>đâsđs</p>', 'backend/imgs/261264941666948125.jpg,backend/imgs/350947081666948125.jpg,backend/imgs/674963731666948125.jpg,backend/imgs/649363661666948125.jpg,backend/imgs/94241461666948125.jpg,backend/imgs/905186661666948125.jpg', '60000', NULL, '0', 'đá', '0', 'dấd', 'dấd', 'đấ', '9', 1, '2022-10-28 09:08:45', '2022-10-28 09:08:45'),
(7, '4', '5', 'Combo 2 hộp viên uống bổ xương khớp Glucosamine Orihiro 900 viên', '<p>fsdfsdfsdfsdfsdf</p>', 'backend/imgs/694674081666948179.jpg,backend/imgs/145317231666948179.jpg,backend/imgs/73665171666948179.jpg,backend/imgs/729431201666948179.jpg,backend/imgs/607338431666948179.jpg', '900000', NULL, '0', 'fsdfsdfds', '0', 'fsdfds', 'fsdfsdf', 'sdfsdf', '1', 1, '2022-10-28 09:09:39', '2022-10-28 09:09:39'),
(8, '2', '3', 'Nước uống Collagen Enrich Hebora 160.000mg 500ml', '<p>dấdasd</p>', 'backend/imgs/805246431666948230.jpg,backend/imgs/491078691666948230.jpg,backend/imgs/165898641666948230.jpg,backend/imgs/790235101666948230.jpg', '60000', NULL, '0', 'đâsda', '0', 'adasdas', 'dấds', 'đâsda', '2', 1, '2022-10-28 09:10:30', '2022-10-28 09:10:30'),
(9, '3', '9', 'Nước uống tinh chất nhau thai Placenta Mashiro 82x Sakura Premium New 450.000mg 500mlhình Nước uống tinh chất nhau thai Placenta Mashiro 8', '<p>fsdfsdsfjo;slofj;sdjf;sfjs;fjs;jf;sjd;ffj;sdljfs</p>', 'backend/imgs/821942071667031059.jpg,backend/imgs/211208071667031059.jpg', '200000', NULL, '0', 'sfdf', '0', 'sfdfsd', 'fsdfsd', 'fsdfs', '1', 1, '2022-10-29 08:10:59', '2022-10-29 08:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` bigint(50) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trắng Da - Trị Nám', '1', 1, '2022-10-10 05:28:27', '2022-10-10 05:43:21'),
(2, 'Sức Khỏe', '1', 1, '2022-10-10 05:34:20', '2022-10-10 05:44:29'),
(3, 'sản phẩm test', '2', 1, '2022-10-24 14:15:37', '2022-10-24 14:15:37'),
(4, 'Tảo Xoăn', '4', 1, '2022-10-28 09:03:45', '2022-10-28 09:03:45'),
(5, 'Hỗ Trợ Tai Biến', '4', 1, '2022-10-28 09:03:57', '2022-10-28 09:03:57'),
(6, 'Tăng Chiều Cao', '1', 1, '2022-10-28 09:04:23', '2022-10-28 09:04:23'),
(7, 'Sinh Lý Nam Nữ', '1', 1, '2022-10-28 09:04:32', '2022-10-28 09:04:32'),
(8, 'Chăm Sóc Cơ Thể', '1', 1, '2022-10-28 09:05:07', '2022-10-28 09:05:07'),
(9, 'Nhau Thai', '3', 1, '2022-10-28 09:05:30', '2022-10-28 09:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `birthday` datetime DEFAULT NULL,
  `sex` int(11) NOT NULL DEFAULT 1,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `image`, `birthday`, `sex`, `city`, `district`, `ward`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'long', 'long@com', '0989068867', NULL, '$2y$10$utdqir1RhAL0iTWBBjTI8.86wgdN2RnIJuPDORI0YAYetaa8w6gp.', 'frontend/imgs/1665373326.jpg', '2022-10-19 00:00:00', 1, 'Thành phố Hải Phòng', 'Quận Hồng Bàng', 'Phường Thượng Lý', 'ghfghfgh', NULL, '2022-10-01 07:49:04', '2022-10-10 03:42:06'),
(2, 'minh', 'minh@com', '123', NULL, '$2y$10$a3z9XT.pnwEHTRZtFBGZteNcQQyT0oF2AqqpvOcf5iqg453.8YhGu', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-04 08:51:07', '2022-10-04 08:51:07'),
(4, 'tam', 'tam@com', '1234', NULL, '$2y$10$JFcJ5EwOVdD7NtnA7IpFPeRPeG89ezMwURFZYRjb2UawTpEFw7uDS', '0', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2022-10-04 10:09:14', '2022-10-04 10:09:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordereds`
--
ALTER TABLE `ordereds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordereds`
--
ALTER TABLE `ordereds`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` bigint(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
