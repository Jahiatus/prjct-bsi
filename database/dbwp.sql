-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2026 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_code` varchar(30) DEFAULT NULL,
  `kapal` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `jam_tiba` time DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `titel` varchar(10) DEFAULT NULL,
  `nama_penumpang` varchar(100) DEFAULT NULL,
  `jenis_id` varchar(30) DEFAULT NULL,
  `nomor_id` varchar(50) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` enum('MENUNGGU','LUNAS','SELESAI') DEFAULT 'LUNAS',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kapal`
--

CREATE TABLE `jadwal_kapal` (
  `id_kapal` int(11) NOT NULL,
  `nama_kapal` varchar(100) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `jam_tiba` time DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_kapal`
--

INSERT INTO `jadwal_kapal` (`id_kapal`, `nama_kapal`, `jenis`, `kelas`, `tanggal`, `jam_berangkat`, `jam_tiba`, `asal`, `tujuan`, `harga`, `jumlah_tiket`) VALUES
(1, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-01', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(2, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-02', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(3, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-03', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(4, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-04', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(5, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-05', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(6, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-06', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(7, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-07', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(8, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-08', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(9, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-09', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(10, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-10', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(11, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-11', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(12, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-12', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(13, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-13', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(14, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-14', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(15, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-15', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(16, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-16', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(17, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-17', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(18, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-18', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(19, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-19', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(20, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-20', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(21, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-21', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(22, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-22', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(23, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-23', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(24, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-24', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(25, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-25', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(26, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-26', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(27, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-27', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(28, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-28', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(29, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-29', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(30, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-30', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(31, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-07-31', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(32, 'KMP Portlink', 'penumpang', 'Eksekutif', '2026-08-01', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 150000, 50),
(33, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-01', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(34, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-02', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(35, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-03', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(36, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-04', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(37, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-05', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(38, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-06', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(39, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-07', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(40, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-08', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(41, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-09', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(42, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-10', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100),
(43, 'KMP Portlink', 'penumpang', 'Reguler', '2026-07-06', '08:00:00', '10:30:00', 'Merak', 'Bakauheni', 100000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `status` enum('belum_dibaca','dibaca') DEFAULT 'belum_dibaca',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_code` varchar(30) DEFAULT NULL,
  `kapal` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `asal` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_berangkat` time DEFAULT NULL,
  `jam_tiba` time DEFAULT NULL,
  `nama_pemesan` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `titel` varchar(20) DEFAULT NULL,
  `nama_penumpang` varchar(100) DEFAULT NULL,
  `jenis_id` varchar(30) DEFAULT NULL,
  `nomor_id` varchar(50) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` enum('Menunggu','Lunas','Selesai') DEFAULT 'Lunas',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `user_id`, `booking_code`, `kapal`, `kelas`, `asal`, `tujuan`, `tanggal`, `jam_berangkat`, `jam_tiba`, `nama_pemesan`, `telepon`, `email`, `titel`, `nama_penumpang`, `jenis_id`, `nomor_id`, `usia`, `kota`, `total`, `status`, `created_at`) VALUES
(1, 1, 'OB202607068395', 'KMP Portlink', 'Reguler', 'Merak', 'Bakauheni', '2026-07-09', '08:00:00', '10:30:00', 'Satrio', '085719495137', 'satriowibowo100806@gmail.com', 'Tn.', 'Satrio', 'KTP', '3673011008060003', 20, 'Kota Bekas', 102500, 'Lunas', '2026-07-06 07:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `umur` smallint(6) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firebase_uid` int(11) NOT NULL,
  `login_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_depan`, `nama_belakang`, `umur`, `no_telp`, `email`, `password`, `firebase_uid`, `login_type`, `created_at`) VALUES
(1, 'kenn', 'tod', 34, '085719495137', 'satriowibowo100806@gmail.com', '$2y$10$B4k54U6j4g3md1/pd2CM0eMYrbl3L/vdofu02/UOnWXjD.CBsujPG', 0, 0, '2026-07-03 01:02:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kapal`
--
ALTER TABLE `jadwal_kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kapal`
--
ALTER TABLE `jadwal_kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
