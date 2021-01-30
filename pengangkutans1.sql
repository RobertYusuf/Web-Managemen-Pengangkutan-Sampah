-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2020 pada 09.50
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengangkutans1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pengangkutan`
--

CREATE TABLE `jadwal_pengangkutan` (
  `id_jadwal_pengangkutan` varchar(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pengangkutan`
--

INSERT INTO `jadwal_pengangkutan` (`id_jadwal_pengangkutan`, `id_kendaraan`, `id_rute`, `tanggal`) VALUES
('J26112020', 6, 3, '2020-11-25'),
('J27112020', 7, 4, '2020-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(30) NOT NULL,
  `plat_nomor` varchar(30) NOT NULL,
  `id_supir` varchar(10) NOT NULL,
  `id_pengepul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `jenis_kendaraan`, `plat_nomor`, `id_supir`, `id_pengepul`) VALUES
(5, 'Mobil Pick Up', 'N1188KKC', 'SP001', 'PN001'),
(6, 'Mobil Truk', 'N5698KLE', 'SP002', 'PN002'),
(7, 'Tossa', 'N7289NPC', 'SP003', 'PN003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pengangkutan`
--

CREATE TABLE `laporan_pengangkutan` (
  `id_laporan_pengangkutan` int(11) NOT NULL,
  `id_jadwal_pengangkutan` varchar(11) NOT NULL,
  `volume_sampah` int(11) DEFAULT NULL,
  `status_pengangkutan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_pengangkutan`
--

INSERT INTO `laporan_pengangkutan` (`id_laporan_pengangkutan`, `id_jadwal_pengangkutan`, `volume_sampah`, `status_pengangkutan`) VALUES
(13, 'J26112020', 20, 'Selesai'),
(14, 'J27112020', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '12345'),
('admin2', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengepul`
--

CREATE TABLE `pengepul` (
  `id_pengepul` varchar(10) NOT NULL,
  `nama_pengepul` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengepul`
--

INSERT INTO `pengepul` (`id_pengepul`, `nama_pengepul`, `alamat`, `telp`) VALUES
('PN001', 'Suripto', 'Kediri', '083329024912'),
('PN002', 'Daryono', 'Malang', '089324781278'),
('PN003', 'Pratikno', 'Kediri', '087732981298');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `nama_rute` varchar(50) NOT NULL,
  `jarak_rute` varchar(10) NOT NULL,
  `waktu_tempuh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `nama_rute`, `jarak_rute`, `waktu_tempuh`) VALUES
(2, 'Rute 1', '4', '30'),
(3, 'Rute 2', '5', '40'),
(4, 'Rute 3', '3', '18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id_supir` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `nama`, `alamat`, `telp`) VALUES
('SP001', 'Rian', 'Malang', '082234213212'),
('SP002', 'Joko', 'Malang', '088192340912'),
('SP003', 'Supomo', 'Malang', '087349523125');

-- --------------------------------------------------------

--
-- Struktur dari tabel `titik_pengangkutan`
--

CREATE TABLE `titik_pengangkutan` (
  `id_titik_pengangkutan` int(11) NOT NULL,
  `nama_titik_pengangkutan` varchar(50) NOT NULL,
  `id_rute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `titik_pengangkutan`
--

INSERT INTO `titik_pengangkutan` (`id_titik_pengangkutan`, `nama_titik_pengangkutan`, `id_rute`) VALUES
(3, 'Mahad Putra', 2),
(4, 'Masjid At Tarbiyah', 2),
(5, 'Fak. Saintek', 2),
(6, 'Fak. Ekonomi', 2),
(7, 'Gedung C', 2),
(8, 'Mahad Putri', 3),
(9, 'Sport Center', 3),
(10, 'Masjid Ulul Albab', 3),
(11, 'Gedung A & B', 3),
(12, 'Rektorat', 4),
(13, 'Fak. Humaniora', 4),
(14, 'Perpustakaan', 4),
(15, 'Fak. Syariah', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_pengangkutan`
--
ALTER TABLE `jadwal_pengangkutan`
  ADD PRIMARY KEY (`id_jadwal_pengangkutan`),
  ADD KEY `FK_jadwal_pengangkutan_kendaraan` (`id_kendaraan`),
  ADD KEY `FK_jadwal_pengangkutan_rute` (`id_rute`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_supir` (`id_supir`),
  ADD KEY `id_pengepul` (`id_pengepul`);

--
-- Indeks untuk tabel `laporan_pengangkutan`
--
ALTER TABLE `laporan_pengangkutan`
  ADD PRIMARY KEY (`id_laporan_pengangkutan`),
  ADD KEY `jadwal` (`id_jadwal_pengangkutan`);

--
-- Indeks untuk tabel `pengepul`
--
ALTER TABLE `pengepul`
  ADD PRIMARY KEY (`id_pengepul`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indeks untuk tabel `titik_pengangkutan`
--
ALTER TABLE `titik_pengangkutan`
  ADD PRIMARY KEY (`id_titik_pengangkutan`),
  ADD KEY `FK_titik_pengangkutan_rute` (`id_rute`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporan_pengangkutan`
--
ALTER TABLE `laporan_pengangkutan`
  MODIFY `id_laporan_pengangkutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `titik_pengangkutan`
--
ALTER TABLE `titik_pengangkutan`
  MODIFY `id_titik_pengangkutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_pengangkutan`
--
ALTER TABLE `jadwal_pengangkutan`
  ADD CONSTRAINT `FK_jadwal_pengangkutan_kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `FK_jadwal_pengangkutan_rute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`);

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `id_pengepul` FOREIGN KEY (`id_pengepul`) REFERENCES `pengepul` (`id_pengepul`),
  ADD CONSTRAINT `id_supir` FOREIGN KEY (`id_supir`) REFERENCES `supir` (`id_supir`);

--
-- Ketidakleluasaan untuk tabel `laporan_pengangkutan`
--
ALTER TABLE `laporan_pengangkutan`
  ADD CONSTRAINT `jadwal` FOREIGN KEY (`id_jadwal_pengangkutan`) REFERENCES `jadwal_pengangkutan` (`id_jadwal_pengangkutan`);

--
-- Ketidakleluasaan untuk tabel `titik_pengangkutan`
--
ALTER TABLE `titik_pengangkutan`
  ADD CONSTRAINT `FK_titik_pengangkutan_rute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
