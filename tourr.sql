-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2021 pada 05.38
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_pelanggan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `tanggal_lahir`, `alamat_pelanggan`, `jenis_kelamin`, `no_telp`, `email`) VALUES
('P001', 'Aldi Muhammad Rahim', '1995-03-03', 'Jl. Meruya Selatan', 'L', '089524521251', 'aldi@gmail.com'),
('P002', 'Khoirinisa', '1999-02-04', 'Jl. Kampung Rambutan ', 'P', '082154256398', 'khoirinisa@gmail.com'),
('P003', 'Indrastuti Handayani', '2002-01-21', 'jl. Lingkungan 3', 'P', '0896525412512', 'hani12@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` varchar(10) NOT NULL,
  `nama_penginapan` varchar(30) NOT NULL,
  `jenis_penginapan` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(15) NOT NULL,
  `fasilitas` varchar(30) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `nama_penginapan`, `jenis_penginapan`, `alamat`, `provinsi`, `fasilitas`, `harga`) VALUES
('PN001', 'VILLA PRATAMA', 'Villa', 'Jl. Merdeka ', 'jawabarat', 'Banyak', 500000),
('PN002', 'HOTEL PERMANA', 'Hotel', 'Jl. Kartini ', 'dkijakarta', 'Banyak', 600000),
('PN003', 'Resort Permata Hijau', 'Resort', 'Jl. Erlangga', 'banten', 'Banyak', 800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempatwisata`
--

CREATE TABLE `tempatwisata` (
  `id_tempatwisata` varchar(10) NOT NULL,
  `tempat_wisata` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(15) NOT NULL,
  `fasilitas` varchar(30) NOT NULL,
  `waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempatwisata`
--

INSERT INTO `tempatwisata` (`id_tempatwisata`, `tempat_wisata`, `alamat`, `provinsi`, `fasilitas`, `waktu`) VALUES
('T001', 'Ancol', 'Jakarta Utara', 'dkijakarta', 'Dufan, Atlantis, Seawolrd', '08:00-20:00'),
('T002', 'Ragunan', 'Jakarta Selatan', 'dkijakarta', 'Kebun Binatang', '08:00-20:00'),
('T003', 'Taman Wisata Pohon Pinus', 'Bogor', 'jawabarat', '-', '08:00-20:00'),
('T004', 'Pantai Carita', 'Anyer', 'banten', 'Pantai', '08:00-20:00'),
('T005', 'Taman Mini Indonesia Indah', 'Jakarta Timur', 'dkijakarta', '-', '08:00-20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(10) NOT NULL,
  `nama_kendaraan` varchar(30) NOT NULL,
  `kategori_kendaraan` varchar(10) NOT NULL,
  `harga_tiket` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_kendaraan`, `kategori_kendaraan`, `harga_tiket`) VALUES
('TKD001', 'BUS SINAR JAYA', 'Darat', 300000),
('TKD002', 'BUS ARIMBI', 'Darat', 250000),
('TKL001', 'Kapal Penumpang Sinar Mas', 'Laut', 100000),
('TKU001', 'PESAWAT GARUDA INDONESIA AIRWA', 'Udara', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_pelanggan` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_tiket` varchar(10) CHARACTER SET latin1 NOT NULL,
  `jumlah_tiket` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_penginapan` varchar(10) CHARACTER SET latin1 NOT NULL,
  `lama_menginap` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_tiket`, `jumlah_tiket`, `id_penginapan`, `lama_menginap`) VALUES
('TR001', 'P001', 'TKD001', '2', 'PN001', '2'),
('TR002', 'P002', 'TKU001', '1', 'PN003', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indeks untuk tabel `tempatwisata`
--
ALTER TABLE `tempatwisata`
  ADD PRIMARY KEY (`id_tempatwisata`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_penginapan` (`id_penginapan`),
  ADD KEY `fk_tiket` (`id_tiket`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `fk_penginapan` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`),
  ADD CONSTRAINT `fk_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
