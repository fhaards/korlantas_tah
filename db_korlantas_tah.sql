-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2022 pada 20.36
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_korlantas_tah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laka_data`
--

CREATE TABLE `laka_data` (
  `id_laka` char(20) NOT NULL,
  `id_lokasi` int(10) NOT NULL,
  `korban_meninggal` int(11) NOT NULL,
  `korban_luka` int(11) NOT NULL,
  `tgl_insiden` datetime NOT NULL,
  `tipe_laka` varchar(50) NOT NULL,
  `korban_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laka_data`
--

INSERT INTO `laka_data` (`id_laka`, `id_lokasi`, `korban_meninggal`, `korban_luka`, `tgl_insiden`, `tipe_laka`, `korban_total`) VALUES
('LK2022020911352', 2, 3, 1, '2022-02-09 11:35:00', 'Angle (Ra)', 4),
('LK20220315104525', 25, 10, 5, '2022-03-15 10:45:00', 'Angle (Ra)', 15),
('LK2022070122521', 1, 3, 0, '2022-07-01 22:52:00', 'Angle (Ra)', 3),
('LK2022070322515', 5, 0, 5, '2022-08-07 22:51:00', 'Head On (Ho)', 5),
('LK2022070522512', 2, 0, 2, '2022-09-20 22:51:00', 'Backing', 2),
('LK2022070622502', 2, 2, 3, '2022-08-02 02:54:00', 'Backing', 5),
('LK2022070622515', 5, 2, 5, '2022-07-06 22:51:00', 'Angle (Ra)', 7),
('LK2022072004552', 2, 0, 4, '2022-07-20 04:55:00', 'Angle (Ra)', 4),
('LK2022072323502', 2, 0, 5, '2022-07-23 23:50:00', 'Rear End (Re)', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laka_data_korban`
--

CREATE TABLE `laka_data_korban` (
  `id_korban` int(10) NOT NULL,
  `id_laka` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `kondisi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laka_lokasi`
--

CREATE TABLE `laka_lokasi` (
  `id_lokasi` int(10) NOT NULL,
  `nm_lokasi` varchar(50) NOT NULL,
  `alamat_lokasi` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laka_lokasi`
--

INSERT INTO `laka_lokasi` (`id_lokasi`, `nm_lokasi`, `alamat_lokasi`, `latitude`, `longitude`, `created_at`) VALUES
(1, 'Belokan 1', 'Jl. Kapuk Cengkareng, RW.14, Cengkareng Tim., Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730', '-6.133033', '106.730629', '2022-07-18 14:31:12'),
(2, 'RPV7+WFG Kalideres, West Jakarta City, Jakarta', 'Daan Mogot Rd No.178, RT.1/RW.12, Kalideres, West Jakarta City, Jakarta 11840', '-6.155200', '106.713697', '2022-07-19 09:37:19'),
(5, 'RP89+G52 Duri Kosambi, West Jakarta City, Jakarta', 'Jl. Pulo Indah Raya No.1, RT.004/RW.004, Duri Kosambi, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11750', '-6.183731', '106.717900', '2022-07-20 03:37:32'),
(24, 'TEST', 'TEST', '-6.14405363851449', '106.76046752982074', '2022-07-25 23:43:43'),
(25, 'VP6X+F28 Kapuk, West Jakarta City, Jakarta', 'Jalan Perkampungan, RT.9/RW.16, Kapuk, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11720', '-6.139616061058172', '106.75617599539693', '2022-07-30 10:44:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$ihYTTrvvc40qGXWwxQ4V6enFHo4hfltnWuFPHuUoqtvPiNttk43GC', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laka_data`
--
ALTER TABLE `laka_data`
  ADD PRIMARY KEY (`id_laka`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `laka_data_korban`
--
ALTER TABLE `laka_data_korban`
  ADD PRIMARY KEY (`id_korban`);

--
-- Indeks untuk tabel `laka_lokasi`
--
ALTER TABLE `laka_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laka_data_korban`
--
ALTER TABLE `laka_data_korban`
  MODIFY `id_korban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `laka_lokasi`
--
ALTER TABLE `laka_lokasi`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
