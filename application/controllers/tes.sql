-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: sppvendetta
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_detail_daftar_ulang`
--

DROP TABLE IF EXISTS `tb_detail_daftar_ulang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_detail_daftar_ulang` (
  `id_detail_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_detail_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_detail_daftar_ulang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detail_daftar_ulang`
--

LOCK TABLES `tb_detail_daftar_ulang` WRITE;
/*!40000 ALTER TABLE `tb_detail_daftar_ulang` DISABLE KEYS */;
INSERT INTO `tb_detail_daftar_ulang` VALUES (1,'Baju Olahraga'),(2,'Uang Bangunan'),(3,'Biaya Asrama');
/*!40000 ALTER TABLE `tb_detail_daftar_ulang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detail_set_daftar_ulang`
--

DROP TABLE IF EXISTS `tb_detail_set_daftar_ulang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_detail_set_daftar_ulang` (
  `id_detail_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_detail_daftar_ulang` int(11) NOT NULL,
  `nominal_bayar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_detail_set_daftar_ulang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detail_set_daftar_ulang`
--

LOCK TABLES `tb_detail_set_daftar_ulang` WRITE;
/*!40000 ALTER TABLE `tb_detail_set_daftar_ulang` DISABLE KEYS */;
INSERT INTO `tb_detail_set_daftar_ulang` VALUES (1,2,1,'350000'),(2,2,2,'1250000'),(3,2,3,'1450000');
/*!40000 ALTER TABLE `tb_detail_set_daftar_ulang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jenis_pembayaran`
--

DROP TABLE IF EXISTS `tb_jenis_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenis_pembayaran`
--

LOCK TABLES `tb_jenis_pembayaran` WRITE;
/*!40000 ALTER TABLE `tb_jenis_pembayaran` DISABLE KEYS */;
INSERT INTO `tb_jenis_pembayaran` VALUES (1,'SPP','-'),(2,'Daftar Ulang','-');
/*!40000 ALTER TABLE `tb_jenis_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kelas`
--

DROP TABLE IF EXISTS `tb_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kelas`
--

LOCK TABLES `tb_kelas` WRITE;
/*!40000 ALTER TABLE `tb_kelas` DISABLE KEYS */;
INSERT INTO `tb_kelas` VALUES (3,'IPA 1','IPA 1 untuk tahun masuk 2018');
/*!40000 ALTER TABLE `tb_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_set_daftar_ulang`
--

DROP TABLE IF EXISTS `tb_set_daftar_ulang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_set_daftar_ulang` (
  `id_set_daftar_ulang` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `sampai` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `max_angsuran` int(11) DEFAULT NULL,
  `biaya_daful` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_set_daftar_ulang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_set_daftar_ulang`
--

LOCK TABLES `tb_set_daftar_ulang` WRITE;
/*!40000 ALTER TABLE `tb_set_daftar_ulang` DISABLE KEYS */;
INSERT INTO `tb_set_daftar_ulang` VALUES (2,'Daftar Ulang untuk kelas 1a tahun masuk 2018','2018-07-01','2019-06-01',3,10,'3500000');
/*!40000 ALTER TABLE `tb_set_daftar_ulang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_set_spp`
--

DROP TABLE IF EXISTS `tb_set_spp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_set_spp` (
  `id_set_spp` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `id_jenis_pembayaran` int(11) DEFAULT NULL,
  `dari` varchar(255) DEFAULT NULL,
  `sampai` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_set_spp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_set_spp`
--

LOCK TABLES `tb_set_spp` WRITE;
/*!40000 ALTER TABLE `tb_set_spp` DISABLE KEYS */;
INSERT INTO `tb_set_spp` VALUES (6,'pembayaran SPP untuk kelas 1',1,'2018-11-01','2018-12-01',3);
/*!40000 ALTER TABLE `tb_set_spp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` VALUES (2,'12345','fff',3),(4,'65432','siswa 2',3);
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_siswa_di_pembayaran_daful`
--

DROP TABLE IF EXISTS `tb_siswa_di_pembayaran_daful`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_siswa_di_pembayaran_daful` (
  `id_siswa_di_pemabayaran_daful` int(11) NOT NULL AUTO_INCREMENT,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa_di_pemabayaran_daful`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa_di_pembayaran_daful`
--

LOCK TABLES `tb_siswa_di_pembayaran_daful` WRITE;
/*!40000 ALTER TABLE `tb_siswa_di_pembayaran_daful` DISABLE KEYS */;
INSERT INTO `tb_siswa_di_pembayaran_daful` VALUES (3,2,2),(4,2,4);
/*!40000 ALTER TABLE `tb_siswa_di_pembayaran_daful` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tahun_ajaran`
--

DROP TABLE IF EXISTS `tb_tahun_ajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun_ajaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tahun_ajaran`
--

LOCK TABLES `tb_tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `tb_tahun_ajaran` DISABLE KEYS */;
INSERT INTO `tb_tahun_ajaran` VALUES (3,'2015/2016','testedit');
/*!40000 ALTER TABLE `tb_tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_transaksi_pembayaran_daful`
--

DROP TABLE IF EXISTS `tb_transaksi_pembayaran_daful`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_transaksi_pembayaran_daful` (
  `id_transaksi_pembayaran_daful` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_set_daftar_ulang` int(11) NOT NULL,
  `no_kwitansi` varchar(255) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_transaksi_pembayaran_daful`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_transaksi_pembayaran_daful`
--

LOCK TABLES `tb_transaksi_pembayaran_daful` WRITE;
/*!40000 ALTER TABLE `tb_transaksi_pembayaran_daful` DISABLE KEYS */;
INSERT INTO `tb_transaksi_pembayaran_daful` VALUES (1,2,2,'2018120114000183',500000,'2018-12-01 14:00:12','sudah bayar'),(2,2,2,'2018120114012760',250000,'2018-12-01 14:01:32','sudah bayar'),(3,4,2,'2018120117313786',340000,'2018-12-01 17:31:44','sudah bayar'),(4,4,2,'2018120117315356',600000,'2018-12-01 17:31:58','sudah bayar'),(5,4,2,'2018120117320048',750000,'2018-12-01 17:32:04','sudah bayar');
/*!40000 ALTER TABLE `tb_transaksi_pembayaran_daful` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_transaksi_pembayaran_spp`
--

DROP TABLE IF EXISTS `tb_transaksi_pembayaran_spp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_transaksi_pembayaran_spp`
--

LOCK TABLES `tb_transaksi_pembayaran_spp` WRITE;
/*!40000 ALTER TABLE `tb_transaksi_pembayaran_spp` DISABLE KEYS */;
INSERT INTO `tb_transaksi_pembayaran_spp` VALUES (77,NULL,11,2018,'2018-11-29 15:58:27','2018112915582353','sudah bayar',6,650000,600000,2),(78,NULL,12,2018,'2018-12-01 17:00:26','2018120117001697','sudah bayar',6,650000,650000,2),(79,NULL,11,2018,'2018-12-01 16:57:46','2018120116573625','sudah bayar',6,600000,750000,4),(80,NULL,12,2018,'2018-12-01 16:58:02','2018120116575623','sudah bayar',6,600000,725000,4);
/*!40000 ALTER TABLE `tb_transaksi_pembayaran_spp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-02 10:07:03
