-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 06:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `nama_mata_kuliah` varchar(100) DEFAULT NULL,
  `smt` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `ruangan_id`, `nama_dosen`, `nama_mata_kuliah`, `smt`, `kelas`, `jam_mulai`, `jam_akhir`, `hari`) VALUES
(1, 1, 'Dr. Andi', 'Algoritma dan Pemrograman', '1', 'IF-1A', '08:00:00', '09:40:00', 'Senin'),
(2, 1, 'Dr. Andi', 'Algoritma dan Pemrograman', '1', 'IF-1A', '08:00:00', '09:40:00', 'Senin'),
(3, 1, 'Lmao ', 'hehew', '2', 'TI3B', '12:39:00', '12:41:00', 'Senin'),
(4, 1, 'Lmao ', 'hehew', '2', 'TI3B', '12:42:00', '12:44:00', 'Senin'),
(8, 1, 'Lmao ', 'hehew', '2', 'TI3B', '12:47:00', '12:48:00', 'Senin'),
(9, 1, 'Lmao hi', 'hehew', '2', 'TI3B', '12:52:00', '12:53:00', 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `nama_ruangan` varchar(10) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jenis_ruangan` varchar(50) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruangan_id`, `nama_ruangan`, `kapasitas`, `jenis_ruangan`, `lokasi`) VALUES
(1, 'AA204', 30, 'Kelas', 'Lantai 2, Gedung AA'),
(2, 'AA205', 40, 'Kelas', 'Lantai 2, Gedung AA'),
(5, 'AA301', 50, 'Kelas', 'Lantai 3, Gedung AA'),
(6, 'AA302', 50, 'Kelas', 'Lantai 3, Gedung AA'),
(7, 'AA303', 60, 'Kelas', 'Lantai 3, Gedung AA'),
(8, 'AA304', 60, 'Kelas', 'Lantai 3, Gedung AA'),
(9, 'AA305', 70, 'Kelas', 'Lantai 3, Gedung AA'),
(17, 'GSG202', 50, 'Kelas', 'Gedung GSG'),
(18, 'GSG206', 50, 'Kelas', 'Gedung GSG'),
(19, 'GSG207', 50, 'Kelas', 'Gedung GSG'),
(20, 'GSG208', 50, 'Kelas', 'Gedung GSG'),
(21, 'GSG209', 50, 'Kelas', 'Gedung GSG'),
(22, 'GSG210', 50, 'Kelas', 'Gedung GSG'),
(23, 'GSG212', 50, 'Kelas', 'Gedung GSG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`ruangan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
