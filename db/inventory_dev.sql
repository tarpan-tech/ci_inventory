-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 06:38 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `spesifikasi` text,
  `lokasi_barang` varchar(40) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `jml_barang` int(5) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `sumber_dana` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `spesifikasi`, `lokasi_barang`, `kategori`, `jml_barang`, `kondisi`, `sumber_dana`) VALUES
(1004, 'Printer', 'Printer 3 in 1, Print Scan dan Mencuci', 'Gudang', 'ATK', 2, 'New', 'Sekolah'),
(1005, 'Proyektor', 'Merk EPSON', 'Lab RPL', 'Peralatan', 5, 'Baru', 'Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `keluar_barang`
--

CREATE TABLE `keluar_barang` (
  `id_keluar_barang` int(10) NOT NULL,
  `no_pinjam` varchar(10) NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `jumlah_barang_keluar` int(10) DEFAULT NULL,
  `keperluan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar_barang`
--

INSERT INTO `keluar_barang` (`id_keluar_barang`, `no_pinjam`, `tanggal_keluar`, `penerima`, `jumlah_barang_keluar`, `keperluan`) VALUES
(8001, '6002', '2018-06-04', 'Agus', 20, 'Tidak ada'),
(8002, '6001', '2018-06-04', 'Soebandono', 3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `masuk_barang`
--

CREATE TABLE `masuk_barang` (
  `id_masuk_barang` varchar(10) NOT NULL,
  `kode_supplier` int(10) DEFAULT NULL,
  `kode_barang` int(10) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `jumlah_masuk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk_barang`
--

INSERT INTO `masuk_barang` (`id_masuk_barang`, `kode_supplier`, `kode_barang`, `tanggal_masuk`, `jumlah_masuk`) VALUES
('50001', 2001, 1004, '2018-06-12', 200),
('50002', 2003, 1004, '2018-06-02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `no_pinjam` varchar(10) NOT NULL,
  `kode_barang` int(10) NOT NULL,
  `jumlah_pinjam` int(10) DEFAULT NULL,
  `peminjam` varchar(100) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`no_pinjam`, `kode_barang`, `jumlah_pinjam`, `peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`) VALUES
('6001', 1004, 1, 'Andi', '2018-06-02', '2018-06-09', 'Tidak ada'),
('6002', 1005, 1, 'Dandi', '2018-06-03', '2018-06-04', 'Tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode_stok` int(10) NOT NULL,
  `kode_barang` int(10) DEFAULT NULL,
  `jumlah_barang_masuk` int(10) DEFAULT NULL,
  `jumlah_barang_keluar` int(10) DEFAULT NULL,
  `total_barang` int(10) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode_stok`, `kode_barang`, `jumlah_barang_masuk`, `jumlah_barang_keluar`, `total_barang`, `keterangan`) VALUES
(9001, 1004, 10, 8, 2, '-'),
(9002, 1005, 20, 5, 15, 'Update');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat_supplier` text,
  `telp_supplier` varchar(25) DEFAULT NULL,
  `kota_supplier` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`) VALUES
(2001, 'PT. Artha Grahajaya', 'Jl. Cibaligo', '08548273482', 'Bandung Barat'),
(2002, 'CV. Sparta Computindo', 'Jl. Pahlawan', '081682376423', 'Bandung'),
(2003, 'CV. Ultratex', 'Jl. Cibaligo', '08965412376123', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Sahrizal Amirul Firdaus', 'sahrizal', '$2y$10$k5HAgNPY0GJ8e897dKpQOe8DE6uqx6qgf6rfUhpT2/6odf4c3hpri', 1),
(2, 'Doni', 'admin', '$2y$10$FPAG4vi1upDj6g1j0JJKauFnnuTj1dhd8S6k00UXO6dcjQK2LEViS', 1),
(3, 'Nina', 'operator', '$2y$10$Jjs2u1JjR52e34y9Rppfa.fZigLdFehRviw4XmSaVH9W0miXau6Qe', 2),
(4, 'Jeff Hendrick', 'admin2', '$2y$10$sMZPNJgRtWqVcuPHxd1/T.ctd4teVJWdX5pc6pcUVLHG7cEGnlYRO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD PRIMARY KEY (`id_keluar_barang`),
  ADD KEY `id_keluar_barang` (`no_pinjam`);

--
-- Indexes for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD PRIMARY KEY (`id_masuk_barang`),
  ADD KEY `kode_supplier` (`kode_supplier`,`kode_barang`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kode_stok`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  MODIFY `id_keluar_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8003;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `kode_stok` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9003;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD CONSTRAINT `keluar_barang_ibfk_1` FOREIGN KEY (`no_pinjam`) REFERENCES `pinjam_barang` (`no_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD CONSTRAINT `masuk_barang_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `masuk_barang_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
