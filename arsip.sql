-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2022 pada 07.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akhir_surat`
--

CREATE TABLE `akhir_surat` (
  `id_na` varchar(20) NOT NULL,
  `nama_na` varchar(100) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akhir_surat`
--

INSERT INTO `akhir_surat` (`id_na`, `nama_na`, `deleted`) VALUES
('PN-1', 'Musnah', 0),
('PN-2', 'Permanen', 0),
('PN-3', 'Dinilai Kembali', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_ka` varchar(20) NOT NULL,
  `uraian_ka` varchar(100) DEFAULT NULL,
  `id_skkad` varchar(20) DEFAULT NULL,
  `id_na` varchar(20) DEFAULT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `uraian_jra` varchar(100) DEFAULT NULL,
  `uraian_skkad` varchar(100) DEFAULT NULL,
  `ket_skkad` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `cut_off` int(11) DEFAULT NULL,
  `inaktif` int(11) DEFAULT NULL,
  `id_usul` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_ka`, `uraian_ka`, `id_skkad`, `id_na`, `id_kategori`, `uraian_jra`, `uraian_skkad`, `ket_skkad`, `deskripsi`, `deleted`, `cut_off`, `inaktif`, `id_usul`) VALUES
('123', 'Surat tugas', 'PG-2', 'PN-1', 'K-3', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', '2222222222222222222', 0, 1, 2, NULL),
('12345', 'Surat tugas', 'PG-3', 'PN-2', 'K-4', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'mmmmmmmmmmmmmmmmmm', 0, 1, 2, NULL),
('12345678', 'Surat tugas aaaaaaaaacccc', 'PG-4', 'PN-2', 'K-4', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'jkl', 0, 1, 2, NULL),
('123456789', 'Surat tugas fyfj', 'PG-3', 'PN-1', 'K-5', 'hhhh', 'hhh', 'hhhh', 'abcde', 0, 1, 2, NULL),
('BU-10', 'Surat tugas aaaaaaaaab', 'PG-3', 'PN-2', 'K-5', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'abcf', 0, 1, 2, NULL),
('BU-11', 'Surat tugas', 'PG-2', 'PN-1', 'K-3', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'jjjjjjjjjjjjjjjjjjjjjjjjjjj', 0, 1, 2, NULL),
('BU-112', 'Surat tugas kominfo', 'PG-2', 'PN-2', 'K-3', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'jjjjjjjjjjjjjjjjjjjjj', 0, 1, 2, NULL),
('BU-21', 'Surat tugas fyfj', 'PG-1', 'PN-1', 'K-1', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'ghvjhvkjvkjkj', 0, NULL, NULL, NULL),
('BU-22', 'Surat tugas 11', 'PG-2', 'PN-2', 'K-1', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'uuuuuuuuuuuuuuuuuuu', 0, 1, 2, NULL),
('BU-6', 'Surat tugas', 'PG-1', 'PN-3', 'K-4', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'nnnnnnn', 0, 1, 2, 'K-1'),
('BU-7', 'Surat tugas aul', 'PG-1', 'PN-1', 'K-4', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', ' ,mn;ln;lml', 0, 1, 2, NULL),
('BU-9', 'Surat tugas hhh', 'PG-1', 'PN-2', 'K-1', 'nknlknlk', 'jkbnknlk', 'jkbkjnbkjn', 'nnnnnnnnnnnnnnnnn', 0, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deleted`) VALUES
('K-1', 'B-Terbuka', 0),
('K-3', 'T-Terbatas', 0),
('K-4', 'R-Rahasia', 0),
('K-5', 'SR- Sangat Rahasia', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pergub`
--

CREATE TABLE `pergub` (
  `id_skkad` varchar(20) NOT NULL,
  `skkad_pergub` varchar(100) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pergub`
--

INSERT INTO `pergub` (`id_skkad`, `skkad_pergub`, `deleted`) VALUES
('PG-1', 'B-Terbuka', 0),
('PG-2', 'T-Terbatas', 0),
('PG-3', 'R-Rahasia', 0),
('PG-4', 'SR-Sangat Rahasia', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akhir_surat`
--
ALTER TABLE `akhir_surat`
  ADD PRIMARY KEY (`id_na`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_ka`),
  ADD KEY `FK_buku_pengarang` (`id_skkad`),
  ADD KEY `FK_buku_penerbit` (`id_na`),
  ADD KEY `FK_buku_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pergub`
--
ALTER TABLE `pergub`
  ADD PRIMARY KEY (`id_skkad`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `FK_buku_penerbit` FOREIGN KEY (`id_na`) REFERENCES `akhir_surat` (`id_na`),
  ADD CONSTRAINT `FK_buku_pengarang` FOREIGN KEY (`id_skkad`) REFERENCES `pergub` (`id_skkad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
