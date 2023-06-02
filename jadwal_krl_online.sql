-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2023 pada 16.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_krl_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_stasiun_asal` int(11) NOT NULL,
  `id_stasiun_tujuan` int(11) NOT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_tiba` time NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_stasiun_asal`, `id_stasiun_tujuan`, `jam_berangkat`, `jam_tiba`, `harga`) VALUES
(1, 1, 3, '08:00:00', '11:30:00', 150000),
(2, 2, 4, '09:30:00', '12:45:00', 175000),
(3, 5, 1, '10:15:00', '13:45:00', 120000),
(4, 3, 2, '12:00:00', '15:30:00', 160000),
(5, 4, 5, '14:30:00', '17:15:00', 135000),
(6, 1, 4, '16:45:00', '20:15:00', 190000),
(7, 2, 5, '18:30:00', '22:00:00', 145000),
(8, 3, 1, '20:00:00', '23:30:00', 130000),
(10, 5, 3, '09:15:00', '12:30:00', 165000),
(11, 1, 5, '11:00:00', '14:30:00', 125000),
(12, 2, 1, '13:30:00', '16:45:00', 180000),
(13, 3, 4, '15:45:00', '19:00:00', 140000),
(14, 4, 1, '17:30:00', '21:00:00', 170000),
(15, 5, 2, '19:15:00', '22:30:00', 155000),
(16, 1, 3, '21:00:00', '00:30:00', 135000),
(17, 2, 4, '08:30:00', '11:45:00', 160000),
(18, 5, 1, '10:15:00', '13:45:00', 145000),
(19, 3, 2, '12:30:00', '16:00:00', 120000),
(20, 4, 5, '14:45:00', '17:30:00', 170000),
(21, 4, 1, '17:00:00', '20:30:00', 150000),
(22, 5, 2, '18:45:00', '22:00:00', 135000),
(23, 1, 3, '20:30:00', '00:00:00', 120000),
(24, 2, 4, '08:45:00', '12:00:00', 165000),
(25, 5, 1, '10:30:00', '14:00:00', 140000),
(26, 3, 2, '12:45:00', '16:15:00', 155000),
(27, 4, 5, '15:00:00', '17:45:00', 180000),
(28, 1, 4, '17:15:00', '20:45:00', 145000),
(29, 2, 5, '19:30:00', '23:00:00', 130000),
(30, 3, 1, '21:15:00', '00:30:00', 170000),
(31, 4, 2, '08:00:00', '11:15:00', 155000),
(32, 5, 3, '09:45:00', '13:00:00', 170000),
(33, 1, 5, '11:30:00', '15:00:00', 135000),
(34, 2, 1, '13:45:00', '17:15:00', 150000),
(35, 3, 4, '16:00:00', '19:15:00', 125000),
(36, 4, 1, '17:45:00', '21:30:00', 180000),
(37, 5, 2, '19:30:00', '22:45:00', 145000),
(38, 1, 3, '21:15:00', '00:45:00', 130000),
(39, 2, 4, '08:30:00', '11:45:00', 165000),
(40, 5, 1, '10:15:00', '13:45:00', 140000),
(41, 3, 2, '12:30:00', '16:00:00', 155000),
(42, 4, 5, '14:45:00', '17:30:00', 170000),
(43, 1, 4, '16:30:00', '20:00:00', 155000),
(44, 2, 5, '18:15:00', '21:30:00', 140000),
(45, 3, 1, '20:00:00', '23:15:00', 165000),
(46, 4, 2, '07:45:00', '11:00:00', 150000),
(47, 5, 3, '09:30:00', '12:45:00', 175000),
(48, 1, 5, '11:15:00', '14:45:00', 160000),
(49, 2, 1, '13:30:00', '16:45:00', 135000),
(50, 3, 4, '15:45:00', '19:00:00', 190000),
(51, 4, 1, '17:30:00', '21:00:00', 155000),
(52, 5, 2, '19:15:00', '22:30:00', 130000),
(53, 1, 3, '21:00:00', '00:30:00', 145000),
(54, 2, 4, '08:45:00', '12:00:00', 120000),
(55, 5, 1, '10:30:00', '14:00:00', 165000),
(56, 3, 2, '12:45:00', '16:15:00', 150000),
(57, 4, 5, '15:00:00', '17:45:00', 175000),
(58, 1, 4, '17:15:00', '20:45:00', 160000),
(59, 2, 5, '19:30:00', '23:00:00', 135000),
(60, 3, 1, '21:15:00', '00:30:00', 150000),
(61, 4, 2, '08:00:00', '11:15:00', 175000),
(62, 5, 3, '09:45:00', '13:00:00', 160000),
(63, 1, 5, '11:30:00', '15:00:00', 145000),
(64, 2, 1, '13:45:00', '17:15:00', 130000),
(65, 3, 4, '16:00:00', '19:15:00', 155000),
(66, 4, 1, '17:45:00', '21:30:00', 170000),
(67, 5, 2, '19:30:00', '22:45:00', 145000),
(68, 1, 3, '21:15:00', '00:45:00', 130000),
(69, 2, 4, '08:30:00', '11:45:00', 165000),
(70, 5, 1, '10:15:00', '13:45:00', 140000),
(71, 3, 2, '12:30:00', '16:00:00', 155000),
(72, 4, 5, '14:45:00', '17:30:00', 170000),
(73, 1, 4, '16:30:00', '20:00:00', 155000),
(74, 2, 5, '18:15:00', '21:30:00', 140000),
(75, 3, 1, '20:00:00', '23:15:00', 165000),
(76, 4, 2, '07:45:00', '11:00:00', 150000),
(77, 5, 3, '09:30:00', '12:45:00', 175000),
(78, 1, 5, '11:15:00', '14:45:00', 160000),
(79, 2, 1, '13:30:00', '16:45:00', 135000),
(80, 3, 4, '15:45:00', '19:00:00', 190000),
(81, 4, 1, '17:30:00', '21:00:00', 155000),
(82, 5, 2, '19:15:00', '22:30:00', 130000),
(83, 1, 3, '21:00:00', '00:30:00', 145000),
(84, 2, 4, '08:45:00', '12:00:00', 120000),
(85, 5, 1, '10:30:00', '14:00:00', 165000),
(86, 3, 2, '12:45:00', '16:15:00', 150000),
(87, 4, 5, '15:00:00', '17:45:00', 175000),
(88, 1, 4, '17:15:00', '20:45:00', 160000),
(89, 2, 5, '19:30:00', '23:00:00', 135000),
(90, 3, 1, '21:15:00', '00:30:00', 150000),
(91, 4, 2, '08:00:00', '11:15:00', 175000),
(92, 5, 3, '09:45:00', '13:00:00', 160000),
(93, 1, 5, '11:30:00', '15:00:00', 145000),
(94, 2, 1, '13:45:00', '17:15:00', 130000),
(95, 3, 4, '16:00:00', '19:15:00', 155000),
(96, 4, 1, '17:45:00', '21:30:00', 170000),
(97, 5, 2, '19:30:00', '22:45:00', 145000),
(98, 1, 3, '21:15:00', '00:45:00', 130000),
(99, 2, 4, '08:30:00', '11:45:00', 165000),
(100, 5, 1, '10:15:00', '13:45:00', 140000),
(101, 3, 2, '12:30:00', '16:00:00', 155000),
(102, 4, 5, '14:45:00', '17:30:00', 170000),
(103, 1, 4, '16:30:00', '20:00:00', 155000),
(104, 2, 5, '18:15:00', '21:30:00', 140000),
(105, 3, 1, '20:00:00', '23:15:00', 165000),
(106, 4, 2, '07:45:00', '11:00:00', 150000),
(107, 5, 3, '09:30:00', '12:45:00', 175000),
(108, 1, 5, '11:15:00', '14:45:00', 160000),
(109, 2, 1, '13:30:00', '16:45:00', 135000),
(110, 3, 4, '15:45:00', '19:00:00', 190000),
(111, 4, 1, '17:30:00', '21:00:00', 155000),
(112, 5, 2, '19:15:00', '22:30:00', 130000),
(113, 1, 3, '21:00:00', '00:30:00', 145000),
(114, 2, 4, '08:45:00', '12:00:00', 120000),
(115, 5, 1, '10:30:00', '14:00:00', 165000),
(116, 3, 2, '12:45:00', '16:15:00', 150000),
(117, 4, 5, '15:00:00', '17:45:00', 175000),
(118, 1, 4, '17:15:00', '20:45:00', 160000),
(119, 2, 5, '19:30:00', '23:00:00', 135000),
(120, 3, 1, '21:15:00', '00:30:00', 150000),
(121, 4, 2, '08:00:00', '11:15:00', 175000),
(122, 5, 3, '09:45:00', '13:00:00', 160000),
(123, 1, 5, '11:30:00', '15:00:00', 145000),
(124, 2, 1, '13:45:00', '17:15:00', 130000),
(125, 3, 4, '16:00:00', '19:15:00', 155000),
(126, 4, 1, '17:45:00', '21:30:00', 170000),
(127, 5, 2, '19:30:00', '22:45:00', 145000),
(128, 1, 3, '21:15:00', '00:45:00', 130000),
(129, 2, 4, '08:30:00', '11:45:00', 165000),
(130, 5, 1, '10:15:00', '13:45:00', 140000),
(131, 3, 2, '12:30:00', '16:00:00', 155000),
(132, 4, 5, '14:45:00', '17:30:00', 170000),
(133, 1, 4, '16:30:00', '20:00:00', 155000),
(134, 2, 5, '18:15:00', '21:30:00', 140000),
(135, 3, 1, '20:00:00', '23:15:00', 165000),
(136, 45, 26, '10:45:00', '00:00:00', 150000),
(137, 5, 3, '09:30:00', '12:45:00', 175000),
(138, 1, 5, '11:15:00', '14:45:00', 160000),
(139, 2, 1, '13:30:00', '16:45:00', 135000),
(140, 3, 4, '15:45:00', '19:00:00', 190000),
(141, 4, 1, '17:30:00', '21:00:00', 155000),
(143, 1, 2, '08:00:00', '10:30:00', 100000),
(144, 1, 3, '12:00:00', '15:45:00', 150000),
(145, 32, 1, '08:00:00', '10:30:00', 100000),
(146, 32, 3, '12:00:00', '15:45:00', 150000),
(147, 33, 1, '08:00:00', '10:30:00', 100000),
(148, 33, 3, '12:00:00', '15:45:00', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stasiun`
--

CREATE TABLE `stasiun` (
  `id_stasiun` int(11) NOT NULL,
  `nama_stasiun` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stasiun`
--

INSERT INTO `stasiun` (`id_stasiun`, `nama_stasiun`, `kota`) VALUES
(1, 'Stasiun Gambir', 'Jakarta'),
(2, 'Stasiun Pasar Senen', 'Jakarta'),
(3, 'Stasiun Bandung', 'Bandung'),
(4, 'Stasiun Surabaya Gubeng', 'Surabaya'),
(5, 'Stasiun Yogyakarta', 'Yogyakarta'),
(6, 'Stasiun Semarang Tawang', 'Semarang'),
(7, 'Stasiun Surakarta Balapan', 'Surakarta'),
(8, 'Stasiun Malang', 'Malang'),
(9, 'Stasiun Denpasar', 'Denpasar'),
(10, 'Stasiun Medan', 'Medan'),
(11, 'Stasiun Padang', 'Padang'),
(12, 'Stasiun Palembang', 'Palembang'),
(13, 'Stasiun Makassar', 'Makassar'),
(14, 'Stasiun Balikpapan', 'Balikpapan'),
(15, 'Stasiun Samarinda', 'Samarinda'),
(16, 'Stasiun Pontianak', 'Pontianak'),
(17, 'Stasiun Banjarmasin', 'Banjarmasin'),
(18, 'Stasiun Manado', 'Manado'),
(19, 'Stasiun Jayapura', 'Jayapura'),
(20, 'Stasiun Ambon', 'Ambon'),
(21, 'Stasiun Ternate', 'Ternate'),
(22, 'Stasiun Manokwari', 'Manokwari'),
(23, 'Stasiun Palu', 'Palu'),
(24, 'Stasiun Kendari', 'Kendari'),
(25, 'Stasiun Gorontalo', 'Gorontalo'),
(26, 'Stasiun Bau-Bau', 'Bau-Bau'),
(27, 'Stasiun Bengkulu', 'Bengkulu'),
(28, 'Stasiun Jambi', 'Jambi'),
(29, 'Stasiun Pekanbaru', 'Pekanbaru'),
(30, 'Stasiun Lampung', 'Lampung'),
(31, 'Stasiun Tanjungkarang', 'Tanjungkarang'),
(32, 'Stasiun Aceh', 'Aceh'),
(33, 'Stasiun Banda Aceh', 'Banda Aceh'),
(34, 'Stasiun Serang', 'Serang'),
(35, 'Stasiun Cirebon', 'Cirebon'),
(36, 'Stasiun Sukabumi', 'Sukabumi'),
(37, 'Stasiun Tasikmalaya', 'Tasikmalaya'),
(38, 'Stasiun Malang', 'Malang'),
(39, 'Stasiun Jember', 'Jember'),
(40, 'Stasiun Probolinggo', 'Probolinggo'),
(41, 'Stasiun Solo Jebres', 'Surakarta'),
(42, 'Stasiun Purwokerto', 'Purwokerto'),
(43, 'Stasiun Banjar', 'Banjar'),
(44, 'Stasiun Cilacap', 'Cilacap'),
(45, 'Stasiun Tegal', 'Tegal'),
(46, 'Stasiun Kudus', 'Kudus'),
(47, 'Stasiun Pekalongan', 'Pekalongan'),
(48, 'Stasiun Banyuwangi', 'Banyuwangi'),
(49, 'Stasiun Lumajang', 'Lumajang'),
(50, 'Stasiun Probolinggo', 'Probolinggo'),
(51, 'Stasiun Gubeng', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '$2y$10$u.kp3TOIGMr9bw1RxOLcKukkqk0J6XXJqWT0c2H6fQYhClHsTk8QK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_stasiun_asal` (`id_stasiun_asal`),
  ADD KEY `id_stasiun_tujuan` (`id_stasiun_tujuan`);

--
-- Indeks untuk tabel `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id_stasiun`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id_stasiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_stasiun_asal`) REFERENCES `stasiun` (`id_stasiun`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_stasiun_tujuan`) REFERENCES `stasiun` (`id_stasiun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
