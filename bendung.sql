-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 10:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bendung`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_rekap`
--

CREATE TABLE `data_rekap` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tinggi_air` int(3) NOT NULL,
  `limpasan_air` int(3) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status_pintu_air_1` varchar(10) NOT NULL,
  `status_pintu_air_2` varchar(10) NOT NULL,
  `status_pintu_air_3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rekap`
--

INSERT INTO `data_rekap` (`id`, `waktu`, `tinggi_air`, `limpasan_air`, `level`, `status_pintu_air_1`, `status_pintu_air_2`, `status_pintu_air_3`) VALUES
(15, '2019-05-08 03:09:18', 18, 4, 'Bahaya', 'Open', 'Open', 'Close'),
(16, '2019-05-08 03:10:02', 19, 5, 'Awas', 'Open', 'Open', 'Open'),
(17, '2019-05-08 03:10:31', 20, 6, 'Awas', 'Open', 'Open', 'Open'),
(18, '2019-05-08 03:11:00', 14, 0, 'Aman', 'Close', 'Close', 'Close'),
(19, '2019-05-08 03:11:45', 17, 3, 'Siaga', 'Open', 'Close', 'Close'),
(20, '2019-05-08 03:12:37', 18, 4, 'Bahaya', 'Open', 'Open', 'Open'),
(21, '2019-05-09 09:00:51', 18, 4, 'Bahaya', 'Open', 'Open', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `kontroling`
--

CREATE TABLE `kontroling` (
  `id` int(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pintu_air_1` varchar(10) NOT NULL,
  `pintu_air_2` varchar(10) NOT NULL,
  `pintu_air_3` varchar(10) NOT NULL,
  `pintu_air_irigasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontroling`
--

INSERT INTO `kontroling` (`id`, `waktu`, `pintu_air_1`, `pintu_air_2`, `pintu_air_3`, `pintu_air_irigasi`) VALUES
(1, '2019-08-14 08:47:28', 'Close', 'Close', 'Close', 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `foto`, `alamat`, `status`) VALUES
(1, 'Zihan Sri Tahani', 'zihansritahani@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'IMG20170729175502.jpg', 'Tegal', 'Admin'),
(2, 'Khafidotun Khasanah', 'khafidotun2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'alvi (FILEminimizer).jpg', 'Brebes', 'Admin'),
(3, 'Bastian Nazaromi', 'bastian.nazaromi@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Brebes', 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_rekap`
--
ALTER TABLE `data_rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontroling`
--
ALTER TABLE `kontroling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`nama`),
  ADD UNIQUE KEY `unik2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_rekap`
--
ALTER TABLE `data_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `kontroling`
--
ALTER TABLE `kontroling`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
