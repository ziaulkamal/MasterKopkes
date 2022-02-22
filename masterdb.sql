-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 02:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopkes`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_transaksi`
--

CREATE TABLE `log_transaksi` (
  `id_log` bigint(20) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `jenis_trx` char(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama_app` varchar(30) NOT NULL,
  `versi_app` varchar(5) NOT NULL,
  `modul` tinyint(4) NOT NULL,
  `conf_sts` tinyint(4) NOT NULL,
  `zona_waktu` varchar(150) NOT NULL,
  `set_petugas` tinyint(4) NOT NULL,
  `modul_active` text NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(5) NOT NULL,
  `no_anggota` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `nm_depan` char(30) NOT NULL,
  `nm_belakang` char(30) NOT NULL,
  `nm_lengkap` char(50) NOT NULL,
  `tp_lahir` char(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `sts_kawin` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `instansi` char(30) NOT NULL,
  `no_rek` bigint(20) NOT NULL,
  `d_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sts_anggota` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `no_anggota`, `nik`, `nip`, `nm_depan`, `nm_belakang`, `nm_lengkap`, `tp_lahir`, `tgl_lahir`, `sts_kawin`, `alamat`, `no_hp`, `instansi`, `no_rek`, `d_reg`, `sts_anggota`) VALUES
(24, 'M-20224900', '1001881008100880', 0, 'ahmad', 'Malawi', 'Ahmad Malawi', 'Ujong Bate', '2022-02-09', 'Kawin', 'Batoh', '08667599577703', 'Kesehatan', 1645512743, '0000-00-00 00:00:00', 'Aktif'),
(25, 'M-20225550', '1021278367126381', 1212112121212121, 'Muhammad', 'Ilham', 'Muhammad Ilham', 'lampenertut', '', 'Kawin', 'banda aceh', '022243254456', 'kesehatan', 1645513403, '2022-02-22 08:35:45', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `trx_angsuran` varchar(20) NOT NULL,
  `no_anggota` varchar(10) NOT NULL,
  `jml_angsuran` double NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_angsuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_instansi` varchar(10) NOT NULL,
  `nm_instansi` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `no_rek` bigint(20) NOT NULL,
  `saldo` double NOT NULL,
  `debit` double NOT NULL,
  `kredit` double NOT NULL,
  `simpok` double NOT NULL,
  `simwa` double NOT NULL,
  `simka` double NOT NULL,
  `dagoro` double NOT NULL,
  `sts_pinjam` char(10) NOT NULL,
  `tgl_update` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan`
--

CREATE TABLE `tb_simpanan` (
  `trx_simpan` varchar(20) NOT NULL,
  `no_anggota` varchar(10) NOT NULL,
  `jml_simpan` double NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_simpan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_trx` varchar(20) NOT NULL,
  `no_anggota` varchar(10) NOT NULL,
  `jml_pinjaman` double NOT NULL,
  `tenor` tinyint(4) NOT NULL,
  `total_angsuran` double NOT NULL,
  `anggsuran_ke` tinyint(4) NOT NULL,
  `sts_trx` varchar(10) NOT NULL,
  `tgl_trx` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_transaksi`
--
ALTER TABLE `log_transaksi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `no_anggota` (`no_anggota`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD UNIQUE KEY `trx_angsuran` (`trx_angsuran`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD UNIQUE KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD UNIQUE KEY `no_rek` (`no_rek`);

--
-- Indexes for table `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  ADD UNIQUE KEY `trx_simpan` (`trx_simpan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD UNIQUE KEY `no_anggota` (`no_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_transaksi`
--
ALTER TABLE `log_transaksi`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
