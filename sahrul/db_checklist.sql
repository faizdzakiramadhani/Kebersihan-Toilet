-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 09:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `toilet_id` int(11) NOT NULL,
  `kloset` varchar(10) DEFAULT NULL,
  `wastafel` varchar(10) DEFAULT NULL,
  `lantai` varchar(10) DEFAULT NULL,
  `dinding` varchar(10) DEFAULT NULL,
  `kaca` varchar(10) DEFAULT NULL,
  `bau` varchar(10) DEFAULT NULL,
  `sabun` varchar(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `tanggal`, `toilet_id`, `kloset`, `wastafel`, `lantai`, `dinding`, `kaca`, `bau`, `sabun`, `users_id`) VALUES
(0, '0000-00-00 00:00:00', 319, 'Rusak', 'Bersih', 'Kotor', 'Bersih', 'Kotor', 'Ya', 'Hilang', 312110110),
(1, '0000-00-00 00:00:00', 320, 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Tidak', 'Ada', 312110110),
(2, '0000-00-00 00:00:00', 321, 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Ya', 'Ada', 312110110),
(3, '0000-00-00 00:00:00', 322, 'Kotor', 'Bersih', 'Bersih', 'Bersih', 'Kotor', 'Ya', 'Ada', 312110110),
(4, '0000-00-00 00:00:00', 323, 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Ya', 'Ada', 312110110),
(5, '0000-00-00 00:00:00', 324, 'Bersih', 'Bersih', 'Rusak', 'Bersih', 'Bersih', 'Ya', 'Ada', 312110110),
(6, '0000-00-00 00:00:00', 325, 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Bersih', 'Tidak', 'Habis', 312110110),
(7, '0000-00-00 00:00:00', 326, 'Bersih', 'Rusak', 'Kotor', 'Kotor', 'Bersih', 'Ya', 'Ada', 312110110),
(8, '2023-11-11 00:00:00', 327, 'Kotor', 'Kotor', 'Kotor', 'Kotor', 'Rusak', 'Ya', 'Hilang', 312110110);

-- --------------------------------------------------------

--
-- Table structure for table `toilet`
--

CREATE TABLE `toilet` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toilet`
--

INSERT INTO `toilet` (`id`, `lokasi`, `keterangan`) VALUES
(320, 'Security', 'Sudah'),
(321, 'Office', 'Sudah'),
(322, 'Factory 2', 'Sudah'),
(323, 'Office', 'Sudah'),
(324, 'Factory 1', 'Belum'),
(325, 'Factory 2', 'Belum'),
(326, 'Office', 'Belum'),
(327, 'Office', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `stat` varchar(10) DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `nama`, `email`, `stat`, `rol`) VALUES
(1, 'admin', 'admin', 'admin', 'hidayat@mhs.pelitabangsa.ac.id', 'Aktif', 'Admin'),
(2, 'user', 'user', 'user', 'hidayat@mhs.pelitabangsa.ac.id', 'Non Aktif', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_checklist_toilet_idx` (`toilet_id`),
  ADD KEY `fk_checklist_users1_idx` (`users_id`);

--
-- Indexes for table `toilet`
--
ALTER TABLE `toilet`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
