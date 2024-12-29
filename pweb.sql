-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 11:45 AM
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
-- Database: `pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `matakuliah` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama`, `matakuliah`, `no_telp`) VALUES
(13, 'Rama Dian Syah', 'Peranc Analisis & Algoritma */**', '085676543542'),
(15, 'CUKIK', 'PEPE', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `jadwall`
--

CREATE TABLE `jadwall` (
  `id_jadwal` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `matakuliah` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `dosen` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwall`
--

INSERT INTO `jadwall` (`id_jadwal`, `id_dosen`, `hari`, `matakuliah`, `waktu`, `ruang`, `dosen`, `jenis`) VALUES
(7, 13, 'Jumat', '', '08.30 - 11.30', 'D664', '', 'Reguler'),
(8, 15, 'Senin', '', '08.30 - 12.30', 'E441', '', 'Reguler');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwall`
--
ALTER TABLE `jadwall`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `relasi` (`id_dosen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jadwall`
--
ALTER TABLE `jadwall`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwall`
--
ALTER TABLE `jadwall`
  ADD CONSTRAINT `relasi` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
