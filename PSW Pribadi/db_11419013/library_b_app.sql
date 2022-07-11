-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2020 pada 16.01
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_b_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(122) NOT NULL,
  `password` varchar(122) NOT NULL,
  `level` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `level`) VALUES
('john', 'john', 'anggota'),
('lagan', 'lagan', 'anggota'),
('petugas', 'petugas', 'petugas'),
('ryan', 'ryan', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(122) NOT NULL,
  `nama` varchar(122) NOT NULL,
  `nik` int(122) NOT NULL,
  `no_telepon` int(122) NOT NULL,
  `username` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `nik`, `no_telepon`, `username`) VALUES
(1, 'John', 11567778, 81222999, 'john'),
(3, 'Ryan', 123444342, 81312121, 'ryan'),
(4, 'Lagan', 3342526, 812122333, 'lagan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(122) NOT NULL,
  `judul` varchar(122) NOT NULL,
  `kategori` varchar(122) NOT NULL,
  `lokasi_buku` varchar(122) NOT NULL,
  `penulis` varchar(122) NOT NULL,
  `penerbit` varchar(122) NOT NULL,
  `tahun_terbit` int(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `kategori`, `lokasi_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(4, 'Grafik dan Animasi Professional Power Point', 'Komputer', 'A1', 'Edy Winarno ST, M.Eng dan Ali Zaki', 'Elex Media Komputindo', 2015),
(5, 'Computers and Programming', 'Komputer', 'B5', 'Francis Scheid', 'McGraw-Hill', 1983),
(6, 'Revisiting Mathematics Education', 'Pendidikan', '2A', 'A.J. Bishop', 'Kluwer Academic Publishers', 2002),
(7, 'Mathematik', 'Pendidikan', 'A1', 'Manfred Hoffmann', 'Sonderausgabe', 2010),
(8, 'Mathematik b1', 'Pendidikan', 'A1', 'Manfred Hoffmann', 'Elex Media Komputindo', 2009);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(122) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `username` varchar(122) NOT NULL,
  `id_buku` int(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_peminjaman`, `tanggal_pengembalian`, `username`, `id_buku`) VALUES
(6, '2020-05-04', '2020-05-05', 'ryan', 5),
(7, '2020-05-05', '2020-05-06', 'lagan', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `username` (`username`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`username`) REFERENCES `anggota` (`username`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
