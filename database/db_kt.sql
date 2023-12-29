-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2023 pada 07.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist`
--

CREATE TABLE `checklist` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `toilet` int(10) NOT NULL,
  `kloset` tinyint(1) NOT NULL,
  `wastafel` tinyint(1) NOT NULL,
  `lantai` tinyint(1) NOT NULL,
  `dinding` tinyint(1) NOT NULL,
  `kaca` tinyint(1) NOT NULL,
  `bau` tinyint(1) NOT NULL,
  `sabun` tinyint(1) NOT NULL,
  `users_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toilet`
--

CREATE TABLE `toilet` (
  `id_toilet` int(10) NOT NULL,
  `lokasi` varchar(45) NOT NULL,
  `keterangan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_checklist_toilet_idx` (`toilet`),
  ADD KEY `fk_checklist_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `toilet`
--
ALTER TABLE `toilet`
  ADD PRIMARY KEY (`id_toilet`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toilet`
--
ALTER TABLE `toilet`
  MODIFY `id_toilet` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
