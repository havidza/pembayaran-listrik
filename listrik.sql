-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 05:09 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_Pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_Pelanggan`, `nama`, `alamat`, `kode`) VALUES
(56251, 'Joko Susanto', 'Colomadu', 'B'),
(56252, 'Sri Rejeki', 'Manahan', 'B'),
(56253, 'Jumantono', 'Mojolaban', 'A'),
(56254, 'Sugeng', 'Solobaru', 'D'),
(56255, 'Havid', 'bAKI', 'A'),
(56256, 'jUIK', 'jui', 'C'),
(56257, 'Paijo Soepardman', 'Kebumen', 'C'),
(56258, 'Djoko', 'Sawahan', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_Pelanggan` mediumint(255) NOT NULL,
  `ID_Tagihan` int(11) NOT NULL,
  `jumlah_tgh` int(11) NOT NULL,
  `biaya_denda` int(11) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `total_byr` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_Pelanggan`, `ID_Tagihan`, `jumlah_tgh`, `biaya_denda`, `biaya_admin`, `total_byr`, `status`) VALUES
(56251, 1, 200000, 5000, 2000, 91000000, 'Lunas'),
(56252, 2, 800, 5000, 2000, 364000, 'Lunas'),
(56253, 3, 40000, 5000, 2000, 13000000, 'Lunas'),
(56256, 5, 40000, 5000, 2000, 28320000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `ID_Pelanggan` int(11) NOT NULL,
  `ID_Tagihan` int(11) NOT NULL,
  `TahunTagih` int(11) NOT NULL,
  `BulanTagih` varchar(100) NOT NULL,
  `PemakaianF` int(11) NOT NULL,
  `PemakaianL` int(11) NOT NULL,
  `PemakaianT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`ID_Pelanggan`, `ID_Tagihan`, `TahunTagih`, `BulanTagih`, `PemakaianF`, `PemakaianL`, `PemakaianT`) VALUES
(56251, 1, 2018, 'APRIL', 200000, 400000, 200000),
(56252, 2, 2017, 'SEPTEMBER', 200, 1000, 800),
(56253, 3, 2017, 'JUNI', 50000, 90000, 40000),
(56254, 4, 2018, 'JUNI', 10000, 40000, 30000),
(56255, 2, 2011, 'MEI', 800000, 900000, 100000),
(56256, 5, 2017, 'OKTOBER', 10000, 50000, 40000),
(56257, 8, 2017, 'APRIL', 20000, 50000, 30000),
(56258, 9, 2018, 'JANUARI', 1000, 2000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `kode` varchar(20) NOT NULL,
  `daya` varchar(10) NOT NULL,
  `tarif_perKWH` int(11) NOT NULL,
  `beban` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`kode`, `daya`, `tarif_perKWH`, `beban`) VALUES
('A', '450 VA', 325, '1500'),
('B', '900 VA', 455, '2500'),
('C', '1300 VA', 708, '3500'),
('D', '2200 VA', 760, '4500'),
('E', '3500 VA', 900, '6500'),
('F', '4000 VA', 1000, '7000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'FREEZY', 'c8910b7ee4d388d81bffee5cd963c41f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_Pelanggan`),
  ADD KEY `kwh` (`kode`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_Pelanggan`),
  ADD KEY `id_tagihan` (`ID_Tagihan`),
  ADD KEY `ID_Tagihan_2` (`ID_Tagihan`),
  ADD KEY `ID_Tagihan_3` (`ID_Tagihan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`ID_Pelanggan`,`ID_Tagihan`),
  ADD KEY `ID_Pelanggan` (`ID_Pelanggan`),
  ADD KEY `ID_Tagihan` (`ID_Tagihan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_Pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56259;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `tarif` (`kode`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_Tagihan`) REFERENCES `tagihan` (`ID_Tagihan`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `pelanggan` (`ID_Pelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
