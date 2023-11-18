-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2020 pada 21.21
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
(20, '2804200001', 100000, 'debit', 1, '2020-04-28 16:26:36', 'HASHDAS'),
(21, '0105200001', 200000, 'debit', 2, '2020-04-30 17:47:28', 'Sumbangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` varchar(40) NOT NULL,
  `url` text NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `url`, `ket`, `created_at`) VALUES
('1234567890123456', '1234567890123456.png', '1234567890123456', '2020-05-06 02:43:35');

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
(5, 'Sumbangan Musolah', '2020-05-05', '2020-05-20'),
(6, 'Tempat Sampah', '2020-05-07', '2020-05-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_pemuda`
--

CREATE TABLE `kas_pemuda` (
  `id_keuangan` int(11) NOT NULL,
  `no_keuangan` varchar(10) NOT NULL,
  `nilai_keuangan` bigint(20) NOT NULL,
  `jenis_keuangan` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas_pemuda`
--

INSERT INTO `kas_pemuda` (`id_keuangan`, `no_keuangan`, `nilai_keuangan`, `jenis_keuangan`, `created_by`, `created_at`, `catatan`) VALUES
(1, '0105200002', 200000, 'debit', 2, '2020-04-30 17:48:40', 'Sumbangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `title` text NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_user` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_tipe` int(11) NOT NULL,
  `log_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`log_id`, `log_user`, `log_time`, `log_tipe`, `log_desc`) VALUES
(309, 1, '2020-06-02 21:49:59', 0, 'Melakukan Login'),
(310, 1, '2020-06-02 21:56:45', 0, 'Melakukan Login'),
(311, 1, '2020-06-03 14:06:41', 0, 'Melakukan Login'),
(312, 1, '2020-06-07 04:05:32', 1, 'Melakukan Logout'),
(313, 1, '2020-06-07 04:05:35', 0, 'Melakukan Login');

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
(10, 'Administrasi <span class=\"badge badge-sm badge-danger\">Pro</span>', 'file-text', 'Administrasi', 0, 1),
(11, 'Pengaturan', 'sliders', 'pengaturan', 0, 1),
(12, 'User Aktif', 'users', 'user', 0, 1),
(13, 'Dashboard', 'home', 'Dashboard', 0, 2),
(15, 'Data Penduduk', 'slack', 'Data_Penduduk', 0, 2),
(18, 'Data Pemuda', 'aperture', 'Data_Pemuda', 0, 2),
(19, 'Keuangan', 'dollar-sign', 'Keuangan', 0, 2),
(20, 'Kegiatan', 'calendar', 'kegiatan', 0, 2),
(21, 'Dashboard', 'home', 'Dashboard', 0, 3),
(23, 'Data Penduduk', 'slack', 'Data_Penduduk', 0, 3),
(25, 'Data Pemuda', 'aperture', 'Data_Pemuda', 0, 3),
(27, 'Kegiatan', 'calendar', 'kegiatan', 0, 3);

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
  `no_rumah` varchar(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `no_kk`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `pendidikan`, `status_perkawinan`, `status_keluarga`, `foto`, `status`, `no_rumah`, `created_by`, `update_by`, `deleted_by`, `created_at`, `update_at`) VALUES
(1, '1283918237789188', '1234567890123456', 'Ahmad Fatoni', 'Serang', '1997-08-20', 'Laki-Laki', 'Islam', 'Buruh', 'S1', 1, '1', '1283918237789188.jpg', 'Hidup', NULL, 1, 1, 0, '2020-04-25 02:55:06', '0000-00-00 00:00:00'),
(2, '123456789012344', '1234567890123456', 'TIA', 'Cilegon', '1997-08-20', 'Perempuan', 'Islam', 'Buruh', 'SD/Sederajat', 1, '2', '123456789012344.jpg', 'Hidup', NULL, 1, 1, 0, '2020-05-05 19:14:35', '2020-05-09 13:35:54'),
(3, '3604190802970001', '54254348787', 'Moh. Masdiki', 'serang', '2015-06-02', 'Laki-Laki', 'Islam', 'Buruh', 'S1', 0, '4', '', 'Hidup', NULL, 1, NULL, NULL, '2020-06-03 07:16:14', '2020-06-03 07:16:14');

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
(14, 1, 10, 1, '2020-04-28', '2020-05-03'),
(19, 7, 11, 1, '2020-04-28', '2020-05-03'),
(20, 1, 10, 1, '2020-05-03', '2020-05-03'),
(21, 1, 10, 2, '2020-05-03', '2020-05-03');

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
(5, 5, 20000, 1, '2020-05-03', 1, '2020-05-03 19:15:09'),
(6, 6, 100000, 1, '2020-05-01', 1, '2020-05-03 19:16:59'),
(7, 6, 50000, 1, '2020-05-03', 1, '2020-05-03 19:17:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_aktif`
--

CREATE TABLE `user_aktif` (
  `id_ua` int(11) NOT NULL,
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

INSERT INTO `user_aktif` (`id_ua`, `id_user`, `username`, `email`, `password`, `id_level`, `status`) VALUES
(1, 1, 'admin', 'achmad.fatoni33@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Aktif'),
(2, 1, 'user', 'admin@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 'Aktif'),
(3, 2, 'admin1', 'saiyahsakata@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'Aktif');

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
(2, 'Pemuda', 'pemuda'),
(3, 'Warga', 'warga');

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
-- Indeks untuk tabel `kas_pemuda`
--
ALTER TABLE `kas_pemuda`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

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
-- Indeks untuk tabel `user_aktif`
--
ALTER TABLE `user_aktif`
  ADD PRIMARY KEY (`id_ua`);

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
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_sumbangan_warga`
--
ALTER TABLE `jenis_sumbangan_warga`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kas_pemuda`
--
ALTER TABLE `kas_pemuda`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pemuda`
--
ALTER TABLE `pemuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pinjaman_barang`
--
ALTER TABLE `pinjaman_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sumbangan_warga`
--
ALTER TABLE `sumbangan_warga`
  MODIFY `id_sumbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_aktif`
--
ALTER TABLE `user_aktif`
  MODIFY `id_ua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
