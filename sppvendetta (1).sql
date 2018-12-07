-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 09:36 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppvendetta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_daftar_ulang`
--

CREATE TABLE `tb_detail_daftar_ulang` (
  `id_detail_daftar_ulang` int(11) NOT NULL,
  `nama_detail_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_daftar_ulang`
--

INSERT INTO `tb_detail_daftar_ulang` (`id_detail_daftar_ulang`, `nama_detail_pembayaran`) VALUES
(1, 'SEWA DIPAN'),
(2, 'KHUTBAH TA\'ARUF'),
(3, 'KESANTRIAN'),
(4, 'KESEHATAN'),
(5, 'PEMBANGUNAN'),
(6, 'PENGEMBANGAN MUTU'),
(7, 'EKSKUL'),
(8, 'PERPUSTKAAN'),
(9, 'BUKU PAKET');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_set_daftar_ulang`
--

CREATE TABLE `tb_detail_set_daftar_ulang` (
  `id_detail_set_daftar_ulang` int(11) NOT NULL,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_detail_daftar_ulang` int(11) NOT NULL,
  `nominal_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_set_daftar_ulang`
--

INSERT INTO `tb_detail_set_daftar_ulang` (`id_detail_set_daftar_ulang`, `id_set_daftar_ulang`, `id_detail_daftar_ulang`, `nominal_bayar`) VALUES
(1, 6, 1, '400000'),
(2, 6, 2, '200000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_jenis_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_pembayaran`
--

INSERT INTO `tb_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`, `keterangan`) VALUES
(1, 'SPP', '-'),
(2, 'DAFTAR ULANG', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `keterangan`) VALUES
(1, 'KELAS X A TH 2018', 'SMA AL ANSHOR PUTRI'),
(2, 'KELAS XI A TH 2017', 'SMA AL ANSHOR PUTRI'),
(3, 'KELAS XII A TH 2016', 'SMA AL ANSHOR PUTRI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_set_daftar_ulang`
--

CREATE TABLE `tb_set_daftar_ulang` (
  `id_set_daftar_ulang` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `sampai` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `max_angsuran` int(11) DEFAULT NULL,
  `biaya_daful` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_set_daftar_ulang`
--

INSERT INTO `tb_set_daftar_ulang` (`id_set_daftar_ulang`, `keterangan`, `dari`, `sampai`, `id_kelas`, `max_angsuran`, `biaya_daful`) VALUES
(6, 'PEMBAYARAN DAFUL KELAS X A TH 2018', '2018-06-01', '2019-07-31', 1, 12, '4500000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_set_spp`
--

CREATE TABLE `tb_set_spp` (
  `id_set_spp` int(11) NOT NULL,
  `keterangan` text,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `sampai` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_set_spp`
--

INSERT INTO `tb_set_spp` (`id_set_spp`, `keterangan`, `id_jenis_pembayaran`, `dari`, `sampai`, `id_kelas`) VALUES
(1, 'PEMBAYARAN SPP KELAS X A TH 2018', 1, '2018-07-01', '2019-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `id_kelas`) VALUES
(1, '18128', 'Adelia Dwi Rahma W', 1),
(2, '18129', 'Afifah Rahmadani', 1),
(3, '18130', 'Agasi Ifthia Arnida ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa_di_pembayaran_daful`
--

CREATE TABLE `tb_siswa_di_pembayaran_daful` (
  `id_siswa_di_pemabayaran_daful` int(11) NOT NULL,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa_di_pembayaran_daful`
--

INSERT INTO `tb_siswa_di_pembayaran_daful` (`id_siswa_di_pemabayaran_daful`, `id_set_daftar_ulang`, `id_siswa`) VALUES
(7, 5, 1),
(8, 5, 2),
(9, 5, 3),
(10, 6, 1),
(11, 6, 2),
(12, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `nama_tahun_ajaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_pembayaran_daful`
--

CREATE TABLE `tb_transaksi_pembayaran_daful` (
  `id_transaksi_pembayaran_daful` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `no_kwitansi` varchar(255) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_pembayaran_daful`
--

INSERT INTO `tb_transaksi_pembayaran_daful` (`id_transaksi_pembayaran_daful`, `id_siswa`, `id_set_daftar_ulang`, `no_kwitansi`, `jumlah_bayar`, `tanggal_transaksi`, `status`) VALUES
(1, 1, 6, '2018120709193182', 400000, '2018-12-07 09:19:51', 'sudah bayar'),
(2, 2, 6, '2018120709211143', 600000, '2018-12-07 09:21:18', 'sudah bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_pembayaran_spp`
--

CREATE TABLE `tb_transaksi_pembayaran_spp` (
  `id_transaksi_spp` int(11) NOT NULL,
  `id_detail_set_spp` int(11) DEFAULT NULL,
  `bulan` int(5) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `no_kwitansi` varchar(255) DEFAULT NULL,
  `status` enum('belum bayar','sudah bayar') DEFAULT 'belum bayar',
  `id_set_spp` int(11) DEFAULT NULL,
  `nominal_default` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_pembayaran_spp`
--

INSERT INTO `tb_transaksi_pembayaran_spp` (`id_transaksi_spp`, `id_detail_set_spp`, `bulan`, `tahun`, `tanggal_transaksi`, `no_kwitansi`, `status`, `id_set_spp`, `nominal_default`, `jumlah_bayar`, `id_siswa`) VALUES
(1, NULL, 7, 2018, '2018-12-07 08:40:30', '2018120708382260', 'sudah bayar', 1, 650000, 650000, 1),
(2, NULL, 8, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(3, NULL, 9, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(4, NULL, 10, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(5, NULL, 11, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(6, NULL, 12, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(7, NULL, 1, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(8, NULL, 2, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(9, NULL, 3, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(10, NULL, 4, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(11, NULL, 5, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(12, NULL, 6, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 1),
(13, NULL, 7, 2018, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(14, NULL, 8, 2018, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(15, NULL, 9, 2018, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(16, NULL, 10, 2018, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(17, NULL, 11, 2018, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(18, NULL, 12, 2018, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(19, NULL, 1, 2019, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(20, NULL, 2, 2019, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(21, NULL, 3, 2019, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(22, NULL, 4, 2019, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(23, NULL, 5, 2019, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(24, NULL, 6, 2019, NULL, NULL, 'belum bayar', 1, 700000, NULL, 2),
(25, NULL, 7, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(26, NULL, 8, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(27, NULL, 9, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(28, NULL, 10, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(29, NULL, 11, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(30, NULL, 12, 2018, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(31, NULL, 1, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(32, NULL, 2, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(33, NULL, 3, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(34, NULL, 4, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(35, NULL, 5, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3),
(36, NULL, 6, 2019, NULL, NULL, 'belum bayar', 1, 650000, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_daftar_ulang`
--
ALTER TABLE `tb_detail_daftar_ulang`
  ADD PRIMARY KEY (`id_detail_daftar_ulang`);

--
-- Indexes for table `tb_detail_set_daftar_ulang`
--
ALTER TABLE `tb_detail_set_daftar_ulang`
  ADD PRIMARY KEY (`id_detail_set_daftar_ulang`);

--
-- Indexes for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_set_daftar_ulang`
--
ALTER TABLE `tb_set_daftar_ulang`
  ADD PRIMARY KEY (`id_set_daftar_ulang`);

--
-- Indexes for table `tb_set_spp`
--
ALTER TABLE `tb_set_spp`
  ADD PRIMARY KEY (`id_set_spp`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_siswa_di_pembayaran_daful`
--
ALTER TABLE `tb_siswa_di_pembayaran_daful`
  ADD PRIMARY KEY (`id_siswa_di_pemabayaran_daful`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tb_transaksi_pembayaran_daful`
--
ALTER TABLE `tb_transaksi_pembayaran_daful`
  ADD PRIMARY KEY (`id_transaksi_pembayaran_daful`);

--
-- Indexes for table `tb_transaksi_pembayaran_spp`
--
ALTER TABLE `tb_transaksi_pembayaran_spp`
  ADD PRIMARY KEY (`id_transaksi_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_daftar_ulang`
--
ALTER TABLE `tb_detail_daftar_ulang`
  MODIFY `id_detail_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_detail_set_daftar_ulang`
--
ALTER TABLE `tb_detail_set_daftar_ulang`
  MODIFY `id_detail_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_set_daftar_ulang`
--
ALTER TABLE `tb_set_daftar_ulang`
  MODIFY `id_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_set_spp`
--
ALTER TABLE `tb_set_spp`
  MODIFY `id_set_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa_di_pembayaran_daful`
--
ALTER TABLE `tb_siswa_di_pembayaran_daful`
  MODIFY `id_siswa_di_pemabayaran_daful` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_pembayaran_daful`
--
ALTER TABLE `tb_transaksi_pembayaran_daful`
  MODIFY `id_transaksi_pembayaran_daful` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi_pembayaran_spp`
--
ALTER TABLE `tb_transaksi_pembayaran_spp`
  MODIFY `id_transaksi_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
