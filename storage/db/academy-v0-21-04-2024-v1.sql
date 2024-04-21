-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2024 at 05:28 PM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekipa-academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `photo_uri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presenter_role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `interview` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `role`, `phone`, `birth_date`, `address`, `city`, `country`, `about`, `photo_uri`, `instagram`, `facebook`, `twitter`, `linkedin`, `web`, `title`, `institution`, `presenter_role`, `short_description`, `description`, `interview`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'John Doe', 'john-doe', 'john@doe.com', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', 'f0dfb2bce24c000f00b70554c7dffb4d.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', 'https://ba.linkedin.com/', 'https://alkaris.com/', 'software engineer', 'Hell', 'Lecturer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Why do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\nWhere can I get some?\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2024-04-16 17:22:25', '2024-04-21 12:22:00', NULL),
(2, 'Aladin Kapić', 'aladin-kapic', 'aladin.kapic@alkaris.com', NULL, '$2y$12$fcMO1NXQyrq.GuBHNzTw5.JbQ7OT36QE5Yx1b2L/icVV8waSJUeCO', '15c870a5723bdcb6c434c32cfe423de814608cdfbd1b5339da6c9ddc96170a96', NULL, 'admin', '38761683449', '2024-04-17', 'sadsa', 'dsad', 1, NULL, 'a7fda60f5b243942b9f0e782c442ed61.png', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '2024-04-17 14:54:21', '2024-04-18 16:11:10', NULL),
(3, 'Admira Kerić', 'admira-keric', 'admira@keric.ba', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'sdsadsa', 'aa', 'ee', NULL, 'cc', 'dipl. in', 'DDC', 'Workshop leader', NULL, NULL, NULL, '2024-04-16 17:22:25', '2024-04-21 13:44:20', NULL),
(4, 'Murat Đulin', 'murat-dulin', 'murat@gmail.com', NULL, '$2y$12$wTzz416P8uKA0leAcZ4tNuQ5Gfzof2xSZcl7/pgdicd5ON5zpC21u', 'b96d53fa0c1cbb34670ac294d69a5bf42c468a39d686e1b3f9e1edd8e48081b4', NULL, 'user', '38762225885', '1953-08-24', 'Kapići br. 17', 'Cazin', 21, NULL, '272ee2a46def6fceca86f0c677408ecc.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-20 07:59:55', '2024-04-20 08:00:25', NULL),
(5, 'Šemsa Suljaković', 'the-semsa', 'semsa@suljakovic.ba', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'ee', 'https://ba.linkedin.com/', '', 'Pevaljka', 'Južni Vetar', NULL, NULL, 'aa', NULL, '2024-04-16 17:22:25', '2024-04-21 12:02:38', NULL),
(6, 'Lepa Brena', 'brena', 'lepa@brena.ba', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', 'Pjevačica', 'Grand', 'Keynote speaker', 'Keynote speaker', 'ee', NULL, '2024-04-16 17:22:25', '2024-04-21 12:14:55', NULL),
(7, 'Joca Amsterdam', 'brenaa', 'lepa@brena.baa', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', 'Pjevačica', 'Grand', 'Keynote speaker', 'Keynote speaker', 'aa', NULL, '2024-04-16 17:22:25', '2024-04-21 12:02:52', NULL),
(8, 'Tetka Rasema', 'brenaaaa', 'lepa@brena.baaa', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', 'Pjevačica', 'Grand', NULL, 'Keynote speaker', 'ee', NULL, '2024-04-16 17:22:25', '2024-04-21 12:02:52', NULL),
(9, 'Boris Brkan', 'brenac', 'lepa@brena.baaaa', '2024-04-16 19:22:32', '$2y$12$jHBo2a5v9xW7dOUscZ836.j1LMLH3sj1kzUP5pDeB8L3S1p1E.Jl.', '6a3f778af7cdd7e3beee12884d6b8dabd33dad476dc8bb9e1f1fd9574dd895c0', NULL, 'presenter', '38761225883', '2020-01-20', 'Jonhs address', 'New York', 21, 'Eee easa', '314cf5bb061941128ed8b56fb6a845ec.png', 'ii', 'aa', 'https://twitter.com/i/flow/login?redirect_after_login=%2Fvbetocv', NULL, 'cc', 'Pjevačica', 'Grand', NULL, 'Keynote speaker', NULL, NULL, '2024-04-16 17:22:25', '2024-04-21 12:02:52', NULL),
(10, 'Boris Brkan', 'boris-brkan', 'boris@gmail.com', NULL, '$2y$12$etgAmukF1yZ0eSTz5pqOFeUMnpoMdbnEYPyGwebyhsZnkwORaEQhC', '34a45fc04f67bb2c1eb4af68a0439bab7201e21ef2fd893a1468cad7f472d628', NULL, 'user', '38762456669', '1964-11-17', 'Elidža BB', 'Sarajevo', 21, NULL, '89ee638efdd3347a8a2689b8d5e8458f.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-21 13:47:05', '2024-04-21 13:47:38', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
