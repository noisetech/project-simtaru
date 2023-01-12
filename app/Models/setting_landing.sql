-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2022 pada 10.01
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
-- Struktur dari tabel `setting_landing`
--

CREATE TABLE `setting_landing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting_landing`
--

INSERT INTO `setting_landing` (`id`, `key`, `judul`, `value`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'gambar_utama', 'Sistem Informasi Tata Ruang', 'Kabupaten Lampung Utara', 'public/landing/u4jBFzooXhtoBMZD2cL0UD9oNRaEbakbV11iz1wa.jpg', '2022-08-10 20:30:31', '2022-08-10 23:28:19'),
(2, 'title_ringkasan', 'sSIMTARU LAMPURA', 'Sistem Informasi Tata Ruang Kabupaten Lampung Utara', '-', '2022-08-10 20:30:31', '2022-08-10 23:22:35'),
(3, 'ringkasan', '.', 'Merupakan sebuah aplikasi yang digunakan untuk pemerintah daerah untuk menampilkan informasi aktifitas perencanaan, pemanfaatan dan pengendalian tata ruang wilayah. Aplikasi simtaru dapat dimanfaatkan oleh masyarakat dan para pelaku usaha untuk meningkatkan kegiatan dengan rencana tata ruang. Aplikasi ini juga sebagai bagian keterbukaan informasi publik yang dilakukan oleh pemerintah daerah.', '-', '2022-08-10 20:30:31', '2022-08-10 20:30:31'),
(4, 'judul_alur', 'mekanisme', 'Proses Pengajuan', '-', '2022-08-10 20:30:31', '2022-08-10 20:57:32'),
(5, 'alur1', '1. PENGAJUAN', 'Isi form pengajuan sesuai dengan ketentuan yang sudah di tetapkan', 'public/landing/EswemL3Nq87Uus3B9fO7mSFSHyE8ECPZg7zkf5er.jpg', '2022-08-10 20:30:31', '2022-08-10 23:53:56'),
(6, 'alur2', '2. verifikasi berkas', 'Sekeretariat TKPRD akan memverifikasi file yang telah diajukan oleh pemohon', 'public/landing/fWBbpkesDNlhU27vdZZnPJmYXexVEKGF4m3RAvXW.png', '2022-08-10 20:30:31', '2022-08-10 23:55:35'),
(7, 'alur3', ' 3. verifikasi lapangan', 'Pokja PRPPR akan melakukan verifikasi lapangan guna menyesuaikan dengan pengajuan yang telah diajukan', 'public/landing/UTeo36gZeKOIZQL6QtATYxla8WrxKDW772nur84g.png', '2022-08-10 20:30:31', '2022-08-10 23:59:43'),
(8, 'alur4', ' 4. PERSETUJUAN KETUA DINAS PUPR', 'Ketua Dinas PUPR menyetujui pengajuan', 'public/landing/CzcXTDF5RZJcxb3LOTtvcqpEwTItgZHXDCY70dJm.png', '2022-08-10 20:30:31', '2022-08-11 00:00:14'),
(9, 'alur5', ' 5. PERSETUJUAN KEPALA POKJA', 'Kepala Pokja TKPRD menyetujui pengajuan', 'public/landing/KpyA87jPjpwL41BkH4sMSzF7EBlEYGELPiSE9TQn.png', '2022-08-10 20:30:31', '2022-08-11 00:00:24'),
(10, 'alur6', '6. SURAT REKOMENDASI', 'Kepala Pokja TKPRD menyetujui pengajuan', 'public/landing/NrA8ny4RO9WoWSkVQcMZJKOgLrpA6F7U07Eh5CMW.png', '2022-08-10 20:30:31', '2022-08-10 23:42:48'),
(11, 'deskripsi', 'Deskripsi', 'Menu', '-', '2022-08-10 20:30:31', '2022-08-10 20:30:31'),
(12, 'menu1', 'Pengajuan', 'Menu pengajuan ditujukan pada masnyarakat yang akan melakukan pengajuan izin memdirikan bangunan pada suatu lahan dengan ketentuan yang sudah ada pada form pengajuan.', 'public/landing/PpGLk5Bx9rKcxg0vrptWVI38YChfVO7QTH4Tql1K.svg', '2022-08-10 20:30:31', '2022-08-10 23:41:23'),
(13, 'menu2', 'Informasi', 'Menu informasi pengajuan berguna untuk melihat status dari berkas yang telah diajukan oleh masyarakat.', 'public/landing/XsOElkis82PUQghqxuVxgnYTTDt1iSj3W2ZvpfhT.svg', '2022-08-10 20:30:31', '2022-08-10 23:41:31'),
(14, 'menu3', 'Peta', 'Menu peta bertujuan untuk menampilkan lokasi pengajuan yang telah disetujui.', 'public/landing/CYC2anz3SxkGyfjDnNO5giYgUSNiDxmCj2L76bhV.svg', '2022-08-10 20:30:31', '2022-08-10 23:41:40'),
(15, 'menu4', 'Manual Book', 'Menu manual book bertujuan untuk memandu pengguna tentang penggunaan website Sistem Informasi Tata Ruang Lampung Utara.', 'public/landing/BCvYQuDnlYeKSea3uKMDBd2yWF57162HbBfaMmUl.svg', '2022-08-10 20:30:31', '2022-08-10 23:41:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `setting_landing`
--
ALTER TABLE `setting_landing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_landing_key_unique` (`key`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `setting_landing`
--
ALTER TABLE `setting_landing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
