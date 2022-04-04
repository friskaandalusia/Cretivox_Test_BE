-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2022 pada 02.49
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cretivox_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(11) NOT NULL,
  `tgl_submit` timestamp NOT NULL DEFAULT current_timestamp(),
  `umur` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `profil_pict` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `tgl_submit`, `umur`, `nama`, `alamat`, `profil_pict`, `dokumen`) VALUES
(13, '2022-04-02 05:04:56', 20, 'Friska Andalusia', 'Taman Kopo Indah Blok E.45, Bandung\n', 'FOTO_FRISKA ANDALUSIA.jpg', 'Handout Gapura Digital - 07. Dorong penjualan online Anda dengan memanfaatkan Google Ads.pdf'),
(15, '2022-04-02 05:04:56', 21, 'M.Aqsal Sirullah Sodik', 'Tasik Pride', 'REQ.png', 'TOR Refreshment 1.0.docx.pdf'),
(18, '2022-04-04 00:25:17', 19, 'Silvia Dea Hapsari', 'Alun-alun Bandung', 'hello april.jpg', 'upload twibon.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(23) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `tgl_daftar`, `unique_id`, `nama`, `email`, `password`, `salt`) VALUES
(1, '2022-04-02 05:06:04', '62478deb540096.77938780', 'friska a', 'friskalusy@gmail.com', 'dCqQzTDHaI/Yg5/999qYNPBRHa00Yjk1NDQxMTJm', '4b9544112f'),
(4, '2022-04-02 05:06:04', '6247a011b15884.44970281', 'aqsal sirullah sodik', 'aqsalsodik69@gmail.com', 'ceoSeeTRjnlEK4LB0UH+cY4K3zA2MGRlNjNiZWU1', '60de63bee5'),
(5, '2022-04-04 00:03:54', '624a35ea9c5b11.46658744', 'Dinia prastiwi hartiti', 'diniadwi@gmail.com', '+kPg0Pr5mjzOWwRRmkwkmUtUwmoxOWY0NzFiNzFi', '19f471b71b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
