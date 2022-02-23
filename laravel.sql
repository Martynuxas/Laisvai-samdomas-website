-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 05:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
-- Table structure for table `isiminti`
--

CREATE TABLE `isiminti` (
  `id` int(10) NOT NULL,
  `vartotojo_id` int(10) NOT NULL,
  `skelbimo_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `isiminti`
--

INSERT INTO `isiminti` (`id`, `vartotojo_id`, `skelbimo_id`) VALUES
(30, 7, 8),
(31, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(10) NOT NULL,
  `pavadinimas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorijos`
--

INSERT INTO `kategorijos` (`id`, `pavadinimas`) VALUES
(1, 'vidaus apdaila'),
(2, 'lauko darbai'),
(7, 'test'),
(8, 'Autos');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_30_141859_create_sessions_table', 1);

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
-- Table structure for table `prenumerata`
--

CREATE TABLE `prenumerata` (
  `id` int(10) NOT NULL,
  `kategorijos_id` int(10) NOT NULL,
  `vartotojo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prenumerata`
--

INSERT INTO `prenumerata` (`id`, `kategorijos_id`, `vartotojo_id`) VALUES
(10, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6yYXrYyXnH7WW55qFDOWZEVeYAQQy4JttgCkI9bh', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieVY5Yk1BNTB0MGhTSUVKWnVhaEV0WlVlZXNOM0xYd29UTHRpYjE1ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9za2VsYmltYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaGZvTlpaQmJzVUp0a2dJeHd5dFpRT2xCODhhQ01QQ3J3U3ZtQVU0clRraGo5SHA4L1ZzcFciO30=', 1639585628),
('hsmZi2GsKlThAtvId4MwwD2Q14OZyc8fyYERU0KT', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicDJ0bUpWWXJzT3RsNFpFY1JvRlNzaFB6N3VFM1ZYc2NzWWZ6T25jeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9za2VsYmltYWkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaGZvTlpaQmJzVUp0a2dJeHd5dFpRT2xCODhhQ01QQ3J3U3ZtQVU0clRraGo5SHA4L1ZzcFciO30=', 1639585449),
('QbCFIZupv1bgAsRqu12wiuS4sqUjkwBV5nWf03rB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2U4Z28yV2FhOUt3UUpFNW13UjFheng2TlVsd0xrNWd4Z09pS3BHayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1640016684);

-- --------------------------------------------------------

--
-- Table structure for table `skelbimai`
--

CREATE TABLE `skelbimai` (
  `id` int(10) NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `aprasymas` varchar(255) NOT NULL,
  `valandinis` int(64) DEFAULT NULL,
  `biudzetas` int(64) DEFAULT NULL,
  `data` date NOT NULL,
  `telefonas` varchar(45) DEFAULT NULL,
  `el_pastas` varchar(45) DEFAULT NULL,
  `galerijos_nuoroda` varchar(255) NOT NULL,
  `patirtis` int(10) DEFAULT NULL,
  `kategorijos_id` int(32) NOT NULL,
  `paslaugu_atstumai` int(32) NOT NULL,
  `statuso_id` int(32) NOT NULL,
  `asmens_tipas` varchar(32) NOT NULL,
  `miestas` varchar(32) NOT NULL,
  `vartotojo_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skelbimai`
--

INSERT INTO `skelbimai` (`id`, `pavadinimas`, `aprasymas`, `valandinis`, `biudzetas`, `data`, `telefonas`, `el_pastas`, `galerijos_nuoroda`, `patirtis`, `kategorijos_id`, `paslaugu_atstumai`, `statuso_id`, `asmens_tipas`, `miestas`, `vartotojo_id`) VALUES
(2, 'Pjaunu žole', 'Pjaunu žole visur ir visada', 5, 1000, '2021-12-15', '8674', 'test2@gmail.com', 'fdsfsdf', 3, 2, 10, 2, 'Fizinis', 'Kaunas', 0),
(3, 'Visi vidaus įrengimo darbai', 'Mūsų klientams nereikia rūpintis meistrų paieška, darbų kokybės ir terminų tikrinimu. Tai padarome mes. Siūlome platų paslaugų spektrą: nuo dizaino idėjos iki pilno jos įgyvendinimo. O turintiems interjero dizaino projektą, pasiūlysime tik jo įgyvendinimą', NULL, NULL, '2021-11-18', NULL, NULL, 'dasd', NULL, 2, 10, 2, 'fizinis', 'Kaunas', 0),
(4, 'Pagalba kelyje 15€ Tralas Vilniuje', 'Geriausia kaina!!! iki 16 TONU AUTOVEZIS TRALAS TRALIUKAS EVAKUATORIUS AUTOMOBILVEZIS TRALO PASLAUGOS, TECHNINES PAGALBOS AUTOMOBILIS SUNKVEZIMIS TECHNINE PAGALBA VILNIUJE, PAGALBA KELYJE', NULL, NULL, '2021-12-14', NULL, NULL, 'dasd', NULL, 1, 10, 2, 'fizinis', 'Kaunas', 1),
(8, 'Pervežu mašinas', 'greitai vežu', 10, 1000, '2021-12-15', '8674', 'test@gmail.com', 'dfgdsdf', 10, 8, 10, 2, 'Fizinis', 'Kaunas', 7);

-- --------------------------------------------------------

--
-- Table structure for table `skelbimo_statusas`
--

CREATE TABLE `skelbimo_statusas` (
  `id` int(10) NOT NULL,
  `pavadinimas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skelbimo_statusas`
--

INSERT INTO `skelbimo_statusas` (`id`, `pavadinimas`) VALUES
(1, 'negalioja'),
(2, 'galioja'),
(5, 'darar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `asmens_tipas` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miestas` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `asmens_tipas`, `role`, `miestas`, `lastname`) VALUES
(7, 'Arturassfd', 'martynas.martynas8@gmail.com', '$2y$10$hfoNZZBbsUJtkgIxwytZQOlB88aCMPCrwSvmAU4rTkhj9Hp8/VspW', '2021-12-14 16:29:57', '2021-12-15 13:57:55', 'Fizinis', 'Moderatorius', 'Vilnius', 'Smeletasis');

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `vartotojo_id` int(10) NOT NULL,
  `vardas` varchar(32) DEFAULT NULL,
  `pavarde` varchar(32) DEFAULT NULL,
  `el_pastas` varchar(32) NOT NULL,
  `slaptazodis` varchar(45) NOT NULL,
  `asmens_tipas` varchar(32) DEFAULT NULL,
  `role` varchar(32) NOT NULL,
  `miestas` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`vartotojo_id`, `vardas`, `pavarde`, `el_pastas`, `slaptazodis`, `asmens_tipas`, `role`, `miestas`) VALUES
(1, 'Martynas', 'Kemežys', 'martynas.martynas5@gmail.com', 'testas123', 'fizinis', 'klientas', 'Kaunas'),
(2, 'test', 'test', 'martynas.martynas5@gmail.com', 'testas123', 'fizinis', 'klientas', 'Kaunas'),
(3, 'fsdf', 'sfsf', 'martynas.martynas5@gmail.com', 'fsdf', 'sfs', 'fsfs', 'sfsfsf'),
(4, 'ketvr', 'sfsf', 'martynas.martynas5@gmail.com', 'gd', 'd', 'g', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `isiminti`
--
ALTER TABLE `isiminti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skelbimo_id` (`skelbimo_id`),
  ADD KEY `vartotojo_id` (`vartotojo_id`);

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `prenumerata`
--
ALTER TABLE `prenumerata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorijos_id` (`kategorijos_id`),
  ADD KEY `vartotojo_id` (`vartotojo_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skelbimai`
--
ALTER TABLE `skelbimai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorijos_id` (`kategorijos_id`),
  ADD KEY `statuso_id` (`statuso_id`);

--
-- Indexes for table `skelbimo_statusas`
--
ALTER TABLE `skelbimo_statusas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`vartotojo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isiminti`
--
ALTER TABLE `isiminti`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prenumerata`
--
ALTER TABLE `prenumerata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skelbimai`
--
ALTER TABLE `skelbimai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skelbimo_statusas`
--
ALTER TABLE `skelbimo_statusas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vartotojai`
--
ALTER TABLE `vartotojai`
  MODIFY `vartotojo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skelbimai`
--
ALTER TABLE `skelbimai`
  ADD CONSTRAINT `skelbimai_ibfk_1` FOREIGN KEY (`kategorijos_id`) REFERENCES `kategorijos` (`id`),
  ADD CONSTRAINT `skelbimai_ibfk_2` FOREIGN KEY (`statuso_id`) REFERENCES `skelbimo_statusas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
