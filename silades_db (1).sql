-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 04:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silades_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `id_ajuan` int NOT NULL,
  `id_surat` int NOT NULL,
  `id_user` int NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Tempat_lahir` varchar(50) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `Agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu') NOT NULL,
  `Pekerjaan` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Alamat` text NOT NULL,
  `NPWP` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Nama_usaha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Lama_usaha` date DEFAULT NULL,
  `Alamat_usaha` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `KTP` varchar(40) NOT NULL,
  `KK` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Akte` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Pas_foto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Surat_pengantar` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Foto_persyaratan` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('Diajukan','Diproses','Selesai','Ditolak') NOT NULL,
  `Pengambilan` enum('Soft file','Hard file','Keduanya','') NOT NULL,
  `file` varchar(20) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`id_ajuan`, `id_surat`, `id_user`, `Nama`, `Tempat_lahir`, `Tanggal_lahir`, `Jenis_kelamin`, `NIK`, `Agama`, `Pekerjaan`, `Alamat`, `NPWP`, `Nama_usaha`, `Lama_usaha`, `Alamat_usaha`, `KTP`, `KK`, `Akte`, `Pas_foto`, `Surat_pengantar`, `Foto_persyaratan`, `status`, `Pengambilan`, `file`, `Tanggal`, `created_at`) VALUES
(20, 3, 3, 'Bunga ', 'Purbalingga', '2005-03-15', 'Perempuan', '330345678', 'Islam', 'Wiraswasta', 'Purbalingga', '55454', 'Berkah jaya', '2025-10-01', 'Purbalingga', 'img_1765488423_693b3727505db.jpg', 'img_1765488423_693b37275126a.jpg', NULL, NULL, 'img_1765488423_693b3727517ba.jpg', 'img_1765488423_693b372751f15.jpg', 'Selesai', 'Keduanya', 'file_1765488616.pdf', '2025-12-15', '2025-12-12 04:27:03'),
(21, 1, 3, 'Bunga', 'Purbalingga', '2005-03-04', 'Perempuan', '330345678', 'Islam', NULL, 'Purbalingga', NULL, NULL, NULL, NULL, 'img_1765501658_693b6ada0ae37.jpg', 'img_1765501658_693b6ada0b90f.jpg', NULL, NULL, 'img_1765501658_693b6ada0d214.jpg', NULL, 'Selesai', 'Keduanya', 'file_1765533089.sql', '2025-12-01', '2025-12-12 08:07:38'),
(22, 2, 1, 'Bayu', 'Purbalingga', '2004-04-13', 'Laki-laki', '330344557', 'Kristen', NULL, 'Purbalingga', NULL, NULL, NULL, NULL, 'img_1765503149_693b70adf3f5e.jpg', 'img_1765503150_693b70ae0089f.jpg', 'img_1765503150_693b70ae00e07.jpg', 'img_1765503150_693b70ae01376.jpg', NULL, NULL, 'Diproses', 'Soft file', NULL, NULL, '2025-12-12 08:32:30'),
(23, 2, 1, 'Bayu', 'Purbalingga', '2005-04-13', 'Laki-laki', '330344557', 'Islam', NULL, 'Purbalingga', NULL, NULL, NULL, NULL, 'img_1765685492_693e38f4c66ac.jpeg', 'img_1765685492_693e38f4c84b0.jpg', 'img_1765685492_693e38f4c8cd5.jpg', 'img_1765685492_693e38f4c934e.jpeg', NULL, NULL, 'Diproses', 'Keduanya', NULL, NULL, '2025-12-14 11:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int NOT NULL,
  `nama_surat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `nama_surat`, `deskripsi`, `persyaratan`) VALUES
(1, 'Surat Keterangan Tidak Mampu', 'Surat Keterangan Tidak Mampu (SKTM) adalah dokumen resmi yang diterbitkan oleh pemerintah desa atau kelurahan yang menerangkan bahwa seseorang atau keluarganya tergolong kurang mampu secara ekonomi.', '.Fotocopy KTP\r\n.Fotocopy KK\r\n.Surat Pengantar RT/RW'),
(2, 'Surat Pengantar SKCK ', 'Surat Pengantar SKCK adalah surat resmi yang dikeluarkan oleh Desa/Kelurahan untuk membantu warga mengurus Surat Keterangan Catatan Kepolisian (SKCK) di Polsek atau Polres.Surat ini menjadi bukti bahwa pemohon benar berdomisili di wilayah tersebut dan tidak memiliki masalah di lingkungan tempat tinggalnya.', '.Fotocopy KTP\r\n.Fotocopy KK\r\n.Fotocopy Akte\r\n.Pas Foto'),
(3, 'Surat Keterangan Usaha', 'Surat Keterangan Usaha (SKU) adalah surat resmi yang dikeluarkan oleh Desa/Kelurahan yang menyatakan bahwa seseorang benar memiliki usaha di wilayah tersebut. Surat ini biasanya diperlukan untuk persyaratan perbankan, perizinan, atau bantuan usaha.', '.Fotocopy KTP\r\n.Fotocopy KK\r\n.Surat Pengantar RT/RW\r\n.Foto Lokasi Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(1, 'warga', 'warga@gmail.com', '8bee83f98002668cb8f55ba3ba2a6d3b', 'user'),
(2, 'petugas', 'petugas@gmail.com', '570c396b3fc856eceb8aa7357f32af1a', 'admin'),
(3, 'warga2', 'warga2@gmail.com', '8bee83f98002668cb8f55ba3ba2a6d3b', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int NOT NULL,
  `nama` varchar(60) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen','Budha','Hindu','Katolik','Konghucu') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `nama`, `nik`, `jenis_kelamin`, `agama`, `alamat`) VALUES
(1, 'Bunga', '330345678', 'Perempuan', 'Islam', 'Purbalingga'),
(2, 'Bayu', '330344557', 'Perempuan', 'Islam', 'Purbalingga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id_ajuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD CONSTRAINT `ajuan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
