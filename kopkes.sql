-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2022 pada 10.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

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
-- Struktur dari tabel `log_transaksi`
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
-- Stand-in struktur untuk tampilan `master_anggota`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `master_anggota` (
`no_rek` bigint(20)
,`no_anggota` varchar(10)
,`nm_lengkap` char(50)
,`saldo` double
,`debit` double
,`kredit` double
,`simpok` double
,`simwa` double
,`simka` double
,`dagoro` double
,`sts_pinjam` char(10)
,`tgl_update` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
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
-- Struktur dari tabel `tb_anggota`
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
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `no_anggota`, `nik`, `nip`, `nm_depan`, `nm_belakang`, `nm_lengkap`, `tp_lahir`, `tgl_lahir`, `sts_kawin`, `alamat`, `no_hp`, `instansi`, `no_rek`, `d_reg`, `sts_anggota`) VALUES
(24, 'M-20224900', '1001881008100880', 0, 'ahmad', 'Malawi', 'Ahmad Malawi', 'Ujong Bate', '2022-02-09', 'Kawin', 'Batoh', '08667599577703', 'Kesehatan', 1645512743, '0000-00-00 00:00:00', 'Aktif'),
(25, 'M-20225550', '1021278367126381', 1212112121212121, 'Muhammad', 'Ilham', 'Muhammad Ilham', 'lampenertut', '', 'Kawin', 'banda aceh', '022243254456', 'kesehatan', 1645513403, '2022-02-22 08:35:45', 'Aktif'),
(26, 'M-20223250', '5652355754555222', 0, 'Ziaul', 'Kamal', 'Ziaul Kamal', 'awdawdawd', '2022-03-16', 'Kawin', 'awdwadadad', '78787354678943', 'Dinas Rumah Sakit', 1646902969, '2022-03-09 17:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_angsuran`
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
-- Struktur dari tabel `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_instansi` varchar(10) NOT NULL,
  `nm_instansi` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
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

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`no_rek`, `saldo`, `debit`, `kredit`, `simpok`, `simwa`, `simka`, `dagoro`, `sts_pinjam`, `tgl_update`) VALUES
(1646902969, 0, 0, 0, 0, 0, 0, 0, 'Belum Ada', '2009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_simpanan`
--

CREATE TABLE `tb_simpanan` (
  `trx_simpan` varchar(20) NOT NULL,
  `no_anggota` varchar(10) NOT NULL,
  `jml_simpan` double NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_simpan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_simpanan`
--

INSERT INTO `tb_simpanan` (`trx_simpan`, `no_anggota`, `jml_simpan`, `keterangan`, `tgl_simpan`) VALUES
('', 'M-20223250', 5000000, 'awdwadwadawd', '2022-03-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
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

-- --------------------------------------------------------

--
-- Struktur untuk view `master_anggota`
--
DROP TABLE IF EXISTS `master_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_anggota`  AS SELECT `tb_anggota`.`no_rek` AS `no_rek`, `tb_anggota`.`no_anggota` AS `no_anggota`, `tb_anggota`.`nm_lengkap` AS `nm_lengkap`, `tb_rekening`.`saldo` AS `saldo`, `tb_rekening`.`debit` AS `debit`, `tb_rekening`.`kredit` AS `kredit`, `tb_rekening`.`simpok` AS `simpok`, `tb_rekening`.`simwa` AS `simwa`, `tb_rekening`.`simka` AS `simka`, `tb_rekening`.`dagoro` AS `dagoro`, `tb_rekening`.`sts_pinjam` AS `sts_pinjam`, `tb_rekening`.`tgl_update` AS `tgl_update` FROM (`tb_anggota` join `tb_rekening` on(`tb_anggota`.`no_rek` = `tb_rekening`.`no_rek`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `no_anggota` (`no_anggota`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD UNIQUE KEY `trx_angsuran` (`trx_angsuran`);

--
-- Indeks untuk tabel `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD UNIQUE KEY `id_instansi` (`id_instansi`);

--
-- Indeks untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD UNIQUE KEY `no_rek` (`no_rek`);

--
-- Indeks untuk tabel `tb_simpanan`
--
ALTER TABLE `tb_simpanan`
  ADD UNIQUE KEY `trx_simpan` (`trx_simpan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD UNIQUE KEY `no_anggota` (`no_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
