-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 06:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemerataan_pendidikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset_pendidikan`
--

CREATE TABLE `dataset_pendidikan` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(100) DEFAULT NULL,
  `jumlah_sekolah` int(11) DEFAULT NULL,
  `jumlah_guru` int(11) DEFAULT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `rasio_guru_siswa` double DEFAULT NULL,
  `akses_pendidikan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataset_pendidikan`
--

INSERT INTO `dataset_pendidikan` (`id_wilayah`, `nama_wilayah`, `jumlah_sekolah`, `jumlah_guru`, `jumlah_siswa`, `rasio_guru_siswa`, `akses_pendidikan`) VALUES
(1, 'Medan', 15, 120, 3000, 25, 'Baik'),
(2, 'Binjai', 10, 70, 2500, 35, 'Sedang'),
(3, 'Deli Serdang', 12, 90, 2700, 30, 'Baik'),
(4, 'Tebing Tinggi', 8, 50, 1800, 36, 'Sedang'),
(5, 'Pematang Siantar', 9, 60, 2100, 35, 'Sedang'),
(6, 'Nias', 4, 20, 1800, 90, 'Kurang'),
(7, 'Nias Selatan', 3, 18, 1500, 83, 'Kurang'),
(8, 'Gunungsitoli', 5, 25, 1700, 68, 'Kurang'),
(9, 'Langkat', 11, 80, 2600, 32, 'Baik'),
(10, 'Karo', 7, 40, 1900, 47, 'Sedang');

-- --------------------------------------------------------

--
-- Table structure for table `data_sig`
--

CREATE TABLE `data_sig` (
  `id_sig` int(11) NOT NULL,
  `nama_wilayah` varchar(100) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `cluster` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_sig`
--

INSERT INTO `data_sig` (`id_sig`, `nama_wilayah`, `latitude`, `longitude`, `cluster`) VALUES
(1, 'Medan', 3.5952, 98.6722, 'Cluster 1'),
(2, 'Binjai', 3.6001, 98.4854, 'Cluster 2'),
(3, 'Deli Serdang', 3.5635, 98.8888, 'Cluster 1'),
(4, 'Tebing Tinggi', 3.3274, 99.1623, 'Cluster 2'),
(5, 'Pematang Siantar', 2.9595, 99.0687, 'Cluster 2'),
(6, 'Nias', 1.085, 97.7417, 'Cluster 3'),
(7, 'Nias Selatan', 0.5833, 97.8167, 'Cluster 3'),
(8, 'Gunungsitoli', 1.2881, 97.6143, 'Cluster 3'),
(9, 'Langkat', 3.75, 98.45, 'Cluster 1'),
(10, 'Karo', 3.1167, 98.5167, 'Cluster 2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_cluster`
--

CREATE TABLE `hasil_cluster` (
  `id_cluster` int(11) NOT NULL,
  `nama_wilayah` varchar(100) DEFAULT NULL,
  `cluster` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_cluster`
--

INSERT INTO `hasil_cluster` (`id_cluster`, `nama_wilayah`, `cluster`, `keterangan`, `tanggal`) VALUES
(1, 'Medan', 'Cluster 1', 'Pemerataan Tinggi', '2026-06-21 04:23:27'),
(2, 'Binjai', 'Cluster 2', 'Pemerataan Sedang', '2026-06-21 04:23:27'),
(3, 'Deli Serdang', 'Cluster 1', 'Pemerataan Tinggi', '2026-06-21 04:23:27'),
(4, 'Tebing Tinggi', 'Cluster 2', 'Pemerataan Sedang', '2026-06-21 04:23:27'),
(5, 'Pematang Siantar', 'Cluster 2', 'Pemerataan Sedang', '2026-06-21 04:23:27'),
(6, 'Nias', 'Cluster 3', 'Pemerataan Rendah', '2026-06-21 04:23:27'),
(7, 'Nias Selatan', 'Cluster 3', 'Pemerataan Rendah', '2026-06-21 04:23:27'),
(8, 'Gunungsitoli', 'Cluster 3', 'Pemerataan Rendah', '2026-06-21 04:23:27'),
(9, 'Langkat', 'Cluster 2', 'Pemerataan Sedang', '2026-06-21 04:23:27'),
(10, 'Karo', 'Cluster 2', 'Pemerataan Sedang', '2026-06-21 04:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `training_som`
--

CREATE TABLE `training_som` (
  `id_training` int(11) NOT NULL,
  `nama_wilayah` varchar(100) DEFAULT NULL,
  `jumlah_sekolah` int(11) DEFAULT NULL,
  `jumlah_guru` int(11) DEFAULT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `rasio_guru_siswa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset_pendidikan`
--
ALTER TABLE `dataset_pendidikan`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- Indexes for table `data_sig`
--
ALTER TABLE `data_sig`
  ADD PRIMARY KEY (`id_sig`);

--
-- Indexes for table `hasil_cluster`
--
ALTER TABLE `hasil_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `training_som`
--
ALTER TABLE `training_som`
  ADD PRIMARY KEY (`id_training`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset_pendidikan`
--
ALTER TABLE `dataset_pendidikan`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_sig`
--
ALTER TABLE `data_sig`
  MODIFY `id_sig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hasil_cluster`
--
ALTER TABLE `hasil_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training_som`
--
ALTER TABLE `training_som`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
