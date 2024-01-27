-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 04:16 PM
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
(21, 2, 'Asep Kurniawan, S.Pd., M.Kom.', 'Jaringan Komputer', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'SENIN'),
(22, 2, 'Indra Hermawan, S.Kom., M.Kom.', 'Piranti Komputer', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'SENIN'),
(23, 2, 'Euis Oktavianti, S.Si., M.T.I.', 'Matematika Diskrit', '2', 'TI CCIT 1B', '07:30:00', '10:50:00', 'SELASA'),
(24, 2, 'Dinda Kadarwati, M.Pd.', 'Bahasa Indonesia', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'SELASA'),
(25, 2, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Inggris TI K1', '1', 'TMJ CCIT S', '07:30:00', '10:50:00', 'SELASA'),
(26, 2, 'Susana Dwi Yulianti, M.Kom.', 'Matematika Diskrit', '1', 'TMJ CCIT S', '07:30:00', '10:50:00', 'SELASA'),
(27, 2, 'Deffana Arnaldy, S.Tp., M.Si.', 'Keamanan Komputer', '3', 'TI 3B', '07:30:00', '10:50:00', 'RABU'),
(28, 2, 'Ariawan Andi Suhandana, S.Kom., M.Ti.', 'Algoritma dan Pemrograman', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'KAMIS'),
(29, 2, 'Deffana Arnaldy, S.Tp., M.Si.', 'Keamanan Komputer', '3', 'TI 3A', '07:30:00', '10:50:00', 'KAMIS'),
(30, 2, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Operasi', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'JUMAT'),
(31, 2, 'Asep Kurniawan, S.Pd., M.Kom.', 'Infrastruktur Jaringan/ perutean dan penyambungan', '3', 'TI 3B', '07:30:00', '10:50:00', 'JUMAT'),
(32, 1, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Infrastruktur Jaringan/ perutean dan penyambungan', '3', 'TMJ 3A', '07:30:00', '10:50:00', 'SENIN'),
(33, 1, 'Dr. Anita Hidayati, S.Kom., M.Kom.', 'Rekayasa Perangkat Lunak', '3', 'TMJ 3A', '10:50:00', '15:00:00', 'SENIN'),
(34, 1, 'Ayu Rosyida Zain, M.T', 'Piranti Komputer', '1', 'TMJ CCIT S', '07:30:00', '10:50:00', 'SELASA'),
(35, 1, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris untuk TIK', '1', 'TMJ CCIT S', '10:50:00', '13:20:00', 'SELASA'),
(36, 1, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Operasi', '1', 'TMJ 1B', '13:20:00', '16:40:00', 'SELASA'),
(37, 1, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Teknologi Multimedia', '1', 'TMJ 1B', '07:30:00', '10:50:00', 'RABU'),
(38, 1, 'Drs. Agus Setiawan, M.Kom.', 'Matematika diskrit', '1', 'TI 1A', '07:30:00', '10:50:00', 'KAMIS'),
(39, 1, 'Dr. Prihatin Oktivasari, S.Si., M.Si', 'Sistem Embedded', '3', 'TMJ 3B', '12:30:00', '17:30:00', 'KAMIS'),
(40, 1, 'Ayres Pradiptyas, S.ST., M.M.', 'Kewarganegaraan', '1', 'TMJ 1B', '07:30:00', '10:50:00', 'JUMAT'),
(41, 1, 'Ariawan Andi Suhandana, S.Kom., M.T.', 'Algoritma dan Pemrograman', '1', 'TMJ 1B', '10:50:00', '15:00:00', 'JUMAT'),
(42, 5, 'Rizki Elisa Nalawati, S.T., M.T.', 'Kecerdasan Buatan', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'SENIN'),
(43, 5, 'Sinnatrya Feranti Anindya, S.T., M.T.', 'Pengantar Multimedia', '3', 'TI CCIT 3B', '10:50:00', '15:00:00', 'SENIN'),
(44, 5, 'Mira Rosalina, S.Pd., M.T.', 'Pemodelan 3D', '3', 'TI D3 3B', '07:30:00', '10:50:00', 'SELASA'),
(45, 5, 'Dr. Dewi Yanti Liliana, S.Kom., M.Kom.', 'Algoritma & Pemrograman', '1', 'TI 1A', '07:30:00', '10:50:00', 'RABU'),
(46, 5, 'Irwan Iftadi, S.T., M.T.', 'Organisasi & Arsitektur Komputer', '1', 'TI 1B', '10:50:00', '15:00:00', 'RABU'),
(47, 5, 'Asep Taufik Muharram, S.Kom., M.Kom.', 'Pemrograman Web Lanjutan', '3', 'TI 3A', '07:30:00', '10:50:00', 'KAMIS'),
(48, 5, 'Chandra Wirawan, M.Kom.', 'Pemrograman Visual', '3', 'TI CCIT 3B', '10:50:00', '15:00:00', 'KAMIS'),
(49, 5, 'Iklima Ermis Ismail, S.Kom., M.Kom.', 'Algoritma & Pemrograman', '1', 'TI 1A', '07:30:00', '10:50:00', 'JUMAT'),
(50, 5, 'Rizki Elisa Nalawati, S.T., M.T.', 'Kecerdasan Buatan', '3', 'TI 3B', '10:50:00', '15:00:00', 'JUMAT'),
(51, 6, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Desain Web', '3', 'TI MD3 3B', '07:30:00', '10:50:00', 'SENIN'),
(52, 6, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Hukum dan Etika', '3', 'TI MD3 3B', '10:50:00', '15:00:00', 'SENIN'),
(53, 6, 'Indah Sari Mukarramah, M.T.', 'Pancasila', '3', 'TI MD3 3B', '07:30:00', '10:50:00', 'SELASA'),
(54, 6, 'Maudy Laya, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI 3B', '10:50:00', '15:00:00', 'SELASA'),
(55, 6, 'Indah Sari Mukarramah, M.T.', 'Kewarganegaraan', '1', 'TI MD 3B', '07:30:00', '10:50:00', 'RABU'),
(56, 6, 'Noorlela Marheta, S.Kom., M.Kom./ Dr. Anita Hidayati, S.Kom., M.Kom.', 'Pengantar Multimedia', '1', 'TI MD 3A', '10:50:00', '15:00:00', 'RABU'),
(57, 6, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Pengantar Jaringan Komputer', '1', 'TI MD 3A', '07:30:00', '10:50:00', 'KAMIS'),
(58, 6, 'Maria Agustina, S.Kom., M.Kom.', 'Pemrograman Web (Front, Back End)', '3', 'TI 3A', '10:50:00', '15:00:00', 'KAMIS'),
(59, 6, 'Ratna Widyawara, S.Pd., M.Pd.', 'Bahasa Indonesia', '1', 'TI 1B', '07:30:00', '10:50:00', 'JUMAT'),
(60, 6, 'Mera Kartika D., S.Si., M.T., Ph.D', 'Matematika Diskrit', '1', 'TI 1B', '10:50:00', '15:00:00', 'JUMAT'),
(61, 6, 'Maria Agustina, S.Kom., M.Kom.', 'Teknologi Multimedia', '1', 'TI 1A', '07:30:00', '10:50:00', 'SABTU'),
(62, 6, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Seminar', '7', 'TI MD 7A', '07:30:00', '10:50:00', 'SABTU'),
(63, 6, 'Hatta Maulana, S.Si., M.Ti.', 'Kapita Selekta 1', '7', 'TI MD 7A', '10:50:00', '15:00:00', 'SABTU'),
(64, 7, 'Iwan Sonjaya, S.T., M.T.', 'Desain UI/UX', '3', 'TI 3B', '07:30:00', '10:50:00', 'SENIN'),
(65, 7, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Pemrograman Web Lanjut', '3', 'TI 3B', '12:30:00', '15:50:00', 'SENIN'),
(66, 7, 'Chandra Wirawan, M.Kom.', 'Pemrograman Web Lanjut', '3', 'TI 3B', '07:30:00', '10:50:00', 'SELASA'),
(67, 7, 'Bambang Warsuta, S.Kom., M.T.I.', 'Desain UI/UX', '2', 'TI CCIT 3A', '07:30:00', '10:50:00', 'SELASA'),
(68, 7, 'Sinnatrya Feranti Anindya, S.T., M.T.', 'Grafika Komputer', '3', 'TI MD 3B', '10:50:00', '15:50:00', 'SELASA'),
(69, 7, 'Rizki Elisa Nalawati, S.T., M.T.', 'Pemrograman Visual', '3', 'TI 3A', '07:30:00', '10:50:00', 'RABU'),
(70, 7, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Inggris Untuk TIK', '1', 'TI 1B', '10:50:00', '15:00:00', 'RABU'),
(71, 7, 'Chandra Wirawan, M.Kom.', 'Pemrograman Visual', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'KAMIS'),
(72, 7, 'Bambang Warsuta, S.Kom., M.T.I.', 'Desain UI/UX', '3', 'TI 3B', '10:50:00', '15:00:00', 'KAMIS'),
(73, 7, 'Iklima Ermis Ismail, S.Kom., M.Kom.', 'Pemrograman Basis Data', '1', 'TI 1A', '07:30:00', '10:50:00', 'JUMAT'),
(74, 7, 'Rizki Elisa Nalawati, S.T., M.T.', 'Pemrograman Basis Data', '3', 'TI 3B', '10:50:00', '15:00:00', 'JUMAT'),
(75, 7, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI 3A', '12:30:00', '16:40:00', 'JUMAT'),
(76, 8, 'Bambang Warsuta, S.Kom., M.T.I.', 'Desain UI/UX', '3', 'TI CCIT 3A', '07:30:00', '10:50:00', 'SENIN'),
(77, 8, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Desain Web', '3', 'TI MD 3A', '10:50:00', '15:00:00', 'SENIN'),
(78, 8, 'Fitria Nugraheni, S.Pd., M.Si.', 'Bahasa Inggris untuk TIK', '1', 'TI MD 1B', '07:30:00', '10:50:00', 'SELASA'),
(79, 8, 'Malisa Huzaifa, S.Kom., M.T.', 'Pemrograman Berbasis Objek', '3', 'TI MD 3A', '12:30:00', '15:50:00', 'SELASA'),
(80, 8, 'Eriya, S.Kom., M.T.', 'Rekayasa Perangkat Lunak Multimedia', '3', 'TI MD 3A', '07:30:00', '10:50:00', 'RABU'),
(81, 8, 'Hatta Maulana, S.Si., M.Ti.', 'Sistem Operasi', '3', 'TI MD 3A', '10:50:00', '15:00:00', 'RABU'),
(82, 8, 'Eriya, S.Kom., M.T.', 'Pengantar TIK', '1', 'TI MD 1B', '07:30:00', '10:50:00', 'KAMIS'),
(83, 8, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Pengantar Desain Komunikasi Visual', '1', 'TI MD 1A', '12:30:00', '15:50:00', 'KAMIS'),
(84, 8, 'Ratna Widya Iswara, S.Pd., M.Pd.', 'Bahasa Indonesia', '1', 'TI CCIT SE', '07:30:00', '10:50:00', 'JUMAT'),
(85, 8, 'Mera Kartika D., S.Si., M.T., Ph.D', 'Matematika Diskrit', '1', 'TI MD 1B', '10:50:00', '15:00:00', 'JUMAT'),
(86, 8, 'Maria Agustina, S.Kom., M.Kom.', 'Teknologi Multimedia', '1', 'TI MD 1A', '12:30:00', '15:50:00', 'JUMAT'),
(87, 9, 'Hatta Maulana, S.Si., M.Ti.', 'Pengujian dan Evaluasi', '5', 'TI MD 5A', '09:10:00', '15:00:00', 'SENIN'),
(88, 9, 'Dr. Prihatin Oktivassari, S.Si., M.Si', 'Etika Profesional', '5', 'TI MD 5', '07:30:00', '13:20:00', 'SELASA'),
(89, 9, 'Indra Hermawan, S.Kom., M.Kom.', 'Seminar', '7', 'TI MD 7', '07:30:00', '13:20:00', 'JUMAT'),
(90, 9, 'Deffana Arnaldy, S.Tp., M.Si.', 'Kapita Selekta I', '7', 'TI MD 7', '13:20:00', '18:20:00', 'JUMAT'),
(91, 9, 'Dinda Kadarwati, M.Pd.', 'Praktek Kerja Lapangan', '7', 'TI MD 7', '07:30:00', '18:20:00', 'SABTU'),
(92, 18, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris TI K1', '1', 'TI 1A', '07:30:00', '10:50:00', 'SENIN'),
(93, 18, 'Maria Agustin, S.Kom., M.Kom.', 'Komunikasi Profesional', '5', 'TMJ 5', '15:00:00', '18:20:00', 'SENIN'),
(94, 18, 'Iwan Sonjaya, S.T., M.T.', 'Desain UI/UX', '5', 'TMJ 5', '07:30:00', '10:50:00', 'SELASA'),
(95, 18, 'Asep Kurniawan, S.Pd., M.Kom.', 'Perencanaan Jaringan', '1', 'TI CCIT 1A', '13:20:00', '18:20:00', 'SELASA'),
(96, 18, 'Iwan Sonjaya, S.T., M.T.', 'Teknologi Multimedia', '1', 'TI CCIT 3A', '10:50:00', '14:10:00', 'RABU'),
(97, 18, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Terdistribusi', '1', 'TI 1B', '15:00:00', '18:20:00', 'RABU'),
(98, 18, 'Chandra Wirawan, M.Kom.', 'Organisasi & Arsitektur Komputer', '1', 'TI 1B', '07:30:00', '10:50:00', 'KAMIS'),
(99, 18, 'Melisa Gustiarna, M.Pd.', 'Pengantar Desain Komunikasi Visual', '1', 'TMD 1B', '10:50:00', '15:00:00', 'JUMAT'),
(100, 18, 'Mira Rosalina, S.Pd., M.T.', 'Pancasila', '1', 'TI 1A', '07:30:00', '10:50:00', 'SABTU'),
(101, 18, 'Ayres Pradiptyas, S.ST., M.M.', 'Kewarganegaraan', '1', 'TI 1B', '10:50:00', '14:10:00', 'SABTU'),
(102, 18, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris TI K1', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'SABTU'),
(103, 19, 'Indah Sari Mukarramah, M.T.', 'Pancasila', '3', 'TMD 3A', '07:30:00', '10:50:00', 'SENIN'),
(104, 19, 'Fitria Nugraheni, S.Pd., M.Si.', 'Bahasa Indonesia', '1', 'TI CCIT 1A', '10:50:00', '14:20:00', 'SENIN'),
(105, 19, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Terdistribusi', '3', 'TI 3A', '07:30:00', '10:50:00', 'SELASA'),
(106, 19, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Metode Numerik', '3', 'TMJ 3B', '10:50:00', '15:50:00', 'SELASA'),
(107, 19, 'Asep Kurniawan, S.Pd., M.Kom.', 'Organisasi & Arsitektur Komputer', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'RABU'),
(108, 19, 'Euis Oktavianti, S.Si., M.Ti.', 'Metode Numerik', '3', 'TI 3A', '13:20:00', '16:40:00', 'RABU'),
(109, 19, 'Hatta Maulana, S.Si., M.Ti.', 'Matematika Diskrit', '1', 'TMD 1B', '07:30:00', '10:50:00', 'KAMIS'),
(110, 19, 'Eriya, S.Kom., M.T.', 'Rekayasa Perangkat Lunak Multimedia', '3', 'TMD 3B', '10:50:00', '15:00:00', 'KAMIS'),
(111, 19, 'Ady Arman, S.Pd., M.Kom.I', 'Pendidikan Agama', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'JUMAT'),
(112, 19, 'Euis Oktavianti, S.Si., M.Ti.', 'Metode Numerik', '3', 'TI CCIT 3B', '10:50:00', '14:10:00', 'JUMAT'),
(113, 19, 'Eriya, S.Kom., M.T.', 'Teknologi Multimedia', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'SABTU'),
(114, 19, 'Fitria Nugraheni, S.Pd., M.Si', 'Komunikasi Profesional', '5', 'TMD 5A', '13:20:00', '17:30:00', 'SABTU'),
(115, 20, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'SENIN'),
(116, 20, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris Untuk TIK', '1', 'TI CCIT 1B', '10:50:00', '14:20:00', 'SENIN'),
(117, 20, 'Ratna Widya Iswara, S.Pd., M.Pd.', 'English for IT Professional', '3', 'TMJ 3B', '13:20:00', '16:40:00', 'SENIN'),
(118, 20, 'Noorlela Marcheta, S.Kom., M.Kom.', 'Hukum dan Etika', '1', 'TMJ 3B', '07:30:00', '10:50:00', 'SELASA'),
(119, 20, 'Ariawan Andi Suhandana, S.Kom., M.T.', 'Pemrograman Berorientasi Objek', '3', 'TI 3A', '10:50:00', '15:50:00', 'SELASA'),
(120, 20, 'Maudy Laya, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI CCIT 3A', '07:30:00', '10:50:00', 'RABU'),
(121, 20, 'Ayres Pradiptyas, S.ST., M.M.', 'Pancasila', '1', 'TI CCIT 1B', '10:50:00', '14:30:00', 'RABU'),
(122, 20, 'Ayu Rosyida Zain, M.T.', 'Pemodelan Jaringan', '5', 'TMJ 5', '13:20:00', '17:30:00', 'RABU'),
(123, 20, 'Bambang Warsuta, S.Kom., M.T.I.', 'Manajemen Proyek', '3', 'TI 3A', '07:30:00', '10:50:00', 'KAMIS'),
(124, 20, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '1', 'TI 3A', '10:50:00', '14:10:00', 'KAMIS'),
(125, 20, 'Dinda Kadarwati, M.Pd.', 'Pancasila', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'JUMAT'),
(126, 20, 'Iwan Sonjaya, S.T., M.T.', 'Perancangan dan Pengembangan Game', '3', 'TMD 3A', '13:20:00', '16:40:00', 'JUMAT'),
(127, 21, 'Susana Dwi Yulianti, M.Kom.', 'Rekayasa Perangkat Lunak', '3', 'TMS 3B', '07:30:00', '10:50:00', 'SENIN'),
(128, 21, 'Mera Kartika D., S.Si., M.T., Ph.D', 'Pengantar TIK', '1', 'TMD 1A', '10:50:00', '15:50:00', 'SENIN'),
(129, 21, 'Bambang Warsuta, S.Kom., M.T.I.', 'Pengantar TIK', '1', 'TMD 1A', '07:30:00', '10:50:00', 'SELASA'),
(130, 21, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Indonesia', '1', 'TMD 1B', '10:50:00', '14:20:00', 'SELASA'),
(131, 21, 'Dr. Anita Hidayati, S.Kom., M.Kom.', 'Analisa dan Desain Sistem Informasi', '1', 'TI CCIT SE', '07:30:00', '10:50:00', 'RABU'),
(132, 21, 'Euis Oktavianti, S.Si., M.T.I.', 'Metode Numerik', '3', 'TI CCIT 3B', '10:50:00', '15:50:00', 'RABU'),
(133, 21, 'Malisa Huzaifa, S.Kom., M.T.', 'Pemrograman Berbasis Objek', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'KAMIS'),
(134, 21, 'Hatta Maulana, S.Si., M.Ti.', 'Sistem Operasi', '3', 'TMD 3B', '10:50:00', '15:50:00', 'KAMIS'),
(135, 21, 'Fitria Nugraheni, S.Pd., M.Si.', 'Bahasa Indonesia', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'JUMAT'),
(136, 21, 'Sinantya Feranti Anindya, S.T., M.T.', 'Grafika Komputer', '3', 'TMD 3A', '10:50:00', '15:50:00', 'JUMAT'),
(137, 22, 'Drs. Agus Setiawan, M.Kom.', 'Matematika Diskrit', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'SENIN'),
(138, 22, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Inggris TIK 1', '1', 'TMD 1A', '15:00:00', '18:20:00', 'SENIN'),
(139, 22, 'Ariawan Andi Suhandana, S.Kom., M.Ti.', 'Pemrograman Berorientasi Objek', '3', 'TMJ 3A', '07:30:00', '10:50:00', 'SELASA'),
(140, 22, 'Indra Hermawan, S.Kom., M.Kom.', 'Sistem Embedded', '3', 'TMJ 3B', '10:50:00', '15:50:00', 'SELASA'),
(141, 22, 'Maria Agustin, S.Kom., M.Kom.', 'Pemrograman Web(Front, Back End)', '3', 'TMJ 3B', '07:30:00', '10:50:00', 'RABU'),
(142, 22, 'Malisa Huzaifa, S.Kom., M.T.', 'Algoritma dan Pemrograman', '1', 'TMD 1B', '10:50:00', '15:00:00', 'RABU'),
(143, 22, 'Irawati, S.T., M.T.', 'Organisasi & Arsitektur Komputer', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'KAMIS'),
(144, 22, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Pengantar Jaringan Komputer', '3', 'TMJ 3B', '10:50:00', '15:50:00', 'KAMIS'),
(145, 22, 'Indah Sari Mukarramah, M.T.', 'Kewarganegaraan', '1', 'TMD 1A', '07:30:00', '10:50:00', 'JUMAT'),
(146, 22, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Indonesia', '1', 'TI CCIT SE', '10:50:00', '15:00:00', 'JUMAT'),
(147, 22, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Indonesia', '1', 'TI CCIT SE', '07:30:00', '10:50:00', 'SABTU'),
(148, 22, 'Eriya, S.Kom., M.T.', 'Seminar', '7', 'TMD 7B', '10:50:00', '15:50:00', 'SABTU'),
(149, 22, 'Iwan Sonjaya, S.T., M.T.', 'Kapita Selekta 1', '7', 'TMD 7B', '07:30:00', '10:50:00', 'SABTU'),
(158, 23, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Jaringan Komputer', '1', 'TMJ CCIT S', '07:30:00', '10:50:00', 'SENIN'),
(159, 23, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Grafika Komputer', '1', 'TI CCIT 3B', '10:50:00', '15:50:00', 'SENIN'),
(160, 23, 'Mira Rosalina, S.Pd., M.T.', 'Matematika Diskrit', '1', 'TMD 1A', '07:30:00', '10:50:00', 'SELASA'),
(161, 23, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '1', 'TI CCIT 1B', '10:50:00', '15:50:00', 'SELASA'),
(162, 23, 'Rizki Elisa Nalawati, S.T., M.T.', 'Teknologi Multimedia', '3', 'TMJ 3B', '07:30:00', '10:50:00', 'RABU'),
(163, 23, 'Mira Rosalina, S.Pd., M.T.', 'Pemodelan 3D', '1', 'TMJ 3A', '10:50:00', '15:50:00', 'RABU'),
(164, 23, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris Untuk TIK', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'KAMIS');

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
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

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
