-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2022 pada 17.54
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
-- Database: `ci4_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(12) NOT NULL,
  `nm_barang` varchar(100) DEFAULT NULL,
  `spek` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `stok` int(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `spek`, `satuan`, `stok`, `created_at`, `updated_at`) VALUES
('B-220717001', 'BUKU TIK', 'sadfdf', 'Jilid', 52, '2022-07-17 20:58:16', '2022-07-17 21:04:52'),
('B-220717002', 'BUKU JAWA', 'hjgadshgfadfd', 'Rim', 100, '2022-07-17 22:45:49', '2022-07-17 22:46:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` varchar(12) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
('BK-220717001', '2022-07-17', 'dsfsd', '2022-07-17 21:00:01', '2022-07-17 21:00:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar_detail`
--

CREATE TABLE `keluar_detail` (
  `id_keluar` varchar(12) NOT NULL,
  `id_barang` varchar(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `spek` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keluar_detail`
--

INSERT INTO `keluar_detail` (`id_keluar`, `id_barang`, `jumlah`, `spek`) VALUES
('BK-220717001', 'B-220717001', 50, 'sadfdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-04-16-064215', 'App\\Database\\Migrations\\Users', 'default', 'App', 1658065217, 1),
(2, '2022-04-16-064715', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1658065217, 1),
(3, '2022-04-16-065002', 'App\\Database\\Migrations\\Keluar', 'default', 'App', 1658065218, 1),
(4, '2022-04-16-065245', 'App\\Database\\Migrations\\KeluarDetail', 'default', 'App', 1658065218, 1),
(5, '2022-04-16-065551', 'App\\Database\\Migrations\\Suplai', 'default', 'App', 1658065218, 1),
(6, '2022-04-16-070006', 'App\\Database\\Migrations\\SuplaiDetail', 'default', 'App', 1658065219, 1),
(7, '2022-04-16-070252', 'App\\Database\\Migrations\\Web', 'default', 'App', 1658065219, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplai`
--

CREATE TABLE `suplai` (
  `id_suplai` varchar(12) NOT NULL,
  `penyuplai` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suplai`
--

INSERT INTO `suplai` (`id_suplai`, `penyuplai`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
('BM-220717001', 'PT.Sejuta Cita', '2022-07-17', 'hghggf', '2022-07-17 20:58:49', '2022-07-17 20:58:49'),
('BM-220717002', 'PT.Sejuta Cita', '2022-07-17', 'sd', '2022-07-17 21:04:52', '2022-07-17 21:04:52'),
('BM-220717003', 'PT.Sejuta Cita', '2022-07-17', 'asdfadadf', '2022-07-17 22:46:50', '2022-07-17 22:46:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplai_detail`
--

CREATE TABLE `suplai_detail` (
  `id_suplai` varchar(12) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suplai_detail`
--

INSERT INTO `suplai_detail` (`id_suplai`, `id_barang`, `jumlah`) VALUES
('BM-220717001', 'B-220717001', 100),
('BM-220717002', 'B-220717001', 2),
('BM-220717003', 'B-220717002', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(11) NOT NULL,
  `nm_user` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nm_user`, `username`, `password`, `level`, `status`, `created_at`, `updated_at`) VALUES
('AD001', 'Rico', 'admin', '$2y$10$MIzpHHsx.afZ4ocZ0G3IcuWAQNVwZ15PU8QRL2ov/7vorGYcmvbXS', 'Admin', 'Aktif', '1900-01-14 21:21:37', '2022-07-17 21:21:30'),
('AD002', 'Angga', 'akuntansi', '$2y$10$Soe3X49iGUz7zH1nU0nvyO.a06Qw6nE9KHAJNQhR48nF1sMDUaF0a', 'Operator', 'Aktif', '2022-07-17 21:24:07', '2022-07-17 21:24:07'),
('AD003', 'Rudi Berber', 'angga2', '$2y$10$0uBWruD7ANrwKRwWqmTOiePblN3dsKKvZxSOO6AzppHzfT9xp4Qoq', 'Admin', 'Aktif', '2022-07-17 21:30:13', '2022-07-17 21:30:13');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vhistory`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vhistory` (
`id_barang` varchar(12)
,`nm_barang` varchar(100)
,`jumlah` int(11)
,`id` varchar(12)
,`satuan` varchar(100)
,`created_at` datetime
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `web`
--

CREATE TABLE `web` (
  `id_web` varchar(11) NOT NULL,
  `nm_web` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `min_stok` varchar(255) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `web`
--

INSERT INTO `web` (`id_web`, `nm_web`, `alamat`, `email`, `telp`, `min_stok`, `logo`, `created_at`, `updated_at`) VALUES
('1', 'IPMB', 'Jl.Raya Bumiayu, 01/01, Kel.Bumiayu, Kab. Brebes, 52272', 'admin@gmail.com', '098765432', '2', 'logo.png', NULL, '2022-07-17 22:12:40');

-- --------------------------------------------------------

--
-- Struktur untuk view `vhistory`
--
DROP TABLE IF EXISTS `vhistory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vhistory`  AS   (select `barang`.`id_barang` AS `id_barang`,`barang`.`nm_barang` AS `nm_barang`,`suplai_detail`.`jumlah` AS `jumlah`,`suplai`.`id_suplai` AS `id`,`barang`.`satuan` AS `satuan`,`suplai`.`created_at` AS `created_at` from ((`suplai` join `suplai_detail`) join `barang`) where `suplai`.`id_suplai` = `suplai_detail`.`id_suplai` and `suplai_detail`.`id_barang` = `barang`.`id_barang`) union (select `barang`.`id_barang` AS `id_barang`,`barang`.`nm_barang` AS `nm_barang`,`keluar_detail`.`jumlah` AS `jumlah`,`keluar`.`id_keluar` AS `id`,`barang`.`satuan` AS `satuan`,`keluar`.`created_at` AS `created_at` from ((`keluar` join `keluar_detail`) join `barang`) where `keluar`.`id_keluar` = `keluar_detail`.`id_keluar` and `keluar_detail`.`id_barang` = `barang`.`id_barang`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `keluar_detail`
--
ALTER TABLE `keluar_detail`
  ADD KEY `id_keluar` (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suplai`
--
ALTER TABLE `suplai`
  ADD PRIMARY KEY (`id_suplai`);

--
-- Indeks untuk tabel `suplai_detail`
--
ALTER TABLE `suplai_detail`
  ADD PRIMARY KEY (`id_suplai`,`id_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
