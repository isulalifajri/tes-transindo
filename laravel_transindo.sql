-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2024 pada 13.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_transindo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'makanan', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(2, 'minuman', '2024-07-06 09:05:00', '2024-07-06 09:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_06_043001_create_categories_table', 1),
(6, '2024_07_06_043010_create_products_table', 1),
(7, '2024_07_06_131434_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `tgl_kirim` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `qty`, `total`, `tgl_kirim`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 7, 6881, '2024-07-20', 'diproses', '2024-07-06 09:09:08', '2024-07-06 09:09:08'),
(2, 11, 1, 6, 5898, '2024-07-13', 'diproses', '2024-07-06 09:15:53', '2024-07-06 09:15:53'),
(3, 11, 1, 6, 5898, '2024-07-13', 'diproses', '2024-07-06 09:16:57', '2024-07-06 09:16:57'),
(4, 11, 1, 1, 983, '2024-07-13', 'diproses', '2024-07-06 09:20:22', '2024-07-06 09:20:22'),
(5, 11, 1, 5, 4915, '2024-07-12', 'dikirim', '2024-07-06 09:21:27', '2024-07-06 10:52:04'),
(6, 11, 1, 5, 4915, '2024-07-12', 'selesai', '2024-07-06 09:21:40', '2024-07-06 10:51:02'),
(7, 11, 11, 5, 2265, '2024-07-12', 'selesai', '2024-07-06 10:27:10', '2024-07-06 10:46:02'),
(8, 11, 11, 9, 4077, '2024-07-13', 'diproses', '2024-07-06 11:41:45', '2024-07-06 11:41:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `title`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 'asperiores', 'Non aut quo velit. Tenetur tempore minima impedit soluta facere. Repellat et quod omnis natus. Repudiandae debitis dolores architecto tempora praesentium numquam quidem.', 'https://via.placeholder.com/640x480.png/004455?text=velit', '983', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(2, 7, 1, 'ut', 'Velit debitis ducimus unde dolorum sed alias. Accusamus nostrum iure placeat autem cumque rerum. Aliquam laboriosam minus ipsa. Aliquid magnam mollitia qui ipsam nulla eum error sit. Dolorem maxime libero dolor quo perspiciatis autem dicta.', 'https://via.placeholder.com/640x480.png/00bbdd?text=odit', '703', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(3, 12, 2, 'perspiciatis', 'Fuga quo maxime aut id dolore nisi. Blanditiis esse voluptas deleniti ea ea perferendis. Aut error magni omnis aperiam est earum minus.', 'https://via.placeholder.com/640x480.png/00ff55?text=iste', '311', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(4, 12, 1, 'est', 'Aspernatur itaque enim qui ipsum eos. Et quas quod aut libero eaque omnis. Voluptatum in a consequuntur quasi porro. Et beatae delectus mollitia ullam quibusdam illum laudantium.', 'https://via.placeholder.com/640x480.png/00dddd?text=minima', '305', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(5, 3, 2, 'eligendi', 'Asperiores asperiores reiciendis consequatur dolore excepturi. Rerum temporibus placeat esse et repudiandae. Excepturi in eos nostrum aliquam provident labore delectus.', 'https://via.placeholder.com/640x480.png/00ffbb?text=at', '781', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(6, 10, 2, 'velit', 'Ut aut dolorem aut esse accusamus dolor. Odit consequuntur enim rem dolor libero animi porro.', 'https://via.placeholder.com/640x480.png/00dd44?text=corrupti', '390', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(7, 12, 1, 'quidem', 'Placeat enim ea hic ut. Voluptatem totam quibusdam quia eaque fugit. Modi ut ipsum eum autem. Exercitationem nihil sit est quisquam eos.', 'https://via.placeholder.com/640x480.png/009955?text=beatae', '473', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(8, 12, 2, 'eum', 'Repellendus autem ut ad inventore sit eum. Vel earum exercitationem recusandae vel. Asperiores sit aliquam omnis deleniti. Ut recusandae est atque.', 'https://via.placeholder.com/640x480.png/0099dd?text=atque', '718', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(9, 7, 1, 'consequatur', 'Tenetur saepe et nemo maxime. Perferendis blanditiis magnam corporis ipsum non ut et. Aut nam culpa commodi placeat.', 'https://via.placeholder.com/640x480.png/002255?text=sed', '732', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(10, 10, 1, 'officiis', 'Dolores nam quasi sapiente vel fugiat. Pariatur dignissimos rerum accusantium illum. Placeat delectus minima provident est officia dolore quisquam in.', 'https://via.placeholder.com/640x480.png/00ffcc?text=ipsum', '469', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(11, 3, 2, 'jus buah', 'tess', 'jusbuah_2024-07-06_172540_pm.png', '453', '2024-07-06 10:25:40', '2024-07-06 10:25:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `role` enum('merchant','customer') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `no_telepon`, `description`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Scotty Armstrong', 'arturo.bruen@example.net', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '268 Kiehn Crest Apt. 293\nGusstad, NC 14968', '+1-469-332-9731', 'Ipsum cumque ut labore et dolores. Similique aut beatae dolorum ut magnam suscipit consequatur aspernatur. Quam soluta cupiditate culpa soluta iste. Quas incidunt qui est quisquam voluptas et esse.', 'customer', 'PXuwwjKdP3', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(2, 'Mina Feest', 'brooke.witting@example.com', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '67605 Gleichner Streets\nPort Abigaleville, WV 95547-0105', '1-703-616-5279', 'Aliquid sed animi ut odit ullam voluptatem. Inventore dolores iusto maiores fugit error omnis. Delectus est esse occaecati ea nostrum eaque.', 'customer', '8OJEWDv5m8', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(3, 'Rylan Simonis', 'julien.kohler@example.org', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '5808 Bergstrom Groves Suite 873\r\nNew Henry, NJ 83003', '13199072526', 'Debitis nisi non magnam maiores non. Quas et soluta aut reiciendis. Nulla ipsum autem est. Iste ut aut voluptatibus provident.', 'merchant', 'Uiwhjl0qfGaovvnMne9HaZvIddR0ynDOpZ72Kp0xkGfoygpV41evjnuJyxqT', '2024-07-06 09:04:59', '2024-07-06 10:26:28'),
(4, 'Jazmyne Stehr', 'waldo.batz@example.net', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '24020 Keith Mountain Apt. 938\nMohrstad, AK 87333', '810.709.2354', 'Nostrum sed ipsa facere exercitationem. Consequatur iusto dolorem consequatur sunt aut asperiores est.', 'merchant', 'Tpoizmz6bz', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(5, 'Elsie Romaguera III', 'mohammed.grant@example.net', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '92921 Cruickshank Glens\nDarrylstad, MS 24036', '+1-440-939-0781', 'Aut veniam dolorem in doloremque. In possimus vitae aut et dolores.', 'merchant', 'RTjpDk1Xob', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(6, 'Mrs. Eula Connelly DVM', 'mckenzie.madie@example.org', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '290 Harber Expressway\nNew Marisolton, KY 71681-8625', '+1-820-852-4957', 'Non modi rerum possimus quod ex nihil eos. Veritatis repellat iste ut enim.', 'customer', 'nw1PfYrClO', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(7, 'Mara Lindgren', 'ahauck@example.net', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '42241 Christine Track Apt. 277\nWatsicachester, GA 51355', '651.537.7284', 'Et eum laudantium molestias minus. Ex sint iusto quis qui ipsa. Nostrum suscipit animi aut sapiente qui commodi libero consequatur. Cum qui eaque nesciunt nostrum voluptatem et.', 'merchant', 'tT3rzA0Wqw', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(8, 'Shawn Blick', 'ruecker.toni@example.net', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '28451 Emily River Apt. 757\nLake Beryl, AK 10143', '1-540-340-4291', 'Dolor vel illo atque fugit fugiat quia accusamus modi. Et minima sint ratione aspernatur quo ducimus accusamus. Placeat deserunt eveniet quia possimus nisi praesentium illum.', 'customer', 'IwrZzkrBa0', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(9, 'Bernhard Ritchie', 'lrath@example.net', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '12786 Osinski Throughway Apt. 635\nO\'Harafurt, CA 14882', '+1-281-890-0893', 'Inventore voluptas explicabo quia quasi tenetur est ipsa. Hic aut omnis tempore quo repellendus doloremque. Fugit corporis minima incidunt illum id consequatur aliquam.', 'customer', 'MRV232Zdc0', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(10, 'Amaya Leannon I', 'bettie.walter@example.com', '2024-07-06 09:04:59', '$2y$12$bk0HwnACanWVRNw5b.Acq.60bKbINwkllnOWnemCK6G13ZbIG1g8C', '637 Deanna Summit\nKavonburgh, WY 86526', '+1.267.887.4550', 'Rerum voluptatum quae accusantium ut et velit. Rerum assumenda qui alias asperiores error quia natus.', 'merchant', 'UwMl6HJjE6', '2024-07-06 09:04:59', '2024-07-06 09:04:59'),
(11, 'Test customer', 'customer@example.com', '2024-07-06 09:04:59', '$2y$12$btFwwD883CZZHgcSTuVFNOAx5RUz4rNiPkfqjPat9piJGrogckE4a', 'address customer', '0812216543213', 'tes customer description', 'customer', 'PTCa6DjIHR69EiOZSYCmJZZevPe1055IOBuWr5GbPpGt826UGP6PYbd0qfwc', '2024-07-06 09:05:00', '2024-07-06 09:05:00'),
(12, 'Test merchant', 'merchant@example.com', '2024-07-06 09:05:00', '$2y$12$UcFE8gcvv31KEO4bW3fUeuKQkXQ1h4MvrT8cPgmG9jG3N2swgBRFa', 'address merchant', '0812213265463', 'tes merchant description', 'merchant', 'wNgqUXWR98JHQzueECvqSLz8WaOhcsogg54yigQ71rTT9MvNhMeAinaOoO2N', '2024-07-06 09:05:00', '2024-07-06 09:05:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
