-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2023 às 20:35
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
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 28),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30);

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
(3, 'aluno', 'web', '2023-05-20 17:07:05', '2023-05-20 17:07:05');

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
(1, 14, 'agua', 'diurno', 1, '2023-05-20 17:08:30', '2023-05-20 17:08:30'),
(2, 14, 'agua', 'diurno', 2, '2023-05-20 17:18:54', '2023-05-20 17:18:54'),
(3, 14, 'agua', 'diurno', 3, '2023-05-20 17:22:01', '2023-05-20 17:22:01'),
(4, 14, 'agua', 'diurno', 4, '2023-05-20 17:23:36', '2023-05-20 17:23:36'),
(5, 14, 'agua', 'diurno', 5, '2023-05-20 17:25:31', '2023-05-20 17:25:31'),
(6, 14, 'agua', 'diurno', 6, '2023-05-20 17:27:15', '2023-05-20 17:27:15'),
(7, 14, 'agua', 'diurno', 7, '2023-05-20 17:29:37', '2023-05-20 17:29:37'),
(8, 14, 'agua', 'diurno', 8, '2023-05-20 17:31:05', '2023-05-20 17:31:05'),
(9, 14, 'agua', 'diurno', 9, '2023-05-20 17:33:41', '2023-05-20 17:33:41'),
(10, 14, 'agua', 'diurno', 10, '2023-05-20 17:37:13', '2023-05-20 17:37:13'),
(11, 14, 'agua', 'diurno', 11, '2023-05-20 17:43:00', '2023-05-20 17:43:00'),
(12, 14, 'agua', 'diurno', 12, '2023-05-20 17:49:57', '2023-05-20 17:49:57'),
(13, 14, 'agua', 'diurno', 13, '2023-05-20 17:57:09', '2023-05-20 17:57:09'),
(14, 14, 'agua', 'diurno', 14, '2023-05-20 18:01:25', '2023-05-20 18:01:25'),
(15, 14, 'agua', 'diurno', 15, '2023-05-20 18:04:21', '2023-05-20 18:04:21'),
(16, 14, 'agua', 'diurno', 16, '2023-05-20 18:06:20', '2023-05-20 18:06:20'),
(17, 14, 'agua', 'diurno', 17, '2023-05-20 18:12:09', '2023-05-20 18:12:09'),
(18, 14, 'agua', 'diurno', 18, '2023-05-20 18:13:31', '2023-05-20 18:13:31'),
(19, 14, 'agua', 'diurno', 19, '2023-05-20 18:15:24', '2023-05-20 18:15:24'),
(20, 14, 'agua', 'diurno', 20, '2023-05-20 18:17:29', '2023-05-20 18:17:29'),
(21, 14, 'agua', 'diurno', 21, '2023-05-20 18:18:55', '2023-05-20 18:18:55'),
(22, 14, 'agua', 'diurno', 22, '2023-05-20 18:20:47', '2023-05-20 18:20:47'),
(23, 14, 'agua', 'diurno', 23, '2023-05-20 18:22:04', '2023-05-20 18:22:04'),
(24, 14, 'agua', 'diurno', 24, '2023-05-20 18:23:21', '2023-05-20 18:23:21'),
(25, 14, 'agua', 'diurno', 25, '2023-05-20 18:24:11', '2023-05-20 18:24:11'),
(26, 14, 'agua', 'diurno', 26, '2023-05-20 18:26:22', '2023-05-20 18:26:22'),
(27, 14, 'agua', 'diurno', 27, '2023-05-20 18:28:41', '2023-05-20 18:28:41'),
(28, 14, 'agua', 'diurno', 28, '2023-05-20 18:29:58', '2023-05-20 18:29:58'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `like_videos`
--
ALTER TABLE `like_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
