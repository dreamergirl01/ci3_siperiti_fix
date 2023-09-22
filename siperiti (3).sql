-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 03.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siperiti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(15) NOT NULL,
  `kd_jenis` varchar(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `kd_jenis`, `nama_barang`, `gambar`, `satuan`) VALUES
('BR0001', 'KS001', 'Artic Spary Paint Black', 'arctic2.jpg', 'kotak'),
('BR0002', 'KS002', 'Kabel Jumper Female to Male', 'kabel_jumper.jpeg', 'Pack'),
('BR0003', 'KS002', 'Kabel Jumper Female to Female', 'female_to_female.jpeg', 'Pack'),
('BR0004', 'KS002', 'Kabel Jumper Male to Male', 'male_to_male.jpeg', 'Pack'),
('BR0005', 'KS005', 'leptop', 'arctic3.jpg', 'box');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kd_keluar` varchar(12) NOT NULL,
  `kd_barang` char(6) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`kd_keluar`, `kd_barang`, `keterangan`, `tanggal_keluar`, `jumlah_keluar`) VALUES
('KL2306190001', 'BR0002', 'Barang tidak bisa dipakai lagi karena telah rusak parah', '2023-06-19', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kd_masuk` varchar(12) NOT NULL,
  `kd_barang` char(6) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`kd_masuk`, `kd_barang`, `tanggal_masuk`, `jumlah_masuk`) VALUES
('BM2306190001', 'BR0001', '2023-06-16', 100),
('BM2306190002', 'BR0002', '2023-06-18', 50),
('BM2306190003', 'BR0002', '2023-06-18', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `kd_detail` varchar(5) NOT NULL,
  `kd_kondisi` varchar(4) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`kd_detail`, `kd_kondisi`, `kd_barang`, `jumlah_barang`, `tanggal_pemeriksaan`) VALUES
('D0001', 'KD01', 'BR0001', 5, '2023-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kd_jenis` varchar(5) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`kd_jenis`, `nama_jenis`) VALUES
('KS001', 'Acrylic'),
('KS002', 'Kabel'),
('KS003', 'Antena'),
('KS004', 'Alkohol'),
('KS005', 'Sensor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `kd_kondisi` varchar(4) NOT NULL,
  `kondisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`kd_kondisi`, `kondisi`) VALUES
('KD01', 'Baik'),
('KD02', 'Rusak'),
('KD03', 'Layak Pakai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `kd_barang` char(6) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`kd_barang`, `stok`) VALUES
('BR0001', 90),
('BR0002', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(12) NOT NULL,
  `kd_barang` char(6) NOT NULL,
  `username` char(10) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `status` enum('Dipinjam','Kembali') NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `kd_barang`, `username`, `jumlah_pinjam`, `status`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
('TR2306210001', 'BR0001', '2020610024', 10, 'Dipinjam', '2023-06-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` char(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `gambar_profil` varchar(255) NOT NULL,
  `level` enum('super admin','admin','client','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `email`, `no_hp`, `gambar_profil`, `level`) VALUES
('2020610008', 'wulan', 'Wulan Dari', 'padang', 'wulann@gmail.com', '08225666', 'klaire1.jpg', 'super admin'),
('2020610024', 'wintergirl', 'Nabila Fitri Yanti', 'pasaman timurrr', 'nabila@gmail.com', '1245521331', 'john.jpg', 'client'),
('2020610025', 'dream', 'Rahma', 'padang', 'rahma9@gmail.com', '5535415', 'staf.jpeg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kd_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_masuk`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`kd_detail`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`kd_kondisi`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`kd_barang`,`stok`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
