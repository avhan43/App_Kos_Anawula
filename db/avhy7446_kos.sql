-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2021 at 05:45 PM
-- Server version: 10.3.29-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avhy7446_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `listrik` varchar(100) NOT NULL,
  `air` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `bayar` varchar(5) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `id_user`, `jumlah`, `bayar`, `waktu`, `tanggal`) VALUES
(10, 9, '56000', '0', '04:08:56', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_kamar` varchar(10) NOT NULL,
  `jml_orang` int(11) NOT NULL,
  `laptop` int(11) NOT NULL,
  `rice_cooker` int(11) NOT NULL,
  `kipas` int(11) NOT NULL,
  `tv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelengkapan`
--

INSERT INTO `kelengkapan` (`id`, `nama`, `no_kamar`, `jml_orang`, `laptop`, `rice_cooker`, `kipas`, `tv`) VALUES
(9, 'Avhan', 'B4', 2, 2, 0, 1, 0),
(16, 'Test', 'L2', 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `level`, `foto`) VALUES
(1, 'Avhan', 'admin', 'admin', 'avatar5.png'),
(2, 'avhan', '12345', 'user', 'user4-128x128.jpg'),
(16, 'Test', '12345', 'user', 'avatar2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
