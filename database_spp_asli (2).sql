-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 02:52 PM
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
-- Database: `database_spp_asli`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cicilan_spp`
--

CREATE TABLE `tb_cicilan_spp` (
  `id_cicilan_spp` int(11) NOT NULL,
  `id_transaksi_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `no_kwitansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Siswa 2017 A', 'siswa angkatan tahun ajaran 2017'),
(2, 'Siswa 2018 A', 'siswa angkatan tahun ajaran 2018');

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
(1, '18128', 'Adelia Dwi Rahma W', 2),
(3, '18129', 'Afifah Rahmadani', 2),
(6, '18130', 'Agasi Ifthia Arnida ', 2),
(7, '18131', 'Afifah Fauziah Alfadila', 2),
(8, '18132', 'Armilda Widya Saputri', 2),
(9, '18133', 'Bilqis Khansa Nuha', 2),
(10, '18134', 'Deffa Nurmala Sari', 2),
(11, '18135', 'Dita Aprilia', 2),
(12, '18136', 'Diva yayang Trisilia ', 2),
(13, '18137', 'Fadhilah Putri', 2),
(14, '18138', 'Firda Fadila Ridwan', 2),
(16, '18139', 'Fitriyana', 2),
(17, '18140', 'Fitriyani', 2),
(18, '18141', 'Hanifatul Mufida', 2),
(19, '18142', 'Lilis Fransiska', 2),
(20, '18143', 'Mahdiyyah  Azizah', 2),
(21, '18144', 'Marwatul Kholisah', 2),
(22, '18145', 'Mas watul Jannah', 2),
(24, '18146', 'Monica Tiara Safitri ', 2),
(25, '18147', 'Nabila Azhar Azizah', 2),
(26, '18148', 'Najla Sahda Umama', 2),
(27, '18149', 'Najwa Nadifa Amlu', 2),
(28, '18150', 'Nanjelina Bintang R', 2),
(29, '18151', 'Nisa Awalia', 2),
(30, '18152', 'Nurul Fadilah', 2),
(31, '18153', 'Rifatul Mahmuda', 2),
(32, '18154', 'Rika Nur Wulandari', 2),
(33, '18155', 'Sami Prasetiawati', 2),
(34, '18156', 'Sefia aRahma az zahra', 2),
(35, '18157', 'Sherly Via Zanika', 2),
(36, '18158', 'Shofi Al Mutaqof', 2),
(37, '18159', 'Luthfi Halimatus  S', 2),
(38, '1709101', 'Adinda FailaSyifa', 1),
(39, '1709202', 'Adzkia Afiefatunnisa', 1),
(40, '1709303', 'Adzqi Amalia Putri', 1),
(41, '1709404', 'Anisa Tufahati', 1),
(42, '1709505', 'Anisya CindeKirana', 1),
(43, '1709606', 'Annisa Nurrosyida', 1),
(44, '1709707', 'Antika Hidayah kusuma', 1),
(45, '1709808', 'Assyifa Mutiara Qolby', 1),
(46, '1710010', 'Calista Ratna Maharani', 1),
(47, '1710111', 'Celline Yovita', 1),
(48, '1710212', 'Dita Permatasari', 1),
(49, '1710313', 'Dona FebiolaPutri', 1),
(50, '1710414', 'Eka Erliyana', 1),
(51, '1710616', 'Farihah Zidni', 1),
(52, '1710717', 'Firyal Zahrotun Mufida', 1),
(53, '1710818', 'Inas Amaliya Sajidah', 1),
(54, '1710919', 'Isnun Mutmainah', 1),
(55, '1711020', 'Leony Agustina', 1),
(56, '1711121', 'Lutfi yana Ulfa', 1),
(57, '1711222', 'Maoya Shovi Zamzami', 1),
(58, '1711323', 'Mar\'atus Sholeha', 1),
(59, '1711424', 'Nuri Rohayati', 1),
(60, '1711525', 'Nurul Izzah', 1),
(61, '1711626', 'Rahmatul Wahibah', 1),
(62, '1712028', 'Rosyidatul Ashfiya', 1),
(63, '1712129', 'Shabrina Sabila A', 1),
(64, '1712230', 'Umi Salamah', 1),
(65, '1712331', 'Uswatin Nafi\'ah', 1),
(66, '1712432', 'Vera Mahesa', 1),
(67, '1712533 ', 'Yuni Annisa', 1),
(68, '1712534', 'Shepti Hatiyah', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa_di_pembayaran_daful`
--

CREATE TABLE `tb_siswa_di_pembayaran_daful` (
  `id_siswa_di_pemabayaran_daful` int(11) NOT NULL,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cicilan_spp`
--
ALTER TABLE `tb_cicilan_spp`
  ADD PRIMARY KEY (`id_cicilan_spp`);

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
-- AUTO_INCREMENT for table `tb_cicilan_spp`
--
ALTER TABLE `tb_cicilan_spp`
  MODIFY `id_cicilan_spp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_detail_daftar_ulang`
--
ALTER TABLE `tb_detail_daftar_ulang`
  MODIFY `id_detail_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_detail_set_daftar_ulang`
--
ALTER TABLE `tb_detail_set_daftar_ulang`
  MODIFY `id_detail_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_set_daftar_ulang`
--
ALTER TABLE `tb_set_daftar_ulang`
  MODIFY `id_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_set_spp`
--
ALTER TABLE `tb_set_spp`
  MODIFY `id_set_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_siswa_di_pembayaran_daful`
--
ALTER TABLE `tb_siswa_di_pembayaran_daful`
  MODIFY `id_siswa_di_pemabayaran_daful` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_pembayaran_daful`
--
ALTER TABLE `tb_transaksi_pembayaran_daful`
  MODIFY `id_transaksi_pembayaran_daful` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_pembayaran_spp`
--
ALTER TABLE `tb_transaksi_pembayaran_spp`
  MODIFY `id_transaksi_spp` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
