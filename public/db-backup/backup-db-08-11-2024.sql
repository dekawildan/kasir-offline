-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: kasir_toko
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `laporan_pembelian`
--

DROP TABLE IF EXISTS `laporan_pembelian`;
/*!50001 DROP VIEW IF EXISTS `laporan_pembelian`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `laporan_pembelian` AS SELECT
 1 AS `kategori_nama`,
  1 AS `barang_nama`,
  1 AS `supplier_nama`,
  1 AS `tanggal_beli`,
  1 AS `jumlah_barang`,
  1 AS `harga_beli`,
  1 AS `harga_jual`,
  1 AS `satuan`,
  1 AS `total_beli`,
  1 AS `tanggal_expired` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `laporan_penjualan`
--

DROP TABLE IF EXISTS `laporan_penjualan`;
/*!50001 DROP VIEW IF EXISTS `laporan_penjualan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `laporan_penjualan` AS SELECT
 1 AS `karyawan_nama`,
  1 AS `customer_nama`,
  1 AS `kategori_nama`,
  1 AS `barang_nama`,
  1 AS `harga_jual`,
  1 AS `nota_jual`,
  1 AS `tanggal_jual`,
  1 AS `jumlah_jual`,
  1 AS `diskon`,
  1 AS `total_bayar` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tbl_barang`
--

DROP TABLE IF EXISTS `tbl_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_barang` (
  `barang_id` bigint(20) NOT NULL,
  `barang_nama` varchar(100) NOT NULL,
  `barang_file` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  PRIMARY KEY (`barang_id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_barang`
--

LOCK TABLES `tbl_barang` WRITE;
/*!40000 ALTER TABLE `tbl_barang` DISABLE KEYS */;
INSERT INTO `tbl_barang` VALUES (20242421258,'Epson 003','20242429banner2-min.jpg',1),(20242429972,'M-Tech Wireless','20242430banner3.jpg',3),(202407307882,'Advanced PSU 500 Watt','20240731aplikasi.png',5),(202407309481,'Keyboard Logitech','20240730server.png',4),(202407314140,'AOC 15 Inch','20240741report.png',6),(202407413291,'SPC USB','20240742data-center.jpg',3),(202407421394,'Buldozer 500 watt','20240743server.png',5),(202407434635,'VGEN','20240744aplikasi.png',10),(202407437376,'VGen 8 GB','20240743aplikasi.png',7),(202407447472,'Sandisk 32 GB','20240745data-center.jpg',12),(202407449782,'DST 128 GB','20240744data-center.jpg',8),(202424496914,'Epson 663','20242450Screenshot from 2024-01-18 04-38-21.png',1);
/*!40000 ALTER TABLE `tbl_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_beli_barang`
--

DROP TABLE IF EXISTS `tbl_beli_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_beli_barang` (
  `id_beli` bigint(17) NOT NULL AUTO_INCREMENT,
  `nota_beli` bigint(20) NOT NULL,
  `barang_id` bigint(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `jumlah_stok` mediumint(20) NOT NULL,
  `jumlah_barang` mediumint(20) NOT NULL,
  `harga_beli` bigint(30) NOT NULL,
  `harga_jual` bigint(30) NOT NULL,
  `satuan` enum('Lusin','Kodi','Gross','Rim','Pack','Pcs') NOT NULL,
  `total_beli` bigint(30) NOT NULL,
  `tanggal_expired` date NOT NULL,
  PRIMARY KEY (`id_beli`),
  KEY `barang_id` (`barang_id`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `tbl_beli_barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`supplier_id`),
  CONSTRAINT `tbl_beli_barang_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `tbl_barang` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_beli_barang`
--

LOCK TABLES `tbl_beli_barang` WRITE;
/*!40000 ALTER TABLE `tbl_beli_barang` DISABLE KEYS */;
INSERT INTO `tbl_beli_barang` VALUES (1,11223344,20242421258,1,'2024-10-08',15,15,45000,60000,'Pcs',450000,'2027-11-08'),(2,22113344,20242429972,1,'2024-09-09',10,10,60000,80000,'Pcs',600000,'2032-12-31'),(3,11223344,202407307882,1,'2024-10-08',15,15,90000,110000,'Pcs',1350000,'2035-11-30'),(4,33112244,202407309481,1,'2024-10-07',15,15,120000,150000,'Pcs',1800000,'2036-12-31'),(5,1223344,202407314140,1,'2024-10-08',10,10,350000,500000,'Pcs',3500000,'2040-12-31'),(6,11223344,202407413291,1,'2024-10-08',10,10,40000,50000,'Pcs',400000,'2033-12-31'),(7,11223344,202407421394,1,'2024-10-08',10,10,120000,150000,'Pcs',1200000,'2035-12-31'),(8,11223344,202407434635,1,'2024-10-08',10,10,140000,180000,'Pcs',1400000,'2037-12-31'),(9,11223344,202407447472,1,'2024-10-31',15,15,65000,100000,'Pcs',975000,'2038-12-31'),(10,22113344,202407449782,1,'2024-10-09',10,10,130000,170000,'Pcs',1300000,'2034-12-31'),(11,22113344,202424496914,1,'2024-10-08',10,10,60000,80000,'Pcs',600000,'2038-12-31');
/*!40000 ALTER TABLE `tbl_beli_barang` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trig_tambah_stok` AFTER INSERT ON `tbl_beli_barang` FOR EACH ROW IF (SELECT COUNT(total_stok) FROM tbl_total_stok WHERE barang_id=new.barang_id) = 0 THEN
INSERT INTO tbl_total_stok(barang_id,total_stok) VALUES(new.barang_id,new.jumlah_stok);
ELSE
UPDATE tbl_total_stok SET total_stok=total_stok+new.jumlah_stok WHERE barang_id=new.barang_id;
END IF */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trig_update_beli` AFTER UPDATE ON `tbl_beli_barang` FOR EACH ROW BEGIN
UPDATE tbl_total_stok SET total_stok=total_stok-old.jumlah_stok WHERE barang_id=old.barang_id;
UPDATE tbl_total_stok SET total_stok=total_stok+new.jumlah_stok WHERE barang_id=new.barang_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trig_hapus_beli` BEFORE DELETE ON `tbl_beli_barang` FOR EACH ROW UPDATE tbl_total_stok SET total_stok=total_stok-old.jumlah_stok WHERE barang_id=old.barang_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_nama` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nohp` bigint(15) NOT NULL,
  `customer_level` enum('UMUM','MEMBER') NOT NULL,
  `customer_status` enum('AKTIF','TIDAK AKTIF') NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `nohp` (`nohp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_customer`
--

LOCK TABLES `tbl_customer` WRITE;
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` VALUES (1,'Member Umum','2024-01-05',85225539838,'UMUM','AKTIF'),(4,'Fatoni','2024-01-02',85225539834,'MEMBER','AKTIF');
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_detail_jual`
--

DROP TABLE IF EXISTS `tbl_detail_jual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_detail_jual` (
  `detail_id` bigint(25) NOT NULL AUTO_INCREMENT,
  `nota_jual` bigint(20) NOT NULL,
  `barang_id` bigint(20) NOT NULL,
  `jumlah_jual` int(5) NOT NULL,
  `diskon` bigint(25) NOT NULL,
  `total_bayar` bigint(25) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `nota_jual` (`nota_jual`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `tbl_detail_jual_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `tbl_beli_barang` (`barang_id`),
  CONSTRAINT `tbl_detail_jual_ibfk_4` FOREIGN KEY (`nota_jual`) REFERENCES `tbl_penjualan` (`nota_jual`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_detail_jual`
--

LOCK TABLES `tbl_detail_jual` WRITE;
/*!40000 ALTER TABLE `tbl_detail_jual` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_detail_jual` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trigger_tambah_jual` AFTER INSERT ON `tbl_detail_jual` FOR EACH ROW UPDATE tbl_total_stok SET total_stok=total_stok-new.jumlah_jual WHERE barang_id=new.barang_id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trig_update_jual` AFTER UPDATE ON `tbl_detail_jual` FOR EACH ROW BEGIN
UPDATE tbl_total_stok SET total_stok=total_stok+old.jumlah_jual WHERE barang_id=old.barang_id;
UPDATE tbl_total_stok SET total_stok=total_stok-new.jumlah_jual WHERE barang_id=new.barang_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trig_hapus_jual` BEFORE DELETE ON `tbl_detail_jual` FOR EACH ROW BEGIN
UPDATE tbl_total_stok SET total_stok=total_stok+old.jumlah_jual WHERE barang_id=old.barang_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tbl_karyawan`
--

DROP TABLE IF EXISTS `tbl_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_karyawan` (
  `karyawan_id` bigint(20) NOT NULL,
  `karyawan_nama` varchar(100) NOT NULL,
  `karyawan_tempat_lahir` varchar(100) NOT NULL,
  `karyawan_tanggal_lahir` date NOT NULL,
  `karyawan_jenis` enum('L','P') NOT NULL,
  `karyawan_alamat` varchar(250) NOT NULL,
  `karyawan_hp` bigint(15) NOT NULL,
  `karyawan_status` enum('AKTIF','NONAKTIF') NOT NULL,
  `karyawan_email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `karyawan_level` enum('ADMIN','KASIR') NOT NULL,
  PRIMARY KEY (`karyawan_id`),
  UNIQUE KEY `karyawan_email` (`karyawan_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_karyawan`
--

LOCK TABLES `tbl_karyawan` WRITE;
/*!40000 ALTER TABLE `tbl_karyawan` DISABLE KEYS */;
INSERT INTO `tbl_karyawan` VALUES (20241141533867,'Deka Wildan','Kendal','1992-08-17','L','Pilar Tampingan Indah Blok D 9',6285225539836,'AKTIF','dekawildan@bisasoftware.id','$2y$10$eRLkNDSru/ufz.NJi9JQFOcTOv9rI2lzJL7dvQzrBc.wfXfijUrWa','ADMIN'),(202401160257242,'Nur Fatoni','Kendal','2024-01-01','L','Somopuro Boja RT 1 RW 1',8755334455,'AKTIF','toni7@gmail.com','$2y$12$mDdXTDJTsl1zf80TsSXhVeh5eiMqzvf2k.cCybuScys9Lg091aBjK','KASIR');
/*!40000 ALTER TABLE `tbl_karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kategori`
--

DROP TABLE IF EXISTS `tbl_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_deskripsi` text NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori`
--

LOCK TABLES `tbl_kategori` WRITE;
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` VALUES (1,'Tinta Printer','Tinta printer epson, canon, HP'),(3,'Mouse','Mouse Wireless dan kabel'),(4,'Keyboard','Keyboard USB'),(5,'PSU','Power Supply Unit 500 Watt'),(6,'Monitor','Monitor LCD 15 Inch'),(7,'Memory RAM','RAM DDR 3'),(8,'SSD','SSD 128 GB - 512 GB'),(9,'Hardisk','Hardisk 500 GB'),(10,'Kabel Data HDMI VGA','Kabel Data HDMI VGA'),(11,'VGA Card','VGA Card DDR 3 1 GB'),(12,'Flashdisk','Flashdisk 32 GB - 128 GB'),(13,'Micro SD','Micro SD 16 GB - 128 GB');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_penjualan`
--

DROP TABLE IF EXISTS `tbl_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_penjualan` (
  `nota_jual` bigint(20) NOT NULL,
  `karyawan_id` bigint(20) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  PRIMARY KEY (`nota_jual`),
  KEY `karyawan_id` (`karyawan_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `tbl_penjualan_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  CONSTRAINT `tbl_penjualan_ibfk_4` FOREIGN KEY (`karyawan_id`) REFERENCES `tbl_karyawan` (`karyawan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_penjualan`
--

LOCK TABLES `tbl_penjualan` WRITE;
/*!40000 ALTER TABLE `tbl_penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(100) NOT NULL,
  `supplier_alamat` varchar(255) NOT NULL,
  `supplier_hp` bigint(15) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplier`
--

LOCK TABLES `tbl_supplier` WRITE;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` VALUES (1,'PT. Tata Computer','Jl. Simongan, Semarang',85727653426),(3,'PT KAI','kdjslkfjskf',454353),(4,'PT NFR','dkjfsdlkfj',746438),(5,'CV FIERT','jdflksjflskfj',45345),(6,'CV MGJKKJ','dfhjlroipopok',4334534),(7,'jjugh','ooiugfoigudlj',76387438),(8,'PT GJKH','DHJSKHFKJHF',423453),(9,'ggjgjh','hfjhghgj',4354354),(10,'gjhgjhg','etrertwerwr',45354),(11,'uiyuiouoi','upopoipo',76876768),(12,'utrjiojfoi','uihvjfjnfknvmlmcm',786876);
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_toko`
--

DROP TABLE IF EXISTS `tbl_toko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_toko` (
  `toko_id` int(11) NOT NULL AUTO_INCREMENT,
  `toko_nama` varchar(200) NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_hp` bigint(16) NOT NULL,
  PRIMARY KEY (`toko_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_toko`
--

LOCK TABLES `tbl_toko` WRITE;
/*!40000 ALTER TABLE `tbl_toko` DISABLE KEYS */;
INSERT INTO `tbl_toko` VALUES (1,'Bisa Computer  And Software','Perum Pilar Tampingan Indah Blok D9\r\nDesa Ngabean',85225539836);
/*!40000 ALTER TABLE `tbl_toko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_total_stok`
--

DROP TABLE IF EXISTS `tbl_total_stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_total_stok` (
  `no_beli` bigint(20) NOT NULL AUTO_INCREMENT,
  `barang_id` bigint(20) NOT NULL,
  `total_stok` mediumint(15) DEFAULT NULL,
  PRIMARY KEY (`no_beli`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_total_stok`
--

LOCK TABLES `tbl_total_stok` WRITE;
/*!40000 ALTER TABLE `tbl_total_stok` DISABLE KEYS */;
INSERT INTO `tbl_total_stok` VALUES (1,20242421258,15),(2,20242429972,10),(3,202407307882,15),(4,202407309481,15),(5,202407314140,10),(6,202407413291,10),(7,202407421394,10),(8,202407434635,10),(9,202407447472,15),(10,202407449782,10),(11,202424496914,10);
/*!40000 ALTER TABLE `tbl_total_stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'kasir_toko'
--

--
-- Dumping routines for database 'kasir_toko'
--
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cari_barang` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_barang`(IN `caridata` VARCHAR(250))
SELECT tbl_kategori.*,tbl_barang.* FROM tbl_kategori,tbl_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id AND tbl_barang.barang_nama LIKE caridata ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cari_beli` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_beli`(IN `caridata` VARCHAR(250))
SELECT tbl_supplier.*,tbl_barang.*,tbl_beli_barang.* FROM tbl_supplier,tbl_barang,tbl_beli_barang WHERE tbl_supplier.supplier_id=tbl_beli_barang.supplier_id AND tbl_barang.barang_id=tbl_beli_barang.barang_id AND tbl_beli_barang.nota_beli LIKE caridata ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cari_jual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_jual`(IN `caridata` VARCHAR(250))
SELECT tbl_karyawan.*,tbl_barang.*,tbl_beli_barang.*,tbl_penjualan.* FROM tbl_karyawan,tbl_barang,tbl_beli_barang,tbl_penjualan WHERE tbl_karyawan.karyawan_id=tbl_penjualan.karyawan_id AND tbl_barang.barang_id=tbl_beli_barang.barang_id AND tbl_beli_barang.barang_id=tbl_penjualan.barang_id AND tbl_penjualan.nota_jual LIKE caridata ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cari_karyawan` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_karyawan`(IN `caridata` VARCHAR(250))
SELECT * FROM tbl_karyawan WHERE karyawan_nama LIKE caridata OR karyawan_alamat LIKE caridata ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cari_kategori` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_kategori`(IN `caridata` VARCHAR(250))
SELECT * FROM tbl_kategori WHERE kategori_nama LIKE caridata ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cari_supplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_supplier`(IN `caridata` VARCHAR(250))
SELECT * FROM tbl_supplier WHERE supplier_nama LIKE caridata ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cetak_struk` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cetak_struk`(IN `notanya` BIGINT(20))
SELECT tbl_karyawan.karyawan_nama,tbl_customer.customer_nama,tbl_barang.barang_nama,tbl_beli_barang.harga_jual,tbl_penjualan.nota_jual,tbl_penjualan.tanggal_jual,tbl_detail_jual.jumlah_jual,tbl_detail_jual.total_biaya,tbl_detail_jual.tunai,tbl_detail_jual.kembali,tbl_detail_jual.diskon FROM tbl_karyawan,tbl_customer,tbl_barang,tbl_beli_barang,tbl_penjualan,tbl_detail_jual WHERE tbl_karyawan.karyawan_id=tbl_penjualan.karyawan_id AND tbl_customer.customer_id=tbl_penjualan.customer_id AND tbl_barang.barang_id=tbl_beli_barang.barang_id AND tbl_beli_barang.barang_id=tbl_detail_jual.barang_id AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual GROUP BY notanya ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `hapus_barang` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_barang`(IN `id_barang` INT(11))
DELETE FROM tbl_barang WHERE tbl_barang.barang_id=id_barang ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `hapus_beli` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_beli`(IN `beli_id` INT(11))
DELETE FROM tbl_beli_barang WHERE tbl_beli_barang.id_beli=beli_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `hapus_detail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_detail`(IN `iddetail` BIGINT(25))
DELETE FROM tbl_detail_jual WHERE tbl_detail_jual.detail_id=iddetail ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `hapus_kategori` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_kategori`(IN `id_kategori` INT(11))
DELETE FROM tbl_kategori WHERE tbl_kategori.kategori_id=id_kategori ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `hapus_supplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_supplier`(IN `id_supplier` INT(11))
DELETE FROM tbl_supplier WHERE tbl_supplier.supplier_id=id_supplier ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_barang` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_barang`()
SELECT tbl_kategori.*,tbl_barang.* FROM tbl_kategori,tbl_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_beli_barang` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_beli_barang`()
SELECT tbl_barang.*,tbl_supplier.*, tbl_beli_barang.* FROM tbl_barang,tbl_beli_barang WHERE tbl_barang.barang_id=tbl_beli_barang.barang_id AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_jual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_jual`()
SELECT tbl_barang.*, tbl_beli_barang.*, tbl_karyawan.*, tbl_user.*, tbl_penjualan.* FROM tbl_beli_barang,tbl_user,tbl_barang,tbl_karyawan,tbl_penjualan WHERE tbl_barang.barang_id=tbl_beli_barang.barang_id AND tbl_beli_barang.barang_id=tbl_penjualan.barang_id AND tbl_karyawan.karyawan_id=tbl_user.karyawan_id AND tbl_user.karyawan_id=tbl_penjualan.karyawan_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_karyawan_aktif` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_karyawan_aktif`()
SELECT * FROM tbl_karyawan WHERE tbl_karyawan.karyawan_status='AKTIF' ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_karyawan_nonaktif` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_karyawan_nonaktif`()
SELECT * FROM tbl_karyawan WHERE tbl_karyawan.karyawan_status='NONAKTIF' ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_kategori` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_kategori`()
SELECT * FROM tbl_kategori ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tampil_supplier` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_supplier`()
SELECT * FROM tbl_supplier ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `laporan_pembelian`
--

/*!50001 DROP VIEW IF EXISTS `laporan_pembelian`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `laporan_pembelian` AS select `tbl_kategori`.`kategori_nama` AS `kategori_nama`,`tbl_barang`.`barang_nama` AS `barang_nama`,`tbl_supplier`.`supplier_nama` AS `supplier_nama`,`tbl_beli_barang`.`tanggal_beli` AS `tanggal_beli`,`tbl_beli_barang`.`jumlah_barang` AS `jumlah_barang`,`tbl_beli_barang`.`harga_beli` AS `harga_beli`,`tbl_beli_barang`.`harga_jual` AS `harga_jual`,`tbl_beli_barang`.`satuan` AS `satuan`,`tbl_beli_barang`.`total_beli` AS `total_beli`,`tbl_beli_barang`.`tanggal_expired` AS `tanggal_expired` from (((`tbl_kategori` join `tbl_barang`) join `tbl_supplier`) join `tbl_beli_barang`) where `tbl_kategori`.`kategori_id` = `tbl_barang`.`kategori_id` and `tbl_barang`.`barang_id` = `tbl_beli_barang`.`barang_id` and `tbl_supplier`.`supplier_id` = `tbl_beli_barang`.`supplier_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `laporan_penjualan`
--

/*!50001 DROP VIEW IF EXISTS `laporan_penjualan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `laporan_penjualan` AS select `tbl_karyawan`.`karyawan_nama` AS `karyawan_nama`,`tbl_customer`.`customer_nama` AS `customer_nama`,`tbl_kategori`.`kategori_nama` AS `kategori_nama`,`tbl_barang`.`barang_nama` AS `barang_nama`,`tbl_beli_barang`.`harga_jual` AS `harga_jual`,`tbl_penjualan`.`nota_jual` AS `nota_jual`,`tbl_penjualan`.`tanggal_jual` AS `tanggal_jual`,`tbl_detail_jual`.`jumlah_jual` AS `jumlah_jual`,`tbl_detail_jual`.`diskon` AS `diskon`,`tbl_detail_jual`.`total_bayar` AS `total_bayar` from ((((((`tbl_karyawan` join `tbl_customer`) join `tbl_kategori`) join `tbl_barang`) join `tbl_beli_barang`) join `tbl_penjualan`) join `tbl_detail_jual`) where `tbl_karyawan`.`karyawan_id` = `tbl_penjualan`.`karyawan_id` and `tbl_customer`.`customer_id` = `tbl_penjualan`.`customer_id` and `tbl_kategori`.`kategori_id` = `tbl_barang`.`kategori_id` and `tbl_barang`.`barang_id` = `tbl_beli_barang`.`barang_id` and `tbl_beli_barang`.`barang_id` = `tbl_detail_jual`.`barang_id` and `tbl_penjualan`.`nota_jual` = `tbl_detail_jual`.`nota_jual` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-08 19:41:25
