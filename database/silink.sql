-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2020 pada 19.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silink`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `level_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `icon`, `link`, `sub_menu`, `level_menu`) VALUES
(1, 'Dashboard', 'home', 'Dashboard', 0, 1),
(2, 'Kependudukan', 'slack', '#', 0, 1),
(3, 'Data Penduduk', '', 'Data_Penduduk', 2, 1),
(4, 'Keluarga', '', 'Keluarga', 2, 1),
(5, 'Kepemudaan', 'aperture', '#', 0, 1),
(6, 'Data Pemuda', '', 'Data_Pemuda', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemuda`
--

CREATE TABLE `pemuda` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemuda`
--

INSERT INTO `pemuda` (`id`, `id_penduduk`, `jabatan`) VALUES
(1, 1, 'Sekretaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `status_perkawinan` int(11) NOT NULL,
  `status_keluarga` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `no_kk`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `pendidikan`, `status_perkawinan`, `status_keluarga`, `foto`, `status`, `created_by`, `update_by`, `deleted_by`, `created_at`, `update_at`) VALUES
(1, '1283918237789188', '1234567890123456', 'Ahmad Fatoni', 'Serang', '1997-08-20', 'Laki-Laki', 'Islam', 'Buruh', 'SMA/Sederajat', 1, '1', '1283918237789188.jpg', 'Hidup', 1, 1, 0, '2020-04-17 15:04:15', '0000-00-00 00:00:00'),
(2, '123456789012344', '1234567890123456', 'Saiyah', 'Cilegon', '1997-08-20', 'Perempuan', 'Islam', 'Buruh', 'SD/Sederajat', 1, '2', '123456789012344.jpg', 'Hidup', 1, 1, 0, '2020-04-17 15:05:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_aktif`
--

CREATE TABLE `user_aktif` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_aktif`
--

INSERT INTO `user_aktif` (`id_user`, `username`, `email`, `password`, `id_level`) VALUES
(1, 'admin', 'achmad.fatoni33@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(35) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`id_akses`, `nama_akses`, `link`) VALUES
(1, 'Administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemuda`
--
ALTER TABLE `pemuda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_aktif`
--
ALTER TABLE `user_aktif`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemuda`
--
ALTER TABLE `pemuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
