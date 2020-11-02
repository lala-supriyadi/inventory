-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 02:58 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL,
  `model_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `motif_barang` varchar(50) NOT NULL,
  `size` varchar(25) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `stok` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `model_barang`, `jenis_barang`, `motif_barang`, `size`, `kode_barang`, `gambar`, `stok`) VALUES
(1, 'anak', 'gamis', '12345', 'jumbo', 'gam-an-12345-jum', 'Jellyfish2.jpg', 125);

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE IF NOT EXISTS `bahan` (
  `id` int(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `sub_jenis_barang` varchar(50) NOT NULL,
  `motif_barang` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `stok` int(25) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `jenis_barang`, `sub_jenis_barang`, `motif_barang`, `kode_barang`, `stok`, `satuan`, `gambar`) VALUES
(4, 'katun', 'jepang', '1122', 'kat-jep-1122', 1034, 'yard', 'Chrysanthemum1.jpg'),
(5, 'katun', 'ima', '2345', 'kat-ima-2345', 384, 'roll', 'Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_barang` int(20) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `tgl_masuk`, `jml_barang`, `stok`) VALUES
(1, 'gam-an-1234', '2019-08-17', 0, 100),
(2, 'gam-an-2345', '2019-08-17', 0, 200);

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE IF NOT EXISTS `bayar` (
  `id_bayar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_pelapak` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jml_bayar` int(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id`, `nama_pelapak`, `tgl_bayar`, `jml_bayar`) VALUES
(1, 4, '', '2019-08-22', 1000000),
(2, 4, 'ucok', '2019-08-22', 100000),
(3, 4, 'ucok', '2019-08-23', 1000000),
(4, 4, 'ucok', '2019-08-24', 2000),
(5, 4, '', '2019-08-22', 1000000),
(6, 4, 'ucok', '2019-08-22', 100000),
(7, 4, 'ucok', '2019-08-23', 1000000),
(8, 4, 'ucok', '2019-08-24', 2000),
(9, 4, '', '2019-08-22', 1000000),
(10, 4, 'ucok', '2019-08-22', 100000),
(11, 4, 'ucok', '2019-08-23', 1000000),
(12, 4, 'ucok', '2019-08-24', 2000),
(13, 4, 'ucok', '2019-09-19', 100000),
(14, 6, 'usman', '2019-09-21', 500000),
(15, 7, 'asep', '2019-09-21', 500000);

--
-- Triggers `bayar`
--
DELIMITER $$
CREATE TRIGGER `sisa` AFTER INSERT ON `bayar`
 FOR EACH ROW BEGIN
 UPDATE kredit SET sisa_hutang=sisa_hutang-NEW.jml_bayar
 WHERE id=NEW.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadi_in`
--

CREATE TABLE IF NOT EXISTS `jadi_in` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(45) NOT NULL,
  `model_barang` varchar(50) NOT NULL,
  `motif_barang` varchar(40) NOT NULL,
  `size` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_barang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `jadi_in`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `jadi_in`
 FOR EACH ROW BEGIN
 UPDATE artikel SET stok=stok+NEW.jml_barang
 WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadi_out`
--

CREATE TABLE IF NOT EXISTS `jadi_out` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `nama_pelapak` varchar(50) NOT NULL,
  `motif_barang` varchar(40) NOT NULL,
  `size` varchar(25) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_barang` int(255) NOT NULL,
  `model_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `jadi_out`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `jadi_out`
 FOR EACH ROW BEGIN
 UPDATE artikel SET stok=stok-NEW.jml_barang
 WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kredit`
--

CREATE TABLE IF NOT EXISTS `kredit` (
  `id` int(11) NOT NULL,
  `nama_pelapak` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_kredit` date NOT NULL,
  `kredit_awal` int(25) NOT NULL,
  `jumlah_kredit` int(25) NOT NULL,
  `sisa_hutang` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kredit`
--

INSERT INTO `kredit` (`id`, `nama_pelapak`, `no_tlp`, `alamat`, `tgl_kredit`, `kredit_awal`, `jumlah_kredit`, `sisa_hutang`) VALUES
(4, 'ucok', '78678768768', 'bandung jawa barat indonesia dfsdfdsfdsfdsftryrtyrtyrtyrty', '2019-08-22', 0, 10000000, 3594000),
(5, 'greg', '0987654321', 'bandung', '2019-09-07', 0, 15500000, 15000000),
(6, 'usman', '09876543', 'Bandung', '2019-09-21', 0, 1200000, 700000),
(7, 'asep', '1234567890', 'Bandung', '2019-09-21', 5000000, 5500000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `kredit_baru`
--

CREATE TABLE IF NOT EXISTS `kredit_baru` (
  `id_kreditbaru` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_pelapak` varchar(50) NOT NULL,
  `tgl_kredit` date NOT NULL,
  `jml_kredit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kredit_baru`
--

INSERT INTO `kredit_baru` (`id_kreditbaru`, `id`, `nama_pelapak`, `tgl_kredit`, `jml_kredit`) VALUES
(2, 5, 'greg', '2019-09-21', 500000),
(3, 6, 'usman', '2019-09-21', 200000),
(4, 7, 'asep', '2019-09-21', 500000);

--
-- Triggers `kredit_baru`
--
DELIMITER $$
CREATE TRIGGER `tambah_utang` AFTER INSERT ON `kredit_baru`
 FOR EACH ROW BEGIN
 UPDATE kredit SET jumlah_kredit=jumlah_kredit+NEW.jml_kredit, sisa_hutang=sisa_hutang+NEW.jml_kredit
 WHERE id=NEW.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mentah_in`
--

CREATE TABLE IF NOT EXISTS `mentah_in` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `motif_barang` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_barang` int(25) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1237 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentah_in`
--

INSERT INTO `mentah_in` (`id`, `kode_barang`, `jenis_barang`, `motif_barang`, `tgl_masuk`, `jml_barang`, `satuan`) VALUES
(1235, 'kat-jep-1122', 'katun', '1122', '2019-09-19', 100, ''),
(1236, 'kat-ima-2345', 'katun', '2345', '2019-09-19', 150, 'roll');

--
-- Triggers `mentah_in`
--
DELIMITER $$
CREATE TRIGGER `mentah_masuk` AFTER INSERT ON `mentah_in`
 FOR EACH ROW BEGIN
 UPDATE bahan SET stok=stok+NEW.jml_barang
 WHERE kode_barang=NEW.kode_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mentah_out`
--

CREATE TABLE IF NOT EXISTS `mentah_out` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `motif_barang` varchar(50) NOT NULL,
  `nama_pemaklun` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jml_barang` int(25) NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentah_out`
--

INSERT INTO `mentah_out` (`id`, `kode_barang`, `jenis_barang`, `motif_barang`, `nama_pemaklun`, `tgl_keluar`, `jml_barang`, `satuan`) VALUES
(2, 'kat-jep-1122', 'katun', '1122', 'udin', '2019-09-19', 300, 'yard');

--
-- Triggers `mentah_out`
--
DELIMITER $$
CREATE TRIGGER `mentah_keluar` AFTER INSERT ON `mentah_out`
 FOR EACH ROW BEGIN
 UPDATE bahan SET stok=stok-NEW.jml_barang
 WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemaklun`
--

CREATE TABLE IF NOT EXISTS `pemaklun` (
  `id` int(11) NOT NULL,
  `nama_pemaklun` varchar(50) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_telepon` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
  `kode_barang` varchar(50) NOT NULL,
  `tgl_retur` date NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `motif_barang` varchar(50) NOT NULL,
  `size` varchar(25) NOT NULL,
  `jml_barang` int(15) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`kode_barang`, `tgl_retur`, `jenis_barang`, `motif_barang`, `size`, `jml_barang`, `keterangan`) VALUES
('gam-an-2345', '2019-09-07', 'Gamis', '1234', '', 3, 'Jahitan copot');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `no` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, '1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, '2', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, '4', 'ramdani', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `jadi_in`
--
ALTER TABLE `jadi_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadi_out`
--
ALTER TABLE `jadi_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kredit`
--
ALTER TABLE `kredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kredit_baru`
--
ALTER TABLE `kredit_baru`
  ADD PRIMARY KEY (`id_kreditbaru`);

--
-- Indexes for table `mentah_in`
--
ALTER TABLE `mentah_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentah_out`
--
ALTER TABLE `mentah_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemaklun`
--
ALTER TABLE `pemaklun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `jadi_in`
--
ALTER TABLE `jadi_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jadi_out`
--
ALTER TABLE `jadi_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kredit`
--
ALTER TABLE `kredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kredit_baru`
--
ALTER TABLE `kredit_baru`
  MODIFY `id_kreditbaru` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mentah_in`
--
ALTER TABLE `mentah_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1237;
--
-- AUTO_INCREMENT for table `mentah_out`
--
ALTER TABLE `mentah_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemaklun`
--
ALTER TABLE `pemaklun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
