-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `tb_cicilan_spp` (
  `id_cicilan_spp` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `no_kwitansi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cicilan_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_cicilan_spp` (`id_cicilan_spp`, `id_transaksi_spp`, `jumlah_bayar`, `id_siswa`, `tanggal_transaksi`, `no_kwitansi`) VALUES
(1,	2,	25000,	1,	'2018-12-08 08:02:26',	'2018120808021944'),
(2,	2,	25000,	1,	'2018-12-08 08:03:11',	'2018120808030647'),
(3,	19,	50000,	2,	'2018-12-08 08:26:58',	'2018120808265516'),
(4,	19,	50000,	2,	'2018-12-08 08:27:24',	'2018120808272193')
ON DUPLICATE KEY UPDATE `id_cicilan_spp` = VALUES(`id_cicilan_spp`), `id_transaksi_spp` = VALUES(`id_transaksi_spp`), `jumlah_bayar` = VALUES(`jumlah_bayar`), `id_siswa` = VALUES(`id_siswa`), `tanggal_transaksi` = VALUES(`tanggal_transaksi`), `no_kwitansi` = VALUES(`no_kwitansi`);

CREATE TABLE `tb_detail_daftar_ulang` (
  `id_detail_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_detail_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_detail_daftar_ulang` (`id_detail_daftar_ulang`, `nama_detail_pembayaran`) VALUES
(1,	'SEWA DIPAN'),
(2,	'KHUTBAH TA\'ARUF'),
(3,	'KESANTRIAN'),
(4,	'KESEHATAN'),
(5,	'PEMBANGUNAN'),
(6,	'PENGEMBANGAN MUTU'),
(7,	'EKSKUL'),
(8,	'PERPUSTKAAN'),
(9,	'BUKU PAKET')
ON DUPLICATE KEY UPDATE `id_detail_daftar_ulang` = VALUES(`id_detail_daftar_ulang`), `nama_detail_pembayaran` = VALUES(`nama_detail_pembayaran`);

CREATE TABLE `tb_detail_set_daftar_ulang` (
  `id_detail_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_detail_daftar_ulang` int(11) NOT NULL,
  `nominal_bayar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_detail_set_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_detail_set_daftar_ulang` (`id_detail_set_daftar_ulang`, `id_set_daftar_ulang`, `id_detail_daftar_ulang`, `nominal_bayar`) VALUES
(1,	6,	1,	'400000'),
(2,	6,	2,	'200000')
ON DUPLICATE KEY UPDATE `id_detail_set_daftar_ulang` = VALUES(`id_detail_set_daftar_ulang`), `id_set_daftar_ulang` = VALUES(`id_set_daftar_ulang`), `id_detail_daftar_ulang` = VALUES(`id_detail_daftar_ulang`), `nominal_bayar` = VALUES(`nominal_bayar`);

CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`, `keterangan`) VALUES
(1,	'SPP',	'-'),
(2,	'DAFTAR ULANG',	'-')
ON DUPLICATE KEY UPDATE `id_jenis_pembayaran` = VALUES(`id_jenis_pembayaran`), `nama_jenis_pembayaran` = VALUES(`nama_jenis_pembayaran`), `keterangan` = VALUES(`keterangan`);

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `keterangan`) VALUES
(1,	'KELAS X A TH 2018',	'SMA AL ANSHOR PUTRI'),
(2,	'KELAS XI A TH 2017',	'SMA AL ANSHOR PUTRI'),
(3,	'KELAS XII A TH 2016',	'SMA AL ANSHOR PUTRI')
ON DUPLICATE KEY UPDATE `id_kelas` = VALUES(`id_kelas`), `nama_kelas` = VALUES(`nama_kelas`), `keterangan` = VALUES(`keterangan`);

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
(6,	'PEMBAYARAN DAFUL KELAS X A TH 2018',	'2018-06-01',	'2019-07-31',	1,	12,	'4500000')
ON DUPLICATE KEY UPDATE `id_set_daftar_ulang` = VALUES(`id_set_daftar_ulang`), `keterangan` = VALUES(`keterangan`), `dari` = VALUES(`dari`), `sampai` = VALUES(`sampai`), `id_kelas` = VALUES(`id_kelas`), `max_angsuran` = VALUES(`max_angsuran`), `biaya_daful` = VALUES(`biaya_daful`);

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
(1,	'PEMBAYARAN SPP KELAS X A TH 2018',	1,	'2018-07-01',	'2019-06-30',	1)
ON DUPLICATE KEY UPDATE `id_set_spp` = VALUES(`id_set_spp`), `keterangan` = VALUES(`keterangan`), `id_jenis_pembayaran` = VALUES(`id_jenis_pembayaran`), `dari` = VALUES(`dari`), `sampai` = VALUES(`sampai`), `id_kelas` = VALUES(`id_kelas`);

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `id_kelas`) VALUES
(1,	'18128',	'Adelia Dwi Rahma W',	1),
(2,	'18129',	'Afifah Rahmadani',	1),
(3,	'18130',	'Agasi Ifthia Arnida ',	1)
ON DUPLICATE KEY UPDATE `id_siswa` = VALUES(`id_siswa`), `nis` = VALUES(`nis`), `nama_siswa` = VALUES(`nama_siswa`), `id_kelas` = VALUES(`id_kelas`);

CREATE TABLE `tb_siswa_di_pembayaran_daful` (
  `id_siswa_di_pemabayaran_daful` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa_di_pemabayaran_daful`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_siswa_di_pembayaran_daful` (`id_siswa_di_pemabayaran_daful`, `id_set_daftar_ulang`, `id_siswa`) VALUES
(7,	5,	1),
(8,	5,	2),
(9,	5,	3),
(10,	6,	1),
(11,	6,	2),
(12,	6,	3)
ON DUPLICATE KEY UPDATE `id_siswa_di_pemabayaran_daful` = VALUES(`id_siswa_di_pemabayaran_daful`), `id_set_daftar_ulang` = VALUES(`id_set_daftar_ulang`), `id_siswa` = VALUES(`id_siswa`);

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun_ajaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(1,	1,	6,	'2018120709193182',	400000,	'2018-12-07 09:19:51',	'sudah bayar'),
(2,	2,	6,	'2018120709211143',	600000,	'2018-12-07 09:21:18',	'sudah bayar'),
(3,	1,	6,	'2018120806151330',	500000,	'2018-12-08 06:15:24',	'sudah bayar'),
(4,	1,	6,	'2018120806213672',	100000,	'2018-12-08 06:21:42',	'sudah bayar'),
(5,	1,	6,	'2018120806215193',	3500000,	'2018-12-08 06:21:57',	'sudah bayar')
ON DUPLICATE KEY UPDATE `id_transaksi_pembayaran_daful` = VALUES(`id_transaksi_pembayaran_daful`), `id_siswa` = VALUES(`id_siswa`), `id_set_daftar_ulang` = VALUES(`id_set_daftar_ulang`), `no_kwitansi` = VALUES(`no_kwitansi`), `jumlah_bayar` = VALUES(`jumlah_bayar`), `tanggal_transaksi` = VALUES(`tanggal_transaksi`), `status` = VALUES(`status`);

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
(1,	NULL,	7,	2018,	'2018-12-07 08:40:30',	'2018120708382260',	'sudah bayar',	1,	650000,	650000,	1),
(2,	NULL,	8,	2018,	'1970-01-01 01:00:00',	'2018120806114093',	'sudah bayar',	1,	650000,	600000,	1),
(3,	NULL,	9,	2018,	'2018-12-06 00:00:00',	'2018120806121447',	'sudah bayar',	1,	650000,	650000,	1),
(4,	NULL,	10,	2018,	'2018-12-01 06:13:15',	'2018120806130562',	'sudah bayar',	1,	650000,	650000,	1),
(5,	NULL,	11,	2018,	'2018-12-08 07:09:34',	'2018120807093048',	'sudah bayar',	1,	650000,	600000,	1),
(6,	NULL,	12,	2018,	'2018-12-08 07:09:42',	'2018120807093845',	'sudah bayar',	1,	650000,	650000,	1),
(7,	NULL,	1,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	1),
(8,	NULL,	2,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	1),
(9,	NULL,	3,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	1),
(10,	NULL,	4,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	1),
(11,	NULL,	5,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	1),
(12,	NULL,	6,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	1),
(13,	NULL,	7,	2018,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(14,	NULL,	8,	2018,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(15,	NULL,	9,	2018,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(16,	NULL,	10,	2018,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(17,	NULL,	11,	2018,	'2018-12-08 08:26:24',	'2018120808261933',	'sudah bayar',	1,	700000,	700000,	2),
(18,	NULL,	12,	2018,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(19,	NULL,	1,	2019,	'2018-12-08 08:26:42',	'2018120808263771',	'sudah bayar',	1,	700000,	600000,	2),
(20,	NULL,	2,	2019,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(21,	NULL,	3,	2019,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(22,	NULL,	4,	2019,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(23,	NULL,	5,	2019,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(24,	NULL,	6,	2019,	NULL,	NULL,	'belum bayar',	1,	700000,	NULL,	2),
(25,	NULL,	7,	2018,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(26,	NULL,	8,	2018,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(27,	NULL,	9,	2018,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(28,	NULL,	10,	2018,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(29,	NULL,	11,	2018,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(30,	NULL,	12,	2018,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(31,	NULL,	1,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(32,	NULL,	2,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(33,	NULL,	3,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(34,	NULL,	4,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(35,	NULL,	5,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3),
(36,	NULL,	6,	2019,	NULL,	NULL,	'belum bayar',	1,	650000,	NULL,	3)
ON DUPLICATE KEY UPDATE `id_transaksi_spp` = VALUES(`id_transaksi_spp`), `id_detail_set_spp` = VALUES(`id_detail_set_spp`), `bulan` = VALUES(`bulan`), `tahun` = VALUES(`tahun`), `tanggal_transaksi` = VALUES(`tanggal_transaksi`), `no_kwitansi` = VALUES(`no_kwitansi`), `status` = VALUES(`status`), `id_set_spp` = VALUES(`id_set_spp`), `nominal_default` = VALUES(`nominal_default`), `jumlah_bayar` = VALUES(`jumlah_bayar`), `id_siswa` = VALUES(`id_siswa`);

-- 2018-12-08 07:47:05
