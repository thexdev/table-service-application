-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2019 at 05:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restosaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `nama_diskon` varchar(255) NOT NULL,
  `jumlah_diskon` int(3) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `nama_diskon`, `jumlah_diskon`, `status`) VALUES
(1, 'Daily Discount', 5, 'aktif'),
(2, 'Hari Raya', 20, 'nonaktif'),
(4, 'Hari Jadi', 70, 'nonaktif'),
(5, 'Weekend Deal', 30, 'nonaktif'),
(6, 'Pasti Beli', 80, 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` text NOT NULL,
  `harga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`) VALUES
(2, 'Roti Bakar Selai', 7000),
(3, 'Ayam Goreng Original', 15000),
(4, 'Pisang Bakar Coklat Keju', 7000),
(7, 'Ayam Geprek', 13000),
(8, 'Mie Ayam Spesial', 10000),
(9, 'Soto Lamongan', 15000),
(10, 'Sate Padang', 18000),
(11, 'Bakso Spesial', 15000),
(12, 'Ikan Gurami Goreng Krispi Asam Manis', 25000),
(13, 'Kopi Hitam', 3500),
(14, 'Pecel Lele', 16000),
(15, 'Ketoprak', 13000),
(17, 'Ayam Penyet Kampung', 16000),
(18, 'Ayam Bakar Pedas Spesial', 20000),
(19, 'Cappuccino', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` text NOT NULL,
  `menu` int(11) NOT NULL,
  `qtt` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `menu`, `qtt`, `status`) VALUES
(14, 'M. Akbar Nugroho', 1, 1, 'Sukses'),
(31, 'M. Akbar Nugroho', 18, 1, 'Sukses'),
(32, 'M. Wildan', 11, 2, 'Sukses'),
(33, 'Syarianum', 8, 3, 'Sukses');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `pesanan` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `pesanan`, `diskon`, `tanggal`, `total_bayar`) VALUES
(7, 14, 0.1, '29/03/19', 72000),
(8, 15, 0.1, '29/03/19', 13500),
(10, 16, 0.5, '29/03/19', 62500),
(11, 17, 0.1, '29/03/19', 11700),
(12, 18, 0.1, '31/03/19', 12600),
(13, 19, 0.1, '31/03/19', 16200),
(14, 20, 0.1, '31/03/19', 28800),
(15, 21, 0.1, '31/03/19', 9000),
(16, 26, 10, '20/06/19', 13500),
(17, 26, 10, '20/06/19', 13500),
(18, 27, 10, '20/06/19', 13500),
(19, 28, 10, '20/06/19', 13500),
(20, 29, 10, '20/06/19', 13500),
(21, 30, 10, '20/06/19', 13500),
(22, 31, 10, '20/06/19', 13500),
(23, 32, 5, '21/06/19', 28500),
(24, 33, 5, '21/06/19', 28500);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin@email.com', '4f033a0a2bf2fe0b68800a3079545cd1', 'admin'),
(3, 'Kasir', 'kasir@email.com', 'd41d8cd98f00b204e9800998ecf8427e', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
