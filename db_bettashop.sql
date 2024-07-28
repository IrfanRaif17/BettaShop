-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 02:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bettashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(3, 'M Irfan Raif', 'irfan', '21232f297a57a5a743894a0e4a801fc3', '082283796799', 'irfanraifgokil@gmail.com', 'Jl.asoka dalam, perum bumi indah, batu 10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datainfo`
--

CREATE TABLE `tb_datainfo` (
  `produk_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `produk_name` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `produk_description` text NOT NULL,
  `produk_image` varchar(100) NOT NULL,
  `produk_status` tinyint(1) NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datainfo`
--

INSERT INTO `tb_datainfo` (`produk_id`, `category_id`, `produk_name`, `harga`, `produk_description`, `produk_image`, `produk_status`, `data_create`) VALUES
(33, 41, 'kontes ikan cupang', 10000000, '<p>aaaa</p>\r\n', 'produk1671047330.jpg', 1, '2022-12-14 19:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `category_id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`category_id`, `jenis`) VALUES
(41, 'Kontes Ikan Cupang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori`) VALUES
(5, 'Bebas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjual`
--

CREATE TABLE `tb_penjual` (
  `penjual_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `penjual_name` varchar(100) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `penjual_address` text NOT NULL,
  `penjual_email` varchar(20) NOT NULL,
  `penjual_notlp` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjual`
--

INSERT INTO `tb_penjual` (`penjual_id`, `username`, `penjual_name`, `nama_toko`, `penjual_address`, `penjual_email`, `penjual_notlp`, `password`) VALUES
(2, 'admin', 'M Irfan Raif', 'sejahtera', 'JL. Asoka Dalam', '2001020056@student.u', '082283796799', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produkpenjual`
--

CREATE TABLE `tb_produkpenjual` (
  `produk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `produk_name` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `produk_description` text NOT NULL,
  `produk_image` varchar(50) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produkpenjual`
--

INSERT INTO `tb_produkpenjual` (`produk_id`, `kategori_id`, `produk_name`, `harga`, `stok`, `produk_description`, `produk_image`, `id_status`, `data_create`) VALUES
(23, 5, 'giang', 100000, '100', '<p>ikan cupang</p>\r\n', 'penjual1671064040.jpg', 1, '2022-12-15 00:27:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_datainfo`
--
ALTER TABLE `tb_datainfo`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_penjual`
--
ALTER TABLE `tb_penjual`
  ADD PRIMARY KEY (`penjual_id`);

--
-- Indexes for table `tb_produkpenjual`
--
ALTER TABLE `tb_produkpenjual`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_datainfo`
--
ALTER TABLE `tb_datainfo`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penjual`
--
ALTER TABLE `tb_penjual`
  MODIFY `penjual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_produkpenjual`
--
ALTER TABLE `tb_produkpenjual`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
