-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2022 at 07:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopkes_revisi`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `anggota_master_data`
-- (See below for the actual view)
--
CREATE TABLE `anggota_master_data` (
`no_anggota` varchar(30)
,`nama_anggota` varchar(50)
,`nama_instansi` varchar(30)
,`no_rekening` varchar(30)
,`total_simpanan` double
,`status_pinjaman` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `log_anggota_keluar`
--

CREATE TABLE `log_anggota_keluar` (
  `id_log` int(11) NOT NULL,
  `no_anggota` varchar(30) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `s_pokok` double NOT NULL,
  `s_wajib` double NOT NULL,
  `s_khusus` double NOT NULL,
  `s_lain` double NOT NULL,
  `pengembalian_simpanan` double NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `log_angsuran_anggota`
-- (See below for the actual view)
--
CREATE TABLE `log_angsuran_anggota` (
`kode` varchar(15)
,`pinjaman` varchar(15)
,`nama` varchar(50)
,`angsuran_ke` varchar(10)
,`pokok` double
,`margin` double
,`keterangan` text
,`tgl_update` date
);

-- --------------------------------------------------------

--
-- Table structure for table `log_operasional`
--

CREATE TABLE `log_operasional` (
  `id` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `jenis` tinyint(4) NOT NULL,
  `keterangan` text NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_penglolaan_dana`
--

CREATE TABLE `log_penglolaan_dana` (
  `id` int(11) NOT NULL,
  `jenis_dana` varchar(30) NOT NULL,
  `kode_dana` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `dana_sosial` int(11) NOT NULL,
  `anggota_id` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_transaksi_anggota`
--

CREATE TABLE `log_transaksi_anggota` (
  `id` int(5) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `kode_log` varchar(25) NOT NULL,
  `jumlah` double NOT NULL,
  `kode_jenis` varchar(1) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_kolektif`
--

CREATE TABLE `master_kolektif` (
  `id_master` varchar(35) NOT NULL,
  `tahun_neraca` int(4) NOT NULL,
  `akumulasi_kas` double NOT NULL,
  `dana_simpok` double NOT NULL,
  `dana_simwa` double NOT NULL,
  `dana_khusus` double NOT NULL,
  `dana_lainya` double NOT NULL,
  `dana_gotongroyong` double NOT NULL,
  `total_piutang` double NOT NULL,
  `jasa_simpanan` double NOT NULL,
  `jasa_usaha` double NOT NULL,
  `dana_cadangan` double NOT NULL,
  `dana_pengurus` double NOT NULL,
  `dana_pendidikan` double NOT NULL,
  `dana_kes_pegawai` double NOT NULL,
  `dana_sosial` double NOT NULL,
  `dana_audit` double NOT NULL,
  `dana_pembangunan` double NOT NULL,
  `dana_penghapusan` double NOT NULL,
  `neraca_usaha` double NOT NULL,
  `neraca_simpanan` double NOT NULL,
  `neraca_cadangan` double NOT NULL,
  `neraca_pengurus` double NOT NULL,
  `neraca_kesejahteraan` double NOT NULL,
  `neraca_pendidikan` double NOT NULL,
  `neraca_sosial` double NOT NULL,
  `neraca_audit` double NOT NULL,
  `neraca_pembangunan` double NOT NULL,
  `persentase_jasa_usaha` double NOT NULL,
  `persentase_jasa_simpanan` double NOT NULL,
  `akumulasi_margin` double NOT NULL,
  `akumulasi_lain` double NOT NULL,
  `biaya_atk` double NOT NULL,
  `biaya_honor` double NOT NULL,
  `biaya_rat` double NOT NULL,
  `biaya_lebaran` double NOT NULL,
  `biaya_penghapusan` double NOT NULL,
  `akumulasi_operasional` double NOT NULL,
  `akumulasi_shu_kotor` double NOT NULL,
  `akumulasi_shu_bersih` double NOT NULL,
  `akumulasi_zakat` double NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_view_anggota`
-- (See below for the actual view)
--
CREATE TABLE `master_view_anggota` (
`no` varchar(30)
,`nama` varchar(50)
,`instansi` varchar(30)
,`status` tinyint(4)
,`terdaftar` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_view_anggota_all`
-- (See below for the actual view)
--
CREATE TABLE `master_view_anggota_all` (
`no` varchar(30)
,`nama` varchar(50)
,`nik` varchar(20)
,`nip` varchar(20)
,`lahir` varchar(20)
,`tanggal` date
,`alamat` text
,`instansi` varchar(30)
,`status` tinyint(4)
,`terdaftar` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_view_pinjaman`
-- (See below for the actual view)
--
CREATE TABLE `master_view_pinjaman` (
`id` int(11)
,`kode` varchar(15)
,`no_rekening` varchar(11)
,`nama` varchar(50)
,`plafon` double
,`tenor` int(11)
,`margin` double
,`pokok` double
,`gotong_royong` double
,`ke` int(11)
,`sisa_angsuran` double
,`tgl_pengajuan` date
,`last_update` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `master_view_rekening`
-- (See below for the actual view)
--
CREATE TABLE `master_view_rekening` (
`no` varchar(30)
,`nama` varchar(50)
,`pokok` double
,`wajib` double
,`kusus` double
,`lain` double
,`total` double
,`status` int(11)
,`update_terakhir` date
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(30) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `instansi` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `kode_angsuran` varchar(15) NOT NULL,
  `kode_pinjaman` varchar(15) NOT NULL,
  `no_anggota` varchar(11) NOT NULL,
  `angsuran_ke` varchar(10) NOT NULL,
  `angsuran_pokok` double NOT NULL,
  `angsuran_margin` double NOT NULL,
  `keterangan` text NOT NULL,
  `status_pinjaman` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_angsuran`
--

INSERT INTO `tb_angsuran` (`kode_angsuran`, `kode_pinjaman`, `no_anggota`, `angsuran_ke`, `angsuran_pokok`, `angsuran_margin`, `keterangan`, `status_pinjaman`, `last_update`) VALUES
('A-1654507827', 'P-1654507823', '0101', '1', 416667, 33333, 'Sudah melakukan pembayaran Angsuran Bulanan', 1, '2022-06-06'),
('A-1654519594', 'P-1654519585', '0137', '1', 3750000, 300000, 'Sudah melakukan pembayaran Angsuran Bulanan', 1, '2022-06-06'),
('A-1654522057', 'P-1654519649', '0137', '1', 1666667, 133333, 'Sudah melakukan pembayaran Angsuran Bulanan', 1, '2022-06-06'),
('C-1654507255', 'P-1654506980', '0111', 'Lunas', 24999996, 208333, 'Sudah melakukan pembayaran Angsuran dari dana gotong royong', 0, '2022-06-06'),
('C-1654507539', 'P-1654507522', '0121', 'Lunas', 15000000, 100000, 'Sudah melakukan pembayaran Angsuran dari dana gotong royong', 0, '2022-06-06'),
('C-1654507865', 'P-1654507823', '0101', 'Lunas', 4583337, 33333, 'Sudah melakukan pembayaran Angsuran dari dana gotong royong', 0, '2022-06-06'),
('L-1654519615', 'P-1654519585', '0137', 'Lunas', 41250000, 300000, 'Sudah Berhasil melunaskan Angsuran', 0, '2022-06-06'),
('L-1654522379', 'P-1654519649', '0137', 'Lunas', 18333337, 133333, 'Sudah Berhasil melunaskan Angsuran', 0, '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bht`
--

CREATE TABLE `tb_bht` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(30) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `total_simpanan` double NOT NULL,
  `total_margin` double NOT NULL,
  `persen_jasa_usaha` double NOT NULL,
  `persen_jasa_simpanan` double NOT NULL,
  `total_diserahkan` double NOT NULL,
  `sisa_pembagian` double NOT NULL,
  `sudah_diserahkan` tinyint(4) NOT NULL,
  `last_update` date NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_brangkas`
--

CREATE TABLE `tb_brangkas` (
  `kas` double NOT NULL,
  `dana_gotongroyong` double NOT NULL,
  `dana_simpok` double NOT NULL,
  `dana_simwa` double NOT NULL,
  `dana_kusus` double NOT NULL,
  `dana_lainya` double NOT NULL,
  `total_hutang` double NOT NULL,
  `total_piutang` double NOT NULL,
  `jasa_usaha` double NOT NULL,
  `jasa_simpanan` double NOT NULL,
  `dana_cadangan` double NOT NULL,
  `dana_pengurus` double NOT NULL,
  `dana_pendidikan` double NOT NULL,
  `dana_kes_pegawai` double NOT NULL,
  `dana_sosial` double NOT NULL,
  `dana_audit` double NOT NULL,
  `dana_pembangunan` double NOT NULL,
  `dana_penghapusan` double NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_brangkas`
--

INSERT INTO `tb_brangkas` (`kas`, `dana_gotongroyong`, `dana_simpok`, `dana_simwa`, `dana_kusus`, `dana_lainya`, `total_hutang`, `total_piutang`, `jasa_usaha`, `jasa_simpanan`, `dana_cadangan`, `dana_pengurus`, `dana_pendidikan`, `dana_kes_pegawai`, `dana_sosial`, `dana_audit`, `dana_pembangunan`, `dana_penghapusan`, `last_update`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id` int(11) NOT NULL,
  `kode_instansi` varchar(10) NOT NULL,
  `nama_instansi` varchar(30) NOT NULL,
  `alamat_instansi` varchar(30) NOT NULL,
  `registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`id`, `kode_instansi`, `nama_instansi`, `alamat_instansi`, `registration`) VALUES
(1, '010', 'Puskesmas Manggeng', 'null', '2022-05-27'),
(2, '011', 'Puskesmas Lembah Sabil', 'null', '2022-05-27'),
(3, '012', 'Puskesmas Tangan-Tangan', 'null', '2022-05-27'),
(4, '013', 'Puskesmas Bineh Krueng', 'null', '2022-05-27'),
(5, '014', 'Puskesmas Lhang', 'null', '0000-00-00'),
(6, '015', 'Puskesmas Blngpidie', 'null', '0000-00-00'),
(7, '016', 'Puskesmas Susoh', 'null', '0000-00-00'),
(8, '017', 'Puskesmas Sangkalan', 'null', '0000-00-00'),
(9, '018', 'Puskesmas As. Pinang', 'null', '0000-00-00'),
(10, '019', 'Puskesmas Alue Pisang', 'null', '0000-00-00'),
(11, '020', 'Puskesmas Kuala Batee', 'null', '0000-00-00'),
(12, '021', 'Puskesmas Babahrot', 'null', '0000-00-00'),
(13, '022', 'Puskesmas Ie Mirah', 'null', '0000-00-00'),
(14, '023', 'Dinkes', 'null', '0000-00-00'),
(15, '024', 'RSUD Tengku Peukan', 'null', '0000-00-00'),
(16, '025', 'Instasi Lain', 'null', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_sekarang` double NOT NULL,
  `keterangan` text NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id`, `nama_barang`, `satuan`, `jumlah`, `harga_beli`, `harga_sekarang`, `keterangan`, `last_update`) VALUES
('1652815704', 'Filling Kabinet', 'Buah', '1', 1300000, 1300000, '-', '2022-05-18'),
('1652815733', 'Laptop Toshiba', 'unit', '2', 14190000, 14190000, '-', '2022-05-18'),
('1652815774', 'Lemari arsip 2 Pintu', 'unit', '1', 1527500, 1527500, '-', '2022-05-18'),
('1652815799', 'Alat Pendingin Ruangan ( AC )', 'Buah', '1', 3500000, 3500000, '-', '2022-05-18'),
('1652815846', 'Meja ½ Biro ', 'Buah', '2', 1500000, 1500000, '', '2022-05-18'),
('1652815869', 'Kursi Biasa', 'Buah', '4', 500000, 500000, '', '2022-05-18'),
('1652815898', 'Dispenser', 'Buah', '1', 300000, 300000, '', '2022-05-18'),
('1652815936', 'Komputer', 'unit', '1', 9500000, 9500000, '', '2022-05-18'),
('1652816004', 'Seperangkat Alat Alat', '', '', 507500, 507500, '', '2022-05-18'),
('1652816045', 'Lemari Arsip 4 Pintu', 'Unit', '1', 7500000, 7500000, '', '2022-05-18'),
('1652816075', 'Komputer', 'unit', '1', 5000000, 5000000, '', '2022-05-18'),
('1652816094', 'Meja', 'Buah', '2', 1450000, 1450000, '', '2022-05-18'),
('1652816124', 'Printer', 'unit', '1', 2700000, 2700000, '', '2022-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_margin_saving`
--

CREATE TABLE `tb_margin_saving` (
  `id_margin` int(11) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `margin_saving` double NOT NULL,
  `tahun` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_margin_saving`
--

INSERT INTO `tb_margin_saving` (`id_margin`, `no_rekening`, `margin_saving`, `tahun`, `last_update`) VALUES
(1, '20220111', 208333, 2022, '2022-06-06'),
(2, '20220121', 100000, 2022, '2022-06-06'),
(3, '20220101', 66666, 2022, '2022-06-06'),
(4, '20220137', 866666, 2022, '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_neraca_tahunan`
--

CREATE TABLE `tb_neraca_tahunan` (
  `id` int(11) NOT NULL,
  `jasa_usaha` double NOT NULL,
  `jasa_simpanan` double NOT NULL,
  `dana_cadangan` double NOT NULL,
  `dana_pengurus` double NOT NULL,
  `dana_kesejahteraan` double NOT NULL,
  `dana_pendidikan` double NOT NULL,
  `dana_sosial` double NOT NULL,
  `dana_audit` double NOT NULL,
  `dana_pembangunan` double NOT NULL,
  `tahun_neraca` int(4) NOT NULL,
  `keterangan` text NOT NULL,
  `rumus_jasa_usaha` double NOT NULL,
  `rumus_jasa_simpanan` double NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_phu`
--

CREATE TABLE `tb_phu` (
  `id` int(11) NOT NULL,
  `pendapatan_jasa` double NOT NULL,
  `pendapatan_lain` double NOT NULL,
  `biaya_atk` double NOT NULL,
  `biaya_honor` double NOT NULL,
  `biaya_rat` double NOT NULL,
  `biaya_lebaran` double NOT NULL,
  `biaya_penghapusan` double NOT NULL,
  `jumlah_biaya_adm` double NOT NULL,
  `shu_sebelum_zakat` double NOT NULL,
  `zakat` double NOT NULL,
  `shu_setelah_zakat` double NOT NULL,
  `tahun` int(4) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id` int(11) NOT NULL,
  `kode_pinjaman` varchar(15) NOT NULL,
  `no_rekening` varchar(11) NOT NULL,
  `plafon` double NOT NULL,
  `tenor` int(11) NOT NULL,
  `margin` double NOT NULL,
  `pokok_murabahan` double NOT NULL,
  `total_gotongroyong` double NOT NULL,
  `total_angsuran` double NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `sisa_angsuran` double NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `no_rekening` varchar(30) NOT NULL,
  `anggota_no` varchar(30) NOT NULL,
  `s_pokok` double NOT NULL,
  `s_wajib` double NOT NULL,
  `s_khusus` double NOT NULL,
  `s_lain` double NOT NULL,
  `s_gotongroyong` double NOT NULL,
  `total_akumulasi` double NOT NULL,
  `sts_pinjaman` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_shu`
--

CREATE TABLE `tb_shu` (
  `id` int(11) NOT NULL,
  `no_anggota` varchar(11) NOT NULL,
  `murabahan` double NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `anggota_master_data`
--
DROP TABLE IF EXISTS `anggota_master_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `anggota_master_data`  AS SELECT `master_view_anggota`.`no` AS `no_anggota`, `master_view_anggota`.`nama` AS `nama_anggota`, `master_view_anggota`.`instansi` AS `nama_instansi`, `tb_rekening`.`no_rekening` AS `no_rekening`, `tb_rekening`.`total_akumulasi` AS `total_simpanan`, `tb_rekening`.`sts_pinjaman` AS `status_pinjaman` FROM (`master_view_anggota` join `tb_rekening` on(`tb_rekening`.`anggota_no` = `master_view_anggota`.`no`))  ;

-- --------------------------------------------------------

--
-- Structure for view `log_angsuran_anggota`
--
DROP TABLE IF EXISTS `log_angsuran_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `log_angsuran_anggota`  AS SELECT `tb_angsuran`.`kode_angsuran` AS `kode`, `tb_angsuran`.`kode_pinjaman` AS `pinjaman`, `tb_anggota`.`nama_anggota` AS `nama`, `tb_angsuran`.`angsuran_ke` AS `angsuran_ke`, `tb_angsuran`.`angsuran_pokok` AS `pokok`, `tb_angsuran`.`angsuran_margin` AS `margin`, `tb_angsuran`.`keterangan` AS `keterangan`, `tb_angsuran`.`last_update` AS `tgl_update` FROM (`tb_angsuran` join `tb_anggota` on(`tb_angsuran`.`no_anggota` = `tb_anggota`.`no_anggota`))  ;

-- --------------------------------------------------------

--
-- Structure for view `master_view_anggota`
--
DROP TABLE IF EXISTS `master_view_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_view_anggota`  AS SELECT `tb_anggota`.`no_anggota` AS `no`, `tb_anggota`.`nama_anggota` AS `nama`, `tb_instansi`.`nama_instansi` AS `instansi`, `tb_anggota`.`status` AS `status`, `tb_anggota`.`registration` AS `terdaftar` FROM (`tb_anggota` join `tb_instansi` on(`tb_instansi`.`kode_instansi` = `tb_anggota`.`instansi`))  ;

-- --------------------------------------------------------

--
-- Structure for view `master_view_anggota_all`
--
DROP TABLE IF EXISTS `master_view_anggota_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_view_anggota_all`  AS SELECT `tb_anggota`.`no_anggota` AS `no`, `tb_anggota`.`nama_anggota` AS `nama`, `tb_anggota`.`nik` AS `nik`, `tb_anggota`.`nip` AS `nip`, `tb_anggota`.`tp_lahir` AS `lahir`, `tb_anggota`.`tgl_lahir` AS `tanggal`, `tb_anggota`.`alamat` AS `alamat`, `tb_instansi`.`nama_instansi` AS `instansi`, `tb_anggota`.`status` AS `status`, `tb_anggota`.`registration` AS `terdaftar` FROM (`tb_anggota` join `tb_instansi`) WHERE `tb_anggota`.`instansi` = `tb_instansi`.`kode_instansi``kode_instansi`  ;

-- --------------------------------------------------------

--
-- Structure for view `master_view_pinjaman`
--
DROP TABLE IF EXISTS `master_view_pinjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_view_pinjaman`  AS SELECT `tb_pinjaman`.`id` AS `id`, `tb_pinjaman`.`kode_pinjaman` AS `kode`, `tb_pinjaman`.`no_rekening` AS `no_rekening`, `master_view_rekening`.`nama` AS `nama`, `tb_pinjaman`.`plafon` AS `plafon`, `tb_pinjaman`.`tenor` AS `tenor`, `tb_pinjaman`.`margin` AS `margin`, `tb_pinjaman`.`pokok_murabahan` AS `pokok`, `tb_pinjaman`.`total_gotongroyong` AS `gotong_royong`, `tb_pinjaman`.`angsuran_ke` AS `ke`, `tb_pinjaman`.`sisa_angsuran` AS `sisa_angsuran`, `tb_pinjaman`.`tanggal_pengajuan` AS `tgl_pengajuan`, `tb_pinjaman`.`last_update` AS `last_update` FROM (`tb_pinjaman` join `master_view_rekening` on(`master_view_rekening`.`no` = `tb_pinjaman`.`no_rekening`))  ;

-- --------------------------------------------------------

--
-- Structure for view `master_view_rekening`
--
DROP TABLE IF EXISTS `master_view_rekening`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `master_view_rekening`  AS SELECT `tb_rekening`.`no_rekening` AS `no`, `tb_anggota`.`nama_anggota` AS `nama`, `tb_rekening`.`s_pokok` AS `pokok`, `tb_rekening`.`s_wajib` AS `wajib`, `tb_rekening`.`s_khusus` AS `kusus`, `tb_rekening`.`s_lain` AS `lain`, `tb_rekening`.`total_akumulasi` AS `total`, `tb_rekening`.`sts_pinjaman` AS `status`, `tb_rekening`.`last_update` AS `update_terakhir` FROM (`tb_rekening` join `tb_anggota` on(`tb_rekening`.`anggota_no` = `tb_anggota`.`no_anggota`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_anggota_keluar`
--
ALTER TABLE `log_anggota_keluar`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_operasional`
--
ALTER TABLE `log_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_penglolaan_dana`
--
ALTER TABLE `log_penglolaan_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_transaksi_anggota`
--
ALTER TABLE `log_transaksi_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kolektif`
--
ALTER TABLE `master_kolektif`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD UNIQUE KEY `kode_angsuran` (`kode_angsuran`);

--
-- Indexes for table `tb_bht`
--
ALTER TABLE `tb_bht`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_margin_saving`
--
ALTER TABLE `tb_margin_saving`
  ADD PRIMARY KEY (`id_margin`);

--
-- Indexes for table `tb_neraca_tahunan`
--
ALTER TABLE `tb_neraca_tahunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_phu`
--
ALTER TABLE `tb_phu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD UNIQUE KEY `no_rekening` (`no_rekening`);

--
-- Indexes for table `tb_shu`
--
ALTER TABLE `tb_shu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_anggota_keluar`
--
ALTER TABLE `log_anggota_keluar`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_operasional`
--
ALTER TABLE `log_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_penglolaan_dana`
--
ALTER TABLE `log_penglolaan_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_transaksi_anggota`
--
ALTER TABLE `log_transaksi_anggota`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bht`
--
ALTER TABLE `tb_bht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_margin_saving`
--
ALTER TABLE `tb_margin_saving`
  MODIFY `id_margin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_neraca_tahunan`
--
ALTER TABLE `tb_neraca_tahunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_phu`
--
ALTER TABLE `tb_phu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_shu`
--
ALTER TABLE `tb_shu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
