-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2025 at 07:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_toko`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_barang` (IN `caridata` VARCHAR(250))   SELECT tbl_kategori.*,tbl_barang.* FROM tbl_kategori,tbl_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id AND tbl_barang.barang_nama LIKE caridata$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_beli` (IN `caridata` VARCHAR(250))   SELECT tbl_supplier.*,tbl_barang.*,tbl_beli_barang.* FROM tbl_supplier,tbl_barang,tbl_beli_barang WHERE tbl_supplier.supplier_id=tbl_beli_barang.supplier_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_beli_barang.nota_beli LIKE caridata$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_jual` (IN `caridata` VARCHAR(250))   SELECT tbl_karyawan.*,tbl_barang.*,tbl_beli_barang.*,tbl_penjualan.* FROM tbl_karyawan,tbl_barang,tbl_beli_barang,tbl_penjualan WHERE tbl_karyawan.karyawan_id=tbl_penjualan.karyawan_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_beli_barang.barang_kode=tbl_penjualan.barang_kode AND tbl_penjualan.nota_jual LIKE caridata$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_karyawan` (IN `caridata` VARCHAR(250))   SELECT * FROM tbl_karyawan WHERE karyawan_nama LIKE caridata OR karyawan_alamat LIKE caridata$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_kategori` (IN `caridata` VARCHAR(250))   SELECT * FROM tbl_kategori WHERE kategori_nama LIKE caridata$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_supplier` (IN `caridata` VARCHAR(250))   SELECT * FROM tbl_supplier WHERE supplier_nama LIKE caridata$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cetak_struk` (IN `notanya` BIGINT(20))   SELECT tbl_karyawan.karyawan_nama,tbl_customer.customer_nama,tbl_barang.barang_nama,tbl_beli_barang.harga_jual,tbl_penjualan.nota_jual,tbl_penjualan.tanggal_jual,tbl_detail_jual.jumlah_jual,tbl_detail_jual.total_biaya,tbl_detail_jual.tunai,tbl_detail_jual.kembali,tbl_detail_jual.diskon FROM tbl_karyawan,tbl_customer,tbl_barang,tbl_beli_barang,tbl_penjualan,tbl_detail_jual WHERE tbl_karyawan.karyawan_id=tbl_penjualan.karyawan_id AND tbl_customer.customer_id=tbl_penjualan.customer_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_beli_barang.barang_kode=tbl_detail_jual.barang_kode AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual GROUP BY notanya$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_barang` (IN `id_barang` INT(11))   DELETE FROM tbl_barang WHERE tbl_barang.barang_id=id_barang$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_beli` (IN `beli_id` INT(11))   DELETE FROM tbl_beli_barang WHERE tbl_beli_barang.id_beli=beli_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_detail` (IN `iddetail` BIGINT(25))   DELETE FROM tbl_detail_jual WHERE tbl_detail_jual.detail_id=iddetail$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_kategori` (IN `id_kategori` INT(11))   DELETE FROM tbl_kategori WHERE tbl_kategori.kategori_id=id_kategori$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_supplier` (IN `id_supplier` INT(11))   DELETE FROM tbl_supplier WHERE tbl_supplier.supplier_id=id_supplier$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_barang` ()   SELECT tbl_kategori.*,tbl_barang.* FROM tbl_kategori,tbl_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_beli_barang` ()   SELECT tbl_barang.*,tbl_supplier.*, tbl_beli_barang.* FROM tbl_barang,tbl_beli_barang WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_jual` ()   SELECT tbl_barang.*, tbl_beli_barang.*, tbl_karyawan.*, tbl_user.*, tbl_penjualan.* FROM tbl_beli_barang,tbl_user,tbl_barang,tbl_karyawan,tbl_penjualan WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_beli_barang.barang_kode=tbl_detail_jual.barang_kode AND tbl_karyawan.karyawan_id=tbl_user.karyawan_id AND tbl_user.karyawan_id=tbl_penjualan.karyawan_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_karyawan_aktif` ()   SELECT * FROM tbl_karyawan WHERE tbl_karyawan.karyawan_status='AKTIF'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_karyawan_nonaktif` ()   SELECT * FROM tbl_karyawan WHERE tbl_karyawan.karyawan_status='NONAKTIF'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_kategori` ()   SELECT * FROM tbl_kategori$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_supplier` ()   SELECT * FROM tbl_supplier$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_pembelian`
-- (See below for the actual view)
--
CREATE TABLE `laporan_pembelian` (
`kategori_nama` varchar(100)
,`barang_nama` varchar(100)
,`supplier_nama` varchar(100)
,`tanggal_beli` date
,`jumlah_barang` mediumint(20)
,`harga_beli` bigint(30)
,`harga_jual` bigint(30)
,`satuan` enum('Lusin','Kodi','Gross','Rim','Pack','Pcs')
,`total_beli` bigint(30)
,`tanggal_expired` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `laporan_penjualan` (
`karyawan_nama` varchar(100)
,`customer_nama` varchar(100)
,`kategori_nama` varchar(100)
,`barang_nama` varchar(100)
,`harga_jual` bigint(30)
,`nota_jual` bigint(20)
,`tanggal_jual` date
,`jumlah_jual` int(5)
,`diskon` bigint(25)
,`total_bayar` bigint(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` bigint(20) NOT NULL,
  `barang_kode` varchar(50) NOT NULL,
  `barang_nama` varchar(100) NOT NULL,
  `barang_file` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_kode`, `barang_nama`, `barang_file`, `kategori_id`) VALUES
(1, '202407307882', 'Advanced PSU 500 Watt', '20240731aplikasi.png', 5),
(2, '202407309481', 'Keyboard Logitech', '20240730server.png', 4),
(3, '202407314140', 'AOC 15 Inch', '20240741report.png', 6),
(4, '202407413291', 'SPC USB', '20240742data-center.jpg', 3),
(5, '202407421394', 'Buldozer 500 watt', '20240743server.png', 5),
(6, '202407434635', 'VGEN', '20240744aplikasi.png', 10),
(7, '202407437376', 'VGen 8 GB', '20240743aplikasi.png', 7),
(8, '202407447472', 'Sandisk 32 GB', '20240745data-center.jpg', 12),
(9, '202407449782', 'DST 128 GB', '20240744data-center.jpg', 8),
(10, '20242421258', 'Epson 003', '20242429banner2-min.jpg', 1),
(11, '20242429972', 'M-Tech Wireless', '20242430banner3.jpg', 3),
(12, '202424496914', 'Epson 663', '20242450Screenshot from 2024-01-18 04-38-21.png', 1),
(13, 'B2025021001', 'SSD Kingston 256 GB', '20251819aplikasi.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli_barang`
--

CREATE TABLE `tbl_beli_barang` (
  `id_beli` bigint(17) NOT NULL,
  `nota_beli` bigint(20) NOT NULL,
  `barang_kode` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `jumlah_stok` mediumint(20) NOT NULL,
  `jumlah_barang` mediumint(20) NOT NULL,
  `harga_beli` bigint(30) NOT NULL,
  `harga_jual` bigint(30) NOT NULL,
  `satuan` enum('Lusin','Kodi','Gross','Rim','Pack','Pcs') NOT NULL,
  `total_beli` bigint(30) NOT NULL,
  `tanggal_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_beli_barang`
--

INSERT INTO `tbl_beli_barang` (`id_beli`, `nota_beli`, `barang_kode`, `supplier_id`, `tanggal_beli`, `jumlah_stok`, `jumlah_barang`, `harga_beli`, `harga_jual`, `satuan`, `total_beli`, `tanggal_expired`) VALUES
(1, 11223344, '20242421258', 1, '2024-10-08', 15, 15, 45000, 60000, 'Pcs', 450000, '2027-11-08'),
(2, 22113344, '20242429972', 1, '2024-09-09', 10, 10, 60000, 80000, 'Pcs', 600000, '2032-12-31'),
(3, 11223344, '202407307882', 1, '2024-10-08', 15, 15, 90000, 110000, 'Pcs', 1350000, '2035-11-30'),
(4, 33112244, '202407309481', 1, '2024-10-07', 15, 15, 120000, 150000, 'Pcs', 1800000, '2036-12-31'),
(5, 1223344, '202407314140', 1, '2024-10-08', 10, 10, 350000, 500000, 'Pcs', 3500000, '2040-12-31'),
(6, 11223344, '202407413291', 1, '2024-10-08', 10, 10, 40000, 50000, 'Pcs', 400000, '2033-12-31'),
(7, 11223344, '202407421394', 1, '2024-10-08', 10, 10, 120000, 150000, 'Pcs', 1200000, '2035-12-31'),
(8, 11223344, '202407434635', 1, '2024-10-08', 10, 10, 140000, 180000, 'Pcs', 1400000, '2037-12-31'),
(9, 11223344, '202407447472', 1, '2024-10-31', 15, 15, 65000, 100000, 'Pcs', 975000, '2038-12-31'),
(10, 22113344, '202407449782', 1, '2024-10-09', 10, 10, 130000, 170000, 'Pcs', 1300000, '2034-12-31'),
(11, 22113344, '202424496914', 1, '2024-10-08', 10, 10, 60000, 80000, 'Pcs', 600000, '2038-12-31'),
(12, 2025021801, 'B2025021001', 1, '2025-02-18', 2, 2, 200000, 250000, 'Pcs', 400000, '2025-02-28');

--
-- Triggers `tbl_beli_barang`
--
DELIMITER $$
CREATE TRIGGER `trig_hapus_beli` BEFORE DELETE ON `tbl_beli_barang` FOR EACH ROW UPDATE tbl_total_stok SET total_stok=total_stok-old.jumlah_stok WHERE barang_kode=old.barang_kode
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_tambah_stok` AFTER INSERT ON `tbl_beli_barang` FOR EACH ROW IF (SELECT COUNT(total_stok) FROM tbl_total_stok WHERE barang_kode=new.barang_kode) = 0 THEN
INSERT INTO tbl_total_stok(barang_kode,total_stok) VALUES(new.barang_kode,new.jumlah_stok);
ELSE
UPDATE tbl_total_stok SET total_stok=total_stok+new.jumlah_stok WHERE barang_kode=new.barang_kode;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_update_beli` AFTER UPDATE ON `tbl_beli_barang` FOR EACH ROW BEGIN
UPDATE tbl_total_stok SET total_stok=total_stok-old.jumlah_stok WHERE barang_kode=old.barang_kode;
UPDATE tbl_total_stok SET total_stok=total_stok+new.jumlah_stok WHERE barang_kode=new.barang_kode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) NOT NULL,
  `customer_nama` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nohp` bigint(15) NOT NULL,
  `customer_level` enum('UMUM','MEMBER') NOT NULL,
  `customer_status` enum('AKTIF','TIDAK AKTIF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_nama`, `tgl_daftar`, `nohp`, `customer_level`, `customer_status`) VALUES
(1, 'Member Umum', '2024-01-05', 85225539838, 'UMUM', 'AKTIF'),
(4, 'Fatoni', '2024-01-02', 85225539834, 'MEMBER', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `detail_id` bigint(25) NOT NULL,
  `nota_jual` bigint(20) NOT NULL,
  `barang_kode` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_jual` int(5) NOT NULL,
  `diskon` bigint(25) NOT NULL,
  `total_bayar` bigint(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`detail_id`, `nota_jual`, `barang_kode`, `jumlah_jual`, `diskon`, `total_bayar`) VALUES
(11, 202411125015436, '20242421258', 1, 0, 60000),
(13, 202502182204928, 'B2025021001', 1, 0, 250000);

--
-- Triggers `tbl_detail_jual`
--
DELIMITER $$
CREATE TRIGGER `trig_hapus_jual` BEFORE DELETE ON `tbl_detail_jual` FOR EACH ROW BEGIN
UPDATE tbl_total_stok SET total_stok=total_stok+old.jumlah_jual WHERE barang_kode=old.barang_kode;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trig_update_jual` AFTER UPDATE ON `tbl_detail_jual` FOR EACH ROW BEGIN
UPDATE tbl_total_stok SET total_stok=total_stok+old.jumlah_jual WHERE barang_kode=old.barang_kode;
UPDATE tbl_total_stok SET total_stok=total_stok-new.jumlah_jual WHERE barang_kode=new.barang_kode;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_tambah_jual` AFTER INSERT ON `tbl_detail_jual` FOR EACH ROW UPDATE tbl_total_stok SET total_stok=total_stok-new.jumlah_jual WHERE barang_kode=new.barang_kode
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

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
  `karyawan_level` enum('ADMIN','KASIR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`karyawan_id`, `karyawan_nama`, `karyawan_tempat_lahir`, `karyawan_tanggal_lahir`, `karyawan_jenis`, `karyawan_alamat`, `karyawan_hp`, `karyawan_status`, `karyawan_email`, `password`, `karyawan_level`) VALUES
(20241141533867, 'Deka Wildan', 'Kendal', '1992-08-17', 'L', 'Pilar Tampingan Indah Blok D 9', 6285225539836, 'AKTIF', 'dekawildan@bisasoftware.id', '$2y$10$eRLkNDSru/ufz.NJi9JQFOcTOv9rI2lzJL7dvQzrBc.wfXfijUrWa', 'ADMIN'),
(202401160257242, 'Nur Fatoni', 'Kendal', '2024-01-01', 'L', 'Somopuro Boja RT 1 RW 1', 8755334455, 'AKTIF', 'toni7@gmail.com', '$2y$12$mDdXTDJTsl1zf80TsSXhVeh5eiMqzvf2k.cCybuScys9Lg091aBjK', 'KASIR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`, `kategori_deskripsi`) VALUES
(1, 'Tinta Printer', 'Tinta printer epson, canon, HP'),
(3, 'Mouse', 'Mouse Wireless dan kabel'),
(4, 'Keyboard', 'Keyboard USB'),
(5, 'PSU', 'Power Supply Unit 500 Watt'),
(6, 'Monitor', 'Monitor LCD 15 Inch'),
(7, 'Memory RAM', 'RAM DDR 3'),
(8, 'SSD', 'SSD 128 GB - 512 GB'),
(9, 'Hardisk', 'Hardisk 500 GB'),
(10, 'Kabel Data HDMI VGA', 'Kabel Data HDMI VGA'),
(11, 'VGA Card', 'VGA Card DDR 3 1 GB'),
(12, 'Flashdisk', 'Flashdisk 32 GB - 128 GB'),
(13, 'Micro SD', 'Micro SD 16 GB - 128 GB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `nota_jual` bigint(20) NOT NULL,
  `karyawan_id` bigint(20) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `customer_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`nota_jual`, `karyawan_id`, `tanggal_jual`, `customer_id`) VALUES
(202411125015436, 20241141533867, '2024-11-12', 1),
(202502182204928, 20241141533867, '2025-02-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(100) NOT NULL,
  `supplier_alamat` varchar(255) NOT NULL,
  `supplier_hp` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_hp`) VALUES
(1, 'PT. Tata Computer', 'Jl. Simongan, Semarang', 85727653426),
(3, 'PT KAI', 'kdjslkfjskf', 454353),
(4, 'PT NFR', 'dkjfsdlkfj', 746438),
(5, 'CV FIERT', 'jdflksjflskfj', 45345),
(6, 'CV MGJKKJ', 'dfhjlroipopok', 4334534),
(7, 'jjugh', 'ooiugfoigudlj', 76387438),
(8, 'PT GJKH', 'DHJSKHFKJHF', 423453),
(9, 'ggjgjh', 'hfjhghgj', 4354354),
(10, 'gjhgjhg', 'etrertwerwr', 45354),
(11, 'uiyuiouoi', 'upopoipo', 76876768),
(12, 'utrjiojfoi', 'uihvjfjnfknvmlmcm', 786876);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toko`
--

CREATE TABLE `tbl_toko` (
  `toko_id` int(11) NOT NULL,
  `toko_nama` varchar(200) NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_hp` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_toko`
--

INSERT INTO `tbl_toko` (`toko_id`, `toko_nama`, `toko_alamat`, `toko_hp`) VALUES
(1, 'Bisa Computer  And Software', 'Perum Pilar Tampingan Indah Blok D9\r\nDesa Ngabean', 85225539836);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_stok`
--

CREATE TABLE `tbl_total_stok` (
  `no_beli` bigint(20) NOT NULL,
  `barang_kode` varchar(50) NOT NULL,
  `total_stok` mediumint(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_total_stok`
--

INSERT INTO `tbl_total_stok` (`no_beli`, `barang_kode`, `total_stok`) VALUES
(1, '20242421258', 14),
(2, '20242429972', 10),
(3, '202407307882', 15),
(4, '202407309481', 15),
(5, '202407314140', 10),
(6, '202407413291', 10),
(7, '202407421394', 10),
(8, '202407434635', 10),
(9, '202407447472', 15),
(10, '202407449782', 10),
(11, '202424496914', 10),
(12, 'B2025021001', 1);

-- --------------------------------------------------------

--
-- Structure for view `laporan_pembelian`
--
DROP TABLE IF EXISTS `laporan_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_pembelian`  AS SELECT `tbl_kategori`.`kategori_nama` AS `kategori_nama`, `tbl_barang`.`barang_nama` AS `barang_nama`, `tbl_supplier`.`supplier_nama` AS `supplier_nama`, `tbl_beli_barang`.`tanggal_beli` AS `tanggal_beli`, `tbl_beli_barang`.`jumlah_barang` AS `jumlah_barang`, `tbl_beli_barang`.`harga_beli` AS `harga_beli`, `tbl_beli_barang`.`harga_jual` AS `harga_jual`, `tbl_beli_barang`.`satuan` AS `satuan`, `tbl_beli_barang`.`total_beli` AS `total_beli`, `tbl_beli_barang`.`tanggal_expired` AS `tanggal_expired` FROM (((`tbl_kategori` join `tbl_barang`) join `tbl_supplier`) join `tbl_beli_barang`) WHERE `tbl_kategori`.`kategori_id` = `tbl_barang`.`kategori_id` AND `tbl_barang`.`barang_kode` = `tbl_beli_barang`.`barang_kode` AND `tbl_supplier`.`supplier_id` = `tbl_beli_barang`.`supplier_id` ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_penjualan`
--
DROP TABLE IF EXISTS `laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_penjualan`  AS SELECT `tbl_karyawan`.`karyawan_nama` AS `karyawan_nama`, `tbl_customer`.`customer_nama` AS `customer_nama`, `tbl_kategori`.`kategori_nama` AS `kategori_nama`, `tbl_barang`.`barang_nama` AS `barang_nama`, `tbl_beli_barang`.`harga_jual` AS `harga_jual`, `tbl_penjualan`.`nota_jual` AS `nota_jual`, `tbl_penjualan`.`tanggal_jual` AS `tanggal_jual`, `tbl_detail_jual`.`jumlah_jual` AS `jumlah_jual`, `tbl_detail_jual`.`diskon` AS `diskon`, `tbl_detail_jual`.`total_bayar` AS `total_bayar` FROM ((((((`tbl_karyawan` join `tbl_customer`) join `tbl_kategori`) join `tbl_barang`) join `tbl_beli_barang`) join `tbl_penjualan`) join `tbl_detail_jual`) WHERE `tbl_karyawan`.`karyawan_id` = `tbl_penjualan`.`karyawan_id` AND `tbl_customer`.`customer_id` = `tbl_penjualan`.`customer_id` AND `tbl_kategori`.`kategori_id` = `tbl_barang`.`kategori_id` AND `tbl_barang`.`barang_kode` = `tbl_beli_barang`.`barang_kode` AND `tbl_beli_barang`.`barang_kode` = `tbl_detail_jual`.`barang_kode` AND `tbl_penjualan`.`nota_jual` = `tbl_detail_jual`.`nota_jual` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD UNIQUE KEY `barang_kode` (`barang_kode`) USING BTREE,
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `tbl_beli_barang`
--
ALTER TABLE `tbl_beli_barang`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_kode` (`barang_kode`) USING BTREE;

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `nohp` (`nohp`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `nota_jual` (`nota_jual`),
  ADD KEY `barang_kode` (`barang_kode`) USING BTREE;

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`karyawan_id`),
  ADD UNIQUE KEY `karyawan_email` (`karyawan_email`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`nota_jual`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indexes for table `tbl_total_stok`
--
ALTER TABLE `tbl_total_stok`
  ADD PRIMARY KEY (`no_beli`),
  ADD KEY `barang_id` (`barang_kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `barang_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_beli_barang`
--
ALTER TABLE `tbl_beli_barang`
  MODIFY `id_beli` bigint(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `detail_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_toko`
--
ALTER TABLE `tbl_toko`
  MODIFY `toko_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_total_stok`
--
ALTER TABLE `tbl_total_stok`
  MODIFY `no_beli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`);

--
-- Constraints for table `tbl_beli_barang`
--
ALTER TABLE `tbl_beli_barang`
  ADD CONSTRAINT `tbl_beli_barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`supplier_id`),
  ADD CONSTRAINT `tbl_beli_barang_ibfk_2` FOREIGN KEY (`barang_kode`) REFERENCES `tbl_barang` (`barang_kode`);

--
-- Constraints for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD CONSTRAINT `tbl_detail_jual_ibfk_4` FOREIGN KEY (`nota_jual`) REFERENCES `tbl_penjualan` (`nota_jual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jual_ibfk_5` FOREIGN KEY (`barang_kode`) REFERENCES `tbl_beli_barang` (`barang_kode`);

--
-- Constraints for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD CONSTRAINT `tbl_penjualan_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  ADD CONSTRAINT `tbl_penjualan_ibfk_4` FOREIGN KEY (`karyawan_id`) REFERENCES `tbl_karyawan` (`karyawan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
