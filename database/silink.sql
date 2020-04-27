-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2020 pada 16.01
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
-- Struktur dari tabel `bendahara_warga`
--

CREATE TABLE `bendahara_warga` (
  `id_keuangan` int(11) NOT NULL,
  `no_keuangan` varchar(10) NOT NULL,
  `nilai_keuangan` bigint(20) NOT NULL,
  `jenis_keuangan` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bendahara_warga`
--

INSERT INTO `bendahara_warga` (`id_keuangan`, `no_keuangan`, `nilai_keuangan`, `jenis_keuangan`, `created_by`, `created_at`, `catatan`) VALUES
(16, '2104200001', 200000, 'debit', 1, '2020-04-25 15:27:34', 'Baru'),
(17, '2204200001', 30000, 'credit', 1, '2020-04-22 03:27:47', 'Sumbangan\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_barang`, `satuan`, `jumlah`, `status`) VALUES
(1, 'Kursi', 'Unit', 30, 'Ada'),
(7, 'Sendok', 'Lusin', 20, 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sumbangan_warga`
--

CREATE TABLE `jenis_sumbangan_warga` (
  `id_jenis` int(11) NOT NULL,
  `nama_sumbangan` text NOT NULL,
  `mulai_sumbangan` date NOT NULL,
  `selesai_sumbangan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_sumbangan_warga`
--

INSERT INTO `jenis_sumbangan_warga` (`id_jenis`, `nama_sumbangan`, `mulai_sumbangan`, `selesai_sumbangan`) VALUES
(4, 'Sumbangan Musolah', '2020-04-20', '2020-04-24'),
(5, 'Kursi Musolah', '2020-04-24', '2020-04-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
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
(6, 'Data Pemuda', '', 'Data_Pemuda', 5, 1),
(7, 'Keuangan', 'dollar-sign', 'Keuangan', 0, 1),
(8, 'Sumbangan Warga', 'archive', 'Sumbangan', 0, 1),
(9, 'Inventaris Warga', 'briefcase', 'Inventaris', 0, 1),
(10, 'Administrasi <h6><span class=\"badge badge-warning\">Coming Soon</span></h6>', 'file-text', 'Administrasi', 0, 1),
(11, 'Pengaturan', 'sliders', 'pengaturan', 0, 1),
(12, 'User Aktif', 'users', 'user', 0, 1),
(13, 'Dashboard', 'home', 'Dashboard', 0, 2),
(14, 'Kependudukan', 'slack', '#', 0, 2),
(15, 'Data Penduduk', '', 'Data_Penduduk', 14, 2),
(16, 'Keluarga', '', 'Keluarga', 14, 2),
(17, 'Kepemudaan', 'aperture', '#', 0, 2),
(18, 'Data Pemuda', '', 'Data_Pemuda', 17, 2),
(19, 'Keuangan', 'dollar-sign', 'Keuangan', 0, 2),
(20, 'Sumbangan Warga', 'archive', 'Sumbangan', 0, 2),
(21, 'Inventaris Warga', 'briefcase', 'Inventaris', 0, 2),
(22, 'Administrasi <h6><span class=\"badge badge-warning\">Coming Soon</span></h6>', 'file-text', 'Administrasi', 0, 2);

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
(3, 1, '1'),
(6, 2, '3');

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
(1, '1283918237789188', '1234567890123456', 'Ahmad Fatoni', 'Serang', '1997-08-20', 'Laki-Laki', 'Islam', 'Buruh', 'S1', 1, '1', '1283918237789188.jpg', 'Hidup', 1, 1, 0, '2020-04-25 09:55:06', '0000-00-00 00:00:00'),
(2, '123456789012344', '1234567890123456', 'Saiyah', 'Cilegon', '1997-08-20', 'Perempuan', 'Islam', 'Buruh', 'SD/Sederajat', 1, '2', '123456789012344.jpeg', 'Hidup', 1, 1, 0, '2020-04-25 09:49:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan_website`
--

CREATE TABLE `pengaturan_website` (
  `id` int(11) NOT NULL,
  `nama_lingkungan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `prov` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `kel` varchar(30) NOT NULL,
  `id_rt` int(11) NOT NULL,
  `lokasi_maps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan_website`
--

INSERT INTO `pengaturan_website` (`id`, `nama_lingkungan`, `alamat`, `rt`, `rw`, `prov`, `kota`, `kec`, `kel`, `id_rt`, `lokasi_maps`) VALUES
(1, 'Legok Assalam', 'Jl. Raya Cilegon Km. 04', 2, 11, 'Banten', 'Serang', 'Taktakan', 'Drangong', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman_barang`
--

CREATE TABLE `pinjaman_barang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman_barang`
--

INSERT INTO `pinjaman_barang` (`id`, `id_barang`, `jumlah_barang`, `id_penduduk`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 1, 30, 1, '2020-04-25', '2020-04-26'),
(2, 7, 20, 1, '2020-04-26', '2020-04-26'),
(4, 1, 30, 1, '2020-04-26', '2020-04-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumbangan_warga`
--

CREATE TABLE `sumbangan_warga` (
  `id_sumbangan` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nilai_sumbangan` int(11) NOT NULL,
  `sumbangan_dari` int(11) NOT NULL,
  `tanggal_sumbangan` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumbangan_warga`
--

INSERT INTO `sumbangan_warga` (`id_sumbangan`, `id_jenis`, `nilai_sumbangan`, `sumbangan_dari`, `tanggal_sumbangan`, `created_by`, `created_at`) VALUES
(1, 4, 200000, 1, '2020-04-23', 1, '2020-04-23 19:51:22'),
(2, 4, 100000, 1, '2020-04-24', 1, '2020-04-25 22:27:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_aktif`
--

CREATE TABLE `user_aktif` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_aktif`
--

INSERT INTO `user_aktif` (`id_user`, `username`, `email`, `password`, `id_level`, `status`) VALUES
(1, 'admin', 'achmad.fatoni33@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Aktif'),
(1, 'admin123', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Aktif'),
(2, 'admin1', '', '21232f297a57a5a743894a0e4a801fc3', 2, 'Aktif');

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
(1, 'Administrator', 'admin'),
(2, 'Pemuda', 'pemuda');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bendahara_warga`
--
ALTER TABLE `bendahara_warga`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_sumbangan_warga`
--
ALTER TABLE `jenis_sumbangan_warga`
  ADD PRIMARY KEY (`id_jenis`);

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
-- Indeks untuk tabel `pinjaman_barang`
--
ALTER TABLE `pinjaman_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sumbangan_warga`
--
ALTER TABLE `sumbangan_warga`
  ADD PRIMARY KEY (`id_sumbangan`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bendahara_warga`
--
ALTER TABLE `bendahara_warga`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_sumbangan_warga`
--
ALTER TABLE `jenis_sumbangan_warga`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pemuda`
--
ALTER TABLE `pemuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pinjaman_barang`
--
ALTER TABLE `pinjaman_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sumbangan_warga`
--
ALTER TABLE `sumbangan_warga`
  MODIFY `id_sumbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
