-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2023 às 04:50
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `followers`
--

INSERT INTO `followers` (`id`, `follower_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2023-05-20 19:02:20', '2023-05-20 19:02:20'),
(2, 15, 25, '2023-05-20 19:31:45', '2023-05-20 19:31:45'),
(3, 15, 3, '2023-05-20 19:31:47', '2023-05-20 19:31:47'),
(4, 15, 2, '2023-05-20 19:31:48', '2023-05-20 19:31:48'),
(5, 15, 23, '2023-05-20 19:31:49', '2023-05-20 19:31:49'),
(6, 15, 13, '2023-05-20 19:31:51', '2023-05-20 19:31:51'),
(7, 15, 20, '2023-05-20 19:31:54', '2023-05-20 19:31:54'),
(8, 15, 16, '2023-05-20 19:31:57', '2023-05-20 19:31:57'),
(9, 15, 19, '2023-05-20 19:31:59', '2023-05-20 19:31:59'),
(10, 12, 13, '2023-05-20 19:35:40', '2023-05-20 19:35:40'),
(11, 12, 7, '2023-05-20 19:35:41', '2023-05-20 19:35:41'),
(12, 12, 16, '2023-05-20 19:35:43', '2023-05-20 19:35:43'),
(13, 12, 24, '2023-05-20 19:35:43', '2023-05-20 19:35:43'),
(14, 12, 5, '2023-05-20 19:35:44', '2023-05-20 19:35:44'),
(15, 12, 19, '2023-05-20 19:35:46', '2023-05-20 19:35:46'),
(16, 18, 1, '2023-05-20 19:38:27', '2023-05-20 19:38:27'),
(17, 18, 28, '2023-05-20 19:38:28', '2023-05-20 19:38:28'),
(18, 18, 13, '2023-05-20 19:38:29', '2023-05-20 19:38:29'),
(19, 18, 24, '2023-05-20 19:38:30', '2023-05-20 19:38:30'),
(20, 18, 19, '2023-05-20 19:38:32', '2023-05-20 19:38:32'),
(21, 18, 16, '2023-05-20 19:38:33', '2023-05-20 19:38:33'),
(22, 21, 30, '2023-05-20 19:39:24', '2023-05-20 19:39:24'),
(23, 21, 25, '2023-05-20 19:39:25', '2023-05-20 19:39:25'),
(24, 21, 29, '2023-05-20 19:39:27', '2023-05-20 19:39:27'),
(25, 21, 1, '2023-05-20 19:39:28', '2023-05-20 19:39:28'),
(26, 21, 7, '2023-05-20 19:39:30', '2023-05-20 19:39:30'),
(27, 21, 13, '2023-05-20 19:39:31', '2023-05-20 19:39:31'),
(28, 21, 11, '2023-05-20 19:39:32', '2023-05-20 19:39:32'),
(29, 21, 19, '2023-05-20 19:39:34', '2023-05-20 19:39:34'),
(30, 4, 3, '2023-05-20 19:41:01', '2023-05-20 19:41:01'),
(31, 4, 2, '2023-05-20 19:41:02', '2023-05-20 19:41:02'),
(32, 4, 27, '2023-05-20 19:41:05', '2023-05-20 19:41:05'),
(33, 4, 12, '2023-05-20 19:41:07', '2023-05-20 19:41:07'),
(34, 4, 14, '2023-05-20 19:41:08', '2023-05-20 19:41:08'),
(35, 4, 21, '2023-05-20 19:41:09', '2023-05-20 19:41:09'),
(36, 4, 17, '2023-05-20 19:41:11', '2023-05-20 19:41:11'),
(37, 4, 9, '2023-05-20 19:41:12', '2023-05-20 19:41:12'),
(38, 30, 1, '2023-05-20 19:43:19', '2023-05-20 19:43:19'),
(39, 30, 28, '2023-05-20 19:43:19', '2023-05-20 19:43:19'),
(40, 30, 10, '2023-05-20 19:43:21', '2023-05-20 19:43:21'),
(41, 30, 20, '2023-05-20 19:43:22', '2023-05-20 19:43:22'),
(42, 30, 15, '2023-05-20 19:43:24', '2023-05-20 19:43:24'),
(44, 30, 3, '2023-05-20 19:43:28', '2023-05-20 19:43:28'),
(45, 23, 30, '2023-05-20 19:44:07', '2023-05-20 19:44:07'),
(46, 23, 7, '2023-05-20 19:44:09', '2023-05-20 19:44:09'),
(47, 23, 14, '2023-05-20 19:44:29', '2023-05-20 19:44:29'),
(49, 23, 11, '2023-05-20 19:44:34', '2023-05-20 19:44:34'),
(50, 23, 20, '2023-05-20 19:44:35', '2023-05-20 19:44:35'),
(51, 23, 16, '2023-05-20 19:44:37', '2023-05-20 19:44:37'),
(52, 23, 24, '2023-05-20 19:44:38', '2023-05-20 19:44:38'),
(53, 23, 15, '2023-05-20 19:44:39', '2023-05-20 19:44:39'),
(54, 23, 22, '2023-05-20 19:44:41', '2023-05-20 19:44:41'),
(55, 14, 12, '2023-05-20 19:49:46', '2023-05-20 19:49:46'),
(56, 14, 1, '2023-05-20 19:49:47', '2023-05-20 19:49:47'),
(57, 14, 20, '2023-05-20 19:49:49', '2023-05-20 19:49:49'),
(58, 14, 22, '2023-05-20 19:49:50', '2023-05-20 19:49:50'),
(59, 14, 15, '2023-05-20 19:49:52', '2023-05-20 19:49:52'),
(60, 14, 28, '2023-05-20 19:49:54', '2023-05-20 19:49:54'),
(61, 14, 6, '2023-05-20 19:49:55', '2023-05-20 19:49:55'),
(62, 14, 4, '2023-05-20 19:49:57', '2023-05-20 19:49:57'),
(63, 14, 30, '2023-05-20 19:49:59', '2023-05-20 19:49:59'),
(64, 17, 12, '2023-05-20 19:52:45', '2023-05-20 19:52:45'),
(65, 17, 14, '2023-05-20 19:52:47', '2023-05-20 19:52:47'),
(66, 17, 10, '2023-05-20 19:52:48', '2023-05-20 19:52:48'),
(67, 17, 22, '2023-05-20 19:52:50', '2023-05-20 19:52:50'),
(68, 17, 16, '2023-05-20 19:52:51', '2023-05-20 19:52:51'),
(69, 17, 15, '2023-05-20 19:52:52', '2023-05-20 19:52:52'),
(70, 17, 21, '2023-05-20 19:52:55', '2023-05-20 19:52:55'),
(71, 17, 1, '2023-05-20 19:52:57', '2023-05-20 19:52:57'),
(72, 20, 25, '2023-05-20 19:55:13', '2023-05-20 19:55:13'),
(73, 20, 2, '2023-05-20 19:55:14', '2023-05-20 19:55:14'),
(74, 20, 1, '2023-05-20 19:55:15', '2023-05-20 19:55:15'),
(75, 20, 23, '2023-05-20 19:55:16', '2023-05-20 19:55:16'),
(76, 20, 13, '2023-05-20 19:55:18', '2023-05-20 19:55:18'),
(77, 20, 21, '2023-05-20 19:55:19', '2023-05-20 19:55:19'),
(78, 20, 17, '2023-05-20 19:55:21', '2023-05-20 19:55:21'),
(79, 20, 16, '2023-05-20 19:55:22', '2023-05-20 19:55:22'),
(80, 20, 19, '2023-05-20 19:55:24', '2023-05-20 19:55:24'),
(81, 25, 3, '2023-05-20 20:29:55', '2023-05-20 20:29:55'),
(82, 25, 1, '2023-05-20 20:29:56', '2023-05-20 20:29:56'),
(83, 25, 11, '2023-05-20 20:29:58', '2023-05-20 20:29:58'),
(84, 25, 17, '2023-05-20 20:29:59', '2023-05-20 20:29:59'),
(85, 25, 15, '2023-05-20 20:30:00', '2023-05-20 20:30:00'),
(86, 25, 22, '2023-05-20 20:30:02', '2023-05-20 20:30:02'),
(87, 19, 15, '2023-05-20 20:34:37', '2023-05-20 20:34:37'),
(88, 19, 21, '2023-05-20 20:34:39', '2023-05-20 20:34:39'),
(89, 19, 16, '2023-05-20 20:34:48', '2023-05-20 20:34:48'),
(90, 19, 8, '2023-05-20 20:34:50', '2023-05-20 20:34:50'),
(91, 19, 2, '2023-05-20 20:34:51', '2023-05-20 20:34:51'),
(92, 19, 25, '2023-05-20 20:34:53', '2023-05-20 20:34:53'),
(93, 19, 12, '2023-05-20 20:35:42', '2023-05-20 20:35:42'),
(94, 16, 1, '2023-05-20 20:36:10', '2023-05-20 20:36:10'),
(96, 16, 13, '2023-05-20 20:36:13', '2023-05-20 20:36:13'),
(97, 16, 14, '2023-05-20 20:36:14', '2023-05-20 20:36:14'),
(98, 16, 17, '2023-05-20 20:36:15', '2023-05-20 20:36:15'),
(99, 16, 15, '2023-05-20 20:36:17', '2023-05-20 20:36:17'),
(100, 16, 12, '2023-05-20 20:36:26', '2023-05-20 20:36:26'),
(101, 16, 20, '2023-05-20 20:36:39', '2023-05-20 20:36:39'),
(102, 16, 19, '2023-05-20 20:36:43', '2023-05-20 20:36:43'),
(103, 16, 18, '2023-05-20 20:36:44', '2023-05-20 20:36:44'),
(104, 22, 16, '2023-05-20 20:41:37', '2023-05-20 20:41:37'),
(105, 22, 1, '2023-05-20 20:41:45', '2023-05-20 20:41:45'),
(106, 22, 12, '2023-05-20 20:41:47', '2023-05-20 20:41:47'),
(107, 22, 15, '2023-05-20 20:41:49', '2023-05-20 20:41:49'),
(108, 22, 17, '2023-05-20 20:41:49', '2023-05-20 20:41:49'),
(109, 24, 12, '2023-05-20 20:43:07', '2023-05-20 20:43:07'),
(110, 24, 23, '2023-05-20 20:43:10', '2023-05-20 20:43:10'),
(111, 24, 25, '2023-05-20 20:43:45', '2023-05-20 20:43:45'),
(112, 24, 2, '2023-05-20 20:43:45', '2023-05-20 20:43:45'),
(113, 24, 27, '2023-05-20 20:43:47', '2023-05-20 20:43:47'),
(114, 24, 8, '2023-05-20 20:43:48', '2023-05-20 20:43:48'),
(115, 24, 17, '2023-05-20 20:43:50', '2023-05-20 20:43:50'),
(116, 24, 11, '2023-05-20 20:43:51', '2023-05-20 20:43:51'),
(117, 24, 16, '2023-05-20 20:43:53', '2023-05-20 20:43:53'),
(118, 24, 19, '2023-05-20 20:43:55', '2023-05-20 20:43:55'),
(119, 15, 12, '2023-05-20 20:45:55', '2023-05-20 20:45:55'),
(120, 19, 1, '2023-05-20 20:51:50', '2023-05-20 20:51:50'),
(121, 11, 30, '2023-05-20 20:57:05', '2023-05-20 20:57:05'),
(122, 11, 12, '2023-05-20 20:57:06', '2023-05-20 20:57:06'),
(123, 11, 1, '2023-05-20 20:57:08', '2023-05-20 20:57:08'),
(124, 11, 7, '2023-05-20 20:57:09', '2023-05-20 20:57:09'),
(125, 11, 9, '2023-05-20 20:57:10', '2023-05-20 20:57:10'),
(126, 11, 22, '2023-05-20 20:57:12', '2023-05-20 20:57:12'),
(127, 11, 18, '2023-05-20 20:57:13', '2023-05-20 20:57:13'),
(128, 11, 16, '2023-05-20 21:00:04', '2023-05-20 21:00:04'),
(129, 11, 17, '2023-05-20 21:00:09', '2023-05-20 21:00:09'),
(130, 11, 15, '2023-05-20 21:00:11', '2023-05-20 21:00:11'),
(131, 6, 29, '2023-05-20 21:03:19', '2023-05-20 21:03:19'),
(132, 6, 30, '2023-05-20 21:03:21', '2023-05-20 21:03:21'),
(133, 6, 4, '2023-05-20 21:03:22', '2023-05-20 21:03:22'),
(134, 6, 1, '2023-05-20 21:03:23', '2023-05-20 21:03:23'),
(135, 6, 7, '2023-05-20 21:03:24', '2023-05-20 21:03:24'),
(136, 6, 16, '2023-05-20 21:03:26', '2023-05-20 21:03:26'),
(137, 6, 19, '2023-05-20 21:03:30', '2023-05-20 21:03:30'),
(138, 6, 15, '2023-05-20 21:03:30', '2023-05-20 21:03:30'),
(139, 6, 23, '2023-05-20 21:05:50', '2023-05-20 21:05:50'),
(140, 6, 21, '2023-05-20 21:05:51', '2023-05-20 21:05:51'),
(141, 3, 4, '2023-05-20 21:06:29', '2023-05-20 21:06:29'),
(142, 3, 12, '2023-05-20 21:06:37', '2023-05-20 21:06:37'),
(143, 3, 1, '2023-05-20 21:06:40', '2023-05-20 21:06:40'),
(144, 3, 17, '2023-05-20 21:06:58', '2023-05-20 21:06:58'),
(145, 3, 9, '2023-05-20 21:06:58', '2023-05-20 21:06:58'),
(146, 3, 20, '2023-05-20 21:07:00', '2023-05-20 21:07:00'),
(147, 3, 25, '2023-05-20 21:07:20', '2023-05-20 21:07:20'),
(148, 1, 18, '2023-05-20 21:09:39', '2023-05-20 21:09:39'),
(149, 1, 19, '2023-05-20 21:09:40', '2023-05-20 21:09:40'),
(150, 1, 15, '2023-05-20 21:09:41', '2023-05-20 21:09:41'),
(151, 1, 16, '2023-05-20 21:09:44', '2023-05-20 21:09:44'),
(152, 1, 20, '2023-05-20 21:09:45', '2023-05-20 21:09:45'),
(153, 1, 17, '2023-05-20 21:09:48', '2023-05-20 21:09:48'),
(154, 1, 14, '2023-05-20 21:09:49', '2023-05-20 21:09:49'),
(155, 1, 13, '2023-05-20 21:09:52', '2023-05-20 21:09:52'),
(156, 1, 12, '2023-05-20 21:09:54', '2023-05-20 21:09:54'),
(157, 26, 25, '2023-05-20 21:16:23', '2023-05-20 21:16:23'),
(158, 26, 30, '2023-05-20 21:16:24', '2023-05-20 21:16:24'),
(159, 26, 6, '2023-05-20 21:16:25', '2023-05-20 21:16:25'),
(160, 26, 12, '2023-05-20 21:16:27', '2023-05-20 21:16:27'),
(161, 26, 1, '2023-05-20 21:16:29', '2023-05-20 21:16:29'),
(162, 26, 21, '2023-05-20 21:16:30', '2023-05-20 21:16:30'),
(163, 26, 7, '2023-05-20 21:16:31', '2023-05-20 21:16:31'),
(164, 6, 26, '2023-05-21 02:22:17', '2023-05-21 02:22:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2023-05-20 19:02:47', '2023-05-20 19:02:47'),
(2, 12, 2, '2023-05-20 19:36:01', '2023-05-20 19:36:01'),
(3, 12, 1, '2023-05-20 19:36:03', '2023-05-20 19:36:03'),
(4, 18, 4, '2023-05-20 19:36:57', '2023-05-20 19:36:57'),
(5, 18, 2, '2023-05-20 19:37:00', '2023-05-20 19:37:00'),
(6, 18, 1, '2023-05-20 19:37:03', '2023-05-20 19:37:03'),
(7, 21, 6, '2023-05-20 19:39:13', '2023-05-20 19:39:13'),
(8, 21, 2, '2023-05-20 19:39:16', '2023-05-20 19:39:16'),
(9, 21, 4, '2023-05-20 19:39:17', '2023-05-20 19:39:17'),
(10, 4, 7, '2023-05-20 19:40:52', '2023-05-20 19:40:52'),
(11, 4, 1, '2023-05-20 19:40:54', '2023-05-20 19:40:54'),
(12, 30, 1, '2023-05-20 19:42:41', '2023-05-20 19:42:41'),
(13, 30, 3, '2023-05-20 19:42:54', '2023-05-20 19:42:54'),
(14, 23, 10, '2023-05-20 19:45:26', '2023-05-20 19:45:26'),
(15, 23, 4, '2023-05-20 19:45:30', '2023-05-20 19:45:30'),
(16, 23, 6, '2023-05-20 19:45:31', '2023-05-20 19:45:31'),
(17, 23, 1, '2023-05-20 19:45:33', '2023-05-20 19:45:33'),
(18, 23, 8, '2023-05-20 19:45:39', '2023-05-20 19:45:39'),
(19, 14, 2, '2023-05-20 19:50:44', '2023-05-20 19:50:44'),
(20, 17, 4, '2023-05-20 19:52:32', '2023-05-20 19:52:32'),
(21, 20, 4, '2023-05-20 20:27:29', '2023-05-20 20:27:29'),
(22, 20, 14, '2023-05-20 20:27:33', '2023-05-20 20:27:33'),
(23, 20, 12, '2023-05-20 20:27:36', '2023-05-20 20:27:36'),
(24, 25, 20, '2023-05-20 20:30:47', '2023-05-20 20:30:47'),
(25, 25, 17, '2023-05-20 20:30:48', '2023-05-20 20:30:48'),
(26, 25, 10, '2023-05-20 20:30:50', '2023-05-20 20:30:50'),
(27, 25, 7, '2023-05-20 20:30:52', '2023-05-20 20:30:52'),
(28, 19, 10, '2023-05-20 20:34:58', '2023-05-20 20:34:58'),
(29, 19, 23, '2023-05-20 20:35:01', '2023-05-20 20:35:01'),
(30, 19, 20, '2023-05-20 20:35:02', '2023-05-20 20:35:02'),
(31, 22, 30, '2023-05-20 20:40:31', '2023-05-20 20:40:31'),
(32, 22, 10, '2023-05-20 20:40:34', '2023-05-20 20:40:34'),
(33, 22, 33, '2023-05-20 20:42:15', '2023-05-20 20:42:15'),
(34, 24, 10, '2023-05-20 20:43:18', '2023-05-20 20:43:18'),
(35, 24, 30, '2023-05-20 20:43:37', '2023-05-20 20:43:37'),
(36, 11, 34, '2023-05-20 20:59:53', '2023-05-20 20:59:53'),
(37, 6, 30, '2023-05-20 21:05:19', '2023-05-20 21:05:19'),
(38, 6, 23, '2023-05-20 21:05:21', '2023-05-20 21:05:21'),
(39, 6, 17, '2023-05-20 21:05:22', '2023-05-20 21:05:22'),
(40, 6, 20, '2023-05-20 21:05:31', '2023-05-20 21:05:31'),
(41, 3, 20, '2023-05-20 21:08:30', '2023-05-20 21:08:30'),
(42, 3, 42, '2023-05-20 21:08:36', '2023-05-20 21:08:36'),
(43, 1, 20, '2023-05-20 21:09:25', '2023-05-20 21:09:25'),
(44, 1, 30, '2023-05-20 21:09:27', '2023-05-20 21:09:27'),
(45, 1, 42, '2023-05-20 21:09:29', '2023-05-20 21:09:29'),
(46, 1, 46, '2023-05-20 21:09:31', '2023-05-20 21:09:31'),
(47, 1, 6, '2023-05-20 21:10:24', '2023-05-20 21:10:24'),
(48, 26, 37, '2023-05-21 02:21:31', '2023-05-21 02:21:31'),
(49, 26, 38, '2023-05-21 02:21:34', '2023-05-21 02:21:34'),
(50, 26, 26, '2023-05-21 02:21:36', '2023-05-21 02:21:36'),
(51, 26, 10, '2023-05-21 02:21:39', '2023-05-21 02:21:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `like_videos`
--

CREATE TABLE `like_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `like_videos`
--

INSERT INTO `like_videos` (`id`, `user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 21, 6, '2023-05-20 19:40:12', '2023-05-20 19:40:12'),
(2, 21, 8, '2023-05-20 19:40:16', '2023-05-20 19:40:16'),
(3, 21, 5, '2023-05-20 19:40:18', '2023-05-20 19:40:18'),
(4, 4, 10, '2023-05-20 19:41:37', '2023-05-20 19:41:37'),
(5, 4, 8, '2023-05-20 19:41:40', '2023-05-20 19:41:40'),
(6, 4, 3, '2023-05-20 19:41:42', '2023-05-20 19:41:42'),
(7, 4, 1, '2023-05-20 19:41:44', '2023-05-20 19:41:44'),
(8, 30, 8, '2023-05-20 19:43:05', '2023-05-20 19:43:05'),
(9, 23, 9, '2023-05-20 19:46:53', '2023-05-20 19:46:53'),
(10, 23, 4, '2023-05-20 19:46:55', '2023-05-20 19:46:55'),
(11, 23, 1, '2023-05-20 19:46:56', '2023-05-20 19:46:56'),
(12, 23, 8, '2023-05-20 19:47:00', '2023-05-20 19:47:00'),
(13, 23, 10, '2023-05-20 19:47:02', '2023-05-20 19:47:02'),
(14, 14, 9, '2023-05-20 19:50:48', '2023-05-20 19:50:48'),
(16, 14, 10, '2023-05-20 19:50:58', '2023-05-20 19:50:58'),
(17, 25, 12, '2023-05-20 20:30:19', '2023-05-20 20:30:19'),
(18, 25, 6, '2023-05-20 20:30:21', '2023-05-20 20:30:21'),
(19, 25, 1, '2023-05-20 20:30:24', '2023-05-20 20:30:24'),
(20, 5, 12, '2023-05-20 20:32:00', '2023-05-20 20:32:00'),
(21, 5, 1, '2023-05-20 20:32:05', '2023-05-20 20:32:05'),
(22, 16, 1, '2023-05-20 20:37:57', '2023-05-20 20:37:57'),
(23, 24, 1, '2023-05-20 20:44:17', '2023-05-20 20:44:17'),
(24, 24, 6, '2023-05-20 20:44:20', '2023-05-20 20:44:20'),
(25, 24, 9, '2023-05-20 20:44:22', '2023-05-20 20:44:22'),
(26, 24, 11, '2023-05-20 20:44:24', '2023-05-20 20:44:24'),
(27, 24, 12, '2023-05-20 20:44:26', '2023-05-20 20:44:26'),
(28, 15, 12, '2023-05-20 20:46:14', '2023-05-20 20:46:14'),
(29, 11, 13, '2023-05-20 20:57:18', '2023-05-20 20:57:18'),
(30, 11, 14, '2023-05-20 20:57:19', '2023-05-20 20:57:19'),
(31, 11, 15, '2023-05-20 20:57:21', '2023-05-20 20:57:21'),
(32, 11, 11, '2023-05-20 20:57:23', '2023-05-20 20:57:23'),
(33, 11, 1, '2023-05-20 20:57:27', '2023-05-20 20:57:27'),
(34, 11, 2, '2023-05-20 20:57:28', '2023-05-20 20:57:28'),
(35, 11, 4, '2023-05-20 20:57:30', '2023-05-20 20:57:30'),
(36, 11, 1, '2023-05-20 20:58:14', '2023-05-20 20:58:14'),
(37, 14, 4, '2023-05-20 21:23:13', '2023-05-20 21:23:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2023_05_01_135948_create_vidcomments_table', 1),
(243, '2014_10_12_000000_create_users_table', 2),
(244, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(245, '2019_08_19_000000_create_failed_jobs_table', 2),
(246, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(247, '2023_03_06_073452_create_permission_tables', 2),
(248, '2023_03_13_010303_create_site_styles_table', 2),
(249, '2023_03_13_215920_create_posts_table', 2),
(250, '2023_04_07_033811_create_likes_table', 2),
(251, '2023_04_11_174535_create_followers_table', 2),
(252, '2023_04_15_041332_create_videos_table', 2),
(253, '2023_05_02_230444_create_questions_table', 2),
(254, '2023_05_03_012940_create_like_videos_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(4, 'App\\Models\\User', 26),
(4, 'App\\Models\\User', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'criar_postagens', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05'),
(2, 'interagir_postagens', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05'),
(3, 'interagir_videos', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05'),
(4, 'enviar_videos', 'web', '2023-05-20 17:07:06', '2023-05-20 17:07:06'),
(5, 'mudar_cargo', 'web', '2023-05-20 17:07:06', '2023-05-20 17:07:06'),
(6, 'excluir_usuario', 'web', '2023-05-20 17:07:06', '2023-05-20 17:07:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post` varchar(1000) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nunca é demais lembrar o peso e o significado destes problemas, uma vez que o entendimento das metas propostas talvez venha a ressaltar a relatividade do remanejamento dos quadros funcionais.', NULL, '2023-05-20 19:00:41', '2023-05-20 19:00:41'),
(2, 15, 'A certificação de metodologias que nos auxiliam a lidar com a estrutura atual da organização estimula a padronização dos conhecimentos estratégicos para atingir a excelência.', NULL, '2023-05-20 19:02:13', '2023-05-20 19:02:13'),
(3, 15, 'A nível organizacional, a execução dos pontos do programa ainda não demonstrou convincentemente que vai participar na mudança das regras de conduta normativas.', 1, '2023-05-20 19:32:20', '2023-05-20 19:32:20'),
(4, 12, 'Do mesmo modo, a mobilidade dos capitais internacionais apresenta tendências no sentido de aprovar a manutenção do remanejamento dos quadros funcionais.', NULL, '2023-05-20 19:35:57', '2023-05-20 19:35:57'),
(5, 12, 'inda assim, existem dúvidas a respeito de como a contínua expansão de nossa atividade obstaculiza a apreciação da importância do orçamento setorial.', 2, '2023-05-20 19:36:15', '2023-05-20 19:36:15'),
(6, 18, 'Caros amigos, o acompanhamento das preferências de consumo causa impacto indireto na reavaliação dos modos de operação convencionais.', NULL, '2023-05-20 19:36:52', '2023-05-20 19:36:52'),
(7, 21, 'Caros amigos, a consulta aos diversos militantes talvez venha a ressaltar a relatividade do sistema de participação geral.', NULL, '2023-05-20 19:39:10', '2023-05-20 19:39:10'),
(8, 4, 'No entanto, não podemos esquecer que a competitividade nas transações comerciais promove a alavancagem do impacto na agilidade decisória.', NULL, '2023-05-20 19:40:48', '2023-05-20 19:40:48'),
(9, 30, 'Nunca é demais lembrar o peso e o significado destes problemas, uma vez que a revolução dos costumes causa impacto indireto na reavaliação das formas de ação.', NULL, '2023-05-20 19:42:28', '2023-05-20 19:42:28'),
(10, 30, 'Assim mesmo, o novo modelo estrutural aqui preconizado pode nos levar a considerar a reestruturação das novas proposições.', NULL, '2023-05-20 19:42:35', '2023-05-20 19:42:35'),
(11, 30, 'É importante questionar o quanto a determinação clara de objetivos maximiza as possibilidades por conta dos relacionamentos verticais entre as hierarquias.', 1, '2023-05-20 19:42:50', '2023-05-20 19:42:50'),
(12, 23, 'O cuidado em identificar pontos críticos na competitividade nas transações comerciais agrega valor ao estabelecimento do fluxo de informações.', NULL, '2023-05-20 19:45:10', '2023-05-20 19:45:10'),
(13, 23, 'No mundo atual, a revolução dos costumes ainda não demonstrou convincentemente que vai participar na mudança das posturas dos órgãos dirigentes com relação às suas atribuições.', 10, '2023-05-20 19:45:20', '2023-05-20 19:45:20'),
(14, 14, 'Ainda assim, existem dúvidas a respeito de como o acompanhamento das preferências de consumo exige a precisão e a definição do retorno esperado a longo prazo.', NULL, '2023-05-20 19:50:09', '2023-05-20 19:50:09'),
(15, 14, 'A nível organizacional, a estrutura atual da organização aponta para a melhoria de todos os recursos funcionais envolvidos.', 9, '2023-05-20 19:50:21', '2023-05-20 19:50:21'),
(16, 14, 'Podemos já vislumbrar o modo pelo qual a consulta aos diversos militantes oferece uma interessante oportunidade para verificação das diversas correntes de pensamento.', 2, '2023-05-20 19:50:40', '2023-05-20 19:50:40'),
(17, 17, 'Ainda assim, existem dúvidas a respeito de como o desenvolvimento contínuo de distintas formas de atuação apresenta tendências no sentido de aprovar a manutenção dos métodos utilizados na avaliação de resultados.', NULL, '2023-05-20 19:52:06', '2023-05-20 19:52:06'),
(18, 17, 'É claro que a contínua expansão de nossa atividade assume importantes posições no estabelecimento do retorno esperado a longo prazo.', 8, '2023-05-20 19:52:19', '2023-05-20 19:52:19'),
(19, 17, 'O cuidado em identificar pontos críticos na consolidação das estruturas talvez venha a ressaltar a relatividade do orçamento setorial.', 4, '2023-05-20 19:52:37', '2023-05-20 19:52:37'),
(20, 20, 'Por outro lado, a consulta aos diversos militantes obstaculiza a apreciação da importância dos paradigmas corporativos.', NULL, '2023-05-20 20:26:29', '2023-05-20 20:26:29'),
(21, 20, 'Desta maneira, a consulta aos diversos militantes não pode mais se dissociar dos índices pretendidos.', 12, '2023-05-20 20:27:46', '2023-05-20 20:27:46'),
(22, 20, 'O empenho em analisar a revolução dos costumes desafia a capacidade de equalização das novas proposições.', 12, '2023-05-20 20:27:53', '2023-05-20 20:27:53'),
(23, 25, 'O cuidado em identificar pontos críticos no desenvolvimento contínuo de distintas formas de atuação possibilita uma melhor visão global dos índices pretendidos.', NULL, '2023-05-20 20:30:42', '2023-05-20 20:30:42'),
(24, 25, 'O empenho em analisar o julgamento imparcial das eventualidades apresenta tendências no sentido de aprovar a manutenção do retorno esperado a longo prazo.', 20, '2023-05-20 20:31:21', '2023-05-20 20:31:21'),
(25, 25, 'O incentivo ao avanço tecnológico, assim como o aumento do diálogo entre os diferentes setores produtivos obstaculiza a apreciação da importância dos índices pretendidos.', 20, '2023-05-20 20:31:30', '2023-05-20 20:31:30'),
(26, 5, 'Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se o entendimento das metas propostas agrega valor ao estabelecimento dos relacionamentos verticais entre as hierarquias.', NULL, '2023-05-20 20:33:05', '2023-05-20 20:33:05'),
(27, 5, 'As experiências acumuladas demonstram que o comprometimento entre as equipes promove a alavancagem dos modos de operação convencionais.', 10, '2023-05-20 20:33:17', '2023-05-20 20:33:17'),
(28, 19, 'Do mesmo modo, o fenômeno da Internet oferece uma interessante oportunidade para verificação dos níveis de motivação departamental.', NULL, '2023-05-20 20:34:12', '2023-05-20 20:34:12'),
(29, 19, 'É importante questionar o quanto a crescente influência da mídia estende o alcance e a importância dos índices pretendidos.', 26, '2023-05-20 20:34:22', '2023-05-20 20:34:22'),
(30, 16, 'Neste sentido, o fenômeno da Internet agrega valor ao estabelecimento de alternativas às soluções ortodoxas.', NULL, '2023-05-20 20:37:25', '2023-05-20 20:37:25'),
(31, 22, 'Não obstante, a consolidação das estruturas afeta positivamente a correta previsão do investimento em reciclagem técnica.', 26, '2023-05-20 20:40:44', '2023-05-20 20:40:44'),
(32, 22, 'O que temos que ter sempre em mente é que o acompanhamento das preferências de consumo possibilita uma melhor visão global dos conhecimentos estratégicos para atingir a excelência.', 30, '2023-05-20 20:41:04', '2023-05-20 20:41:04'),
(33, 22, 'O incentivo ao avanço tecnológico, assim como o acompanhamento das preferências de consumo estimula a padronização das direções preferenciais no sentido do progresso.', 30, '2023-05-20 20:41:12', '2023-05-20 20:41:12'),
(34, 22, 'O cuidado em identificar pontos críticos na consulta aos diversos militantes ainda não demonstrou convincentemente que vai participar na mudança de todos os recursos funcionais envolvidos.', 30, '2023-05-20 20:41:26', '2023-05-20 20:41:26'),
(35, 24, 'Ainda assim, existem dúvidas a respeito de como a determinação clara de objetivos obstaculiza a apreciação da importância do retorno esperado a longo prazo.', 30, '2023-05-20 20:43:29', '2023-05-20 20:43:29'),
(36, 24, 'Evidentemente, a complexidade dos estudos efetuados facilita a criação dos conhecimentos estratégicos para atingir a excelência.', 30, '2023-05-20 20:43:35', '2023-05-20 20:43:35'),
(37, 24, 'Não obstante, a valorização de fatores subjetivos nos obriga à análise dos métodos utilizados na avaliação de resultados.', NULL, '2023-05-20 20:44:05', '2023-05-20 20:44:05'),
(38, 19, 'Por conseguinte, o julgamento imparcial das eventualidades desafia a capacidade de equalização dos índices pretendidos.', NULL, '2023-05-20 20:52:12', '2023-05-20 20:52:12'),
(39, 19, 'A nível organizacional, a constante divulgação das informações agrega valor ao estabelecimento do investimento em reciclagem técnica.', 30, '2023-05-20 20:52:23', '2023-05-20 20:52:23'),
(40, 19, 'Pensando mais a longo prazo, a valorização de fatores subjetivos estende o alcance e a importância dos conhecimentos estratégicos para atingir a excelência.', 30, '2023-05-20 20:52:31', '2023-05-20 20:52:31'),
(41, 19, 'A certificação de metodologias que nos auxiliam a lidar com o fenômeno da Internet ainda não demonstrou convincentemente que vai participar na mudança das formas de ação.', 30, '2023-05-20 20:52:39', '2023-05-20 20:52:39'),
(42, 6, 'Por conseguinte, a crescente influência da mídia obstaculiza a apreciação da importância de todos os recursos funcionais envolvidos.', NULL, '2023-05-20 21:04:07', '2023-05-20 21:04:07'),
(43, 6, 'A nível organizacional, a constante divulgação das informações garante a contribuição de um grupo importante na determinação das posturas dos órgãos dirigentes com relação às suas atribuições.', 30, '2023-05-20 21:04:19', '2023-05-20 21:04:19'),
(44, 6, 'Todavia, a execução dos pontos do programa exige a precisão e a definição das diversas correntes de pensamento.', 30, '2023-05-20 21:04:28', '2023-05-20 21:04:28'),
(45, 6, 'O empenho em analisar a constante divulgação das informações maximiza as possibilidades por conta do levantamento das variáveis envolvidas.', 30, '2023-05-20 21:04:35', '2023-05-20 21:04:35'),
(46, 3, 'No mundo atual, a constante divulgação das informações agrega valor ao estabelecimento do impacto na agilidade decisória.', NULL, '2023-05-20 21:07:33', '2023-05-20 21:07:33'),
(47, 3, 'É claro que a adoção de políticas descentralizadoras apresenta tendências no sentido de aprovar a manutenção do levantamento das variáveis envolvidas.', 20, '2023-05-20 21:07:46', '2023-05-20 21:07:46'),
(48, 3, 'Do mesmo modo, o comprometimento entre as equipes assume importantes posições no estabelecimento do orçamento setorial.', 28, '2023-05-20 21:08:06', '2023-05-20 21:08:06'),
(49, 1, 'O que temos que ter sempre em mente é que o acompanhamento das preferências de consumo agrega valor ao estabelecimento dos conhecimentos estratégicos para atingir a excelência.', NULL, '2023-05-20 21:09:20', '2023-05-20 21:09:20'),
(50, 28, 'Por outro lado, o acompanhamento das preferências de consumo pode nos levar a considerar a reestruturação da gestão inovadora da qual fazemos parte.', NULL, '2023-05-20 21:14:14', '2023-05-20 21:14:14'),
(51, 26, 'Desta maneira, a contínua expansão de nossa atividade não pode mais se dissociar das posturas dos órgãos dirigentes com relação às suas atribuições.', NULL, '2023-05-20 21:16:40', '2023-05-20 21:16:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `post` varchar(1000) NOT NULL,
  `answer` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `video_id`, `post`, `answer`, `created_at`, `updated_at`) VALUES
(1, 21, 8, 'Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se a mobilidade dos capitais internacionais auxilia a preparação e a composição dos conhecimentos estratégicos para atingir a excelência.', NULL, '2023-05-20 19:39:50', '2023-05-20 19:39:50'),
(2, 21, 6, 'Podemos já vislumbrar o modo pelo qual o entendimento das metas propostas agrega valor ao estabelecimento das condições financeiras e administrativas exigidas.', NULL, '2023-05-20 19:40:07', '2023-05-20 19:40:07'),
(3, 4, 10, 'Nunca é demais lembrar o peso e o significado destes problemas, uma vez que a consulta aos diversos militantes promove a alavancagem do orçamento setorial.', NULL, '2023-05-20 19:41:29', '2023-05-20 19:41:29'),
(4, 30, 8, 'No entanto, não podemos esquecer que a expansão dos mercados mundiais talvez venha a ressaltar a relatividade do sistema de formação de quadros que corresponde às necessidades.', NULL, '2023-05-20 19:43:11', '2023-05-20 19:43:11'),
(5, 23, 7, 'A nível organizacional, a expansão dos mercados mundiais possibilita uma melhor visão global das condições financeiras e administrativas exigidas.', NULL, '2023-05-20 19:47:17', '2023-05-20 19:47:17'),
(6, 5, 1, 'As experiências acumuladas demonstram que o acompanhamento das preferências de consumo não pode mais se dissociar do fluxo de informações.', NULL, '2023-05-20 20:32:16', '2023-05-20 20:32:16'),
(7, 24, 8, 'A prática cotidiana prova que a necessidade de renovação processual acarreta um processo de reformulação e modernização dos níveis de motivação departamental.', NULL, '2023-05-20 20:44:41', '2023-05-20 20:44:41'),
(8, 24, 8, 'A prática cotidiana prova que a crescente influência da mídia talvez venha a ressaltar a relatividade da gestão inovadora da qual fazemos parte.', NULL, '2023-05-20 20:44:49', '2023-05-20 20:44:49'),
(9, 24, 6, 'Ainda assim, existem dúvidas a respeito de como a expansão dos mercados mundiais possibilita uma melhor visão global dos relacionamentos verticais entre as hierarquias.', NULL, '2023-05-20 20:45:12', '2023-05-20 20:45:12'),
(10, 11, 8, 'O cuidado em identificar pontos críticos no julgamento imparcial das eventualidades cumpre um papel essencial na formulação do orçamento setorial.', NULL, '2023-05-20 20:57:44', '2023-05-20 20:57:44'),
(11, 11, 6, 'As experiências acumuladas demonstram que a consulta aos diversos militantes oferece uma interessante oportunidade para verificação do orçamento setorial.', NULL, '2023-05-20 20:59:15', '2023-05-20 20:59:15'),
(12, 6, 8, 'A prática cotidiana prova que o consenso sobre a necessidade de qualificação acarreta um processo de reformulação e modernização de alternativas às soluções ortodoxas.', NULL, '2023-05-20 21:03:54', '2023-05-20 21:03:54'),
(13, 6, 11, 'Todavia, o consenso sobre a necessidade de qualificação nos obriga à análise dos métodos utilizados na avaliação de resultados.', NULL, '2023-05-20 21:13:09', '2023-05-20 21:13:09'),
(14, 6, 11, 'Neste sentido, a mobilidade dos capitais internacionais aponta para a melhoria do fluxo de informações.', NULL, '2023-05-20 21:13:17', '2023-05-20 21:13:17'),
(15, 28, 15, 'O empenho em analisar a contínua expansão de nossa atividade garante a contribuição de um grupo importante na determinação dos conhecimentos estratégicos para atingir a excelência.', NULL, '2023-05-20 21:14:31', '2023-05-20 21:14:31'),
(16, 28, 15, 'Caros amigos, a constante divulgação das informações estimula a padronização das regras de conduta normativas.', NULL, '2023-05-20 21:14:38', '2023-05-20 21:14:38'),
(17, 28, 5, 'Por outro lado, a crescente influência da mídia aponta para a melhoria dos índices pretendidos.', NULL, '2023-05-20 21:14:59', '2023-05-20 21:14:59'),
(18, 28, 5, 'Por conseguinte, o aumento do diálogo entre os diferentes setores produtivos obstaculiza a apreciação da importância do sistema de participação geral.', NULL, '2023-05-20 21:15:13', '2023-05-20 21:15:13'),
(19, 28, 13, 'A nível organizacional, o comprometimento entre as equipes desafia a capacidade de equalização dos conhecimentos estratégicos para atingir a excelência.', NULL, '2023-05-20 21:15:32', '2023-05-20 21:15:32'),
(20, 26, 12, 'O incentivo ao avanço tecnológico, assim como o desenvolvimento contínuo de distintas formas de atuação cumpre um papel essencial na formulação do investimento em reciclagem técnica.', NULL, '2023-05-20 21:16:59', '2023-05-20 21:16:59'),
(21, 26, 14, 'O que temos que ter sempre em mente é que a complexidade dos estudos efetuados é uma das consequências do investimento em reciclagem técnica.', NULL, '2023-05-20 21:17:17', '2023-05-20 21:17:17'),
(22, 17, 15, 'Por outro lado, a valorização de fatores subjetivos estimula a padronização da gestão inovadora da qual fazemos parte.', 16, '2023-05-20 21:18:04', '2023-05-20 21:18:04'),
(23, 17, 15, 'Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se o surgimento do comércio virtual agrega valor ao estabelecimento das posturas dos órgãos dirigentes com relação às suas atribuições.', 15, '2023-05-20 21:18:13', '2023-05-20 21:18:13'),
(24, 17, 5, 'Nunca é demais lembrar o peso e o significado destes problemas, uma vez que a contínua expansão de nossa atividade oferece uma interessante oportunidade para verificação dos níveis de motivação departamental.', 17, '2023-05-20 21:18:45', '2023-05-20 21:18:45'),
(25, 15, 13, 'No mundo atual, o consenso sobre a necessidade de qualificação pode nos levar a considerar a reestruturação dos índices pretendidos.', 19, '2023-05-20 21:19:38', '2023-05-20 21:19:38'),
(26, 15, 1, 'A certificação de metodologias que nos auxiliam a lidar com o acompanhamento das preferências de consumo acarreta um processo de reformulação e modernização do remanejamento dos quadros funcionais.', 6, '2023-05-20 21:20:00', '2023-05-20 21:20:00'),
(27, 20, 6, 'É importante questionar o quanto a adoção de políticas descentralizadoras apresenta tendências no sentido de aprovar a manutenção do remanejamento dos quadros funcionais.', 9, '2023-05-20 21:22:00', '2023-05-20 21:22:00'),
(28, 20, 6, 'Por conseguinte, a estrutura atual da organização talvez venha a ressaltar a relatividade do sistema de formação de quadros que corresponde às necessidades.', 2, '2023-05-20 21:22:11', '2023-05-20 21:22:11'),
(29, 20, 6, 'É claro que o desenvolvimento contínuo de distintas formas de atuação deve passar por modificações independentemente dos paradigmas corporativos.', 11, '2023-05-20 21:22:24', '2023-05-20 21:22:24'),
(30, 14, 11, 'Ainda assim, existem dúvidas a respeito de como o novo modelo estrutural aqui preconizado faz parte de um processo de gerenciamento dos modos de operação convencionais.', 13, '2023-05-20 21:23:31', '2023-05-20 21:23:31'),
(31, 14, 11, 'Por conseguinte, o acompanhamento das preferências de consumo ainda não demonstrou convincentemente que vai participar na mudança das direções preferenciais no sentido do progresso.', 14, '2023-05-20 21:23:40', '2023-05-20 21:23:40'),
(32, 21, 8, 'A prática cotidiana prova que o início da atividade geral de formação de atitudes garante a contribuição de um grupo importante na determinação dos paradigmas corporativos.', NULL, '2023-05-21 01:27:52', '2023-05-21 01:27:52'),
(33, 21, 8, 'A certificação de metodologias que nos auxiliam a lidar com a revolução dos costumes nos obriga à análise dos modos de operação convencionais.', NULL, '2023-05-21 01:28:01', '2023-05-21 01:28:01'),
(34, 4, 8, 'Ainda assim, existem dúvidas a respeito de como a consolidação das estruturas exige a precisão e a definição das regras de conduta normativas.', NULL, '2023-05-21 01:31:01', '2023-05-21 01:31:01'),
(35, 4, 8, 'Ainda assim, existem dúvidas a respeito de como a complexidade dos estudos efetuados garante a contribuição de um grupo importante na determinação do orçamento setorial.', NULL, '2023-05-21 01:31:10', '2023-05-21 01:31:10'),
(36, 4, 8, 'Ainda assim, existem dúvidas a respeito de como a necessidade de renovação processual obstaculiza a apreciação da importância das direções preferenciais no sentido do progresso.', NULL, '2023-05-21 01:31:18', '2023-05-21 01:31:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05'),
(2, 'prof', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05'),
(3, 'aluno', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05'),
(4, 'bloqueado', 'web', '2023-05-21 01:39:54', '2023-05-21 01:39:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_styles`
--

CREATE TABLE `site_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font_size` int(11) NOT NULL DEFAULT 14,
  `main_color` enum('agua','bosque','trovao','fogo','neve') NOT NULL DEFAULT 'agua',
  `theme` enum('diurno','vespertino','noturno') NOT NULL DEFAULT 'diurno',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_styles`
--

INSERT INTO `site_styles` (`id`, `font_size`, `main_color`, `theme`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 14, 'agua', 'diurno', 1, '2023-05-20 17:08:30', '2023-05-20 21:11:55'),
(2, 14, 'agua', 'diurno', 2, '2023-05-20 17:18:54', '2023-05-20 17:18:54'),
(3, 18, 'fogo', 'vespertino', 3, '2023-05-20 17:22:01', '2023-05-20 21:07:09'),
(4, 14, 'agua', 'diurno', 4, '2023-05-20 17:23:36', '2023-05-20 17:23:36'),
(5, 14, 'neve', 'diurno', 5, '2023-05-20 17:25:31', '2023-05-20 20:32:36'),
(6, 14, 'bosque', 'noturno', 6, '2023-05-20 17:27:15', '2023-05-20 21:03:13'),
(7, 14, 'agua', 'diurno', 7, '2023-05-20 17:29:37', '2023-05-20 17:29:37'),
(8, 14, 'agua', 'diurno', 8, '2023-05-20 17:31:05', '2023-05-20 17:31:05'),
(9, 14, 'agua', 'diurno', 9, '2023-05-20 17:33:41', '2023-05-20 17:33:41'),
(10, 14, 'agua', 'diurno', 10, '2023-05-20 17:37:13', '2023-05-20 17:37:13'),
(11, 14, 'fogo', 'vespertino', 11, '2023-05-20 17:43:00', '2023-05-20 21:02:25'),
(12, 20, 'neve', 'vespertino', 12, '2023-05-20 17:49:57', '2023-05-20 19:21:36'),
(13, 14, 'agua', 'diurno', 13, '2023-05-20 17:57:09', '2023-05-20 17:57:09'),
(14, 12, 'bosque', 'noturno', 14, '2023-05-20 18:01:25', '2023-05-20 19:20:53'),
(15, 16, 'fogo', 'vespertino', 15, '2023-05-20 18:04:21', '2023-05-20 19:02:33'),
(16, 14, 'trovao', 'vespertino', 16, '2023-05-20 18:06:20', '2023-05-20 20:39:20'),
(17, 16, 'trovao', 'noturno', 17, '2023-05-20 18:12:09', '2023-05-20 19:22:26'),
(18, 12, 'agua', 'noturno', 18, '2023-05-20 18:13:31', '2023-05-20 19:29:39'),
(19, 14, 'bosque', 'noturno', 19, '2023-05-20 18:15:24', '2023-05-20 19:28:53'),
(20, 14, 'neve', 'diurno', 20, '2023-05-20 18:17:29', '2023-05-20 19:26:50'),
(21, 14, 'agua', 'diurno', 21, '2023-05-20 18:18:55', '2023-05-20 18:18:55'),
(22, 16, 'trovao', 'noturno', 22, '2023-05-20 18:20:47', '2023-05-20 20:40:19'),
(23, 14, 'agua', 'diurno', 23, '2023-05-20 18:22:04', '2023-05-20 18:22:04'),
(24, 14, 'agua', 'diurno', 24, '2023-05-20 18:23:21', '2023-05-20 18:23:21'),
(25, 12, 'bosque', 'noturno', 25, '2023-05-20 18:24:11', '2023-05-20 20:30:12'),
(26, 14, 'fogo', 'vespertino', 26, '2023-05-20 18:26:22', '2023-05-21 02:21:14'),
(27, 14, 'agua', 'diurno', 27, '2023-05-20 18:28:41', '2023-05-20 18:28:41'),
(28, 14, 'neve', 'vespertino', 28, '2023-05-20 18:29:58', '2023-05-20 21:14:04'),
(29, 14, 'agua', 'diurno', 29, '2023-05-20 18:33:20', '2023-05-20 18:33:20'),
(30, 14, 'agua', 'diurno', 30, '2023-05-20 18:34:24', '2023-05-20 18:34:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `lastname` varchar(191) DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(191) NOT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `avatar` longtext NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified`, `password`, `google_id`, `avatar`, `gender`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cristiano', 'Oliveira', 'cristiano', 'cristiano@gmail.com', 0, '$2y$10$ZrTJ76.pcZylmi6Whtkz/up7lKWowuvpFQ//BwDheXyJUBIiIGbti', NULL, 'storage/images/usuarios/cristiano.png', 'M', '1985-05-15', NULL, '2023-05-20 17:08:30', '2023-05-20 17:15:49'),
(2, 'Aline', 'Nunes', 'aline', 'aline@gmail.com', 0, '$2y$10$CjC.DGB7p4mnLwfExgIOfOzwUgV1AQPUbdoMfd6n7SX4kjDw8RxWW', NULL, 'storage/images/usuarios/aline.png', 'F', '1999-01-05', NULL, '2023-05-20 17:18:53', '2023-05-20 17:19:29'),
(3, 'Alexandre', 'Abreu', 'alexandre', 'alexandre@gmail.com', 0, '$2y$10$C14JoG8Bxvb8mCpMQc7lVuT790EjRoR74oxXWRNZJOA8QHBgAee7y', NULL, 'storage/images/usuarios/alexandre.png', 'M', '1977-10-10', NULL, '2023-05-20 17:22:01', '2023-05-20 17:22:22'),
(4, 'Ana', 'Maria', 'ana', 'ana@gmail.com', 0, '$2y$10$6E8RCJX791oRI9i0mWm40.c6OsKkT/wli/q4C41fbtN5KDCx9Diay', NULL, 'storage/images/usuarios/ana.png', 'F', '2010-03-03', NULL, '2023-05-20 17:23:36', '2023-05-20 17:24:05'),
(5, 'Pedro', 'Santanna', 'pedro', 'pedro@gmail.com', 0, '$2y$10$N2fJGLt1BuF/OHG042twe.5VV09ZD1ItZLLHc97.IqwZJGIJONt6W', NULL, 'storage/images/usuarios/pedro.png', 'M', '2011-08-29', NULL, '2023-05-20 17:25:31', '2023-05-20 17:25:48'),
(6, 'Beatriz', 'Silva', 'bia', 'bia@gmail.com', 0, '$2y$10$i8Nnw5q0I3Fvv.CUqeJ.FeKSOJ5wLCfLopIE23ddpHnIn.xwTvQ3e', NULL, 'storage/images/usuarios/bia.png', 'F', '1985-10-05', NULL, '2023-05-20 17:27:15', '2023-05-20 17:27:32'),
(7, 'Helen', 'Martins', 'helen', 'helen@gmail.com', 0, '$2y$10$YnRW5lbkVTu1rnbAcZr23ue97n8E8/nkgjoweTBN5vbGpg4aC5NVS', NULL, 'storage/images/usuarios/helen.png', 'F', '1988-12-11', NULL, '2023-05-20 17:29:36', '2023-05-20 17:29:51'),
(8, 'Danilo', 'Fonseca', 'danilo', 'danilo@gmail.com', 0, '$2y$10$8pWoNITo1FtS2Bx.i4tz2.FmQLhtpAgKG7Im8JOh0jWQDSs0XxYOu', NULL, 'storage/images/usuarios/danilo.png', 'M', '2000-10-25', NULL, '2023-05-20 17:31:05', '2023-05-20 17:31:41'),
(9, 'Marina', 'Soares', 'marina', 'marina@gmail.com', 0, '$2y$10$6ZzVOwjk0/vYRTuQHSVuW.07M5zpSuYdP82p0nxm8g4l.lBxa03Gy', NULL, 'storage/images/usuarios/marina.png', 'F', '1979-02-02', NULL, '2023-05-20 17:33:39', '2023-05-20 17:34:36'),
(10, 'João', 'Matheus', 'joao', 'joao@gmail.com', 0, '$2y$10$v7KqjGkiSVUH3Ct5QE1R/urFKbNwIz3dXUtUT6C8aFmXQrKFnokIa', NULL, 'storage/images/usuarios/joao.png', 'M', '2011-10-10', NULL, '2023-05-20 17:37:13', '2023-05-20 17:37:30'),
(11, 'Malika', 'Shahid', 'malika', 'malika@gmail.com', 0, '$2y$10$2R0xakz9zyhDGKkLMmR7MOXKHS5JLR3brdcfUejuJ3RxqqWw0ufi2', NULL, 'storage/images/usuarios/malika.png', 'F', '1997-07-05', NULL, '2023-05-20 17:43:00', '2023-05-20 17:44:08'),
(12, 'Antônio', 'Lima', 'antonio', 'antonio@gmail.com', 0, '$2y$10$ftS2dWxFoabN1PKKnIq6r.Nshpfh8lEhR9XKZs32jin26ytpTM3S6', NULL, 'storage/images/usuarios/antonio.png', 'M', '1957-09-03', NULL, '2023-05-20 17:49:57', '2023-05-20 17:50:27'),
(13, 'Fátima', 'Peixoto', 'fatima', 'fatima@gmail.com', 0, '$2y$10$KY.bKcu4AoUSs9x1la8MROWxRcEDAH0b3FC86n6LD7gUGc7988C7e', NULL, 'storage/images/usuarios/fatima.png', 'F', '1960-04-30', NULL, '2023-05-20 17:57:09', '2023-05-20 17:59:46'),
(14, 'Jerfeson', 'Santos', 'jerfeson', 'jerfeson@gmail.com', 0, '$2y$10$b4oA9GpcZu7c/AlEdVaoS.ypZSlQtW4VTN6eCpWpIH6JU/n72B9UK', NULL, 'storage/images/usuarios/jerfeson.png', 'M', '1995-07-14', NULL, '2023-05-20 18:01:24', '2023-05-20 18:01:52'),
(15, 'Selma', 'Souza', 'selma', 'selma@gmail.com', 0, '$2y$10$9K0yETU8DeQckmtOtpo8qOXjnS66GB2ISPwmTEAPqtWWVQjqYDTie', NULL, 'storage/images/usuarios/selma.png', 'F', '1970-08-02', NULL, '2023-05-20 18:04:21', '2023-05-20 18:04:32'),
(16, 'Ruth', 'Gomes', 'ruth', 'ruth@gmail.com', 0, '$2y$10$VQGipryARn0umdmXqpuWTODfHopbc8RI8HzqJiwhdyZ9UmI36go6q', NULL, 'storage/images/usuarios/ruth.png', 'F', '1965-06-16', NULL, '2023-05-20 18:06:20', '2023-05-20 18:06:35'),
(17, 'Kim', 'Yagami', 'kim', 'kim@gmail.com', 0, '$2y$10$U03mmTGFo9xiG32a7DhUe.KtnJxBDh5WWJGzWCjWUGQoDgXpysABa', NULL, 'storage/images/usuarios/kim.png', 'M', '1995-07-02', NULL, '2023-05-20 18:12:09', '2023-05-20 18:12:32'),
(18, 'Vanessa', 'Dutra', 'vanessa', 'vanessa@gmail.com', 0, '$2y$10$JeavjarjOtBg3ezTw.tquuizy.s0V666FUjPrnPNc.AES0T4ynnlm', NULL, 'storage/images/usuarios/vanessa.png', 'F', '1993-11-02', NULL, '2023-05-20 18:13:31', '2023-05-20 18:13:44'),
(19, 'Silvio', 'Trindade', 'silvio', 'silvio@gmail.com', 0, '$2y$10$ifLrZMOWfJq4HxX18oMXgeSUnFGta3iIlwMrinYUUBQd4KPUQZ4XK', NULL, 'storage/images/usuarios/silvio.png', 'M', '1987-09-13', NULL, '2023-05-20 18:15:24', '2023-05-20 18:15:38'),
(20, 'Marta', 'Xavier', 'marta', 'marta@gmail.com', 0, '$2y$10$bIi38va2zWa5kN2sFLKhHOFi5Tgo/ED7wLGH.Cafk/k.KWU8A6TxW', NULL, 'storage/images/usuarios/marta.png', 'F', '1990-05-25', NULL, '2023-05-20 18:17:29', '2023-05-20 18:17:40'),
(21, 'Fred', 'Porto', 'fred', 'fred@gmail.com', 0, '$2y$10$fdIcWGQT.64zZplIvXqJi.h1zZvY3AUSs.mzcyM526vNRoZy/.8..', NULL, 'storage/images/usuarios/fred.png', 'M', '1999-02-01', NULL, '2023-05-20 18:18:55', '2023-05-20 18:19:16'),
(22, 'Said', 'Muhammad', 'said', 'said@gmail.com', 0, '$2y$10$o4XTwHmKarNMhi3g.phnRew0UstXhL6Zw4r73hdkiVY/lrggjwNlC', NULL, 'storage/images/usuarios/said.png', 'M', '1999-06-03', NULL, '2023-05-20 18:20:47', '2023-05-20 18:21:01'),
(23, 'Cláudia', 'Silva', 'claudia', 'claudia@gmail.com', 0, '$2y$10$Co/B49k1VoJkjNgG7ZHk/OzhMY4LhQdwvLCHB7lwpnRfX9hWND8cu', NULL, 'storage/images/usuarios/claudia.png', 'F', '1982-12-03', NULL, '2023-05-20 18:22:04', '2023-05-20 18:22:16'),
(24, 'Regina', 'Sousa', 'regina', 'regina@gmail.com', 0, '$2y$10$jgUBoq/BLq0Z/oeI50dQBemcIhEzBzmi05mrOfy8itDBypdJPTTXy', NULL, 'storage/images/usuarios/regina.png', 'F', '1980-12-11', NULL, '2023-05-20 18:23:21', '2023-05-20 18:23:35'),
(25, 'Adriana', 'Fagundes', 'adriana', 'adriana@gmail.com', 0, '$2y$10$qPprfkNep1ByvOS3TqSGqumklY270eODCE0YK8hY8rU5ggRkWOhCm', NULL, 'storage/images/usuarios/adriana.png', 'F', '1997-05-05', NULL, '2023-05-20 18:24:11', '2023-05-20 18:24:27'),
(26, 'Júnior', 'Pereira', 'junior', 'junior@gmail.com', 0, '$2y$10$OtiAp8KQfp3WnJ1SPTkO5Oezj5zgDbQBGLNN5Yh2hefH0bJW46kgu', NULL, 'storage/images/usuarios/junior.png', 'M', '1991-07-05', NULL, '2023-05-20 18:26:22', '2023-05-20 18:26:47'),
(27, 'André', 'Pinto', 'andre', 'andre@gmail.com', 0, '$2y$10$qWa3Vlkt/xUv3fugpRH0aeQEuJM6/9Fu4xio8zX.euHd8Qw4scWOm', NULL, 'storage/images/usuarios/andre.png', 'M', '2008-03-27', NULL, '2023-05-20 18:28:41', '2023-05-20 18:28:59'),
(28, 'Deise', 'Morais', 'deise', 'deise@gmail.com', 0, '$2y$10$ATR.CIybNRgPXW5AEIr2YuvM0.Y/ktgKOP4ZN/NSwtRzE8nuKlrPq', NULL, 'storage/images/usuarios/deise.png', 'F', '2000-07-23', NULL, '2023-05-20 18:29:58', '2023-05-20 18:30:12'),
(29, 'Ana', 'Martins', 'anamartins', 'anamartins@gmail.com', 0, '$2y$10$KltZ2cOerBYRZpcdd2e97ONfUkBx9Cki0vJzIMrsi.2OyIkH0D9ye', NULL, 'storage/images/usuarios/anamartins.png', 'F', '1990-04-22', NULL, '2023-05-20 18:33:20', '2023-05-20 18:33:39'),
(30, 'Ana', 'Bruna', 'anabru', 'anabru@gmail.com', 0, '$2y$10$50Kb050iy8GgTgk2OK/aROgEAXiLCBlsDO2H2PS4.5jKS3puDt7hi', NULL, 'storage/images/usuarios/anabru.png', 'F', '1993-08-19', NULL, '2023-05-20 18:34:24', '2023-05-20 18:34:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `discipline` enum('Português','Inglês','Espanhol','Matemática','Geometria','Física','Química','Biologia','História','Geografia','Música','Filosofia','Sociologia','Informática','Artes') NOT NULL,
  `class` enum('501','502','601','602','701','702','801','802','901','902','1001','1002','2001','2002','3001','3002') NOT NULL,
  `internal` tinyint(1) NOT NULL,
  `video` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `description`, `discipline`, `class`, `internal`, `video`, `created_at`, `updated_at`) VALUES
(1, 15, 'Verbos', 'O que é verbo? O verbo é o termo que expressa ação, estado, fenômeno, fato, entre outros acontecimentos no enunciado. Quando a oração tem sujeito, o verbo expressa a ação realizada ou sofrida por esse sujeito. Quando ela não o tem, o verbo não se refere a uma pessoa do discurso, sendo impessoal.', 'Português', '501', 1, 'storage/videos/selma/portugues_1684609511.mp4', '2023-05-20 19:05:11', '2023-05-20 19:05:11'),
(2, 12, 'False Cognates', 'False cognates, also known as false friends, are words in different languages that may look or sound similar but have different meanings. These words can lead to misunderstandings or confusion when learning or translating between languages.', 'Inglês', '502', 0, 'https://www.youtube.com/watch?v=R6W-HHWtRpA', '2023-05-20 19:12:18', '2023-05-20 19:18:22'),
(3, 13, 'Pronombres Personales', 'Los pronombres personales son palabras que se utilizan para referirse a las personas de manera más específica en un contexto determinado. En español, los pronombres personales incluyen tanto pronombres de sujeto como pronombres de objeto.', 'Espanhol', '601', 0, 'https://www.youtube.com/watch?v=oHEYZgd6jPE', '2023-05-20 19:17:06', '2023-05-20 19:17:06'),
(4, 14, 'Função do Segundo Grau', 'A função do segundo grau, também conhecida como função quadrática, é um tipo de função matemática que possui a forma geral f(x) = ax² + bx + c, onde a, b e c são constantes e \"x\" representa a variável independente.', 'Matemática', '602', 1, 'storage/videos/jerfeson/matematica_1684610441.mp4', '2023-05-20 19:20:41', '2023-05-20 19:20:41'),
(5, 17, 'Catetos e Hipotenusa', 'Os catetos e a hipotenusa são conceitos fundamentais em triângulos retângulos e têm aplicações práticas em campos como a arquitetura, a engenharia e a física, onde é necessário calcular distâncias, alturas e ângulos em diferentes contextos geométricos.', 'Geometria', '701', 0, 'https://www.youtube.com/watch?v=qljwwAEcoH8', '2023-05-20 19:24:41', '2023-05-20 19:24:41'),
(6, 20, 'Inércia', 'A inércia física é um princípio fundamental na física que descreve a tendência dos objetos de manter seu estado de repouso ou movimento uniforme em linha reta, a menos que uma força externa atue sobre eles.', 'Física', '702', 1, 'storage/videos/marta/fisica_1684610790.mp4', '2023-05-20 19:26:30', '2023-05-20 19:26:30'),
(7, 19, 'Tabela Periódica', 'A tabela periódica é uma representação organizada de todos os elementos químicos conhecidos. Ela é uma ferramenta essencial na química, pois fornece informações importantes sobre as propriedades e características dos elementos.', 'Química', '801', 0, 'https://www.youtube.com/watch?v=yv5168bi1X4', '2023-05-20 19:28:47', '2023-05-20 19:28:47'),
(8, 18, 'Cadeia Alimentar', 'Uma cadeia alimentar é uma sequência linear de organismos interligados, em que cada um serve de alimento para o próximo. Ela representa a transferência de energia e nutrientes de um nível trófico para outro na comunidade biológica. As cadeias alimentares começam com os produtores, como as plantas, que realizam a fotossíntese e produzem seu próprio alimento.', 'Biologia', '501', 0, 'https://www.youtube.com/watch?v=zZ66hOHQgDE', '2023-05-20 19:31:06', '2023-05-20 19:31:06'),
(9, 15, 'História', 'O estopim para o conflito deu-se com a invasão da Polônia realizada pelos alemães, em setembro de 1939. A Segunda Guerra Mundial ficou marcada pelos horrores do Holocausto e do lançamento das bombas atômicas.', 'História', '901', 1, 'storage/videos/selma/historia_1684611288.mp4', '2023-05-20 19:34:48', '2023-05-20 19:34:48'),
(10, 18, 'Placas Tectônicas', 'As placas tectônicas são grandes estruturas formadas pela crosta litosférica terrestre que movimentam-se mediante forças internas do planeta, especialmente oriundas do manto.', 'Geografia', '501', 1, 'storage/videos/vanessa/geografia_1684611474.mp4', '2023-05-20 19:37:54', '2023-05-20 19:37:54'),
(11, 14, 'Partituras', 'Partitura é um material gráfico que representa a escrita musical padronizada mundialmente. Possui seus próprios símbolos ( pauta, claves, notas, pontos, barras, etc ). É a forma de escrita musical mais completa que existe no mundo.', 'Música', '501', 0, 'https://www.youtube.com/watch?v=GNPfBdFBYwo', '2023-05-20 19:49:16', '2023-05-20 19:49:16'),
(12, 20, 'Autoconhecimento', 'Na filosofia, autoconhecimento se refere à consciência das próprias sensações, crenças, pensamentos e valores. Pelo menos desde Descartes, a maioria dos filósofos acredita que o conhecimento de nossos estados mentais difere muito do nosso conhecimento do mundo externo.', 'Filosofia', '3002', 0, 'https://www.youtube.com/watch?v=b_dJs9KFz4w', '2023-05-20 19:55:05', '2023-05-20 19:55:05'),
(13, 15, 'Desigualdade Social', 'A desigualdade social é a diferença existente entre as diferentes classes sociais, levando-se em conta fatores econômicos, educacionais e culturais. A desigualdade é um dos maiores problemas enfrentados pelos países pobres do mundo.', 'Sociologia', '1002', 0, 'https://www.youtube.com/watch?v=at5jSEd4Ezg', '2023-05-20 20:49:04', '2023-05-20 20:49:04'),
(14, 19, 'Web 3.0', 'A Web 3.0, anunciada como a terceira onda da Internet, projeta estruturar todo o conteúdo disponível na rede mundial de computadores dentro dos conceitos de Web Semântica. Esta nova Web também pode ser chamada de \"A Web Inteligente\".', 'Informática', '801', 1, 'storage/videos/silvio/informatica_1684615878.mp4', '2023-05-20 20:51:19', '2023-05-20 20:51:19'),
(15, 17, 'Surrealismo', 'O surrealismo é um movimento artístico surgido na Europa em 1919. As obras desse movimento têm caráter onírico. O artista surrealista mais famoso é Salvador Dalí. Salvador Dalí é o mais popular pintor surrealista.', 'Artes', '501', 0, 'https://www.youtube.com/watch?v=zAGmM9BMTH4', '2023-05-20 20:56:27', '2023-05-20 20:56:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_follower_id_foreign` (`follower_id`),
  ADD KEY `followers_user_id_foreign` (`user_id`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Índices para tabela `like_videos`
--
ALTER TABLE `like_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_videos_user_id_foreign` (`user_id`),
  ADD KEY `like_videos_video_id_foreign` (`video_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Índices para tabela `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Índices para tabela `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_user_id_foreign` (`user_id`),
  ADD KEY `questions_video_id_foreign` (`video_id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Índices para tabela `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Índices para tabela `site_styles`
--
ALTER TABLE `site_styles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_styles_user_id_unique` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- Índices para tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `like_videos`
--
ALTER TABLE `like_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `site_styles`
--
ALTER TABLE `site_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `like_videos`
--
ALTER TABLE `like_videos`
  ADD CONSTRAINT `like_videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_videos_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `site_styles`
--
ALTER TABLE `site_styles`
  ADD CONSTRAINT `site_styles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
