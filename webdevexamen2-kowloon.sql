-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 aug 2017 om 15:35
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdevexamen2-kowloon`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `url`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'dog', 'Dog', 'dog.png', NULL, NULL),
(2, 'cat', 'Cat', 'cat.png', NULL, NULL),
(3, 'bird', 'Bird', 'bird.png', NULL, NULL),
(4, 'fish', 'Fish', 'fish.png', NULL, NULL),
(5, 'smallanimals', 'Small Animals', 'hamster.png', NULL, NULL),
(6, 'other', 'Other', 'other.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'red', '#FF0000', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `color_product`
--

CREATE TABLE `color_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `color_product`
--

INSERT INTO `color_product` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(3, 6, 1, NULL, NULL),
(5, 8, 1, NULL, NULL),
(6, 9, 1, NULL, NULL),
(7, 10, 1, NULL, NULL),
(10, 17, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 'vraag 2', 'antwoord 2', '2017-08-15 15:07:27', '2017-08-15 15:09:49'),
(3, 'vraag 1', 'vraag 1', '2017-08-15 15:21:51', '2017-08-15 15:21:51');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq_product`
--

CREATE TABLE `faq_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `faq_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `faq_product`
--

INSERT INTO `faq_product` (`id`, `faq_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 17, '2017-08-18 14:21:03', '2017-08-18 14:21:03');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hot_items`
--

CREATE TABLE `hot_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `hot_items`
--

INSERT INTO `hot_items` (`id`, `product_id`, `place`, `created_at`, `updated_at`) VALUES
(1, 6, 2, NULL, '2017-08-15 13:43:03'),
(2, 10, 1, NULL, '2017-08-15 13:43:25'),
(3, 8, 3, NULL, NULL),
(4, 9, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_10_103308_create_subscribers_tabel', 1),
(4, '2017_08_10_124024_create_categories_tabel', 1),
(5, '2017_08_10_125627_create_products_tabel', 1),
(6, '2017_08_10_144437_create_colors_tabel', 1),
(7, '2017_08_10_145423_create_tags_tabel', 1),
(8, '2017_08_10_145820_create_colors_products_tabel', 1),
(9, '2017_08_10_154607_create_photos_tabel', 2),
(10, '2017_08_15_145117_create_hot_items_tabel', 3),
(11, '2017_08_15_160701_create_faqs_tabel', 4),
(12, '2017_08_15_160739_create_faqs_products_tabel', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `photos`
--

INSERT INTO `photos` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(3, '1563DSC_0134.JPG', 7, '2017-08-14 08:24:29', '2017-08-14 08:24:29'),
(4, '7225Jellyfish.jpg', 8, '2017-08-15 13:15:43', '2017-08-15 13:15:43'),
(5, '8574Lighthouse.jpg', 8, '2017-08-15 13:15:43', '2017-08-15 13:15:43'),
(6, '6103Hydrangeas.jpg', 9, '2017-08-15 13:16:15', '2017-08-15 13:16:15'),
(7, '7924Penguins.jpg', 10, '2017-08-15 13:17:15', '2017-08-15 13:17:15'),
(8, '10091-5.png', 14, '2017-08-18 13:47:22', '2017-08-18 13:47:22'),
(11, '26038886719.jpg', 17, '2017-08-18 14:06:25', '2017-08-18 14:06:25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `korteBeschrijving` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uitleg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `prijs`, `korteBeschrijving`, `uitleg`, `link`, `categorie_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(6, 'Honden Bak', '123', 'lolol', 'dezfzfze', 'Honden-Bak', 1, 1, '2017-08-11 13:10:45', '2017-08-15 13:42:29'),
(8, 'vogelkooi', '15', 'zqgzqgzqegf', 'zeqgqzgzq', 'vogelkooi', 2, 1, '2017-08-15 13:15:43', '2017-08-15 13:15:43'),
(9, 'kattenbak', '14', 'gresghser', 'erherhe', 'kattenbak', 3, 1, '2017-08-15 13:16:15', '2017-08-15 13:16:15'),
(10, 'test 3', '16', 'fzqfzqfzqefz', 'zefzfzqfze', 'test-3', 1, 1, '2017-08-15 13:17:15', '2017-08-15 13:17:15'),
(17, 'zfzfez', '54', 'zqfze', 'fqzfzezq', 'zfzfez', 1, 1, '2017-08-18 13:55:27', '2017-08-18 13:55:27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'arne.vanbavel@hotmail.com', '2017-08-19 11:06:08', '2017-08-19 11:06:08');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'on sale', NULL, NULL),
(2, 'Splash and fun', NULL, NULL),
(3, 'Luxury', NULL, NULL),
(4, 'new', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, '$2y$10$o90kBtLNYjTDF19M8fCFYepbxRQyB.kY9f4WQnBgQpDJB4zO8nXWW', 'BUuYcPaK9j3OtR6Ftja6yQKimJDCd1Aa1Z1PtAEEPdbyZRcjCF98lYGikvPp', '2017-08-10 13:21:03', '2017-08-10 13:21:03');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `faq_product`
--
ALTER TABLE `faq_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `hot_items`
--
ALTER TABLE `hot_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexen voor tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `faq_product`
--
ALTER TABLE `faq_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `hot_items`
--
ALTER TABLE `hot_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT voor een tabel `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
