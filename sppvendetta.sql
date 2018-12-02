-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `sppvendetta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sppvendetta`;

DROP TABLE IF EXISTS `tb_detail_daftar_ulang`;
CREATE TABLE `tb_detail_daftar_ulang` (
  `id_detail_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_detail_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_detail_daftar_ulang` (`id_detail_daftar_ulang`, `nama_detail_pembayaran`) VALUES
(1,	'Baju Olahraga'),
(2,	'Uang Bangunan'),
(3,	'Biaya Asrama');

DROP TABLE IF EXISTS `tb_detail_set_daftar_ulang`;
CREATE TABLE `tb_detail_set_daftar_ulang` (
  `id_detail_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_detail_daftar_ulang` int(11) NOT NULL,
  `nominal_bayar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_detail_set_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_detail_set_daftar_ulang` (`id_detail_set_daftar_ulang`, `id_set_daftar_ulang`, `id_detail_daftar_ulang`, `nominal_bayar`) VALUES
(1,	2,	1,	'350000'),
(2,	2,	2,	'1250000'),
(3,	2,	3,	'1450000');

DROP TABLE IF EXISTS `tb_jenis_pembayaran`;
CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`, `keterangan`) VALUES
(1,	'SPP',	'-'),
(2,	'Daftar Ulang',	'-');

DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `keterangan`) VALUES
(3,	'IPA 1',	'IPA 1 untuk tahun masuk 2018');

DROP TABLE IF EXISTS `tb_set_daftar_ulang`;
CREATE TABLE `tb_set_daftar_ulang` (
  `id_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `sampai` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `max_angsuran` int(11) DEFAULT NULL,
  `biaya_daful` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_set_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_set_daftar_ulang` (`id_set_daftar_ulang`, `keterangan`, `dari`, `sampai`, `id_kelas`, `max_angsuran`, `biaya_daful`) VALUES
(2,	'Daftar Ulang untuk kelas 1a tahun masuk 2018',	'2018-07-01',	'2019-06-01',	3,	10,	'3500000');

DROP TABLE IF EXISTS `tb_set_spp`;
CREATE TABLE `tb_set_spp` (
  `id_set_spp` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `sampai` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_set_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_set_spp` (`id_set_spp`, `keterangan`, `id_jenis_pembayaran`, `dari`, `sampai`, `id_kelas`) VALUES
(6,	'pembayaran SPP untuk kelas 1',	1,	'2018-11-01',	'2018-12-01',	3);

DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `id_kelas`) VALUES
(2,	'12345',	'fff',	3),
(4,	'65432',	'siswa 2',	3);

DROP TABLE IF EXISTS `tb_siswa_di_pembayaran_daful`;
CREATE TABLE `tb_siswa_di_pembayaran_daful` (
  `id_siswa_di_pemabayaran_daful` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa_di_pemabayaran_daful`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_siswa_di_pembayaran_daful` (`id_siswa_di_pemabayaran_daful`, `id_set_daftar_ulang`, `id_siswa`) VALUES
(3,	2,	2),
(4,	2,	4);

DROP TABLE IF EXISTS `tb_tahun_ajaran`;
CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun_ajaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_tahun_ajaran` (`id_tahun_ajaran`, `nama_tahun_ajaran`, `keterangan`) VALUES
(3,	'2015/2016',	'testedit');

DROP TABLE IF EXISTS `tb_transaksi_pembayaran_daful`;
CREATE TABLE `tb_transaksi_pembayaran_daful` (
  `id_transaksi_pembayaran_daful` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `no_kwitansi` varchar(255) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_transaksi_pembayaran_daful`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_transaksi_pembayaran_daful` (`id_transaksi_pembayaran_daful`, `id_siswa`, `id_set_daftar_ulang`, `no_kwitansi`, `jumlah_bayar`, `tanggal_transaksi`, `status`) VALUES
(1,	2,	2,	'2018120114000183',	500000,	'2018-12-01 14:00:12',	'sudah bayar'),
(2,	2,	2,	'2018120114012760',	250000,	'2018-12-01 14:01:32',	'sudah bayar'),
(3,	4,	2,	'2018120117313786',	340000,	'2018-12-01 17:31:44',	'sudah bayar'),
(4,	4,	2,	'2018120117315356',	600000,	'2018-12-01 17:31:58',	'sudah bayar'),
(5,	4,	2,	'2018120117320048',	750000,	'2018-12-01 17:32:04',	'sudah bayar');

DROP TABLE IF EXISTS `tb_transaksi_pembayaran_spp`;
CREATE TABLE `tb_transaksi_pembayaran_spp` (
  `id_transaksi_spp` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail_set_spp` int(11) DEFAULT NULL,
  `bulan` int(5) DEFAULT NULL,
  `tahun` int(5) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `no_kwitansi` varchar(255) DEFAULT NULL,
  `status` enum('belum bayar','sudah bayar') DEFAULT 'belum bayar',
  `id_set_spp` int(11) DEFAULT NULL,
  `nominal_default` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_transaksi_pembayaran_spp` (`id_transaksi_spp`, `id_detail_set_spp`, `bulan`, `tahun`, `tanggal_transaksi`, `no_kwitansi`, `status`, `id_set_spp`, `nominal_default`, `jumlah_bayar`, `id_siswa`) VALUES
(77,	NULL,	11,	2018,	'2018-11-29 15:58:27',	'2018112915582353',	'sudah bayar',	6,	650000,	600000,	2),
(78,	NULL,	12,	2018,	'2018-12-01 17:00:26',	'2018120117001697',	'sudah bayar',	6,	650000,	650000,	2),
(79,	NULL,	11,	2018,	'2018-12-01 16:57:46',	'2018120116573625',	'sudah bayar',	6,	600000,	750000,	4),
(80,	NULL,	12,	2018,	'2018-12-01 16:58:02',	'2018120116575623',	'sudah bayar',	6,	600000,	725000,	4);

-- 2018-12-02 02:41:53
