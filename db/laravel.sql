-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2023 às 03:31
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
(1, 3, 1, '2023-05-18 20:36:44', '2023-05-18 20:36:44'),
(2, 3, 2, '2023-05-18 20:37:14', '2023-05-18 20:37:14'),
(3, 2, 3, '2023-05-18 21:23:27', '2023-05-18 21:23:27'),
(4, 2, 1, '2023-05-18 21:23:28', '2023-05-18 21:23:28'),
(5, 2, 4, '2023-05-18 21:23:29', '2023-05-18 21:23:29'),
(6, 1, 2, '2023-05-18 21:24:24', '2023-05-18 21:24:24'),
(7, 4, 2, '2023-05-18 21:27:21', '2023-05-18 21:27:21');

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
(1, 3, 3, '2023-05-18 20:37:00', '2023-05-18 20:37:00'),
(2, 3, 1, '2023-05-18 20:37:01', '2023-05-18 20:37:01'),
(3, 3, 2, '2023-05-18 20:37:28', '2023-05-18 20:37:28'),
(4, 2, 3, '2023-05-18 21:24:00', '2023-05-18 21:24:00'),
(5, 2, 1, '2023-05-18 21:24:04', '2023-05-18 21:24:04'),
(6, 2, 2, '2023-05-18 21:24:05', '2023-05-18 21:24:05');

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
(87, '2014_10_12_000000_create_users_table', 2),
(88, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(89, '2019_08_19_000000_create_failed_jobs_table', 2),
(90, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(91, '2023_03_06_073452_create_permission_tables', 2),
(92, '2023_03_13_010303_create_site_styles_table', 2),
(93, '2023_03_13_215920_create_posts_table', 2),
(94, '2023_04_07_033811_create_likes_table', 2),
(95, '2023_04_11_174535_create_followers_table', 2),
(96, '2023_04_15_041332_create_videos_table', 2),
(97, '2023_05_02_230444_create_questions_table', 2),
(98, '2023_05_03_012940_create_like_videos_table', 2);

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
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 4);

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
(1, 'criar_postagens', 'web', '2023-05-18 03:26:23', '2023-05-18 03:26:23'),
(2, 'enviar_videos', 'web', '2023-05-18 03:27:03', '2023-05-18 03:27:03'),
(3, 'excluir_usuario', 'web', '2023-05-18 04:56:31', '2023-05-18 04:56:31'),
(4, 'promover_cargo', 'web', '2023-05-18 05:16:40', '2023-05-18 05:16:40'),
(5, 'revogar_cargo', 'web', '2023-05-18 05:16:58', '2023-05-18 05:16:58'),
(6, 'interagir_postagens', 'web', '2023-05-19 00:44:29', '2023-05-19 00:44:29'),
(7, 'interagir_videos', 'web', '2023-05-19 00:50:58', '2023-05-19 00:50:58');

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
(1, 1, 'Postagem Ana123', NULL, '2023-05-18 12:09:59', '2023-05-18 12:12:26'),
(2, 2, 'Postagem Bob', NULL, '2023-05-18 12:10:45', '2023-05-18 12:10:45'),
(3, 3, 'Post admin', NULL, '2023-05-18 20:29:56', '2023-05-18 20:29:56'),
(4, 3, 'comentário admin', 3, '2023-05-18 20:59:09', '2023-05-18 20:59:09'),
(5, 1, 'comentário prof', 3, '2023-05-18 21:01:03', '2023-05-18 21:01:03'),
(6, 2, 'comentário aluno', 3, '2023-05-18 21:03:26', '2023-05-18 21:03:26');

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
(1, 2, 2, 'aluno', NULL, '2023-05-18 22:12:09', '2023-05-18 22:12:09'),
(2, 1, 2, 'prof', NULL, '2023-05-18 22:13:12', '2023-05-18 22:13:12'),
(3, 3, 2, 'admin', NULL, '2023-05-18 22:14:09', '2023-05-18 22:14:09'),
(4, 1, 2, 'rep2', 2, '2023-05-18 22:18:39', '2023-05-18 22:18:39'),
(5, 1, 2, 'rep3', 1, '2023-05-18 22:18:49', '2023-05-18 22:18:49'),
(6, 1, 2, 'rep1', 3, '2023-05-18 22:18:57', '2023-05-18 22:18:57');

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
(1, 'admin', 'web', '2023-05-17 20:05:38', '2023-05-17 20:05:38'),
(2, 'prof', 'web', '2023-05-17 20:05:43', '2023-05-17 20:05:43'),
(3, 'aluno', 'web', '2023-05-17 20:05:48', '2023-05-17 20:05:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 14, 'trovao', 'vespertino', 1, '2023-05-17 20:06:28', '2023-05-18 18:15:35'),
(2, 14, 'agua', 'diurno', 2, '2023-05-18 12:10:33', '2023-05-18 12:10:33'),
(3, 14, 'agua', 'diurno', 3, '2023-05-18 19:28:36', '2023-05-18 19:28:36'),
(4, 14, 'agua', 'diurno', 4, '2023-05-18 19:35:49', '2023-05-18 19:35:49');

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
(1, 'Ana', 'Souza', 'ana', 'ana@gmail.com', 0, '$2y$10$3SOrtOGEPHIrJIAiZJ1Xt.Kk9mi8HNNp.V5CfeAYwiwOv0JDXmFfS', NULL, '/images/default.png', 'F', '1995-05-05', NULL, '2023-05-17 20:06:27', '2023-05-17 20:06:27'),
(2, 'bob', 'silva', 'bob', 'bob@gmail.com', 0, '$2y$10$QhkBPnwQuB..vtH59J7ZieJChcKRW0vT1Q3G8X2vZ6p7KAvw8wzkW', NULL, '/images/default.png', 'M', '1992-12-12', NULL, '2023-05-18 12:10:33', '2023-05-18 12:10:33'),
(3, 'Caio', 'Martins', 'caio', 'caio@gmail.com', 0, '$2y$10$iBEBYo6LJP.iYskF1i/txeLiXJpST479LZV/NVGx1f..viC9JCGIq', NULL, '/images/default.png', 'M', '1991-01-01', NULL, '2023-05-18 19:28:35', '2023-05-18 19:28:35'),
(4, 'Leo', 'Arthur', 'leo', 'leo@gmail.com', 0, '$2y$10$0y8Ddhw6h7M.9CjK19cLAeVoE.VFZfsADeiGygW.ZjFQp.QYg/R6W', NULL, '/images/default.png', 'M', '2010-10-10', NULL, '2023-05-18 19:35:49', '2023-05-18 19:35:49');

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
(1, 2, 'Title 1', 'Description 1', 'Português', '501', 0, 'https://www.youtube.com/watch?v=ZZmPGJ6IRyU', '2023-05-18 13:18:14', '2023-05-18 13:18:14'),
(2, 1, 'Title 2', 'Description 2', 'Português', '501', 0, 'https://www.youtube.com/watch?v=XvdePktAui8', '2023-05-18 13:19:51', '2023-05-18 13:19:51');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `like_videos`
--
ALTER TABLE `like_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `site_styles`
--
ALTER TABLE `site_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
