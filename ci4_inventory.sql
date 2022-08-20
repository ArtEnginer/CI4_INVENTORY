-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2022 pada 16.13
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
  `status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_musnah`
--

CREATE TABLE `barang_musnah` (
  `id_barang_musnah` varchar(12) NOT NULL,
  `id_barang` varchar(12) DEFAULT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplai_detail`
--

CREATE TABLE `suplai_detail` (
  `id_suplai` varchar(12) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('AD001', 'Rico', 'admin', '$2y$10$Bkuh0KCRSYiWjOUn6SLNCe0HCPi3jhsfuK8LA28PfG37jm38ynkyK', 'Admin', 'Aktif', NULL, NULL);

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
('1', 'IMS-Item Management System', 'Jl.Raya Bumiayu, 01/01, Kel.Bumiayu, Kab. Brebes, 52272', 'admin@gmail.com', '098765432', '2', 'logo.png', NULL, NULL);

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
-- Indeks untuk tabel `barang_musnah`
--
ALTER TABLE `barang_musnah`
  ADD PRIMARY KEY (`id_barang_musnah`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
