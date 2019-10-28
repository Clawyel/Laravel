-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Eki 2019, 13:00:06
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `laravelarsiv`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategorilers`
--

CREATE TABLE `kategorilers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategorilers`
--

INSERT INTO `kategorilers` (`id`, `baslik`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 'Polisiye', '2019-10-27 18:19:46', '2019-10-27 18:19:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplars`
--

CREATE TABLE `kitaplars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yayineviID` bigint(20) UNSIGNED DEFAULT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sayfaSayisi` int(11) NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kitaplars`
--

INSERT INTO `kitaplars` (`id`, `yayineviID`, `baslik`, `sayfaSayisi`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 1, 'Polisiye', 275, '2019-10-27 18:19:46', '2019-10-27 18:19:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_kategoris`
--

CREATE TABLE `kitap_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kitaplar_id` bigint(20) UNSIGNED NOT NULL,
  `kategoriler_id` bigint(20) UNSIGNED NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kitap_kategoris`
--

INSERT INTO `kitap_kategoris` (`id`, `kitaplar_id`, `kategoriler_id`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 1, 1, '2019-10-27 18:19:46', '2019-10-27 18:19:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_18_113154_create_kategorilers_table', 1),
(5, '2019_10_18_113326_create_yazarlars_table', 1),
(6, '2019_10_18_113424_create_yayinevleris_table', 1),
(7, '2019_10_18_113822_create_kitaplars_table', 1),
(8, '2019_10_27_111053_create_kitap_kategoris_table', 1),
(9, '2019_10_27_124306_create_yazarkitaps_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `api_token`, `email_verified_at`, `password`, `remember_token`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 'ümit duman', 'duman@gmail.com', 'tdDq5jyNqmqbhT9DoA0kFZp2jjBXsYZsdUAdRPgwKiMrAaRrZzSBqllWj4Mb', NULL, '$2y$10$6uYmFqB2Gi9uPrzbIKziU.0p1wdvYpgr9ox3UrjKuIRfvanaMQv8K', NULL, '2019-10-27 15:19:50', '2019-10-27 15:21:45'),
(2, 'hasan Turunç', 'hasan@gmail.com', 'yLqruPd0hE4gcUNql1k0EIy5qyRzrkvVmrZdVupfQFHG7I0qk0NqxvsjKpv9', NULL, '$2y$10$MhtmZc50ajzmRMg61.cgI.o0eHiv6MWeqGODkH7uFRADxWd0KloF2', NULL, '2019-10-27 15:24:09', '2019-10-28 07:50:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevleris`
--

CREATE TABLE `yayinevleris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `yayinevleris`
--

INSERT INTO `yayinevleris` (`id`, `baslik`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 'Alsancak Yayın Evi', '2019-10-27 18:19:46', '2019-10-27 18:19:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarkitaps`
--

CREATE TABLE `yazarkitaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kitaplar_id` bigint(20) UNSIGNED NOT NULL,
  `yazarlar_id` bigint(20) UNSIGNED NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `yazarkitaps`
--

INSERT INTO `yazarkitaps` (`id`, `kitaplar_id`, `yazarlar_id`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 1, 1, '2019-10-27 18:19:46', '2019-10-27 18:19:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlars`
--

CREATE TABLE `yazarlars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baslik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `guncelleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `yazarlars`
--

INSERT INTO `yazarlars` (`id`, `baslik`, `olusturma_tarihi`, `guncelleme_tarihi`) VALUES
(1, 'Ümit Duman', '2019-10-27 18:19:46', '2019-10-27 18:19:46');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategorilers`
--
ALTER TABLE `kategorilers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitaplars`
--
ALTER TABLE `kitaplars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitaplars_yayineviid_foreign` (`yayineviID`);

--
-- Tablo için indeksler `kitap_kategoris`
--
ALTER TABLE `kitap_kategoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitap_kategoris_kitaplar_id_foreign` (`kitaplar_id`),
  ADD KEY `kitap_kategoris_kategoriler_id_foreign` (`kategoriler_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Tablo için indeksler `yayinevleris`
--
ALTER TABLE `yayinevleris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazarkitaps`
--
ALTER TABLE `yazarkitaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yazarkitaps_kitaplar_id_foreign` (`kitaplar_id`),
  ADD KEY `yazarkitaps_yazarlar_id_foreign` (`yazarlar_id`);

--
-- Tablo için indeksler `yazarlars`
--
ALTER TABLE `yazarlars`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategorilers`
--
ALTER TABLE `kategorilers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kitaplars`
--
ALTER TABLE `kitaplars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kitap_kategoris`
--
ALTER TABLE `kitap_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yayinevleris`
--
ALTER TABLE `yayinevleris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yazarkitaps`
--
ALTER TABLE `yazarkitaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yazarlars`
--
ALTER TABLE `yazarlars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kitaplars`
--
ALTER TABLE `kitaplars`
  ADD CONSTRAINT `kitaplars_yayineviid_foreign` FOREIGN KEY (`yayineviID`) REFERENCES `yayinevleris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `kitap_kategoris`
--
ALTER TABLE `kitap_kategoris`
  ADD CONSTRAINT `kitap_kategoris_kategoriler_id_foreign` FOREIGN KEY (`kategoriler_id`) REFERENCES `kategorilers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kitap_kategoris_kitaplar_id_foreign` FOREIGN KEY (`kitaplar_id`) REFERENCES `kitaplars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `yazarkitaps`
--
ALTER TABLE `yazarkitaps`
  ADD CONSTRAINT `yazarkitaps_kitaplar_id_foreign` FOREIGN KEY (`kitaplar_id`) REFERENCES `kitaplars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yazarkitaps_yazarlar_id_foreign` FOREIGN KEY (`yazarlar_id`) REFERENCES `yazarlars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
