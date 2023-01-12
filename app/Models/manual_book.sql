-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2022 pada 09.58
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simtaru_lampura`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `manual_book`
--

CREATE TABLE `manual_book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `manual_book`
--

INSERT INTO `manual_book` (`id`, `judul`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 'Informasi', 'public/manualbook/TnqZrtY5Jy0lizp5ynFGtmdflUkNtarUGx1mq6V7.pdf', '2022-08-11 12:37:22', '2022-08-11 12:52:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `manual_book`
--
ALTER TABLE `manual_book`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Pengajuan` ADD `titik_polygon` longtext NULL;
--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `manual_book`
--
ALTER TABLE `manual_book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
