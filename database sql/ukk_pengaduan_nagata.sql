-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2023 pada 14.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_pengaduan_nagata`
--

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
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` char(16) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_masyarakat`, `nik`, `nama`, `username`, `password`, `telp`, `deleted_at`) VALUES
(18, '113241', 'asa', 'asa', '$2y$10$pepRtcc0uf9Vw1O7p29j.eUCkA5T4FyZ99HYD/YtSz1VvA1Ge8YqW', '678679', NULL),
(19, '112432', 'dasa', 'dasa', '$2y$10$m5xDsht9ReYmVl4wDn1rsuierOxNrGWYYnalc1nSB9ByWD9VjhUuW', '534543', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','proses','selesai') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `deleted_at`) VALUES
(4, '2023-02-23', '98898', 'zzzz', NULL, 'selesai', NULL),
(5, '2023-02-23', '86857', 'return', NULL, 'selesai', NULL),
(6, '2023-02-23', '86857', 'semangat', NULL, 'selesai', NULL),
(7, '2023-02-23', '86857', 'fotonya belum bisa\r\n', NULL, 'selesai', NULL),
(8, '2023-02-23', '86857', 'dikit lagii', NULL, 'selesai', NULL),
(9, '2023-02-23', '86857', 'usaha lagi', NULL, 'selesai', NULL),
(10, '2023-02-23', '86857', 'yukk optimis', NULL, 'selesai', NULL),
(11, '2023-02-23', '86857', 'bismillah', '', '0', NULL),
(12, '2023-02-23', '86857', 'tr', '', '0', NULL),
(13, '2023-02-23', '86857', 'dd', '', 'selesai', NULL),
(14, '2023-02-23', '86857', 'ete', '', 'selesai', NULL),
(15, '2023-02-23', '11324', 'ada kebkaran', '', '0', NULL),
(16, '2023-02-23', '112432', 'lampu', '', 'selesai', NULL),
(17, '2023-02-24', '112432', 'ada apa', '', 'selesai', NULL),
(18, '2023-02-26', '112432', 'bismillah', '', '0', NULL),
(19, '2023-02-26', '112432', 'hh', '', '0', NULL),
(20, '2023-02-26', '112432', 'kahd7', '1677413384_198dfb8a1175969c0ac6.jpeg', '0', NULL),
(21, '2023-02-26', '112432', '77777', '1677413453_0453258b8646302222ab.jpg', 'selesai', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `deleted_at`) VALUES
(5, 't', 't', '$2y$10$TEwixSjED6uwGx5JnGpKTeq.QWqNA9jultQjpXxW4j5UAWz/OfF.G', '7', 'petugas', NULL),
(6, 'asaaa', 'a', '$2y$10$iBZExcAScSXDPjfHWQDp8ugW6xyGpgYP8qE8pFQN9ss2HFGqij0DO', '56868', 'admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tanggapan`
--

CREATE TABLE `tb_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `tgl_tanggapan` date DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tanggapan`
--

INSERT INTO `tb_tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `deleted_at`) VALUES
(1, 0, '2023-02-23', NULL, 5, NULL),
(2, 0, '2023-02-23', NULL, 5, NULL),
(3, 0, '2023-02-23', NULL, 5, NULL),
(4, 0, '2023-02-23', NULL, 5, NULL),
(5, 0, '2023-02-23', NULL, 5, NULL),
(6, 0, '2023-02-23', NULL, 5, NULL),
(7, 4, '2023-02-23', NULL, 5, NULL),
(8, 5, '2023-02-23', NULL, 5, NULL),
(9, 6, '2023-02-23', NULL, 5, NULL),
(10, 7, '2023-02-23', 'ASSA', 5, NULL),
(11, 8, '2023-02-23', 'ayoo semangat', 5, NULL),
(13, 9, '2023-02-23', 'yukk bisa', 5, NULL),
(14, 10, '2023-02-23', 'ayolahh', 5, NULL),
(15, 14, '2023-02-23', 'asa', 5, NULL),
(16, 13, '2023-02-23', 'ya', 5, NULL),
(17, 16, '2023-02-23', 'asa', 5, NULL),
(18, 17, '2023-02-24', 'yaa', 5, NULL),
(19, 21, '2023-02-26', '7y7a7', 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_tanggapan`
--
ALTER TABLE `tb_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
