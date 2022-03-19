-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2022 pada 14.38
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `listrik` varchar(100) NOT NULL,
  `air` varchar(100) NOT NULL,
  `jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
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
-- Dumping data untuk tabel `daftar`
--

INSERT INTO `daftar` (`id`, `id_user`, `jumlah`, `bayar`, `waktu`, `tanggal`) VALUES
(10, 9, '56000', '0', '01:59:11', '2022-03-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelengkapan`
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
-- Dumping data untuk tabel `kelengkapan`
--

INSERT INTO `kelengkapan` (`id`, `nama`, `no_kamar`, `jml_orang`, `laptop`, `rice_cooker`, `kipas`, `tv`) VALUES
(9, 'Avhan', 'B4', 2, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masa`
--

CREATE TABLE `masa` (
  `id` int(11) NOT NULL,
  `awal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masa`
--

INSERT INTO `masa` (`id`, `awal_masuk`) VALUES
(1, '2021-03-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `level`, `foto`) VALUES
(1, 'Avhan', 'admin', 'admin', 'avatar5.png'),
(2, 'avhan', '12345', 'user', 'user4-128x128.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indeks untuk tabel `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masa`
--
ALTER TABLE `masa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `masa`
--
ALTER TABLE `masa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
