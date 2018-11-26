/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.32-MariaDB : Database - sppvendetta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_detail_daftar_ulang` */

DROP TABLE IF EXISTS `tb_detail_daftar_ulang`;

CREATE TABLE `tb_detail_daftar_ulang` (
  `id_detail_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_spp` int(11) DEFAULT NULL,
  `nama_detail_pembayaran` varchar(255) DEFAULT NULL,
  `nominal_detail_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_detail_daftar_ulang` */

/*Table structure for table `tb_jenis_pembayaran` */

DROP TABLE IF EXISTS `tb_jenis_pembayaran`;

CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenis_pembayaran` */

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`id_kelas`,`nama_kelas`,`keterangan`) values 
(2,'edit kelas','ds edit');

/*Table structure for table `tb_set_daftar_ulang` */

DROP TABLE IF EXISTS `tb_set_daftar_ulang`;

CREATE TABLE `tb_set_daftar_ulang` (
  `id_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  `max_angsuran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_set_daftar_ulang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_set_daftar_ulang` */

/*Table structure for table `tb_set_spp` */

DROP TABLE IF EXISTS `tb_set_spp`;

CREATE TABLE `tb_set_spp` (
  `id_set_spp` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT 'tidak aktif',
  `max_angsuran` int(11) DEFAULT NULL,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_set_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_set_spp` */

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

/*Table structure for table `tb_tahun_ajaran` */

DROP TABLE IF EXISTS `tb_tahun_ajaran`;

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun_ajaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tahun_ajaran` */

insert  into `tb_tahun_ajaran`(`id_tahun_ajaran`,`nama_tahun_ajaran`,`keterangan`) values 
(3,'2015/2016','testedit');

/*Table structure for table `tb_transaksi_spp` */

DROP TABLE IF EXISTS `tb_transaksi_spp`;

CREATE TABLE `tb_transaksi_spp` (
  `id_transaksi_spp` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_spp` int(11) DEFAULT NULL,
  `no_kwitansi` varchar(255) DEFAULT NULL,
  `angsuran_ke` int(11) DEFAULT NULL,
  `nominal_angsuran` varchar(255) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_spp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_transaksi_spp` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
